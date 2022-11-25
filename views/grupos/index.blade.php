@extends("../layout.plantilla")

@section("encabezado")
	<a href="{{ route('grupos.index') }}"><button type="button" class="btn btn-success">Grupos</button></a>
@endsection("encabezado")
  
@section("subencabezado")
	<a href="{{ route('grupos.create') }}"><button type="button" class="btn btn-info">Agregar grupo</button></a>
@endsection("subencabezado")

@section("contenidoprincipal")
	<div class="row">
    <div class="col-xs-12">
      <div class="box">
          <div class="box-header">
            <h3 class="box-title">Grupos</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Ciclo escolar</th>                
                <th>Turno</th>
                <th>id_nivel_escolar</th>
                <th>grado / semestre</th>
                <th>Diferenciador</th>
                <th>Descripcion</th>
                <th>Accion</th>
              </tr>
              </thead>
              <tbody>
                @foreach($grupos as $grupo)              
                  <tr>
                    <td>{{ $grupo->descripcion }}</td>                    
                    <td>{{ $grupo->turno }}</td>
                    <td>{{ $grupo->clave_identificador }}</td>
                    <td>{{ $grupo->grado_semestre }}</td>  
                    <td>{{ $grupo->diferenciador_grupo}}</td>
                    <td>{{ $grupo->denominacion_grado }} </td>
                    <td>
                      
                        <a href="/grupoalumnos/{{ $grupo->id_grupo}}"><button type="button" class="btn btn-success btn-xs" style="width: 80px">Ver alumnos</button></a><br>
                        <a href="{{ route('grupos.edit',$grupo->id_grupo) }}"><button type="button" class="btn btn-primary btn-xs" style="width: 80px">Editar</button></a><br>
                        <a href="#" onclick="return confirm('Desea eliminar el registro');">
                          <form role="form" method="post" action="/grupos/{{ $grupo->id_grupo}}" >
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-xs" style="width: 80px">Eliminar</button>
                            </form>                  
                        </a>                      
                      
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>Ciclo escolar</th>
                <th>Cupo maximo</th>
                <th>Turno</th>
                <th>id_nivel_escolar</th>
                <th>grado / semestre</th>
                <th>Descripcion</th>
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
@section("scriptpie")
<script>
  $(function () {
    $('#example1').DataTable({
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
      },
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection("scriptpie")