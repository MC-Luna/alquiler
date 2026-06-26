$(document).ready(function() {

		$('#titulo_view').html(form[0].title);

		$(".btn-save").bind("click",function(){
			save($(this).attr("data-n"),$(this).attr("data-s"),$(this).attr("data-r"));
		});
		
		// CARGAR INICIO
		cargar_listado();

	});

	function cargar_listado(){
		listado(form[0].div_listado,form[0].listado,form[0].filtro,1,true);
	}

	function listado(div,consulta,filtro,opcion,modo,callback){
		console.log("Filtro: ", filtro);
		data_div="";
		
		if (modo==undefined) {
			modo=false;
		}
		
		$.ajax({
			type: 'POST',
			async: modo,
			url: 'ajax/listado.php',
			data:{
				consulta: consulta,
				filtro: filtro,
				opcion: opcion
			},
			success: function(data){
		
				console.log(data);
				if ( data.resultado==0 ) {
					data_div=data.mensaje;
				}else{
					data_div=data.mensaje;
				}
				if(callback){
					callback();
				}
			},
			dataType: 'json'
		}).done(function(res){
		
			$("#"+div+"").html(data_div);
			$("#"+div+"").doubleScroll();
		
			res=consultar_campo("tbl_conf_consultas","datatable,paging,pageLength","nombre_consulta='"+consulta+"'");
			resultado=res.split(";");
			var datatable=parseInt(resultado[0]);
			var paging=(parseInt(resultado[1]));
			var pageLength=resultado[2];
		
			if(datatable){
				let opciones = {
					div:div,
					paging:paging,
					pageLength:pageLength
				}
			
				cargar_datatable(opciones);
				
			}
			
		});
		
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

		$('.mfp-pop').magnificPopup({
			disableOn: function() { if($(window).width()<992){return false; } return true;}
	  	});

		$("#div_listado table").on('page.dt', function(){
			$('.mfp-pop').magnificPopup({
				disableOn: function() { if($(window).width()<992){return false; } return true;}
		  });
		});
		
	}

	function open_modal(n,s,r){
		let formulario = document.getElementsByName(form[n].name);
		formulario[0].reset();
		$(form[n].modal+"_title").html(form[n].title);
		limpiar_campos(form[n].name);

		if(r){
			let input="#"+form[n].referencia;
			$(input).val(r);
		}
		
		$(form[n].button).attr("data-n",n);
		$(form[n].button).attr("data-s",s);
		$(form[n].button).attr("data-r",r);
		$(form[n].modal).modal();

		load_modal(n,s,r);
		
		if(s){
			llenar_formulario(form[n].name,form[n].tabla,form[n].codigo+"="+s);
		}
		
	}

	function save(n,s,r){
		valor = validar_formulario("1",form[n].name);

		if(valor){
			var filtro='';
			var modo = 1;
			s= parseInt(s);
			if(s){
				
				filtro= form[n].codigo +'='+s;
				modo=2;
			}
	
			resultado = actualizar_registro(form[n].tabla,form[n].name,filtro,modo);
			if(resultado.resultado==1){
	
				Swal.fire({
					title: "Registrado",
					text: resultado.mensaje,
					icon: "success"
				});

				if(parseInt(r)){
					console.log("referencia");
					listado(form[n].div_listado,form[n].listado,form[n].referencia+"="+r,1,true);
				}else{
					listado(form[n].div_listado,form[n].listado,form[n].filtro,1,true);
				}
				
				if(parseInt(form[n].cierre_modal)){
					$(form[n].modal).modal('hide');
				}else{
					let formulario = document.getElementsByName(form[n].name);
					formulario[0].reset();
					limpiar_campos(form[n].name);
				}
				
			}
			else{
				Swal.fire({
					title: "Hubo un error",
					text: resultado.mensaje,
					icon: "warning"
				});
			}
		}
	};
