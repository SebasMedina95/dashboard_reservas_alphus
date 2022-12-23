<!--*****************************************************************-->
<!--*****************************************************************-->
<!-- /***************************************************************/
     /***** SPINNER DE CARGA PARA EDITAR CATEGORÍAS *****/
     /***************************************************************/ -->
<div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaEditarCategoria" aria-labelledby="spinnerCargaEditarCategoria" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="d-flex align-items-center">
            <h3 class="font-weight-bold text-white">Cargando Información ...</h3>
            <div class="spinner-border text-warning m-5 ml-auto" style="width: 8rem; height: 8rem;" role="status">

            </div>
        </div>
    </div>
</div>

<!-- *********************************************************** -->
<!-- **** CREACIÓN DE UNA CATEGORÍA DE HABITACIÓN DEL HOTEL **** -->
<!-- *********************************************************** -->
<div class="modal fade" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="crearCategoria">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioCategorias('adicionar');" id="formCategorias" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Agregar Categoría de Habitación</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

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

                            <!-- ********************************************* -->
                            <!-- ******* RUTA RELACIONADA DE CATEGORÍA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Ruta de Categoría" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Ruta de Categoría" type="text" class="form-control rutaCategoria" name="rutaCategoria" id="rutaCategoria" placeholder="Ruta de Categoría ..." aria-label="rutaCategoria" aria-describedby="rutaCategoria" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ******* COLOR ASOCIADO DE CATEGORÍA ******* -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group my-colorpicker2">
                                    
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-square"></i>
                                        </span>
                                    </div>

                                    <input title="(* Campo Requerido) Color Referencial de Categoría" type="text" class="form-control colorCategoria" name="colorCategoria" id="colorCategoria" placeholder="Color Referencial de Categoría ..." aria-label="colorCategoria" aria-describedby="colorCategoria" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- **************************************** -->
                            <!-- ******* TIPO/NOMBRE DE CATEGORÍA ******* -->
                            <!-- **************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo/Nombre de Categoría" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-chess-rook"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Tipo/Nombre de Categoría" type="text" class="form-control tipoCategoria" name="tipoCategoria" id="tipoCategoria" placeholder="Tipo/Nombre de Categoría ..." aria-label="tipoCategoria" aria-describedby="tipoCategoria" autocomplete="off" required>

                                </div>

                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <!-- ************************************************************* -->
                            <!-- ********** FOTOGRAFÍA PARA CATEGORÍA DE HABITACIÓN ********** -->
                            <!-- ************************************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-2">

                                    <div class="custom-file">

                                        <input title="(Opcional) Fotografía del Categoria: " type="file" class="custom-file-input" name="fotoCategoria" id="fotoCategoria">

                                        <label title="(Opcional) Fotografía del Categoría: " class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Categoría</label>

                                    </div>

                                </div>

                            </div>

                            <!-- <div class="col-3">

                                <div class="input-group mb-2">

                                    <button title="Cancelar Imágen Cargada" onclick="cancelarImgCategorias(event)" class="cancelarImgCategorias text-white btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Cancelar Img </button>

                                </div>

                            </div> -->

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaAddCategoria text-muted">Aún no se ha cargado ninguna imágen ... </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPreviaCategorias" id="imagenPreviaCategorias">

                                <img src="views/img/defaultCategorias/default.png" alt="" id="img-foto-categoria" class="img-fluid imagenCategorias">
                                <hr>
                                <p class="mb-1"><b>Nombre de la imágen: </b> <span id="nombreImagenCategorias"></span></p>
                                <p class="mb-1 lineaPImgCategoria"><b>Tamaño de la imágen: </b> <span id="tamanoImagenCategorias"></span></p>
                                <p class="mb-1 lineaPImgCategoria"><b>Tipo de la imágen:   </b> <span id="extensImagenCategorias"></span></p>

                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <!-- *************************************************************** -->
                            <!-- ********** DESCRIPCIÓN DE LA CATEGORÍA DE HABITACIÓN ********** -->
                            <!-- *************************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Breve Descripción de Categoría: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Breve Descripción de Categoría" type="text" class="form-control tipoCategoria" name="descripcionCategoria" id="descripcionCategoria" placeholder="Breve Descripción de Categoría ..." aria-label="descripcionCategoria" aria-describedby="descripcionCategoria" autocomplete="off" required>

                                </div>

                            </div>
                            
                            <!-- <div class="col-12">

                                <hr>

                            </div> -->

                            <!-- ******************************************************************* -->
                            <!-- ********** CARACTERÍSTICAS DE LA CATEGORÍA DE HABITACIÓN ********** -->
                            <!-- ******************************************************************* -->

                            <!-- <div class="col-12">

                                <div class="input-group">

                                    <p class="text-muted"><b>Seleccione las Características de la Categoría:</b></p>

                                </div>
                            
                            </div> -->

                            <?php 
                            
                                // $item = null;
                                // $valor = null;

                                // $respuestaComodidades = ControladorCategorias::ctrMostrarComodidadesCategorias($item , $valor);

                                // foreach ($respuestaComodidades as $key => $value) {
                                    
                                //     echo '
                                    
                                //         <div class="col-4">
                                //             <div class="input-group">                                    
                                //                 <div class="icheck-success">
                                //                     <input onclick="accionIncluye()" type="checkbox" id="comodidad-'.$value["id"].'" value="'.$value["comodidad"].','.$value["icono"].'" />
                                //                     <label for="comodidad-'.$value["id"].'"><i class="'.$value["icono"].'"></i>  '.$value["comodidad"].'</label>
                                //                 </div>
                                //             </div>
                                //         </div>
                                    
                                //     ';

                                // }
                            
                            ?>

                            <!-- ************************************************************************** -->
                            <!-- ********** CARACTERÍSTICAS DE LA CATEGORÍA DE HABITACIÓN - JSON ********** -->
                            <!-- ************************************************************************** -->
                            <!-- <div class="col-12">

                                <div class="input-group">

                                    <input disabled class="form-control" type="text" name="caracteristicasCategoria" id="caracteristicasCategoria"> 

                                </div>

                            </div>

                            

                            <div class="col-12">

                                <hr>

                            </div> -->

                            <!-- *********************************************** -->
                            <!-- ******* $ CONTINENTAL EN TEMPORADA ALTA ******* -->
                            <!-- *********************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Continental en Temp. Alta." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Continental en Temp. Alta." type="text" class="form-control continental_alta" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="continental_alta" id="continental_alta" placeholder="Continental en Temp. Alta. ..." aria-label="continental_alta" aria-describedby="continental_alta" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *********************************************** -->
                            <!-- ******* $ CONTINENTAL EN TEMPORADA BAJA ******* -->
                            <!-- *********************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Continental en Temp. Baja." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Continental en Temp. Baja." type="text" class="form-control continental_baja" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="continental_baja" id="continental_baja" placeholder="Continental en Temp. Baja. ..." aria-label="continental_baja" aria-describedby="continental_baja" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ******* $ AMERICANO EN TEMPORADA ALTA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Americano en Temp. Alta." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Americano en Temp. Alta." type="text" class="form-control americano_alta" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="americano_alta" id="americano_alta" placeholder="Americano en Temp. Alta. ..." aria-label="americano_alta" aria-describedby="americano_alta" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ******* $ AMERICANO EN TEMPORADA BAJA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Americano en Temp. Baja." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Americano en Temp. Baja." type="text" class="form-control americano_baja" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="americano_baja" id="americano_baja" placeholder="Americano en Temp. Baja. ..." aria-label="americano_baja" aria-describedby="americano_baja" autocomplete="off" required>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php 
                    
                        $registroCategorias = new ControladorCategorias();
                        $registroCategorias -> ctrRegistroCategoria();
                    
                    ?>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Categoría</button>

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

<!--***************************************************************************-->
<!-- *********** MODAL PARA ACTUALIZAR UNA CATEGORÍA DE HABITACIÓN ************ -->
<!--***************************************************************************-->
<div class="modal fade" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="CategoriasModalLabel" aria-hidden="true" id="editarCategoria">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form onsubmit="return validarFormularioCategorias('editar');" method="post" enctype="multipart/form-data">

                <!-- Modal Header -->
                <div class="modal-header bg-dark">

                    <h4 class="modal-title">Actualizar una Categoría de Habitación</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <!-- **************************************************************************** -->
                        <!-- *** INPUT INDEPENDIENTE DEL ID DE LA CATEGORÍA QUE TOMAREMOS PARA EDITAR *** -->
                        <!-- **************************************************************************** -->
                        <input type="hidden" name="editarIdCategoria" id="editarIdCategoria">

                        <div class="row">

                            <!-- ********************************************* -->
                            <!-- ******* RUTA RELACIONADA DE CATEGORÍA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Ruta de Categoría" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Ruta de Categoría" type="text" class="form-control editarRutaCategoria" name="editarRutaCategoria" id="editarRutaCategoria" placeholder="Ruta de Categoría ..." aria-label="editarRutaCategoria" aria-describedby="editarRutaCategoria" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ******* COLOR ASOCIADO DE CATEGORÍA ******* -->
                            <!-- ******************************************* -->
                            <div class="col-6">

                                <div class="input-group my-colorpicker2">
                                    
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="colorAplicadoEdit" class="fas fa-square"></i>
                                        </span>
                                    </div>

                                    <input title="(* Campo Requerido) Color Referencial de Categoría" type="text" class="form-control editarColorCategoria" name="editarColorCategoria" id="editarColorCategoria" placeholder="Color Referencial de Categoría ..." aria-label="editarColorCategoria" aria-describedby="editarColorCategoria" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- **************************************** -->
                            <!-- ******* TIPO/NOMBRE DE CATEGORÍA ******* -->
                            <!-- **************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo/Nombre de Categoría" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-chess-rook"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Tipo/Nombre de Categoría" type="text" class="form-control editarTipoCategoria" name="editarTipoCategoria" id="editarTipoCategoria" placeholder="Tipo/Nombre de Categoría ..." aria-label="editarTipoCategoria" aria-describedby="editarTipoCategoria" autocomplete="off" required>

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

                                        <input title="(Opcional) Fotografía de la Categoría de Habitación Actual" type="hidden" class="imgFotoCategoriaActual form-control" name="imgFotoCategoriaActual">

                                        <input title="(Opcional) Fotografía de la Categoría de Habitación Actual" type="file" class="custom-file-input" name="editarFotoCategoria" id="editarFotoCategoria">

                                        <label title="(Opcional) Fotografía de la Categoría de Habitación Actual" class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Plan</label>

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

                                    <span class="nombreImagenCargadaEdiCategoria text-muted"> </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPreviaCategorias" id="imagenPreviaCategorias">

                                <img src="views/img/defaultCategorias/default.png" alt="" id="img-foto-edit-categoria" class="img-fluid imagenCategoria">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="editarNombreImagenCategoria"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="editarTamanoImagenCategoria"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="editarExtensImagenCategoria"></span></p>

                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <!-- *************************************************************** -->
                            <!-- ********** DESCRIPCIÓN DE LA CATEGORÍA DE HABITACIÓN ********** -->
                            <!-- *************************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Breve Descripción de Categoría: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Breve Descripción de Categoría" type="text" class="form-control tipoCategoria" name="editarDescripcionCategoria" id="editarDescripcionCategoria" placeholder="Breve Descripción de Categoría ..." aria-label="editarDescripcionCategoria" aria-describedby="editarDescripcionCategoria" autocomplete="off" required>

                                </div>

                            </div>
                            
                            <!-- <div class="col-12">

                                <hr>

                            </div> -->

                            <!-- ******************************************************************* -->
                            <!-- ********** CARACTERÍSTICAS DE LA CATEGORÍA DE HABITACIÓN ********** -->
                            <!-- ******************************************************************* -->

                            <!-- <div class="col-12">

                                <div class="input-group">

                                    <p class="text-muted"><b>Seleccione las Características de la Categoría:</b></p>

                                </div>
                            
                            </div> -->

                            <?php 
                            
                                // $item = null;
                                // $valor = null;

                                // $respuestaComodidades = ControladorCategorias::ctrMostrarComodidadesCategorias($item , $valor);

                                // foreach ($respuestaComodidades as $key => $value) {
                                    
                                //     echo '
                                    
                                //         <div class="col-4">
                                //             <div class="input-group">                                    
                                //                 <div class="icheck-success">
                                //                     <input onclick="accionIncluye()" type="checkbox" id="comodidad-'.$value["id"].'" value="'.$value["comodidad"].','.$value["icono"].'" />
                                //                     <label for="comodidad-'.$value["id"].'"><i class="'.$value["icono"].'"></i>  '.$value["comodidad"].'</label>
                                //                 </div>
                                //             </div>
                                //         </div>
                                    
                                //     ';

                                // }
                            
                            ?>

                            <!-- ************************************************************************** -->
                            <!-- ********** CARACTERÍSTICAS DE LA CATEGORÍA DE HABITACIÓN - JSON ********** -->
                            <!-- ************************************************************************** -->
                            <!-- <div class="col-12">

                                <div class="input-group">

                                    <input disabled class="form-control" type="text" name="caracteristicasCategoria" id="caracteristicasCategoria"> 

                                </div>

                            </div>

                            

                            <div class="col-12">

                                <hr>

                            </div> -->

                            <!-- *********************************************** -->
                            <!-- ******* $ CONTINENTAL EN TEMPORADA ALTA ******* -->
                            <!-- *********************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Continental en Temp. Alta." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Continental en Temp. Alta." type="text" class="form-control editarContinental_alta" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="editarContinental_alta" id="editarContinental_alta" placeholder="Continental en Temp. Alta. ..." aria-label="editarContinental_alta" aria-describedby="editarContinental_alta" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *********************************************** -->
                            <!-- ******* $ CONTINENTAL EN TEMPORADA BAJA ******* -->
                            <!-- *********************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Continental en Temp. Baja." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Continental en Temp. Baja." type="text" class="form-control editarContinental_baja" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="editarContinental_baja" id="editarContinental_baja" placeholder="Continental en Temp. Baja. ..." aria-label="editarContinental_baja" aria-describedby="editarContinental_baja" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ******* $ AMERICANO EN TEMPORADA ALTA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Americano en Temp. Alta." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Americano en Temp. Alta." type="text" class="form-control editarAmericano_alta" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="editarAmericano_alta" id="editarAmericano_alta" placeholder="Americano en Temp. Alta. ..." aria-label="editarAmericano_alta" aria-describedby="editarAmericano_alta" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ******* $ AMERICANO EN TEMPORADA BAJA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Americano en Temp. Baja." class="input-group-text" id="basic-addon1"><i class="fa-solid fa-dollar-sign"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Americano en Temp. Baja." type="text" class="form-control editarAmericano_baja" onkeyup="formatSueldoBase(this)" onchange="formatSueldoBase(this)" name="editarAmericano_baja" id="editarAmericano_baja" placeholder="Americano en Temp. Baja. ..." aria-label="editarAmericano_baja" aria-describedby="editarAmericano_baja" autocomplete="off" required>

                                </div>

                            </div>

                        </div>

                    </div>

                    <?php 
                    
                        $editarCategorias = new ControladorCategorias();
                        $editarCategorias -> ctrEditarCategorias();
                    
                    ?>                    

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i> Actualizar Categoría</button>

                    <button type="button" onclick="cancelarPlanes()" class="cancelarPlanes btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </form>

        </div>

    </div>

</div>