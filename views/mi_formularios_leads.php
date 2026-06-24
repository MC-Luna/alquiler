<link href='/app/config/tabs/component.css' rel='stylesheet' />


	<!-- https://tympanus.net/codrops/2014/03/21/responsive-full-width-tabs/comment-page-3/ -->

<style>

	.tabs nav ul li {

		border-radius: 10px 10px 0px 0px;
	}

</style>


<div class="modal fade" id="modal_leds_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

    <div id="tabs" class="tabs"> <!--tabs-->

        <nav>

        <ul>

                <li><a href="#fase_datos"><span>FASE 1</span></a></li>



                <li><a href="#fase_seguridad"><span>FASE 2</span></a></li>



                <li><a href="#fase_documentacion"><span>FASE 3</span></a></li>



            </ul>



        </nav>



        <div class="content">	


        <section id="fase_datos"> <!-- EMPIEZA LA SECTION DE DATOS -->

        <div id="msjFaseNoDisponible"></div>
        <form id="registro_datos_leads" enctype="multipart/form-data">	



                <h1 style="text-align: center;">DATOS DE CLIENTE </h1>

                <div class="container">

                <div class="row">



                    <div class="col"><h4> Identificación</h4></div>



                </div>



                    <input type="hidden" id="codigo_cliente" name="codigo_cliente">



                    <div class="row">  


                    <div class="col">


                        <div class="input-group mb-3">



                            <div class="input-group-prepend">



                                    <span class="input-group-text" id="basic-addon1">Tipo</span>



                            </div>



                            <select class="form-control" name="tipo_documento" id="tipo_documento_select">



                                <option value="0" id="0">Seleccione</option>



                                <option value="cc" id="cc">Cedula de Ciudadanía</option>



                                <option value="ex" id="ex">Cedula de Extranjeria</option>



                                <option value="pa" id="pa">Pasaporte</option>
                                <option value="nit" id="nit">NIT</option>



                            </select>		



                        </div>







                    </div>



                    <div class="col">







                    <div class="input-group mb-3">



                    <div class="input-group-prepend">



                        <span class="input-group-text" id="basic-addon1">Numero ID</span>



                    </div>



                    <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                    </div>



                    </div>	



                    <div class="col">



                    <div class="input-group mb-3">



                    <div class="input-group-prepend">



                        <span class="input-group-text" id="basic-addon1">Expedida</span>



                    </div>



                    <input type="text" name="expedida" id="expedida" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                    </div>



                    </div>



                    



                </div>







                    <div class="row">  


                            <div class="col">

                                <div class="input-group mb-3">



                                    <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Nombres</span>



                                    </div>



                                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                                </div>



                            </div>







                            <div class="col">







                                <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                    <span class="input-group-text" id="basic-addon1">Apellidos</span>



                                </div>



                                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                                </div>



                            </div>	 			



                        </div>	







                <div class="row">



                            <div class="col">



                                <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                    <span class="input-group-text" id="basic-addon1">Celular</span>



                                </div>



                                <input type="text" name="celular" id="celular" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                                </div>					 



                            </div>	







                            <div class="col">



                                <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                    <span class="input-group-text" id="basic-addon1">Teléfono</span>



                                </div>



                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                                </div>					 



                            </div>	 				











                            <div class="col">



                                <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                    <span class="input-group-text" id="basic-addon1">Email</span>



                                </div>



                                <input type="text" name="correo" id="correo" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                                </div>						 



                            </div>	 				







                </div>







                <div class="row" style="display:none">



                    



                    <div class="col"><br>   	<h4> Lugar de nacimiento</h4>		</div>







                </div>



                <div class="row" style="display:none">







                    <div class="col">



                        <div class="input-group mb-3">



                    <div class="input-group-prepend">



                        <span class="input-group-text" id="basic-addon1">Pais</span>



                    </div>



                    <select class="form-control" name="codigo_pais" id="codigo_pais"></select>		



                    </div>







                    </div>



                    



                    <div class="col">



                        <div class="input-group mb-3">



                    <div class="input-group-prepend">



                        <span class="input-group-text" id="basic-addon1">Departamento</span>



                    </div>



                    <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                    </div>







                    </div>











                    <div class="col">



                        <div class="input-group mb-3">



                    <div class="input-group-prepend">



                        <span class="input-group-text" id="basic-addon1">Ciudad</span>



                    </div>



                    <select class="form-control" name="codigo_ciudad" id="codigo_ciudad"></select>



                    </div>







                    </div>



                </div>







                <div class="row">



                        <div class="col">



                                    <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Fecha de nacimiento</span>



                        </div>



                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                        </div>



                    </div>







                </div>



                </div>







                <div class="row"><div class="col"><br>   	<h4> Internet y redes sociales</h4>		</div> </div>



                <div class="row">



                    <div class="col">



                    <p>Facebook</p>



                        <div class="input-group mb-3">



                        <span class="input-group-text" id="basic-addon1">URL</span>



                        <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">



                        </div>			



                    </div>



                    <div class="col">



                    <p>Instagram</p>



                        <div class="input-group mb-3">



                        <span class="input-group-text" id="basic-addon1">URL</span>



                        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">



                        </div>			



                    </div>



                    <div class="col">



                    <p>Twitter</p>



                        <div class="input-group mb-3">



                        <span class="input-group-text" id="basic-addon1">URL</span>



                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">



                        </div>			



                    </div>



                    <div class="col">



                    <p>Tiktok</p>



                        <div class="input-group mb-3">



                        <span class="input-group-text" id="basic-addon1">URL</span>



                        <input type="text" name="tiktok" id="tiktok" class="form-control" placeholder="Url o @ del perfil" aria-label="Username" aria-describedby="basic-addon1">



                        </div>			



                    </div>



                    </div>



                    <div class="row"><div class="col"><br>   	<h4> Lugar de residencia</h4>		</div> </div>



                <div class="row"> <!-- ABRE ROW DE VIVIENDA-->







                    <div class="col">



                        <div class="input-group mb-3">



                        <span class="input-group-text" id="basic-addon1">Direccion</span>



                        <input type="text" name='direccion' id="direccion" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">



                        </div>



                    </div>



                </div> <!-- CIERRA ROW DE VIVIENDA --> 



                    <div class="row"><div class="col"><br>   	<h4> Vivienda</h4>		</div> </div>



                <div class="row">







                    <div class="col input-group mb-3">



                        <div class="input-group-prepend">



                                <span class="input-group-text" id="basic-addon1">Tipo</span>



                        </div>



                        <select class="form-control" name="vivienda_tipo" id="vivienda_tipo_select">



                            <option value="0">Seleccione</option>



                            <option value="propia" id="propia">Propia</option>



                            <option value="arriendo" id="arriendo">Arriendo</option>
                            <option value="familiar" id="familiar">Familiar</option>



                        </select>		



                    </div>



                    



                    <div class="col">



                    



                        <div class="input-group mb-3">



                        <span class="input-group-text" id="basic-addon1">Tiempo</span>



                        <input name="vivienda_tiempo" type="text" class="form-control" id="vivienda_tiempo" aria-label="Username" aria-describedby="basic-addon1">



                        </div>			



                    </div>

                </div>


                    <div class="row">
                        <div class="col"><br>   	
                            <h4> Adjuntos</h4>		
                        </div> 
                    </div>


                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Cedula</label>
                                <input name="cedula" class="form-control" type="file" id="formFile">
                            </div>					
                        </div>

                        <div class="col">
                            <div class="mb-3">
                            <label for="formFile" class="form-label">Licencia</label>
                            <input name="licencia" class="form-control" type="file" id="formFile">
                            </div>					
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Recibo</label>
                                <input name="recibo" class="form-control" type="file" id="formFile">
                            </div>					
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Certificado laboral</label>
                                <input name="certificado_laboral" class="form-control" type="file" id="formFile">
                            </div>					
                        </div>	

                    </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <div id="botonesBorrar">

                        <button type="button" value="cambiar_datos_leads" class="btn btn-primary btn_cambiar_datos_leads">Guardar Cambios</button>

                        <button type="button" value="2" data-saveinfochange="cambiar_datos_leads" class="btn btn-success btn_cambiar_datos_leads" id="change_fase">Siguiente Fase</button>

                        <button type="button" value="2" data-idcliente="" id="change_disponibilidad" class="btn btn-danger">No apto</button>
                        
                    </div>

                    

                </div>


                </form>


                <div id="imprimirDatos"></div>



        </section> <!-- TERMINA LA SECTION DE DATOS -->



        <section id="fase_seguridad"> <!-- EMPIEZA LA SECTION DE SEGURIDAD -->
    
            <form id="registro_seguridad_leads">	



                <h1 style="text-align: center;">Seguridad </h1>



                <div class="container">



                    <div class="row">



                        <div class="col"><h5> Seguridad de moto </h5></div>



                    </div>







                    <div class="row">  


       

                    <input type="hidden" id="codigo_cliente" name="codigo_cliente">



                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Barrio</span>



                                </div>



                                <select class="form-control" name="barrio" id="barrio_select">



                                    <option value="alto" id="alto">Alto</option>



                                    <option value="medio" id="medio">Medio</option>



                                    <option value="bajo" id="bajo">Bajo</option>



                                </select>		



                        </div>



                    </div>







                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Vencindario</span>



                                </div>



                                <select class="form-control" name="vecindario" id="vecindario_select">



                                    <option value="alto" id="alto">Alto</option>



                                    <option value="medio" id="medio">Medio</option>



                                    <option value="bajo" id="bajo">Bajo</option>



                                </select>		



                        </div>



                    </div>


                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Casa</span>



                                </div>



                                <select class="form-control" name="casa" id="casa_select">



                                    <option value="alto" id="alto">Alto</option>



                                    <option value="medio" id="medio">Medio</option>



                                    <option value="bajo" id="bajo">Bajo</option>



                                </select>		



                        </div>



                    </div>



                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Parqueadero</span>



                                </div>



                                <select class="form-control" name="parqueadero" id="parqueadero_select">



                                        <option value="alto" id="alto">Alto</option>



                                        <option value="medio" id="medio">Medio</option>



                                        <option value="bajo" id="bajo">Bajo</option>



                                </select>		



                        </div>



                    </div>



                    </div>


                </div>




                <BR>

                <div class="container">



                    <div class="row">



                        <div class="col"><h5> Habitos </h5></div>



                    </div>


                    <div class="row"> 


                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Fuma</span>



                                </div>



                                <select class="form-control" name="fuma" id="fuma_select">



                                    <option value="ocacional" id="ocasional">Ocasional</option>



                                    <option value="si" id="si">Si</option>



                                    <option value="no" id="no">No</option>



                                </select>		



                        </div>



                    </div>







                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Bebe</span>



                                </div>



                                <select class="form-control" name="bebe" id="bebe_select">



                                    <option value="ocacional" id="ocasional">Ocasional</option>



                                    <option value="si" id="si">Si</option>



                                    <option value="no" id="no">No</option>



                                </select>		



                        </div>



                    </div>







                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Consume drogas</span>



                                </div>



                                <select class="form-control" name="drogas" id="drogas_select">



                                    <option value="ocacional" id="ocasional">Ocasional</option>



                                    <option value="si" id="si">Si</option>



                                    <option value="no" id="no">No</option>



                                </select>		



                        </div>



                    </div>


                    <div class="col">



                        <div class="input-group mb-3">



                                <div class="input-group-prepend">



                                        <span class="input-group-text" id="basic-addon1">Lugar para moto</span>



                                </div>



                                <select class="form-control" name="lugar_moto" id="lugar_moto_select">



                                    <option value="parqueadero" id="parqueadero">Parqueadero</option>



                                    <option value="interior" id="interior">Interior</option>



                                    <option value="garaje" id="garaje">Garaje</option>



                                    <option value="exterior" id="exterior">Exterior</option>



                                    <option value="rejas" id="rejas">Rejas</option>



                                </select>		



                        </div>



                    </div>











                    </div>







                </div>





                <BR>

                <div class="container">



                    <div class="row">



                        <div class="col"><h5> Enfermedades/Accidentes </h5></div>



                    </div>





                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">¿Cuales?</span>



                        </div>



                        <input type="text" name="enfermedades" id="enfermedades" class="form-control" placeholder="Enfermedad" 

                        aria-label="Username" aria-describedby="basic-addon1">



                        </div>







                </div>

                </div>



                <BR>



                <div class="container">



                    <div class="row">



                        <div class="col"><h5> Descripcion fisica </h5></div>



                    </div>



                    <div class="row">

                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Estatura</span>



                        </div>



                        <input type="number" name="estatura" id="estatura" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                        </div>







                </div>





                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Peso</span>



                        </div>



                        <input type="Number" name="peso" id="peso" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                        </div>







                </div>



                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Color de piel </span>



                        </div>

                        <select class="form-control" name="color_piel" id="color_piel_select">



                                    <option value="blanco" id="blanco">Blanco</option>



                                    <option value="mestizo" id="mestizo">Mestizo</option>



                                    <option value="mulato" id="mulato">Mulato</option>



                                    <option value="negro" id="negro">Negro</option>



                                </select>



                        </div>







                </div>



                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Color de cabello</span>



                        </div>



                        <select class="form-control" name="color_cabello" id="color_cabello_select">



                                    <option value="negro" id="negro">Negro</option>

                                    <option value="rubio" id="rubio">Rubio</option>

                                    <option value="pelirrojo" id="pelirrojo">Pelirojo</option>

                                    <option value="castaño" id="castaño">Castaño</option>

                                    <option value="canoso" id="canoso">Canoso</option>

                                    <option value="blanco" id="blanco">Blanco</option>

                                    <option value="calvo" id="calvo">Calvo</option>



                        </select>



                        </div>







                </div>









                </div>

                <div class="row">

                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Color de ojos</span>



                        </div>



                        <select class="form-control" name="color_ojos" id="color_ojos_select">



                                    <option value="negro" id="negro">Negro</option>



                                    <option value="marron" id="marron">Marron</option>



                                    <option value="azul" id="azul">Azul</option>



                                    <option value="verde" id="verde">Verde</option>



                                    <option value="gris" id="gris">Gris</option>



                        </select>



                        </div>







                </div>





                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Señales</span>



                        </div>



                        <input type="text" name="signos" id="signos" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">



                        </div>







                </div>



                <div class="col">







                        <div class="input-group mb-3">



                        <div class="input-group-prepend">



                            <span class="input-group-text" id="basic-addon1">Grupo sanguineo </span>



                        </div>

                        <select class="form-control" name="grupo_sanguineo" id="grupo_sanguineo_select">



                                    <option value="o+" id="o+">O+</option>



                                    <option value="o" id="o">O-</option>



                                    <option value="a+" id="a+">A+</option>



                                    <option value="a-" id="a-">A-</option>



                                    <option value="ab+" id="ab+">AB+</option>

                                    <option value="ab-" id="ab-">AB-</option>

                                    <option value="b+" id="b+">B+</option>

                                    <option value="b-" id="b-">B-</option>

                                    <option value="no" id="no">NO SABE</option>



                                    

                                </select>





                                    



                        </div>







                </div>

                </div>

                </div>



                    <div class="container">

                        <BR>

                    <div class="row">

                        <div class="col"><h5> Certificados y antecedentes judiaciales y policivos </h5></div>

                    </div>



                    <div class="row">



                <div class="col">

                        <div class="input-group mb-3">

                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="cedula_id" id="cedula_id_check">

                                        <label class="custom-control-label" for="cedula_id_check">Cedula ID</label>

                                    </div>

                        </div>

                </div>



                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="licencia" id="licencia_check">

                                        <label class="custom-control-label" for="licencia_check">Licencia</label>

                                    </div>



                        </div>

                </div>



                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="servicios" id="servicios_check">

                                        <label class="custom-control-label" for="servicios_check">Servicios</label>

                                    </div>



                        </div>

                </div>





                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="procaduria" id="procaduria_check">

                                        <label class="custom-control-label" for="procaduria_check">Procuraduria</label>

                                    </div>



                        </div>

                </div>



                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="google" id="google_check">

                                        <label class="custom-control-label" for="google_check">Google</label>

                                    </div>



                        </div>

                </div>





                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="contraloria" id="contraloria_check">

                                        <label class="custom-control-label" for="contraloria_check">Contraloria</label>

                                    </div>



                        </div>

                </div>





                </div>

                <div class="row">



                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="policia" id="policia_check">

                                        <label class="custom-control-label" for="policia_check">Policia</label>

                                    </div>



                        </div>

                </div>


              
                <div class="row">

                    <div class="col">

                        <div class="input-group mb-3">

                        <div class="custom-control custom-switch">

                                    <input type="checkbox" class="custom-control-input" name="arrendador" id="arrendador_check">

                                    <label class="custom-control-label" for="arrendador_check">Arrendador</label>

                            </div>

                        </div>

                    </div>

                </div>
            




                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="contrato" id="contrato_check">

                                        <label class="custom-control-label" for="contrato_check">Contrato </label>

                                    </div>



                        </div>

                </div>





                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="pagare" id="pagare_check">

                                        <label class="custom-control-label" for="pagare_check">Pagaré</label>

                                    </div>



                        </div>

                </div>



                <div class="col">

                        <div class="input-group mb-3">



                        <div class="custom-control custom-switch">

                                        <input type="checkbox" class="custom-control-input" name="codeudor" id="codeudor_check">
                                        <label class="custom-control-label" for="codeudor_check">Codeudor</label>
                </div>



                        </div>

                </div>


                <div id="hiddenValueCheck"></div>



                </div>

                </div>





                <BR>
                <div class="container">



                    <div class="row">



                        <div class="col"><h5> Composicion Familiar -Referencias </h5></div>



                    </div>


                <div class="row">


                <div class="col-md-2">




                        <label for="inputState">Estado civil</label>
                                

                        <select class="form-control" name="estado_civil" id="estado_civil_select">



                                    <option value="casado" id="casado">Casado</option>



                                    <option value="soltero" id="soltero">Soltero</option>



                                    <option value="union_libre" id="union_libre">Union libre</option>



                                    <option value="juntados" id="juntados">Juntados</option>



                                    <option value="separado" id="separado">Separado</option>

                                    <option value="viudo" id="viudo">Viudo</option>

                                    <option value="divorciado" id="divorciado">Divorciado</option>

                                                            

                            </select>			


                </div>


                <div class="col-md-6">


                        <div class="input-group mb-3">
                            <label for="inputEmail4">Conyugue o pareja</label>

                            <div class="form-row">
                                        <div class="form-group  " style="width: 33% !important;">
                                            
                                            <input type="text" class="form-control" name="nombre_conyugue" id="nombre_conyugue" placeholder="Nombre">
                                        </div>
                                            <div class="form-group " style="width: 33% !important;">
                                                
                                            <input type="number" class="form-control" name="telefono_conyugue" id="telefono_conyugue" placeholder="Telefeno">
                                        </div>
                                        <div class="form-group " style="width: 33% !important;">

                                            <input type="text" class="form-control" name="nacimiento_conyugue" id="nacimiento_conyugue" placeholder="Lugar de nacimiento">
                                        </div>
                            </div>		



                        </div>

                </div>

                <div class="col">
                        

                        
                        <div class="input-group mb-3">
                            <label for="inputEmail4">Numero de hijos</label>
                            <div class="form-row">
                                                
                                            <div class="form-group " style="width: 49% !important;">
                                                
                                            <input type="number" class="form-control" name="hijos_conyugue" id="hijos_conyugue" placeholder="Actual relacion">
                                        </div>
                                        <div class="form-group " style="width: 49% !important;">
                                        
                                            <input type="number" class="form-control" name="hijos_otra" id="hijos_otra" placeholder="Otra">
                                        </div>
                            </div>		



                        </div>

                </div>

                </div>

                </div>

                <div class="container">



                    <div class="row">



                        <div class="col">
                        
                            <div class="input-group mb-3">
                                <label for="inputEmail4">Referencia familiar 1</label>
                                <div class="form-row">
                                                    
                                                <div class="form-group " style="width: 49% !important;">
                                                    
                                                <input type="Text" class="form-control" name="ref_fam_nombre1" id="ref_fam_nombre1" placeholder="Nombre">
                                            </div>
                                            <div class="form-group " style="width: 49% !important;">
                                            
                                                <input type="number" class="form-control" name="ref_fam_tel1" id="ref_fam_tel1" placeholder="Telefono">
                                            </div>
                                </div>		

                            </div>

                        </div>

                        <div class="col">
                        
                            <div class="input-group mb-3">
                                <label for="inputEmail4">Referencia familiar 2</label>
                                <div class="form-row">
                                                    
                                                <div class="form-group " style="width: 49% !important;">
                                                    
                                                <input type="Text" class="form-control" name="ref_fam_nombre2" id="ref_fam_nombre2" placeholder="Nombre">
                                            </div>
                                            <div class="form-group " style="width: 49% !important;">
                                            
                                                <input type="number" class="form-control" name="ref_fam_tel2" id="ref_fam_tel2" placeholder="Telefono">
                                            </div>
                                </div>		

                            </div>

                        </div>

                        <div class="col">
                        
                            <div class="input-group mb-3">
                                <label for="inputEmail4">Referencia Personal 1</label>
                                <div class="form-row">
                                                    
                                                <div class="form-group " style="width: 49% !important;">
                                                    
                                                <input type="Text" class="form-control" name="ref_per_nombre1" id="ref_per_nombre1" placeholder="Nombre">
                                            </div>
                                            <div class="form-group " style="width: 49% !important;">
                                            
                                                <input type="number" class="form-control" name="ref_per_tel1" id="ref_per_tel1" placeholder="Telefono">
                                            </div>
                                </div>		

                            </div>

                        </div>

                        <div class="col">
                        
                            <div class="input-group mb-3">
                                <label for="inputEmail4">Referencia Personal 2</label>
                                <div class="form-row">
                                                    
                                                <div class="form-group " style="width: 49% !important;">
                                                    
                                                <input type="Text" class="form-control"  name="ref_per_nombre2" id="ref_per_nombre2" placeholder="Nombre">
                                            </div>
                                            <div class="form-group " style="width: 49% !important;">
                                            
                                                <input type="number" class="form-control" name="ref_per_tel2" id="ref_per_tel2" placeholder="Telefono">
                                            </div>
                                </div>		

                            </div>

                        </div>


                    </div>
                </div>


                <div class="container">



                    <div class="row">

                        <div class="col"><h5> Situación laboral </h5></div>

                    </div>
                    
                    <div class="row">

                <div class="col">

                        

                        <label for="inputEmail4">Situacion Actual</label>
                        <select class="form-control" name="situacion_actual" id="situacion_actual_select">



                                    <option value="desempleado" id="desempleado">Desempleado</option>



                                    <option value="empleado" id="empleado">Empleado</option>



                                    <option value="aspirante" id="aspirante">Aspirante</option>



                                    <option value="practicante" id="pacticante">Practicante</option>

                                    <option value="independiente" id="pacticante">Independiente</option>



                                    <option value="otro" id="otro">Otro</option>


                                </select>

                        

                </div>

                <div class="col">
                        
                            <div class="input-group mb-3">
                                
                                <div class="form-row">
                                                    
                                                <div class="form-group " >
                                                    <label for="inputEmail4">Ultimo empleo</label>
                                                <input type="Text" class="form-control" name="ultimo_empleo" id="ultimo_empleo" placeholder="Compañia">
                                            </div>
                                        
                                </div>		

                            </div>

                </div>


                <div class="col">
                        
                            <div class="input-group mb-3">
                                
                                <div class="form-row">
                                                    
                                                <div class="form-group " >
                                                    <label for="inputEmail4">Cargo</label>
                                                <input type="Text" class="form-control" name="ultimo_empleo_cargo" id="ultimo_empleo_cargo" placeholder="">
                                            </div>
                                        
                                </div>		

                            </div>

                </div>

                <div class="col">
                        
                            <div class="input-group mb-3">
                                
                                <div class="form-row">
                                                    
                                                <div class="form-group " >
                                                    <label for="inputEmail4">Teléfono</label>
                                                <input type="number" class="form-control" name="ultimo_empleo_telefono" id="ultimo_empleo_telefono" placeholder="">
                                            </div>
                                        
                                </div>		

                            </div>

                </div>


                    </div>


                    <div class="row">



                <div class="col">
                        
                            <div class="input-group ">
                                
                                <div class="form-row" style="width: 100%;" >
                                                    
                                                <div class="form-group " style="width: 100%;"  >
                                                    <label for="inputEmail4">Penultimo empleo</label>
                                                <input type="Text" class="form-control" name="penultimo_empleo" id="penultimo_empleo" placeholder="Compañia">
                                            </div>
                                        
                                </div>		

                            </div>

                </div>


                <div class="col">
                        
                        <div class="input-group ">
                        
                            <div class="form-row" style="width: 100%;" >
                                            
                                        <div class="form-group " style="width: 100%;" >
                                        <label for="inputEmail4">Cargo</label>
                                            <input type="Text" class="form-control" name="penultimo_empleo_cargo" id="penultimo_empleo_cargo" placeholder="">
                                    </div>
                                
                        </div>		

                    </div>

                </div>


                <div class="col">
                        
                            <div class="input-group ">
                                
                                <div class="form-row" style="width: 100%;" >
                                                    
                                                <div class="form-group "  style="width: 100%;" >
                                                    <label for="inputEmail4">Teléfono</label>
                                                <input type="number" class="form-control" name="penultimo_empleo_telefono" id="penultimo_empleo_telefono" placeholder="">
                                            </div>
                                        
                                </div>		

                            </div>

                </div>


                    </div>

                    </div>



                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        <div id="botonesBorrar">

                            <button type="button" value="cambiar_seguridad_leads" class="btn btn-primary btn_cambiar_seguridad_leads">Guardar Cambios</button>

                            <button type="button" value="3" data-saveinfochange="cambiar_seguridad_leads" data-idcliente="" class="btn btn-success btn_cambiar_seguridad_leads" id="change_fase">Siguiente Fase</button>

                            <button type="button" value="1" data-idcliente="" class="btn btn-info" id="change_fase">Volver Fase 1</button>

                            <button type="button" value="2" data-idcliente="" id="change_disponibilidad" class="btn btn-danger">No apto</button>

                        </div>
                       

                    </div>


                </form>				



        </section> <!-- TERMINA LA SECTION DE SEGURIDAD -->


        
    <section id="fase_documentacion"> <!-- EMPIEZA LA SECTION-->


        <form  id="registro_motos_leads">	

            <div class="row">  

            <div class="col">

            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Inicio</span>
            </div>
            <input class="form-control" name="fecha_inicio_contrato" type="date" value="0000-00-00" id="example-datetime-local-input">
            </div>
            </div>

            <div class="col">

            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Final</span>
            </div>
            <input class="form-control" name="fecha_final_contrato" type="date" value="0000-00-00" id="example-datetime-local-input">
            </div>
            </div>

            <div class="col">

            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Frecuencia( dias) </span>
            </div>
            <input type="number" name="frecuencia_cobro" class="form-control" placeholder="" aria-label="placa" aria-describedby="basic-addon1">
            </div>
            </div>


            </div>



            <div class="row">  
                
                
            <div class="col">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Proximo Cobro</span>
                </div>
                <input class="form-control" name="fecha_proximo_cobro" type="date" value="0000-00-00" id="example-datetime-local-input">
            </div>
            </div>

            <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Valor</span>
                </div>
                <input type="number" name="valor_pagar" class="form-control" placeholder="" aria-label="valar" aria-describedby="basic-addon1">
            </div>
            </div>

            <div class="col">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Deposito</span>
                </div>
                <input type="number" name="deposito" class="form-control" placeholder="" aria-label="valar" aria-describedby="basic-addon1">
            </div>
            </div>

            </div>

            <div class="row"> 

            <div class="col">
            <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Sede:</span>
            </div>
            <select class="form-control" id="codigo_sede" aria-label="valar" aria-describedby="basic-addon1">
                
            </select>
            </div>
            </div>

            </div>


            

            <div class="row"> 

                <input type="hidden" id="codigo_cliente_for_contrato_leads" name="codigo_cliente">

                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Motos</span>
                        </div>

                    <select name="codigo_moto" id="codigo_moto"  class="form-control">            
                    </select>
                </div>

            </div>



            </div>

            
            <div class="row">

                <div class="col">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Soporte de Contrato</label>
                        <input name="contrato" class="form-control" type="file" id="formFile">
                    </div>					
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>


                <div id="botonesBorrar">

                    <button value="save_datos_contrato_leads" type="button" class="btn btn-success" id="btn_contrato_leads">Entregado</button>

                    <button type="button" value="2" data-idcliente="" class="btn btn-info" id="change_fase">Volver Fase 2</button>

                    <button type="button" value="2" data-idcliente="" id="change_disponibilidad" class="btn btn-danger">No apto</button>

                </div>
               

                <!-- <button type="button" value="save_datos_motos" class="btn btn-primary" id="btn_datos_motos_leads">Guardar Cambios</button> -->

            </div>


        </form>





        </section>

    


        </div> <!-- CIERRA CONTENT-->


        </div> <!-- CIERRA TABS-->



        </div>

    </div>

</div>




<script src="/config/tabs/cbpFWTabs.js"></script>


<script>

	new CBPFWTabs( document.getElementById( 'tabs' ) );

</script>



