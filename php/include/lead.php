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
        <h5 class="modal-title" id="exampleModalLabel">Registro de Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="reg_usuarios" name="reg_usuarios" id="reg_usuarios">	
        	<h1 style="text-align: center;">DATOS DE CLIENTE </h1>
        	<br>

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
						<option value="ex">Cedula de Extranjeria</option>
						<option value="pa">Pasaporte</option>
					</select>		
				</div>

		    </div>
			<div class="col">

 			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Numero ID</span>
			  </div>
			  <input type="text" name="identificacion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			</div>	

			<div class="col">
			 <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Expedida</span>
			  </div>
			  <input type="text" name="expedida" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
						    <span class="input-group-text" id="basic-addon1">Teléfono</span>
						  </div>
						  <input type="text" name="telefono" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
						</div>					 
		   			</div>	 				


			  		<div class="col">
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1">Email</span>
						  </div>
						  <input type="text" name="correo" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
						</div>						 
		   			</div>	 				

		</div>
		<div class="row"><div class="col"><br>   	<h4> Lugar de nacimiento</h4>		</div> </div>
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
			    <span class="input-group-text" id="basic-addon1">Departamento</span>
			  </div>
			  <input type="text" name="usuario" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
		</div>

		<div class="row">
				<div class="col">
							<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Fecha de nacimiento</span>
				</div>
				<input type="date" name="fecha_nacimiento" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</div>

		</div>
</div>

		<div class="row"><div class="col"><br>   	<h4> Internet y redes sociales</h4>		</div> </div>
		<div class="row">
			<div class="col">
			<p>Facebook</p>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">URL</span>
				  <input type="text" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			<div class="col">
			<p>Instagram</p>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">URL</span>
				  <input type="text" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			<div class="col">
			<p>Twitter</p>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">URL</span>
				  <input type="text" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			<div class="col">
			<p>Tiktok</p>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">URL</span>
				  <input type="text" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>

			</div>


			<div class="row"><div class="col"><br>   	<h4> Lugar de residencia</h4>		</div> </div>
		<div class="row">

				<div class="col input-group mb-3">
					<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Dirección</span>
					</div>
					<select class="form-control" name="tipo_direccion" id="tipo_direccion">
						<option value="0">Seleccione</option>
						<option value="1">Calle</option>
					  	<option value="2">Carrera</option>
					  	<option value="3">Avenida</option>
					</select>		
				</div>

			<div class="col-2">
			
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">No.</span>
				  <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			<div class="col">
			
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Nomenclatura</span>
				  <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			<div class="col">
			
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Barrio</span>
				  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>

			</div>


			<div class="row"><div class="col"><br>   	<h4> Vivienda</h4>		</div> </div>
		<div class="row">

			<div class="col input-group mb-3">
				<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Tipo</span>
				</div>
				<select class="form-control" name="tipo_direccion" id="tipo_direccion">
					<option value="0">Seleccione</option>
					<option value="1">Propia</option>
					<option value="2">Arriendo</option>
				</select>		
			</div>
			
			<div class="col">
			
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Vive en</span>
				  <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			<div class="col">
			
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">Tiempo</span>
				  <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
				</div>			
			</div>
			
			</div>



			<div class="row"><div class="col"><br>   	<h4> Adjuntos</h4>		</div> </div>
		<div class="row">
			<div class="col">
				<div class="mb-3">
				  <label for="formFile" class="form-label">Cedula</label>
				  <input class="form-control" type="file" id="formFile">
				</div>					
			</div>


			<div class="col">
				<div class="mb-3">
				  <label for="formFile" class="form-label">Licencia</label>
				  <input class="form-control" type="file" id="formFile">
				</div>					
			</div>



			<div class="col">
				<div class="mb-3">
				  <label for="formFile" class="form-label">Recibo</label>
				  <input class="form-control" type="file" id="formFile">
				</div>					
			</div>


			<div class="col">
				<div class="mb-3">
				  <label for="formFile" class="form-label">Certificado laboral</label>
				  <input class="form-control" type="file" id="formFile">
				</div>					
			</div>	
			
			</div>

	    </div>	    
		  </div>
	   </form>
	   <div class="modal-footer">
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		 <button type="button" class="btn btn-primary" id="btn_grabar_usuarios">Grabar</button>
	   </div>
		</div>
	</div>
    </div>
  </div>
</div>


<script type="text/javascript">

var identidad = {
		nombre: 'Clientes',
		consulta: 'listado_clientes',
		ajax:'ajax/registrar_clientes.php',
	};
	
	$(document).ready(function() {

		$("#btn_crear").bind("click",cargar_select_dialog);

		$("#codigo_tipo_usuario").on("change",function(){
			res=consultar_campo("tbl_usuarios_tipos","tabla_origen,campo_tabla_origen","codigo_tipo_usuario=1");
			resultado=res.split(";");

			tabla_origen=resultado[0];
			campo_tabla=resultado[1];

			console.log(tabla_origen); 

			rellenar_select(tabla_origen,campo_tabla,"concat(nombres,' ',apellidos)","","codigo_origen");

		});

		$("#codigo_pais").on("change",function(){
			alert("hola a todosd"+ $("#codigo_pais").val());
			rellenar_select("tbl_ciudades","codigo_ciudad","nombre","codigo_pais='" + $("#codigo_pais").val()+"'","codigo_ciudad");
		});

		});

	function cargar_select_dialog(){
		rellenar_select("tbl_perfiles","codigo_perfil","nombre","","codigo_perfil");

		rellenar_select("tbl_usuarios_tipos","codigo_tipo_usuario","nombre","","codigo_tipo_usuario");
		
		rellenar_select("tbl_paises","codigo_pais","nombre","","codigo_pais");
	}

	
</script>
<script type="text/javascript" charset="utf8" src="views/views.js"></script>