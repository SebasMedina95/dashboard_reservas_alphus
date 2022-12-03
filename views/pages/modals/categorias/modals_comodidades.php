<!--***********************************************************************-->
<!--***********************************************************************-->
<!-- /*********************************************************************/
     /***** SPINNER DE CARGA PARA GESTIONAR COMODIDADES DE CATEGORÍAS *****/
     /*********************************************************************/ -->
     <div class="modal fade" tabindex="-1" role="dialog" id="spinnerCargaComodidadesCategoria" aria-labelledby="spinnerCargaComodidadesCategoria" aria-hidden="true">
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
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="gestionarCategoria">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioCategorias('gestionarCategoria');" id="formCategorias" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Gestionar Comodidades de la Categoría</h5>

                    <button type="button" onclick="cancelarDetallesCategoria()" class="close" data-dismiss="modal" aria-label="Close">

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

                            <!-- *********************************************** -->
                            <!-- ******* COD PK RELACIONADA DE CATEGORÍA ******* -->
                            <!-- *********************************************** -->
                            <div class="col-2">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Código Categoría" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-chess-rook"></i></span>

                                    </div>

                                    <input disabled title="(* Campo Requerido) Código Categoría" type="text" class="form-control idCategoriaComodidad" name="idCategoriaComodidad" id="idCategoriaComodidad" placeholder="Código Categoría ..." aria-label="idCategoriaComodidad" aria-describedby="idCategoriaComodidad" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ******* RUTA RELACIONADA DE CATEGORÍA ******* -->
                            <!-- ********************************************* -->
                            <div class="col-10">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo/Nombre de Categoría" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-chess-rook"></i></span>

                                    </div>

                                    <input disabled title="(* Campo Requerido) Tipo/Nombre de Categoría" type="text" class="form-control tipoCategoriaComodidad" name="tipoCategoriaComodidad" id="tipoCategoriaComodidad" placeholder="Tipo/Nombre de Categoría ..." aria-label="tipoCategoriaComodidad" aria-describedby="tipoCategoriaComodidad" autocomplete="off" required>

                                </div>

                            </div>

                            <div class="col-12">

                                <div align="center" class="col-12 text-center">

                                    <div class="input-group mb-1">

                                        <span class="text-muted"><b>Imágen Cargada para la Categoría de Habitación: </b> </span>

                                    </div>

                                </div>
                            
                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaComodidadCategoria text-muted"> </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPreviaCategorias" id="imagenPreviaCategorias">

                                <img src="views/img/defaultCategorias/default.png" alt="" id="img-foto-edit-categoria" class="img-fluid imagenCategoria">
                                <hr>

                            </div>


                            <!-- ******************************************************************* -->
                            <!-- ********** CARACTERÍSTICAS DE LA CATEGORÍA DE HABITACIÓN ********** -->
                            <!-- ******************************************************************* -->

                            <div class="col-12 antesChecks">

                                <div class="input-group">

                                    <p class="text-muted"><b>Seleccione las Características de la Categoría:</b></p>

                                </div>
                            
                            </div>

                            <?php 

                                // //error_reporting(false);
                                // $band;
                            
                                // $item = null;
                                // $valor = null;

                                // $respuestaComodidades = ControladorCategorias::ctrMostrarComodidadesCategorias($item , $valor);

                                // //print_r($respuestaComodidades);

                                // $item1 = "id_categoria";
                                // $valor1 = $_COOKIE["idCategoriaHabitacionComodidades"]; /**Se genera al detonar en JS comodidadesCategoria */

                                // $respuestaDetallesComodidades = ControladorCategorias::ctrMostrarDetallesCategorias($item1 , $valor1);
                                
                                
                                // //print_r($respuestaDetallesComodidades);
                                
                                // foreach ($respuestaComodidades as $key => $value) {
                                    
                                //     $band = false;
                                    
                                //     foreach ($respuestaDetallesComodidades as $key1 => $value1) {
                                        
                                //         if($value["id"] == $value1["id_comodidad"]){

                                //             echo '
                                        
                                //                 <div class="col-4">
                                //                     <div class="input-group">                                    
                                //                         <div class="icheck-success">
                                //                             <input checked onclick="accionIncluye()" type="checkbox" id="comodidad-'.$value["id"].'" value="'.$value["comodidad"].','.$value["icono"].'" />
                                //                             <label for="comodidad-'.$value["id"].'"><i class="'.$value["icono"].'"></i>  '.$value["comodidad"].'</label>
                                //                         </div>
                                //                     </div>
                                //                 </div>
                                            
                                //             ';

                                //             $band = true;
    
                                //         }

                                //     }
                                    
                                //     if(!$band){

                                //         echo '
                                        
                                //             <div class="col-4">
                                //                 <div class="input-group">                                    
                                //                     <div class="icheck-success">
                                //                         <input onclick="accionIncluye()" type="checkbox" id="comodidad-'.$value["id"].'" value="'.$value["comodidad"].','.$value["icono"].'" />
                                //                         <label for="comodidad-'.$value["id"].'"><i class="'.$value["icono"].'"></i>  '.$value["comodidad"].'</label>
                                //                     </div>
                                //                 </div>
                                //             </div>
                                        
                                //         ';

                                //     }

                                // }
                            
                            ?>

                            <div class="col-12">

                                <div class="input-group">

                                    <hr>
                                    <hr>
                                    <hr>

                                </div>

                            </div>

                            <ul class="col-12" id="setDeChecks">

                            </ul>

                            <!-- ************************************************************************** -->
                            <!-- ********** CARACTERÍSTICAS DE LA CATEGORÍA DE HABITACIÓN - JSON ********** -->
                            <!-- ************************************************************************** -->
                            <div class="col-12">

                                <div class="input-group">

                                    <input disabled class="form-control" type="hidden" name="caracteristicasCategoria" id="caracteristicasCategoria"> 

                                </div>

                            </div>

                        </div> <!-- row -->

                        <!-- **************************************************************************************************** -->
                        <!-- PARA ESTE CASO, REGISTRAREMOS LOS DETALLES USANDO ASYNC AWAIT MIENTRAS MANDAMOS LA DATA SELECCIONADA
                             usando una metodología asíncrona para el tema. -->
                        <!-- **************************************************************************************************** -->

                        <div class="modal-footer">

                            <button type="button" onclick="guardarComodidades()" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar Comodidades</button>

                            <button type="button" onclick="cancelarDetallesCategoria()" class="cancelarDetallesCategoria btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                        </div>

                    </div> <!-- container -->

                </div> <!-- modal-body -->

            </div> <!-- modal-content -->

        </form> <!-- form -->

    </div> <!-- modal-dialog -->

</div> <!-- modal-fade -->