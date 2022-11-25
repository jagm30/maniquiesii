@extends("../layout.plantilla")

  

@section("contenidoprincipal")
	<div class="row">
    <div class="col-xs-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Registros</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Ciclo escolar</th>
                <th>Plan de pago</th>
                <th>Dias limite pronto pago</th>
                <th>Descuento</th>
                <th>Valor de recargos</th>                
                <th>Accion</th>
              </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
              <tr>
                <th>Ciclo escolar</th>
                <th>Plan de pago</th>
                <th>Fecha limite pronto pago</th>
                <th>Descuento</th>
                <th>Valor de recargos</th>                
                <th>Accion</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
    </div>
  </div>

@endsection("contenidoprincipal")
