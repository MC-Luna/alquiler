<?php
session_start();
?>  
<div style="display: flex;">
	<div style="width: 40%"><h3 id="titulo_view" ></h3>  
      
	</div>
	<div style="width: 20%;float: left;">
		<b style="font-size:1.5em;display: inline-flex;">
			<img src="img/cash2.png"  width="30px"/>$<label id='total_caja_menor'></label>
		</b>
	</div>
	
	<div style="width: 40%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" onclick="open_modal(2,0,0)">
			Transferencia
		</button>
		
		<button type="button" class="btn btn-success" onclick="open_modal(1,0,0)">
			Caja Menor
		</button>
	</div>
</div>

<?php
if($_SESSION['codigo_rol']==1){
	echo '<select id="codigo_sede_filtro" class="form-control"></select>';
}
?>  

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
				<div id="aviso_edicion">
					<h1>Para realizar alguna modificación, comunicarse con el administrador.</h1>
				</div>
				<form  id="registro" name="registro">	
					
					<div class="row"> 
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Cuenta</span>
								</div>
								<select name="codigo_cuenta" class="form-control"  id="codigo_cuenta" lang="1">
								</select>
								<input type="hidden" name="codigo_usuario" value="<?php echo $_SESSION['codigo_usuario']?>" lang="1" />
								<input type="hidden" name="codigo_origen" value="8"/>
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Movimiento</span>
								</div>
								<select id="sct_tipo" name="tipo" class="form-control"  id="tipo" lang="1">
									<option value="out">◄ Salida</option> 
									<option value="in">► Entrada</option> 
								</select>
							</div>
						</div>

						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Valor $</span>
								</div>
								<input id="ipt_valor" name="valor" type="text" onkeyup="format(this)" onchange="format(this)" class="form-control" placeholder="" lang="1">	
							</div>
						</div>
						
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Referencia</span>
								</div>
								<input name="referencia" type="text"  class="form-control" placeholder="" lang="1">	
							</div>
						</div>

					</div>

					<div class="row">
						
							<div class="col">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" >Beneficiario</span>
									</div>
									<select name="codigo_proveedor" class="form-control"  id="codigo_proveedor" lang="1">
									</select>
								</div>

								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" >Concepto</span>
									</div>
									<select name="codigo_concepto" class="form-control"  id="codigo_concepto" lang="1">
									</select>
								</div>
							</div>
							
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Observaciones</span>
								</div>
								<textarea
									name="observaciones"
									rows="3"
									cols="30"
									class="form-control"></textarea>
							</div>
						</div>

					</div>

				</form>
			</div>
      		
			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary btn-save" id="btn_registro" style="display:none">Grabar</button>
				<button type="button" class="btn btn-primary" id="btn_registro2">Grabar</button>
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
				<input type="hidden" name="codigo_usuario_transferencia" value="<?php echo $_SESSION['codigo_usuario']?>" lang="1" />

					<div class="row"> 

						<div class="col">

							<div class="input-group mb-3" >
								<div class="input-group-prepend">
									<span class="input-group-text" >Origen</span>
								</div>
								<select id="cuenta_origen" name="cuenta_origen" class="form-control"  lang="1" >
								</select>
							</div>
							
						</div>

						<div class="col">

							<div class="input-group mb-3" >
								<div class="input-group-prepend">
									<span class="input-group-text" >Valor</span>
								</div>
								<input id="ipt_valor_trasnferencia" name="valor_transferencia" type="text" onkeyup="format(this)" onchange="format(this)" class="form-control" placeholder="" lang="1">	
							</div>
							
						</div>

						<div class="col">

							<div class="input-group mb-3" >
								<div class="input-group-prepend">
									<span class="input-group-text" >Destino</span>
								</div>
								<select id="cuenta_destino" name="cuenta_destino" class="form-control"  lang="1" >
								</select>
							</div>
							
						</div>
						
					</div>

					<div class="row">
						<div class="col">

							<div class="input-group mb-3" >
								<div class="input-group-prepend">
									<span class="input-group-text" >Referencia</span>
								</div>
								<input name="referencia_transferencia" type="text"  class="form-control" placeholder="" lang="1">	
							</div>

						</div>

						<div class="col"></div>
						<div class="col"></div>
					</div>
						

				</form>

				<div id="div_listado_servicio"></div>
			</div>

			<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary" id="btn_registro_servicio" onclick="transferencia()">Grabar</button>
      		</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">

	var filtro_index="";

	if(codigo_rol==1){
		filtro_index= ' where mvc.codigo_tipo_cuenta=3';
	}else{
		filtro_index= ' where mvc.codigo_tipo_cuenta=3 and mvc.codigo_sede='+ codigo_sede;
	}

	var	form=[
		{	id:0,
			title: 'Caja Menor',
			div_listado:'div_listado',
			listado: 'listado_movimiento_manual',
			filtro: filtro_index,
		},
		{	id:1,
			name:'registro',
			title:'Registro Manual',
			modal:'#modal_reg',
			div_listado:'div_listado',	
			tabla:'tbl_movimientos',
			codigo:'codigo_movimiento',
			filtro:' where mvc.codigo_sede='+ codigo_sede,
			referencia:'',
			listado:'listado_movimiento_manual',
			button:'#btn_registro',
			cierre_modal:1
		},
		{	id:2,
			name:'servicio',
			title:'Transferencia',
			modal:'#modal_servicio',
			div_listado:'div_listado_servicio',	
			tabla:'tbl_proveedor_servicios',
			codigo:'codigo_servicio',
			referencia:'codigo_proveedor',
			listado:'',
			filtro:'',
			button:'#btn_registro_servicio',
			cierre_modal:0
		}
	];

	$(document).ready(function() {

		$( "#btn-success" ).on( "click", function() {

			if (parseInt(codigo_rol)==1){

			}else{
				$('[name="registro"]').show();
				$('#btn_registro2').show();
			}
			
		} );

		rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
			"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
			"1","codigo_sede");

		if (parseInt(codigo_rol)==1){

			rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
			"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
			"1","codigo_sede_filtro");

			$("#codigo_sede_filtro").bind("change",function(){
				filtro=" where mvc.codigo_tipo_cuenta=3 and mvc.codigo_sede="+ $("#codigo_sede_filtro").val();
				listado(form[0].div_listado,form[0].listado,filtro,1,true);
				valor_caja_menor($("#codigo_sede_filtro").val());
			});

			rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," 1","codigo_cuenta");

		}else{

			rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," codigo_sede="+codigo_sede,"codigo_cuenta");

			setTimeout(() => {
				$("#codigo_cuenta option").eq(0).remove();
			}, 1000);
			
			$("#codigo_sede_filtro").hide();
			valor_caja_menor(codigo_sede);

		}

	});

	function valor_caja_menor(sede){

		$.ajax({
			url: '/app/ajax/mov_total_caja_menor.php',
			type: "post",
			dataType: "html",
			data: { 
				codigo_sede_filtro: sede, 
			},
			cache: false,
		}).done(function(res){
			$("#total_caja_menor").html(res);

		});
	}

	function transferencia(){

		var calculo=parseInt($('[name="valor_transferencia"]').val().replaceAll(".", "").replaceAll(",", ""));
		$('[name="valor_transferencia"]').val(calculo);

		var datos = $("#"+form[2].name).serialize();
		var origen= $( "#cuenta_origen option:selected" ).text();
		var destino= $( "#cuenta_destino option:selected" ).text();


  		datos+="&origen="+origen+"&destino="+destino;

		$.ajax({
			url: '/app/ajax/mov_transferencia.php',
			type: "post",
			dataType: "html",
			data: datos,
			cache: false,
		}).done(function(res){

			Swal.fire({
				title: "Transferencia realizada",
				html: res,
				icon: "success"
			});

			$('.modal').modal('hide');
			$("#servicio")[0].reset();
			cargar_listado();

		});
	}

	function load_modal(n,s,r){

		if(s){
			if (codigo_rol==1){
				$('[name="registro"]').show();
				$('#btn_registro2').show();
				$('#aviso_edicion').hide();
			
			}else{
				$('[name="registro"]').hide();
				$('#btn_registro2').hide();
				$('#aviso_edicion').show();
			}
		}else{
			$('[name="registro"]').show();
			$('#btn_registro2').show();
			$('#aviso_edicion').hide();
		}

		switch(n) {
		case 1:

			var filtro_sede="";
			var filtro_beneficiario="";

			if (codigo_rol==1){

				filtro_beneficiario=" 1 order by razon_social";
				filtro_sede=" 1 ";

				rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
				"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
				"1","codigo_sede_filtro");
			}else{
				
				filtro_sede=" codigo_sede="+codigo_sede;
				filtro_beneficiario=" codigo_sede in (4," + codigo_sede + ") order by razon_social";
				
			}

			function filtrar_sede(){
				setTimeout(() => {
					$("#codigo_sede").val(codigo_sede);
					//$("#codigo_sede").attr("disabled","disabled");
					
				}, 1000);
				
			}
			
			rellenar_select("tbl_proveedores","codigo_proveedor","razon_social",filtro_beneficiario,"codigo_proveedor");
			rellenar_select("tbl_movimiento_conceptos","codigo_concepto","descripcion"," 1 order by descripcion","codigo_concepto");

			$("#btn_registro2").on("click",function(){
				
				var calculo=0;
				
				if($("#sct_tipo").val()=="out" || $("#sct_tipo").val()=="bank"){
					calculo= Math.abs(parseInt($('[name="valor"]').val().replaceAll(".", "").replaceAll(",", "")))*-1;
				}else{
					calculo=parseInt($('[name="valor"]').val().replaceAll(".", "").replaceAll(",", ""));
				}

				$("#ipt_valor").val(calculo);

				var n=parseInt($(".btn-save").attr("data-n"));
				var s=parseInt($(".btn-save").attr("data-s"))
				var r=parseInt($(".btn-save").attr("data-r"))

				save(n,s,r)

			});

			break;
		case 2:
			rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," 1","cuenta_origen");
			rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," 1","cuenta_destino");
			break;
		}
	}



</script>
<script type="text/javascript" charset="utf8" src="views/view.js?20260701"></script>
