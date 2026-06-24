<link href='/app/config/tabs/component.css' rel='stylesheet' />
<script src="/config/tabs/cbpFWTabs.js"></script>

<script type="text/javascript">


$(document).ready(function(){


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


@import url("https://fonts.googleapis.com/css?family=Montserrat");

.pricing-table{
  background-color: #eee;
  font-family: 'Montserrat', sans-serif;
}

.pricing-table .block-heading {
  padding-top: 50px;
  margin-bottom: 40px;
  text-align: center; 
}

.pricing-table .block-heading h2 {
  color: #00d6b8;
}

.pricing-table .block-heading p {
  text-align: center;
  max-width: 420px;
  margin: auto;
  opacity: 0.7; 
}

.pricing-table .heading {
  text-align: center;
  padding-bottom: 10px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1); 
}

.pricing-table .item {
  background-color: #ffffff;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  border-top: 2px solid #00d6b8;
  padding: 30px;
  overflow: hidden;
  position: relative; 
}

.pricing-table .col-md-5:not(:last-child) .item {
  margin-bottom: 30px; 
}

.pricing-table .item button {
  font-weight: 600; 
}

.pricing-table .ribbon {
  width: 160px;
  height: 32px;
  font-size: 12px;
  text-align: center;
  color: #fff;
  font-weight: bold;
  box-shadow: 0px 2px 3px rgba(136, 136, 136, 0.25);
  background: #4dbe3b;
  transform: rotate(45deg);
  position: absolute;
  right: -42px;
  top: 20px;
  padding-top: 7px; 
}

.pricing-table .item p {
  text-align: center;
  margin-top: 20px;
  opacity: 0.7; 
}

.pricing-table .features .feature {
  font-weight: 600; }

.pricing-table .features h4 {
  text-align: center;
  font-size: 18px;
  padding: 5px; 
}

.pricing-table .price h4 {
  margin: 15px 0;
  font-size: 45px;
  text-align: center;
  color: #2288f9; 
}

.pricing-table .buy-now button {
  text-align: center;
  margin: auto;
  font-weight: 600;
  padding: 9px 0; 
}


    </style>

<section id="section-1">
    <div class="mediabox">
        <h3>Quienes somos</h3>
        <p>Es una sociedad participada del grupo MOTO RENT COLOMBIA encargada de alquilar las motos por meses para propósitos laborales y empresariales.</p>
    </div>
    <div class="mediabox">
        <h3>Misión</h3>
        <p>Atendemos clientes que necesitan un medio de transporte para trabajar en el creciente mercado de las aplicaciones de domicilios, mensajerías, reparto de encomiendas o servicios empresariales dentro del sector urbano y rural.</p>
    </div>
    <div class="mediabox">
        <h3>Visión</h3>
        <p>ser socios de un sector laboral articulado a las aplicaciones de mensajería y transporte. 
        <br><br>    
        Convertirse en el referente de alquiler económico para trabajadores y empresas.</p>
    </div>
	</section>


<section class="pricing-table">
        <div class="container2">
            <div class="block-heading">
              <h2>Planes</h2>
              <p></p>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>SUSCRIPCIÓN MENSUAL</h3>
                        </div>
                        <p>Rentar la moto desde <b>15 mil pesos</b> el día</p>
                        <div class="features">
                            <h4><span class="feature">Pago</span> : <span class="value">Por adelantando</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Días</span></h4>
                            <h4><span class="feature">Condiciones</span> : <span class="value">Sin cláusula de permanencia</span></h4>
                        </div>
                        <div class="price">
                        
                        </div>
                        <button class="btn btn-block btn-outline-primary" type="submit">SOLICITAR</button>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                       <div class="heading">
                            <h3>ALQUILER POR SEMANA</h3>
                        </div>
                        <p>Rentar la moto desde <b>18 mil pesos al día</b></p>
                        <div class="features">
                            <h4><span class="feature">Pago</span> : <span class="value">Por adelantando</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">7 Días</span></h4>
                            <h4><span class="feature">Condiciones</span> : <span class="value">Bajo un contrato de un mes de alquiler</span></h4>
                        </div>
                        <div class="price">
                          
                        </div>
                        <button class="btn btn-block btn-primary" type="submit">SOLICITAR</button>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>ALQUILER CON COMPRA</h3>
                        </div>
                        <p>Rentar la moto, con opción a compra</p>
                        <div class="features">
                            <h4><span class="feature">Pago</span> : <span class="value">Pago adelantado y un adicional</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">12, 24 ó 48 meses</span></h4>
                            <h4><span class="feature">Condiciones</span> : <span class="value">Acordado con el cliente</span></h4>
                        </div>
                        <div class="price">
                       
                        </div>
                        <button class="btn btn-block btn-outline-primary" type="submit">SOLICITAR</button>
                    </div>
                </div>
            </div>
        </div>
</section>

