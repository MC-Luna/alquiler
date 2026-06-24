

  <!--  FULLCALENDAR 		-->
  <link href='/config/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='/config/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/config/fullcalendar/moment.min.js'></script>
<script src='/config/fullcalendar/fullcalendar.min.js'></script>
<script src='/config/fullcalendar/es.js'></script>
<script src='/config/fullcalendar/popper.min.js'></script>

<link href='/app/config/tabs/component.css' rel='stylesheet' />
<script src="/app/config/tabs/cbpFWTabs.js"></script>


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
        require "../cbd.php";

        $sql = "select
            DATE_FORMAT(e.fecha,'%Y-%m-%dT%H:%i:00') as 'inicio',
            DATE_FORMAT(DATE_ADD(e.fecha, INTERVAL 30 minute),'%Y-%m-%dT%H:%i:00') as 'final',
            e.codigo_evento,
            e.descripcion

            from calendario_eventos e";

        if (!($result = $db->query($sql))) {
            die("Error [" . $db->error . "]");
        }

        $coma = "";
        $eventos = "events: [";
        while ($reg = $result->fetch_array(MYSQLI_NUM)) {
            $eventos .= $coma . "{";
            $eventos .= 'start: "' . $reg[0] . '",';
            $eventos .= 'end: "' . $reg[1] . '",';
            $eventos .= "id: " . $reg[2] . ",";
            $eventos .= 'title: "' . utf8_encode($reg[3]) . '"}';
            $coma = ",";
        }

        echo $eventos . "]";
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
    </style>

<div id="tabs" class="tabs">
				<nav>
					<ul>
                    <li><a href="#section-1" class="icon-task"><span>Cobros</span></a></li>
					<li><a href="#section-2" class="icon-clientes"><span>Clientes</span></a></li>
					<li style="display:none"><a href="#section-3" class="icon-leads"><span>Leads</span></a></li>
					<li style="display:none"><a href="#section-4" class="icon-calendar"><span>Citas</span></a></li>
                    <li><a href="#section-5" class="icon-calendar"><span class="lnr lnr-home"></span><span>Reportes</span></a></li>
					</ul>
                </nav>


				<div class="content">

					<section id="section-1">

                    <div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Sede</span>
						</div>
                            <select class="form-control" name="codigo_sede" id="codigo_sede"></select>
                        </div>
                        <div>
                            <form method="POST" action="exportarpagos.php">
				<button class="btn btn-success pull-right" name="export"><span class="glyphicon glyphicon-print"></span> Exportar pagos Excel</button>
			</form>
                        </div>
                    </div>

                    <div id='div_listado_cobro' style='overflow-y: auto;font-size: 0.8em;'><div>
					</section>

					<section id="section-2">
                        <div id='div_listado_leads'><div>
					</section>

                    <section id="section-3">


                    </section>

                    <section id="section-4">
                        <div id='calendar'></div>
					</section>

                    <section id="section-5">
                    <!--<iframe width="100%" height="1000px" src="https://lookerstudio.google.com/embed/reporting/5afa7ab0-f8ed-4418-959f-f7d7a35f660d/page/ebsXD" frameborder="0" style="border:0" allowfullscreen></iframe>
                    -->
                    </section>
				</div><!-- /content -->
			</div><!-- /tabs -->

<script type="text/javascript">

var edicion="";

        // Edición de notas
        $("#btn_actualizar").bind("click",actualizar);

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


            $("#myModal").modal("show");
            $('#iframe_soporte').hide();
            indice_seleccionado=$('.item').index(this);
            codigo_contrato=$("input[name='oculto0[]").eq(indice_seleccionado).val();
            //alert("Este es el contrato "+ codigo_contrato);
            listado_consulta("div_listado_pagos","listado_pagos"," where p.codigo_contrato="+ codigo_contrato+ " order by p.fecha_registro desc","");


		});


        var p_codigo_contrato_pago=0;
        var p_codigo_contrato=0;

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

$(document).on('click','#btn_guardar_numero_soporte', function(e){

        e.preventDefault();
        if($('#btn_guardar_numero_soporte').val()==""){
            alert("Debe digitar un numero");
            $('#btn_guardar_numero_soporte').focus();
        }else{

            campos="codigo_contrato="+ p_codigo_contrato;
            campos+="&codigo_contrato_pago="+ p_codigo_contrato_pago;
			campos+="&soporte_pago="+ $('#soporte_pago').val();
            campos+="&forma_pago="+$("#forma_pago").val();
            campos+="&codigo_banco="+$("#codigo_banco").val();
            campos+="&pagorealizado="+$("#pagorealizado").val();
			console.log(campos);

			$.ajax({
				method: 'POST',
				url: '/ajax/actualizar_pago.php',
                data: campos,
                /*
				success: function(data){
				//console.log("holaaaa");
                    //validado();
                    //actualizar_contrato();


                    $('#iframe_soporte').hide();
					$('.modal').modal('hide');
                    p_codigo_contrato=0;
                    p_codigo_contrato_pago=0;
                    console.log(data);



				//window.location.reload(true);
                },
                */
				dataType: 'json'
			}).done(function(response){

                if(response.mensaje == "soporteRepetido"){
                    alert("Numero de soporte repetido");
                    return;
                }else{
                    alert(response.mensaje);
                    console.log("exito", response);
                    $('#iframe_soporte').hide();
                    $('.modal').modal('hide');
                    window.location.reload(true)
                    cargar_listado();
                }



            }).fail(function(response){

                console.log("mensaje",response.mensaje);
                console.log("mensajeArray", response["mensaje"]);
                console.log("error",response);
                //cargar_listado();
            });

        }
});


    $(document).on('click','.pago', function(e){
		//$( ".editar" ).on("click", function() {
            p_codigo_contrato_pago=$(this).data("codigo_contrato_pago");
            p_codigo_contrato=$(this).data("codigo_contrato");
            var _du=$(this).data("url");
            url="/archivos_cargados/registro_pago/"+_du.substring(_du.indexOf('.')+1);
            open_w(url);
            $('#iframe_soporte').show();
            /*
        */

    });

let idcede="";
cargar_listado(idcede);

});

function cargar_listado(idcede){

    let cede="";

    if (typeof idcede == 'undefined') {
        idcede="";
    }

    if(idcede != ""){
        cede=` and m.codigo_sede=${idcede}`;
    }else{
        listado_consulta("div_listado_leads","listado_leads","");
    }

    console.log("FILTRADOCEDE", cede);

let where=" Where 1 and c.activo=1 "+cede+" GROUP BY c.codigo_contrato ORDER BY c.fecha_proximo_cobro ";
//alert("Estes es mi codigo sede " + codigo_sede);
listado_consulta("div_listado_cobro","listado_cobros", where);
//Where m.codigo_sede="+ codigo_sede +" ORDER BY c.fecha_proximo_cobro asc
//$('#div_listado table').DataTable().searchPanes.rebuildPane();

}

function open_w(url){

    var a = document.createElement("a");
    a.target = "soporte";
    a.href = url;
    a.click();

}

function fn_reversar_pago(codigo_contrato_pago){
    campos="codigo_contrato_pago="+ codigo_contrato_pago;

    $.ajax({
        type: 'POST',
        async: true,
        url: '/ajax/reversar_pago.php',
        data: campos,
        success: function(data){
            console.table(data);
            alert(data.mensaje);
            if(data.resultado=1){
                listado_consulta("div_listado_pagos","listado_pagos"," where p.codigo_contrato="+ codigo_contrato+ " order by p.fecha_registro desc","");
            }
            ///console.log("desde el ajax de actualziar pago", data)
            //console.log("holaaaa");
            //$('.modal').modal('hide');
            return false;

        //window.location.reload(true);
        },
        dataType: 'json'
    });
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
        //console.log("holaaaa");
            //$('.modal').modal('hide');
            return false;

        //window.location.reload(true);
        },
        dataType: 'text'
    });
}


rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
		"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
		"1","codigo_sede");


var SelectCede=document.querySelector('#codigo_sede');
SelectCede.addEventListener('change', (e) => {cargar_listado(e.target.value)});

function actualizar_contrato(){
    campos="tabla=tbl_contratos";
    campos+="&tabla_id=codigo_contrato";
    campos+="&codigo="+ p_codigo_contrato;
    campos+="&campo=pendiente_pago";
    campos+="&valor=0";
    console.log(campos);

    $.ajax({
        type: 'POST',
        async: true,
        url: '/ajax/registro_editar.php',
        data: campos,
        success: function(data){
        //console.log("holaaaa");
            //$('.modal').modal('hide');
            return false;

        //window.location.reload(true);
        },
        dataType: 'text'
    });
}


function actualizar_contrato(){
    campos+="codigo_contrato="+ p_codigo_contrato;
    campos+="&codigo_contrato_pago="+ p_codigo_contrato_pago;
    campos+="&forma_pago="+$("#forma_pago").val();
    campos+="&codigo_banco="+$("#codigo_banco").val();
    console.log(campos);

    $.ajax({
        type: 'POST',
        async: true,
        url: '/ajax/actualizar_pago.php',
        data: campos,
        success: function(data){
            console.log("desde el ajax de actualziar pago", data)
            //console.log("holaaaa");
            //$('.modal').modal('hide');
            return false;

        //window.location.reload(true);
        },
        dataType: 'text'
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

</script>

<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content" style="width:140% !important">
			      <div class="modal-header">
			      	<table><tr id="modal-titulo">Listado de Pagos</tr></table>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div id="menu_actual"></div>
			      <div class="modal-body">

                <div id="iframe_soporte">
                  <iframe id="iframe_soporte" src="" name="soporte" style="height:600px;width:100%;" title="Soporte"></iframe>
                    <form id='form_numero_validar'>
                        <p>
                            <label>Nro Soporte</label>
                            <input id='soporte_pago' type="text" name='soporte_pago'>
                        </p>
                        <p>
                            <label>Forma de Pago</label>
                            <select id="forma_pago" name="forma_pago">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                <option value="Consignacion">Consignación</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="PayPal">PayPal</option>
                                <option value="Otro">Otro</option>
                            </select>

                            <label for="pagorealizado">Pago Realizado</label>
                            <input type="text" name="pagorealizado" id="pagorealizado"/>

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
                            <input id='btn_guardar_numero_soporte' type='button' value="Guardar">
                        </p>
                    </form>
                </div>


                  <div id='div_listado_pagos'></div>

			 	</div>
			</div>
		</div>
	</div>
