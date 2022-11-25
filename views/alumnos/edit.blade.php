@extends("../layout.plantilla")

@section("encabezado")
  <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-success">Alumnos</button></a>
  <style type="text/css" >
     .nav-tabs-custom>.nav-tabs>li>a { background-color: #001b4c !important; border-radius: 10px; font: 12px; color: red; }
     .nav-tabs-custom>.nav-tabs>li>a {
      color:white;
     }
     .nav-tabs-custom>.nav-tabs>li.active>a {
      background-color: #3B5FA1 !important; border-radius: 15px; font: 12px;
     }
     .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a {
      color: white;
     }
     .nav-tabs-custom>.nav-tabs>li{
      background-color: transparent;
     }
     .nav-tabs-custom{
      margin-bottom:5px;
      background: white;border-radius: 15px;
     }
  </style>
@endsection("encabezado")

@section("subencabezado")
  <a href="{{ route('alumnos.create') }}"><button type="button" class="btn btn-info">Agregar alumno</button></a>
@endsection("subencabezado")

@section("contenidoprincipal")
	<div class="row">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="navhead" style="width: 50%;" >
          <a href="#tab_1" data-toggle="tab" class="navurl"><img src="/images/1.png" alt="" width="50" height="50" style="border-radius: 15px;"><b> {{$alumno->apaterno}} {{$alumno->amaterno}} {{$alumno->nombres}}</b> Grupo actual: <label id="label_grupo">@if($grupoinscrito)<b> {{$grupoinscrito->grado_semestre}} {{$grupoinscrito->diferenciador_grupo}}</b>&nbsp;&nbsp;status: <b>{{$grupoinscrito->status}}@endif</label></b></a>
        </li>
          <li class="active"><a href="#tab_1" data-toggle="tab">Datos personales</a></li>
          <li><a href="#tab_2" data-toggle="tab">Grupo</a></li>
          <li><a href="#tab_3" data-toggle="tab">Becas</a></li>          
      </ul>
    </div>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <!-- left column -->
        <form role="form" method="post" action="/alumnos/{{ $alumno->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="col-md-6">
          
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registro nuevo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->            
              <div class="box-body">
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido paterno {{$alumno->id}}</label>
                      <input type="text" class="form-control" id="apaterno" name="apaterno" required  placeholder="A. paterno" value="{{ $alumno->apaterno }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Apellido materno</label>
                      <input type="text" class="form-control" id="amaterno" name="amaterno" required  placeholder="A. materno" value="{{ $alumno->amaterno }}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nombres</label>
                  <input type="text" class="form-control" id="nombres" name="nombres" required  placeholder="Nombre" value="{{ $alumno->nombres }}">
                </div>   
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Generso {{$alumno->genero}}</label>
                      <select class="form-control" id="genero" name="genero" required> 
                        
                        <option {{ ($alumno->genero =='Hombre') ? 'selected' : ''}}>Hombre</option>
                        
                        <option {{($alumno->genero =='Mujer') ? 'selected' : ''}}>Mujer</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha de nacimiento</label>
                      <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required  value="{{ $alumno->fecha_nac }}">
                    </div>
                  </div>
                </div> 
               <!-- <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Lugar de nacimiento</label>
                      <input type="text" class="form-control" id="lugar_nac" name="lugar_nac" required  value="{{ $alumno->lugar_nac }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Estado civil</label>
                      <input type="text" class="form-control" id="edo_civil" name="edo_civil" required  value="{{ $alumno->edo_civil }}">
                    </div>
                  </div>
                </div>-->
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">CURP</label>
                      <input type="text" class="form-control" id="curp" name="curp" required  placeholder="Clave unica de registro poblacional" value="{{ $alumno->curp }}">
                    </div> 
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">email</label>
                      <input type="text" class="form-control" id="email" name="email" required  placeholder="correo electronico" value="{{ $alumno->email }}">
                    </div>
                  </div>
                </div> 
                 
                                                                         
              </div>
              <!-- /.box-body -->                       
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body"> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Domicilio</label>
                  <input type="text" class="form-control" id="domicilio" name="domicilio" required  placeholder="domicilio" value="{{ $alumno->domicilio }}">
                </div>         
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ciudad</label>
                      <input type="text" class="form-control" id="ciudad" name="ciudad" required  placeholder="Ciudad" value="{{ $alumno->ciudad }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Estado</label>
                      <input type="text" class="form-control" id="estado" name="estado" required  placeholder="Estado" value="{{ $alumno->estado }}">
                    </div>
                  </div>
                </div>                
                <div class="row">                  
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">C.P.</label>
                      <input type="text" class="form-control" id="cp" name="cp" required  placeholder="codigo postal" value="{{ $alumno->cp }}">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono" required  placeholder="telefono" value="{{ $alumno->telefono }}">
                    </div>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status" name="status" required  value="{{ $alumno->status }}">
                        <option>activo</option>
                        <option>aspirante</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="foto" name="foto" >
                    </div> 
                  </div>
                </div>                                               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
              </div>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->         
          <!-- /.box -->
        </div>
        </form>
      </div>
      <div class="tab-pane" id="tab_2">
        <!-- left column -->
        <div class="col-md-6">
          
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inscripcion a grupo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" id="sample_form" id="sample_form" enctype="multipart/form-data">   
             @csrf      
              <div class="box-body">
                <div class="row">
                  <div class="form-group">
                  <input type="hidden" name="id_alumno" id="id_alumno" value="{{$alumno->id}}">
                  <label class="control-label col-md-4" >Grado / grupo: </label>
                  <div class="col-md-8">
                    <span id="nombre_alumno"></span>
                    <select name="id_grupo" id="id_grupo" class="form-control" required>
                      <option value="">Seleccione una opcion</option>
                      @foreach($grupos as $grupo)
                      <option value="{{$grupo->id}}" @if($grupoinscrito){
                        {{($grupo->id ==$grupoinscrito->id_grupo) ? 'selected' : ''}}
                      } @endif>{{$grupo->grado_semestre}} {{$grupo->diferenciador_grupo}} || {{$grupo->denominacion_grado}} || {{$grupo->turno}}</option>
                      @endforeach
                    </select>
                  </div>
                 </div>                
                 <input type="hidden" value="activo" id="status" name="status">
                 <div class="form-group" align="center">
                  <input type="hidden" name="action" id="action" />
                  <input type="hidden" name="hidden_id" id="hidden_id" />
                  <span id="store_image"></span>
                 </div> 
                 <br><br>
                 <div class="form-group" align="center">
                    <div class="col-md-12">
                     <button   name="create_record" id="create_record" class="form-control btn-success">Inscribir a grupo</button>
                    </div>
                 </div>        
                </div>        
              </div> 
            </form>                     
          </div>
        </div>
      </div>
    </div>
    <!--/.col (right) -->
  </div>


@endsection("contenidoprincipal")
@section("scriptpie")
<script type="text/javascript">
  $(document).ready(function(){
    $('#sample_form').on('submit', function(event){
      event.preventDefault();    
      //consulta si el registro existe
/*
      id_alumno = $('#id_alumno').val();
      var existe = 0;
        $.ajax({
           url:"/grupoalumnos/consultaexiste/"+id_alumno,
           dataType:"json",
           contentType: "application/json",
           success:function(html){              
              existe = parseInt(html.data);
              alert(existe);
              //alert("existen:"+existe);
           }
        })*/
      //Se agrega nuevo registro si el alumno aun no
      $.ajax({
          url:"{{route('grupoalumnos.store')}}",
          method:"POST",
          data: new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          dataType:"json",
          success: function(data){            
            //alert("2");
            var html = '';
            if(data.errors)
            {
              alert("Ocurrio un error");
            }
            if (data.success="success") {
              alert("Isncrito correctamente..");
              $('#label_grupo').html(data.grupo.grado_semestre+" "+data.grupo.diferenciador_grupo);

            }

          }
        })         
    });

  });
</script>
@endsection("scriptpie")