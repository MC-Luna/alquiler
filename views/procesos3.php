<?php
session_start();
?>
<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
	<?php
	session_start();
	if ($_SESSION['codigo_rol']==1){
	echo "<button type='button' class='btn btn-success' id='btn_crear' data-toggle='modal' data-target='#modal_reg'>
			Crear
		</button>";
	}else{
echo 'holaal'.$_SESSION['codigo_rol'];
	}
	?>
		<br><br>
		
	</div>
</div>

<div id="div_listado"></div>

<!-- Modal -->
<div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Sede</h5>
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

		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_grabar_documento" rel="1">Grabar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	var identidad = {
		nombre: 'Documentación',
		consulta: 'listado_documentacion',
		consulta_filtro: '',
		tabla:'tbl_documentacion',
		campos:'categoria,descripcion',
		formulario:'categoria,descripcion',
	};

	$(document).ready(function() {

		$("#btn_crear").bind("click",function(){
			document.registro.reset();
			limpiar_campos("registro");
			$("#btn_grabar_documento").attr("rel","1");
		});

		$("#btn_grabar_documento").bind("click",function(){
			if($(this).attr("rel")=="2"){
				grabar_editar_documento();
			}else{
				grabar_documento();
			}
		});

	});

	function editar_documentacion(codigo_documentacion){
		document.registro.reset();
		$("#modal_reg").modal();
		cargar_select_dialog();
		$("#modal_reg").attr('rel',codigo_sede);	
		limpiar_campos("registro");	
		llenar_formulario("registro","tbl_sedes","codigo_sede="+codigo_sede);
		$("#btn_grabar_sede").attr("rel","2");
	}

	function grabar_editar_documento(){
		codigo_documentacion=$("#modal_reg").attr('rel');
		//valor = validar_formulario('1','reg_usuarios');
		modo = 2;
		tabla = 'tbl_documentacion';
		filtro='codigo_sede='+codigo_documentacion;
		
		resultado = actualizar_registro(tabla,"registro",filtro,2);
		if(resultado.resultado==1){
			alert(resultado.mensaje);
			cargar_listado();
			$("#modal_reg").modal('hide');
		}
		else{
			alert(resultado.mensaje);
		}
	}

	function grabar_documento(){
		//valor = validar_formulario('1','reg_usuarios');
		modo = 1;
		tabla = 'tbl_documentacion';
		filtro='';
		
		resultado = actualizar_registro(tabla,"registro",filtro,1);
		if(resultado.resultado==1){
			alert(resultado.mensaje);
			cargar_listado();
			$("#modal_reg").modal('hide');
		}
		else{
			alert(resultado.mensaje);
		}
	}

	

</script>
<script type="text/javascript" charset="utf8" src="views/views.js"></script>
