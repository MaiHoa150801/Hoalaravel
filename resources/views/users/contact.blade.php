<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  Liên Hệ
  @if (session('sucess'))
    {{ session('sucess') }}
  @endif
	<form action="" method="post">
    {{csrf_field()}}
  <p>
    Họ và tên
    <input type="text" name="txtName" placeholder="" value="{{ isset($txtName)?(string)$txtName:''}}">
  </p> 
  <p>
    Tiêu đề
    <input type="text" name="txtTitle" placeholder="" value="{{ isset($txtTitle)?(string)$txtTitle:''}}" >
  </p> 
  <p>
    Noi dung
    <textarea name="txtBody" rows="3" required="required" value="{{ isset($txtBody)?(string)$txtBody:''}}"></textarea> 
  </p>
  <p> 
    <button type="submit" class="btn btn-default">Gui</button>
  </p>
  </form>
</body>
</html>