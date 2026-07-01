<div style="display: flex;">
	<div style="width: 50%"><h3 id="titulo_view" ></h3></div>
	
	<div style="width: 50%;float: right;text-align: end;">
		<button type="button" class="btn btn-success" id="btn_crear" data-toggle="modal" data-target="#modal_usu_reg">
		  Crear
		</button>
		<br><br>
	</div>
</div>

<div id="div_listado"></div>

<!-- Modal -->
<div class="modal fade" id="modal_usu_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Motos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  id="registro">	

        	 <div class="row">  
	

		    <div class="col">

	        <div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Placa</span>
			  </div>
			  <input type="text" name="placamoto" class="form-control" placeholder="" aria-label="placa" aria-describedby="basic-addon1">
			</div>
			</div>


			<div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Marca</span>
			  </div>
			  <select class="form-control" name="marcamoto" id="marcamoto">
			  	<option value="Auteco">Auteco</option>
			  	<option value="Bajaj">Bajaj</option>
			  	<option value="AKT">AKT</option>
			  	<option value="Victory">Victory</option>
			  	<option value="Combat">Combat</option>
			  	<option value="Advance">Advance</option>
			  </select>		
			</div>
			</div>


			<div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Linea</span>
			  </div>
			  <input type="text" name="lineamoto" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	
			</div>
			</div>
			</div>



		 <div class="row">  
		    <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Modelo</span>
			  </div>
			  <select class="form-control" name="modelomoto" id="modelomoto">
			  		<option value="2018">2018</option>
			  		<option value="2019">2019</option>
			  		<option value="2020">2020</option>	
			  		<option value="2021">2021</option>
			  		<option value="2022">2022</option>
			  </select>	
			</div>
			</div>


			 <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Transmision</span>
			  </div>
			  <select class="form-control" name="Transmisionmoto" id="Transmisionmoto">
			  		<option value="Mecanica">Mecanica</option>
			  		<option value="Automatica">Automatica</option>
			  		<option value="Semiautomatica">Semiautomatica</option>
			  		<option value="Electrica">Eléctrica</option>
			  </select>		
			</div>
			</div>

			 <div class="col">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Color</span>
			  </div>
			  <input type="text" name="colormoto" class="form-control" placeholder="" aria-label="colormoto" aria-describedby="basic-addon1">	
			</div>
			</div>

			</div>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Sede Perteneciente</span>
			  </div>
			  <select class="form-control" name="sedemoto" id="sedemoto"></select>		
			</div>



			<div class="row">  
				<div class="col">
				<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Fecha de Compra</span>
			  </div>
			   <input class="form-control" name="fechacompra" type="date" value="0000-00-00" id="example-datetime-local-input">
			</div>
			</div>

		    <div class="col">
		    	<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Costo $</span>
			  </div>
			  <input type="number" name="costomoto" class="form-control" placeholder="" aria-label="lineamoto" aria-describedby="basic-addon1">	
			</div>

		   </div>
		   </div> 	
			
		</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_grabar">Grabar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	var identidad = {
		nombre: 'Estado General',
		consulta: 'listado_estado_general',
		consulta_filtro: '',
		tabla:'tbl_motos',
		campos:'placa,marca,linea,modelo,transmision,color,fecha_compra,costo,codigo_sede',
		formulario:'placamoto,marcamoto,lineamoto,modelomoto,Transmisionmoto,colormoto,fechacompra,costomoto,sedemoto'
	};

	$(document).ready(function() {

		$("#btn_crear").bind("click",cargar_select_dialog);

		$("#codigo_select").on("change",function(){
			res=consultar_campo("tbl_usuarios_tipos","tabla_origen,campo_tabla_origen","codigo_tipo_usuario=1");
			resultado=res.split(";");

			tabla_origen=resultado[0];
			campo_tabla=resultado[1];

			console.log(tabla_origen); 

			rellenar_select(tabla_origen,campo_tabla,"concat(nombres,' ',apellidos)","","codigo_origen");

		});


	});

	function cargar_select_dialog(){
		rellenar_select("tbl_sedes","codigo_sede","concat(tbl_ciudades.codigo_pais,' > ',tbl_ciudades.codigo_departamento, ' > ', tbl_ciudades.nombre, ' > ', tbl_sedes.nombre)"," inner join tbl_ciudades on tbl_ciudades.codigo_ciudad = tbl_sedes.codigo_ciudad","sedemoto");
	}

</script>
<script type="text/javascript" charset="utf8" src="views/views.js?20260701"></script>
