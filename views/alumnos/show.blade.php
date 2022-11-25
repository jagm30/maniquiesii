@extends("../layout.plantilla")

@section("encabezado")
  <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-success">Alumnos</button></a>
@endsection("encabezado")

@section("subencabezado")
  <a href="{{ route('alumnos.create') }}"><button type="button" class="btn btn-info">Agregar alumno</button></a>
@endsection("subencabezado")

@section("contenidoprincipal")
	<div class="row">
    <div class="col-md-12">
      <!-- Custom Tabs -->
      @if($count_alumno == 0)
      	<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-ban"></i> Verificar!</h4>
			 El alumno seleccionado no pertenece al ciclo escolar elegido...
		</div>
      @else 
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
	        <li style="width: 50%" >
	        	<a href="#tab_2" data-toggle="tab"><img src="/images/1.png" alt="" width="50" height="50"><b> {{$alumno->apaterno}} {{$alumno->amaterno}} {{$alumno->nombres}}</b> Grupo actual: <b>{{$alumno->grado_semestre}} {{$alumno->diferenciador_grupo}}</b>&nbsp;&nbsp;status: <b>{{$alumno->status}}</b></a>
	        </li>
          	<li class="active"><a href="#tab_1" data-toggle="tab">Estado de cuenta</a></li>
          	<li><a href="#tab_2" data-toggle="tab">Datos personales</a></li>
          	<li><a href="#tab_3" data-toggle="tab">Becas</a></li>          
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="tab_2">
            <!-- left column -->
            <form role="form" method="post" action="/alumnos" >
            @csrf
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->            
                  <div class="box-body">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Apellido paterno</label>
                          <input type="text" class="form-control" id="apaterno" name="apaterno" readonly placeholder="A. paterno" value="{{ $alumno->apaterno }}">
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Apellido materno</label>
                          <input type="text" class="form-control" id="amaterno" name="amaterno" readonly placeholder="A. materno" value="{{ $alumno->amaterno }}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nombres</label>
                      <input type="text" class="form-control" id="nombres" name="nombres" readonly placeholder="Nombre" value="{{ $alumno->nombres }}">
                    </div>   
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label>Genero</label>
                          <select class="form-control" id="genero" name="genero"> readonly
                            <option>Hombre</option>
                            <option>Mujer</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Fecha de nacimiento</label>
                          <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" readonly value="{{ $alumno->fecha_nac }}">
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">CURP</label>
                          <input type="text" class="form-control" id="curp" name="curp" readonly placeholder="Clave unica de registro poblacional" value="{{ $alumno->curp }}">
                        </div> 
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">email</label>
                          <input type="text" class="form-control" id="email" name="email" readonly placeholder="correo electronico" value="{{ $alumno->email }}">
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
                      <input type="text" class="form-control" id="domicilio" name="domicilio" readonly placeholder="domicilio" value="{{ $alumno->domicilio }}">
                    </div>         
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ciudad</label>
                          <input type="text" class="form-control" id="ciudad" name="ciudad" readonly placeholder="Ciudad" value="{{ $alumno->ciudad }}">
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Estado</label>
                          <input type="text" class="form-control" id="estado" name="estado" readonly placeholder="Estado" value="{{ $alumno->estado }}">
                        </div>
                      </div>
                    </div>                
                    <div class="row">                  
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputPassword1">C.P.</label>
                          <input type="text" class="form-control" id="cp" name="cp" readonly placeholder="codigo postal" value="{{ $alumno->cp }}">
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Telefono</label>
                          <input type="text" class="form-control" id="telefono" name="telefono" readonly placeholder="telefono" value="{{ $alumno->telefono }}">
                        </div>
                      </div>
                    </div>                
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" id="status" name="status" readonly value="{{ $alumno->status }}">
                            <option>activo</option>
                            <option>aspirante</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label for="exampleInputFile">Foto</label>
                          <input type="file" id="exampleInputFile">
                        </div> 
                      </div>
                    </div>                                               
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <!-- general form elements disabled -->         
              <!-- /.box -->
            </div>
            </form>
            <a href="#" onclick="return confirm('Desea eliminar el registro');">                         
              <form role="form" method="post" action="/alumnos/{{ $alumno->id}}" >
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" value="Eliminar" class="btn btn-danger">Eliminar</button>
                <a href="{{ route('alumnos.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
              </form>
            </a>
            <br><br>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane active" id="tab_1">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <b><tr>                  
                    <th>Plan de pago</th>
                    <th>Concepto</th>
                    <th>Precio</th>
                    <th>Fecha de vencimiento</th>
                    <th style="width: 40px">Status</th>
                    <th style="width: 70px">Accion</th>
                  </tr></b>
                  <? $planpago = 0;?>
                  @foreach($planespago as $planpago)
                      <tr style=' font: 12px "Comic Sans MS", cursive; color:red;' >
                        <td>{{$planpago->descripcion  }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    @foreach($cuentaasignadas as $cuentaasignada)
                      @if($cuentaasignada->id_plan_pago == $planpago->id_plan_pago )
                      <tr>
                        <td></td>
                        <td>{{ $cuentaasignada->desc_concepto }}</td>
                        <td>$ {{ $cuentaasignada->cantidad }} <br>
                          @if($cuentaasignada->codigo != '')
                            @if($cuentaasignada->porc_o_cant == 'porcentaje')
                            {{$cuentaasignada->codigo}} <br>
                            <b>$ {{number_format(($cuentaasignada->cantidad * $cuentaasignada->descuento_beca)/100,2)}}</b>
                            @endif
                          @endif
                        </td>
                        <td>{{$cuentaasignada->periodo_vencimiento}}</td>
                        <td>
                          @if($cuentaasignada->status_cta == 'pagado')
                            <span class="badge bg-blue">{{$cuentaasignada->status_cta}}</span>
                          @else
                            <span class="badge bg-green">{{$cuentaasignada->status_cta}}</span>
                          @endif
                        </td>
                        <td> 
                          @if($cuentaasignada->status_cta == 'pagado')
                          @else
                            <a class="eliminarcta_asignada" id="{{$cuentaasignada->id}}" href="#" ><span class="badge bg-red">Eliminar</span></a>
                          @endif</td>
                      </tr>
                      @endif
                    @endforeach
                  @endforeach
                </table>
              </div>
              <!-- /.box-body -->

            </div>
            <!-- /.box -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
            <div class="box">
	            <div class="box-header">
	            	<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-success">
                	Agregar beca
              		</button>
	              	<h3>Becas registradas</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body no-padding">
	              <table class="table table-striped">
	                <tr>
	                  <th >Concepto</th>
	                  <th>Aplicado a:</th>
	                  <th>Porcentaje</th>
                    <th>Accion</th>
	                </tr>
	                @foreach($becasasiganadas as $becaasignada)
	                	<tr>
		                  <td>{{$becaasignada->descripcion}}</td>
		                  <td>{{$becaasignada->desc_conceptos}}</td>
		                  <td style="width:50px;"><span class="badge bg-blue">{{$becaasignada->cant_beca}}%</span></td>
                      <td style="width:50px;"><a href="/becaalumno/destroy/{{ $becaasignada->id}}" onclick="return confirm('Desea eliminar el registro');">                            
                            <span class="badge bg-red">Eliminar</span>
                        </a>
                      </td>
		                </tr>
	                @endforeach
	                	
	              </table>
	            </div>
	            <!-- /.box-body -->
	          </div>
          </div>
          <!-- /.tab-pane -->
          <!-- /.modal -->

        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog  modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asignar beca</h4>
              </div>
              <div class="modal-body">
               	<div class="row">
               		<div class="col-md-4">
		              <div class="form-group">
		                <label>Becas</label>
		                <select id="id_beca" class="form-control select2" style="width: 100%;">
		                	<option value="">Seleccione</option>}		                	
		                  @foreach($opcbecas as $beca)
		                  	<option value="{{$beca->id}}">{{$beca->descripcion}}</option>
		                  @endforeach
		                </select>
		              </div>
		              <!-- /.form-group -->
           			 </div> 
           			 <div class="col-md-8">
				          <p class="lead">Seleccione a los conceptos que se aplicara:</p>

				          <div class="table-responsive">
				            <table class="table">
				              <tbody>
				              	 @foreach($cuentaasignadas as $cuentaasignadaBeca)
			                      <tr>
			                        <td><input type="checkbox" checked name="opciones[]" value="{{$cuentaasignadaBeca->id}}"></td>
			                        <td>{{ $cuentaasignadaBeca->desc_concepto }}</td>
			                        <td>$ {{ $cuentaasignadaBeca->cantidad }}</td>                        
			                        <td><span class="badge bg-green">Pendiente</span></td>
			                      </tr>
			                    @endforeach
				            </tbody></table>
				          </div>
           			 </div>              		
               	</div>
              </div>
              <div class="modal-footer">
              	<input type="hidden" value="{{$alumno->id}}" id="id_alumno">
              	<input type="hidden" value="{{$alumno->id_grupo}}" id="id_grupo">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button"  id="btn-agrega-becas" class="btn btn-outline">Agregar beneficio</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        </div>
        <!-- /.tab-content -->
      </div>
    @endif
      <!-- nav-tabs-custom -->
    </div>
        
    <!--/.col (right) -->
  </div>

@endsection("contenidoprincipal")

@section("scriptpie")
<script type="text/javascript">
  $(document).ready(function(){
    $('.eliminarcta_asignada').on('click', function(event){
      id = $(this).attr('id');
      //alert(id);
      if (confirm('Estas seguro que deseas elimnar esta cuenta asignada?')) {
        $.ajax({
            url:"/cuentasasignadas/destroy/"+id,
            dataType:"json",
            success:function(html){
              alert(html.data);
              location.reload();
            }
        })
      }
    });
    $('#btn-agrega-becas').on('click', function(event){      
      event.preventDefault();
     /* id                      = $('#opcion_asignacion').val();*/
      id_beca                = $('#id_beca').val();
      id_alumno				 = $('#id_alumno').val();
      id_grupo				 = $('#id_grupo').val();
      var selected           = [];

      $("input:checkbox[name='opciones[]']").each(function() {
        if (this.checked) {
          // agregas cada elemento.
          selected.push($(this).val());
        }
      });

        if(selected ==''){
          alert("Seleccione al menos un concepto al que se aplicara la beca.");
        }else if(id_beca==''){
          alert("Seleccione la beca que desee asignar..");
        }else{ 
       // alert("2");        
	        $.ajax({
	         	url:"/becaalumno/guardar/"+id_beca+"/"+selected+"/"+id_alumno+"/"+id_grupo,
	         	dataType:"json",
	         	success:function(html){
              alert(html.data);
	            location.reload();
	         	}
	        })
        }
      
    });

  });
</script>
@endsection("scriptpie")