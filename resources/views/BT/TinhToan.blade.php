<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<form method="post">
    @csrf
    <p> Số a: 
      <input type="" name="a" placeholder="a" value="{{ isset($a)?(int)$a:''}}">
    </p> 

    <p> Số b: 
      <input type="" name="b" placeholder="b" value="{{ isset($b)?(int)$b:''}}">
    </p> 
    <input type="radio" id="add" name="choose" value="add">
    <label for="add">Cộng</label><br>
    <input type="radio" id="sub" name="choose" value="sub">
    <label for="sub">Trừ</label><br>
    <input type="radio" id="times" name="choose" value="times">
    <label for="times">Nhân</label><br>
    <input type="radio" id="divide" name="choose" value="divide">
    <label for="divide">Chia</label><br>
    <p> 
      <button type="button" href="{{ route('giaitinhtoan')}}" class="btn btn-default">Giải</button>
    </p>
  </form>
@if(isset($a)&& isset($b))
    @if($choose=="add")
      Kết quả: {{$a+$b}}
    @elseif ($choose=="sub")
      Kết quả: {{$a-$b}}
    @elseif ($choose=="times")
      Kết quả: {{$a*$b}}
    @elseif ($choose=="divide")
      Kết quả: {{$a/$b}}
    @else
      Bạn phải chọn một phép toán
    @endif   
@endif
</body>
</html>