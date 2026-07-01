
//Formulario de mantenmiento insertar
function mostrarModalEditar(e,tipoModulo){
            
    console.log("tipomodulo", tipoModulo);
    
    let url="/app/ajax/infomodal_WEBSERVICE.php";
    let data=new FormData();
    let arrDato=[];

    if(tipoModulo == "ModuloLeads"){
        console.log("INFODELOSLEDS", e.codigo_cliente);
        data.append('ID', e.codigo_cliente);
        
        data.append('TipoModulo', tipoModulo)

    }else{
        arrDato.push(e.target.value);

        data.append('ID', arrDato);
        data.append('TipoModulo',tipoModulo)
    }

    fetch(url,{
        method:'POST',
        body:data
    }).then(response => response.json())
    .then(data => {

        console.log("TODALAINFO",data);

        if(tipoModulo=="ModuloCliente"){

            var cod_cliente=e.target.value;
                document.querySelector('#div_listado_soportes').innerHTML = data.info_soportes;

                //creo un array con el id de los formularios y de las tablas para limpiarlos siempre que se llame la api.

                let arrayFormularios=[
                    'form_contrato_clientes',
                    'registro_edit', 
                    'form_save_seguridad'
                ];
                
                limpiarFormAndTabla(arrayFormularios, inputTipo="forms");

                let arrayTabla=[
                    'tablaDeContratos',
                    'tablaDePagos',
                ];
                

                limpiarFormAndTabla(arrayTabla, inputTipo="tablas");

            
                if(data.info_tabla_contratos.length != 0){
                
                    buildTablePagos(data.info_tabla_contratos, tipoTabla="tablaDeContratos");
                }
                
                
                if(data.info_form_contrato_clientes.length != 0){

                    mostrarDataEdit(data.info_form_contrato_clientes[0], idform="form_contrato_clientes", btn="none");
                }

                if(data.info_tabla_pagos.length != 0){

                    buildTablePagos(data.info_tabla_pagos, tipoTabla="tablaDePagos");   
                }

                if(data.infodatos.length != 0){

                    mostrarDataEdit(data.infodatos[0], idform="registro_edit",btn="btn_cambiar");
                }

              
                mostrarDataEdit(data.info_datos_seguridad[0],idform="form_save_seguridad",btn="save_seguridad");
                

                $('#modal_usu_edit').modal('show');

        }else if(tipoModulo=="ModuloMotos"){

            document.querySelector('#div_listado_documentos').innerHTML = data.info_soportes;

                let arrayFormularios=[
                    'form_datos_motos',
                ];

                    limpiarFormAndTabla(arrayFormularios, inputTipo="forms");

                let arrayTabla=[
                    'tablaMotosDatos',
                    'tablaMotosPagos',
                    'tabla_mantenimiento_motos',
                ];

                    limpiarFormAndTabla(arrayTabla, inputTipo="tablas");


                //Agrego el boton al formulario de mantenimiento.
                let save_mantenimiento=document.querySelector('#btn_mantenimiento_motos');
                save_mantenimiento.addEventListener('click', funcionSave);

                if(data.cedes.length != 0){

                    mostrarCede(data.cedes);
                }

                if(data.info_form_moto_datos.length != 0){

                    mostrarDataEdit(data.info_form_moto_datos[0], idform="form_datos_motos",btn="btn_cambiar_datos_moto");
                }

                if(data.info_tabla_moto_datos.length != 0){

                    buildTablePagos(data.info_tabla_moto_datos,tipoTabla="tablaMotosDatos");
                }

                if(data.info_tabla_moto_pago.length != 0){

                    buildTablePagos(data.info_tabla_moto_pago, tipoTabla="tablaMotosPagos");
                }

                if(data.info_tabla_mantenimiento_motos.length != 0){

                    buildTablePagos(data.info_tabla_mantenimiento_motos,tipoTabla="tabla_mantenimiento_motos");
                }
    
                $('#modal_moto_edit').modal('show');

        }else if(tipoModulo=="ModuloLeads"){

            let arrayFormularios=[
                'registro_seguridad_leads',
            ];

            limpiarFormAndTabla(arrayFormularios, inputTipo="forms");


            if(data.infodatos.length != 0){
                mostrarDataEdit(data.infodatos[0], idform="registro_datos_leads",btn="btn_cambiar_datos_leads");
            }

            mostrarDataEdit(data.info_datos_seguridad[0],idform="registro_seguridad_leads",btn="btn_cambiar_seguridad_leads");

            const docPreviewMap = {1:'preview_cedula', 2:'preview_licencia', 3:'preview_recibo', 4:'preview_certificado_laboral'};
            const imageExts = ['jpg','jpeg','png','gif','webp'];
            Object.values(docPreviewMap).forEach(id => { const el=document.getElementById(id); if(el) el.innerHTML=''; });
            if(data.docs && data.docs.length > 0){
                data.docs.forEach(doc => {
                    const previewDiv = document.getElementById(docPreviewMap[doc.tipo_documento]);
                    if(!previewDiv) return;
                    const url = `/app/archivos_cargados/${doc.ruta}/${doc.nombre}`;
                    const ext = (doc.tipo||'').toLowerCase();
                    if(imageExts.includes(ext)){
                        previewDiv.innerHTML = `<a href="${url}" target="_blank"><img src="${url}" style="max-width:100%;max-height:120px;border:1px solid #ddd;border-radius:4px;margin-top:4px" title="Ver archivo"></a>`;
                    } else {
                        previewDiv.innerHTML = `<a href="${url}" target="_blank" class="btn btn-sm btn-outline-secondary mt-1"><i class="fas fa-file"></i> Ver archivo</a>`;
                    }
                });
            }

            $("#modal_leds_edit").modal('show');

        }

    });
}

function mostrarModalEditar2(e,tipoModulo){
    console.log("tipomodulo", tipoModulo);
    
    let url="/app/ajax/infomodal_WEBSERVICE.php";
    let data=new FormData();
    let arrDato=[];

    if(tipoModulo == "ModuloLeads"){
        console.log("INFODELOSLEDS", e.codigo_cliente);
        data.append('ID', e.codigo_cliente);
        
        data.append('TipoModulo', tipoModulo)

    }else{
        arrDato.push(e);

        data.append('ID', arrDato);
        data.append('TipoModulo',tipoModulo)
    }

    fetch(url,{
        method:'POST',
        body:data
    }).then(response => response.json())
    .then(data => {

        console.log("TODALAINFO",data);

        if(tipoModulo=="ModuloCliente"){

            var cod_cliente=e;
                listado_consulta("div_listado_soportes","cliente_soportes"," where d.codigo_padre="+ cod_cliente,"",false);

                //creo un array con el id de los formularios y de las tablas para limpiarlos siempre que se llame la api.

                let arrayFormularios=[
                    'form_contrato_clientes',
                    'registro_edit', 
                    'form_save_seguridad'
                ];
                
                limpiarFormAndTabla(arrayFormularios, inputTipo="forms");

                let arrayTabla=[
                    'tablaDeContratos',
                    'tablaDePagos',
                ];
                

                limpiarFormAndTabla(arrayTabla, inputTipo="tablas");

            
                if(data.info_tabla_contratos.length != 0){
                
                    buildTablePagos(data.info_tabla_contratos, tipoTabla="tablaDeContratos");
                }
                
                
                if(data.info_form_contrato_clientes.length != 0){

                    mostrarDataEdit(data.info_form_contrato_clientes[0], idform="form_contrato_clientes", btn="none");
                }

                if(data.info_tabla_pagos.length != 0){

                    buildTablePagos(data.info_tabla_pagos, tipoTabla="tablaDePagos");   
                }

                if(data.infodatos.length != 0){

                    mostrarDataEdit(data.infodatos[0], idform="registro_edit",btn="btn_cambiar");
                }

              
                mostrarDataEdit(data.info_datos_seguridad[0],idform="form_save_seguridad",btn="save_seguridad");
                

                $('#modal_usu_edit').modal('show');

        }else if(tipoModulo=="ModuloMotos"){

                var cod_moto=e;
                listado_consulta("div_listado_documentos","moto_soportes"," where d.codigo_padre="+ cod_moto,"",false);

                listado_consulta2("div_listado_balance_motos","listado_balance_motos",cod_moto,"",true);

                let arrayFormularios=[
                    'form_datos_motos',
                ];

                    limpiarFormAndTabla(arrayFormularios, inputTipo="forms");

                let arrayTabla=[
                    'tablaMotosDatos',
                    'tablaMotosPagos',
                    'tabla_mantenimiento_motos',
                ];

                    limpiarFormAndTabla(arrayTabla, inputTipo="tablas");


                //Agrego el boton al formulario de mantenimiento.
                let save_mantenimiento=document.querySelector('#btn_mantenimiento_motos');
                save_mantenimiento.addEventListener('click', funcionSave);

                if(data.cedes.length != 0){

                    mostrarCede(data.cedes);
                }

                if(data.info_form_moto_datos.length != 0){

                    mostrarDataEdit(data.info_form_moto_datos[0], idform="form_datos_motos",btn="btn_cambiar_datos_moto");
                }

                if(data.info_tabla_moto_datos.length != 0){

                    buildTablePagos(data.info_tabla_moto_datos,tipoTabla="tablaMotosDatos");
                }

                if(data.info_tabla_moto_pago.length != 0){

                    buildTablePagos(data.info_tabla_moto_pago, tipoTabla="tablaMotosPagos");
                }

                if(data.info_tabla_mantenimiento_motos.length != 0){

                    buildTablePagos(data.info_tabla_mantenimiento_motos,tipoTabla="tabla_mantenimiento_motos");
                }
    
                $('#modal_moto_edit').modal('show');

        }else if(tipoModulo=="ModuloLeads"){

            let arrayFormularios=[
                'registro_seguridad_leads',
            ];

            limpiarFormAndTabla(arrayFormularios, inputTipo="forms");


            if(data.infodatos.length != 0){
                mostrarDataEdit(data.infodatos[0], idform="registro_datos_leads",btn="btn_cambiar_datos_leads");
            }

            mostrarDataEdit(data.info_datos_seguridad[0],idform="registro_seguridad_leads",btn="btn_cambiar_seguridad_leads");
            
            $("#modal_leds_edit").modal('show');

        }

    });
}

    function limpiarFormAndTabla(Arr, tipo){

        Arr.forEach((arrForm) => {
            let elData = document.querySelector(`#${arrForm}`);
            
            if(tipo == "forms"){
                elData.reset();
            }else{
                elData.innerHTML="";
            }
            
        })

    }



function mostrarCede(cedes){
    let select=document.querySelector("#codigo_sede_select");
    //let codigoCedeCrear=document.querySelector("#sede_moto_crear");

    cedes.forEach(cede => {
        let option=document.createElement('option');
        option.value=cede.codigo_sede;
        option.innerHTML=cede.nombre;
        option.id=cede.codigo_sede;
        select.append(option);
        //codigoCedeCrear.append(option);
    })

}

//Function para mostrar la data en el fomulario para que pueda editarse. 
function mostrarDataEdit(dataInfo,idform,btn){

    let elForm=document.querySelector(`#${idform}`);
    elForm.reset();

    /* Si la informacion no existe simplemente hago un return */

    console.log("FUNCTIONFORMULARIO", dataInfo);
    console.log("FUNCTIONFORMULARIODIV", elForm);

    if(btn != "none"){

        /*evaluo si existe como id o como clase ya que en los formulario de leds 
        lo defino como clases porque necesito asignarle la misma funcion 2 botones.*/
    
        let saveEdit=document.querySelector(`#${btn}`);
        if(saveEdit != null){
            saveEdit.addEventListener('click', funcionSave);

        }else{
            let saveEditClass=document.querySelectorAll(`.${btn}`);
            saveEditClass.forEach((saves) => {
                saves.addEventListener('click', funcionSave);
            })
        }
       
    }

     /* PARA ALGUNOS FORMULARIOS POR EJEMPLO EL DE SEGURIDAD QUE CUANDO NO EXISTE INFORMACION 
        EN LA BASE DE DATOS NO ME ASGINA LA FUNCIONES DE cambiarCheck para los check, tengo que asiginarle
        la function de igual forma. */

        let checksForm=document.querySelectorAll(`#${idform} input[type=checkbox]`);
        if(checksForm.length != 0){
            checksForm.forEach((checks) => {
                checks.addEventListener('change', cambiarCheck);
                /*siempre remuevo todos los atributos de los check para dejarlos limpios */
                checks.removeAttribute('value');
                checks.removeAttribute('checked');
            })
        }

    if(dataInfo == undefined){
        return;
    }
        //pestañaContrato.classList.add("d-none");

        let idCampos=Object.keys(dataInfo);
        idCampos.forEach((campoId) => {

            //Este codigo es para que busque todos los id llamados codigo_clientes y codigo_moto y le asigne el mismo id a todos.
            if(campoId == "codigo_cliente" || campoId == "codigo_moto"){
                let campo_cod_cliente=document.querySelectorAll(`#${campoId}`);
                campo_cod_cliente.forEach((cam_clie) => {
                    cam_clie.value=dataInfo[campoId];
                })

            }

            let campo=document.querySelector(`#${campoId}`);					
            let campoSelect=document.querySelector(`#${campoId}_select`);
            let campoCheck=document.querySelector(`#${campoId}_check`);

            if(campoSelect != null && campoSelect.tagName == "SELECT" && dataInfo[campoId] != null){

                //Aqui trabajo con los campos que son de tipo select;
                let tagName=campoSelect.getElementsByTagName(`option`);
                
                for(i=0; i < tagName.length; i++){
                    if(tagName[i].id == dataInfo[campoId].toLowerCase()){
                        tagName[i].setAttribute("selected","");
                    }
                }
                
            }else if(campoCheck != null && campoCheck.type == "checkbox"){

                campoCheck.addEventListener('change', cambiarCheck);
                if(dataInfo[campoId] == 1){
                    campoCheck.setAttribute("checked","");
                    campoCheck.value=dataInfo[campoId];
                }
        
            }else{
                if(campo != null){

                    //Para el codigo cliente ejecuto el script que esta arriba que busca todos los id de codigo_cliente de los formularios.
                    if(campo != "codigo_cliente"){

                        if(campo.id == "frecuencia_cobro"){

                            if(dataInfo[campoId] == 7){
                                campo.value="Semanal";
                            }else if(dataInfo[campoId] == 30){
                                campo.value="Mensual";
                            }else if(dataInfo[campoId] == 15){
                                campo.value="Quincenal";
                            }

                        }else{
                            campo.value=dataInfo[campoId];
                        }
                        
                    }

                }
            }	
        })

    }


/*creo esta function porque los checkbox que estan desmarcados no se enviar por POST 
asi que tengo que guardar esa info en un input type hidden.*/

function cambiarCheck(e){

    let check=document.querySelector(`#${e.target.id}`);
    let checkHidden=document.querySelector(`#hiddenValueCheck`);
    let name=e.target.name;

    if(e.target.checked == true){
        check.value='1';
        checkHidden.innerHTML="";
    }else{
        let hidden=document.createElement('input');
        hidden.type="hidden";
        hidden.name=name;
        hidden.value="0";
        checkHidden.appendChild(hidden);
    }
    
}


function funcionSave(e){

    console.log("VALOR DESDE FUNCION SAVE", e.target.value);

    if(e.target.value == "save_datos_contrato_leads"){

        if(confirm("Seguro completo todo el proceso exitosamente?") == false){
            return;
        }

    }else{

        if(confirm("Desea guardar la informacion?") == false){
            return;
        }

    }

    //En el botton que llama la function meto los datos en elementos data de html.
    let url="/app/ajax/infomodal_WEBSERVICE.php";
    let nombreTabla=[];
    let tipoConsulta=[];
    let nameFormulario="";
    let modalOcultar="";
    let vista="";
    

    if(e.target.value == "cambiar_datos"){

        nameFormulario="registro_edit";
        nombreTabla.push("tbl_clientes");
        tipoConsulta.push('update');
        modalOcultar="modal_usu_edit";
        vista="clientes";

    }if(e.target.value == "save_datos_seguridad"){

        nameFormulario="form_save_seguridad";
        nombreTabla.push("tbl_seguridad_clientes");
        tipoConsulta.push('update');
        modalOcultar="modal_usu_edit";
        vista="clientes";

    }if(e.target.value=="save_datos_motos"){

        nameFormulario="form_datos_motos";
        nombreTabla.push("tbl_motos");
        tipoConsulta.push('update');
        modalOcultar="modal_moto_edit";
        vista="motos2";

    }if(e.target.value=="save_mentenimiento_motos"){

        nameFormulario="form_motos_mantenimiento";
        nombreTabla.push("tbl_mantenimiento_motos");
        tipoConsulta.push('insert');
        modalOcultar="modal_moto_edit";
        vista="motos2";

    }
    if(e.target.value=="save_registro_leads"){

        nameFormulario="registro_leads";
        nombreTabla.push("leads_clientes");
        tipoConsulta.push('insert');
        modalOcultar="modal_leads_reg";
        vista="modulo_leads";

    }

    if(e.target.value == "cambiar_datos_leads" || e.target.dataset.saveinfochange == "cambiar_datos_leads"){

        nameFormulario="registro_datos_leads";
        nombreTabla.push("tbl_clientes");
        tipoConsulta.push('update');
        modalOcultar="modal_leds_edit";
        vista="modulo_leads";
    }


    if(e.target.value == "cambiar_seguridad_leads" || e.target.dataset.saveinfochange == "cambiar_seguridad_leads"){

        nameFormulario="registro_seguridad_leads";
        nombreTabla.push("tbl_seguridad_clientes");
        tipoConsulta.push('update');
        modalOcultar="modal_leds_edit";
        vista="modulo_leads";

    }

    if(e.target.value == "save_datos_contrato_leads"){

        nameFormulario="registro_motos_leads";
        nombreTabla.push("tbl_contratos");
        tipoConsulta.push('insert');
        modalOcultar="modal_leds_edit";
        vista="modulo_leads";

    }

    console.log(nameFormulario);
    var formData = new FormData(document.getElementById(`${nameFormulario}`));
 
    formData.append('tabla', nombreTabla);
    formData.append('tipoconsulta', tipoConsulta);

    $(`#${modalOcultar}`).modal('hide');

    fetch(url,{
        method:'POST',
        body:formData
    }).then(response => response.json())
    .then(data => {
        console.log("REPUESTAGUARDADOFORM", data);
        if(data && data.error_php){
            alert("Error al guardar: " + data.error_php);
        } else {
            alert(data ? data.info : "Sin respuesta");
        }
        cargar_view(`views/${vista}.php`);
        

        /*
            let imrInfo=document.querySelector("#imprimirDatos");
            imrInfo.innerHTML=`<div style="color:#000000;">${data.info}</div>`;
        */

       
        
    });

}

function buildTablePagos(dataTabla,tipoTabla){
    
    //Si no tiene registros de pagos devuelvo un mensaje que diga que no tiene registros de pagos.
    //console.log("TIPOTABLA", tipoTabla);
    let divTabla=document.querySelector(`#${tipoTabla}`);
    //console.log("DIVTABLAAAAA", divTabla);
    //console.log("DATATABLA", dataTabla);
    

    //console.log("INFOBUILDTABLEPAGOS",dataTabla);
    if(dataTabla.length == 0){
        divTabla.innerHTML="<h1 class='text-center mb-4'>Sin informacion disponible</h1>";
        return;
    }
    
    
    let thInfo="";

    //Agarro todas las Keys la cual seran los header de la tabla.
    let headerTabla=Object.keys(dataTabla[0]);

    let tabla='<table class="table table-bordered">';
    tabla += `<thead>
    <tr>`;
        headerTabla.forEach((header) => {
                tabla += `<th scope="col">${header}</th>`
            });
    tabla += `</tr>
    </thead>`

    tabla += `<tbody>`;
    dataTabla.forEach((TableSeparate) => {
        tabla += `<tr>`;
            for(const prop in TableSeparate){
                //console.log("PROBANDOODATATABLA",`${prop} - ${TableSeparate[prop]}`);
                if(TableSeparate[prop] == null){
                    thInfo = "Sin Informacion";
                }else{
                    thInfo = TableSeparate[prop];
                }
                tabla += `<th>${thInfo}</th>`;
            }

        tabla += `</tr>`;
    })
    tabla += `</tbody>`;



    tabla += '</table>'
    divTabla.innerHTML=tabla;

}

function changeEstadoLeds(e){

    $(`#modal_leds_edit`).modal('hide');
    let vista="modulo_leads";

    console.log("Valor de change fase", e.target.value);
    console.log("CODIGOCLIENTEDESDECHANGE", e.target.dataset.idcliente);

    if(confirm('Desea cambiar de fase?')){

        let dataInfo=new FormData();
        dataInfo.append('codigo_cliente', e.target.dataset.idcliente);
        dataInfo.append('faseNew', e.target.value);
        dataInfo.append('changeEstadoLeds', true);

        EnvioAjax(dataInfo, vista)

    }else{
        return;
    }

}

function ChangeDisponibilidad(datos){

    if(confirm('Ha marcado como NO APTO este proceso, esta seguro?') == false){
        return;
    }
    //Esto basicamente cambia la disponibilidad a 2 que seria "no apto";
    let dataInfo=new FormData();
    let vista="modulo_leads";
    $(`#modal_leds_edit`).modal('hide');
   
    dataInfo.append('codigo_cliente', datos.target.dataset.idcliente);
    dataInfo.append('disponibilidad', datos.target.value);
    dataInfo.append('ChangeDisponibilidad', true);
    
    EnvioAjax(dataInfo, vista);

}


function changeFase(datos){

    let dataInfo=new FormData();

    dataInfo.append('codigo_cliente', datos.codigo_cliente);
    dataInfo.append('disponibilidad', datos.disponibilidad);
    dataInfo.append('id_empleado', datos.id_empleado);
    dataInfo.append('ChangeDisponibilidad', true);

    EnvioAjax(dataInfo, "");

}

function EnvioAjax(datos, vista){

    let url="/app/ajax/infomodal_WEBSERVICE.php";

    fetch(url,{
        method:'POST',
        body:datos
    }).then(response => response.json())
    .then(data => {
        console.log("DATAENVIOAJAX", data);

        if(vista != ""){
            cargar_view(`views/${vista}.php`);
        }

    });


};