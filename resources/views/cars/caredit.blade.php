<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
     <strong>Whoops!</strong> There were some problems with your input.<br><br>
     <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
     </ul>
    </div>
    @endif
   <form action="{{route('cars.update', $car->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Images</strong>
                <img src="/images/{{ $car->image }}" style="width: 10rem">
                <input type="file" name="image" class="form-control" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model</strong>
                <input type="text" name="model" class="form-control" value="{{$car->model}}" placeholder="Enter model">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                <input type="text" name="description" class="form-control" value="{{$car->description}}" placeholder="Enter des">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type car</strong>
                <select class="form-control" name="type_car">
                    @foreach($type_car as $type)
                    <option value="{{$type->id}}" {{$car->type_id == $type->id?'selected':''}}>{{$type->type}}</option>
                    @endforeach
                </select> 
            </div> 
        </div>
       
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>