<div style="display: flex;">

	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	<div style="width: 50%;float: right;text-align: end;">
	</div>
		<select class="form-control" name="codigo_exportar" id="codigo_exportar"></select>
		</div>
	</div>
</div>

<div id="div_listado"></div>

<script type="text/javascript">

	var identidad = {
		nombre: 'Reportes',
		consulta: 'listado_clientes',
		ajax:'ajax/registrar_clientes.php',
	};

	$(document).ready(function() {
		$('#div_listado').html("<hr><br><h4 style='float:right'>Seleccionar un reporte ▲</h4>");

		rellenar_select("tbl_exportar","consulta","nombre"," 1","codigo_exportar");

		$("#codigo_exportar").focus();

		$("#codigo_exportar").on("change",function(){
			
			cargar_listado();
		});

});

$(document).ready(function() {

	$('#titulo_view').html(identidad.nombre);

});

function cargar_listado(){
	
	listado_consulta("div_listado",$("#codigo_exportar").val(),identidad.consulta_filtro,"",false,hola);
	$('#div_listado').doubleScroll();
	
}

function hola(){
	setTimeout(function(){ cargar_tabla() 
	}, 15);
}

function cargar_tabla(){
	
	$('#div_listado table').DataTable({

		retrieve: false,
		paging: true,
		pageLength: 30,
		"ordering":false,
		"responsive": true,
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
		},
		},
		dom: 'Bfrtip',
		buttons: [ 
		// 'copy', 
		'searchPanes','csv', 'excel', 'pdf',
			{ extend: 'print', text: '<i class="fas fa-print"></i>' }
		]

	});

	$('#div_listado table').DataTable().searchPanes.rebuildPane();
}

</script>