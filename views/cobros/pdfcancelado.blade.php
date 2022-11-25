<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>{{ $title }}</title>
</head>
<body>
  <h1>{{ $alumno[0]->id}}</h1>
  
  <table width="100%" style="width:100%" border="0">
      @foreach($alumno as $alumn)
        <tr>
          <td>{{$alumn->id}}</td>
          <td>{{$alumn->apaterno}} {{$alumn->amaterno}} {{$alumn->apaterno}}</td>
          <td>1</td>
        </tr>
      @endforeach
    </table>
</body>
</body>
</html>