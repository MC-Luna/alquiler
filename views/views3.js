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
			url: '/app/ajax/registro_editar.php',
			data: edicion,
			success: function(data){

				$('#ModalEditar').modal('hide');
				cargar_listado();
				return false;

			},

			dataType: 'text'

		});

	}

	function cargar_listado(){

		listado_consulta2("div_listado",identidad.consulta,identidad.consulta_filtro,identidad.prueba,true,hola);
		//$('#div_listado table').DataTable().searchPanes.rebuildPane();
		//setTimeout(function(){ cargar_tabla() }, 100);
		
	}

	function hola(){
		setTimeout(function(){ 
			//cargar_tabla() 
		}, 100);
	}

	function cargar_datatable(o){
		console.table(o);
		div="#"+ o.div+" table";
		$(div).DataTable({

			retrieve: true,
			paging: (parseInt(o.paging) ? true : false),
			"pageLength": parseInt(o.pageLength),
			
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

		if($.fn.magnificPopup){
			$('.mfp-pop').magnificPopup({
				disableOn: function() { if($(window).width()<992){return false; } return true;}
			});

			$("#div_listado table").on('page.dt', function(){
				$('.mfp-pop').magnificPopup({
					disableOn: function() { if($(window).width()<992){return false; } return true;}
				});
			});
		}
		
	}


	function cargar_click(){

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

		  	url: '/app/ajax/registro_guardar.php',

		  	data: campos,

		  	success: function(data){

		  	},

		  	dataType: 'text'

		}).done(function( data ){

				//console.log("DATADEGUARDAR",data);

			  	//console.log("holaaaa");
				  alert(data);

				  $('.modal').modal('hide');
  
				  $("#registro")[0].reset();
  
				  cargar_listado();
  
			  //window.location.reload(true);
		});

	}


	function ActivoContrato(codigo_contrato, codigo_moto){

		$('#modal_fecha_nueva_final').modal({backdrop: 'static', keyboard: false})

		$('#modal_fecha_nueva_final').modal('show');

		console.log(form);

		let divAtributos=document.createElement('div');

		divAtributos.innerHTML=`

		<input type="hidden" value="${codigo_contrato}" name="idContrato"/>

		<input type="hidden" value="${codigo_moto}" name="idMoto"/>

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
