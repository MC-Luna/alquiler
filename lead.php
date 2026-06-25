<?php
  session_start();
  require(__DIR__."/conexion/conexion.php");

  $conexion=new conexion_db();
  //echo "entonces jorge " . $_SESSION["codigo_origen"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MotoApp</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


<style>
	#wrapper {
    display: flex;
    background-color: aliceblue;
	}
</style>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

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

	</body>
	</html>