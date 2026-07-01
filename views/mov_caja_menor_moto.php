<?php
session_start();
?>  
<div style="display: flex;">
	<div style="width: 40%"><h3 id="titulo_view" ></h3>  
      
	</div>
	<div style="width: 20%;float: left;">
	</div>
	
	<div style="width: 40%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" onclick="open_modal(1,0,0)">
			Movimiento
		</button>
	</div>
</div>

<select id="codigo_sede_filtro" class="form-control"></select>
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
									<span class="input-group-text" >Cuenta</span>
								</div>
								<select name="codigo_cuenta" class="form-control"  id="codigo_cuenta" lang="1">
								</select>
								<input type="hidden" name="codigo_usuario" value="1"/>
								<input type="hidden" name="codigo_origen" value="4"/>
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
									<span class="input-group-text" >Beneficiario</span>
								</div>
								<select name="codigo_proveedor" class="form-control"  id="codigo_proveedor" lang="1">
								</select>

							</div>
						</div>

					</div>

					<div class="row">
						
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Referencia</span>
								</div>
								<input name="referencia" type="text"  class="form-control" placeholder="" lang="1">	
								</select>
							</div>
							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" >Sede</span>
								</div>
								<select name="codigo_sede" class="form-control"  id="codigo_sede" lang="1">
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
					<div class="row">

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

	var filtro_index="";
	<?php
  	echo "permisos=". $_SESSION["codigo_rol"].";";
  	?>

	if(permisos==1){
		filtro_index= ' where mvo.codigo_origen=3 ';
	}else{
		filtro_index= ' ';
	}

	var	form=[
		{	id:0,
			title: 'Pagos Motos',
			div_listado:'div_listado',
			listado: 'listado_movimiento_motos',
			filtro: filtro_index,
		},
		{	id:1,
			name:'registro',
			title:'Registro Manual',
			modal:'#modal_reg',
			div_listado:'div_listado',	
			tabla:'tbl_movimientos',
			codigo:'codigo_movimiento',
			filtro:' where mvo.codigo_origen=3',
			referencia:'',
			listado:'listado_movimiento_motos',
			button:'#btn_registro',
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

		rellenar_select("tbl_movimiento_cuentas","codigo_cuenta","descripcion"," 1 ","codigo_cuenta");
		rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
			"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
			"1","codigo_sede");

		if (parseInt(permisos)==1){

			rellenar_select("tbl_sedes inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad",
			"codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)",
			"1","codigo_sede_filtro");

			$("#codigo_sede_filtro").bind("change",function(){
				filtro=" where mvo.codigo_origen=3 and u.codigo_sede="+ $("#codigo_sede_filtro").val();
				listado(form[0].div_listado,form[0].listado,filtro,1,true);
				valor_caja_menor($("#codigo_sede_filtro").val());
			});

		}else{
			$("#codigo_sede_filtro").hide();
			valor_caja_menor(codigo_sede);
		}

	});

	function valor_caja_menor(sede){

		$.ajax({
			url: '/app/ajax/total_caja_menor.php',
			type: "post",
			dataType: "html",
			data: { 
				codigo_sede_filtro: sede, 
			},
			cache: false,
		}).done(function(res){
			$("#total_caja_menor").html(res);

	/*
				Swal.fire({
					title: "Deposito Registrado",
					html: res,
					icon: "success"
				});

				$('.modal').modal('hide');
				$("#registro_deposito")[0].reset();
				///cargar_listado();
				//$("#mensaje").html("Respuesta: " + res);

				*/
		});
	}

	function load_modal(n,s,r){
		switch(n) {
		case 1:

			var filtro_sede="";
			var filtro_beneficiario="";

			if (permisos==1){
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
			rellenar_select("tbl_caja_menor_conceptos","codigo_concepto","descripcion","tipo='"+ $("#sct_tipo").val()+"' order by descripcion","codigo_concepto");

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
			let filtro='codigo_proveedor='+r;
			listado(form[2].div_listado,form[2].listado,filtro,1,true);
			break;
		}
	}

</script>
<script type="text/javascript" charset="utf8" src="views/view.js"></script>
