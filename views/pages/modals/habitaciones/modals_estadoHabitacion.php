<!--***********************************************************************-->
<!--***********************************************************************-->
<!-- /*********************************************************************/
     /***** SPINNER DE CARGA PARA GESTIONAR COMODIDADES DE CATEGORÍAS *****/
     /*********************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEstadosHabitacion" aria-labelledby="spinnerCargaEstadosHabitacion" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="d-flex align-items-center">
            <h3 class="font-weight-bold text-white">Cargando Información ...</h3>
            <div class="spinner-border text-warning m-5 ml-auto" style="width: 8rem; height: 8rem;" role="status">

            </div>
        </div>
    </div>
</div>

<!-- ************************************************************ -->
<!-- **** GESTIÓN DE COMODIDAD DE LA CATEGORÍA DE HABITACIÓN **** -->
<!-- ************************************************************ -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="gestionarLimpiezaTurnos">

    <div class="modal-dialog modal-xl" role="document">

        <form  onsubmit="return validarFormularioTurnosLimpieza('gestionarLimpiezaTurno');" id="formLimpiezaTurnos" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Gestionar Turnos de Limpieza Habitación</h5>

                    <button type="button" onclick="cancelarLimpiezaTurnos()" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            

                        </div> <!-- row -->

                        <!-- **************************************************************************************************** -->
                        <!-- PARA ESTE CASO, REGISTRAREMOS LOS DETALLES USANDO ASYNC AWAIT MIENTRAS MANDAMOS LA DATA SELECCIONADA
                             usando una metodología asíncrona para el tema. -->
                        <!-- **************************************************************************************************** -->

                        <div class="modal-footer">

                            <button type="button" onclick="guardarLimpieza()" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar Limpieza</button>

                            <button type="button" onclick="cancelarGestionarLimpiezaTurno()" class="cancelarGestionarLimpiezaTurno btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                        </div>

                    </div> <!-- container -->

                </div> <!-- modal-body -->

            </div> <!-- modal-content -->

        </form> <!-- form -->

    </div> <!-- modal-dialog -->

</div> <!-- modal-fade -->


<!-- ************************************************************ -->
<!-- ******** CREAR UN TURNO DE LIMPIEZA PARA HABITACIÓN ******** -->
<!-- ************************************************************ -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="crearTurnoLimpieza">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioTurnosLimpieza('crearTurnoLimpiezaS');" id="formLimpiezaTurnos" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Adicionar Turnos de Limpieza Habitación</h5>

                    <button type="button" onclick="cancelarLimpiezaTurnos()" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ************************************************* -->
                            <!-- *********** FECHA REALIZACIÓN DEL ASEO ********** -->
                            <!-- ************************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Fecha de Nacimiento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Fecha de Limpieza: " type="date" class="form-control fecha_limpieza" name="fecha_limpieza" id="fecha_limpieza" placeholder="Fecha de Limpieza ..." aria-label="fecha_limpieza" aria-describedby="fecha_limpieza" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ***************************************** -->
                            <!-- *************** HABITACIÓN ************** -->
                            <!-- ***************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Habitación del Hotel: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-list"></i></span>

                                    </div>

                                    <!-- Vamos a traer la data dibujada hacia el HTML, no es la manera mas eficaz,
                                    pero consideraremos aplicar ciertos filtros de limitación y de esta manera,
                                    no será un dibujado tan "violento" de información. -->
                                    <select title="(* Campo Requerido) Habitación del Hotel: " class="form-control select2bs4" id="selectHabitacAseo" name="selectHabitacAseo">
                                        <option value="0" selected>Seleccione una habitación de la lista: </option>
                                        <?php 

                                            $valor = null;
                                            $habitacionHotel = ControladorHabitaciones::ctrMostrarHabitaciones($valor);

                                            foreach ($habitacionHotel as $key => $value1) {
                                                
                                                echo '<option value="'.$value1["id_h"].'">'.$value1["tipo"].' - '.$value1["estilo"].'</option>';

                                            }
                                        
                                        ?>
                                    </select>

                                </div>

                            </div>

                        </div> <!-- row -->

                        <!-- **************************************************************************************************** -->
                        <!-- PARA ESTE CASO, REGISTRAREMOS LOS DETALLES USANDO ASYNC AWAIT MIENTRAS MANDAMOS LA DATA SELECCIONADA
                             usando una metodología asíncrona para el tema. -->
                        <!-- **************************************************************************************************** -->

                        <div class="modal-footer">

                            <button type="button" onclick="guardarLimpieza()" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar Turno Limpieza</button>

                            <button type="button" onclick="cancelarGestionarLimpiezaTurno()" class="cancelarGestionarLimpiezaTurno btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                        </div>

                    </div> <!-- container -->

                </div> <!-- modal-body -->

            </div> <!-- modal-content -->

        </form> <!-- form -->

    </div> <!-- modal-dialog -->

</div> <!-- modal-fade -->