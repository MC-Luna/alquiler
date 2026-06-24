<?php
session_start();
?>
<link href='/app/config/tabs/component.css' rel='stylesheet' />

<style>
	.tabs nav ul li {
        border-radius: 10px 10px 0px 0px;
	}
</style>

<div class="modal fade" id="modal_moto_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    <div class="modal-content">
	<div id="tabsm" class="tabs"> <!--tabs-->
			<nav>
				<ul>
					<li><a href="#section-1"><span>Datos</span></a></li>
					<li><a href="#section-2"><span>Pagos</span></a></li>
					<li><a href="#section-3"><span>Gastos</span></a></li>
					<?Php
					if ($_SESSION['codigo_rol']==1 or $_SESSION['codigo_rol']==6){
						echo '<li><a href="#section-4"><span>Balance</span></a></li>';
					}
					?>
					<li><a href="#section-5"><span>Documentos</span></a></li>
				</ul>
			</nav>
	<div class="content">	
    	<section id="#section-1">
			<form  id="form_datos_motos" >	

				<div class="row">  

				<input type="hidden" id="codigo_moto" name="codigo_moto">

				<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Placa</span>
					</div>

				<input type="text" name="placa" id="placa" class="form-control" placeholder="" aria-label="placa" aria-describedby="basic-addon1">
				</div>

				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Marca</span>
						</div>

						<select class="form-control" name="marca" id="marca">
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
					<input type="text" name="linea" id="linea" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	
				</div>

				</div>

				</div>

			<div class="row">  

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">

							<span class="input-group-text" id="basic-addon1">Modelo</span>

						</div>

						<select class="form-control" name="modelo" id="modelo_select">

								<option value="2018" id="2018">2018</option>
								<option value="2019" id="2019" >2019</option>
								<option value="2020" id="2020" >2020</option>	
								<option value="2021" id="2021">2021</option>
								<option value="2022" id="2022">2022</option>
								<option value="2023" id="2023">2023</option>
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

						<select class="form-control" name="transmision" id="transmision">
							<option value="sincronica" id="sincronica">Sincronica</option>
							<option value="automatica" id="automatica">Automatica</option>
							<option value="semiautomática" id="semiautomática">Semiautomatica</option>
							<option value="mecánica" id="mecánica">Mecanica</option>
							<option value="electrica" id="electrica">Eléctrica</option>
						</select>		
					</div>

				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Color</span>
						</div>

						<input type="text" name="color" id="color" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	

					</div>
				</div>

			</div>


			<div class="row">
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Sede Perteneciente</span>
						</div>
						<select class="form-control" name="codigo_sede" id="codigo_sede_select"></select>		
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Ubicación</span>
						</div>
						<select class="form-control" name="ubicacion" id="ubicacion"></select>		
					</div>
				</div>
			</div>

				<div class="row">
					<div class="col">

						<div class="input-group mb-3">

							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Chasis</span>
							</div>

							<input type="text" name="chasis" id="chasis" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
						</div>

					</div>

					<div class="col">

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Cilindraje</span>
							</div>

							<input type="text" name="cilindraje" id="cilindraje" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
						</div>
					</div>

				<div class="col">
				<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Venta $</span>
				</div>
				<input type="text" name="precio" id="precio" class="form-control" placeholder="">	
				</div>
				</div>
				</div>
				
				<div class="row">  
					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Soat</span>
							</div>
							<input class="form-control" name="fecha_soat" id="fecha_soat" type="date" value="0000-00-00" id="example-datetime-local-input">
						</div>
					</div>

					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Tecnomecánica</span>
							</div>
							<input class="form-control" name="fecha_tecno" id="fecha_tecno" type="date" value="0000-00-00" id="example-datetime-local-input">
						</div>
					</div>
		   		</div>

				<div class="row">  
					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Matricula</span>
							</div>
							<input class="form-control" name="fecha_matricula" id="fecha_matricula" type="date" value="0000-00-00" id="example-datetime-local-input">
						</div>
					</div>

					<div class="col">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">Compra</span>
							</div>
							<input class="form-control" name="fecha_compra" id="fecha_compra" type="date" value="0000-00-00" id="example-datetime-local-input">
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
			<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" value="save_datos_motos" class="btn btn-primary" id="btn_cambiar_datos_moto">Guardar Cambios</button>

			</div>

        <div id="tablaMotosDatos"></div>

    </section>

    <section id="#section-2">

        <div id="tablaMotosPagos"></div>

    </section>

    <section id="#section-3">

         <form  id="form_motos_mantenimiento">	

        	<div class="row">  
				<input type="hidden" id="codigo_moto" name="codigo_moto"/>

				<input type="hidden" id="codigo_usuario" name="codigo_usuario" value="<?php echo $_SESSION['codigo_usuario']; ?>"/>

		    	<div class="col">

	        		<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Fecha</span>
						</div>

			  			<input type="date" name="fecha_mantenimiento" id="fecha_mantenimiento" class="form-control" placeholder="" aria-label="fecha_mantenimiento" aria-describedby="basic-addon1">
					</div>
				</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Categoría</span>
					</div>
					<select class="form-control" name="codigo_concepto" id="codigo_concepto"></select>		
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Concepto</span>
					</div>
					<input type="text" name="concepto" id="concepto" class="form-control" placeholder="" aria-label="concepto_mantenimiento" aria-describedby="basic-addon1">
				</div>
			</div>

		</div>

		<div class="row">

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Cuenta</span>
					</div>
					<select class="form-control" name="codigo_cuenta" id="codigo_cuenta"></select>		
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Proveedor</span>
					</div>
					<select class="form-control" name="codigo_proveedor" id="codigo_proveedor"></select>		
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">

						<span class="input-group-text" id="basic-addon1">Valor $</span>
					</div>
					<input type="number" name="valor_mantenimiento" id="valor_mantenimiento" class="form-control" placeholder="" aria-label="valor_mantenimiento" aria-describedby="basic-addon1">	
				</div>
			</div>

		</div>



		<div class="row">
			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Obsevaciones</span>
					</div>
			  		<input type="text" name="observaciones_mantenimiento" id="observaciones_mantenimiento" class="form-control" placeholder="" aria-label="Obsevaciones_mantenimiento" aria-describedby="basic-addon1">	
				</div>
			</div>
		</div>

		</form>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" value="save_mentenimiento_motos" class="btn btn-primary" id="btn_mantenimiento_motos">Guardar</button>
		</div>

		<div id="tabla_mantenimiento_motos"></div>

    </section>

	<?Php
	if ($_SESSION['codigo_rol']==1 or $_SESSION['codigo_rol']==6){
		echo '<section id="#section-4">	
		<h1 style="text-align: center;">Balance</h1>
		<div class="container"> <!-- ABRO CONTAINER-->

			<div id="div_listado_balance_motos"></div>
			
		</div>	
	</section>';
	}
	?>
	
	<section id="#section-5">	
		<h1 style="text-align: center;">DOCUMENTOS</h1>
		<div class="container"> <!-- ABRO CONTAINER-->

			<div id="div_listado_documentos"></div>
		</div>	
	</section>


    </div> <!-- TERMINA EL CONTENT --> 

	</div> <!-- TERMINA TABS -->

    </div>

  </div>

</div>

<script src="/config/tabs/cbpFWTabs.js"></script>
<script>
	new CBPFWTabs( document.getElementById( 'tabsm' ) );
</script>