@extends("../layout.plantilla")

@section("encabezado")
  <style type="text/css">
    .container {
    width: 100%;
}
  </style>
@endsection("encabezado")
  
@section("contenidoprincipal")
	<div class="row">
        <input type="hidden" name="id_session_ciclo" id="id_session_ciclo" value="{{ $id_session_ciclo }}">
        <input type="hidden" name="id_usuario" id="id_usuario" value="{{ Auth::user()->id }}">
        <input type="hidden" name="fecha_actual" id="fecha_actual" value="{{$fecha_actual}}">
        <!-- left column -->
        <form role="form" id="sample_form" name="sample_form" method="post" action=""  enctype="multipart/form-data" >
        @csrf
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->            
              <div class="box-body">
                <div class="row">                  
                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Seleccione un alumno</label>
                      <select class="form-control select2" id="opcion_asignacion2" name="opcion_asignacion2" required>
                        <option value="">Seleccione</option>
                        @foreach($alumnos as $alumno)
                          <option value="{{$alumno->id}}">{{$alumno->apaterno}} {{$alumno->amaterno}} {{$alumno->nombres}}</option>
                        @endforeach
                      </select>                     
                    </div>
                  </div>
                </div>
               
                <div class="row">                  
                  <div class="col-xs-12">
                    <div class="form-group">
                      <br>
                      <h3>Total a pagar  $</h3>
                      <input type="text" id="total_pagar" readonly class="form-control"> 
                    </div>
                  </div>
                </div> 
                <div class="row">                  
                  <div class="col-xs-12">

                    <div class="form-group">
                      <br>
                      <button type="button" style="width:85px" class="btn btn-info" data-toggle="modal" data-target="#modal-success">
                        Descuento
                      </button>
                      <button type="button" style="width:75px" id="btn_registro" class="btn btn-warning">Cancelar</button>
                      <button type="button" id="btn_registrar" style="width:60px" id="btn_registro" class="btn btn-success">Cobrar</button>
                      <a href="{{route('cobros.printpdf')}}">Print PDF</a>
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
        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="formmodal" name="formmodal">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Asignar descuento</h4>
                </div>
                <div class="modal-body">
                  <label>Seleccione una cuenta a la que se aplicara el descuento</label>
                  <select class="form-control" id="id_cuenta_asignada">
                    <option>seleccione</option>
                  </select>
                  <label>Motivo del descuento</label>
                  <input class="form-control"  type="text" id="descripcion_descuento">
                  <label>Cantidad a descontar</label>
                  <input class="form-control"  type="number" id="cantidad_descuento">
                  <label>Fecha</label>
                  <input class="form-control"  type="date" id="fecha_descuento">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                  <button type="button"  class="btn btn-outline" onclick="registrarDescuento();">Registrar</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-check"></i>

              <h3 class="box-title">Seleccione los conceptos a pagar:</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="contenedorOpcAsig" id="contenedorOpcAsig">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>-</th>
                <th>concepto</th>
                <th>cantidad</th>
                <th>desc. P.P.</th>
                <th>descuento</th>
                <th>recargos</th>
                <th>subtotal</th>
                <th>status</th>
              </tr>
              </thead>
              <tbody id="conttable" name="conttable">

              </tbody>
              <tfoot>
              <tr>
                <th>-</th>
                <th>concepto</th>
                <th>cantidad</th>
                <th>desc. P.P.</th>
                <th>descuento</th>
                <th>recargos</th>
                <th>subtotal</th>
                <th>status</th>              
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>

        <!--/.col (right) -->
      </div>

@endsection("contenidoprincipal")
@section("scriptpie")
<script type="text/javascript">
  $(document).ready(function(){

    
    $('#conttable').on('change', 'input[type=checkbox]', function() {
      var selected            = [];
      var  list = {
        'datos' :[]
      };
      var total_pagar = 0;
      $("input:checkbox[name='opciones[]']").each(function() {
        if (this.checked) {
          // agregas cada elemento.
          // a continuacion se forma un objeto JSON para pasar los datos seleccionados
          list.datos.push({
            "subtotal":$('#subtotal'+$(this).val()).val(),
            "id_alumno":$('#opcion_asignacion2').val(),
            "id_usuario":$('#id_usuario').val(),          
            "id_cuenta_asignada":$(this).val(),                                  
            "id_planpagoconceptos":$('#id_planpagoconceptos'+$(this).val()).val(),
            "cantidad_inicial":$('#mensualidad'+$(this).val()).val(),
            "descuento_pp":$('#descuento_pp'+$(this).val()).val(),
            "descuento_adicional":$('#descuento_condonacion'+$(this).val()).val(),
            "recargo":$('#recargo'+$(this).val()).val(),
            "fecha_pago":$('#fecha_actual').val(),

          });
          total_pagar = parseFloat(total_pagar) + parseFloat($('#subtotal'+$(this).val()).val());
        }
      });
      json = JSON.stringify(list); // aqui tienes la lista de objetos en Json
      var obj = JSON.parse(json); //Parsea el Json al objeto anterior.
      //alert(json);
      //alert(total_pagar);
      $('#total_pagar').val(total_pagar);
      //alert(obj.datos[0].id); Aca se obtiene los datos que se deseen...
    });
    //////////////
    $('#btn_registrar').click(function() {
      var selected            = [];
      var  list = {
        'datos' :[]
      };
      var total_pagar = 0;
      $("input:checkbox[name='opciones[]']").each(function() {
        if (this.checked) {
          // agregas cada elemento.
          // a continuacion se forma un objeto JSON para pasar los datos seleccionados
          list.datos.push({
            "subtotal":$('#subtotal'+$(this).val()).val(),
            "id_alumno":$('#opcion_asignacion2').val(),
            "id_usuario":$('#id_usuario').val(),          
            "id_cuenta_asignada":$(this).val(),                                  
            "id_planpagoconceptos":$('#id_planpagoconceptos'+$(this).val()).val(),
            "cantidad_inicial":$('#mensualidad'+$(this).val()).val(),
            "descuento_pp":$('#descuento_pp'+$(this).val()).val(),
            "descuento_adicional":$('#descuento_condonacion'+$(this).val()).val(),
            "recargo":$('#recargo'+$(this).val()).val(),
            "fecha_pago":$('#fecha_actual').val()
          });          
        }
      });
      json = JSON.stringify(list); // aqui tienes la lista de objetos en Json
      var obj = JSON.parse(json); //Parsea el Json al objeto anterior.
      //alert(json);
      $.ajax({
         url:"/cobros/guardarcobro/"+json,
         dataType:"json",
         contentType: "application/json",
         success:function(html){
            alert(html.data);
            actualizaTabla();
            //$("#formmodal")[0].reset();
           // $('#modal-success').modal('toggle');
         }
      })

    });
    ////////////////
     $("#opcion_asignacion2" ).change(function() {  
      //alert($('#fecha_actual').val());
      actualizaTabla();
    });
    

    $('.select2').select2();
    number_format = function (number, decimals, dec_point, thousands_sep) {
        number = number.toFixed(decimals);

        var nstr = number.toString();
        nstr += '';
        x = nstr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? dec_point + x[1] : '';
        var rgx = /(\d+)(\d{3})/;

        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

        return x1 + x2;
    }
  });
  function registrarDescuento(){
    id_cuentaasignada     = $('#id_cuenta_asignada').val();
    id_alumno             = $('#opcion_asignacion2').val();
    fecha_descuento       = $('#fecha_descuento').val();
    id_ciclo_escolar      = $('#id_session_ciclo').val();
    cantidad              = $('#cantidad_descuento').val();
    observaciones         = $('#descripcion_descuento').val();
    id_usuario            = $('#id_usuario').val();            
    

    if( $('#id_session_ciclo').val()<= 0){
      alert("Seleccione un ciclo escolar..");
      return false; 
    }
    if( $('#id_usuario').val()<= 0){
      alert("Inicie sesion..");
      return false; 
    }
    if( $('#id_cuenta_asignada').val().length<= 0){
      $('#id_cuenta_asignada').css("border", "solid 2px #FA5858");
      return false; 
    }
    if( $('#descripcion_descuento').val().length<= 0){
      $('#descripcion_descuento').css("border", "solid 2px #FA5858");
      return false; 
    }
    if( $('#cantidad_descuento').val().length<= 0){
      $('#cantidad_descuento').css("border", "solid 2px #FA5858");
      return false; 
    }
    if( $('#fecha_descuento').val().length<= 0){
      $('#fecha_descuento').css("border", "solid 2px #FA5858");
      return false; 
    }
    $.ajax({
       url:"/descuentos/guardar_descuento/"+id_cuentaasignada+"/"+id_alumno+"/"+fecha_descuento+"/"+cantidad+"/"+observaciones+"/"+id_usuario,
       dataType:"json",
       success:function(html){
          alert(html.data);
          actualizaTabla();
          $("#formmodal")[0].reset();
          $('#modal-success').modal('toggle');
       }
    })
    }

    function actualizaTabla(){
      id = $('#opcion_asignacion2').val();
      $('#total_pagar').val(0);
      $('.select2').select2();
      $("#conttable").empty();
      $("#id_cuenta_asignada").empty();      
      $.ajax({
       url:"/cobros/"+id,
       dataType:"json",
       success:function(html){
          $("#id_cuenta_asignada").append('<option value="">Seleccione</option>');

          for (var i = 0; i < html.data.length; i++) 
          {
            descuento     = 0;
            recargos      = 0;
            descuento_pp  = 0;
            subtotal      = 0;
            id_planpagoconceptos = html.data[i].id_planpagoconceptos;
            if(html.data[i].porc_o_cant=='porcentaje'){
              descuento = (html.data[i].cant_desc_beca* html.data[i].cantidad)/100;
              signo_descuento = '- '+html.data[i].cant_desc_beca+' % ';
            } 
            else if(html.data[i].porc_o_cant=='cantidad'){
              descuento = html.data[i].cantidad - html.data[i].cant_desc_beca ;
              signo_descuento = '- $ '+html.data[i].cant_desc_beca;
            }else{
              descuento = html.data[i].cantidad *1;
              signo_descuento = '';
            }

            if(html.data[i].cant_desc_beca==null) {
              descuento_beca = 0;
            }else{
              descuento_beca = html.data[i].cant_desc_beca;
            }
            descuento_condonacion = 0;
            for (var j = 0; j < html.descuento.length; j++) 
            {
              if(html.data[i].id == html.descuento[j].id_cuentaasignada){
                descuento_condonacion = html.descuento[j].cant_desc;
              }
            }
            //fechas de pago
            fecha_pago        =  html.data[i].periodo_inicio;
            fecha_actual      = $('#fecha_actual').val();
            //
            aF1 = fecha_pago.split("-");
              aF2 = fecha_actual.split("-");

              numMeses1 = (aF2[0]*12) + (aF2[1]*1);
              numMeses2 = (aF1[0]*12) + (aF1[1]*1);
              numMeses = numMeses1 - numMeses2;

              if(numMeses>=1){
                recargos = numMeses * 200;
              }
              //
              var fecha_actual = new Date(fecha_actual).getTime();
              var fecha_pago   = new Date(fecha_pago).getTime();
              var diff =  fecha_actual-fecha_pago;
              diferencia_dias = diff/(1000*60*60*24);
              //
              if(html.data[i].turno=='Semiescolarizado'){
                if(diferencia_dias<14)
                {
                  if(html.data[i].cant_desc_beca<1){
                    descuento_pp = descuento * 0.10;
                  }else{
                    descuento_pp = 0;
                  }
                }
              }else{
                if(diferencia_dias<10)
                {
                  if(html.data[i].cant_desc_beca<1){
                    descuento_pp = descuento * 0.10;
                  }else{
                    descuento_pp = 0;
                  }
                }
              } 

            if(html.data[i].status_cta=='pagado'){
              subtotal = (descuento - (descuento_condonacion + descuento_pp))+ recargos;
              $("#conttable").append('<tr><td><input type="checkbox" onclick="return false;" name="opciones[]" value="'+html.data[i].id+'"></td><td>' + html.data[i].desc_concepto+ '<br> inicia: ' + html.data[i].periodo_inicio+ '<br>Vencimiento: ' + html.data[i].periodo_vencimiento+ '</td><td>$ ' + html.data[i].cantidad+ ' <br> $ ' +signo_descuento + '<br><b> $' + number_format(descuento,2, '.', ',') + '</b> <input type="hidden" id="mensualidad'+html.data[i].id+'" value="'+descuento+'" ></td><td>'+descuento_pp+'<input type="hidden" id="descuento_pp'+html.data[i].id+'" value="'+descuento_pp+'" ></td><td><b>$ '+descuento_condonacion+'<input type="hidden" id="descuento_condonacion'+html.data[i].id+'" value="'+descuento_condonacion+'" ></b></td><td>'+number_format(recargos,2,'.',',')+'<input type="hidden" id="recargo'+html.data[i].id+'" value="'+recargos+'" ></td><td>'+subtotal+'<input type="hidden" id="subtotal'+html.data[i].id+'" value="'+subtotal+'" ></td><td><span class="bg-red"> '+html.data[i].status_cta+' </span> <input  type="hidden" id="id_planpagoconceptos'+html.data[i].id+'" value="'+id_planpagoconceptos+'"></td></tr>');
            }else{             
              subtotal = (descuento - (descuento_condonacion + descuento_pp))+ recargos;
              $("#conttable").append('<tr><td><input type="checkbox"  name="opciones[]" value="'+html.data[i].id+'"></td><td>' + html.data[i].desc_concepto+ '<br> inicia: ' + html.data[i].periodo_inicio+ '<br>Vencimiento: ' + html.data[i].periodo_vencimiento+ '</td><td>$ ' + html.data[i].cantidad+ ' <br>' +signo_descuento + '<br> <b>$' + number_format(descuento,2, '.', ',') + '</b><input type="hidden" id="mensualidad'+html.data[i].id+'" value="'+descuento+'" > </td><td>'+descuento_pp+'<input type="hidden" id="descuento_pp'+html.data[i].id+'" value="'+descuento_pp+'" ></td><td><b>$ '+descuento_condonacion+'<input type="hidden" id="descuento_condonacion'+html.data[i].id+'" value="'+descuento_condonacion+'" ></b></td><td>'+number_format(recargos,2,'.',',')+'<input type="hidden" id="recargo'+html.data[i].id+'" value="'+recargos+'" ></td><td>'+subtotal+'<input type="hidden" id="subtotal'+html.data[i].id+'" value="'+subtotal+'" ></td><td><span class="bg-green"> '+html.data[i].status_cta+' </span> <input type="hidden" id="id_planpagoconceptos'+html.data[i].id+'" value="'+id_planpagoconceptos+'"></td></tr>');

              $("#id_cuenta_asignada").append('<option value=' + html.data[i].id+ '>' + html.data[i].desc_concepto +' '+html.data[i].cantidad + '</option>');
            }             
          } 
       }
      })
    }
</script>
@endsection("scriptpie")