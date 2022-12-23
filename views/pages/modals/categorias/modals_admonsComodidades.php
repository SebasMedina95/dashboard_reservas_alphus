<!-- ************************************************************ -->
<!-- **** GESTIÓN DE COMODIDAD DE LA CATEGORÍA DE HABITACIÓN **** -->
<!-- ************************************************************ -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="gestionTotalComodidadesCategoria">

    <div class="modal-dialog modal-xl" role="document">

        <form  onsubmit="return validarFormularioCategorias('gestionTotalComodidadesCategoria');" id="formCategorias" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white"> Gestor General de Comodidades</h5>

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

                            <!-- ************************************** -->
                            <!-- ******* NOMBRE DE LA COMODIDAD ******* -->
                            <!-- ************************************** -->
                            <div class="col-4">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Comodidad" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-chess-rook"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Comodidad" type="text" class="form-control comodidad" name="comodidad" id="comodidad" placeholder="Comodidad ..." aria-label="comodidad" aria-describedby="comodidad" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************** -->
                            <!-- ******* ÍCONO ASOCIADO DE LA COMODIDAD ******* -->
                            <!-- ********************************************** -->
                            <div class="col-8">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                    <span title="(* Campo Requerido) Icono, puede presionar el botón para ir a la página donde puede obteber los íconos Solid de FontAwesome ..." class="input-group-text" id="basic-addon1"><a target="_blank" href="https://fontawesome.com/icons"><i class="fa-solid fa-circle-question"></i></a></span>

                                    </div>

                                    <input title="(* Campo Requerido) Icono" type="text" class="form-control icono" name="icono" id="icono" placeholder="Icono (De FontAwesome, Ej: fa-solid fa-circle-question) ..." aria-label="icono" aria-describedby="icono" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************************* -->
                            <!-- ******* ACCIONES PARA GUARDAR UNA NUEVA COMODIDAD ******* -->
                            <!-- ********************************************************* -->
                            <div class="text-right col-12">

                                <!-- <div class="input-group mb-3"> -->

                                    <button type="button" onclick="guardarComodidad()"class="btn btn-success text-white"><i class="fa-solid fa-plus"></i> Incluir Comodidad</button>

                                    <button type="button" onclick="cancelarPlanes()" class="cancelarPlanes btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar y Cerrar</button>

                                <!-- </div> -->

                            </div>

                            <div class="col-12">

                                <hr>

                            </div>

                            <!-- ******************************************************** -->
                            <!-- ******* MICRO LISTADO DE COMODIDADES REGISTRADAS ******* -->
                            <!-- ******************************************************** -->
                            <div class="col-12">

                                <table style="width: 100%;" class="table table-sm table-bordered table-hover table-striped dt-responsive display nowrap" id="tablaComodidades">
                    
                                    <thead class="estiloTablasGeneral">

                                    <tr>

                                        <th style="width:3px">#</th> 
                                        <th>Acciones</th>            
                                        <th>Comodidad</th>
                                        <th>Ícono Representativo</th>
                                        <th>Estado</th>
                                        <th>Registro</th>

                                    </tr>   

                                    </thead>

                                    <tbody>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>