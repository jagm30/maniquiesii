@extends("../layout.plantilla")

@section("encabezado")
  <a href="{{ route('politicaplanpago.index') }}"><button type="button" class="btn btn-success">Politicas</button></a>
@endsection("encabezado")
  
@section("subencabezado")
  <a href="{{ route('politicaplanpago.create') }}"><button type="button" class="btn btn-info">Agregar nueva politica</button></a>
@endsection("subencabezado")

@section("contenidoprincipal")
	<div class="row">
        <!-- left column -->
        <form role="form" method="post" action="/politicaplanpago"  enctype="multipart/form-data" >
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
                      <label for="exampleInputPassword1">Plan de pagos</label>
                      <select class="form-control" id="id_plan_pago" name="id_plan_pago" required>
                        <option value="">Seleccione una opcion</option>
                        @foreach($planpagos as $planpago)
                          <option value="{{$planpago->id}}">{{ $planpago->descripcion  }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Dias llimite de pronto pago</label>
                      <input placeholder="Dias" class="form-control" required type="number" name="dias_limite_pronto_pago" id="dias_limite_pronto_pago" >
                    </div>
                  </div>
                </div>
                <div class="row">                  
                  <div class="col-xs-6">   
                    <div class="form-group">
                      <label for="exampleInputPassword1">Cantidad o porcentaje de Desc.</label>
                      <select class="form-control" id="cant_porc_descuento" name="cant_porc_descuento" required>
                        <option value="porcentaje">Porcentaje</option>
                        <option value="cantidad">Cantidad</option>
                      </select>
                    </div>   
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Valor de descuento:</label>
                      <input type="number" step="any" class="form-control" id="valor_descuento" name="valor_descuento" required placeholder="Descuento">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Cantidad o porcentaje de recargos:</label>
                      <select class="form-control" id="cant_porc_recargo" name="cant_porc_recargo" required>
                        <option value="porcentaje">Porcentaje</option>
                        <option value="cantidad">Cantidad</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Valor de recargos x dia</label>
                      <input type="number" step="any" class="form-control" id="valor_recargo" name="valor_recargo" required placeholder="Recargos">
                    </div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-xs-6">
                    
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <br>
                      <button type="submit" class="btn btn-primary">Registrar</button>
                      <a href="{{ route('grupos.index') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                        @if($errors->any())
                          @foreach($errors->all() as $error)
                            <h3>{{$error}}</h3>
                          @endforeach
                        @endif
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
       
        </form>
        <!--/.col (right) -->
      </div>

@endsection("contenidoprincipal")