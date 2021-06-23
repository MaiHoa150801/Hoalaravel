<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

///////

Route::resource('cars',CarController::class);

Route::get('cars.search',[CarController::class,'search'])->name('cars.search');
////

Route::resource('products',ProductController::class);

/////

Route::get('ptbn',function(){
	return view('BT.PTBN');
});

Route::post('ptbn',function(Request $request){
	$a = $request->input('a');
	$b = $request->input('b');
	$c = $a+$b;
	return view('BT.PTBN',['a'=>$a, 'b'=>$b], compact('c'));
})->name('giaipt');

/////

//chuỗi, mảng, chuyển hướng (Route, Action-Controller)

Route::get('return_home', function(){
	$A=['Nam'=>'20','Thao'=>'18','Binh'=>'25'];
	return $A;
});

Route::get('returnhome', function(){
	return redirect()->route('giaiptb1');
});

Route::get('return/{product}',function($product){
	return redirect()->action([ProductController::class,'show'],['product'=>$product]);
});

Route::get('/contact', function () {
    return view('users.contact');
});

Route::post('/contact', function (Request $request) {
    $contact = new Contact();
    $contact->name = $request->get('txtName');
    $contact->title = $request->get('txtTitle');
    $contact->body = $request->get('txtBody');
    $contact->save();
    return redirect('contact')->with('sucess','Ban da them thanh cong');
});

//////////////////////////////////////
Route::get('tinhtoan',function(){
	return view('BT.TinhToan');
});

Route::post('tinhtoan',function(Request $request){
	$a = $request -> input('a');
	$b = $request -> input('b');
	$choose = $request->input('choose');
	return view('BT.TinhToan',['a'=>$a, 'b'=>$b, 'choose'=>$choose]);
})->name('giaitinhtoan');

/////////////////////////////////////////////


