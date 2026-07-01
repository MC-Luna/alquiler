<?php
session_start();
?>
<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		
	<?php
	if ($_SESSION['codigo_rol']==1){
		echo '<button type="button" class="btn btn-success" onclick="open_modal(1,0,0)">
			Crear
		</button>';
	}
	?>
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
							<span class="input-group-text" id="basic-addon1">Categoría</span>
						</div>
						<input type="text" name="categoria" class="form-control" placeholder="" aria-label="namesede" aria-describedby="basic-addon1">	
						</div>
					</div>

					<div class="col">
						<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Documento</span>
						</div>
						<input type="text" name="descripcion" class="form-control" placeholder="" aria-label="direccionsede" aria-describedby="basic-addon1">		
						</div>
					</div>

				</div>

				<div class="row">  
					<div class="col">
						<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Link</span>
						</div>
						<input type="text" name="link" class="form-control" placeholder="" aria-label="namesede" aria-describedby="basic-addon1">	
						</div>
					</div>
				</div>

				</form>
			</div>
      		
			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro_documento">Grabar</button>
      		</div>
    	</div>
  	</div>
</div>


<script type="text/javascript">
	
	var	form=[
		{	id:0,
			title: 'Documentación',
			div_listado:'div_listado',
			listado: 'listado_documentacion',
			filtro: '',
		},
		{	id:1,
			name:'registro',
			title:'Registro de Documentación',
			modal:'#modal_reg',
			div_listado:'div_listado',	
			tabla:'tbl_documentacion',
			codigo:'codigo_documento',
			referencia:'',
			listado:'listado_documentacion',
			button:'#btn_registro_documento',
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

			break;
		case 2:
			
			break;
		}
	}



</script>
<script type="text/javascript" charset="utf8" src="views/view.js?20260701"></script>
