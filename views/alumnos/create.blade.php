@extends("../layout.plantilla")

@section("encabezado")
  <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-success">Alumnos</button></a>
@endsection("encabezado")

@section("subencabezado")
  <a href="{{ route('alumnos.create') }}"><button type="button" class="btn btn-info">Agregar alumno</button></a>
@endsection("subencabezado")

@section("contenidoprincipal")
	<div class="row">
        <!-- left column -->
        <form role="form" method="post" action="/alumnos"  enctype="multipart/form-data" >
        @csrf
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
                      <label for="exampleInputEmail1">Apellido paterno</label>
                      <input type="text" class="form-control" id="apaterno" name="apaterno" required placeholder="A. paterno"  onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Apellido materno</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="amaterno" name="amaterno" required placeholder="A. materno">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nombres</label>
                  <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="nombres" name="nombres" required placeholder="Nombre">
                </div>   
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Genero</label>
                      <select class="form-control" id="genero" name="genero" required>
                        <option>Hombre</option>
                        <option>Mujer</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha de nacimiento</label>
                      <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                    </div>
                  </div>
                </div> 
               <!-- <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Lugar de nacimiento</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="lugar_nac" name="lugar_nac" required>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Estado civil</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="edo_civil" name="edo_civil" required>
                    </div>
                  </div>
                </div>-->
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">CURP</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="curp" name="curp" required placeholder="Clave unica de registro poblacional">
                    </div> 
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">email</label>
                      <input type="text" class="form-control" id="email" name="email" required placeholder="correo electronico">
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
                  <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="domicilio" name="domicilio" required placeholder="domicilio">
                </div>         
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ciudad</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="ciudad" name="ciudad" required placeholder="Ciudad">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Estado</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="estado" name="estado" required placeholder="Estado">
                    </div>
                  </div>
                </div>                
                <div class="row">                  
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">C.P.</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="cp" name="cp" required placeholder="codigo postal">
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefono</label>
                      <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase();ComprobarAcentos(this);" class="form-control" id="telefono" name="telefono" required placeholder="telefono">
                    </div>
                  </div>
                </div>                
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status" name="status" required>
                        <option>activo</option>
                        <option>aspirante</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputFile">foto</label>
                      <input type="file" id="foto" name="foto">
                    </div> 
                  </div>
                </div>                                               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar alumno</button>
                <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                @if($errors->any())
                  @foreach($errors->all() as $error)
                    <h3>{{$error}}</h3>
                  @endforeach
                @endif
              </div>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->         
          <!-- /.box -->
        </div>
        </form>
        <!--/.col (right) -->
      </div>
      <div class="row" > 
         <div class="col-md-12">
          <button type="button"  name="create_record" id="create_record" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Inscribir a grupo</button>
          
          <button type="button" class="btn btn-danger">Asignar cuentas</button>
         </div>
      </div>
      <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-title">Inscribir en grupo</h4>
      </div>
      <span id="form_result"></span>
        <div class="modal-body">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" >Grado: </label>
            <div class="col-md-8">
              <span id="nombre_alumno"></span>
              <select name="id_gradi" id="id_gradi" class="form-control" required>
                <option value="">Seleccione una opcion</option>
                @foreach($grupos as $grupo)
                <option value="{{$grupo->id}}">{{$grupo->grado_semestre}} {{$grupo->diferenciador_grupo}} || {{$grupo->denominacion_grado}} || {{$grupo->turno}}</option>
                @endforeach
              </select>
            </div>
           </div>
          
           <input type="hidden" name="id_grupo" id="id_grupo" class="form-control" required value="" />
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <span id="store_image"></span>
           </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Inscribir">
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->

@endsection("contenidoprincipal")
@section("scriptpie")
<script type="text/javascript">
  function ComprobarAcentos(inputtext)
  {
    if(!inputtext) return false;
    if(inputtext.value.match('[á,é,í,ó,ú]|[Á,É,Í,Ó,Ú]'))
    {
      alert('No se permiten acentos en la casilla');
      inputtext.value = '';
      inputtext.focus();
      return true;
    }
    return false;
  }
</script>
@endsection("scriptpie")