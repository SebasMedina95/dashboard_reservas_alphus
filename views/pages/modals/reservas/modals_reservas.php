<!--*****************************************************************-->
<!-- /***************************************************************/
     /***** SPINNER DE CARGA PARA EDITAR EMPLEADO/ADMINISTRADOR *****/
     /***************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEditarReserva" aria-labelledby="spinnerCargaEditarReserva" aria-hidden="true">
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

<!--=======================================
MODAL Usado para la gestión de reservas
========================================-->

<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="reservasModalLabel" aria-hidden="true" id="editarReserva">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-dark">
            <h4 class="modal-title">Actualización de Reserva: <span class="small"></span></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <!-- ************************************************* -->
            <!-- ******* GENERAMOS LOS CAMPOS INFORMATIVOS ******* -->
            <!-- ************************************************* -->
            <div class="container">

                <div class="row">

                    <!-- ************************************ -->
                    <!-- ******* CÓDIGO DE LA RESERVA ******* -->
                    <!-- ************************************ -->
                    <div class="col-6">

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span title="Código de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>

                            </div>

                            <input title="Código de Reserva" type="text" class="form-control codigoReserva" name="codigoReserva" id="codigoReserva" placeholder="Código de la Reserva Cargado ..." aria-label="codigoReserva" aria-describedby="codigoReserva" readonly>

                        </div>

                    </div>

                    <!-- ************************************* -->
                    <!-- ******* QUIEN HIZO LA RESERVA ******* -->
                    <!-- ************************************* -->
                    <div class="col-6">

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span title="Código de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                            </div>

                            <input title="Código de Reserva" type="text" class="form-control nombreReservador" name="nombreReservador" id="nombreReservador" placeholder="Código de la Reserva Cargado ..." aria-label="nombreReservador" aria-describedby="nombreReservador" readonly>

                        </div>

                    </div>

                    <!-- *************************************** -->
                    <!-- *******VALOR PAGO DE LA RESERVA ******* -->
                    <!-- *************************************** -->
                    <div class="col-6">

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span title="Código de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar"></i></span>

                            </div>

                            <input title="Valor de Reserva" type="text" class="form-control valorReserva" name="valorReserva" id="valorReserva" placeholder="Código de la Reserva Cargado ..." aria-label="valorReserva" aria-describedby="valorReserva" readonly>

                        </div>

                    </div>

                    <!-- **************************************** -->
                    <!-- ******* MEDIO PAGO DE LA RESERVA ******* -->
                    <!-- **************************************** -->
                    <div class="col-3">

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span title="Código de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-credit-card"></i></span>

                            </div>

                            <input title="Medio Pago de Reserva" type="text" class="form-control medioPagoReserva" name="medioPagoReserva" id="medioPagoReserva" placeholder="Código de la Reserva Cargado ..." aria-label="medioPagoReserva" aria-describedby="medioPagoReserva" readonly>

                        </div>

                    </div>

                    <!-- **************************************** -->
                    <!-- ******* DÍAS PAGO DE LA RESERVA ******* -->
                    <!-- **************************************** -->
                    <div class="col-3">

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span title="Días de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar"></i></span>

                            </div>

                            <input title="Medio Pago de Reserva" type="text" class="form-control diasPagosReserva" name="diasPagosReserva" id="diasPagosReserva" placeholder="Días de la Reserva Cargado ..." aria-label="diasPagosReserva" aria-describedby="diasPagosReserva" readonly>

                        </div>

                    </div>

                    <!-- **************************************** -->
                    <!-- ******* DESCRIPCIÓN DE LA RESERVA ******* -->
                    <!-- **************************************** -->
                    <div class="col-12">

                        <div class="input-group mb-3">

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span title="Descripción de la reserva ..." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                            </div>

                            <textarea title="Descripción de la reserva ..." class="form-control descripcionReserva" placeholder="Aquí irá la descripción cargada de la reserva realizada ..." name="descripcionReserva" id="descripcionReserva" cols="30" rows="3" readonly></textarea>

                        </div>

                        </div>

                    </div>

                </div>

            </div>

            
            <div class="container mb-4">
                
                <h6 class="lead pt-4 pb-2 text-muted"><strong>Puede modificar las fechas</strong> de la reserva de acuerdo a los días disponibles:</h6>

                <div class="row py-2" style="background:#509CC3">

                    <div class="col-6 col-md-3 input-group pr-1">
                    
                    <input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" value=""  required>

                    <div class="input-group-append">
                        
                        <span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
                    
                    </div>

                    </div>

                    <div class="col-6 col-md-3 input-group pl-1">
                    
                    <input type="text" class="form-control datepicker salida" readonly required>

                    <div class="input-group-append">
                        
                        <span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
                    
                    </div>

                    </div>

                    <div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
                                    
                    <button onclick="verDisponibilidad()" class="btn btn-block btn-md text-white verDisponibilidad" idHabitacion style="background:black">Ver disponibilidad</button>

                    </div>

                </div>

            </div>

            <div class="bg-white p-4 calendarioReservas">

            <div class="infoDisponibilidad">
                <h5 class="pb-5 float-left alert alert-success">¡Las fechas dadas en primera instancia tienen la constancia de disponibilidad por el registro!<br><br><strong>¡Si desea actualizar proceda a cambiar y validar las fechas!</strong></h5>
            </div>

            <div class="float-right pb-3">
                
                <ul style="list-style:none">

                    <li>
                        <i class="fas fa-square-full" style="color:#847059"></i> No Disponible
                    </li>

                    <li>
                        <i class="fas fa-square-full" style="color:#eee"></i> Disponible
                    </li>

                    <li>
                        <i class="fas fa-square-full" style="color:#FFCC29"></i> Tu Reserva
                    </li>

                    <li>
                        <i class="fas fa-square-full" style="color:#9AFF29"></i> Nueva Selección
                    </li>

                </ul>

            </div>

            </div>

            <div class="clearfix"></div>

            <div class="agregarCalendario p-3"></div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

            <button onclick="guardarNuevaReserva()" type="submit" class="btn btn-primary guardarNuevaReserva" fechaIngreso fechaSalida idReserva><i class="fa-solid fa-floppy-disk"></i> Actualizar Reserva</button>

            <button type="button" onclick="cancelarReserva()" class="cancelarReserva btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

        </div>

    </div>

  </div>

</div>