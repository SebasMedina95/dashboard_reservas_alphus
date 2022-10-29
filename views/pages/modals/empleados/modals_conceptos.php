<!-- ******************************************* -->
<!-- **** CREACIÓN DE UN CONCEPTO DE NÓMINA **** -->
<!-- ******************************************* -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cargosModalLabel" aria-hidden="true" id="crearConceptoNomina">

    <div class="modal-dialog" role="document">

        <form  onsubmit="return validarFormularioCargos('adicionar');" id="formCargos" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Agregar Concepto Nómina</h5>

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

                            <!-- ************************************************* -->
                            <!-- ********** CAPITULO DE NÓMINA ASOCIADO ********** -->
                            <!-- ************************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">
                                    
                                    <div class="input-group-prepend">
                                        
                                        <span title="(* Campo Requerido) Capítulo de Nómina:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Capítulo de Nómina:" class="custom-select" name="capitulo" id="capitulo" autocomplete="off">

                                        <option value="1" selected>Salario</option>

                                        <option value="2">Deducciones</option>

                                        <option value="3">Prestaciones</option>

                                        <option value="4">Otros</option>
                                        
                                        <option value="5">Compensación Flexible</option>

                                        <option value="6">Apoyo Económico</option>

                                        <option value="7">Provisiones</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ************************************* -->
                            <!-- ******** NOMBRE DEL CONCEPTO ******** -->
                            <!-- ************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Nombre Concepto de Nómina:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-swatchbook"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Nombre Concepto de Nómina:" type="text" class="form-control" name="concepto" id="concepto" placeholder="Nombre del Concepto ..." aria-label="concepto" aria-describedby="concepto" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ****************************************** -->
                            <!-- ******** DESCRIPCIÓN DEL CONCEPTO ******** -->
                            <!-- ****************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Descripción Breve de Concepto Nómina:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-align-justify"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Descripción Breve de Concepto Nómina:" type="text" class="form-control" name="descripcion_concepto" id="descripcion_concepto" placeholder="Definición Breve de Descripción ..." aria-label="concepto" aria-describedby="concepto" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ***************************************** -->
                            <!-- ******** PORCENTAJE DEL CONCEPTO ******** -->
                            <!-- ***************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) % Porcentaje Concepto:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-percent"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) % Porcentaje Concepto:" type="text" class="form-control" name="porcentaje_concepto" id="porcentaje_concepto" placeholder="Porcentaje del Concepto (Ejemplo: 0.85) ..." aria-label="concepto" aria-describedby="concepto" autocomplete="off" required>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        // $registroCargo = new ControladorCargos();
                        // $registroCargo -> ctrRegistroCargo();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Concepto</button>

                    <button type="button" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->


        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog -->

</div> <!-- Cierra Modal Fade -->