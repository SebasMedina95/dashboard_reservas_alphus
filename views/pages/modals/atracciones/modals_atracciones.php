<!--*****************************************************************-->
<!--*****************************************************************-->
<!-- /***************************************************************/
     /***** SPINNER DE CARGA PARA EDITAR RECORRIDOS/ATRACCIONES *****/
     /***************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEditarAtracciones" aria-labelledby="spinnerCargaEditarAtracciones" aria-hidden="true">
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

<!-- *********************************************** -->
<!-- ***** CREACIÓN DE UNA ATRACCIÓN DEL HOTEL ***** -->
<!-- *********************************************** -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AtraccionesModalLabel" aria-hidden="true" id="crearAtraccion">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioAtracciones('adicionar');" id="formAtracciones" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Agregar Atracción / Recorrido</h5>

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


                            <!-- ************************************ -->
                            <!-- ******* TÍTULO DEL RECORRIDO ******* -->
                            <!-- ************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Título de la Atracción" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Título de la Atracción" type="text" class="form-control documento" name="titulo" id="titulo" placeholder="Título de la atracción ..." aria-label="titulo" aria-describedby="titulo" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *********************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DEl RECORRIDO ********** -->
                            <!-- *********************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Descripción adicional de la atracción: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(* Campo Requerido) Descripción adicional de la atracción: " class="form-control descripcion" placeholder="Agregue en este apartado la descripción de la atracción ..." name="descripcion" id="descripcion" cols="30" rows="3" required></textarea>

                                </div>

                            </div>

                            <!-- ************************************ -->
                            <!-- ********** IMAGEN PEQUEÑA ********** -->
                            <!-- ************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="custom-file">

                                        <input title="(* Campo Requerido) Fotografía pequeña de la atracción: " type="file" class="custom-file-input" name="fotoPeqAtraccion" id="fotoPeqAtraccion">

                                        <label title="(* Campo Requerido) Fotografía pequeña de la atracción: " class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Pequeña</label>

                                    </div>

                                </div>

                            </div>

                            <!-- ******************************************************** -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN PEQUEÑA ********** -->
                            <!-- ******************************************************** -->
                            <div align="center" class="col-12 text-center">
                                <div class="input-group mb-3">
                                    <span class="nombreImagenPeqCargadaAdd text-muted">Aún no se ha cargado ninguna imágen ... </span>
                                </div>
                            </div>
                            <div style="text-align: center; width: 100%;" class="imagenPeqPrevia" id="imagenPeqPrevia">

                                <img src="views/img/recorrido/default/default.png" alt="" id="img-foto-peq" class="img-fluid imagenAdmins">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="nombreImagenAtraccionPeq"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="tamanoImagenAtraccionPeq"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="extensImagenAtraccionPeq"></span></p>

                            </div>

                            <hr>

                            <!-- ************************************ -->
                            <!-- ********** IMAGEN GRANDE ********** -->
                            <!-- ************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="custom-file">

                                        <input title="(* Campo Requerido) Fotografía grande de la atracción: " type="file" class="custom-file-input" name="fotoGraAtraccion" id="fotoGraAtraccion">

                                        <label title="(* Campo Requerido) Fotografía grande de la atracción: " class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Grande</label>

                                    </div>

                                </div>

                            </div>

                            <!-- ******************************************************** -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN GRANDE ********** -->
                            <!-- ******************************************************** -->
                            <div align="center" class="col-12 text-center">
                                <div class="input-group mb-3">
                                    <span class="nombreImagenGraCargadaAdd text-muted">Aún no se ha cargado ninguna imágen ... </span>
                                </div>
                            </div>
                            <div style="text-align: center; width: 100%;" class="imagenGraPrevia" id="imagenGraPrevia">

                                <img src="views/img/recorrido/default/default.png" alt="" id="img-foto-gra" class="img-fluid imagenAdmins">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="nombreImagenAtraccionGra"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="tamanoImagenAtraccionGra"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="extensImagenAtraccionGra"></span></p>

                            </div>

                        </div>

                    </div>

                    <?php 
                    
                        $registroAtracciones = new ControladorRecorrido();
                        $registroAtracciones -> ctrRegistroRecorrido();
                    
                    ?>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Atracción</button>

                    <button type="button" onclick="cancelarAdmins()" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div>

        </form>

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

<!-- ***************************************************** -->
<!-- ***** EDICIÓN DE RECORRIDO / ATRACCIÓN DEL HOTEL **** -->
<!-- ***************************************************** -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="editarAtraccion">

    <div class="modal-dialog modal-lg" role="document">

        <form onsubmit="return validarFormularioAtracciones('editar');" id="formAtraccionesEdit" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Actualizar Atracción / Recorrido</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <!-- ************************************************************************** -->
                    <!-- *** INPUT INDEPENDIENTE DEL ID DEL RECORRIDO QUE TOMAREMOS PARA EDITAR *** -->
                    <!-- ************************************************************************** -->
                    <input type="hidden" name="editarRecorridoId" id="editarRecorridoId">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ************************************ -->
                            <!-- ******* TÍTULO DEL RECORRIDO ******* -->
                            <!-- ************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Título de la Atracción" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Título de la Atracción" type="text" class="form-control editarTitulo" name="editarTitulo" id="editarTitulo" placeholder="Título de la atracción ..." aria-label="editarTitulo" aria-describedby="editarTitulo" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *********************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DEl RECORRIDO ********** -->
                            <!-- *********************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Descripción adicional de la atracción: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(* Campo Requerido) Descripción adicional de la atracción: " class="form-control editarDescripcion" placeholder="Agregue en este apartado la descripción de la atracción ..." name="editarDescripcion" id="editarDescripcion" cols="30" rows="3" required></textarea>

                                </div>

                            </div>

                            <!-- ****************************************************** -->
                            <!-- ********** FOTOGRAFÍA PEQUEÑA DEL RECORRIDO ********** -->
                            <!-- ****************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="custom-file">

                                        <input title="(* Campo Requerido) Fotografía pequeña del recorrido" type="hidden" class="imgFotoAtraccionPeqActual form-control" name="imgFotoAtraccionPeqActual">

                                        <input title="(* Campo Requerido) Fotografía pequeña del recorrido" type="file" class="custom-file-input" name="editarFotoAtraccionPeq" id="editarFotoAtraccionPeq">

                                        <label title="(* Campo Requerido) Fotografía pequeña del recorrido" class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Pequeña</label>

                                    </div>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Pequeña de Recorrido Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaPeqEdi text-muted"> </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPrevia" id="imagenPrevia">

                                <img src="views/img/recorrido/default/default.png" alt="" id="img-foto-peq-edit" class="img-fluid imagenAdmins">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="editarnNombreImagenRecorridoPeq"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="editarTamanoImagenRecorridoPeq"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="editarExtensImagenRecorridoPeq"></span></p>

                            </div>

                            <!-- --- -->
                            <!-- ****************************************************** -->
                            <!-- ********** FOTOGRAFÍA GRANDE DEL RECORRIDO ********** -->
                            <!-- ****************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="custom-file">

                                        <input title="(* Campo Requerido) Fotografía grande del recorrido" type="hidden" class="imgFotoAtraccionGraActual form-control" name="imgFotoAtraccionGraActual">

                                        <input title="(* Campo Requerido) Fotografía grande del recorrido" type="file" class="custom-file-input" name="editarFotoAtraccionGra" id="editarFotoAtraccionGra">

                                        <label title="(* Campo Requerido) Fotografía grande del recorrido" class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Grande</label>

                                    </div>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Grande de Recorrido Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaGraEdi text-muted"> </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPrevia" id="imagenPrevia">

                                <img src="views/img/recorrido/default/default.png" alt="" id="img-foto-gra-edit" class="img-fluid imagenAdmins">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="editarnNombreImagenRecorridoGra"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="editarTamanoImagenRecorridoGra"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="editarExtensImagenRecorridoGra"></span></p>

                            </div>

                        </div>

                        <?php 
                    
                            $editarRecorrido = new ControladorRecorrido();
                            $editarRecorrido -> ctrEditarRecorrido();
                        
                        ?>

                        <div class="modal-footer">

                            <button type="submit" class="text-white btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Actualizar Recorrido</button>

                            <button type="button" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                        </div>

                    </div>

                </div>
                
            </div>

        </form>

    </div>

</div>