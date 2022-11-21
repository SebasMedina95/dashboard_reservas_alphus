<!--*****************************************************************-->
<!--*****************************************************************-->
<!-- /***************************************************************/
     /***** SPINNER DE CARGA PARA EDITAR PLANES *****/
     /***************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEditarPlanes" aria-labelledby="spinnerCargaEditarPlanes" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="d-flex align-items-center">
            <h3 class="font-weight-bold text-white">Cargando Información ...</h3>
            <div class="spinner-border text-warning m-5 ml-auto" style="width: 8rem; height: 8rem;" role="status">

            </div>
        </div>
    </div>
</div>

<!--*******************************************************-->
<!-- *********** MODAL PARA CREAR UN NUEVO PLAN *********** -->
<!--*******************************************************-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="planesModalLabel" aria-hidden="true" id="crearPlan">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form onsubmit="return validarFormularioPlan('adicionar');" method="post" enctype="multipart/form-data">

                <!-- Modal Header -->
                <div class="modal-header bg-dark">

                    <h4 class="modal-title">Agregar un Plan</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ************************************************ -->
                            <!-- ********** NOMBRE DEL PLAN DE RESERVA ********** -->
                            <!-- ************************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Plan de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-umbrella-beach"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Plan de Reserva" type="text" class="form-control tipoPlan" name="tipoPlan" id="tipoPlan" placeholder="Plan de Reserva ..." aria-label="plan" aria-describedby="plan" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** PRECIO TEMPORADA ALTA ********** -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Precio Temporada Alta" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-sack-dollar"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Precio Temporada Alta" type="text" class="form-control precio_alta" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="precio_alta" id="precio_alta" placeholder="$ Temporada Alta ..." aria-label="plan" aria-describedby="plan" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** PRECIO TEMPORADA BAJA ********** -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Precio Temporada Baja" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-sack-dollar"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Precio Temporada Baja" type="text" class="form-control precio_baja" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="precio_baja" id="precio_baja" placeholder="$ Temporada Baja ..." aria-label="baja" aria-describedby="baja" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************************** -->
                            <!-- ********** MINI ANOTACIÓN DE DESCRIPCIÓN ********** -->
                            <!-- *************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Descripción minificada del plan: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(* Campo Requerido) Descripción minificada del plan: " class="form-control min_descripcion" placeholder="Agregue en este apartado si es necesario una muy breve descripción ..." name="min_descripcion" id="min_descripcion" cols="30" rows="3"></textarea>

                                </div>

                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <!-- ****************************************** -->
                            <!-- ********** FOTOGRAFÍA PARA PLAN ********** -->
                            <!-- ****************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="custom-file">

                                        <input title="(Opcional) Fotografía del Plan: " type="file" class="custom-file-input" name="fotoPlan" id="fotoPlan">

                                        <label title="(Opcional) Fotografía del Plan: " class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Plan</label>

                                    </div>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaAddPlan text-muted">Aún no se ha cargado ninguna imágen ... </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPreviaPlanes" id="imagenPreviaPlanes">

                                <img src="views/img/planes/default/default.png" alt="" id="img-foto-planes" class="img-fluid imagenPlanes">
                                <hr>
                                <p class="mb-1"> <b>Nombre de la imágen: </b> <span id="nombreImagenPlanes"></span></p>
                                <p class="mb-1 lineaPImgPlan"><b>Tamaño de la imágen: </b> <span id="tamanoImagenPlanes"></span></p>
                                <p class="mb-1 lineaPImgPlan"><b>Tipo de la imágen:   </b> <span id="extensImagenPlanes"></span></p>

                            </div>

                        </div>

                    </div>

                    <?php 
                    
                        $registroPlanes = new ControladorPlanes();
                        $registroPlanes -> ctrRegistroPlanes();
                    
                    ?> 

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Plan</button>

                    <button type="button" onclick="cancelarPlanes()" class="cancelarPlanes btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </form>

        </div>

    </div>

</div>

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

<!--*******************************************************-->
<!-- *********** MODAL PARA ACTUALIZAR UN PLAN ************ -->
<!--*******************************************************-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="planesModalLabel" aria-hidden="true" id="editarPlan">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form onsubmit="return validarFormularioPlan('editar');" method="post" enctype="multipart/form-data">

                <!-- Modal Header -->
                <div class="modal-header bg-dark">

                    <h4 class="modal-title">Actualizar un Plan</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <!-- ********************************************************************** -->
                        <!-- *** INPUT INDEPENDIENTE DEL ID DEL PLAN QUE TOMAREMOS PARA EDITAR *** -->
                        <!-- ********************************************************************** -->
                        <input type="hidden" name="editarIdPlan" id="editarIdPlan">

                        <div class="row">

                            <!-- ************************************************ -->
                            <!-- ********** NOMBRE DEL PLAN DE RESERVA ********** -->
                            <!-- ************************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Plan de Reserva" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-umbrella-beach"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Plan de Reserva" type="text" class="form-control tipoPlan" name="editarTipoPlan" id="editarTipoPlan" placeholder="Plan de Reserva ..." aria-label="plan" aria-describedby="plan" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** PRECIO TEMPORADA ALTA ********** -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Precio Temporada Alta" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-sack-dollar"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Precio Temporada Alta" type="text" class="form-control precio_alta" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="editarPrecio_alta" id="editarPrecio_alta" placeholder="$ Temporada Alta ..." aria-label="plan" aria-describedby="plan" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** PRECIO TEMPORADA BAJA ********** -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Precio Temporada Baja" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-sack-dollar"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Precio Temporada Baja" type="text" class="form-control precio_baja" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="editarPrecio_baja" id="editarPrecio_baja" placeholder="$ Temporada Baja ..." aria-label="baja" aria-describedby="baja" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************************** -->
                            <!-- ********** MINI ANOTACIÓN DE DESCRIPCIÓN ********** -->
                            <!-- *************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Descripción minificada del plan: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(* Campo Requerido) Descripción minificada del plan: " class="form-control min_descripcion" placeholder="Agregue en este apartado si es necesario una muy breve descripción ..." name="editarMin_descripcion" id="editarMin_descripcion" cols="30" rows="3"></textarea>

                                </div>

                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <!-- ****************************************** -->
                            <!-- ********** FOTOGRAFÍA PARA PLAN ********** -->
                            <!-- ****************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="custom-file">

                                        <input title="(Opcional) Fotografía del Plan" type="hidden" class="imgFotoPlanActual form-control" name="imgFotoPlanActual">

                                        <input title="(Opcional) Fotografía del Plan" type="file" class="custom-file-input" name="editarFotoPlan" id="editarFotoPlan">

                                        <label title="(Opcional) Fotografía del Plan" class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Plan</label>

                                    </div>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaEdiPlan text-muted"> </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPreviaPlanes" id="imagenPreviaPlanes">

                                <img src="views/img/planes/default/default.png" alt="" id="img-foto-edit-plan" class="img-fluid imagenPlan">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="editarNombreImagenPlan"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="editarTamanoImagenPlan"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="editarExtensImagenPlan"></span></p>

                            </div>

                        </div>

                    </div>

                    <?php 
                    
                        $editarPlanes = new ControladorPlanes();
                        $editarPlanes -> ctrEditarPlanes();
                    
                    ?>                    

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i> Actualizar Plan</button>

                    <button type="button" onclick="cancelarPlanes()" class="cancelarPlanes btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </form>

        </div>

    </div>

</div>