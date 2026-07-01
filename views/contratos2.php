<style>
    /* width */
    ::-webkit-scrollbar {
    width: 10px;
    height: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #95dae4; 
    border-radius: 10px;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #6cccda; 
    border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #2da2b3; 
    border-radius: 10px;
    }

    #div_listado{
        font-size:0.8em;
        padding-top:5px;
    }

	.double-scroll {
        width: 400px;
    }
    </style>

<!-- MAGNIFIC POPUP -->
<link rel="stylesheet" href="/css/magnificPopup.css" />
<script type="text/javascript" src="/app/js/magnificPopup.js"></script>


<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_usu_con">
		  Crear
		</button>
		<br><br>
	</div>
</div>


<div id="div_listado" style="width:100%"></div>

<?php require_once "formulario-crear.php";?>

<?php require_once "formulario-editar.php";?>

<?php require_once "forms-motos.php";?>


<!-- Modal -->
<div class="modal fade" id="modal_usu_con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Contratos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  name="registro_contrato" id="registro_contrato" enctype="multipart/form-data">	


			<div class="row"> 
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Tipo de Contrato</span>
						</div>

						<select name="codigo_tipo_contrato" id="codigo_tipo_contrato"  class="form-control">
						</select>
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Deposito</span>
					</div>

					<input type="number" name="deposito" class="form-control" placeholder="" aria-label="valar" aria-describedby="basic-addon1">
						
					</select>

					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3" >
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Extras</span>
					</div>

					<input type="number" name="extras" class="form-control" placeholder="" aria-label="extras" aria-describedby="basic-addon1">
						
					</select>
					</div>
				</div>

			</div>

        	 <div class="row">  
	

		    <div class="col">

	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Inicio</span>
			  </div>
			  <input class="form-control" name="fechainicio" type="date" value="0000-00-00" id="example-datetime-local-input">
			</div>
			</div>

			<div class="col">

	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Final</span>
			  </div>
			  <input class="form-control" name="fechafinal" type="date" value="0000-00-00" id="example-datetime-local-input">
			</div>
			</div>

			<div class="col">

	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Frecuencia( dias) </span>
			  </div>
			  <input type="number" name="frecuencia" class="form-control" placeholder="" aria-label="placa" aria-describedby="basic-addon1">
			</div>
			</div>

			
			</div>



			 <div class="row">  
				 
				 
		    <div class="col">
				
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Proximo Cobro</span>
					</div>
					<input class="form-control" name="proximocobro" type="date" value="0000-00-00" id="example-datetime-local-input">
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Valor</span>
					</div>
					<input type="number" name="valor" class="form-control" placeholder="" aria-label="valar" aria-describedby="basic-addon1">
				</div>
			</div>
			
		</div>

		<div class="row"> 

			<div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Sede:</span>
			  </div>
			  <select class="form-control" id="codigo_sede" name="codigo_sede" aria-label="valar" aria-describedby="basic-addon1">
			  	
			  </select>
			</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Kilometraje</span>
					</div>
					<input type="number" name="kim_inicial" class="form-control" placeholder="" aria-label="kilometraje" aria-describedby="basic-addon1">
				</div>
			</div>

		</div>

		<div class="row"> 
			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Cliente</span>
					</div>

					<select name="codigo_cliente" id="codigo_cliente_f"  class="form-control">
						
					</select>
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Motos</span>
				</div>

				<select name="codigo_moto" id="codigo_moto_f"  class="form-control"> 
					
				</select>

				</div>
			</div>

		</div>



		<div class="row">
							
			<div class="col"><br>   	
				<h4> Adjuntos</h4>		
			</div> 
		</div>

		<div class="row">

			<div class="col">

				<div class="mb-3">

				<label for="formFile" class="form-label">Soporte de Contrato</label>

				<input name="cedula" class="form-control" type="file" id="formFile">

				</div>					

			</div>
		</div>

		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="guardar_contrato()" id="btn_grabar">Grabar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_fecha_nueva_final" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Coloque una nueva fecha final al contrato</h5>
	  </div>

      <div class="modal-body">

	  	<form id="form_update_estado_contrato">

			<div class="input-group mb-3">
				<input id="fecha_nueva_final" name="fecha_nueva_final" type="date" class="form-control">
			</div>
			<div class="input-group mb-3">
				<textarea
				id="observacion_cierre"
				name="observacion_cierre"
				rows="5"
				cols="30"
				placeholder="Observaciones"
				class="form-control"></textarea>
			</div>

		</form>

	  </div>

	  <div class="modal-footer">
		  <button id="changeFechaFinal" class="btn btn-primary" type="button">Guardar</button>
		  <button id="btnCerrarModalFechaFinal" class="btn btn-secondary" type="button">Cerrar</button>
	  </div>

	  
    </div>
  </div>
</div>

<div class="modal" id="modal_comentario" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Observación de Cierre del Contrato</h5>
	  </div>

      <div class="modal-body">

	  	<div class="row"> 

			<div class="col">
				<label>Fecha de Cierre:</label>
			</div>
			<div class="col">
				<p id='fecha_cierre_contrato'>Fecha de Cierre:</p>
			</div>
		</div>

		<div class="row"> 

		<div class="col">
			<label>Observaciones:</label>
		</div>
		<div class="col">
			<p id='observacion_cierre_contrato'>Fecha de Cierre:</p>
		</div>
		</div>

	  	
		  
	  </div>

	  <div class="modal-footer">
		  <button onclick="cerrarModalComentario()" class="btn btn-secondary" type="button">Cerrar</button>
	  </div>

    </div>
  </div>
</div>

<iframe style='display:none' name='externo' src="" width="100%" height="900px" frameborder="0" scrolling=yes marginwidth="0" marginheight="0" align="center"></iframe>


<div class="modal" id="modal_depositos" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 id="modal_title_deposito" class="modal-title">Depositos</h5>
	  </div>

      <div class="modal-body">

	  	<form id="form_deposito">

		  	<div class="row"> 
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Tipo</span>
						</div>

						<select name="tipo" id="tipo"  class="form-control">
							<option value="in">◄ Deposito</option> 
							<option value="out">► Devolución</option>
						</select>
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Fecha</span>
						</div>

						<input id="fecha" name="fecha" type="date" class="form-control">
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Forma de Pago</span>
						</div>

						<select  class="form-control">
							<option value="Efectivo">Efectivo</option>
							<option value="Tarjeta de Credito">Tarjeta de Credito</option>
							<option value="Consignacion">Consignación</option>
							<option value="Transferencia">Transferencia</option>
							<option value="PayPal">PayPal</option>
							<option value="Otro">Otro</option>
						</select>
					</div>
				</div>


			</div>
			<div class="row">

				

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1" class="form-control">Banco</span>
						</div>

						<select id="codigo_banco" name="codigo_banco" style="">
							<option value="0">Seleccione el Banco</option>
							<option value="1">Bancamia S.a.</option>
							<option value="2">Banco Agrario</option>
							<option value="3">Banco Av Villas</option>
							<option value="4">Banco Bbva Colombia S.a.</option>
							<option value="5">Banco Caja Social</option>
							<option value="6">Banco Cooperativo Coopcentral</option>
							<option value="7">Banco Credifinanciera</option>
							<option value="8">Banco Davivienda</option>
							<option value="9"> Banco De Bogota</option>
							<option value="10">Banco De Occidente</option>
							<option value="11">Banco Falabella </option>
							<option value="12">Banco Gnb Sudameris</option>
							<option value="13">Banco Itau</option>
							<option value="14">Banco Pichincha S.a.</option>
							<option value="15">Banco Popular</option>
							<option value="16">Banco Santander Colombia</option>
							<option value="17">Banco Serfinanza</option>
							<option value="18">Bancolombia</option>
							<option value="19">Bancoomeva S.a.</option>
							<option value="20">Cfa Cooperativa Financiera</option>
							<option value="21">Citibank </option>
							<option value="22">Coltefinanciera</option>
							<option value="23">Confiar Cooperativa Financiera</option>
							<option value="24">Cotrafa</option>
							<option value="25">Daviplata</option>
							<option value="26">Giros Y Finanzas Compañia De Financiamiento S.a.</option>
							<option value="27">Movii S.a.</option>
							<option value="28">Nequi</option>
							<option value="29">Rappipay</option>
							<option value="30">Scotiabank Colpatria</option>
						</select>
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Referencia</span>
						</div>

						<input id="referencia" name="referencia" type="text" class="form-control">
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col">
					<div id="div_listado_depositos"></div>
				</div>

			</div>

			<input type="hidden" name="codigo_contrato_deposito" value="0"/>

		</form>

	  </div>

	  <div class="modal-footer">
		  <button id="btn_guardar_deposito" class="btn btn-primary" type="button">Guardar</button>
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	  </div>

	  
    </div>
  </div>
</div>


<script type="text/javascript">

	var form=document.querySelector('#form_update_estado_contrato');

	if(typeof btnModalFechaFinal == 'undefined'){
		let btnModalFechaFinal=document.querySelector('#changeFechaFinal');
		btnModalFechaFinal.addEventListener('click', changeFechaFinal);
	}

	if(typeof btnCerrarModal == 'undefined'){
		let btnCerrarModal=document.querySelector('#btnCerrarModalFechaFinal');
		btnCerrarModal.addEventListener('click', cerrarModal);
	}

	function cerrarModal(){
		
		$('#modal_fecha_nueva_final').modal('hide');
		///cargar_listado();
		
	}

	function cerrarModalComentario(){
		$('#modal_comentario').modal('hide');
	}

		//console.log("btnModalFecha", btnModalFechaFinal);

		function changeFechaFinal(){

			let inputFecha=form.querySelector('#fecha_nueva_final');
			let inputObservacion=form.querySelector('#observacion_cierre');
		
			if(inputFecha.value == ""){
				alert('Debe seleccionar una nueva fecha final al contrato');
				return;
			}

			if(inputObservacion.value == ""){
				alert('Debe ingresar una observación');
				return;
			}

			if(confirm('Seguro que desea dar de baja este contrato?')){

			
				let url="/app/ajax/registro_editar.php";
				let data=new FormData(form);
			
				fetch(url, {
					method: 'POST',
					body: data
				}).then(response => response.json())
				.then(lainformacion => {

					console.log("RESPUESTAAPI", lainformacion);
					
					if(lainformacion.exito){
						alert(lainformacion.exito);
						$('#modal_fecha_nueva_final').modal('hide');
						cargar_listado();
					}else{
						alert(lainformacion.error);
					}
					
				});

			}

		}

	var identidad = {
		id_fomulario: '#registro_contrato',
		prueba: 1,
		tipoEjecucion: 'createContrato',
		nombre: 'Contratos',
		consulta: 'listado_contratos2',
		consulta_filtro: '1 ORDER BY activo_moto DESC, codigo_contrato desc',
		tabla:'tbl_contratos',
		campos:'codigo_tipo_contrato,fecha_inicio_contrato,fecha_final_contrato,frecuencia_cobro,fecha_proximo_cobro,valor_pagar,codigo_moto,codigo_cliente',
		formulario:'codigo_tipo_contrato,fechainicio,fechafinal,frecuencia,proximocobro,valor,codigo_moto,codigo_cliente'
	};

	$(document).ready(function() {

		//$("#btn_grabar").bind("click",guardar_contrato);

			rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)","1","codigo_sede");

			rellenar_select("tbl_clientes","codigo_cliente","concat(nombres,'  ',apellidos)","1 ORDER BY nombres","codigo_cliente_f");

			rellenar_select("tbl_contrato_tipos","codigo_tipo_contrato","descripcion"," 1 ","codigo_tipo_contrato");

		$("#codigo_sede").bind("change",function(){
			cargar_motos($(this).val());
		});

		$("#btn_crear").bind("click",cargar_select_dialog);

		$("#codigo_select").on("change",function(){
			res=consultar_campo("tbl_usuarios_tipos","tabla_origen,campo_tabla_origen","codigo_tipo_usuario=1");
			resultado=res.split(";");

			tabla_origen=resultado[0];
			campo_tabla=resultado[1];

			console.log(tabla_origen); 

			rellenar_select(tabla_origen,campo_tabla,"concat(nombres,' ',apellidos)","","codigo_origen");

		});

	
	});

	function registrar_deposito(codigo_contrato){
		$('#modal_depositos').modal('show');
		var dep=consultar_campo("tbl_contratos","format(deposito,0) deposito","codigo_contrato="+codigo_contrato);
		$('#modal_title_deposito').html("Deposito $ "+ dep);
		$('#codigo_contrato_deposito').val(codigo_contrato);
	}

	function guardar_deposito(){

		var f = $(this);
		var formData = new FormData(document.getElementById("registro_deposito"));

		$.ajax({
			url: '/app/ajax/registro_contrato.php',
			type: "post",
			dataType: "html",
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		}).done(function(res){

				Swal.fire({
					title: "Deposito Registrado",
					html: res,
					icon: "success"
				});

				$('.modal').modal('hide');
				$("#registro_deposito")[0].reset();
				///cargar_listado();
				//$("#mensaje").html("Respuesta: " + res);

		});
		}



	function comentario_cierre(codigo_contrato){

		res=consultar_campo("tbl_contratos","observacion_cierre,fecha_final_contrato","codigo_contrato="+codigo_contrato);
		resultado=res.split(";");
		observacion=resultado[0];
		fecha=resultado[1];

		$('#fecha_cierre_contrato').html(fecha);
		$('#observacion_cierre_contrato').html(observacion);
		$('#modal_comentario').modal('show');

	}

	function cargar_motos(codigo_sede){
		console.log("CODIGOSEDE",codigo_sede)
		filtro="codigo_sede="+codigo_sede+" AND m.estado_moto = 0 or m.estado_moto= 6";
		rellenar_select("tbl_motos m","m.codigo_moto","concat(m.placa,'-',m.linea )",filtro,"codigo_moto_f");
	}

	function cargar_select_dialog(){
		rellenar_select("tbl_sedes","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)"," inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","sedemoto");
	}

	function guardar_contrato(){

		var f = $(this);
		var formData = new FormData(document.getElementById("registro_contrato"));

		$.ajax({
			url: '/app/ajax/registro_contrato.php',
			type: "post",
			dataType: "html",
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		}).done(function(res){

				Swal.fire({
					title: "Contrato Registrado",
					html: res,
					icon: "success"
				});

				$('.modal').modal('hide');
				$("#registro_contrato")[0].reset();
				cargar_listado();
				//$("#mensaje").html("Respuesta: " + res);

		});
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


function documento(){

}

</script>
<script type="text/javascript" charset="utf8" src="views/views3.js?20260701"></script>
