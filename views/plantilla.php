<?php
  /**Iniciamos las variables de sesión */
  session_start();
  // $ruta = ControladorRuta::ctrRuta();
  $rutaBackend = ControladorRuta::ctrRutaBackend();

  /**Vamos a traernos la información de plantilla */
  $idPlanilla = 1;
  $plantillaHotel = ControladorPlantilla::ctrMostrarPlantilla($idPlanilla);

  if(!isset($_SESSION["idEmpleadoLogeado"])){
    include "views/pages/login.php";
    return;
  }

  if(isset($_SESSION["idEmpleadoLogeado"])){

    $admin = ControladorEmpleados::ctrMostrarEmpleados("id", $_SESSION["idEmpleadoLogeado"]);
  
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PARA EL TEMA DE LA CACHÉ ... DESHABILITAMOS -->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <!-- <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'> -->

    <title>Administrador Hotel Alphus</title>

	  <link rel="icon" href="views/img/plantilla/iconoAlphus.png">

    <!-- *************************************************** -->
    <!-- ARCHIVOS DE CSS REQUERIDOS PARA LA PLANILLA -->
    <!-- *************************************************** -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" integrity="zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=">

    <!-- Theme style -->
    <link rel="stylesheet" href="views/resources/css/layaut/adminlte.min.css">

    <!-- Estilos para los DataTables -->
    <link rel="stylesheet" href="views/resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="views/resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="views/resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Estilos personalizados de la plantilla -->
    <link rel="stylesheet" href="views/resources/css/plantilla.css">

    <!-- jQuery Pano -->
    <link rel="stylesheet" href="views/resources/plugins/jquery-pano/jquery.pano.css">

    <!-- bootstrap datepicker -->
	  <link rel="stylesheet" href="views/resources/plugins/datepicker/bootstrap-datepicker.standalone.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="views/resources/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="views/resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Bootstrap Switch -->
    <link rel="stylesheet" href="views/resources/plugins/bootstrap-switch-master/css/bootstrap4/bootstrap-switch.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="views/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Summernote -->
    <link rel="stylesheet" href="views/resources/plugins/summernote/summernote-bs4.min.css">

    <!-- Color Piker - bootstrap-colorpicker -->
    <link rel="stylesheet" href="views/resources/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

    <!-- iChek de Bootstrap -->
    <link rel="stylesheet" href="views/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- fullCalendar -->
	  <link rel="stylesheet" href="views/resources/plugins/calendar/fullcalendar.min.css">

    <!-- Morris chart -->
  	<link rel="stylesheet" href="views/resources/plugins/morris/morris.css">


    <!-- *************************************************** -->
    <!-- ARCHIVOS DE JS REQUERIDOS PARA LA PLANILLA -->
    <!-- *************************************************** -->
    <!-- jQuery -->
    <script src="views/resources/plugins/jquery/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- jQuery Pano -->
    <script src="views/resources/plugins/jquery-pano/jquery.pano.js"></script>

    <!-- bootstrap datepicker -->
    <!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
    <script src="views/resources/plugins/datepicker/bootstrap-datepicker.min.js"></script>
    
    <!-- jQuery Validation -->
    <script src="views/resources/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="views/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Select2 -->
    <script src="views/resources/plugins/select2/js/select2.full.min.js"></script>

    <!-- AdminLTE App -->
    <script src="views/resources/js/layaut/adminlte.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- DataTables generados desde la plantilla -->
    <script src="views/resources/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="views/resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="views/resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="views/resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="views/resources/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="views/resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="views/resources/plugins/jszip/jszip.min.js"></script>
    <script src="views/resources/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="views/resources/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="views/resources/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="views/resources/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="views/resources/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    
    <!-- Bootstrap Switch -->
    <script src="views/resources/plugins/bootstrap-switch-master/js/bootstrap-switch.min.js"></script>

    <!-- Summernote -->
    <script src="views/resources/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- Color Piker - bootstrap-colorpicker -->
    <script src="views/resources/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <!-- CKEDITOR -->
    <!-- https://ckeditor.com/ckeditor-5/#classic -->
    <script src="views/resources/plugins/ckeditor/ckeditor.js"></script>

    <!-- fullCalendar -->
    <!-- https://momentjs.com/ -->
    <script src="views/resources/plugins/calendar/moment.js"></script>
    <!-- https://fullcalendar.io/docs/background-events-demo -->	
    <script src="views/resources/plugins/calendar/fullcalendar.min.js"></script>

    <!-- Morris.js charts -->
    <!-- https://morrisjs.github.io/morris.js/ -->
    <script src="views/resources/plugins/morris/raphael-min.js"></script>
    <script src="views/resources/plugins/morris/morris.min.js"></script>

    <!-- Para no marcar la fecha actual en el calendario de reservas -->
    <style>
		
      .fc-today{
        background:rgba(255,255,255,0) !important;
      }

    </style>

</head>

<body id="bodyPlantilla" class="sidebar-mini control-sidebar-slide-open sidebar-collapse light-mode">

    <div class="wrapper">
      
      <?php 

        include "views/pages/modules/header.php";

        include "views/pages/modules/menu.php";

        /************************************************/
        /*************** Carga de Modales ***************/
        /************************************************/
        // include "vistas/paginas/modulos/modals/modals_admins.php";
        // include "vistas/paginas/modulos/modals/modals_cargos.php";
        // include "vistas/paginas/modulos/modals/modals_contratosAdmins.php";
        // include "vistas/paginas/modulos/modals/modals_conceptos.php";
        // include "vistas/paginas/modulos/modals/modals_fichas.php";
        /***************************************** */
        /******** NAVEGACIÓN DE LAS PÁGINAS ****** */
        /***************************************** */
        /**Recordemos que viene a través de la configuración del .htaccess */
        if(isset($_GET["pagina"])){

          /******************************************** */
          /******** CONSTRUCCIÓN DE LISTA BLANCA ****** */
          /******************************************** */
          /**Si existe, quiere decir que existe como un archivo de proyecto */
          if($_GET["pagina"] == "inicio" || 
             $_GET["pagina"] == "empleados" ||
                /**---------- SUB CONTENIDOS DE EMPLEADOS ----------*/
                $_GET["pagina"] == "empleados-contratos" ||
                $_GET["pagina"] == "empleados-fichas" ||
                $_GET["pagina"] == "empleados-planillas" ||
                $_GET["pagina"] == "empleados-generarNomina" ||
                $_GET["pagina"] == "configuracion-global" ||
                $_GET["pagina"] == "configuracion-cargos" ||
                $_GET["pagina"] == "conceptos" ||
                $_GET["pagina"] == "ficha-empleado" ||
             /**------------------------------------------------------ */
             $_GET["pagina"] == "banner" ||
             $_GET["pagina"] == "planes" ||
             $_GET["pagina"] == "categorias" ||
             $_GET["pagina"] == "habitaciones" ||
                /**---------- SUB CONTENIDOS DE HABITACIONES ----------*/
                $_GET["pagina"] == "aseo" ||
                $_GET["pagina"] == "mantenimiento" ||
             /**------------------------------------------------------ */
             $_GET["pagina"] == "reservas" ||
             $_GET["pagina"] == "testimonios" ||
             $_GET["pagina"] == "usuarios" ||
             $_GET["pagina"] == "atracciones" ||
             $_GET["pagina"] == "restaurante" ||
             $_GET["pagina"] == "servicioAtracciones" ||
             $_GET["pagina"] == "carta" ||
             $_GET["pagina"] == "comprasRestaurante" ||
             $_GET["pagina"] == "ventasRestaurante" ||
             $_GET["pagina"] == "plantilla-hotel" ||
             $_GET["pagina"] == "salir"){

               include "views/pages/".$_GET["pagina"].".php";
               
               /**Vamos a validar parar cargar los modales ...
                * *************************************************************************************************
                * Al mismo tiempo, según lo que vayamos a cargar y la variable de página cargamos el respectivo
                archivo de JS, esto con el fin de no cargar todo al tiempo si no irlo cargando según se vaya 
                necesitando a lo largo de la aplicación. 
                * ************************************************************************************************* */
               switch($_GET["pagina"]){
                 /**1. Empleados:  */
                 case "empleados":

                   include "views/pages/modals/empleados/modals_admins.php"; 
                   echo '<script src="views/resources/js/empleados.js"></script>';

                 break;
                 
                 /**2. Contratos de Empleados:  */
                 case "empleados-contratos":

                   include "views/pages/modals/empleados/modals_contratos.php";
                   echo '<script src="views/resources/js/contratosEmpleados.js"></script>';

                 break;

                 /**3. Cargos de Empleados:  */
                 case "configuracion-cargos":
                  
                  include "views/pages/modals/empleados/modals_cargos.php";
                  echo '<script src="views/resources/js/cargos.js"></script>';

                 break;

                 /**4. Fichas de Empleados:  */
                 case "ficha-empleado":
                  
                  include "views/pages/modals/empleados/modals_fichas.php";
                  echo '<script src="views/resources/js/fichaEmpleados.js"></script>';

                 break;

                 /**5. Conceptos Contables:  */
                 case "conceptos":
                  
                  include "views/pages/modals/empleados/modals_conceptos.php";
                  echo '<script src="views/resources/js/conceptos.js"></script>';

                 break;

                 /**6. Banner del Hotel:  */
                 case "banner":
                  
                  include "views/pages/modals/banners/modals_banners.php";
                  echo '<script src="views/resources/js/banner.js"></script>';

                 break;

                 /**7. Planes del Hotel:  */
                 case "planes":
                  
                  include "views/pages/modals/planes/modals_planes.php";
                  echo '<script src="views/resources/js/planes.js"></script>';

                 break;

                 /**8. Categorías de Habitación del Hotel:  */
                 case "categorias":
                  
                  include "views/pages/modals/categorias/modals_categorias.php";
                  include "views/pages/modals/categorias/modals_comodidades.php";
                  include "views/pages/modals/categorias/modals_admonsComodidades.php";
                  echo '<script src="views/resources/js/categorias.js"></script>';

                 break;

                 /**9. Habitaciones del Hotel:  */
                 case "habitaciones":
                  
                  include "views/pages/modals/habitaciones/modals_estadoHabitacion.php";
                  echo '<script src="views/resources/js/habitaciones.js"></script>';

                 break;

                 /**10. Aseo Habitaciones del Hotel:  */
                 case "mantenimiento":
                  
                  include "views/pages/modals/habitaciones/modals_estadoHabitacion.php";
                  echo '<script src="views/resources/js/mantenimiento.js"></script>';

                 break;

                 /**11. Reservas:  */
                 case "reservas":
                  
                  include "views/pages/modals/reservas/modals_reservas.php";
                  echo '<script src="views/resources/js/reservas.js"></script>';

                 break;

                 /**12. Testimonios:  */
                 case "testimonios":
                  
                  echo '<script src="views/resources/js/testimonios.js"></script>';

                 break;

                 /**13. Usuarios:  */
                 case "usuarios":
                  
                  echo '<script src="views/resources/js/usuarios.js"></script>';

                 break;

                 /**14. Atracciones/Recorridos:  */
                 case "atracciones":
                  
                  include "views/pages/modals/atracciones/modals_atracciones.php";
                  echo '<script src="views/resources/js/atracciones.js"></script>';

                 break;
                 
 
               } /**Switch de modales */

              


              // /**Vamos a validar parar cargar los modales ... */
              // /**1. Empleados:  */
              // if($_GET["pagina"] == "empleados"){
              //   include "views/pages/modals/empleados/modals_admins.php"; 
              // }

              // /**2. Contratos de Empleados:  */
              // if($_GET["pagina"] == "empleados-contratos"){
              //   include "views/pages/modals/empleados/modals_contratos.php";
              // }

          }else{

            include "views/pages/modules/404.php";

          }

        }else{
          /**Por Default si es el caso, me abre la página de inicio */
          include "views/pages/inicio.php";

        }

        //include "../views/pages/modules/footer.php";
        include "views/pages/modules/footer.php";

      ?>
      
    </div>
    <!-- ./wrapper -->
  </body>

<!-- ************************************************************** -->
<!-- ARCHIVOS DE JS PROPIOS PARA LA REALIZACIÓN DE LA FUNCIONALIDAD -->
<!-- ************************************************************** -->
<!-- JavaScript personalizados de la plantilla -->
<!-- <script src="vistas/js/plantilla.js"></script> --> 
<script src="views/resources/js/plantilla.js"></script>





</html>

