<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" onclick="open_modal(1,0,0)">
			Crear
		</button>
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
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro_proveedor">Grabar</button>
      		</div>
    	</div>
  	</div>
</div>




<div id="modal_servicio" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
			
			<div class="modal-header">
				<h5 id="modal_servicio_title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
      
			<div class="modal-body">
				<form  id="servicio" name="servicio">	

					<input type="hidden" id="codigo_proveedor" name="codigo_proveedor"/>
					
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

				<div id="div_listado_servicio"></div>
			</div>

      		
			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro_servicio">Grabar</button>
      		</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
	
	var	form=[
		{	id:0,
			title: 'Beneficiarios',
			div_listado:'div_listado',
			listado: 'listado_proveedores',
			filtro: '',
		},
		{	id:1,
			name:'registro',
			title:'Registro de Proveedores',
			modal:'#modal_reg',
			div_listado:'div_listado',	
			tabla:'tbl_proveedores',
			codigo:'codigo_proveedor',
			referencia:'',
			listado:'listado_proveedores',
			button:'#btn_registro_proveedor',
			cierre_modal:1
		},
		{	id:2,
			name:'servicio',
			title:'Orden de servicio',
			modal:'#modal_servicio',
			div_listado:'div_listado_servicio',	
			tabla:'tbl_proveedor_servicios',
			codigo:'codigo_servicio',
			referencia:'codigo_proveedor',
			listado:'listado_servicios',
			filtro:'',
			button:'#btn_registro_servicio',
			cierre_modal:0
		}
	];

	$(document).ready(function() {

		

	});

	function load_modal(n,s,r){
		switch(n) {
		case 1:
			rellenar_select("tbl_ciudades","codigo_ciudad","concat(codigo_departamento,'/',nombre)"," codigo_pais='COL' order by codigo_departamento","codigo_ciudad");
			rellenar_select("tbl_sedes","codigo_sede","nombre"," 1","codigo_sede");
			$("#codigo_ciudad").on("change",function(){
				alert("cambio");
			});

			break;
		case 2:
			let filtro='codigo_proveedor='+r;
			listado(form[2].div_listado,form[2].listado,filtro,1,true);
			break;
		}
	}



</script>
<script type="text/javascript" charset="utf8" src="views/view.js"></script>
