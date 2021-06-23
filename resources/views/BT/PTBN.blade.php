<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<form method="post">
    @csrf
    <p>
      Số a: 
      <input type="" name="a" placeholder="a" value="{{ isset($a)?(int)$a:''}}">
    </p> 
    <p>       
      Số b: 
      <input type="" name="b" placeholder="b" value="{{ isset($b)?(int)$b:''}}">
    </p> 
    <p> 
      <button type="button" class="btn btn-default" onclick="window.location='{{ url("ptbn") }}'">Giải</button>
      
    </p>
  </form>
  @if(isset($a)&& isset($b))
  @if($a==0)
  @if(isset($b) && $b == 0) Phương trình vô số nghiệm
  @else Phương trình vô nghiệm
  @endif
  @else Phương trình có nghiệm x={{-$b/$a}} {{$c}};
  @endif
  @endif
</body>
</html>