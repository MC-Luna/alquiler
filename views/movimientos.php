
<div style="display: contents;padding:4px">
<form id='form_consulta'>
	<div class="row"> 
		
			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >Desde</span>
					</div>
					<input name="fecha_desde" class="form-control" type="date" placeholder="Desde" lang="1" >	
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >Hasta</span>
					</div>
					<input name="fecha_hasta" class="form-control" type="date" placeholder="Desde" lang="1" >	
				</div>
			</div>

			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" >Cuentas</span>
					</div>
					<select class="form-control" name="codigo_cuenta" id="codigo_cuenta"></select>	
				</div>
			</div>
		

		<div class="col">
			<a href="#" onclick="getData(1)"><img src="img/alert.png"></a>
			<button type="button" class="btn btn-success" onclick="getData(0)">Consultar</button>
		</div>
				
	</div>
</form>

	<div class="row">
		<div class="col">
			<div style="height:300px;width:100%">
				<canvas id="myChart" height="0px"></canvas>
			</div>
		</div>
	</div>
</div>

<div id="div_listado"></div>

<!-- Modal -->
<div id="modal_reg" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			
			<div class="modal-header">
				<h5 id="modal_reg_title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
      
			<div class="modal-body">
				<form  id="registro" name="registro">	
					
					<div class="row"> 
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Tipo de documento</span>
								</div>
								<select name="tipo_documento" class="form-control"  id="tipo_documento" lang="1">
									<option value="0">Seleccione</option>
									<option value="cc">Cedula de Ciudadanía</option>
									<option value="ex">Cedula de Extranjeria</option>
									<option value="pa">Pasaporte</option>
									<option value="nit">NIT</option>
									<option value="ctb">Cuenta Bancaria</option>
								</select>
							</div>
						</div>
						
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Identificación</span>
								</div>
								<input name="identificacion" class="form-control" type="text" placeholder="" lang="1" >	
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Razón Social</span>
								</div>
								<input name="razon_social" type="text"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Correo</span>
								</div>
								<input name="correo" type="text"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Celular</span>
								</div>
								<input name="celular" type="text"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Actividad</span>
								</div>
								<textarea
									name="actividad"
									rows="3"
									cols="30"
									class="form-control"></textarea>
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Sede</span>
								</div>
								<select name="codigo_sede" class="form-control"  id="codigo_sede"></select>		
							</div>
						</div>
					</div>

				</form>
			</div>

			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro">Grabar</button>
      		</div>
    	</div>
  	</div>
</div>

<div id="modal_referencia" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			
			<div class="modal-header">
				<h5 id="modal_referencia_title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
      
			<div class="modal-body">
				<form  id="referencia" name="servicio">	

					<input type="hidden" id="codigo_referencia" name="codigo_referencia"/>
					
					<div class="row"> 

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Labor realizada</span>
								</div>
								<textarea
									name="servicio"
									rows="3"
									cols="30"
									class="form-control" lang="1"></textarea>
							</div>
						</div>

					</div>

					<div class="row"> 

						<div class="col">

							<div class="input-group mb-3" >
								<div class="input-group-prepend">
									<span class="input-group-text" >Metodo de Pago</span>
								</div>
								<select name="metodo_pago" class="form-control"  lang="1" >
									<option value="0">Seleccionar</option>
									<option value="Caja Menor">Caja Menor</option>
									<option value="Tarjeta Credito">Tarjeta de Credito</option>
								</select>
							</div>


							<div class="input-group mb-3" style='display:none'>
								<div class="input-group-prepend">
									<span class="input-group-text" >Puntuación</span>
								</div>
								<select name="puntuacion" class="form-control"  lang="1" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
						
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Pago $</span>
								</div>
								<input name="pago" class="form-control" type="text" placeholder="" lang="1" >	
							</div>
						</div>
					</div>

				</form>

				<div id="div_listado_referencia"></div>
			</div>

      		
			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro_referencia">Grabar</button>
      		</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
	
	var	form=[
		{	id:0,
			title: 'Movimientos',
			div_listado:'div_listado',
			listado: 'listado_movimientos',
			filtro: ' where 1',
		},
		{	id:1,
			name:'registro',
			title:'Registro de movimientos',
			modal:'#modal_reg',
			div_listado:'div_listado',	
			tabla:'tbl_movimientos',
			codigo:'codigo_',
			referencia:'',
			listado:'listado_',
			button:'#btn_registro',
			cierre_modal:1
		},
		{	id:2,
			name:'referencia',
			title:'Titulo de referencia',
			modal:'#modal_servicio',
			div_listado:'div_listado_referencia',	
			tabla:'tbl_',
			codigo:'codigo_',
			referencia:'codigo_',
			listado:'listado_referencia',
			filtro:'',
			button:'#btn_registro_referencia',
			cierre_modal:0
		}
	];

	$(document).ready(function() {
		rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," 1","codigo_cuenta");

		getData(0);

	});

	function load_modal(n,s,r){
		switch(n) {
		case 1:
			rellenar_select("tbl_ciudades","codigo_ciudad","concat(codigo_departamento,'/',nombre)"," codigo_pais='COL' order by codigo_departamento","codigo_ciudad");
			rellenar_select("tbl_sedes","codigo_sede","nombre"," 1","codigo_sede");
			rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," 1","codigo_cuenta");
			
			$("#codigo_ciudad").on("change",function(){
				alert("cambio");
			});

			break;
		case 2:
			let filtro='codigo_='+r;
			listado(form[2].div_listado,form[2].listado,filtro,1,true);
			break;
		}
	}

</script>
<script type="text/javascript" charset="utf8" src="views/view.js"></script>

<script>

var myChart = null;
	
	function getData(pendiente) {
		var filtro_chart='';

		if($("[name='fecha_desde']").val()!='' || $("[name='codigo_cuenta']").val()>0){
			filtro_chart=' where ';
			var conector='';

			if($("[name='fecha_desde']").val()!=''){
				filtro_chart+= " DATE_FORMAT(mv.fecha_creacion, '%Y-%m-%d') BETWEEN '"+ $("[name='fecha_desde']").val() + "' AND '"+ $("[name='fecha_hasta']").val() + "'";
				conector=' and ';
			}
	
			if($("[name='codigo_cuenta']").val()>0){
				filtro_chart+= conector+" mv.codigo_cuenta="+$("[name='codigo_cuenta']").val();
			}

			if(pendiente){
				filtro_chart+= conector+" and d3.nombre IS NULL OR d3c.nombre IS NULL OR d7c.nombre IS NULL ";
				console.log(filtro_chart);
			}
		}else{
			if(pendiente){
				filtro_chart+=" where 1 HAVING pendiente=1 ";
				console.log(filtro_chart);
			}
		}

		listado(form[0].div_listado,form[0].listado,filtro_chart,1,true);

		$.ajax({
			url: '/app/ajax/chart_movimientos.php?'+ $("#form_consulta").serialize(), // Nombre del archivo PHP que maneja la consulta
			method: 'GET',
			success: function(response) {
				$("#myChart").html("");
				var data = JSON.parse(response);
				if(myChart !== null) {
					// Destruir para poder crear nuevamente
					myChart.destroy();
				}
				createChart(data); // Llama a la función para crear la gráfica
			}
		});
	}

	function createChart(data) {
		var ctx = document.getElementById('myChart').getContext('2d');

		myChart= new Chart(ctx, {
		type: 'line',
		data: {
			labels: data.fecha,
			datasets: [
				{
					label: 'Entrada',
					data: data.entrada,
					borderWidth: 1,
					borderColor: '#50ae00',
				},
				{
					label: 'Salida',
					data: data.salida,
					borderWidth: 1,
					borderColor: '#ff4141',
				},

			]
		},	
		options: {
			responsive: true,
			scales: {
				y: {
					stacked: false
				}
			},
			plugins: {
				legend: {
					position: 'top',
					display: false,
				},
				label:{
					display:false,
				},
				title: {
					display: false,
					text: 'Chart.js Line Chart'
				},
			}
		},
	});
}

</script>
