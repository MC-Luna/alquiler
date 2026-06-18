<div style="display: flex;">

	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>

	

	<div style="width: 50%;float: right;text-align: end;">

		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_reg_usu">

		  Crear

		</button>

		<br><br>

	</div>

</div>



<div id="div_listado"></div>



<!-- Modal -->

<div class="modal fade" id="modal_reg_usu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Registro del Equipo de trabajo</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">



        <form  id="registro" name="registro">	



        	<h4 style="text-align: center;">Informacion Personal</h4>



        	 <div class="row">  

	



		    <div class="col">

        	<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Tipo de Documento</span>

			  </div>

			  <select class="form-control" name="tipo_documento" id="tipo_documento">

			  <option value="cc">Cedula de ciudadanía</option>

			  <option value="ce">Cedula de extranjería</option>

			  <option value="pa">Pasaporte</option>

			  </select>		

			</div>

			</div>







			 <div class="col">

			<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Numero</span>

			  </div>

			  <input type="number" name="identificacion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

			</div>

			</div>

			</div>









             <div class="row">  

	



		    <div class="col">

			<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Nombres</span>

			  </div>

			  <input type="text" name="nombres" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

			</div>

			</div>



			 <div class="col">

			<div class="input-group mb-3">

			  <div class="input-group-prepend">

			    <span class="input-group-text" id="basic-addon1">Apellidos</span>

			  </div>

			  <input type="text" name="apellidos" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

			</div>

			</div>

			</div>





			 <div class="row">  

	



		    <div class="col">

				<div class="input-group mb-3">

				<div class="input-group-prepend">

					<span class="input-group-text" id="basic-addon1">Celular</span>

				</div>

				<input type="text" name="celular" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

				</div>

			</div>



			<div class="col">

				<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Sexo</span>

					</div>

					<select class="form-control" name="sexo" >

						<option value="0">Seleccionar Sexo</option>

						<option value="m">Masculino</option>

						<option value="f">Femenino</option>

					</select>		

				</div>

			</div>



			<div class="col">
				<div class="input-group mb-3">

					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Grupo Sanguineo</span>
					</div>

					<select class="form-control" name="grupo_sanguineo" >
							<option value="O+">O negativo</option>
							<option value="O+">O positivo</option>
							<option value="A-">A negativo</option>
							<option value="A+">A positivo</option>
							<option value="B-">B negativo</option>
							<option value="B+">B positivo</option>
							<option value="AB-">AB negativo</option>
							<option value="AB+">AB positivo</option>	  
					</select>		
				</div>

				<div class="input-group mb-3">

					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Estado</span>
					</div>

					<select class="form-control" name="activo" >
							<option value="1">Activo</option>
							<option value="2">Inactivo</option>
					</select>		
				</div>
			</div>





			

			</div>





			<div class="row">  



				<div class="col">

					<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Dirección</span>

					</div>

					<input type="text" name="direccion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

					</div>

				</div>



				<div class="col">

					<div class="input-group mb-3">

						<div class="input-group-prepend">

							<span class="input-group-text" id="basic-addon1">Email</span>

						</div>

						<input type="text" name="email" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

						</div>

					</div>

	

			

			</div>



			<div class="row">  



				<div class="col">

					<div class="input-group mb-3">

						<div class="input-group-prepend">

							<span class="input-group-text" id="basic-addon1">Rol</span>

						</div>

						<select class="form-control" name="codigo_rol" id="codigo_rol"></select>		

					</div>

				</div>



				<div class="col">

					<div class="input-group mb-3">

						<div class="input-group-prepend">

							<span class="input-group-text" id="basic-addon1">Sede</span>

						</div>

						<select class="form-control" name="codigo_sede" id="codigo_sede"></select>		

					</div>

				</div>



			

			</div>

			



			<div class="row">  

		  

				

			</div>



		</form>



      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

        <button type="button" class="btn btn-primary" id="btn_grabar_usuario">Grabar</button>

      </div>

    </div>

  </div>

</div>



<script type="text/javascript">

	var identidad = {
		nombre: 'Usuarios',
		consulta: 'listado_usuarios',
		consulta_filtro: '',
		tabla:'tbl_usuarios',
		campos:'tipo_documento,identificacion,nombres,apellidos,direccion,celular,email,sexo,grupo_sanguineo,codigo_rol,codigo_sede',
		formulario:'tipo_documento,identificacion,nombres,apellidos,direccion,celular,email,sexo,grupo_sanguineo,codigo_rol,codigo_sede'

	};

	$(document).ready(function() {

		$("#btn_crear").bind("click",function(){
			document.registro.reset();
			limpiar_campos("registro");
			$("#btn_grabar_usuario").attr("rel","1");
			cargar_select_dialog();
		});

		$("#codigo_select").on("change",function(){

			res=consultar_campo("tbl_usuarios_tipos","tabla_origen,campo_tabla_origen","codigo_tipo_usuario=1");
			resultado=res.split(";");

			tabla_origen=resultado[0];
			campo_tabla=resultado[1];
			console.log(tabla_origen); 

			rellenar_select(tabla_origen,campo_tabla,"concat(nombres,' ',apellidos)","","codigo_origen");

		});
		
		$("#btn_grabar_usuario").bind("click",function(){
			if($(this).attr("rel")=="2"){
				grabar_editar_usuario();
			}else{
				grabar_usuario();
				alert("h1");
			}
		});

	});

	function cargar_select_dialog(){
		rellenar_select("tbl_roles","codigo_rol","nombre","1","codigo_rol");

		rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
		"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
		"1","codigo_sede");
	}
	
	function editar_usuario(codigo_usuario){
		document.registro.reset();
		$("#modal_reg_usu").modal();
		cargar_select_dialog();
		$("#modal_reg_usu").attr('rel',codigo_usuario);	
		limpiar_campos("registro");	
		llenar_formulario("registro","tbl_usuarios","codigo_usuario="+codigo_usuario);
		$("#btn_grabar_usuario").attr("rel","2");
	}

	function grabar_usuario(){
		//valor = validar_formulario('1','reg_usuarios');
		modo = 1;
		tabla = 'tbl_usuarios';
		filtro='';
		
		resultado = actualizar_registro(tabla,"registro",filtro,1);
		if(resultado.resultado==1){
			alert(resultado.mensaje);
			cargar_listado();
			$("#modal_reg_usu").modal('hide');
		}
		else{
			alert(resultado.mensaje);
		}
	}

	function grabar_editar_usuario(){
		codigo_usuario=$("#modal_reg_usu").attr('rel');
		//valor = validar_formulario('1','reg_usuarios');
		modo = 2;
		tabla = 'tbl_usuarios';
		filtro='codigo_usuario='+codigo_usuario;
		
		resultado = actualizar_registro(tabla,"registro",filtro,2);
		if(resultado.resultado==1){
			alert(resultado.mensaje);
			cargar_listado();
			$("#modal_reg_usu").modal('hide');
		}
		else{
			alert(resultado.mensaje);
		}
	}

</script>

<script type="text/javascript" charset="utf8" src="views/views.js"></script>

