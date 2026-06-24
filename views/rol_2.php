  

  <!--  FULLCALENDAR 		-->
<link href='/config/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='/config/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/config/fullcalendar/moment.min.js'></script>
<script src='/config/fullcalendar/fullcalendar.min.js'></script>
<script src='/config/fullcalendar/es.js'></script>
<script src='/config/fullcalendar/popper.min.js'></script>

<link href='/app/config/tabs/component.css' rel='stylesheet' />
<script src="/config/tabs/cbpFWTabs.js"></script>

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
    font-size: 1.25em;
    padding: 1.5em 1em;
    display: none;
    max-width: 1230px;
    margin: 0 auto;
}

.tabs nav ul li {
    border-radius: 10px 10px 0px 0px;
}
    </style>

<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-task"><span>Tareas</span></a></li>
						<li><a href="#section-2" class="icon-calendar"><span>Citas</span></a></li>
						<li><a href="#section-3" class="icon-clientes"><span>Clientes</span></a></li>
						<li><a href="#section-4" class="icon-datos"><span>Datos</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
						<div class="mediabox">
							<img src="img/01.png" alt="img01" />
							<h3>Sushi Gumbo Beetroot</h3>
							<p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
						</div>
						<div class="mediabox">
							<img src="img/02.png" alt="img02" />
							<h3>Pea Sprouts Fava Soup</h3>
							<p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.</p>
						</div>
						<div class="mediabox">
							<img src="img/03.png" alt="img03" />
							<h3>Turnip Broccoli Sashimi</h3>
							<p>Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya nuts black-eyed pea prairie turnip leek lentil turnip greens parsnip.</p>
						</div>
					</section>
					<section id="section-2">
                        <div id='calendar'></div>
					</section>
					<section id="section-3">
						<div class="mediabox">
							<img src="img/02.png" alt="img02" />
							<h3>Noodle Curry</h3>
							<p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.Sushi gumbo beet greens corn soko endive gumbo gourd.</p>
						</div>
						<div class="mediabox">
							<img src="img/06.png" alt="img06" />
							<h3>Leek Wasabi</h3>
							<p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
						</div>
						<div class="mediabox">
							<img src="img/01.png" alt="img01" />
							<h3>Green Tofu Wrap</h3>
							<p>Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
						</div>
					</section>

                    <section id="section-3">
                    </section>
			
				</div><!-- /content -->
			</div><!-- /tabs -->
