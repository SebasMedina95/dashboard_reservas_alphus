<!-- *********************************************************************
***** TODAS LAS ACCIONES QUE TENGAN QUE VER CON EL USO DE MODALES 
***** TRATAREMOS DE HACERLAS TODAS DESDE ESTE ARCHIVO PARA MANTENER
***** CENTRALIZADA LA ESTRUCTURA DE MODALES CON LAS CLASES ESPECIALIZADAS
***** QUE TENGAMOS QUE USAR, MAS FÁCIL PARA TRABAJAR 
**************************************************************************-->

<!-- ************************************************ -->
<!-- **** CREACIÓN DE UN ADMINISTRADOR DEL HOTEL **** -->
<!-- ************************************************ -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="crearAdministrador">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioAdmins('adicionar');" id="formAdministradores" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Agregar Administrador</h5>

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

                            <!-- ********************************* -->
                            <!-- ******* TIPO DE DOCUMENTO ******* -->
                            <!-- ********************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Documento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-lines"></i></span>

                                    </div>
 
                                    <select title="(* Campo Requerido) Tipo de Documento: " class="custom-select tipoDocumento" name="tipoDocumento" id="tipoDocumento" autocomplete="off">

                                        <option value="CC" selected>Cédula Ciudadania</option>

                                        <option value="TE">Tarjeta Extranjería</option>

                                        <option value="CE">Cédula Extranjería</option>

                                        <option value="LM">Libreta Militar</option>
                                        
                                        <option value="PC">Pase Conducción</option>

                                        <option value="NIT">Nit Empresa</option>

                                        <option value="PSP">Pasaporte</option>

                                    </select>

                                </div>

                            </div>

                            <!-- *********************************** -->
                            <!-- ******* NÚMERO DE DOCUMENTO ******* -->
                            <!-- *********************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Número de Documento" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Número de Documento" type="number" class="form-control documento" name="documento" id="documento" placeholder="Número Documento ..." aria-label="documento" aria-describedby="documento" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *********************************** -->
                            <!-- ********** PRIMER NOMBRE ********** -->
                            <!-- *********************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Primer Nombre: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Primer Nombre: " type="text" class="form-control primerNombre" name="primerNombre" id="primerNombre" placeholder="Primer Nombre ..." aria-label="primerNombre" aria-describedby="primerNombre" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ************************************ -->
                            <!-- ********** SEGUNDO NOMBRE ********** -->
                            <!-- ************************************ -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Segundo Nombre: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(Opcional) Segundo Nombre: " type="text" class="form-control segundoNombre" name="segundoNombre" id="segundoNombre" placeholder="Segundo Nombre ..." aria-label="segundoNombre" aria-describedby="segundoNombre" autocomplete="off">

                                </div>

                            </div>

                            <!-- ************************************* -->
                            <!-- ********** PRIMER APELLIDO ********** -->
                            <!-- ************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Primer Apellido: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Primer Apellido: " type="text" class="form-control primerApellido" name="primerApellido" id="primerApellido" placeholder="Primer Apellido ..." aria-label="primerApellido" aria-describedby="primerApellido" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ************************************** -->
                            <!-- ********** SEGUNDO APELLIDO ********** -->
                            <!-- ************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Segundo Apellido: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(Opcional) Segundo Apellido: " type="text" class="form-control segundoApellido" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido ..." aria-label="segundoApellido" aria-describedby="segundoApellido" autocomplete="off">

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** CORREO ELECTRÓNICO / EMAIL ********** -->
                            <!-- ************************************************ -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Correo Electrónico: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Correo Electrónico: " type="email" class="form-control correoElectronico" name="correoElectronico" id="correoElectronico" placeholder="Correo Electrónico ..." aria-label="correoElectronico" aria-describedby="correoElectronico" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- ********** PERFIL DE USUARIO ********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Perfil Usuario en el Dashboard: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-people-carry-box"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Perfil Usuario en el Dashboard: " class="custom-select perfil" name="perfil" id="perfil" autocomplete="off">

                                        <option value="Administrador" selected>Administrador - Acceso Total</option>

                                        <option value="Super Editor">Super Editor - Gestión General Reservas</option>

                                        <option value="Menor Editor">Menor Editor - Gestión General Habitaciones</option>

                                        <option value="Contabilidad">Contabilidad - Nómina y Cuentas</option>
                                        
                                        <option value="Atracciones">Atracciones - Servicio y Bodega</option>

                                        <option value="Restaurante">Restaurante - Servicio y Bodega</option>

                                        <option value="Marketing">Marketing</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ************************************** -->
                            <!-- ********** TELÉFONO CELULAR ********** -->
                            <!-- ************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Número de Teléfono Móvil: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Número de Teléfono Móvil: " type="number" class="form-control telefonoCelular" name="telefonoCelular" id="telefonoCelular" placeholder="Teléfono Celular ..." aria-label="telefonoCelular" aria-describedby="telefonoCelular" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *********************************** -->
                            <!-- ********** TELÉFONO FIJO ********** -->
                            <!-- *********************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Número de Teléfono Fíjo: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Número de Teléfono Fíjo: " type="number" class="form-control telefonoFijo" name="telefonoFijo" id="telefonoFijo" placeholder="Teléfono Fijo ..." aria-label="telefonoFijo" aria-describedby="telefonoFijo" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** DIRECCIÓN RESIDENCIAL ********** -->
                            <!-- ******************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Dirección Residencial: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-map-location-dot"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Dirección Residencial: " type="text" class="form-control direccion" name="direccion" id="direccion" placeholder="Dirección Residencial ..." aria-label="direccion" aria-describedby="direccion" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ************************************************* -->
                            <!-- ********** FECHA NACIMIENTO DE USUARIO ********** -->
                            <!-- ************************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Fecha de Nacimiento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Fecha de Nacimiento: " type="date" class="form-control fecha_nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha Nacimiento Usuario ..." aria-label="fecha_nacimiento" aria-describedby="fecha_nacimiento" value="<?php echo date("Y-m-d");?>" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** ESTADO CIVIL DE USUARIO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Estado Civíl: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-ring"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Estado Civíl: " class="custom-select estado_civil" name="estado_civil" id="estado_civil" autocomplete="off">

                                        <option value="1" selected>Soltero(a)</option>

                                        <option value="2">Casado(a)</option>

                                        <option value="3">Viudo(a)</option>

                                        <option value="4">Divorciado(a)</option>
                                        
                                        <option value="5">Unión Libre</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** TIPO REGIMEN DE USUARIO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Régimen: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-scale-unbalanced-flip"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Régimen: " class="custom-select tipo_regimen" name="tipo_regimen" id="tipo_regimen" autocomplete="off">

                                        <option value="1">Estado</option>

                                        <option value="2">Gran Contribuyente</option>

                                        <option value="3">Común</option>

                                        <option value="4">Simple</option>
                                        
                                        <option value="5" selected>No Responsable</option>

                                        <option value="6">Pendiente</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** TIPO PERSONA DE USUARIO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Persona: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-scale-unbalanced-flip"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Persona: " class="custom-select tipo_persona" name="tipo_persona" id="tipo_persona" autocomplete="off">

                                        <option value="1" selected>Natural</option>

                                        <option value="2">Jurídica</option>

                                    </select>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- ********** NOMBRE DE USUARIO ********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Nombre de Usuario: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-house-chimney-user"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Nombre de Usuario: " type="text" class="form-control nombreUsuario" name="nombreUsuario" id="nombreUsuario" placeholder="Nombre Usuario ..." aria-label="nombreUsuario" aria-describedby="nombreUsuario" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ***************************************** -->
                            <!-- ********** PASSWORD DE USUARIO ********** -->
                            <!-- ***************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Contraseña para Usuario: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Contraseña para Usuario: " type="password" class="form-control passwordUsuario" name="passwordUsuario" id="passwordUsuario" placeholder="Password Usuario ..." aria-label="passwordUsuario" aria-describedby="passwordUsuario" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** FOTOGRAFÍA PARA ADMIN ********** -->
                            <!-- ******************************************* -->
                            <div class="col-9">

                                <div class="input-group mb-2">

                                    <div class="custom-file">

                                        <input title="(Opcional) Fotografía del Usuario: " type="file" class="custom-file-input" name="fotoUsuario" id="fotoUsuario">

                                        <label title="(Opcional) Fotografía del Usuario: " class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Admin</label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-3">

                                <div class="input-group mb-2">

                                    <button title="Cancelar Imágen Cargada" onclick="cancelarImgAdmins(event)" class="cancelarImgAdmins text-white btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Cancelar Img </button>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaAdd text-muted">Aún no se ha cargado ninguna imágen ... </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPrevia" id="imagenPrevia">

                                <img src="views/img/admins/default/default.png" alt="" id="img-foto" class="img-fluid imagenAdmins">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="nombreImagenAdmins"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="tamanoImagenAdmins"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="extensImagenAdmins"></span></p>

                            </div>

                            <!-- ******************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DE USUARIO ********** -->
                            <!-- ******************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Descripción adicional del administrador registrado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(Opcional) Descripción adicional del administrador registrado: " class="form-control anotaciones_usuario" placeholder="Agregue en este apartado si es necesario observaciones adicionales respecto a este administrador ..." name="anotaciones_usuario" id="anotaciones_usuario" cols="30" rows="6"></textarea>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        $registroEmpleados = new ControladorEmpleados();
                        $registroEmpleados -> ctrRegistroEmpleados();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Admin</button>

                    <button type="button" onclick="cancelarAdmins()" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->


        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog -->

</div> <!-- Cierra Modal Fade -->

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

<!-- ************************************************ -->
<!-- ***** EDICIÓN DE UN ADMINISTRADOR DEL HOTEL **** -->
<!-- ************************************************ -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="adminsModalLabel" aria-hidden="true" id="editarAdministrador">

    <div class="modal-dialog" role="document">

        <form onsubmit="return validarFormularioAdmins('editar');" id="formAdministradores" method="POST" enctype="multipart/form-data">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Actualizar Administrador</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <!-- ********************************************************************** -->
                    <!-- *** INPUT INDEPENDIENTE DEL ID DEL ADMIN QUE TOMAREMOS PARA EDITAR *** -->
                    <!-- ********************************************************************** -->
                    <input type="hidden" name="editarId" id="editarId">

                    <!-- ************************************************ -->
                    <!-- ******* GENERAMOS LOS CAMPOS PARA LLENAR ******* -->
                    <!-- ************************************************ -->
                    <div class="container">

                        <div class="row">

                            <!-- ********************************* -->
                            <!-- ******* TIPO DE DOCUMENTO ******* -->
                            <!-- ********************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Documento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-lines"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Documento: " class="custom-select editarTipoDocumento" name="editarTipoDocumento" id="editarTipoDocumento" autocomplete="off">

                                        <option value="" class="editarTipoDocumentoOption"></option>

                                        <option value="CC">Cédula Ciudadania</option>

                                        <option value="TE">Tarjeta Extranjería</option>

                                        <option value="CE">Cédula Extranjería</option>

                                        <option value="LM">Libreta Militar</option>
                                        
                                        <option value="PC">Pase Conducción</option>

                                        <option value="NIT">Nit Empresa</option>

                                        <option value="PSP">Pasaporte</option>

                                    </select>

                                </div>

                            </div>

                            <!-- *********************************** -->
                            <!-- ******* NÚMERO DE DOCUMENTO ******* -->
                            <!-- *********************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Número de Documento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Número de Documento: " type="number" class="form-control editarDocumento" name="editarDocumento" id="editarDocumento" placeholder="Número Documento ..." aria-label="documento" aria-describedby="documento" autocomplete="off" value="" required>

                                </div>

                            </div>

                            <!-- *********************************** -->
                            <!-- ********** PRIMER NOMBRE ********** -->
                            <!-- *********************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Primer Nombre: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Primer Nombre: " type="text" class="form-control editarPrimerNombre" name="editarPrimerNombre" id="editarPrimerNombre" placeholder="Primer Nombre ..." aria-label="primerNombre" aria-describedby="primerNombre" autocomplete="off" value="" required>

                                </div>

                            </div>

                            <!-- ************************************ -->
                            <!-- ********** SEGUNDO NOMBRE ********** -->
                            <!-- ************************************ -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Segundo Nombre: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(Opcional) Segundo Nombre: " type="text" class="form-control editarSegundoNombre" name="editarSegundoNombre" id="editarSegundoNombre" placeholder="Segundo Nombre ..." aria-label="segundoNombre" aria-describedby="segundoNombre" autocomplete="off" value="">

                                </div>

                            </div>

                            <!-- ************************************* -->
                            <!-- ********** PRIMER APELLIDO ********** -->
                            <!-- ************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Primer Apellido: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Primer Apellido: " type="text" class="form-control editarPrimerApellido" name="editarPrimerApellido" id="editarPrimerApellido" placeholder="Primer Apellido ..." aria-label="primerApellido" aria-describedby="primerApellido" autocomplete="off" value="" required>

                                </div>

                            </div>

                            <!-- ************************************** -->
                            <!-- ********** SEGUNDO APELLIDO ********** -->
                            <!-- ************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Segundo Apellido" class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>

                                    </div>

                                    <input title="(Opcional) Segundo Apellido" type="text" class="form-control editarSegundoApellido" name="editarSegundoApellido" id="editarSegundoApellido" placeholder="Segundo Apellido ..." aria-label="segundoApellido" aria-describedby="segundoApellido" autocomplete="off" value="">

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** CORREO ELECTRÓNICO / EMAIL ********** -->
                            <!-- ************************************************ -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Correo Electrónico: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Correo Electrónico: " type="email" class="form-control editarCorreoElectronico" name="editarCorreoElectronico" id="editarCorreoElectronico" placeholder="Correo Electrónico ..." aria-label="correoElectronico" aria-describedby="correoElectronico" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- ********** PERFIL DE USUARIO ********** -->
                            <!-- *************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Perfil de Usuario: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-people-carry-box"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Perfil de Usuario: " class="custom-select editarPerfil" name="editarPerfil" id="editarPerfil" autocomplete="off">

                                        <option value="" class="editarPerfilOption"></option>

                                        <option value="Administrador">Administrador - Acceso Total</option>

                                        <option value="Super Editor">Super Editor - Gestión General Reservas</option>

                                        <option value="Menor Editor">Menor Editor - Gestión General Habitaciones</option>

                                        <option value="Contabilidad">Contabilidad - Nómina y Cuentas</option>
                                        
                                        <option value="Atracciones">Atracciones - Servicio y Bodega</option>

                                        <option value="Restaurante">Restaurante - Servicio y Bodega</option>

                                        <option value="Marketing">Marketing</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ************************************** -->
                            <!-- ********** TELÉFONO CELULAR ********** -->
                            <!-- ************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Número de Teléfono Móvil: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Número de Teléfono Móvil: " type="number" class="form-control editarTelefonoCelular" name="editarTelefonoCelular" id="editarTelefonoCelular" placeholder="Teléfono Celular ..." aria-label="telefonoCelular" aria-describedby="telefonoCelular" autocomplete="off" value="" required>

                                </div>

                            </div>

                            <!-- *********************************** -->
                            <!-- ********** TELÉFONO FIJO ********** -->
                            <!-- *********************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Número de Teléfono Fíjo: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Número de Teléfono Fíjo: " type="number" class="form-control editarTelefonoFijo" name="editarTelefonoFijo" id="editarTelefonoFijo" placeholder="Teléfono Fijo ..." aria-label="telefonoFijo" aria-describedby="telefonoFijo" autocomplete="off" value="" required>

                                </div>

                            </div>

                            <!-- ******************************************* -->
                            <!-- ********** DIRECCIÓN RESIDENCIAL ********** -->
                            <!-- ******************************************* -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Dirección Residencial: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-map-location-dot"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Dirección Residencial: " type="text" class="form-control editarDireccion" name="editarDireccion" id="editarDireccion" placeholder="Dirección Residencial ..." aria-label="direccion" aria-describedby="direccion" autocomplete="off" value="" required>

                                </div>

                            </div>

                            <!-- ************************************************* -->
                            <!-- ********** FECHA NACIMIENTO DE USUARIO ********** -->
                            <!-- ************************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Fecha de Nacimiento: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Fecha de Nacimiento: " type="date" class="form-control editarFecha_nacimiento" name="editarFecha_nacimiento" id="editarFecha_nacimiento" placeholder="Fecha Nacimiento Usuario ..." aria-label="fecha_nacimiento" aria-describedby="fecha_nacimiento" value="" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** ESTADO CIVIL DE USUARIO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Estado Civil: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-ring"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Estado Civil: " class="custom-select editarEstado_civil" name="editarEstado_civil" id="editarEstado_civil" autocomplete="off">

                                        <option value="" class="editarEstado_civilOption"></option>

                                        <option value="1" selected>Soltero(a)</option>

                                        <option value="2">Casado(a)</option>

                                        <option value="3">Viudo(a)</option>

                                        <option value="4">Divorciado(a)</option>
                                        
                                        <option value="5">Unión Libre</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** TIPO REGIMEN DE USUARIO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Régimen: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-scale-unbalanced-flip"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Régimen: " class="custom-select editarTipo_regimen" name="editarTipo_regimen" id="editarTipo_regimen" autocomplete="off">

                                        <option value="" class="editarTipo_regimenOption"></option>
                                    
                                        <option value="1">Estado</option>

                                        <option value="2">Gran Contribuyente</option>

                                        <option value="3">Común</option>

                                        <option value="4">Simple</option>
                                        
                                        <option value="5">No Responsable</option>

                                        <option value="6">Pendiente</option>

                                    </select>

                                </div>

                            </div>

                            <!-- ********************************************* -->
                            <!-- ********** TIPO PERSONA DE USUARIO ********** -->
                            <!-- ********************************************* -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Tipo de Persona: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-scale-unbalanced-flip"></i></span>

                                    </div>

                                    <select title="(* Campo Requerido) Tipo de Persona: " class="custom-select editarTipo_persona" name="editarTipo_persona" id="editarTipo_persona" autocomplete="off">

                                        <option value="" class="editarTipo_personaOption"></option>
                                    
                                        <option value="1">Natural</option>

                                        <option value="2">Jurídica</option>

                                    </select>

                                </div>

                            </div>

                            <!-- *************************************** -->
                            <!-- ********** NOMBRE DE USUARIO ********** -->
                            <!-- *************************************** -->
                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Nombre de Usuario para Dashboard: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-house-chimney-user"></i></span>

                                    </div>

                                    <input title="(* Campo Requerido) Nombre de Usuario para Dashboard: " type="text" class="form-control nombreUsuario" name="editarNombreUsuario" id="editarNombreUsuario" placeholder="Nombre Usuario ..." aria-label="nombreUsuario" aria-describedby="nombreUsuario" autocomplete="off" required>

                                </div>

                            </div>

                            <!-- ***************************************** -->
                            <!-- ********** PASSWORD DE USUARIO ********** -->
                            <!-- ***************************************** -->

                            <input type="hidden" class="passwordActual form-control" name="passwordActual">

                            <div class="col-6">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Contraseña para Usuario: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>

                                    </div>

                                    <input title="(Opcional) Contraseña para Usuario: " type="password" class="form-control editarPasswordUsuario" name="editarPasswordUsuario" id="editarPasswordUsuario" placeholder="Password Usuario ..." aria-label="passwordUsuario" aria-describedby="passwordUsuario" autocomplete="off">

                                </div>

                            </div>

                            <!-- <div class="col-12">

                                <div class="input-group mb-3">

                                    <input type="text" class="form-control" name="imgFotoUserActual">

                                </div>

                            </div> -->

                            <!-- ******************************************* -->
                            <!-- ********** FOTOGRAFÍA PARA ADMIN ********** -->
                            <!-- ******************************************* -->
                            <div class="col-8">

                                <div class="input-group mb-3">

                                    <div class="custom-file">

                                        <input title="(Opcional) Fotografía del Usuario" type="hidden" class="imgFotoUserActual form-control" name="imgFotoUserActual">

                                        <input title="(Opcional) Fotografía del Usuario" type="file" class="custom-file-input" name="editarFotoUsuario" id="editarFotoUsuario">

                                        <label title="(Opcional) Fotografía del Usuario" class="custom-file-label" for="inputGroupFile03"><i class="fa-solid fa-camera-retro"></i> Cargar Foto Admin</label>

                                    </div>

                                </div>

                            </div>

                            <div class="col-4">

                                <div class="input-group mb-3">

                                    <button title="Cancelar Imágen Cargada para la Actualización" onclick="cancelarImgAdminsEdit(event)" class="cancelarImgAdminsEdit text-white btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Cancelar Img </button>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-1">

                                    <span class="text-muted"><b>Imágen Cargada: </b> </span>

                                </div>

                            </div>

                            <div align="center" class="col-12 text-center">

                                <div class="input-group mb-3">

                                    <span class="nombreImagenCargadaEdi text-muted"> </span>

                                </div>

                            </div>

                            <!-- ************************************************ -->
                            <!-- ********** PREVISUALIZACIÓN DE IMÁGEN ********** -->
                            <!-- ************************************************ -->
                            <div class="imagenPrevia" id="imagenPrevia">

                                <img src="views/img/admins/default/default.png" alt="" id="img-foto-edit" class="img-fluid imagenAdmins">
                                <hr>
                                <p><b>Nombre de la imágen: </b> <span id="editarnNombreImagenAdmins"></span></p>
                                <p class="lineaPImgAdmin"><b>Tamaño de la imágen: </b> <span id="editarTamanoImagenAdmins"></span></p>
                                <p class="lineaPImgAdmin"><b>Tipo de la imágen:   </b> <span id="editarExtensImagenAdmins"></span></p>

                            </div>

                            <!-- ******************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DE USUARIO ********** -->
                            <!-- ******************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Anotaciones adicionales respecto al administrador: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(Opcional) Anotaciones adicionales respecto al administrador: " class="form-control editarAnotaciones_usuario" placeholder="Agregue en este apartado si es necesario observaciones adicionales respecto a este administrador ..." name="editarAnotaciones_usuario" id="editarAnotaciones_usuario" cols="30" rows="10"></textarea>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        // $actualizarAdministrador = new ControladorAdministradores();
                        // $actualizarAdministrador -> ctrActualizarAdministrador();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="text-white btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Actualizar Admin</button>

                    <button type="button" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->


        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog --> 

</div> <!-- Cierra Modal Fade -->
