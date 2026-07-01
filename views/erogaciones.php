<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_usu_reg">
		  Crear
		</button><br><br></div>
</div>

<div id="div_listado"></div>

<!-- Modal -->
<div class="modal fade" id="modal_usu_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Erogaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	  <form  id="registro" enctype="multipart/form-data" method="post">
		  <input type="hidden" id="codigo_usuario" name="codigo_usuario" value="0"/>
        	
		<div class="container">
		  <div class="row">
		    <div class="col"><h4> Identificación</h4></div>
		  </div>

		    <div class="row">  
	

		    <div class="col">

		    	<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Tipo</span>
					</div>
					<select class="form-control" name="tipo_documento" id="tipo_documento">
						<option value="0">Seleccione</option>
						<option value="cc">Cedula de Ciudadanía</option>
						<option value="nit">Nit</option>
					</select>		
				</div>

		    </div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">No.</span>
					</div>
					<input type="text" name="identificacion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>	

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Nombre</span>
					</div>
					<input type="text" name="nombre" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>	

		</div>

					
		<div class="row">
					<div class="col">
 						
						 <div class="input-group mb-3">
							   <div class="input-group-prepend">
								 <span class="input-group-text" id="basic-addon1">Tipo</span>
							   </div>
							   <select name="tipo" id="tipo">
							   		<option value="EROGACIÓN">EROGACIÓN</option> 
									<option value="PAPELERIA">PAPELERIA</option> 
									<option value="PARQUEO">PARQUEO</option> 
									<option value="REPARACION MOTOS">MOTOS</option> 
									<option value="ADECUACIONES LOCATIVAS">ADECUACIONES LOCATIVAS</option> 
									<option value="MEJORAS LOCATIVAS">MEJORAS LOCATIVAS</option> 
									<option value="ACTIVOS">ACTIVOS</option> 
									<option value="SERVICIOS PUBLICOS">SERVICIOS PUBLICOS</option> 
									<option value="ARRENDAMIENTO">ARRENDAMIENTO</option> 
									<option value="SERV SEGURIDAD">SERV SEGURIDAD</option> 
									<option value="SERV GPS">SERV GPS</option> 
									<option value="HONORARIOS ADM">HONORARIOS ADM</option> 
									<option value="CAFETERIA ">CAFETERIA </option> 
									<option value="ASEO">ASEO</option> 
									<option value="ASEO">OTRO</option> 
								</select>
						 </div>
					 </div>
					<div class="col">
 						
						<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1">Concepto</span>
							  </div>
							  <input type="text" name="concepto" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
						</div>
					</div>
		</div>

 			<div class="row">  

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"># Factura</span>
						</div>
						<input type="text" name="nofactura" class="form-control" >
					</div>
				</div>

				<div class="col">
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1">Valor</span>
						  </div>
						  <input  name="valor" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
						</div>					 
		   		</div>	
	    	</div>
			
		<div class="row">  

			<div class="col">
				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="basic-addon1">Sede Perteneciente</span>
			  		</div>
			  		<select class="form-control" name="codigo_sede" id="codigo_sede"></select>		
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="basic-addon1">Evidencia</span>
						<input type="file" id="archivo" name="archivo" multiple>		
			  		</div>
				</div>
			</div>
		</div>

	   </form>
	   <div class="modal-footer">
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		 <button type="button" class="btn btn-primary" id="btn_grabar">Grabar</button> 	
	   </div>
		</div>
	</div>
    </div>
  </div>
</div>


<script type="text/javascript">

	var identidad = {
		nombre: 'Erogaciones',
		consulta: 'listado_erogaciones',
		consulta_filtro: '',
		tabla:'tbl_erogaciones',
		campos:'tipo_documento,identificacion,nombre,concepto,nofactura,valor,codigo_sede,tipo,codigo_usuario',
		formulario:'tipo_documento,identificacion,nombre,concepto,nofactura,valor,codigo_sede,tipo,codigo_usuario'
	};
	
	$(document).ready(function() {

		$("#btn_crear").bind("click",cargar_select_dialog);

		//$('[name=valor]').maskNumber({integer: true});

	});

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
	console.log(campos);





	$.ajax({
		type: 'POST',
		async: true,
		url: '/app/ajax/registro_editar.php',
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
listado_consulta("div_listado",identidad.consulta,identidad.consulta_filtro);
//$('#div_listado table').DataTable().searchPanes.rebuildPane();
//setTimeout(function(){ cargar_tabla() }, 100);

}

function hola(){
setTimeout(function(){ cargar_tabla() }, 100);
}

function cargar_tabla(){
//table.destroy();

$('#div_listado table').DataTable({
	retrieve: true,
	paging: false,
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

function guardar(){

	var valor= $('[name=valor]').val();
	valor=valor.replaceAll(",","");
	$('[name=valor]').val(valor);

		var f = $(this);
		var formData = new FormData(document.getElementById("registro"));
		formData.append("tabla",identidad.tabla);
		formData.append("campos",identidad.campos);
		formData.append("formulario",identidad.formulario);
		//formData.append(f.attr("name"), $(this)[0].files[0]);
		$.ajax({
			url: '/app/ajax/registro_erogacion.php',
			type: "post",
			dataType: "html",
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		})
			.done(function(res){
				alert(res);
				$('.modal').modal('hide');
				$("#registro")[0].reset();
				cargar_listado();
				//$("#mensaje").html("Respuesta: " + res);
			});
/*
campos=$("#registro").serialize();
campos+="&tabla="+ identidad.tabla;
campos+="&campos="+ identidad.campos;
campos+="&formulario="+ identidad.formulario;
console.log(campos);

$.ajax({
	  type: 'POST',
	  async: false,
	  url: '/app/ajax/registro_guardar.php',
	  data: campos,
	  success: function(data){
	  //console.log("holaaaa");
		alert(data);

		
		$('.modal').modal('hide');
		$("#registro")[0].reset();
		cargar_listado();
	//window.location.reload(true);
	  },
	  dataType: 'text'
});
*/
}

</script>
<script type="text/javascript" charset="utf8" src="views/jquery.masknumber.js"></script>