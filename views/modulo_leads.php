

<div style="display: flex;">

	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>

	

	<div style="width: 50%;float: right;text-align: end;">

		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_leads_reg">

		  Crear

		</button><br><br></div>

</div>

<div id="div_listado"></div>

<?php require_once "formularios_leads.php";?>


<div class="modal fade" id="modal_leads_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



  <div class="modal-dialog" role="document">



    <div class="modal-content">

      <div class="modal-header">



        <h5 class="modal-title" id="exampleModalLabel">Registro de Leads</h5>



        <button type="button" class="close" data-dismiss="modal" aria-label="Close">



          <span aria-hidden="true">&times;</span>



        </button>



      </div>





      <div class="modal-body">



        <form class="reg_usuarios" id="registro_leads" enctype="multipart/form-data">	


        	<h1 style="text-align: center;">DATOS DEL PROSPECTO  </h1>



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

				<div class="row">  

 					<div class="col">

					<div class="input-group mb-3">

							  <div class="input-group-prepend">



							    <span class="input-group-text" id="basic-addon1">Fuente</span>



							  </div>



					<select class="form-control" name="fuente_leads" id="fuente_leads">



						<option value="0">Seleccione</option>



						<option value="web">Web</option>



						<option value="Socialmedia">Redes sociales</option>



						<option value="Referido">Referido</option>



					</select>		



						</div>



					</div>

				</div>







				<!--CIUDADES-->
				<div class="row">  

 					<div class="col">

					<div class="input-group mb-3">

							  <div class="input-group-prepend">



							    <span class="input-group-text" id="basic-addon1">Ciudad</span>



							  </div>



								<select class="form-control" name="expedida" id="ciudades_leads"></select>		



						</div>



					</div>

				</div>






		 </div>
		
			<input type="hidden" name="proceso_leads" value="1">
	
			</div>

            <!-- FIN FORMULARIO-->

            </form>

			<div class="modal-footer">

				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

				<button type="button" id="btn_registro_leads" class="btn btn-primary" value="save_registro_leads">Grabar</button>

			</div>


        </div>

        </div>

    </div>

</div>




<script>

	if(typeof btn_save_registro_leads === "undefined"){

		let btn_save_registro_leads=document.querySelector('#btn_registro_leads');
		btn_save_registro_leads.addEventListener('click', funcionSave);
	}

	if(typeof btn_save_contratos === "undefined"){
		let btn_save_contratos=document.querySelector('#btn_contrato_leads');
		btn_save_contratos.addEventListener('click', funcionSave);
	}
	

	

    var identidad = {

		nombre: 'Clientes',

		consulta: 'listado_leads_nuevo',
		consulta_filtro:' where tc.proceso_leads=1 ',

		ajax:'ajax/registrar_clientes.php',

    };





    $(document).ready(function() {

        cargar_listado();

    });





function cargar_listado(){

    listado_consulta("div_listado",identidad.consulta,identidad.consulta_filtro,"",false,hola);

}



function hola(){

    setTimeout(function(){ cargar_tabla() }, 100);

}



function cargar_tabla(){

	//table.destroy();



	$('#div_listado table').DataTable({

	retrieve: true,

	paging: false,
	"pageLength": 100,

	"ordering":false,

	"language": {

	"decimal":        "",

	"emptyTable":     "No hay datos disponibles",

	"info":           "Mostrando _START_ de _END_ de _TOTAL_ registros",

	"infoEmpty":      "No hay registros",

	"infoFiltered":   "(filtrado de _MAX_ total registros)",

	"infoPostFix":    "",

	"thousands":      ",",

	"lengthMenu":     "Mostrar _MENU_ registros",

	"loadingRecords": "Cargando...",

	"processing":     "Procesando...",

	"search":         "Buscar:",

	"zeroRecords":    "No se encontro resultados",

	"paginate": {

		"first":      "Primero",

		"last":       "Ultimo",

		"next":       "Siguiente",

		"previous":   "Anterior"

	},

	"aria": {

		"sortAscending":  ": ordenamiento de forma ascedente",

		"sortDescending": ": ordenamiento de forma descente"

	},

	"searchPanes": {

		clearMessage: 'Limpiar',

		//collapse: 'Filtro',

		collapse: {0: 'Filtro', _: 'Filtro (%d)'},

		cascadePanes: true,

		viewTotal: true,

		threshold: 0.1,

		layout: 'columns-6',

		title: {

			_: 'Filtro seleccionado - %d',

			0: 'No hay filtro seleccionado',

			1: 'Filtro seleccionado'

		}

	}

	},

	dom: 'Bfrtip',

	buttons: [ 

	// 'copy', 

	'searchPanes','csv', 'excel', 'pdf',

	{ extend: 'print', text: '<i class="fas fa-print"></i>' }



	]

	});

	}

	function ChangeEstadoLeds(id_empleado, fase_actual, codigo_cliente, disponible){

		let objData=new Object();
		objData.id_empleado = id_empleado;
		objData.siguiente_fase = fase_actual;
		objData.codigo_cliente = codigo_cliente;
		objData.disponibilidad = 1;

		console.log(mostrarModalEditar(objData, "ModuloLeads"));

		
			let divBotonesBorrar=document.querySelectorAll('#botonesBorrar');
			divBotonesBorrar.forEach((div) => {

				if(disponible == 2){
					div.style.display="none";
				}else{
					div.style.display="block";
				}

			})
		


		if(disponible == 0 || disponible == null){
			if(confirm('Desea ser usted el responsable de este proceso leads?')){
				changeFase(objData);
			}else{
				return;
			}
		}
		
		let laFase="";
		if(fase_actual == 1){

			laFase="registro_datos_leads";
		}else if(fase_actual == 2){

			laFase="registro_seguridad_leads";
		}else{

			laFase="registro_motos_leads";
		}
		
		let arrayFases=['registro_datos_leads', 'registro_seguridad_leads', 'registro_motos_leads'];

		arrayFases.forEach((fase) => {
			let noFase=document.querySelector(`#${fase}`);
			noFase.style.display = "block";
			let section=noFase.parentElement;
			let divMsjNofase="";

			console.log("VALIDOSIEXISTELACLASE", section.querySelector(`.${fase}_nofase`));

			if(section.querySelector(`.${fase}_nofase`) != null){
				divMsjNofase=document.querySelector(`.${fase}_nofase`)
				divMsjNofase.innerHTML="";
			}else{
				divMsjNofase=document.createElement('div');
				divMsjNofase.classList.add(`${fase}_nofase`);
				section.appendChild(divMsjNofase);
			}
			

			if(laFase != fase){

				divMsjNofase.innerHTML=`
				<div class="text-center">
					<span><b>FASE NO DISPONIBLE</b> Fase actual: ${fase_actual} </span><br/>
					<i style="font-size:92px;" class="fas fa-lock"></i>'
				</div>
				`;
				noFase.style.display = "none";

			}
		})

	
		//Botones de cambiar fase.

		let changeFases=document.querySelectorAll('#change_fase');
		changeFases.forEach((btnFaseChange) => {
			btnFaseChange.dataset.idcliente=codigo_cliente;
			btnFaseChange.addEventListener('click', changeEstadoLeds);
		})


		//Botones cambiar disponibilidad
		let changesDisponibilidad=document.querySelectorAll('#change_disponibilidad');
		changesDisponibilidad.forEach((btnDisponibleChange) => {
			btnDisponibleChange.dataset.idcliente=codigo_cliente;
			btnDisponibleChange.addEventListener('click', ChangeDisponibilidad);
		})

		//Guardo el codigo cliente en la fase 3 de leds 
		let codigoClienteContratoLeads=document.querySelector("#codigo_cliente_for_contrato_leads");
		codigoClienteContratoLeads.value=codigo_cliente;


		console.log("codigo_usuario", codigo_usuario);
		console.log("codigo_cliente", codigo_cliente);
		console.log("fase_actual", fase_actual);

		
	}


	$(document).ready(function() {

		rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)","1","codigo_sede");

		rellenar_select("tbl_ciudades","nombre","concat(codigo_pais,' > ', nombre)","codigo_pais='COL'","ciudades_leads");

		//rellenar_select("tbl_clientes","codigo_cliente","concat(nombres,'  ',apellidos)","1 ORDER BY nombres","clientes_select_leads");

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


	function cargar_motos(codigo_sede){
		console.log("CODIGOSEDE",codigo_sede)
		filtro="codigo_sede="+codigo_sede+" AND m.estado_moto = 0";
		rellenar_select("tbl_motos m","m.codigo_moto","concat(m.placa,'-',m.linea )",filtro,"codigo_moto");
	}


	function cargar_select_dialog(){
		rellenar_select("tbl_sedes","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)"," inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","sedemoto");
	}

    

</script>