<!--*****************************************************************************-->
<!--*****************************************************************************-->
<!-- /***************************************************************************/
     /***** SPINNER DE CARGA PARA GESTIONAR CONTRATO EMPLEADO/ADMINISTRADOR *****/
     /***************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaGestionContrato" aria-labelledby="spinnerCargaGestionContrato" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="d-flex align-items-center">
            <h3 class="font-weight-bold text-white">Cargando Información ...</h3>
            <div class="spinner-border text-warning m-5 ml-auto" style="width: 8rem; height: 8rem;" role="status">

            </div>
        </div>
    </div>
</div>
<!--*****************************************************************************-->
<!--*****************************************************************************-->

<!-- **************************************************** -->
<!-- **** CREACIÓN DE UN CONTRATO DE ADMIN DEL HOTEL **** -->
<!-- **************************************************** -->
<div class="modal fade" tabindex="-1" role="dialog" id="crearContratoEmpleado">

    <div class="modal-dialog" role="document">

        <form  onsubmit="return validarFormularioContratosAdmins('adicionar');" id="formContratosAdmins" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Agregar Contrato</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ************************************* -->
                            <!-- ******** SELECCIONE EL ADMIN ******** -->
                            <!-- ************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Administrador/Empleado asociado al contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-list"></i></span>

                                    </div>

                                    <!-- Vamos a traer la data dibujada hacia el HTML, no es la manera mas eficaz,
                                    pero consideraremos aplicar ciertos filtros de limitación y de esta manera,
                                    no será un dibujado tan "violento" de información. -->
                                    <select title="(* Campo Requerido) Administrador/Empleado asociado al contrato: " class="form-control select2bs4" id="selectAdminEmp" name="selectAdminEmp">
                                        <option value="0" selected>Seleccione un empleado de la lista: </option>
                                        <?php 

                                            $empleadoContrato = ControladorEmpleados::ctrMostrarEmpleadosParaContrato();

                                            foreach ($empleadoContrato as $key => $value1) {
                                                
                                                echo '<option value="'.$value1["id"].'">'.$value1["documento"].' - '.$value1["primer_nombre"].' '.$value1["segundo_nombre"].' '.$value1["primer_apellido"].' '.$value1["segundo_apellido"].'</option>';

                                            }
                                        
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <hr>

                            <!-- ***************************************************** -->
                            <!-- ********** CÓDIGO DE CONTRATO AUTOGENERADO ********** -->
                            <!-- ***************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Código autogenerado del contrato: " class="input-group-text" id="basic-addon1"><i class="fa-regular fa-id-card"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Código autogenerado del contrato: " type="text" readonly class="form-control" name="codigoContrato" id="codigoContrato" placeholder="Código de Contrato Autogenerado ..." aria-label="codigoContrato" aria-describedby="codigoContrato" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** SALARIO BÁSICO CONTRATO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Salario Básico del Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Salario Básico del Contrato: " onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" type="text" class="form-control" name="salarioBasico" id="salarioBasico" placeholder="Salario Básico ..." aria-label="salarioBasico" aria-describedby="salarioBasico" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** CUENTA AHORROS BANCOLOMBIA ********** -->
                            <!-- ************************************************ -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Cuenta de Ahorros: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-building-columns"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Cuenta de Ahorros: " type="number" class="form-control" name="cuentaAhorros" id="cuentaAhorros" placeholder="Cuenta Ahorros ..." aria-label="cuentaAhorros" aria-describedby="cuentaAhorros" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- ********** PORCENTAJE RIESGO ********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Porcentaje de Riesgo asociado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-percent"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Porcentaje de Riesgo asociado: " type="text" class="form-control" name="porcentajeRiesgo" id="porcentajeRiesgo" placeholder="% Riesgo ..." aria-label="porcentajeRiesgo" aria-describedby="porcentajeRiesgo" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- *********** PERIODO DE PAGO *********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Periodo de Pago del Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-week"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Periodo de Pago del Contrato: " class="custom-select" name="periodoPago" id="periodoPago" autocomplete="off">
                                    
                                        <option value="1" selected>Mensual</option>

                                        <option value="2">Quincenal</option>

                                    </select>

                                </div>

                            </div>

                            <!-- **************************************** -->
                            <!-- *********** TIPO DE CONTRATO *********** -->
                            <!-- **************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-folder-tree"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Contrato: " class="custom-select" name="tipoContrato" id="tipoContrato" autocomplete="off">
                                    
                                        <option value="1" selected>Término Fijo</option>

                                        <option value="2">Término Indefinido</option>

                                        <option value="3">Obra o Labor</option>

                                        <option value="4">Aprendizaje Productivo</option>

                                        <option value="5">Ocasional Trabajo</option>

                                        <option value="6">Aprendizaje Lectivo</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- *********** INICIO DEL CONTRATO *********** -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Fecha Inicio del Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-regular fa-calendar-days"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Fecha Inicio del Contrato: " type="date" class="form-control" name="inicioContrato" id="inicioContrato" placeholder="Fecha Inicio Contrato ..." aria-label="inicioContrato" aria-describedby="inicioContrato" value="<?php echo date("Y-m-d");?>" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- **************************************** -->
                            <!-- *********** FIN DEL CONTRATO *********** -->
                            <!-- **************************************** -->
                            <div class="col-6" id="divFinContrato">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span id="finContrato" title="(* Campo Requerido) Fecha Fin del Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-regular fa-calendar-days"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Fecha Fin del Contrato: " type="date" class="form-control" name="finContrato" id="finContrato" placeholder="Fecha Fin Contrato ..." aria-label="finContrato" aria-describedby="finContrato" value="<?php echo date("Y-m-d");?>" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ************************************* -->
                            <!-- ******** SELECCIONE EL CARGO ******** -->
                            <!-- ************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Cargo a Desempeñar: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-list"></i></span>

                                    </div>

                                    <!-- Vamos a traer la data dibujada hacia el HTML, no es la manera mas eficaz,
                                    pero consideraremos aplicar ciertos filtros de limitación y de esta manera,
                                    no será un dibujado tan "violento" de información. -->
                                    <select title="(* Campo Requerido) Cargo a Desempeñar: " class="form-control select2bs4" id="selectCargos" name="selectCargos">
                                        
                                        <?php 

                                            $cargos = ControladorCargos::ctrMostrarCargosLimit();

                                            foreach ($cargos as $key => $value) {
                                                
                                                echo '<option value="'.$value["id"].'">'.$value["cargo"].' - '.$value["alias"].'</option>';

                                            }
                                        
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DE CONTTRATO ********** -->
                            <!-- ********************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Anotaciones adicionales referentes al contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(Opcional) Anotaciones adicionales referentes al contrato: " class="form-control" placeholder="Agregue en este apartado si es necesario observaciones adicionales respecto a este contrato que realiza para el administrador/empleado ..." name="anotaciones_contrato" id="anotaciones_contrato" cols="30" rows="10"></textarea>

                                </div>

                            </div>       

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        $registroContratoEmpl = new ControladorContratoEmpleados();
                        $registroContratoEmpl -> ctrRegistroContrato();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Generar Contrato</button>

                    <button type="button" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->


        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog -->

</div> <!-- Cierra Modal Fade -->

<!-- --------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------- -->

<!-- **************************************************** -->
<!-- **** ACTUALIZACIÓN DE UN CONTRATO DE ADMIN DEL HOTEL **** -->
<!-- **************************************************** -->
<div class="modal fade" tabindex="-1" role="dialog" id="actualizarContratoEmpleado">

    <div class="modal-dialog" role="document">

        <form  onsubmit="return validarFormularioContratosAdmins('editar');" id="formContratosAdminsEdit" method="POST">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Actualizar Contrato</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <!-- ********************************************************************** -->
                    <!-- *** INPUT INDEPENDIENTE DEL ID DEL ADMIN QUE TOMAREMOS PARA EDITAR *** -->
                    <!-- ********************************************************************** -->
                    <input type="hidden" name="editarIdContratosAdmin">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ********************************************************** -->
                            <!-- ********** INFORMACIÓN NO EDITABLE DEL CONTRATO ********** -->
                            <!-- ********************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <span title="Contrato Generado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-contract"></i></span>

                                    </div>

                                    <input title="Contrato Generado: " class="form-control" name="editarCodigoContrato" id="editarCodigoContrato" disabled>

                                </div>
                                
                            </div>

                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <span title="Número de Documento: " class="input-group-text" id="basic-addon1"><i class="fa-regular fa-id-card"></i></span>

                                    </div>

                                    <input title="Número de Documento: " class="form-control" name="editarDocumentoEmpleadoContrato" id="editarDocumentoEmpleadoContrato" disabled>

                                </div>
                                
                            </div>

                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <span title="Nombre del Empleado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="Nombre del Empleado: " class="form-control" name="editarNombreEmpleadoContrato" id="editarNombreEmpleadoContrato" disabled>

                                </div>
                                
                            </div>

                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <span title="Salario Básico: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-sack-dollar"></i></span>

                                    </div>

                                    <input title="Salario Básico: " class="form-control" name="editarSalarioBasicoContrato" id="editarSalarioBasicoContrato" disabled>

                                </div>
                                
                            </div>

                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <span title="Inicio de Contratación: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>

                                    </div>

                                    <input title="Inicio de Contratación: " class="form-control" name="editarFechaInicioContrato" id="editarFechaInicioContrato" disabled>

                                </div>
                                
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** CUENTA AHORROS BANCOLOMBIA ********** -->
                            <!-- ************************************************ -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Cuenta de Ahorros: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-building-columns"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Cuenta de Ahorros: " type="number" class="form-control" name="editarCuentaAhorros" id="editarCuentaAhorros" placeholder="Cuenta Ahorros ..." aria-label="cuentaAhorros" aria-describedby="cuentaAhorros" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- ********** PORCENTAJE RIESGO ********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Porcentaje de Riesgo asociado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-percent"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Porcentaje de Riesgo asociado: " type="text" class="form-control" name="editarPorcentajeRiesgo" id="editarPorcentajeRiesgo" placeholder="% Riesgo ..." aria-label="porcentajeRiesgo" aria-describedby="porcentajeRiesgo" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- *********** PERIODO DE PAGO *********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Periodo de Pago del Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-week"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Periodo de Pago del Contrato: " class="custom-select" name="editarPeriodoPago" id="editarPeriodoPago" autocomplete="off">

                                        <option value="" class="editarPeriodoPagoOption"></option>
                                    
                                        <option value="1" selected>Mensual</option>

                                        <option value="2">Quincenal</option>

                                    </select>

                                </div>

                            </div>

                            <!-- **************************************** -->
                            <!-- *********** TIPO DE CONTRATO *********** -->
                            <!-- **************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-folder-tree"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Contrato: " class="custom-select" name="editarTipoContrato" id="editarTipoContrato" autocomplete="off">
                                    
                                        <option value="" class="editarTipoContratoOption"></option>
                                    
                                        <option value="1">Término Fijo</option>

                                        <option value="2">Término Indefinido</option>

                                        <option value="3">Obra o Labor</option>

                                        <option value="4">Aprendizaje Productivo</option>

                                        <option value="5">Ocasional Trabajo</option>

                                        <option value="6">Aprendizaje Lectivo</option>

                                    </select>

                                </div>

                            </div>

                            <!-- **************************************** -->
                            <!-- *********** FIN DEL CONTRATO *********** -->
                            <!-- **************************************** -->
                            <div class="col-6 divEditarFinContrato" id="divEditarFinContrato">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span id="" title="(* Campo Requerido) Fecha Fin del Contrato: " class="input-group-text" id="basic-addon1"><i class="fa-regular fa-calendar-days"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Fecha Fin del Contrato: " type="date" class="form-control" name="editarFinContrato" id="editarFinContrato" placeholder="Fecha Fin Contrato ..." aria-label="editarFinContrato" aria-describedby="editarFinContrato" autocomplete="off" required>

                                </div>

                            </div>


                            <!-- ************************************* -->
                            <!-- ******** SELECCIONE EL CARGO ******** -->
                            <!-- ************************************* -->
                            <div align="center" class="col-12">
                                <input type="hidden" name="actualEditarSelectCargosId" id="actualEditarSelectCargosId">
                                <span class="text-muted"><b>Actualmente: </b> <span class="actualEditarSelectCargos"> </span></span>
                                <br>
                                <div class="custom-control custom-switch">
                                    <!-- <span class="text-muted"><b>¿Desea Actualizar el Cargo?</b></span> -->
                                    <input type="checkbox" class="custom-control-input" id="deseaActualizarCargo" name="deseaActualizarCargo">
                                    <input type="hidden" name="valDeseaActualizarCargo" id="valDeseaActualizarCargo" value="N">
                                    <label class="custom-control-label" for="deseaActualizarCargo"><span class="text-muted">¿Desea Actualizar el Cargo?</span></label>
                                </div>

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Cargo a Desempeñar: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-list"></i></span>

                                    </div>


                                    <!-- Vamos a traer la data dibujada hacia el HTML, no es la manera mas eficaz,
                                    pero consideraremos aplicar ciertos filtros de limitación y de esta manera,
                                    no será un dibujado tan "violento" de información. -->
                                    <select title="(* Campo Requerido) Cargo a Desempeñar: " class="form-control select2bs4" id="editarSelectCargos" name="editarSelectCargos" disabled="true">
                                        <option value="0" selected>Seleccione un admin/empleado para Actualizar: </option>
                                        <?php 

                                            $cargos = ControladorCargos::ctrMostrarCargosLimit();

                                            foreach ($cargos as $key => $value) {

                                                echo '<option value="'.$value["id"].'">'.$value["cargo"].' - '.$value["alias"].'</option>';

                                            }
                                        
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DE CONTTRATO ********** -->
                            <!-- ********************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Anotaciones adicionales referentes al contrato: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(Opcional) Anotaciones adicionales referentes al contrato: " class="form-control" placeholder="Agregue en este apartado si es necesario observaciones adicionales respecto a este contrato que realiza para el administrador/empleado ..." name="editarAnotaciones_contrato" id="editarAnotaciones_contrato" cols="30" rows="10"></textarea>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        $editarContratoEmpl = new ControladorContratoEmpleados();
                        $editarContratoEmpl -> ctrActualizarContrato();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i> Actualizar Contrato</button>

                    <button type="button" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->

        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog -->

</div> <!-- Cierra Modal Fade -->