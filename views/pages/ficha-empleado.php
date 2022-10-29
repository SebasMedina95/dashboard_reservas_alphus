<?php 

/**Ahora, vamos a convertir la cookie que nos llego $_COOKIE["idContratoFicha"] en una variable
 * de Session, así no será accesible desde el cliente y garantizamos mas seguridad. */
/**Creamos las variables de sesión:
 * 
 * Nota: Validamos para cuando borremos la Cookie, no se nos quede luego en un limbo nuestra
 * variable de sesión, entonces re validamos y ajustamos para que se elimine la cookie pero 
 * se conserve la variable de sesión de forma adecuada: */
if(!$_SESSION["idContratoFichaSession"]){
    $_SESSION["idContratoFichaSession"] = $_COOKIE["idContratoFicha"];
    echo '<script>

        /**Forzo borrado de cookie */
        console.log("Cookie eliminada - Queda el resto en la variable de Session ...");
        document.cookie = "idContratoFicha=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

    </script>';
}else{
    if(isset($_COOKIE["idContratoFicha"])){
        $_SESSION["idContratoFichaSession"] = $_COOKIE["idContratoFicha"];
        echo '<script>

            /**Forzo borrado de cookie */
            console.log("Cookie eliminada - Queda el resto en la variable de Session ...");
            document.cookie = "idContratoFicha=; expires=Thu, 01 Jan 1970 00:00:00 UTC";

        </script>';
    }
}
    
/**Vamos a traernos la información del contrato */
$itemContrato = "id";
$valorContrato = $_SESSION["idContratoFichaSession"];
$respuestaContrato = ControladorContratoEmpleados::ctrMostrarContratoEmpleados($itemContrato , $valorContrato);

/**Vamos a traernos la información del admin */
$itemAdmins = "id";
$valorAdmins = $respuestaContrato["id_admin"];
$respuestaAdmins = ControladorEmpleados::ctrMostrarEmpleados($itemAdmins , $valorAdmins);

/**Vamos a traernos la información de la Ficha*/
$itemFicha = "id_contrato";
$valorFicha = $respuestaContrato["id"];
$respuestaFicha = ControladorContratoEmpleados::ctrMostrarFichas($itemFicha , $valorFicha);

/**Vamos a traernos la información del cargo que aplica*/
$itemCargo = "id";
$valorCargo = $respuestaContrato["id_cargo"];
$respuestaCargo = ControladorCargos::ctrMostrarCargos($itemCargo , $valorCargo);

/**Vamos a traernos la información de los concepto que aplica*/
// $itemDetalleConcepto = "id_ficha";
// $valorDetalleConcepto = $_SESSION["idContratoFichaSession"] ; //$respuestaFicha["id"];
// $respuestaDetalleConcepto = ControladorContratoAdmins::ctrMostrarDetallesConcepto($itemDetalleConcepto , $valorDetalleConcepto);

// echo '<pre>' ; print_r($respuestaDetalleConcepto); echo '</pre>' ;

/**Vamos a traernos la info de los detalles de concepto aplicados */

/**Ajustamos variables para nombres, podría ser condicionals de una sola línea pero, lo harémos 
 * como condicionales estándares. */
if($respuestaAdmins["estado_civil"] == "1"){
  $estadoCivil = "Soltero(a)";
}else if($respuestaAdmins["estado_civil"] == "2"){
  $estadoCivil = "Casado(a)";
}else if($respuestaAdmins["estado_civil"] == "3"){
  $estadoCivil = "Viudo(a)";
}else if($respuestaAdmins["estado_civil"] == "4"){
  $estadoCivil = "Divorciado(a)";
}else if($respuestaAdmins["estado_civil"] == "5"){
  $estadoCivil = "Unión Libre";
}else{
  $estadoCivil = "Sin Asignar";
}

if($respuestaAdmins["tipo_regimen"] == "1"){
  $tipoRegimen = "Estado";
}else if($respuestaAdmins["tipo_regimen"] == "2"){
  $tipoRegimen = "Gran Contribuyente";
}else if($respuestaAdmins["tipo_regimen"] == "3"){
  $tipoRegimen = "Común";
}else if($respuestaAdmins["tipo_regimen"] == "4"){
  $tipoRegimen = "Simple";
}else if($respuestaAdmins["tipo_regimen"] == "5"){
  $tipoRegimen = "No Responsable";
}else if($respuestaAdmins["tipo_regimen"] == "6"){
  $tipoRegimen = "Pendiente";
}else{
  $tipoRegimen = "Sin Asignar";
}

if($respuestaAdmins["tipo_persona"] == "1"){
  $tipoPersona = "Natural";
}else if($respuestaAdmins["tipo_persona"] == "2"){
  $tipoPersona = "Jurídica";
}else{
  $tipoPersona = "Sin Asignar";
}

$salarioBasico = number_format($respuestaContrato["salario_basico"], 2, ",",".");

if($respuestaContrato["periodo_pago"] == "1"){
  $periodoPago = "Mensual";
}else{
  $periodoPago = "Quincenal";
}

if($respuestaFicha["estado"] == "1"){
  $estadoFicha = "Ficha Abierta";
}else{
  $estadoFicha = "Ficha Cerrada";
}

$fechaNacimiento = date("d-M-Y" , strtotime($respuestaAdmins["fecha_nacimiento"]));
    

?>

<div class="content-wrapper" style="min-height: 823px;">
    
  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Ficha del Contrato: </h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item"><a href="empleados">Empleados</a></li>

            <li class="breadcrumb-item"><a href="empleados-contratos">Contratos</a></li>

            <li class="breadcrumb-item active">Ficha</li>

          </ol>

        </div><!-- /.col -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content-header -->

  <!-- ******************************* -->
  <!-- ***** CONTENIDO DEL SITIO ***** -->
  <!-- ******************************* -->
<section class="content">

  <div class="container-fluid">

    <div class="row">

      <!-- *********************************************** -->
      <!-- ***** INFORMACIÓN GENERAL PANEL IZQUIERDO ***** -->
      <!-- *********************************************** -->

      <div class="col-md-2">

        <!-- <div class="btn-group">

          <div class="col-md-12">

            <a href="#" class="btn btn-primary btn-block mb-2"><?php echo $respuestaFicha["codigo_ficha"] ?></a>

          </div>

          <div class="col-md-3">

            <a href="administradores-contratos" class="btn btn-secondary btn-block mb-2"><i class="fa-solid fa-rotate-left"></i></a>

          </div>

        </div> -->

        <!-- <input type="text" value="<?php echo $_SESSION["idContratoFichaSession"] ?? '' ?>" id="txtValFichaDef" name="txtValFichaDef"> -->

        <div class="card">

          <div class="card-header">

            <h3 class="card-title text-muted"><b>Empleado</b></h3>

            <div class="card-tools">

              <button type="button" class="btn btn-tool" data-card-widget="collapse">

                <i class="fas fa-minus"></i>

              </button>

            </div>

          </div>

          <div class="card-body p-0">

            <ul class="nav nav-pills flex-column">

              <li class="nav-item active" title="Fotografía">

                <img class="img-fluid" src="<?php echo $respuestaAdmins["foto"] ?>">

              </li>

              <li align="center" class="nav-item" title="Ficha">

                <a href="#" class="nav-link">

                  <h4><span class="badge badge-default"><?php echo $respuestaFicha["codigo_ficha"] ?> </span></h4>

                </a>

              </li>

              <li class="nav-item" title="Identificación">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-id-card"></i> <?php echo $respuestaAdmins["tipo_documento"] . " - " . $respuestaAdmins["documento"] ?>

                </a>

              </li>

              <li class="nav-item" title="Nombres">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-user-large"></i> <?php echo $respuestaAdmins["primer_nombre"] . " " . $respuestaAdmins["segundo_nombre"] ?>

                </a>

              </li>

              <li class="nav-item" title="Apellidos">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-user-large"></i> <?php echo $respuestaAdmins["primer_apellido"] . " " . $respuestaAdmins["segundo_apellido"] ?>

                </a>

              </li>

              <li class="nav-item" title="Perfil">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-house-user"></i> <?php echo $respuestaAdmins["perfil"] ?>

                </a>

              </li>

              <li class="nav-item" title="Email">

                <a href="#" class="nav-link">

                  <i class="far fa-envelope"></i> <?php echo $respuestaAdmins["email"] ?>

                </a>

              </li>

              <li class="nav-item" title="Teléfonos">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-phone"></i> <?php echo $respuestaAdmins["telefono_fijo"] . " - " . $respuestaAdmins["telefono_movil"] ?>

                </a>

              </li>

              <li class="nav-item" title="Fecha Nacimiento">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-cake-candles"></i> <?php echo $fechaNacimiento ?>

                </a>

              </li>

              <li class="nav-item" title="Estado Civíl">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-ring"></i> <?php echo $estadoCivil ?>

                </a>

              </li>

              <li class="nav-item" title="Tipo de Régimen">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-gavel"></i> <?php echo $tipoRegimen ?>

                </a>

              </li>

              <li class="nav-item" title="Tipo de Persona">

                <a href="#" class="nav-link">

                  <i class="fa-solid fa-people-arrows"></i> <?php echo $tipoPersona ?>

                </a>

              </li>

              <li class="nav-item">

                <a href="#" class="nav-link" title="Usuario Hotel">

                  <i class="fa-solid fa-hotel"></i> <?php echo $respuestaAdmins["usuario"] ?>

                </a>

              </li>

              <li class="nav-item">
                <!-- Enviamos de parámetro al JS la variable de sesión que creamos para la ficha
                Recordemos que, $respuestaFicha["estado"] me trae el valor 1 o 0, y  $estadoFicha ya
                me trae es el texto que designamos para que vea el usuario.--> 

                <?php if ($respuestaFicha["estado"] == "1") : ?>

                  <button id="btnEstadoFicha" onclick="actualizarEstadoFicha('<?php echo $_SESSION['idGetFichaSession'] ?>' , '<?php echo $_SESSION['idGetAdminSession'] ?>' , '<?php echo $respuestaFicha['estado'] ?>');" class="btn btn-secondary btn-block btnEstadoFicha"><?php echo $estadoFicha ?></button>
                
                <?php else: ?>

                  <button id="btnEstadoFicha" onclick="actualizarEstadoFicha('<?php echo $_SESSION['idGetFichaSession'] ?>' , '<?php echo $_SESSION['idGetAdminSession'] ?>' , '<?php echo $respuestaFicha['estado'] ?>');" class="btn btn-primary btn-block btnEstadoFicha"><?php echo $estadoFicha ?></button>

                <?php endif; ?>

              </li>

            </ul>

          </div> <!-- card-body -->
        
        </div> <!-- card -->

        <!-- ============================================================================== -->
        <!-- ============================================================================== -->
        <!-- ============================================================================== -->

        <div class="card collapsed-card">

          <div class="card-header">

            <h3 class="card-title text-muted"><b>Información del Contrato</b></h3>

            <div class="card-tools">

              <button type="button" class="btn btn-tool" data-card-widget="collapse">

                <i class="fas fa-plus"></i>

              </button>

            </div>

          </div>

          <div class="card-body p-0">

            <ul class="nav nav-pills flex-column">

              <li class="nav-item" title="Código de Contrato">

                <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> <?php echo $respuestaContrato["codigo_contrato"] ?></a>

              </li>

              <li class="nav-item" title="Salario Básico">

                <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> <?php echo "$ ".$salarioBasico ?></a>

              </li>

              <li class="nav-item" title="Cuenta de Ahorros">

                <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> <?php echo $respuestaContrato["cuenta_ahorros"] ?></a>

              </li>

              <li class="nav-item" title="Porcentaje de Riesgo">

                <a class="nav-link" href="#"><i class="far fa-circle text-success"></i> <?php echo $respuestaContrato["porcentaje_riesgo"] ?></a>

              </li>

              <li class="nav-item" title="Periodo de Pago">

                <a class="nav-link" href="#"><i class="far fa-circle text-dark"></i> <?php echo $periodoPago ?></a>

              </li>

              <li class="nav-item" title="Cargo que Desempeña">

                <a class="nav-link" href="#"><i class="far fa-circle text-info"></i> <?php echo $respuestaCargo["cargo"] ?></a>

              </li>

              

            </ul>

          </div> <!-- card-body p-0 -->

        </div> <!-- card -->

      </div> <!-- col-md-2 -->

      <!-- *********************************************** -->
      <!-- ****** TODOS LOS DETALLES DE LA PLANILLA ****** -->
      <!-- *********************************************** -->
      <div class="col-md-10">

        <div class="card card-primary card-outline">

          <div class="card-header p-2">

            <ul class="nav nav-pills">

              <li class="nav-item"><a class="nav-link active" href="#tabVal1" data-toggle="tab"><i class="fa-solid fa-list"></i> Conceptos Contables</a></li>

              <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-gear"></i> General</a>

                <div class="dropdown-menu">

                  <a class="dropdown-item" href="#tabVal2-1" data-toggle="tab">Comisiones</a>

                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="#tabVal2-2" data-toggle="tab">Deducciones</a>

                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="#tabVal2-3" data-toggle="tab">Bonos Generales</a>

                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item" href="#tabVal2-4" data-toggle="tab">Otros Si</a>

                </div>

              </li>

              <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-sack-dollar"></i> Historial Pagos</a>
                
                <div class="dropdown-menu">
                  
                  <a class="dropdown-item" href="#tabVal3-1" data-toggle="tab">Prestaciones</a>
                  
                  <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item" href="#tabVal3-2" data-toggle="tab">Vacaciones</a>
                  
                </div>
                
              </li>

              <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-plus-minus"></i> Extras</a>
                
                <div class="dropdown-menu">
                  
                  <a class="dropdown-item" href="#tabVal4-1" data-toggle="tab">Retención en la Fuente</a>
                  
                  <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item" href="#tabVal4-2" data-toggle="tab">Nóminas Aplicadas</a>

                  <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item" href="#tabVal4-3" data-toggle="tab">Simular Nómina</a>
                  
                </div>
                
              </li>

            </ul>

          </div> <!-- card-header p-2 -->

          <div class="card-body">

            <div class="tab-content">

              <div class="active tab-pane" id="tabVal1">

                <!-- ======== AQUI IRÁ LA TABLA DE DETALLES DE CONCEPTOS APLICADOS PARA LA FICHA ======== -->
                <div class="card-body">

                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-success" data-toggle="modal" data-target="#agregarDetalleConceptoFicha"><i class="fa-solid fa-circle-plus"></i> Agregar Concepto a Ficha</button>
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#ListadoConceptosVer"><i class="fa-solid fa-eye"></i> Ver Conceptos</button>
                  </div>

                  <!-- ******************************* -->
                  <!-- **** CONTENIDO DE LA TABLA **** -->
                  <!-- ******************************* -->
                  <!-- A partir de la tabla tablaDetallesConcepto lo obtendré desde JS para hacer el proceso
                  de asignación y trabajar trayendo la data con una petición AJAX. -->
                  <table width="100%" class="table table-hover table-striped dt-responsive display nowrap" id="tablaDetallesConcepto">

                    <thead class="estiloTablasGeneral">
                      
                      <tr>
                        
                        <th style="width:10px">#</th>
                        <th style="width:30px">Opciones: </th>
                        <th style="width:80px">Capítulo: </th>
                        <th style="width:250px">Concepto: </th>
                        <th style="width:250px">Desc. Concepto: </th>
                        <th style="width:100px">%: </th>
                        <th style="width:200px">Estado: </th>
                        <th style="width:600px">Notas: </th>
                        <th style="width:150px">Fecha: </th>

                      </tr>

                      <tbody>

                      </tbody>

                    </thead>

                  </table>

                </div>
                <!-- ==================================================================================== -->

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal2-1">

                <p class="text-muted">Estoy en el Tab de Comisiones</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal2-2">

                <p class="text-muted">Estoy en el Tab de Deducciones</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal2-3">

                <p class="text-muted">Estoy en el Tab de Bonos Generales</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal2-4">

                <p class="text-muted">Estoy en el Tab de Otros Sí</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal3-1">

                <p class="text-muted">Estoy en el Tab de Historial de Prestaciones</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal3-2">

                <p class="text-muted">Estoy en el Tab de Vacaciones</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal4-1">

                <p class="text-muted">Estoy en el Tab de Retenciones en la Fuente</p>

              </div><!-- tab-pane -->

              <div class="tab-pane" id="tabVal4-2">

                <p class="text-muted">Estoy en el Tab de Nóminas Aplicadas</p>

              </div> <!-- tab-pane -->

              <div class="tab-pane" id="tabVal4-3">

                <p class="text-muted">Estoy en el Tab de Simulación de Nómina</p>

              </div> <!-- tab-pane -->

            </div> <!-- tab-content -->

          </div> <!-- card-body -->

        </div> <!-- card card-primary card-outline -->

      </div> <!-- col-md-9 -->

    </div> <!-- row -->

  </div> <!-- container-fluid -->

</section>

</div> <!-- /.content-wrapper -->

<?php 

/** ========== Creo variable de sesión para el admin, la ficha y el contrato para manipular de mejor manera: */
$_SESSION["idGetAdminSession"] = $respuestaContrato["id_admin"];
$_SESSION["idGetContratoSession"] = $valorFicha;
$_SESSION["idGetFichaSession"] = $respuestaFicha["id"];

?>



