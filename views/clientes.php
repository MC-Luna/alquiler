<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_usu_reg">
		  Crear
		</button><br><br>
	</div>
</div>

<div id="div_listado"></div>

<?php require_once "formulario-crear.php";?>

<?php require_once "formulario-editar.php";?>

<script type="text/javascript">

var identidad = {

		nombre: 'Clientes',
		consulta: 'listado_clientes',
		ajax:'ajax/registrar_clientes.php',

	};

	$(document).ready(function() {

		$("#btn_crear").bind("click",cargar_select_dialog);

		$("#codigo_sede").bind("change",function(){
			cargar_motos($(this).val());
		});
	});

function cargar_motos(codigo_sede){

	console.log("codigo_sede", codigo_sede);
	filtro="codigo_sede="+codigo_sede+" AND m.estado_moto = 0 ";
	rellenar_select("tbl_motos m LEFT join tbl_contratos c on m.codigo_moto=c.codigo_moto ","m.codigo_moto","concat(m.placa,'-',m.linea )",filtro,"codigo_moto");

}

function cargar_select_dialog(){

	rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
	"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
	"1","codigo_sede");

	$("#codigo_usuario").val(codigo_usuario);

}

$(document).ready(function() {

	$("#btn_grabar").bind("click",guardar);

	$('#titulo_view').html(identidad.nombre);

	$(document).on('click','.editar', function(e){

		//$( ".editar" ).on("click", function() {

		var valor = prompt("Editar:",$(this).data("valor"));

		e.stopPropagation();

		e.preventDefault();

		campos="tabla="+ $(this).data("tabla");

		campos+="&tabla_id="+ $(this).data("tabla_id");

		campos+="&codigo="+ $(this).data("codigo");

		campos+="&campo="+ $(this).data("campo");

		campos+="&valor="+ valor;

		console.log("LOSCAMPOSXD", campos);



		$.ajax({

		type: 'POST',

		async: true,

		url: '/ajax/registro_editar.php',

		data: campos,

		success: function(data){

		//console.log("holaaaa");

			alert(data);

			//$('.modal').modal('hide');

			cargar_listado();

			return false;

			

		//window.location.reload(true);

		},

		dataType: 'text'

		});

		return false;

	});

	// CARGAR INICIO
	cargar_listado();

});

function cargar_listado(){
	listado_consulta("div_listado",identidad.consulta,identidad.consulta_filtro,"",false,hola);
}

function hola(){
	setTimeout(function(){ cargar_tabla() }, 100);
}

function cargar_tabla(){

	//table.destroy();

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

			'searchPanes','csv', 'excel', 'pdf',
			{ extend: 'print', text: '<i class="fas fa-print"></i>' }

		]

	});

		//Pongo el botton dentro de esta function 

		let perfilUser=document.querySelectorAll("#perfilUser");

		perfilUser.forEach((element) => {

			element.addEventListener('click', (e) => {mostrarModalEditar(e,"ModuloCliente")});

		})
		
	}

		function guardar(){

			var f = $(this);
			var formData = new FormData(document.getElementById("registro"));

			$.ajax({
				url: '/ajax/registro_cliente.php',
				type: "post",
				dataType: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			}).done(function(res){

					alert(res);
					//console.log("holaaaa");
					//$('.modal').modal('hide');
					//$("#registro")[0].reset();
					//cargar_listado();
					//$("#mensaje").html("Respuesta: " + res);

				});

		}
</script>