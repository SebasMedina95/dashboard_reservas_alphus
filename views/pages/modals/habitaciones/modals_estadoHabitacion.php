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


<!-- ************************************************************************** -->
<!-- ******** CREAR UN TURNO DE LIMPIEZA/MANTENIMIENTO PARA HABITACIÓN ******** -->
<!-- ************************************************************************** -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="crearTurnoLimpieza">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioTurnosLimpiezaMant('adicionar');" id="formLimpiezaMantTurnos" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Adicionar Mant./Limpieza de Habitación</h5>

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

                                        <span title="(* Campo Requerido) Fecha de limpieza y/o mantenimiento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>

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

                                        <span title="(* Campo Requerido) Habitación del Hotel: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-bed"></i></span>

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

                            <!-- ********************************************************** -->
                            <!-- *************** SELECCIONE TIPO DE ATENCIÓN ************** -->
                            <!-- ********************************************************** -->
                            <div class="col-6 col-sm-12 col-md-6">

                                <div class="info-box">

                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-screwdriver-wrench"></i></span>

                                    <div class="info-box-content">

                                        <span class="info-box-text text-muted"><b>Mantenimientos e Instalaciones</b></span>
                                        
                                        <div class="form-check">
                                            
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                                            
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                
                                                Seleccionar Mantenimiento e Instalaciones
                                                
                                            </label>
                                            
                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <!-- /.info-box -->
                            </div>

                            <div class="col-6 col-sm-12 col-md-6">

                                <div class="info-box">

                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-pump-soap"></i></span>

                                    <div class="info-box-content">

                                        <span class="info-box-text text-muted"><b>Aseo General</b></span>           
                                    
                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" checked>

                                            <label class="form-check-label" for="flexRadioDefault2">

                                                Seleccionar Aseo General para Habitaciones

                                            </label>

                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <!-- /.info-box -->
                            </div>

                            <div class="col-6">

                                <div class="info-box">

                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-gear"></i></span>

                                    <div class="info-box-content">

                                        <span class="info-box-text text-muted"><b>Mantenimiento, Instalaciones y Aseo</b></span>           
                                    
                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="3">

                                            <label class="form-check-label" for="flexRadioDefault3">

                                                Seleccionar Mantenimiento, Instalaciones y Aseo

                                            </label>

                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <!-- /.info-box -->
                            </div>
                            <div class="col-6">

                                <div class="info-box">

                                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-champagne-glasses"></i></span>

                                    <div class="info-box-content">

                                        <span class="info-box-text text-muted"><b>Preparaciones Especiales</b></span>           
                                    
                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value="4">

                                            <label class="form-check-label" for="flexRadioDefault4">

                                                Seleccionar Preparaciones Especiales

                                            </label>

                                        </div>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            <!-- /.info-box -->
                            </div>

                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Encargado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <!-- Vamos a traer la data dibujada hacia el HTML, no es la manera mas eficaz,
                                    pero consideraremos aplicar ciertos filtros de limitación y de esta manera,
                                    no será un dibujado tan "violento" de información. -->
                                    <select title="(* Campo Requerido) Encargado de Aseo/Mantenimiento: " class="form-control select2bs4" id="selectEncargadoAseo" name="selectEncargadoAseo">
                                        <option value="0" selected>Seleccione un encargado para el tema: </option>
                                        <?php 

                                            $item = null;
                                            $valor = null;
                                            $empleadosHotel = ControladorEmpleados::ctrMostrarEmpleados($item , $valor);

                                            foreach ($empleadosHotel as $key2 => $value2) {
                                                
                                                echo '<option value="'.$value2["id"].'">'.$value2["documento"].' - '.$value2["primer_nombre"]. ' '.$value2["segundo_nombre"]. ' '.$value2["primer_apellido"]. ' '.$value2["segundo_apellido"].'</option>';

                                            }
                                        
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <!-- **************************************************** -->
                            <!-- ********** JORNADA DEL MANTENIMIENTO/ASEO ********** -->
                            <!-- **************************************************** -->
                            <div class="col-4">

                                <div class="input-group mb-3">
                                    
                                    <div class="input-group-prepend">
                                        
                                        <span title="(* Campo Requerido) Jornada de Trabajo:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-day"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Jornada de Trabajo:" class="custom-select" name="jornadaAseo" id="jornadaAseo" autocomplete="off">

                                        <option value="1" selected>Mañana/Parcial</option>

                                        <option value="2">Mañana/Completa</option>

                                        <option value="3">Tarde/Parcial</option>

                                        <option value="4">Tarde/Completa</option>
                                        
                                        <option value="5">Noche/Parcial</option>

                                        <option value="6">Noche/Completa</option>

                                        <option value="7">Dia General</option>

                                        <option value="8">Con Continuidad</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ************************************ -->
                            <!-- ********** HORA DE INICIO ********** -->
                            <!-- ************************************ -->
                            <div class="col-4">

                                <div class="input-group mb-3">
                                    
                                    <div class="input-group-prepend">
                                        
                                        <span title="(* Campo Requerido) Hora Inicio Jornada de Trabajo:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clock"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Hora Inicio Jornada de Trabajo:" class="custom-select" name="horaIniAseo" id="horaIniAseo" autocomplete="off">

                                        <option value="00:00am" selected>00:00am</option>

                                        <option value="01:00am">01:00am</option>

                                        <option value="02:00am">02:00am</option>

                                        <option value="03:00am">03:00am</option>

                                        <option value="04:00am">04:00am</option>

                                        <option value="05:00am">05:00am</option>

                                        <option value="06:00am">06:00am</option>

                                        <option value="07:00am">07:00am</option>

                                        <option value="08:00am">08:00am</option>

                                        <option value="09:00am">09:00am</option>

                                        <option value="10:00am">10:00am</option>

                                        <option value="11:00am">11:00am</option>

                                        <option value="12:00pm">12:00pm</option>

                                        <option value="13:00pm">13:00pm</option>

                                        <option value="14:00pm">14:00pm</option>

                                        <option value="15:00pm">15:00pm</option>

                                        <option value="16:00pm">16:00pm</option>

                                        <option value="17:00pm">17:00pm</option>

                                        <option value="18:00pm">18:00pm</option>

                                        <option value="19:00pm">19:00pm</option>

                                        <option value="20:00pm">20:00pm</option>

                                        <option value="21:00pm">21:00pm</option>

                                        <option value="22:00pm">22:00pm</option>
                                        
                                        <option value="23:00pm">23:00pm</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ********************************* -->
                            <!-- ********** HORA DE FIN ********** -->
                            <!-- ********************************* -->
                            <div class="col-4">

                                <div class="input-group mb-3">
                                    
                                    <div class="input-group-prepend">
                                        
                                        <span title="(* Campo Requerido) Hora Finalización Jornada de Trabajo:" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clock"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Hora Finalización Jornada de Trabajo:" class="custom-select" name="horaFinAseo" id="horaFinAseo" autocomplete="off">

                                        <option value="00:00am" selected>00:00am</option>

                                        <option value="01:00am">01:00am</option>

                                        <option value="02:00am">02:00am</option>

                                        <option value="03:00am">03:00am</option>

                                        <option value="04:00am">04:00am</option>

                                        <option value="05:00am">05:00am</option>

                                        <option value="06:00am">06:00am</option>

                                        <option value="07:00am">07:00am</option>

                                        <option value="08:00am">08:00am</option>

                                        <option value="09:00am">09:00am</option>

                                        <option value="10:00am">10:00am</option>

                                        <option value="11:00am">11:00am</option>

                                        <option value="12:00pm">12:00pm</option>

                                        <option value="13:00pm">13:00pm</option>

                                        <option value="14:00pm">14:00pm</option>

                                        <option value="15:00pm">15:00pm</option>

                                        <option value="16:00pm">16:00pm</option>

                                        <option value="17:00pm">17:00pm</option>

                                        <option value="18:00pm">18:00pm</option>

                                        <option value="19:00pm">19:00pm</option>

                                        <option value="20:00pm">20:00pm</option>

                                        <option value="21:00pm">21:00pm</option>

                                        <option value="22:00pm">22:00pm</option>

                                        <option value="23:00pm">23:00pm</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************************************* -->
                            <!-- **************** DESCRIPCIÓN DE MANTENIMIENTO / ASEO **************** -->
                            <!-- ********************************************************************* -->
                            <div class="col-12">

                                <!-- <div class="input-group mb-3"> -->

                                    <div class="card rounded-lg card-secondary card-outline">

                                        <div class="card-header pl-2 pl-sm-3">

                                            <h5>Descripción del Mantenimiento y/o Aseo:</h5>

                                        </div>

                                        <div id="container">
                                        
                                            <textarea class="descripcionMantAseo" id="descripcionMantAseo"></textarea>

                                        </div>

                                    </div>

                                <!-- </div> -->

                            </div>

                        </div> <!-- row -->

                        <?php 
                    
                            // $registroEmpleados = new ControladorEmpleados();
                            // $registroEmpleados -> ctrRegistroEmpleados();
                        
                        ?>

                        <!-- **************************************************************************************************** -->
                        <!-- PARA ESTE CASO, REGISTRAREMOS LOS DETALLES USANDO ASYNC AWAIT MIENTRAS MANDAMOS LA DATA SELECCIONADA
                             usando una metodología asíncrona para el tema. -->
                        <!-- **************************************************************************************************** -->

                        <div class="modal-footer">

                            <!-- <button type="button" onclick="guardarLimpiezaMant()" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar Gestión</button> -->
                            <!-- recordemos que debemos aplicar submit para recibir todo el formulario con PHP, haremos las validaciones respectivas con JS. -->
                            <button type="button" onclick="guardarMantenimientoAseo();" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar Gestión</button>

                            <button type="button" onclick="cancelarGestionarLimpiezaTurno()" class="cancelarGestionarLimpiezaTurno btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                        </div>

                    </div> <!-- container -->

                </div> <!-- modal-body -->

            </div> <!-- modal-content -->

        </form> <!-- form -->

    </div> <!-- modal-dialog -->

</div> <!-- modal-fade -->