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