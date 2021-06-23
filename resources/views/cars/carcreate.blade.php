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
	<form action="{{ route('cars.store') }}" role="form" method="post" enctype="multipart/form-data">
    <legend>Add new car</legend>
    @csrf
    <div class="form-group">
        <label>Model</label>
        <input type="text" name="model">
    </div>
    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="type_car">
            @foreach($type_car as $type)
            <option value="{{$type->id}}"> {{$type->type}}</option>
            @endforeach
        </select>
    </div>  
    <button type="submit">Add</button>
  </form>
</body>
</html>