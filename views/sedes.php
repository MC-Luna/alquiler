<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_agregar_empresa">Agregar Empresa</button>
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_reg">
			Crear
		</button>
		<br><br>
		
	</div>
</div>

<div id="div_listado"></div>

<!-- Modal -->
<div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Sede</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  id="registro" name="registro">	

	        <div class="row">  
	         <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Nombre Sede</span>
			  </div>
			   <input type="text" name="nombre" class="form-control" placeholder="" aria-label="namesede" aria-describedby="basic-addon1">	
			</div>
			</div>

			 <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Dirección</span>
			  </div>
			   <input type="text" name="direccion" class="form-control" placeholder="" aria-label="direccionsede" aria-describedby="basic-addon1">		
			</div>
			</div>

			 <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Teléfono</span>
			  </div>
			  <input type="number" name="telefono" class="form-control" placeholder="" aria-label="telsede" aria-describedby="basic-addon1">	
			</div>
			</div>
						
			 <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Celular</span>
			  </div>
			  <input type="number" name="celular" class="form-control" placeholder="" aria-label="telsede" aria-describedby="basic-addon1">	
			</div>
			</div>

			</div>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Email</span>
			  </div>
			  <input type="text" name="correo" class="form-control" placeholder="" aria-label="emailsede" aria-describedby="basic-addon1">
			</div>

			<div class="row"> 
				<div class="col">
						<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Pais</span>
						</div>
						<select class="form-control" name="codigo_pais" id="codigo_pais"></select>
						</div>
					</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Ciudad</span>
						</div>
						<select class="form-control" name="codigo_ciudad" id="codigo_ciudad"></select>		
					</div>
				</div>

				<div class="col">
						<div class="input-group mb-3">
			 				 <div class="input-group-prepend">
			   					 <span class="input-group-text" id="basic-addon1">Empresa</span>
			 				 </div>
			  				<select class="form-control" name="codigo_empresa" id="codigo_empresa">
			  				</select>
						</div>
						
				</div>

			</div>

		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_grabar_sede" rel="1">Grabar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_agregar_empresa" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Agregar empresa</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>

      <div class="modal-body">

	  	<form id="form_agregar_empresa">

			<div class="input-group mb-3">
				<input id="nombre_empresa" name="nombre_empresa" type="text" class="form-control">
			</div>

		</form>

	  </div>

	  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_agregar_empresa">Grabar</button>
      </div>
	  
    </div>
  </div>
</div>

<script type="text/javascript">
	
	var identidad = {
		nombre: 'Sedes',
		consulta: 'listado_sedes',
		consulta_filtro: '',
		tabla:'tbl_sedes',
		campos:'nombre,direccion,telefono,celular,correo,codigo_ciudad,codigo_empresa',
		formulario:'nombre,direccion,telefono,celular,correo,codigo_ciudad,codigo_empresa',
	};

	$(document).ready(function() {

		$("#btn_crear").bind("click",function(){
			document.registro.reset();
			limpiar_campos("registro");
			$("#btn_grabar_sede").attr("rel","1");
			cargar_select_dialog();
		});

		$("#btn_agregar_empresa").bind("click",guardar_empresa);		

		$("#codigo_pais").on("change",function(){
			rellenar_select("tbl_ciudades","codigo_ciudad","concat(codigo_departamento,'/',nombre)"," codigo_pais='" + $("#codigo_pais").val()+"' order by codigo_departamento","codigo_ciudad");
		});

		$("#btn_grabar_sede").bind("click",function(){
			if($(this).attr("rel")=="2"){
				grabar_editar_sede();
			}else{
				grabar_sede();
			}
		});

	});

	function cargar_select_dialog(){
		rellenar_select("tbl_paises","codigo_pais","nombre"," 1","codigo_pais");
		$("#codigo_pais").val("COL");
		rellenar_select("tbl_ciudades","codigo_ciudad","concat(codigo_departamento,'/',nombre)"," codigo_pais='" + $("#codigo_pais").val()+"' order by codigo_departamento","codigo_ciudad");
		rellenar_select("tbl_empresas","codigo_empresa","nombre"," 1","codigo_empresa");
	}

	function guardar_empresa(){

		if ($("#nombre_empresa").val()==""){
			alert("Debe ingresar un nombres de empresa");
			$("#nombre_empresa").focus();
		}else{

			$.ajax({
			type: 'POST',
			async: false,
			data: "nombre="+$("#nombre_empresa").val(),
			url: 'ajax/agregar_empresa.php',
			success: function(data){

				if(data.resultado==1){
					$("#nombre_empresa").val("");
					alert(data.mensaje);
				}else{
					alert(data.mensaje);
				}
				cerrarModalEmpresa();
			},
				dataType: 'json'
			});
		}


	}

	function cerrarModalEmpresa(){
		$("#nombre_empresa").val("");
		$('#modal_agregar_empresa').modal('hide');
	}

	function editar_sede(codigo_sede){
		document.registro.reset();
		$("#modal_reg").modal();
		cargar_select_dialog();
		$("#modal_reg").attr('rel',codigo_sede);	
		limpiar_campos("registro");	
		llenar_formulario("registro","tbl_sedes","codigo_sede="+codigo_sede);
		$("#btn_grabar_sede").attr("rel","2");
	}

	function grabar_editar_sede(){
		codigo_sede=$("#modal_reg").attr('rel');
		//valor = validar_formulario('1','reg_usuarios');
		modo = 2;
		tabla = 'tbl_sedes';
		filtro='codigo_sede='+codigo_sede;
		
		resultado = actualizar_registro(tabla,"registro",filtro,2);
		if(resultado.resultado==1){
			alert(resultado.mensaje);
			cargar_listado();
			$("#modal_reg").modal('hide');
		}
		else{
			alert(resultado.mensaje);
		}
	}

	function grabar_sede(){
		//valor = validar_formulario('1','reg_usuarios');
		modo = 1;
		tabla = 'tbl_sedes';
		filtro='';
		
		resultado = actualizar_registro(tabla,"registro",filtro,1);
		if(resultado.resultado==1){
			alert(resultado.mensaje);
			cargar_listado();
			$("#modal_reg").modal('hide');
		}
		else{
			alert(resultado.mensaje);
		}
	}

</script>
<script type="text/javascript" charset="utf8" src="views/views.js?20260701"></script>
