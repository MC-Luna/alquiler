<link href='/app/config/tabs/component.css' rel='stylesheet' />

	<!-- https://tympanus.net/codrops/2014/03/21/responsive-full-width-tabs/comment-page-3/ -->





<style>

	.tabs nav ul li {

		border-radius: 10px 10px 0px 0px;

	}

</style>



<!-- Modal -->

<div class="modal fade" id="modal_usu_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">



	<div id="tabs" class="tabs"> <!--tabs-->

			<nav>

				<ul>

					<li><a href="#section-1"><span>Datos</span></a></li>

					<li><a href="#section-2"><span>Seguridad</span></a></li>

					<li><a href="#section-3"><span>Pagos</span></a></li>

					<li><a href="#section-4"><span>Contrato</span></a></li>

				</ul>

			</nav>

	<div class="content">		



		<section id="section-1"> <!-- EMPIEZA EN SECTION DE DATOS -->



			<form class="reg_usuarios" name="registro" id="" enctype="multipart/form-data">	

				<h1 style="text-align: center;">DATOS DE CLIENTE </h1>



				<div class="container">



				<div class="row">

					<div class="col"><h4> Identificación</h4></div>

				</div>

					<input type="hidden" id="codigo_cliente" name="codigo_cliente">

					<div class="row">  

			



					<div class="col">



						<div class="input-group mb-3">

							<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">Tipo</span>

							</div>

							<select class="form-control" name="tipo_documento" id="tipo_documento_select">

								<option value="0" id="0">Seleccione</option>

								<option value="cc" id="cc">Cedula de Ciudadanía</option>

								<option value="ex" id="ex">Cedula de Extranjeria</option>

								<option value="pa" id="pa">Pasaporte</option>

							</select>		

						</div>



					</div>

					<div class="col">



					<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Numero ID</span>

					</div>

					<input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

					</div>

					</div>	



					<div class="col">

					<div class="input-group mb-3">

					<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Expedida</span>

					</div>

					<input type="text" name="expedida" id="expedida" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

					</div>

					</div>

					

				</div>



					<div class="row">  



							<div class="col">

								

								<div class="input-group mb-3">

									<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Nombres</span>

									</div>

									<input type="text" name="nombres" id="nombres" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

								</div>

							</div>



							<div class="col">



								<div class="input-group mb-3">

								<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">Apellidos</span>

								</div>

								<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

								</div>

							</div>	 			

						</div>	

				

				<div class="row">

							<div class="col">

								<div class="input-group mb-3">

								<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">Celular</span>

								</div>

								<input type="text" name="celular" id="celular" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

								</div>					 

							</div>	



							<div class="col">

								<div class="input-group mb-3">

								<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">Teléfono</span>

								</div>

								<input type="text" name="telefono" id="telefono" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

								</div>					 

							</div>	 				





							<div class="col">

								<div class="input-group mb-3">

								<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">Email</span>

								</div>

								<input type="text" name="correo" id="correo" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

								</div>						 

							</div>	 				



				</div>



				<div class="row" style="display:none">

					

					<div class="col"><br>   	<h4> Lugar de nacimiento</h4>		</div>

				

				</div>

				<div class="row" style="display:none">



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

					<input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

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

						<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

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

						<input type="text" name="facebook" id="facebook" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

						</div>			

					</div>

					<div class="col">

					<p>Instagram</p>

						<div class="input-group mb-3">

						<span class="input-group-text" id="basic-addon1">URL</span>

						<input type="text" name="instagram" id="instagram" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

						</div>			

					</div>

					<div class="col">

					<p>Twitter</p>

						<div class="input-group mb-3">

						<span class="input-group-text" id="basic-addon1">URL</span>

						<input type="text" name="twitter" id="twitter" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

						</div>			

					</div>

					<div class="col">

					<p>Tiktok</p>

						<div class="input-group mb-3">

						<span class="input-group-text" id="basic-addon1">URL</span>

						<input type="text" name="tiktok" id="tiktok" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

						</div>			

					</div>



					</div>





					<div class="row"><div class="col"><br>   	<h4> Lugar de residencia</h4>		</div> </div>

					

				<div class="row"> <!-- ABRE ROW DE VIVIENDA-->



					<div class="col">

						<div class="input-group mb-3">

						<span class="input-group-text" id="basic-addon1">Direccion</span>

						<input type="text" name='direccion' id="direccion" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

						</div>

					</div>

				</div> <!-- CIERRA ROW DE VIVIENDA --> 





					<div class="row"><div class="col"><br>   	<h4> Vivienda</h4>		</div> </div>

				<div class="row">



					<div class="col input-group mb-3">

						<div class="input-group-prepend">

								<span class="input-group-text" id="basic-addon1">Tipo</span>

						</div>

						<select class="form-control" name="vivienda_tipo" id="vivienda_tipo_select">

							<option value="0">Seleccione</option>

							<option value="propia" id="propia">Propia</option>

							<option value="arriendo" id="arriendo">Arriendo</option>

						</select>		

					</div>

					

					<div class="col">

					

						<div class="input-group mb-3">

						<span class="input-group-text" id="basic-addon1">Tiempo</span>

						<input name="vivienda_tiempo" type="text" class="form-control" id="vivienda_tiempo" aria-label="Username" aria-describedby="basic-addon1">

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

							<label for="formFile" class="form-label">Cedula</label>

							<input name="cedula" class="form-control" type="file" id="formFile">

							</div>					

						</div>





						<div class="col">

							<div class="mb-3">

							<label for="formFile" class="form-label">Licencia</label>

							<input name="licencia" class="form-control" type="file" id="formFile">

							</div>					

						</div>







						<div class="col">

							<div class="mb-3">

							<label for="formFile" class="form-label">Recibo</label>

							<input name="recibo" class="form-control" type="file" id="formFile">

							</div>					

						</div>





						<div class="col">

							<div class="mb-3">

							<label for="formFile" class="form-label">Certificado laboral</label>

							<input name="certificado_laboral" class="form-control" type="file" id="formFile">

							</div>					

						</div>	

					

					</div>



			</form>



			<div id="imprimirDatos"></div>

			<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" value="cambiar_datos" data-formID="registro_edit" class="btn btn-primary" id="btn_cambiar">Guardar Cambios</button>

			</div>

						

		</section> <!-- TERMINA EL SECTION DE DATOS -->



		<section id="section-2">



		<form class="reg_usuarios" name="registro_save">	

				<h1 style="text-align: center;">Seguridad </h1>

				<div class="container">

					<div class="row">

						<div class="col"><h5> Seguridad de moto </h5></div>

					</div>



					<div class="row">  <!-- ABRO ROW -->



							<!-- CODIGO CLIENTE EN UN HIDDEN -->
					<input type="hidden" id="codigo_cliente" name="codigo_cliente">

					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Barrio</span>

								</div>

								<select class="form-control" name="barrio" id="barrio_select">

									<option value="alto" id="alto">Alto</option>

									<option value="medio" id="medio">Medio</option>

									<option value="bajo" id="bajo">Bajo</option>

								</select>		

						</div>

					</div>



					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Vencindario</span>

								</div>

								<select class="form-control" name="vecindario" id="vecindario_select">

									<option value="alto" id="alto">Alto</option>

									<option value="medio" id="medio">Medio</option>

									<option value="bajo" id="bajo">Bajo</option>

								</select>		

						</div>

					</div>



					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Casa</span>

								</div>

								<select class="form-control" name="casa" id="casa_select">

									<option value="alto" id="alto">Alto</option>

									<option value="medio" id="medio">Medio</option>

									<option value="bajo" id="bajo">Bajo</option>

								</select>		

						</div>

					</div>








					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Parqueadero</span>

								</div>

								<select class="form-control" name="parqueadero" id="parqueadero_select">

										<option value="alto" id="alto">Alto</option>

										<option value="medio" id="medio">Medio</option>

										<option value="bajo" id="bajo">Bajo</option>

								</select>		

						</div>

					</div>





					</div>



				</div>






				<BR>
				<div class="container">

					<div class="row">

						<div class="col"><h5> Habitos </h5></div>

					</div>



					<div class="row">  <!-- ABRO ROW -->



						

					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Fuma</span>

								</div>

								<select class="form-control" name="fuma" id="fuma_select">

									<option value="ocacional" id="ocasional">Ocasional</option>

									<option value="si" id="si">Si</option>

									<option value="no" id="no">No</option>

								</select>		

						</div>

					</div>



					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Bebe</span>

								</div>

								<select class="form-control" name="bebe" id="bebe_select">

									<option value="ocacional" id="ocasional">Ocasional</option>

									<option value="si" id="si">Si</option>

									<option value="no" id="no">No</option>

								</select>		

						</div>

					</div>



					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Consume drogas</span>

								</div>

								<select class="form-control" name="drogas" id="drogas_select">

									<option value="ocacional" id="ocasional">Ocasional</option>

									<option value="si" id="si">Si</option>

									<option value="no" id="no">No</option>

								</select>		

						</div>

					</div>








					<div class="col">

						<div class="input-group mb-3">

								<div class="input-group-prepend">

										<span class="input-group-text" id="basic-addon1">Lugar para moto</span>

								</div>

								<select class="form-control" name="lugar_moto" id="lugar_moto_select">

									<option value="parqueadero" id="parqueadero">Parqueadero</option>

									<option value="interior" id="interior">Interior</option>

									<option value="garaje" id="garaje">Garaje</option>

									<option value="exterior" id="exterior">Exterior</option>

									<option value="rejas" id="rejas">Rejas</option>

								</select>		

						</div>

					</div>





					</div>



				</div>


				<BR>
				<div class="container">

					<div class="row">

						<div class="col"><h5> Enfermedades/Accidentes </h5></div>

					</div>


				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">¿Cuales?</span>

						  </div>

						  <input type="text" name="enfermedades" id="enfermedades" class="form-control" placeholder="Enfermedad" 
						  aria-label="Username" aria-describedby="basic-addon1">

						</div>



				</div>
				</div>

				<BR>

				<div class="container">

					<div class="row">

						<div class="col"><h5> Descripcion fisica </h5></div>

					</div>

					<div class="row">
				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Estatura</span>

						  </div>

						  <input type="number" name="estatura" id="estatura" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

						</div>



				</div>


				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Peso</span>

						  </div>

						  <input type="Number" name="peso" id="peso" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

						</div>



				</div>

				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Color de piel </span>

						  </div>
						  <select class="form-control" name="color_piel" id="color_piel_select">

									<option value="blanco" id="blanco">Blanco</option>

									<option value="mestizo" id="mestizo">Mestizo</option>

									<option value="mulato" id="mulato">Mulato</option>

									<option value="negro" id="negro">Negro</option>

								</select>

						</div>



				</div>

				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Color de cabello</span>

						  </div>

						 <select class="form-control" name="color_cabello" id="color_cabello_select">

									<option value="negro" id="negro">Negro</option>
									<option value="rubio" id="rubio">Rubio</option>
									<option value="pelirrojo" id="pelirrojo">Pelirojo</option>
									<option value="castaño" id="castaño">Castaño</option>
									<option value="canoso" id="canoso">Canoso</option>
									<option value="blanco" id="blanco">Blanco</option>
									<option value="calvo" id="calvo">Calvo</option>

						  </select>

						</div>



				</div>




				</div>
				<div class="row">
				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Color de ojos</span>

						  </div>

						  <select class="form-control" name="color_ojos" id="color_ojos_select">

									<option value="negro" id="negro">Negro</option>

									<option value="marron" id="marron">Marron</option>

									<option value="azul" id="azul">Azul</option>

									<option value="verde" id="verde">Verde</option>

									<option value="gris" id="gris">Gris</option>

						   </select>

						</div>



				</div>


				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Señales</span>

						  </div>

						  <input type="text" name="signos" id="signos" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">

						</div>



				</div>

				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">Grupo sanguineo </span>

						  </div>
						  <select class="form-control" name="grupo_sanguineo" id="grupo_sanguineo_select">

									<option value="o+" id="o+">O+</option>

									<option value="o" id="o">O-</option>

									<option value="a+" id="a+">A+</option>

									<option value="a-" id="a-">A-</option>

									<option value="ab+" id="ab+">AB+</option>
									<option value="ab-" id="ab-">AB-</option>
									<option value="b+" id="b+">B+</option>
									<option value="b-" id="b-">B-</option>
									<option value="no" id="no">NO SABE</option>

									
								</select>


									

						</div>



				</div>
				</div>
				</div>

					<div class="container">
						<BR>
					<div class="row">

						<div class="col"><h5> Certificados y antecedentes judiaciales y policivos </h5></div>

					</div>

					<div class="row">

				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="cedula_id" id="cedula_id_check">
										  <label class="custom-control-label" for="cedula_id_check">Cedula ID</label>
									</div>

						</div>
				</div>


				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="licencia" id="licencia_check">
										  <label class="custom-control-label" for="licencia_check">Licencia</label>
									</div>

						</div>
				</div>

				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="servicios" id="servicios_check">
										  <label class="custom-control-label" for="servicios_check">Servicios</label>
									</div>

						</div>
				</div>


				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="procaduria" id="procaduria_check">
										  <label class="custom-control-label" for="procaduria_check">Procuraduria</label>
									</div>

						</div>
				</div>

				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="google" id="google_check">
										  <label class="custom-control-label" for="google_check">Google</label>
									</div>

						</div>
				</div>


				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="contraloria" id="contraloria_check">
										  <label class="custom-control-label" for="contraloria_check">Contraloria</label>
									</div>

						</div>
				</div>


				</div>
				<div class="row">

				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="policia" id="policia_check">
										  <label class="custom-control-label" for="policia_check">Policia</label>
									</div>

						</div>
				</div>


				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="arrendador" id="arrendador_check">
										  <label class="custom-control-label" for="arrendador_check">Arrendador</label>
									</div>

						</div>
				</div>

				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="contrato" id="contrato_check">
										  <label class="custom-control-label" for="contrato_check">Contrato </label>
									</div>

						</div>
				</div>


				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="pagare" id="pagare_check">
										  <label class="custom-control-label" for="pagare_check">Pagaré</label>
									</div>

						</div>
				</div>

				<div class="col">
						 <div class="input-group mb-3">

						 <div class="custom-control custom-switch">
										  <input type="checkbox" class="custom-control-input" name="codeudor" id="codeudor_check">
										  <label class="custom-control-label" for="codeudor_check">Codeudor</label>
									</div>

						</div>
				</div>

				<!--CREO UN DIV PARA ALMACENAR EL VALOR DE LOS CHECKBOX CUANDO ESTEN VACIOS-->
				<div id="hiddenValueCheck"></div>

				</div>
				</div>


				<BR>
				<div class="container">

					<div class="row">

						<div class="col"><h5> Composicion Familiar -Referencias </h5></div>

					</div>


				<div class="col">



						 <div class="input-group mb-3">

						  <div class="input-group-prepend">

						    <span class="input-group-text" id="basic-addon1">¿Cuales?</span>

						  </div>

						  <input type="text" name="composicion_familiar" id="composicion_familiar" class="form-control" placeholder="" 
						  aria-label="Username" aria-describedby="basic-addon1">

						</div>



				</div>
				</div>


		</form>				


		<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" value="save_datos_seguridad" class="btn btn-primary" id="save_seguridad">Guardar Cambios</button>

		</div>



		</section> <!-- TERMINA EL EL FORMULARIO DE SEGURIDAD -->



		<section id="section-3"> <!-- ABRE LA SECTION DE TABLA DE PAGOS -->


		<h1 style="text-align: center;">Pagos</h1>


		<div class="container">

		<div class="container"> <!-- ABRO CONTAINER-->

		<div class="row">

			<div class="col-sm">

					<div class="input-group mb-3">

						<div class="input-group-prepend">

								<span class="input-group-text" id="basic-addon1">B</span>

						</div>

						<input type="text">
		
					</div>

			</div>

			<div class="col-sm">

						<div class="input-group mb-3">

							<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">FECHA</span>

							</div>

							<input type="date">
			
						</div>

			</div>

			<div class="col-sm">

						<div class="input-group mb-3">

							<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">FECHA</span>

							</div>

							<input type="date">
			
						</div>

			</div>

		</div>
			<div id="tablaDePagos"></div>
		</div>	

		</section> <!-- CIERRA LA SECTION DE TABLA DE PAGOS -->



		<section id="section-4">

		<h1 style="text-align: center;">Contrato</h1>

		<div class="container">

		<div class="container"> <!-- ABRO CONTAINER-->

		<div class="row">

			<div class="col-sm">

					<div class="input-group mb-3">

						<div class="input-group-prepend">

								<span class="input-group-text" id="basic-addon1">B</span>

						</div>

						<input type="text">
		
					</div>

			</div>

			<div class="col-sm">

						<div class="input-group mb-3">

							<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">FECHA</span>

							</div>

							<input type="date">
			
						</div>

			</div>

			<div class="col-sm">

						<div class="input-group mb-3">

							<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">FECHA</span>

							</div>

							<input type="date">
			
						</div>

			</div>

			</div>
				<div id="tablaDeContratos"></div>
			</div>	

		</section>



	</div> <!-- TERMINA EL CONTENT --> 

	</div> <!-- TERMINA TABS -->



    </div>

  </div>

</div>



<script src="/app/config/tabs/cbpFWTabs.js"></script>

<script>

	new CBPFWTabs( document.getElementById( 'tabs' ) );

</script>

