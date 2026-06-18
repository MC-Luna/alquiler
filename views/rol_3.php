<?php
session_start();
?>
<!--  FULLCALENDAR 		-->
<link href='/config/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='/config/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/config/fullcalendar/moment.min.js'></script>
<script src='/config/fullcalendar/fullcalendar.min.js'></script>
<script src='/config/fullcalendar/es.js'></script>
<script src='/config/fullcalendar/popper.min.js'></script>
<link href='/config/tabs/component.css' rel='stylesheet' />
<script src="/config/tabs/cbpFWTabs.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js"></script>

<style>

    .fc-event{
        background-color:#00d7bc;
        color:white !important;
        border:1px solid gray;
    }

    .table tbody tr:hover {
        background-color: #62f3ea !important;
        font-weight: 600;
    }

	table.dataTable tbody td {
		white-space: pre-line;
	}

	#div_listado_deudas .table thead td:nth-child(4) {
    	min-width: 360px !important;
	}

    #div_listado_movimientos .table thead td:nth-child(4) {
    	min-width: 120px !important;
	}

	table.dataTable tbody tr td:nth-child(8) {
    	font-size: 0.8em;
	}

	table.dataTable tbody tr td em{
		font-size: 0.9em;
		margin:0;
		padding:0;
	}

    #div_listado_pagos table {
            font-size: 0.8em; /* Tamaño de la fuente */
        }
</style>

</style>

<script type="text/javascript">

$(document).ready(function(){

    $('#calendar').fullCalendar({

    	// VISTA POR DEFECTO
    	defaultView: 'month',
    	nowIndicator: true,
    	//now: '2019-01-09T16:25:00',
    	now: moment().format(),
    	locale: 'es',
      	header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,listWeek'

      },

      eventClick: function(calEvent, jsEvent, view) {
        alert('Event: ' + calEvent.title);
        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        alert('View: ' + view.name);
        // change the border color just for fun
        $(this).css('border-color', 'red');
},


        dayClick: function(date, jsEvent, view) {

            fecha= date.format();

            var hora = prompt("Hora:", "");

                if (!isNaN(hora)){
                    var str1 = hora.substring(0,2);
                    var str2 = hora.substring(2,4);
                    var str3 = parseInt(hora.substring(2,4))+30;
                    hora=" "+str1+":"+str2+":00";
                    horapi="T"+str1+":"+str2+":00";
                    horapf="T"+str1+":"+str3+":00";
                    var fechai=fecha+horapi;
                    var fechaf=fecha+horapf;
                    fecha=fecha+hora;
                    console.log(fecha);

                    if(hora!=""){

                        var evento = prompt("Evento:", "");

                    }

                }

                $.post("/config/events.php", {
                    modo:1,
                    fecha: fecha,
                    evento: evento,
                },

                function(data) {
                    alert("llelgo aqui" + data);
                    if(data!=""){
                        $('#calendar').fullCalendar('renderEvent', {
                            title: evento,
                            start: fechai,
                            end: fechaf,
                            allDay: false
                    });
                    }
                });


	    },

<?php

        require('../cbd.php');

        $sql="select
            DATE_FORMAT(e.fecha,'%Y-%m-%dT%H:%i:00') as 'inicio',
            DATE_FORMAT(DATE_ADD(e.fecha, INTERVAL 30 minute),'%Y-%m-%dT%H:%i:00') as 'final',
            e.codigo_evento,
            e.descripcion
            from calendario_eventos e";

        if(!$result= $db->query($sql)){die('Error [' . $db->error . ']');}

            $coma="";
            $eventos="events: [";

            while($reg = $result->fetch_array(MYSQLI_NUM)){
                $eventos.=$coma . '{';
                $eventos.='start: "' . $reg[0] . '",';
                $eventos.='end: "' . $reg[1] . '",';
                $eventos.='id: ' . $reg[2] . ',';
                $eventos.='title: "' . utf8_encode($reg[3]) . '"}';
                $coma=",";
            }
            echo $eventos . ']'; 
        ?>
    });

    new CBPFWTabs( document.getElementById( 'tabs' ) );

});

</script>

<style>

.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {

    padding-left:0;
    padding-right:0;

}

.container-fluid, .container-lg, .container-md, .container-sm, .container-xl {

    width: 100%;
    padding-right:0; 
    padding-left:0;
    margin-right: 0; 
    margin-left: 0;

}

.tabs nav li.tab-current {

    border: 1px solid #54efac;
    box-shadow: inset 0 2px #3edfba;
    border-bottom: none;
    z-index: 100;

}

.tabs nav a {

    color: #838484;
    display: block;
    font-size: 1.45em;
    line-height: 2.5;
    padding: 0 1.25em;
    white-space: nowrap;

}

.tabs nav li.tab-current a {

    color: #00d591;
    font-weight: bold;

}

.content section {

    font-size: 1em;
    padding: 0;
    display: none;
    max-width: 1230px;
    margin: 0 auto;

}


.tabs nav ul li {

    border-radius: 10px 10px 0px 0px;

}

#div_listado_cobro table {

    border-top: hidden;

}

#div_listado_cobro table thead {
    font-size: 1.4em;
    font-weight: 400;
    color:#828282;
}

.table{
    color:#131313;
}

#form_numero_validar p {
    width: 31%;
    display: inline-grid;
    padding: 0px !important;
    margin: 0px !important;
    vertical-align: -webkit-baseline-middle;
}

#soporte_pago{
    margin-bottom:21px;
}

.valor_comprobante{
    text-align:right !important;
    width:120px;
}

</style>

<div id="tabs" class="tabs">

				<nav>

					<ul>
                        <li><a href="#section-1" class="icon-task"><span>Cobros</span></a></li>
                        <li><a href="#section-5" class="icon-task"><span>Deudas</span></a></li>
                        <li><a href="#section-6" class="icon-leads"><span>Soportes <b id='cant_soporte'></b></span></a></li>
                        <li><a href="#section-2" class="icon-clientes"><span>Clientes</span></a></li>
                        <li><a href="#section-3" class="icon-leads"><span>Leads</span></a></li>
                        <li><a href="#section-4" class="icon-calendar"><span>Citas</span></a></li>
					</ul>

                </nav>

                

				<div class="content">

					<section id="section-1">                
                        <div id='div_listado_cobro' style='overflow-y: auto;font-size: 0.8em;'><div>
					</section>

                    <section id="section-5">                
                        
                        <!--<div id='div_listado_seguimiento' style='overflow-y: auto;font-size: 0.8em;'><div> --> 
                        <div id='div_listado_deudas' style='overflow-y: auto;font-size: 0.8em;'><div>
                    
                    </section>

                    <section id="section-6">                
                        <div id='div_listado_movimientos' style='overflow-y: auto;font-size: 0.8em;'><div>
					</section>

					<section id="section-2">
                        <div id='div_listado_leads'><div>
					</section>

                    <section id="section-3">

                    </section>

                    <section id="section-4">

                        <div id='calendar'></div>

					</section>

			

				</div><!-- /content -->

			</div><!-- /tabs -->



<script type="text/javascript">

        var p_codigo_contrato_pago=0;
        var p_codigo_contrato=0;  
        var edicion=""; 
        var cod_cartera=0;

        // Edición de notas
        $("#btn_actualizar").bind("click",actualizar);

        $("#btn_grabar_estados").bind("click",guardar_estado);

        $(document).on('click','.editar', function(e){

            $('#txt_editar').val($(this).data("valor"));

            edicion="tabla="+ $(this).data("tabla");

            edicion+="&tabla_id="+ $(this).data("tabla_id");

            edicion+="&codigo="+ $(this).data("codigo");

            edicion+="&campo="+ $(this).data("campo");

            $('#txt_editar').focus();

            return false;

            });
        // Fin Edición de notas

        $(document).on('click','.table tbody tr td a', function(event){
			event.stopPropagation();
		}); 

		$(document).on('click','#div_listado_cobro table tbody tr', function(){

            indice_seleccionado=$('.item').index(this);
            codigo_contrato=$("input[name='oculto0[]").eq(indice_seleccionado).val();
            listado_consulta("div_listado_pagos","listado_pagos2"," where p.codigo_contrato="+ codigo_contrato+ " order by p.fecha_registro desc","");
            $("#div_pagos").modal("show");

        });

        $(document).on('click','.comprobante_ingreso', function(event){
		 	
            p_codigo_contrato_pago=$(this).data("codigo_contrato_pago");
            p_codigo_contrato=$(this).data("codigo_contrato");
            listado_consulta("div_listado_comprobante","comprobante_validar",p_codigo_contrato);
            url=$(this).data("url");
            url="https://mototrabajo.com/soporte/"+url; 
            $('[name="soporte"]').attr("src",url);
            ciclo=$(this).data("ciclo");
            $('#lbl_ciclo').html(ciclo);
            event.stopPropagation();
            $("#div_combrobante_pago").modal("show");
            
        });


    $(document).ready(function() {

// CARGAR INICIO    
            
    $(document).on('change','#forma_pago', function(e){
        switch($("#forma_pago").val()) {
        case "Tarjeta de Credito":
            $("#codigo_banco").show();
            break;
        case "Transferencia":
            $("#codigo_banco").show();
            break;
            case "Consignacion":
            $("#codigo_banco").val(0);
            $("#codigo_banco").hide();
            break;
            case "Efectivo":
            $("#codigo_banco").val(0);
            $("#codigo_banco").hide();
            break;
        default:
            // code block
        }
    });

    $(document).on('click','#btn_guardar_numero_soporte_n', function(e){

        alert("Entro a generar pago");
        var x=0;
        var sw=1;
        var sw2=1;
        var y=0;

        $(".chk_ingreso").each(function(){
            if($(this).prop('checked')){

                if($('[name="valor[]"]').eq(x).val() ==""){
                    alert("Debe ingresar un valor");
                    $('[name="valor[]"]').eq(x).focus();
                    sw=0;
                    return false;
                }
            
            }else{
                $('[name="valor[]"]').eq(x).val("");
            }
            x++;
            
        });

        if ($('.valor_cobro').length) {
            $(".valor_cobro").each(function(){
                var valor_ingresado= ($(".verificar_valor_cobro").eq(y).val()=="") ? 0 : parseInt($(".verificar_valor_cobro").eq(y).val().replaceAll(".", "").replaceAll(",", ""));
                var comparacion=parseInt($(this).val());
                
                if(valor_ingresado > comparacion){
                    $(".verificar_valor_cobro").eq(y).focus();
                    alert("El valor ingresado es mayor al saldo pendiente");
                    sw=0;
                    return false;
                }
                y++;
            });
        }
        
        if(sw){
            
            if($('#codigo_cuenta').val()== null || $('#codigo_cuenta').val()==0){
                alert("Debe seleccionar una cuenta");
                $('#codigo_cuenta').focus();
                sw2=0;    
                return false;
                e.preventDefault();
                e.stopImmediatePropagation();
                
            }

            if($('#soporte_pago').val()==""){
                alert("Debe digitar un numero");
                $('#soporte_pago').focus();
                sw2=0;
                return false;
                e.preventDefault();
                e.stopImmediatePropagation();
            }
                
            if(sw2){
                $('[name="valor[]"]').val().replaceAll(".", "").replaceAll(",", "");
                campos=$("#form_numero_validar").serialize();
                campos+="&codigo_contrato="+ p_codigo_contrato;
                campos+="&codigo_contrato_pago="+ p_codigo_contrato_pago;
                
                $.ajax({
                    method: 'POST',
                    url: '/ajax/actualizar_pago2.php',
                    data: campos,
                    dataType: 'json'
                }).done(function(response){
                
                    if(response.mensaje == "soporteRepetido"){
                        alert("Numero de soporte repetido");
                        return false;
                        e.preventDefault();
                        e.stopImmediatePropagation();
                    }else{
                        sw2=0;
                        alert(response.mensaje);
                        console.log("exito", response);
                        $('.modal').modal('hide');
                        cargar_listado("");
                        return false;
                        e.preventDefault();
                        e.stopImmediatePropagation();
                    }
                
                }).fail(function(response){
                    console.log("mensaje",response.mensaje);
                    console.log("mensajeArray", response["mensaje"]);
                    console.log("error",response);
                });
            }
        }

    });

    $(document).on('click','.pago', function(e){
        p_codigo_contrato_pago=$(this).data("codigo_contrato_pago");
        p_codigo_contrato=$(this).data("codigo_contrato");
        url=$(this).data("url");
        url="https://mototrabajo.com/soporte/"+url; 
        open_w(url);
        $('#iframe_soporte').show();
 
    });

    let idcede="";
    cargar_listado(idcede);

});

cargar_listado();


function cargar_listado(){

    listado_consulta("div_listado_leads","listado_leads","");

    var codigo_ciudad=consultar_campo("tbl_sedes","codigo_ciudad","codigo_sede="+codigo_sede);
    console.log("ciudad="+codigo_ciudad);

    listado_consulta("div_listado_cobro","listado_cobros"," Where s.codigo_ciudad="+ codigo_ciudad +" and c.activo=1 GROUP BY c.codigo_contrato ORDER BY c.fecha_proximo_cobro");
    

    if(codigo_usuario==33){
        listado_consulta2("div_listado_movimientos","listado_movimientos"," where 1 having pendiente=1 ",1,true,hola);
    }else{
        listado_consulta2("div_listado_movimientos","listado_movimientos"," where 1 having pendiente=1 AND sede in (4,"+codigo_sede+")",1,true,hola);
    }

    listado_consulta2("div_listado_deudas","listado_carteras"," where s.codigo_sede="+ codigo_sede +" group by ct.codigo_cartera",1,true,hola);

    //Where m.codigo_sede="+ codigo_sede +" ORDER BY c.fecha_proximo_cobro asc
    //$('#div_listado table').DataTable().searchPanes.rebuildPane();

    rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," transversal=1 or codigo_sede="+codigo_sede,"codigo_cuenta");

}

function open_w(url){
    var a = document.createElement("a");
    a.target = "soporte";
    a.href = url;
    a.click();	
}

function validado(){
    campos="tabla=tbl_contrato_pagos";
    campos+="&tabla_id=codigo_contrato_pago";
    campos+="&codigo="+ p_codigo_contrato_pago;
    campos+="&campo=validado";
    campos+="&valor=1";
    console.log(campos);

    $.ajax({
        type: 'POST',
        async: true,
        url: '/ajax/registro_editar.php',
        data: campos,
        success: function(data){
            return false;
        },
        dataType: 'text'

    });

}

function listado_consulta2(div,consulta,filtro,opcion,modo,callback){
		console.log(" Consulta ", opcion);
		data_div="";

		if (modo==undefined) {
			modo=false;
		}

		$.ajax({
			type: 'POST',
			async: modo,
			url: 'ajax/listado_consulta3.php',
			data:{
			consulta: consulta,
			filtro: filtro,
			opcion: 1
			},
			success: function(data){

			console.log(data);
			if ( data.resultado==0 ) {
				data_div=data.mensaje;
			}else{
				data_div=data.mensaje;
			}
			if(callback){
				//alert("h1");
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

	function hola(){
		setTimeout(function(){ cargar_tabla() }, 100);

        var cant_soporte=parseInt($("#div_listado_movimientos .table tbody tr").length);
        if (cant_soporte){
            $("#cant_soporte").html(cant_soporte);
        }
        
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

		let perfilUser=document.querySelectorAll("#perfilMoto");
		perfilUser.forEach((element) => {
			element.addEventListener('click', (e) => {mostrarModalEditar(e,"ModuloMotos")});
		})
		
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

		$('.mfp-pop').magnificPopup({
			disableOn: function() { if($(window).width()<992){return false; } return true;}
	  	});

		$("#div_listado table").on('page.dt', function(){
			$('.mfp-pop').magnificPopup({
				disableOn: function() { if($(window).width()<992){return false; } return true;}
		  });
		});
		
	}

function actualizar(){

    edicion+="&valor="+ $('#txt_editar').val();
    $.ajax({
        type: 'POST',
        async: true,
        url: '/ajax/registro_editar.php',
        data: edicion,
        success: function(data){
            $('#ModalEditar').modal('hide');
            cargar_listado();
            return false;
        },
        dataType: 'text'
});

}

function agregar_accion(codigo_cartera){

    cod_cartera=codigo_cartera;
    $('#modal_cambiar_estado').modal('show');
    cargar_listado_estados();
}

function cargar_listado_estados(){
	listado_consulta2("div_listado_estados","listado_cartera_acciones","WHERE cta.codigo_cartera="+cod_cartera,"",true);
}

function guardar_estado(){

    if($("#fecha_estado").val()==""){
        alert("Debe ingresar una fecha");
        $("#fecha_estado").focus();
        return false;
    }else{
        campos=$("#registro_estados").serialize();
        campos+="&codigo_cartera="+cod_cartera;
        campos+="&tabla=tbl_cartera_acciones";
        campos+="&campos=codigo_usuario,codigo_cartera,abono,descripcion,fecha";
        campos+="&formulario=codigo_usuario,codigo_cartera,abono,observacion_accion,fecha_estado";
        console.log(campos);

        $.ajax({
            type: 'POST',
            async: false,
            url: '/ajax/registro_guardar.php',
            data: campos,
            success: function(data){
            },
            dataType: 'text'
        }).done(function( data ){
            alert(data);
            //$('.modal').modal('hide');
            $("#registro_estados")[0].reset();
            cargar_listado_estados();
        });
    }
}
</script>

<div id="div_combrobante_pago" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="width:140% !important">
            
            <div class="modal-header">
                <table><tr id="modal-titulo">Validar Comprobante de Pago</tr></table>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="iframe_soporte">
                    <iframe id="iframe_soporte" src="" name="soporte" style="height:600px;width:100%;" title="Soporte"></iframe>
                    <table><tr id="modal-Ciclo"><td><h4 style="color: black;padding-top: 10px;"><img src='/img/calendar.png'/>  <label id='lbl_ciclo'></label></h4></td></tr></table>
                    
                    <form id='form_numero_validar'>
                        <div id='div_listado_comprobante'></div>
                        <p>
                            <label>Nro Soporte</label>
                            <input id='soporte_pago' type="text" name='soporte_pago'>
                        </p>
                        <p>
                            <label>Forma de Pago</label>
                            <select id="forma_pago" name="forma_pago">
                                <option value="Consignacion">Consignación</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="PayPal">PayPal</option>
                                <option value="Otro">Otro</option>
                            </select>

                            <select id="codigo_banco" name="codigo_banco" style="display:none">
                                <option value="0" >Seleccione el Banco</option>
                                <option value="1" >Bancamia S.a.</option>
                                <option value="2" >Banco Agrario</option>
                                <option value="3" >Banco Av Villas</option>
                                <option value="4" >Banco Bbva Colombia S.a.</option>
                                <option value="5" >Banco Caja Social</option>
                                <option value="6" >Banco Cooperativo Coopcentral</option>
                                <option value="7" >Banco Credifinanciera</option>
                                <option value="8" >Banco Davivienda</option>
                                <option value="9"> Banco De Bogota</option>
                                <option value="10" >Banco De Occidente</option>
                                <option value="11" >Banco Falabella </option>
                                <option value="12" >Banco Gnb Sudameris</option>
                                <option value="13" >Banco Itau</option>
                                <option value="14" >Banco Pichincha S.a.</option>
                                <option value="15" >Banco Popular</option>
                                <option value="16" >Banco Santander Colombia</option>
                                <option value="17" >Banco Serfinanza</option>
                                <option value="18" >Bancolombia</option>
                                <option value="19" >Bancoomeva S.a.</option>
                                <option value="20" >Cfa Cooperativa Financiera</option>
                                <option value="21" >Citibank </option>
                                <option value="22" >Coltefinanciera</option>
                                <option value="23" >Confiar Cooperativa Financiera</option>
                                <option value="24" >Cotrafa</option>
                                <option value="25" >Daviplata</option>
                                <option value="26" >Giros Y Finanzas Compañia De Financiamiento S.a.</option>
                                <option value="27" >Movii S.a.</option>
                                <option value="28" >Nequi</option>
                                <option value="29" >Rappipay</option>
                                <option value="30" >Scotiabank Colpatria</option>
                            </select>
                        </p>
                        <p>
                            <label>Cuenta</label>
                            <select name="codigo_cuenta" id="codigo_cuenta" style="padding:9px 9px;margin-bottom:21px"></select>	
                        </p>
                        
                        <?php
							echo '<input type="hidden" name="codigo_usuario" value="'.$_SESSION["codigo_usuario"].'"/>';
                        ?>

                        <p>
                            <input id='btn_guardar_numero_soporte_n' type='button' value="Guardar">
                        </p>
                    </form>
                </div>

                

            </div>
        </div>
    </div>
</div>

<div id="div_pagos" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="width:140% !important">
            
            <div class="modal-header">
                <table><tr id="modal-titulo">Listado de Pagos</tr></table>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <button onclick="exportToExcel()">Exportar a Excel</button>
                <button onclick="exportToPDF()">Exportar a PDF</button>
                <div id='div_listado_pagos'></div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_usu_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <form  id="registro">	
        	 
			<div class="row">  
			 
			 	<div class="col">
	        		<div class="input-group mb-3">
			  			<div class="input-group-prepend">
			    			<span class="input-group-text" id="basic-addon1">Contrato</span>
						</div>
						<select class="form-control" name="codigo_contrato" id="codigo_contrato"></select>
					</div>
				</div>

				

			</div>

		 	<div class="row">  

			 	<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Fecha</span>
						</div>
						<input class="form-control" id="fecha_inicio" name="fecha_inicio" type="date" value="0000-00-00" id="example-datetime-local-input">
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Deuda $</span>
						</div>
						<input id="valor" name="valor" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
					</div>
				</div>

			</div>

			<div class="row">

			<div class="col">

				<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Cobro</span>
				</div>
				<select class="form-control" name="codigo_cobro_concepto" id="codigo_cobro_concepto">
				</select>		

				</div>

				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Observaciones</span>
						</div>

						<textarea id="observaciones" name="observaciones" rows="3" cols="30" class="form-control"></textarea>
					</div>
				</div>
		   </div> 	
		   
		</form>
      	</div>

		<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_grabar">Grabar</button>
		</div>
    </div>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="modal_cambiar_estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	
		<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalLabel">Historial de Acciones</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      	</div>

	<form id="registro_estados" name="registro_estados">
		<div class="modal-body">

			<div class="row">
				
			</div>
			<div class="row">  

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Fecha</span>
						</div>
						<input type="date" id="fecha_estado" name="fecha_estado" />
					</div>
				</div>

				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Abono $</span>
						</div>
						<input id="abono" name="abono" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
					</div>
				</div>

				
				<input type="hidden" id="codigo_usuario" name="codigo_usuario" value="<?Php echo $_SESSION['codigo_usuario']; ?>"/>
					

			</div>

			<div class="row">  
				<div class="col">
					<div class="input-group mb-3">

						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Observaciones</span>
						</div>

						<textarea
							id="observacion_accion"
							name="observacion_accion"
							rows="3"
							cols="30"
							class="form-control"></textarea>

					</div>
				</div>
			</div>

			
			<div class="row">  

				<div class="col">
					<div id="div_listado_estados"></div>
				</div>
			</div>

		</div>
	</form>

    	<div class="modal-footer">

			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary" id="btn_grabar_estados">Grabar</button>

      </div>
</div>

</div>

</div>

<script>
    function exportToExcel() {
        /* Obtener el contenedor de la tabla */
        var contenedorTabla = document.getElementById("div_listado_pagos");

        /* Obtener la tabla dentro del contenedor */
        var tabla = contenedorTabla.querySelector('table');

        /* Crear un nuevo libro de Excel */
        var wb = XLSX.utils.table_to_book(tabla);

        /* Descargar el libro de Excel */
        XLSX.writeFile(wb, "datos.xlsx");
    }

    function exportToPDF() {
        /* Obtener el contenedor de la tabla */
        var contenedorTabla = document.getElementById("div_listado_pagos");

        /* Clonar la tabla para manipularla sin afectar la original */
        var tabla = contenedorTabla.cloneNode(true);

        /* Ocultar las columnas que no deseas mostrar en el PDF */
        var filas = tabla.querySelectorAll("tr");
        filas.forEach(function(fila) {
            var columnas = fila.querySelectorAll("td, th");
            // Por ejemplo, si quieres ocultar la segunda columna:
            columnas[5].style.display = "none";
        });

        /* Crear un nuevo objeto html2pdf */
        html2pdf()
            .set({
                pagebreak: { mode: 'avoid-all' },
                filename: 'datos.pdf',
                html2canvas: { scale: 3 },
                jsPDF: { format: 'legal', orientation: 'landscape' },
                margin: [0, 0, 0, 0], // Opcional: Ajusta los márgenes si es necesario
                pagebreak: { mode: 'avoid-all' },
                font: { size: 1 } // Tamaño de la fuente // Deshabilita la paginación automática
            })
            .from(tabla)
            .save();
    }

    function exportToPDF2() {
        /* Obtener el contenedor de la tabla */
        var contenedorTabla = document.getElementById("div_listado_pagos");

        /* Crear un nuevo objeto de definiciones de documento */
        var docDefinition = {
            content: [
                {
                    table: {
                        headerRows: 1,
                        widths: [ '*', '*', '*' ],

                        // Obtener datos de la tabla
                        body: [
                            // Obtener datos de la cabecera
                            [ 'Contrato', 'Fecha', 'Forma de Pago' ],

                            // Obtener datos del cuerpo de la tabla
                            [ 'Dato 1', 'Dato 2', 'Dato 3' ],
                            // Agregar más filas según sea necesario
                        ]
                    }
                }
            ]
        };

        /* Generar el PDF */
        pdfmake.createPdf(docDefinition).download("datos.pdf");
    }
</script>
