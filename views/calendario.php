  

  <!--  FULLCALENDAR 		-->
<link href='/config/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='/config/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/config/fullcalendar/moment.min.js'></script>
<script src='/config/fullcalendar/fullcalendar.min.js'></script>
<script src='/config/fullcalendar/es.js'></script>
<script src='/config/fullcalendar/popper.min.js'></script>

<style>
    .fc-event{
        background-color:#00d7bc;
        color:white !important;
        border:1px solid gray;
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

});
</script>

<div id='calendar'></div>