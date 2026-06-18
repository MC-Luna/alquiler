<?php
// Establecer el tiempo de vida de la sesión en segundos
$session_lifetime = 3600; // 1 hora

// Configurar el tiempo de vida de la sesión
ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params($session_lifetime);

// Iniciar la sesión
session_start();
?>

<style>
	table.dataTable tbody td {
		white-space: pre-line;
	}

	table.dataTable thead td:nth-child(5) {
    	min-width: 160px !important;
	}

	table.dataTable thead td:nth-child(6) {
    	min-width: 410px !important;
	}

	table.dataTable thead td:nth-child(9) {
    	min-width: 300px !important;
	}

	table.dataTable tbody tr td:nth-child(10) {
		min-width: 300px !important;
    	font-size: 0.8em;
	}

	table.dataTable tbody tr td:nth-child(11) {
    	font-size: 0.8em;
	}

	table.dataTable tbody tr td em{
		font-size: 0.9em;
		margin:0;
		padding:0;
	}
	
</style>
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

<!-- Modal -->
<div class="modal fade modal" id="modal_usu_reg" width="300px" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	
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
							<span class="input-group-text" id="basic-addon1">Fecha</span>
						</div>
						<input class="form-control" id="fecha_inicio" name="fecha_inicio" type="date" value="0000-00-00" id="example-datetime-local-input">
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Observaciones</span>
						</div>
						<textarea id="observaciones" name="observaciones" rows="3" cols="5" class="form-control"></textarea>
					</div>
				</div>

				<input type="hidden" id="codigo_usuario_cartera" name="codigo_usuario_cartera" value="<?Php echo $_SESSION['codigo_usuario']; ?>"/>
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

<!-- Modal Acciones -->

<div class="modal fade" id="modal_cambiar_acciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Historial de Acciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form id="registro_acciones" name="registro_acciones">
				<div class="modal-body">
					<div class="row">  

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Fecha</span>
								</div>
								<input type="date" id="fecha_accion" name="fecha_accion" />
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Abono $</span>
								</div>
								<input id="abono" name="abono" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
							</div>
						</div>

						
						<input type="hidden" id="codigo_usuario_accion" name="codigo_usuario_accion" value="<?Php echo $_SESSION['codigo_usuario']; ?>"/>
							

					</div>

					<div class="row">  
						<div class="col">
							<div class="input-group mb-3">

								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Observaciones</span>
								</div>

								<textarea
									id="observacion_accion"
									name="observacion_accion"
									rows="3"
									cols="30"
									class="form-control"></textarea>

							</div>
						</div>
					</div>

					
					<div class="row">  

						<div class="col">
							<div id="div_listado_acciones"></div>
						</div>
					</div>

				</div>
			</form>

			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_grabar_acciones">Grabar</button>

			</div>
		</div>
	</div>
</div>
<!-- Modal Acciones Cierre-->

<!-- Modal Cobros -->
<div class="modal fade" id="modal_cambiar_cobros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Lista de Cobros</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form id="registro_cobros" name="registro_cobros">
				<div class="modal-body">
					<div class="row">  

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Fecha</span>
								</div>
								<input type="date" id="fecha_cobro" name="fecha_cobro" />
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Cobro</span>
								</div>
								<select class="form-control" name="codigo_cobro_concepto" id="codigo_cobro_concepto"></select>		
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Valor $</span>
								</div>
								<input id="valor_cobro" name="valor_cobro" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
							</div>
						</div>
						
						<input type="hidden" id="codigo_usuario_cobro" name="codigo_usuario_cobro" value="<?Php echo $_SESSION['codigo_usuario']; ?>"/>
					</div>

					<div class="row">  
						<div class="col">
							<div class="input-group mb-3">

								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Observaciones</span>
								</div>

								<textarea
									id="observacion_cobro"
									name="observacion_cobro"
									rows="3"
									cols="30"
									class="form-control"></textarea>

							</div>
						</div>
					</div>

					<div class="row">  

						<div class="col">
							<div id="div_listado_cobros"></div>
						</div>
					</div>

				</div>
			</form>

			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_grabar_cobros">Grabar</button>

			</div>
		</div>
	</div>
</div>

<!-- Modal Cobros Cierre-->

<!-- Modal Estados Inicio-->

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
							<input type="hidden" id="codigo_usuario_estado" name="codigo_usuario_estado" value="<?Php echo $_SESSION['codigo_usuario']; ?>"/>
							
							<select class="form-control" name="codigo_estado" id="codigo_estado"></select>		
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

<!-- Modal Estados Cierre-->

<!-- Modal Cartera Inicio-->

<div class="modal fade" id="modal_cierre_cartera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" width="300px">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" >Cierre de Cartera</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<form id="registro_cierre_cartera" name="registro_cierre_cartera">
			<div class="modal-body">

				<div class="row">  

					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Fecha</span>
							</div>
							<input type="date" id="fecha_cierre" name="fecha_cierre" />
						</div>
					</div>

				</div>

				<div class="row">  

					<div class="col">
						<div class="input-group mb-3">

							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Observaciones</span>
							</div>

							<input type="hidden" name="finalizado" value="1" />

							<textarea
								id="observacion_cierre"
								name="observacion_cierre"
								rows="3"
								cols="10"
								class="form-control"></textarea>

						</div>
					</div>

				</div>

			</div>
		</form>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" id="btn_grabar_cierre_cartera">Grabar</button>
		</div>
    </div>
</div>
</div>

<!-- Modal Cartera Cierre-->

<div class="modal" id="modal_comentario" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Observación de Cierre de la Cartera</h5>
	  </div>

      <div class="modal-body">

	  	<div class="row"> 

			<div class="col">
				<label>Fecha de Cierre:</label>
			</div>
			<div class="col">
				<p id='fecha_cierre_cartera'>Fecha de Cierre:</p>
			</div>
		</div>

		<div class="row"> 

		<div class="col">
			<label>Observaciones:</label>
		</div>
		<div class="col">
			<p id='observacion_cierre_cartera'>Fecha de Cierre:</p>
		</div>
		</div>
	  	
	  </div>

	  <div class="modal-footer">
		  <button onclick="cerrarModalComentario()" class="btn btn-secondary" type="button">Cerrar</button>
	  </div>

    </div>
  </div>
</div>




<script type="text/javascript">

	var identidad = {
		nombre: 'Cartera',
		consulta: 'listado_carteras_admin',
		consulta_filtro: ' group by ct.codigo_cartera',
		tabla:'tbl_carteras',
		campos:'codigo_contrato,fecha_inicio,observaciones,codigo_usuario',
		formulario:'codigo_contrato,fecha_inicio,observaciones,codigo_usuario_cartera'
	};

	var cod_cartera=0;

	$(document).ready(function() {

		//$("#btn_crear").bind("click",cargar_select_dialog);

		$("#codigo_select").on("change",function(){
			res=consultar_campo("tbl_usuarios_tipos","tabla_origen,campo_tabla_origen","codigo_tipo_usuario=1");
			resultado=res.split(";");
			tabla_origen=resultado[0];
			campo_tabla=resultado[1];
			console.log(tabla_origen); 
			rellenar_select(tabla_origen,campo_tabla,"concat(nombres,' ',apellidos)","","codigo_origen");
		});

		rellenar_select("tbl_contratos inner join tbl_clientes on tbl_clientes.codigo_cliente = tbl_contratos.codigo_cliente inner join tbl_motos on tbl_motos.codigo_moto = tbl_contratos.codigo_moto","codigo_contrato","concat(tbl_contratos.codigo_contrato,' > ',tbl_clientes.nombres,' ',tbl_clientes.apellidos, ' > ', tbl_motos.placa)","1","codigo_contrato");
		rellenar_select("tbl_cobro_conceptos","codigo_cobro_concepto","descripcion"," 1","codigo_cobro_concepto");
		rellenar_select("tbl_cartera_estados","codigo_estado","descripcion"," 1","codigo_estado");

		$("#btn_grabar_acciones").bind("click",guardar_acciones);
		$("#btn_grabar_cobros").bind("click",guardar_cobros);
		$("#btn_grabar_estados").bind("click",guardar_estados);
		$("#btn_grabar_cierre_cartera").bind("click",guardar_cierre_cartera);


		$('#titulo_view').html(identidad.nombre);

		/*
		$(document).on('click','.editar', function(e){

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
				url: '/ajax/registro_editar.php',
				data: campos,
				success: function(data){
					alert(data);
					cargar_listado();
					return false;
				},
				dataType: 'text'
			});

			return false;

		});
		*/

		// CARGAR INICIO
		cargar_listado();

	});

	function cargar_select_dialog(){
		rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)","1","sedemoto");
		rellenar_select("tbl_ciudades","codigo_ciudad","CONCAT(codigo_departamento,' > ',nombre)"," codigo_pais='COL' order by codigo_departamento ","ubicacion");
	}

	function cargar_listado(){
		listado_consulta2("div_listado",identidad.consulta,identidad.consulta_filtro,1,true,hola);
		//$('#div_listado table').DataTable().searchPanes.rebuildPane();
		//setTimeout(function(){ cargar_tabla() }, 100);
	}

	function listado_consulta2(div,consulta,filtro,opcion,modo,callback){
		console.log(" Consulta ", opcion);
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
			opcion: 1
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

	// FUNCIONES PARA EL MODULO DE ESTADOS

	function cambiar_estado(codigo_cartera){
		cod_cartera=codigo_cartera;
		$('#modal_cambiar_estado').modal('show');
		cargar_listado_estados();
	}

	function cargar_listado_estados(){
		listado_consulta2("div_listado_estados","listado_cartera_estados","WHERE cts.codigo_cartera="+cod_cartera,"",true);
	}

	function guardar_estados(){
		if($("#codigo_usuario_estado").val()==""){
			alert("Se cerro la sesión. Por favor, recargar la pagina");
			return false;
		}

		if($("#fecha_estado").val()==""){
			alert("Debe ingresar una fecha");
			$("#fecha_estado").focus();
			return false;
		}else{
			campos=$("#registro_estados").serialize();
			campos+="&codigo_cartera="+cod_cartera;
			campos+="&tabla=tbl_cartera_sucesos";
			campos+="&campos=codigo_usuario,codigo_cartera,descripcion,fecha,codigo_estado";
			campos+="&formulario=codigo_usuario_estado,codigo_cartera,observacion_estado,fecha_estado,codigo_estado";
			console.log(campos);

			$.ajax({
				type: 'POST',
				async: false,
				url: '/ajax/registro_guardar.php',
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

	// FUNCIONES PARA EL MODULO DE ACCIONES

	function agregar_accion(codigo_cartera){
		cod_cartera=codigo_cartera;
		$('#modal_cambiar_acciones').modal('show');
		cargar_listado_acciones();
	}

	function cargar_listado_acciones(){
		listado_consulta2("div_listado_acciones","listado_cartera_acciones","WHERE cta.codigo_cartera="+cod_cartera,"",true);
	}

	function guardar_acciones(){
		if($("#codigo_usuario_accion").val()==""){
			alert("Se cerro la sesión. Por favor, recargar la pagina");
			return false;
		}

		if($("#fecha_accion").val()==""){
			alert("Debe ingresar una fecha");
			$("#fecha_accion").focus();
			return false;
		}else{
			campos=$("#registro_acciones").serialize();
			campos+="&codigo_cartera="+cod_cartera;
			campos+="&tabla=tbl_cartera_acciones";
			campos+="&campos=codigo_usuario,codigo_cartera,abono,descripcion,fecha";
			campos+="&formulario=codigo_usuario_accion,codigo_cartera,abono,observacion_accion,fecha_accion";
			console.log(campos);

			$.ajax({
				type: 'POST',
				async: false,
				url: '/ajax/registro_guardar.php',
				data: campos,
				success: function(data){
				},
				dataType: 'text'
			}).done(function( data ){
				alert(data);
				//$('.modal').modal('hide');
				$("#registro_acciones")[0].reset();
				cargar_listado_acciones();
			});
		}
	}

	// FUNCIONES PARA EL MODULO DE CONCEPTOS DE COBROS

	function agregar_cobro(codigo_cartera){
		cod_cartera=codigo_cartera;
		$('#modal_cambiar_cobros').modal('show');
		cargar_listado_cobros();
	}

	function cargar_listado_cobros(){
		listado_consulta2("div_listado_cobros","listado_cartera_cobros","WHERE ctc.codigo_cartera="+cod_cartera,"",true);
	}

	function guardar_cobros(){
		if($("#codigo_usuario_cobro").val()==""){
			alert("Se cerro la sesión. Por favor, recargar la pagina");
			return false;
		}

		if($("#fecha_cobro").val()==""){
			alert("Debe ingresar una fecha");
			$("#fecha_cobro").focus();
			return false;
		}else{
			campos=$("#registro_cobros").serialize();
			campos+="&codigo_cartera="+cod_cartera;
			campos+="&tabla=tbl_cartera_cobros";
			campos+="&campos=codigo_usuario,codigo_cartera,valor,observaciones,fecha,codigo_cobro_concepto";
			campos+="&formulario=codigo_usuario_cobro,codigo_cartera,valor_cobro,observacion_cobro,fecha_cobro,codigo_cobro_concepto";
			console.log(campos);

			$.ajax({
				type: 'POST',
				async: false,
				url: '/ajax/registro_guardar.php',
				data: campos,
				success: function(data){
				},
				dataType: 'text'
			}).done(function( data ){
				alert(data);
				//$('.modal').modal('hide');
				$("#registro_cobros")[0].reset();
				cargar_listado_cobros();
			});
		}
	}

// FUNCIONES PARA EL MODULO DE CIERRE DE CARTERA

function CierreCartera(codigo_cartera){
	$('#modal_cierre_cartera').modal('show');
	cod_cartera=codigo_cartera;
}

function guardar_cierre_cartera(){
		if($("#observacion_cierre").val()==""){
			alert("Debe ingresar una observación para el cierre");
			return false;
		}		

		if($("#fecha_cierre").val()==""){
			alert("Debe ingresar una fecha");
			$("#fecha_cierre").focus();
			return false;
		}else{

			let tabla = 'tbl_carteras';
			let filtro='codigo_cartera='+cod_cartera;
			//campos=$("#registro_cierre_cartera").serialize();
			//campos+="&codigo_cartera="+cod_cartera;
			//console.log(campos);

			resultado = actualizar_registro(tabla,"registro_cierre_cartera",filtro,2);
			if(resultado.resultado==1){
				alert(resultado.mensaje);
				cargar_listado();
				$("#modal_cierre_cartera").modal('hide');
			}
			else{
				alert(resultado.mensaje);
			}

		}

}

function comentario_cierre(codigo_cartera){

	res=consultar_campo("tbl_carteras","observacion_cierre,fecha_cierre","codigo_cartera="+codigo_cartera);
	resultado=res.split(";");
	observacion=resultado[0];
	fecha=resultado[1];

	$('#fecha_cierre_cartera').html(fecha);
	$('#observacion_cierre_cartera').html(observacion);
	$('#modal_comentario').modal('show');

}

function cerrarModalComentario(){
	$('#modal_comentario').modal('hide');
}



</script>
<script type="text/javascript" charset="utf8" src="views/views3.js?231041"></script>
