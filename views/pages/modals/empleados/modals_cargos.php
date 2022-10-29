<!--*****************************************************************-->
<!--*****************************************************************-->
<!-- /***************************************************************/
     /***** SPINNER DE CARGA PARA EDITAR EMPLEADO/ADMINISTRADOR *****/
     /***************************************************************/ -->
     <div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEditarCargo" aria-labelledby="spinnerCargaEditarCargo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="d-flex align-items-center">
            <h3 class="font-weight-bold text-white">Cargando Información ...</h3>
            <div class="spinner-border text-warning m-5 ml-auto" style="width: 8rem; height: 8rem;" role="status">

            </div>
        </div>
    </div>
</div>
<!--*****************************************************************-->
<!--*****************************************************************-->

<!-- ************************************************ -->
<!-- **** CREACIÓN DE UN CARGO LABORAL DEL HOTEL **** -->
<!-- ************************************************ -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cargosModalLabel" aria-hidden="true" id="crearCargoEmpleado">

    <div class="modal-dialog" role="document">

        <form  onsubmit="return validarFormularioCargos('adicionar');" id="formCargos" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Agregar Cargo Empleado</h5>

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

                            <!-- ********************************** -->
                            <!-- ******** NOMBRE DEL CARGO ******** -->
                            <!-- ********************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Nombre del Cargo: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-font-awesome"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Nombre del Cargo: " type="text" class="form-control" name="cargo" id="cargo" placeholder="Nombre del Cargo ..." aria-label="cargo" aria-describedby="cargo" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************* -->
                            <!-- ******** ALIAS DEL CARGO ******** -->
                            <!-- ********************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Alias asociado al cargo: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tape"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Alias asociado al cargo: " type="text" class="form-control" name="alias" id="alias" placeholder="Alias del Cargo ..." aria-label="alias" aria-describedby="alias" autocomplete="off" required>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        $registroCargo = new ControladorCargos();
                        $registroCargo -> ctrRegistroCargo();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Cargo</button>

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

<!-- ************************************************ -->
<!-- **** EDICIÓN DE UN CARGO LABORAL DEL HOTEL **** -->
<!-- ************************************************ -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cargosModalLabel" aria-hidden="true" id="editarCargo">

    <div class="modal-dialog" role="document">

        <form  onsubmit="return validarFormularioCargos('editar');" id="formCargosEdit" method="POST">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Actualizar Cargo Empleado</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <!-- ********************************************************************** -->
                    <!-- *** INPUT INDEPENDIENTE DEL ID DEL ADMIN QUE TOMAREMOS PARA EDITAR *** -->
                    <!-- ********************************************************************** -->
                    <input type="hidden" name="editarIdCargos" id="editarIdCargos">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ********************************** -->
                            <!-- ******** NOMBRE DEL CARGO ******** -->
                            <!-- ********************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Nombre del Cargo: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-font-awesome"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Nombre del Cargo: " type="text" class="form-control" name="editarCargoEmp" id="editarCargoEmp" placeholder="Nombre del Cargo ..." aria-label="cargo" aria-describedby="cargo" value="" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************* -->
                            <!-- ******** ALIAS DEL CARGO ******** -->
                            <!-- ********************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Alias asociado al cargo: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tape"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Alias asociado al cargo: " type="text" class="form-control" name="editarAlias" id="editarAlias" placeholder="Alias del Cargo ..." aria-label="alias" aria-describedby="alias" value="" autocomplete="off" required>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        $actualizarCargo = new ControladorCargos();
                        $actualizarCargo -> ctrActualizarCargo();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="text-white btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Actualizar Cargo</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->

        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog -->

</div> <!-- Cierra Modal Fade -->