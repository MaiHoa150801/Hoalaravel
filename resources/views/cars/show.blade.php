<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <form action="{{route('cars.search')}}" method="GET">
    <div class="pull-left">
      <strong>Searching...</strong>
      <input type="text" name="search" placeholder="Enter your key">
      <button class="btn btn-success" type="submit">Submit</button>
    </div>
  </form>
  
	@if(Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
  @endif
  
  <h2>Danh sách xe</h2>
  
  <button type="button" class="btn btn-success" onclick="window.location='{{ route('cars.create') }}'">Thêm mới 1 xe</button>
  <!-- <a href="{{ route('cars.create') }}">Thêm mới xe</a> -->
  <table class="table table-light">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Type Car</th>
        <th>Image</th>
        <th>Function</th>
      </tr>
    </thead>
    <tbody>
      @php
        $stt=0;
        $dsxe=[];
        if(isset($car_search))
          $dsxe=$car_search;
        else $dsxe=$cars;
      @endphp
      @foreach($dsxe as $car)
      <tr>
        <td>{{ ++$stt }}</td>
        <td>{{ $car['model'] }}</td>
        <td>{{ $car['description'] }}</td>
        <td>{{ $car->type_car->type }}</td>
        <td><img src="/images/{{ $car['image'] }}" style="width: 50px; height:50px;"/></td>
        <td><button type="button" class="btn btn-primary" onclick="window.location='{{route('cars.edit',$car->id)}}'">Edit</button>
          <form action="{{ route('cars.destroy', $car['id']) }}" method="post">
              @csrf
                    @method('delete') <input name="_method" type="hidden" value="DELETE">
                   <button name="delete" class="btn btn-danger" type="submit">Xóa</button>
          </form>
          </td> 
      </tr>
      @endforeach
    </tbody>
  </table>
	

</body>
</html>