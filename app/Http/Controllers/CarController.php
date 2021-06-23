<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Type_car;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cars= Car::all();
        return view('cars.show',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_car=Type_car::all();
        return view('cars.carcreate', compact('type_car'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'description'=>'required',
                'model'=>'required',
                // 'produced_on'=>'required|date',
                'type_car'=>'required'
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required'=>'Bạn chưa nhập mô tả',
                'model.required'=>'Bạn chưa nhập model',
                //'produced_on.required'=>'Bạn chưa nhập ngày sản xuất',
                //'produced_on.date' => 'cột produced_on phải là kiểu ngày!',
                'type_car.required'=>'Bạn chưa bạn chưa chọn loại car'
            ]);
            $file = $request->file('image');
            $name=$file->getClientOriginalName();
            $destinationPath=public_path('images'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        $this->validate($request,[
            'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            'model'=>'required',
            'description'=>'required',
            'model'=>'required',
            'type_car'=>'required'
       ],[
            'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
            'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            'model.required'=>'Bạn chưa nhập model',
            'description.required'=>'Bạn chưa nhập mô tả',
            'type_car.required'=>'Bạn chưa bạn chưa chọn loại car'
       ]);
        
      
        $car=new Car();
        $car->description=$request->description;
        $car->model=$request->model;
        //$car->produced_on=$request->produced_on;
        $car->type_id=$request->type_car;
        $car->image=$name;
        $car->save();

        return redirect()->route('cars.index')->with('success','Bạn đã cập nhật thành công');
;
        
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car=Car::find($id);
        return view('cars.show',['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car=Car::find($id);
        $type_car=Type_car::all();
        return view('cars.caredit',compact('car','id','type_car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name='';
        if($request->hasfile('image')){
            $this->validate($request,[
                'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
                'description'=>'required',
                'model'=>'required',
                //'produced_on'=>'required|date',
                'type_car'=>'required'
            ],[
                'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
                'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
                'description.required'=>'Bạn chưa nhập mô tả',
                'model.required'=>'Bạn chưa nhập model',
                //'produced_on.required'=>'Bạn chưa nhập ngày sản xuất',
                //'produced_on.date' => 'cột produced_on phải là kiểu ngày!',
                'type_car.required'=>'Bạn chưa chọn loại car'
            ]);
            $file = $request->file('image');
            $name=$file->getClientOriginalName();
            $destinationPath=public_path('images'); //project\public\car, public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/car
        }
        $this->validate($request,[
            'image'=>'mimes:jpg,png,gif,jpeg|max: 2048',
            'model'=>'required',
            'description'=>'required',
            'model'=>'required',
            'type_car'=>'required'
       ],[
            'image.mimes'=>'Chỉ chấp nhận file hình ảnh',
            'image.max'=>'Chỉ chấp nhận hình ảnh dưới 2Mb',
            'model.required'=>'Bạn chưa nhập model',
            'description.required'=>'Bạn chưa nhập mô tả',
            'type_car.required'=>'Bạn chưa bạn chưa chọn loại car'
       ]);
        $car=Car::find($id);
        $car->description=$request->description;
        $car->model=$request->model;
        //$car->produced_on=$request->produced_on;
        $car->type_id=$request->type_car;
        if($name==''){ 
            $name=$car->image;
        } 
        $car->image=$name;
        $car->save();
        
        return redirect('/cars')->with('success','Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car=Car::find($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success','Bạn đã xóa thành công');
    }

    public function search(Request $request)
    {
        $cars=Car::all();
        $car_search=Car::where('description','like','%'.$request->input('search').'%')->orWhere('model','like','%'.$request->input('search').'%')->get();
        return view('cars.show',compact('car_search','cars'));
    }
}
