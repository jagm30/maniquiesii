<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>{{ $title }}</title>
    <style>
    html {
    margin: 0;
    }
    body {
    width: 215mm;
    height: 280mm;
    font-family: "Times New Roman", serif;
    /*margin: 20mm 8mm 2mm 8mm;*/
    }
    #fondo{
        width: 215mm;
        height: 45mm;        
    }
    #contenido{
        margin:0 20mm 0 20mm;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
      background-color: #001b4c;
      color: white;
    }
    </style>
</head>
<body>
    <div id="fondo" class="fondo">
           <img src="{{ public_path().'/images/head.png' }}" width="100%" height="100%">
    </div>
    <h1  align="center">{{ $title}}</h1>
    <div id="contenido" class="contenido">
        <table width="100%" style="width:100%" >
         
                <tr>
                    <th>id</th>
                    <th>Nombres</th>
                    <th>desc</th>
                </tr>
                                  
                @foreach($alumno as $alumn)
                    <tr>
                      <td>{{$alumn->id}}</td>
                      <td>{{$alumn->full_name}} </td>
                      <td>1</td>
                    </tr>
                @endforeach
     
        </table>        
    </div>
</body>
</body>
</html>