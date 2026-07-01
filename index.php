<?php
ini_set('session.gc_maxlifetime', 999999999);
ini_set('session.cookie_lifetime', 999999999);

// Iniciar la sesión
session_start();

  require(__DIR__."/conexion/conexion.php");
  $conexion=new conexion_db();

  if (isset($_SESSION["codigo_rol"]) && isset($_SESSION["codigo_usuario"])) {
    $sql="SELECT nombres, apellidos, codigo_sede, codigo_rol FROM tbl_usuarios WHERE codigo_usuario=".$_SESSION["codigo_usuario"];
    $resultado=$conexion->ejecutar_sql($sql);
    $datos_usuario=$resultado->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>KAIROS V1.5</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<style>
  
  select#forma_pago {
      margin-bottom: 21px;
  }

  input#soporte_pago, input#pagorealizado, select#forma_pago {
      padding: 9px 9px;
  }

  #form_numero_validar label {
      font-weight: 800;
  }

  form p {
      width: 31%;
      display: inline-grid;
      margin: 2px 5px !important;
      vertical-align: -webkit-baseline-middle;
  }

  input#btn_guardar_numero_soporte {
      padding: 14px 3px;
      background: #000;
      border-radius: 7px;
      color: #fff;
  }

  input#btn_guardar_numero_soporte:hover {
      background: #4e4e4e;
  }

  #div_principal_form{
    overflow-x:scroll;
  }

  a.link_pago:actived{
    background-color:blue;
    opacity: 0.3 !important;
  }

  .hover{
    cursor: pointer;
  }
</style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
         <!-- <i class="fas fa-motorcycle"></i>-->
        </div>
        <div class="sidebar-brand-text mx-3"><img id="logos" src="img/motoapp_logo_light.png" style="width: 100%;"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        OPCIONES DEL MENÚ
      </div>

      <!-- Nav Items - generados dinámicamente por grupo -->
      <div id="div_opciones_menu"></div>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

       
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <div style="width: 50%"><h3 id="titulo_view" ></h3></div>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $datos_usuario["nombres"] ."<br>". $datos_usuario["apellidos"];  ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" id='a_configuracion' href="#" >
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuración
                </a><br>

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sessión
                </a>

              </div>
            </li>
          </ul>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid" id="div_principal_form"></div>

        <!-- /.container-fluid -->

      </div>

      <!-- End of Main Content -->


      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MotoTrabajo 2021</span>
          </div>
        </div>
      </footer>

      <!-- End of Footer -->

    </div>

    <!-- End of Content Wrapper -->

  </div>

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">Desea cerrar la session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="logout.php">Cerrar Sessión</a>
        </div>
      </div>
    </div>
  </div>

<!-- Logout Modal-->

<!--Modal Subir documento Inicio-->
<div class="modal fade" id="ModalSubirDocumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir Documento</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="modal-body">
        <form class="reg_usuarios" name="frm_subir_documento" id="frm_subir_documento" enctype="multipart/form-data">	
            <label for="formFile" class="form-label">Archivo</label>
            <input name="cedula" class="form-control" type="file" id="formFile">
          </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a id="btn_subir" onclick="subir_documento()" class="btn btn-primary" href="#">Subir</a>
      </div>

    </div>
  </div>
</div>

<!--Modal Subir documento Fin-->


<!--Modal Editar Inicio-->

  <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edición</h5>

          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

        </div>

        <div class="modal-body">
          <textarea  id='txt_editar' name="txt_editar" cols="30" rows="10"></textarea>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a id="btn_actualizar" class="btn btn-primary" href="#">Actualizar</a>
        </div>

      </div>
    </div>
  </div>

  <!--Modal Editar Fin-->

  <!--Modal Ver Documento Inicio-->

  <div id="ModalVerDocumento" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="width:140% !important">
            
            <div class="modal-header">
                <table><tr id="modal-titulo">Documento</tr></table>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="iframe_soporte_ver">
                    <iframe id="iframe_soporte_ver" src="" name="doc" style="height:600px;width:100%;" title="Soporte"></iframe>
                    
                    <form id='frm_doc_opciones'>
                    <?Php
                      if ($_SESSION['codigo_rol']==1){
                        echo "<p>
                                <input id='btn_soporte_eliminar' onclick='eliminar_documento()' type='button' value='Eliminar'>
                              </p>";
                      }
                    ?>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!--Modal Ver Documento Fin -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="js/jquery.growl.js" type="text/javascript"></script>
  <link href="css/jquery.growl.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css"> 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/jquery.doubleScroll.js"></script>

  <!-- FullCalendar -->
  <link href="config/fullcalendar/fullcalendar.min.css" rel="stylesheet">
  <link href="config/fullcalendar/fullcalendar.print.min.css" rel="stylesheet" media="print">
  <script src="config/fullcalendar/moment.min.js"></script>
  <script src="config/fullcalendar/fullcalendar.min.js"></script>
  <script src="config/fullcalendar/es.js"></script>
  <script src="config/fullcalendar/popper.min.js"></script>

  <!-- Tabs -->
  <link href="config/tabs/component.css" rel="stylesheet">
  <script src="config/tabs/cbpFWTabs.js"></script>

  <script src="js/mototrabajo.js?2710430"></script>
  <script src="js/formApp.js?2710456"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

<?php

  echo "codigo_sede=". $datos_usuario["codigo_sede"].";";
  echo "codigo_usuario=". $_SESSION["codigo_usuario"].";";
  echo "codigo_rol=". $_SESSION["codigo_rol"].";";

  ?>

    var v_categoria=0;
    var v_tipo_documento=0;
    var v_codigo_padre=0;
    var v_refresh_div=null;
    var s_codigo_padre=0;

  $(document).ready(function () {

    $("#a_configuracion").bind("click",configuracion);

    cargar_view(<?php echo "'views/rol_". $_SESSION["codigo_rol"] . ".php'" ?>);

  });

    $(document).on('click','.doc', function(e){
        e.stopPropagation();
        s_codigo_documento=$(this).data("cod-doc");
        s_ruta=$(this).data("href");
        url=$(this).attr("href");
        $('#iframe_soporte_ver').show();
        $('#ModalVerDocumento').modal('show');
    });

  function configuracion(){
    cargar_view('views/configuracion.php');
  }

  function modal_subir_documento(categoria,tipo_documento,codigo_padre,refreshDiv){
    v_categoria=categoria;
    v_tipo_documento=tipo_documento;
    v_codigo_padre=codigo_padre;
    v_refresh_div=refreshDiv || null;
    $("#frm_subir_documento")[0].reset();
    $('#ModalSubirDocumento').modal('show');
  }

  function subir_documento(){

    var formData = new FormData(document.getElementById("frm_subir_documento"));
    formData.append('categoria', v_categoria);
    formData.append('tipo_documento', v_tipo_documento);
    formData.append('codigo_padre', v_codigo_padre);

    $.ajax({
      url: '/app/ajax/subir_documento.php',
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false
    }).done(function(res){

      $('#ModalSubirDocumento').modal('hide');
        alert(res);
        //console.log("holaaaa");
        cargar_listado();
        if(v_refresh_div){
          $.ajax({
            url: '/app/ajax/infomodal_WEBSERVICE.php',
            type: 'post',
            dataType: 'html',
            data: {
              SoloSoportes: true,
              categoria: v_categoria,
              codigo_padre: v_codigo_padre
            }
          }).done(function(html){
            $("#" + v_refresh_div).html(html);
          });
        }
        //$("#mensaje").html("Respuesta: " + res);

      });

}

function eliminar_documento(){

  var formData = new FormData(document.getElementById("frm_doc_opciones"));
  formData.append('codigo_documento', s_codigo_documento);
  formData.append('codigo_usuario', codigo_usuario);

  $.ajax({
    url: '/app/ajax/eliminar_documento.php',
    type: "post",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(res){

    $('#ModalVerDocumento').modal('hide');
      alert(res);
      cargar_listado();
    });

}

</script> 

</body>
</html>

<?php

  }else{
    //cho "entonces jorge " . $_SESSION["codigo_usuario"];
    header('Location: /app/login.html');
  }

?>