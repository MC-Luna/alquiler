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



	  	<!-- Aqui van a ir las opciones de las pestañas-->

		  <div id="tapsOptions"></div>

		  

        <form class="reg_usuarios" name="registro" id="registro" enctype="multipart/form-data">	

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
						<option value="nit">NIT</option>

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

				  <input type="text" name="facebook" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

				</div>			

			</div>

			<div class="col">

			<p>Instagram</p>

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">URL</span>

				  <input type="text" name="instagram" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

				</div>			

			</div>

			<div class="col">

			<p>Twitter</p>

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">URL</span>

				  <input type="text" name="twitter" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

				</div>			

			</div>

			<div class="col">

			<p>Tiktok</p>

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">URL</span>

				  <input type="text" name="tiktok" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">

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

						<option value="Calle">Calle</option>

					  	<option value="Carrera">Carrera</option>

					  	<option value="Avenida">Avenida</option>

					</select>		

				</div>



			<div class="col-2">

			

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">No.</span>

				  <input type="text" name='direccion_no' class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

				</div>			

			</div>

			<div class="col">

			

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">Nomenclatura</span>

				  <input type="text" name='direccion_nomen' class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

				</div>			

			</div>

			<div class="col">

			

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">Barrio</span>

				  <input type="text" name='barrio' class="form-control" aria-label="Username" aria-describedby="basic-addon1">

				</div>			

			</div>



			</div>
			<div class="row"><div class="col">    <br>   	<h4> </h4>		
			 <div class="input-group mb-3">



						  <div class="input-group-prepend">



						    <span class="input-group-text" id="basic-addon1">Uso de la moto</span>



						  </div>

						  <select class="form-control" name="uso_moto" id="uso_moto">



									<option value="aplicaciones" id="aplicaciones">Aplicaciones</option>



									<option value="domicilios" id="domicilios">Domicilios</option>



									<option value="empresas" id="empresas">Empresas</option>



									<option value="personal" id="personal">Personal</option>

									<option value="mensajeria" id="mensajeria">Mensajeria</option>
									
									<option value="turismo" id="turismo">Turismo</option>

								</select>





									



						</div>

		</div>
		</div> 




			<div class="row"><div class="col"><br>   	<h4> Vivienda</h4>		</div> </div>

		<div class="row">



			<div class="col input-group mb-3">

				<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Tipo</span>

				</div>

				<select class="form-control" name="vivienda_tipo" id="tipo_vivienda">

					<option value="0">Seleccione</option>

					<option value="propia">Propia</option>

					<option value="arriendo">Arriendo</option>

					<option value="familiar">Familiar</option>

				</select>		

			</div>

			

			<div class="col">

			

				<div class="input-group mb-3">

				  <span class="input-group-text" id="basic-addon1">Tiempo</span>

				  <input name="vivienda_tiempo" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">

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



			<hr>



<!--
			<div id="pestañaContrato">



					<h1 style="text-align: center;">CONTRATO</h1>



					<div class="row">  



						<div class="col">



								<div class="input-group mb-3">

								<div class="input-group-prepend">

									<span class="input-group-text" id="basic-addon1">InicioY</span>

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

					<span class="input-group-text" id="basic-addon1">Moto</span>

				</div>

				<select class="form-control" id="codigo_moto" name="codigo_moto" aria-label="valar" aria-describedby="basic-addon1"></select>

				</div>

				</div>



			</div>



	</div> --> <!-- TERMINA EL DIV DE PESTAÑA CONTRATO -->



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