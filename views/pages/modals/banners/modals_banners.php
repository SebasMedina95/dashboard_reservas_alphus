<!--*****************************************************************-->
<!--*****************************************************************-->
<!-- /***************************************************************/
     /***** SPINNER DE CARGA PARA EDITAR BANNER *****/
     /***************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEditarBanner" aria-labelledby="spinnerCargaEditarBanner" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="d-flex align-items-center">
            <h3 class="font-weight-bold text-white">Cargando Información ...</h3>
            <div class="spinner-border text-warning m-5 ml-auto" style="width: 8rem; height: 8rem;" role="status">

            </div>
        </div>
    </div>
</div>

<!--*******************************************************-->
<!-- ********** MODAL PARA CREAR UN NUEVO BANNER ********** -->
<!--*******************************************************-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true" id="crearBanner">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form onsubmit="return validarFormularioBanner('adicionar');" method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header bg-dark">

          <h4 class="modal-title">Agregar un Banner</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <div class="form-group my-2">

                <div class="custom-file">

                    <input title="(Obligatorio) Fotografía para Banner: " type="file" class="custom-file-input" name="subirBanner" id="subirBanner">

                    <label title="(Obligatorio) Fotografía para Banner: " class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Banner</label>

                    <p class="help-block small text-muted d-flex justify-content-end"><b>DIMENSIONES: </b> 1440px * 600px | Peso Max. 2MB | Formato: JPG o PNG</p>

                    <div align="center" class="col-12 text-center">

                        <div class="input-group mb-1">

                            <span class="text-muted"><b>Imágen Cargada: </b> </span>

                        </div>

                    </div>

                    <div align="center" class="col-12 text-center">

                        <div class="input-group mb-3">

                            <span class="nombreImagenCargadaBannerAdd text-muted">Aún no se ha cargado ninguna imágen ... </span>

                        </div>

                    </div>

                    <!-- ************************************************ -->
                    <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                    <!-- ************************************************ -->
                    <div class="imagenPreviaBanner" id="imagenPreviaBanner">

                        <img src="views/img/banner/default/default.png" alt="" id="img-foto-banner" class="img-fluid imagenBanner">
                        <hr>
                        <p><b>Nombre de la imágen: </b> <span id="nombreImagenBanner"></span></p>
                        <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="tamanoImagenBanner"></span></p>
                        <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="extensImagenBanner"></span></p>

                    </div>

                    <!-- <input type="file" class="form-control-file border" name="subirBanner" required>

                    <p class="help-block small">Dimensiones: 1440px * 600px | Peso Max. 2MB | Formato: JPG o PNG</p> -->

                    <!-- <img class="previsualizarBanner img-fluid"> -->

                </div>

            </div>  

            <?php

              $registroBanner = new ControladorBanner();
              $registroBanner -> ctrRegistroBanner();

            ?>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <div>

            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Banner</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

          </div>

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

<!-- ******************************* -->
<!-- ***** EDICIÓN DE UN BANNER **** -->
<!-- ******************************* -->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true" id="editarBanner">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form onsubmit="return validarFormularioBanner('editar');" method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header bg-dark">

          <h4 class="modal-title">Actualizar un Banner</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <!-- ********************************************************************** -->
            <!-- *** INPUT INDEPENDIENTE DEL ID DEL ADMIN QUE TOMAREMOS PARA EDITAR *** -->
            <!-- ********************************************************************** -->
            <input type="hidden" name="editarIdBanner" id="editarIdBanner">

            <!-- ******************************************* -->
            <!-- ********** FOTOGRAFÍA PARA ADMIN ********** -->
            <!-- ******************************************* -->
            <div class="col-12">

                <div class="input-group mb-3">

                    <div class="custom-file">

                        <input title="(Opcional) Fotografía del Banner" type="hidden" class="imgFotoBannerActual form-control" name="imgFotoBannerActual">

                        <input title="(Opcional) Fotografía del Banner" type="file" class="custom-file-input" name="editarFotoBanner" id="editarFotoBanner">

                        <label title="(Opcional) Fotografía del Banner" class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Banner</label>

                    </div>

                </div>

            </div>

            <!-- <div class="col-3">

                <div class="input-group mb-3">

                    <button title="Cancelar Imágen Cargada para la Actualización" onclick="cancelarImgAdminsEdit(event)" class="cancelarImgAdminsEdit text-white btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Cancelar Img </button>

                </div>

            </div> -->

            <div align="center" class="col-12 text-center">

                <div class="input-group mb-1">

                    <span class="text-muted"><b>Imágen Cargada: </b> </span>

                </div>

            </div>

            <div align="center" class="col-12 text-center">

                <div class="input-group mb-3">

                    <span class="nombreImagenCargadaEdiBanner text-muted"> </span>

                </div>

            </div>

            <!-- ************************************************ -->
            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
            <!-- ************************************************ -->
            <div class="imagenPreviaBanner" id="imagenPreviaBanner">

                <img src="views/img/banner/default/default.png" alt="" id="img-foto-edit-banner" class="img-fluid imagenBanner">
                <hr>
                <p><b>Nombre de la imágen: </b> <span id="editarnNombreImagenBanner"></span></p>
                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="editarTamanoImagenBanner"></span></p>
                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="editarExtensImagenBanner"></span></p>

            </div>

            <?php

              $actualizarBanner = new ControladorBanner();
              $actualizarBanner -> ctrEditarBanner();

            ?>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <div>

            <button type="submit" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i> Actualizar Banner</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

          </div>

        </div>

      </form>

    </div>

  </div>

</div>
