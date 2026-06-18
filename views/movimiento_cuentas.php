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
									<span class="input-group-text" >Tipo</span>
								</div>
								<select name="codigo_tipo_cuenta" class="form-control"  id="codigo_tipo_cuenta" lang="1"></select>		
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Numero</span>
								</div>
								<input name="numero" class="form-control" type="text" placeholder="" lang="1" >	
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Descripción</span>
								</div>
								<input name="descripcion" type="text"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>

						

					</div>

					<div class="row"> 
						
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Nombre del Propietario</span>
								</div>
								<input name="propietario_nombre" class="form-control" type="text" placeholder="" lang="1" >	
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Identificación del Propietario</span>
								</div>
								<input name="propietario_identificacion" type="text"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Cupo $</span>
								</div>
								<input name="cupo" type="number"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>
						
					</div>

					<div class="row">
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Cobertura</span>
								</div>
								<select name="transversal" class="form-control"  id="transversal">
									<option value="1">Transversal</option>
  									<option value="0">Local</option>
								</select>
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
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro_cuenta">Grabar</button>
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
			title: 'Cuentas',
			div_listado:'div_listado',
			listado: 'listado_cuentas',
			filtro: '',
		},
		{	id:1,
			name:'registro',
			title:'Registro de cuentas',
			modal:'#modal_reg',
			div_listado:'div_listado',	
			tabla:'tbl_movimiento_cuentas',
			codigo:'codigo_cuenta',
			referencia:'',
			listado:'listado_cuentas',
			button:'#btn_registro_cuenta',
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
			rellenar_select("tbl_movimiento_cuenta_tipos","codigo_tipo_cuenta","descripcion"," 1","codigo_tipo_cuenta");
			
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
