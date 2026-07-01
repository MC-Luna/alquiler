<?php
session_start();
?>

<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_usu_reg">
		  Crear 
		</button>
		<br><br>
	</div>
</div>

<div id="div_listado"></div>

<?php require_once "forms-motos2.php";?>


<!-- Modal -->

<div class="modal fade" id="modal_usu_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">

      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>

      		<div class="modal-body">
        		<form  id="registro">	

        	 		<div class="row">  

		    			<div class="col">
	        				<div class="input-group mb-3">
			  					<div class="input-group-prepend">
			    					<span class="input-group-text" id="basic-addon1">Placa</span>
			  					</div>

			  					<input type="text" name="placamoto" class="form-control" placeholder="" aria-label="placa" aria-describedby="basic-addon1">

							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
			  					<div class="input-group-prepend">
			    					<span class="input-group-text" id="basic-addon1">Marca</span>
			  					</div>

			  					<select class="form-control" name="marcamoto" id="marcamoto">
									<option value="AUTECO">AUTECO</option>
									<option value="BAJAJ">BAJAJ</option>
									<option value="AKT">AKT</option>
									<option value="VICTORY">VICTORY</option>
									<option value="COMBAT">COMBAT</option>
									<option value="ADVANCE">ADVANCE</option>
									<option value="ELECTRIKA">ELECTRIKA</option>
									<option value="YAMAHA">YAMAHA</option>
									<option value="KYMCO">KYMCO</option>
									
			  					</select>		

							</div>

						</div>

						<div class="col">
							<div class="input-group mb-3">
			  					<div class="input-group-prepend">
			    					<span class="input-group-text" id="basic-addon1">Linea</span>
			  					</div>
			  					<input type="text" name="lineamoto" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	
							</div>
						</div>

					</div>

		 			<div class="row">  

		    			<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Modelo</span>
								</div>

								<select class="form-control" name="modelomoto" id="modelomoto">
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>	
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024" id="2023">2024</option>
									<option value="2025" id="2023">2025</option>
									<option value="2026" id="2023">2026</option>
									<option value="2027" id="2023">2027</option>
									<option value="2028" id="2023">2028</option>
									<option value="2029" id="2023">2029</option>
									<option value="2030" id="2023">2030</option>
								</select>	
							</div>
						</div>





			 <div class="col">

			<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Transmision</span>

			  </div>

			  <select class="form-control" name="Transmisionmoto" id="Transmisionmoto">
			  		<option value="Sincronica">Sincronica</option>
			  		<option value="Automatica">Automatica</option>
			  		<option value="Semiautomatica">Semiautomatica</option>
			  		<option value="Electrica">Eléctrica</option>
			  </select>		

			</div>

			</div>



			 <div class="col">

				<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Color</span>

					</div>

				<input type="text" name="colormoto" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	

				</div>

			</div>

			</div>


			<div class="row">
				<div class="col">
					<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Sede Perteneciente</span>
					</div>
					<select class="form-control" name="sedemoto" id="sedemoto"></select>		
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Ubicación</span>
						</div>
						<select class="form-control" name="ubicacion2" id="ubicacion2"></select>		
					</div>
				</div>
			</div>

			<div class="row">

			<div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Chasis</span>

			  </div>

			  <input type="text" name="chasis" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	

			</div>

			</div>



			<div class="col">

			<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Cilindraje</span>

			  </div>

			  <input type="text" name="cilindraje" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	

			</div>

			</div>

			<div class="col">

			<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Precio $</span>

			  </div>

			  <input name="precio" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	

			</div>

			</div>



			</div>



			<div class="row">  

				<div class="col">

				<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Fecha de Compra</span>

			  </div>

			   <input class="form-control" name="fechacompra" type="date" id="example-datetime-local-input">

			</div>

			</div>



		    <div class="col">

		    	<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Costo $</span>

			  </div>

			  <input type="number" name="costomoto" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	

			</div>



		   </div>


		   </div> 	
		   
		   <div class="row">
				<div class="col">
					<div class="input-group mb-3">

						<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Matriculado en </span>

						</div>

					<input type="text" id="matriculado_lugar" name="matriculado_lugar" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	
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






<!-- Modal -->

<div class="modal fade" id="modal_cambiar_estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Historial de Sucesos</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

<form id="registro_estados" name="registro_estados">
	<div class="modal-body">

		<div class="row">
			
		</div>
		<div class="row">  

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Fecha</span>
					</div>
					<input type="date" id="fecha_estado" name="fecha_estado" />
				</div>
			</div>

			<div class="col">

				<div class="input-group mb-3">

				<div class="input-group-prepend">

					<span class="input-group-text" id="basic-addon1">Nuevo Estado</span>

				</div>
				<input type="hidden" id="codigo_usuario" name="codigo_usuario" value="<?Php echo $_SESSION['codigo_usuario']; ?>"/>
				<select class="form-control" name="codigo_estado" id="codigo_estado">
				</select>		

				</div>

			</div>

		</div>

		<div class="row">  

			<div class="col">

				<div class="input-group mb-3">

					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Observaciones</span>
					</div>

					<textarea
						id="observacion_estado"
						name="observacion_estado"
						rows="3"
						cols="30"
						class="form-control"></textarea>

				</div>
			</div>
		</div>

		
		<div class="row">  

			<div class="col">
				<div id="div_listado_estados"></div>
			</div>
		</div>

	</div>
</form>

    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_grabar_estados">Grabar</button>

      </div>

    </div>

  </div>

</div>
</div>

<script type="text/javascript">

<?Php echo "var codigo_rol=". $_SESSION['codigo_rol'] .";"; ?>

	var filtro_moto="";

	if(codigo_rol==6){
		filtro_moto= " s.codigo_sede IN (10,11)";
	}else{
		filtro_moto= " 1 ";
	}

	var identidad = {
		nombre: 'Motos',
		prueba:1,
		consulta: 'listado_motos',
		consulta_filtro: filtro_moto,
		tabla:'tbl_motos',
		campos:'placa,marca,linea,modelo,transmision,color,fecha_compra,costo,codigo_sede,chasis,cilindraje,precio,ubicacion,matriculado_lugar',
		formulario:'placamoto,marcamoto,lineamoto,modelomoto,Transmisionmoto,colormoto,fechacompra,costomoto,sedemoto,chasis,cilindraje,precio,ubicacion2,matriculado_lugar'

	};

	$(document).ready(function() {

		$("#btn_crear").bind("click",cargar_select_dialog);

		$("#codigo_select").on("change",function(){

			res=consultar_campo("tbl_usuarios_tipos","tabla_origen,campo_tabla_origen","codigo_tipo_usuario=1");
			resultado=res.split(";");
			tabla_origen=resultado[0];
			campo_tabla=resultado[1];
			console.log(tabla_origen); 

			rellenar_select(tabla_origen,campo_tabla,"concat(nombres,' ',apellidos)","","codigo_origen");

		});

		rellenar_select("tbl_moto_estados","codigo_estado","descripcion","1","codigo_estado");
		rellenar_select("tbl_mantenimiento_moto_conceptos","codigo_concepto","descripcion","1","codigo_concepto");
		rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," transversal=1 or codigo_sede="+codigo_sede,"codigo_cuenta");

		var filtro_beneficiario;

		if (codigo_rol==1){
			filtro_beneficiario=" 1 order by razon_social";
		}else{
			filtro_beneficiario=" codigo_sede in (4," + codigo_sede + ") order by razon_social";
		}

		rellenar_select("tbl_proveedores","codigo_proveedor","razon_social",filtro_beneficiario,"codigo_proveedor");
		rellenar_select("tbl_ciudades","codigo_ciudad","CONCAT(codigo_departamento,' > ',nombre)"," codigo_pais='COL' order by codigo_departamento ","ubicacion");

	});

	function cargar_select_dialog(){

		rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)","1","sedemoto");
		rellenar_select("tbl_ciudades","codigo_ciudad","CONCAT(codigo_departamento,' > ',nombre)"," codigo_pais='COL' order by codigo_departamento ","ubicacion2");

	}

</script>

<script type="text/javascript">

function actualizar_categoria(id_mantenimiento){
	var edicion_c="";
	edicion_c="tabla=tbl_mantenimiento_motos";
	edicion_c+="&tabla_id=id_mantenimiento";
	edicion_c+="&codigo="+ id_mantenimiento;
	edicion_c+="&campo=codigo_concepto";
	edicion_c+="&valor="+ $('#concepto_actualizar').val();

	$.ajax({

		type: 'POST',
		async: true,
		url: '/app/ajax/registro_editar.php',
		data: edicion_c,
		success: function(data){
			alert(data);
			$('#concepto_actualizar').parent().html($( "#concepto_actualizar option:selected" ).text());
			//$('.modal').modal('hide');
			return false;
		//window.location.reload(true);
		},

		dataType: 'text'

		});
}

$(document).ready(function() {

	var cod_moto=0;

	$("#btn_grabar_estados").bind("click",guardar_estado);

	$('#titulo_view').html(identidad.nombre);

	$(document).on('click','.editar_categoria', function(e){

		var id_mantenimiento=$(this).data("id_mantenimiento");
		var indice = $(".editar_categoria").index(this);
		var select= $("#codigo_concepto").html();
		//select = select.replace("codigo_concepto", "codigo_concepto_actualizar");
		select ="<select id='concepto_actualizar'>"+select+"</select><button onclick='actualizar_categoria("+id_mantenimiento+")'>Actualizar</button>";
		$(this).parent().html(select);
		//$("#codigo_concepto").clone().appendTo( ".editar_categoria" ).eq(indice);
		//$($this).parent().html()
	});




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
				alert(data);
				//$('.modal').modal('hide');
				cargar_listado();
				return false;

			},
			dataType: 'text'

		});

		return false;

	});

	// CARGAR INICIO
	cargar_listado();

});

function cargar_listado(){

	if(codigo_rol==6){
		identidad.consulta_filtro= " s.codigo_sede IN (10,11)";
		alert("h1");
	}

	listado_consulta2("div_listado",identidad.consulta,identidad.consulta_filtro,"",true,hola);
	//$('#div_listado table').DataTable().searchPanes.rebuildPane();
	//setTimeout(function(){ cargar_tabla() }, 100);

}

function cargar_listado_estados(){
	listado_consulta2("div_listado_estados","moto_sucesos","WHERE ms.codigo_moto="+cod_moto,"",true);
}

function listado_consulta2(div,consulta,filtro,opcion,modo,callback){

console.log("MOSTRANDO OPCION", filtro);
data_div="";

if (modo==undefined) {
modo=false;
}

$.ajax({
	type: 'POST',
	async: modo,
	url: 'ajax/listado_consulta3.php',
	data:{
	consulta: consulta,
	filtro: filtro,
	opcion: opcion
	},
	success: function(data){

	console.log(data);
	if ( data.resultado==0 ) {
		data_div=data.mensaje;
	}else{
		data_div=data.mensaje;
	}
	if(callback){
		//alert("h1");
		callback();
	}
	},
	dataType: 'json'
}).done(function(res){

	$("#"+div+"").html(data_div);
	$("#"+div+"").doubleScroll();

	res=consultar_campo("tbl_conf_consultas","datatable,paging,pageLength","nombre_consulta='"+consulta+"'");
	resultado=res.split(";");
	var datatable=parseInt(resultado[0]);
	var paging=(parseInt(resultado[1]));
	var pageLength=resultado[2];

	if(datatable){
		let opciones = {
			div:div,
			paging:paging,
			pageLength:pageLength
		}
	
		cargar_datatable(opciones);
		
	}
	
});

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


		let perfilUser=document.querySelectorAll("#perfilMoto");

			perfilUser.forEach((element) => {

				element.addEventListener('click', (e) => {mostrarModalEditar(e,"ModuloMotos")});

			})

	
}

function guardar_estado(){

	if($("#fecha_estado").val()==""){
		alert("Debe ingresar una fecha");
		$("#fecha_estado").focus();
		return false;
	}else{
		campos=$("#registro_estados").serialize();
		campos+="&codigo_moto="+cod_moto;
		campos+="&tabla=tbl_moto_sucesos";
		campos+="&campos=codigo_usuario,codigo_moto,codigo_estado,descripcion,fecha";
		campos+="&formulario=codigo_usuario,codigo_moto,codigo_estado,observacion_estado,fecha_estado";
		console.log(campos);

		$.ajax({
			type: 'POST',
			async: false,
			url: '/app/ajax/registro_guardar.php',
			data: campos,
			success: function(data){
			},
			dataType: 'text'
		}).done(function( data ){
			alert(data);
			//$('.modal').modal('hide');
			$("#registro_estados")[0].reset();
			cargar_listado_estados();
		});

	}
	
}

function cambiar_estado(codigo_moto){
	cod_moto=codigo_moto;
	$('#modal_cambiar_estado').modal('show');
	cargar_listado_estados();
}

</script>
<script type="text/javascript" charset="utf8" src="views/views3.js?20260701"></script>