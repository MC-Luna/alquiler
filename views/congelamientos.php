<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>

	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" 
		data-toggle="modal" data-target="#modal_usu_reg">
			Crear
		</button><br><br>
	</div>

</div>

<div id="div_listado"></div>

<div class="modal fade" id="modal_usu_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Congelamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  id="registro">	
			<input type="hidden" id="codigo_usuario" name="codigo_usuario" class="form-control" placeholder="" aria-label="emailsede" aria-describedby="basic-addon1">	
	        <div class="row">  
	         	<div class="col">
					<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Cliente</span>
					</div>
						<select class="form-control" name="codigo_cliente" id="codigo_cliente"></select>
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Contrato</span>
					</div>
						<select class="form-control" name="codigo_contrato" id="codigo_contrato"></select>
					</div>
				</div>

			</div>

			<div class="row"> 
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Motivo</span>
						</div>
						<input type="text" name="motivo" class="form-control" placeholder="" aria-label="emailsede" aria-describedby="basic-addon1">	
					</div>

				</div>

				<div class="col">
					<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Fecha cierre de congelamiento</span>
					</div>
						<input id="fecha_cierre" name="fecha_cierre" type="date" class="form-control">
					</div>
				</div>
			</div>

		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_grabar">Grabar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_descongelar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Fecha proximo cobro</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>

      <div class="modal-body">

	  	<form id="form_descongelar">

			<div class="input-group mb-3">
				<input id="fecha_proximo_cobro" name="fecha_proximo_cobro" type="date" class="form-control">
			</div>

		</form>

	  </div>

	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_descongelar">Descongelar</button>
      </div>
	  
    </div>
  </div>
</div>

<script type="text/javascript">

	var identidad = {
		nombre: 'Congelamientos',
		consulta: 'listado_congelamientos',
		consulta_filtro: '',
		tabla:'tbl_congelamientos',
		campos:'codigo_usuario,codigo_cliente,codigo_contrato,fecha_cierre,motivo',
		formulario:'codigo_usuario,codigo_cliente,codigo_contrato,fecha_cierre,motivo'		
	};

	var cod_descongelar=0;
	
	$(document).ready(function() {

		$('#titulo_view').html(identidad.nombre);

		$("#codigo_usuario").val(codigo_usuario);

		$("#btn_crear").bind("click",cargar_clientes);

		$("#btn_descongelar").bind("click",guardar_descongelar);

		$("#codigo_cliente").bind("change",function(){
			cargar_contrato($(this).val());
		});
		
		//CARGAR INICIO
		cargar_listado();

	});

function cargar_clientes(){
	rellenar_select("tbl_clientes","codigo_cliente","UPPER(CONCAT(COALESCE(nombres),' ',COALESCE(apellidos), ' - ', tipo_documento, ' ', identificacion)) "," proceso_leads != 1 ORDER BY 2 ","codigo_cliente");
}

function cargar_contrato(codigo_cliente){
	console.log("CODIGOSEDE",codigo_cliente)
	filtro="codigo_cliente="+codigo_cliente+" and c.activo=1";
	rellenar_select("tbl_contratos c inner join tbl_motos m on c.codigo_moto = m.codigo_moto","c.codigo_contrato","concat(c.codigo_contrato,' ► ', m.placa,'-',m.linea )",filtro,"codigo_contrato");
}

function cargar_listado(){
	listado_consulta("div_listado",identidad.consulta,identidad.consulta_filtro,"",false,hola);
}

function hola(){
	setTimeout(function(){ cargar_tabla() }, 100);
}

function descongelar(codigo_congelar){
	cod_descongelar=codigo_congelar;
	$('#modal_descongelar').modal('show');
	
}

function guardar_descongelar(){

if ($("#fecha_proximo_cobro").val()==""){
	alert("Debe ingresar una fecha");
	$("#fecha_proximo_cobro").focus();
}else{

	$.ajax({
	type: 'POST',
	async: false,
	data: "fecha_proximo_cobro="+$("#fecha_proximo_cobro").val()+"&codigo_congelar="+cod_descongelar,
	url: 'ajax/descongelar.php',
	success: function(data){
		if(data.resultado==1){
			$("#fecha_proximo_cobro").val("");
			alert(data.mensaje);
		}else{
			alert(data.mensaje);
		}
		cargar_listado();
		cerrarDescongelar();
	},
		dataType: 'json'
	});
}

}

function cerrarDescongelar(){
	$("#fecha_proximo_cobro").val("");
	$('#modal_descongelar').modal('hide');
}

function cargar_tabla(){
	$('#div_listado table').DataTable({
	retrieve: true,
	paging: false,
	"pageLength": 50,
	"ordering":false,
	"language": {
	"decimal":        "",
	"emptyTable":     "No hay datos disponibles",
	"info":           "Mostrando _START_ de _END_ de _TOTAL_ registros",
	"infoEmpty":      "No hay registros",
	"infoFiltered":   "(filtrado de _MAX_ total registros)",
	"infoPostFix":    "",
	"thousands":      ",",
	"lengthMenu":     "Mostrar _MENU_ registros",
	"loadingRecords": "Cargando...",
	"processing":     "Procesando...",
	"search":         "Buscar:",
	"zeroRecords":    "No se encontro resultados",
	"paginate": {
		"first":      "Primero",
		"last":       "Ultimo",
		"next":       "Siguiente",
		"previous":   "Anterior"
	},

	"pagingType": "full_numbers",
	"aria": {
		"sortAscending":  ": ordenamiento de forma ascedente",
		"sortDescending": ": ordenamiento de forma descente"
	},

	"searchPanes": {
		clearMessage: 'Limpiar',
		//collapse: 'Filtro',
		collapse: {0: 'Filtro', _: 'Filtro (%d)'},
		cascadePanes: true,
		viewTotal: true,
		threshold: 0.1,
		layout: 'columns-6',
		title: {
			_: 'Filtro seleccionado - %d',
			0: 'No hay filtro seleccionado',
			1: 'Filtro seleccionado'
		}

	}

	},

	dom: 'Bfrtip',
	buttons: [ 
	// 'copy', 
	'searchPanes','csv', 'excel', 'pdf',
	{ extend: 'print', text: '<i class="fas fa-print"></i>' }

	]

	});		
}

</script>
<script type="text/javascript" charset="utf8" src="views/views.js"></script>