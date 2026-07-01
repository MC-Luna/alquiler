<link href='/app/config/tabs/component.css' rel='stylesheet' />















	<!-- https://tympanus.net/codrops/2014/03/21/responsive-full-width-tabs/comment-page-3/ -->











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















					<li><a href="#section-3"><span>Matenimiento</span></a></li>











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



			  <select class="form-control" name="marca" id="marca_select">



			  	<option value="auteco" id="akt">Auteco</option>



			  	<option value="bajaj" id="bajaj">Bajaj</option>



			  	<option value="akt" id="akt">AKT</option>



			  	<option value="victory" id="victory">Victory</option>



			  	<option value="combat" id="combat">Combat</option>



			  	<option value="advance" id="advance" >Advance</option>



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







			<div class="input-group mb-3">



			  <div class="input-group-prepend">



			    <span class="input-group-text" id="basic-addon1">Sede Perteneciente</span>



			  </div>



			  <select class="form-control" name="codigo_sede" id="codigo_sede_select"></select>		



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



			    <span class="input-group-text" id="basic-addon1">Precio $</span>



			  </div>



			  <input type="text" name="precio" id="precio" class="form-control" placeholder="">	



			</div>



			</div>







			</div>







			<div class="row">  



				<div class="col">



				<div class="input-group mb-3">



			  <div class="input-group-prepend">



			    <span class="input-group-text" id="basic-addon1">Fecha de Compra</span>



			  </div>



			   <input class="form-control" name="fecha_compra" id="fecha_compra" type="date">



			</div>



			</div>







		    <div class="col">



		    	<div class="input-group mb-3">



			  <div class="input-group-prepend">



			    <span class="input-group-text" id="basic-addon1">Costo $</span>



			  </div>



			  <input type="number" name="costo" id="costo" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	



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



			    <span class="input-group-text" id="basic-addon1">Concepto</span>



			  </div>



			 

			  <input type="text" name="concepto" id="concepto" class="form-control" placeholder="" aria-label="concepto_mantenimiento" aria-describedby="basic-addon1">

			</div>



			</div>











			<div class="col">



			<div class="input-group mb-3">



			  <div class="input-group-prepend">



			    <span class="input-group-text" id="basic-addon1">Valor</span>



			  </div>



			  <input type="number" name="valor_mantenimiento" id="valor_mantenimiento" class="form-control" placeholder="" aria-label="valor_mantenimiento" aria-describedby="basic-addon1">	



			</div>



			</div>









<!--

			 <div class="row">  



			 	<div class="col">



			<div class="input-group mb-3">



			  <div class="input-group-prepend">



			    <span class="input-group-text" id="basic-addon1">Evidencia</span>



			  </div>



			  <input type="file" name="evidencia_mantenimiento" class="form-control" placeholder="" aria-label="evidencia_mantenimiento" aria-describedby="basic-addon1">	



			</div>



			</div>

-->





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











    </div> <!-- TERMINA EL CONTENT --> 











	</div> <!-- TERMINA TABS -->











    </div>















  </div>















</div>











<script src="/app/config/tabs/cbpFWTabs.js"></script>















<script>















	new CBPFWTabs( document.getElementById( 'tabsm' ) );















</script>



