var edicion="";



	$(document).ready(function() {



		$("#btn_grabar").bind("click",guardar);

		$("#btn_actualizar").bind("click",actualizar);

		$('#titulo_view').html(identidad.nombre);


		$(document).on('click','.editar', function(e){



			$('#txt_editar').val($(this).data("valor"));



			edicion="tabla="+ $(this).data("tabla");

			edicion+="&tabla_id="+ $(this).data("tabla_id");

			edicion+="&codigo="+ $(this).data("codigo");

			edicion+="&campo="+ $(this).data("campo");

			$('#txt_editar').focus();

	

			return false;



		});



		// CARGAR INICIO

		cargar_listado();

		

	});





	function actualizar(){



		edicion+="&valor="+ $('#txt_editar').val();

		$.ajax({

			type: 'POST',

			async: true,

			url: '/ajax/registro_editar.php',

			data: edicion,

			success: function(data){

			//console.log("holaaaa");

				//alert(data);

				$('#ModalEditar').modal('hide');

				cargar_listado();

				return false;

				

			//window.location.reload(true);

			},

			dataType: 'text'

		});

	

	}



	

	function cargar_listado(){

		listado_consulta("div_listado",identidad.consulta,identidad.consulta_filtro,identidad.prueba,false,hola);

		//$('#div_listado table').DataTable().searchPanes.rebuildPane();

		//setTimeout(function(){ cargar_tabla() }, 100);



	}





	

	function hola(){

		setTimeout(function(){ cargar_tabla() 


		
		}, 100);

		

	}


	function cargar_tabla(){

		//table.destroy();



		$('#div_listado table').DataTable({

			retrieve: true,

			paging: false,
			"pageLength": 50,

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


		let SelectsActivos=document.querySelectorAll('#cbox2');

		SelectsActivos.forEach((element) => {

			element.addEventListener('click', (e) => {ActivoContrato(e)});

		});

		
		let perfilUser=document.querySelectorAll("#perfilUser");

		perfilUser.forEach((element) => {

			element.addEventListener('click', (e) => {
				mostrarModalEditar(e,"ModuloCliente");
			});

		})

		let perfilMoto=document.querySelectorAll("#perfilMoto");

		perfilMoto.forEach((element) => {

			element.addEventListener('click', (e) => {mostrarModalEditar(e,"ModuloMotos")});

		})

	}

	function marcus(){
		alert("hola marcus");
		
		if(identidad.id_fomulario){
			campos=$(identidad.id_fomulario).serialize();
			console.log("hay id_formulario "+campos);
		}else{
			campos=$("#registro").serialize();
			console.log("no hay formulario id");
		}

	}


	function guardar(){

		if(identidad.id_fomulario){
			campos=$(identidad.id_fomulario).serialize();
			console.log("hay id_formulario "+campos);
		}else{
			campos=$("#registro").serialize();
			console.log("no hay formulario id");
		}
		
		campos+="&tabla="+ identidad.tabla;

		campos+="&campos="+ identidad.campos;

		campos+="&tipoEjecucion="+ identidad.tipoEjecucion;

		campos+="&formulario="+ identidad.formulario;

		$.ajax({

		  	type: 'POST',

		  	async: false,

		  	url: '/ajax/registro_guardar.php',

		  	data: campos,

		  	success: function(data){

				//console.log("DATADEGUARDAR",data);

			  	//console.log("holaaaa");
					alert(data);

				$('.modal').modal('hide');

				$("#registro")[0].reset();

				

				cargar_listado();

			//window.location.reload(true);

		  	},

		  	dataType: 'text'

		});

	}







	function ActivoContrato(e){



		$('#modal_fecha_nueva_final').modal({backdrop: 'static', keyboard: false})

		$('#modal_fecha_nueva_final').modal('show');

		



		console.log(form);

		let divAtributos=document.createElement('div');

		divAtributos.innerHTML=`

		<input type="hidden" value="${e.target.value}" name="idContrato"/>

		<input type="hidden" value="${e.target.dataset.codmoto}" name="idMoto"/>

		<input type="hidden" value="true" name="editoContrato"/>`;



		form.append(divAtributos);



		

		var today = new Date();

		var dd = String(today.getDate()).padStart(2, '0');

		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!

		var yyyy = today.getFullYear();



		today = yyyy + '-' + mm + '-' + dd ;



		let inputFecha=form.querySelector('#fecha_nueva_final');

		console.log(inputFecha);

		inputFecha.value=today;

	

	};
