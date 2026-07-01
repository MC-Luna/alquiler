<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_usu_con">
		  Crear
		</button>
		<br><br>
	</div>
</div>

<div id="div_listado"></div>

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
		cargar_listado();
		
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
		prueba: 'probando',
		tipoEjecucion: 'createContrato',
		nombre: 'Contratos',
		consulta: 'listado_contratos',
		consulta_filtro: '',
		tabla:'tbl_contratos',
		campos:'fecha_inicio_contrato,fecha_final_contrato,frecuencia_cobro,fecha_proximo_cobro,valor_pagar,codigo_moto,codigo_cliente',
		formulario:'fechainicio,fechafinal,frecuencia,proximocobro,valor,codigo_moto,codigo_cliente'
	};

	$(document).ready(function() {

		//$("#btn_grabar").bind("click",guardar_contrato);

			rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)","1","codigo_sede");

			rellenar_select("tbl_clientes","codigo_cliente","concat(nombres,'  ',apellidos)","1 ORDER BY nombres","codigo_cliente_f");

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
		filtro="codigo_sede="+codigo_sede+" AND m.estado_moto in (0,6)";
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

				alert(res);
				//console.log("holaaaa");
				$('.modal').modal('hide');
				//$("#registro")[0].reset();
				cargar_listado();
				//$("#mensaje").html("Respuesta: " + res);

		});
	}

</script>
<script type="text/javascript" charset="utf8" src="views/views2.js?20260701"></script>
