<!-- **************************************************** -->
<!-- **** CREACIÓN DE UN CONTRATO DE ADMIN DEL HOTEL **** -->
<!-- **************************************************** -->
<div class="modal fade" tabindex="-1" role="dialog" id="agregarDetalleConceptoFicha">

    <div class="modal-dialog modal-lg" role="document">

        <form  onsubmit="return validarFormularioAddConceptoFichasAdmins('adicionar');" id="formAddConceptosFichaAdmins" method="POST">

            <div class="modal-content">

                <div class="modal-header bg-dark">

                    <h5 class="modal-title text-white">Agregar Concepto a ficha # <?php echo $_SESSION["idGetFichaSession"]; ?> </h5>

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

                            <!-- ******************************************************* -->
                            <!-- ******** MANDAMOS OCULTO EL CÓDIGO DE LA FICHA ******** -->
                            <!-- ******************************************************* -->
                            <input type="hidden" id="fichaDetalleConcepto" name="fichaDetalleConcepto" value="<?php echo $_SESSION["idGetFichaSession"] ?>">

                            <!-- **************************************** -->
                            <!-- ******** SELECCIONE EL CONCEPTO ******** -->
                            <!-- **************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(* Campo Requerido) Concepto Contable: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-list"></i></span>

                                    </div>

                                    <!-- Vamos a traer la data dibujada hacia el HTML, no es la manera mas eficaz,
                                    pero consideraremos aplicar ciertos filtros de limitación y de esta manera,
                                    no será un dibujado tan "violento" de información. -->
                                    <select title="(* Campo Requerido) Conceptos Contables Disponibles: " class="form-control select2bs4" id="selectAddConceptoFicha" name="selectAddConceptoFicha">
                                        <option value="0" selected>Seleccione un concepto: </option>
                                        <?php 

                                            /**Mandamos la variable de sessión como parámetro ... */
                                            $concetpo = ControladorContratoEmpleados::ctrMostrarConceptosLimit($_SESSION["idGetFichaSession"]);

                                            foreach ($concetpo as $key => $value1) {
                                                
                                                if($value1["capitulo"] == "1"){
                                                    $capitulo = "Cap. [SALARIO]. ";
                                                }else if($value1["capitulo"] == "2"){
                                                    $capitulo = "Cap. [DEDUCCIÓN]. ";
                                                }else if($value1["capitulo"] == "3"){
                                                    $capitulo = "Cap. [PRESTACIÓN]. ";
                                                }else if($value1["capitulo"] == "4"){
                                                    $capitulo = "Cap. [OTROS]. ";
                                                }else if($value1["capitulo"] == "5"){
                                                    $capitulo = "Cap. [COMPENSACIÓN FLEXIBLE]. ";
                                                }else if($value1["capitulo"] == "6"){
                                                    $capitulo = "Cap. [APOYO ECONÓMICO]. ";
                                                }else if($value1["capitulo"] == "7"){
                                                    $capitulo = "Cap. [PROVICIONES]. ";
                                                }else{
                                                    $capitulo = "[SIN DEFINIR]. ";
                                                }

                                                echo '<option value="'.$value1["id"].'">'.$capitulo.' Concepto: '.$value1["concepto"].' - '.$value1["porcentaje"].' %'.'</option>';

                                            }
                                        
                                        ?>
                                    </select>

                                </div>

                            </div>

                            <hr>

                            <!-- *********************************************************************** -->
                            <!-- ********** ANOTACIONES ADICIONALES DEL CONCEPTO SELECCIONADO ********** -->
                            <!-- *********************************************************************** -->
                            <div class="col-12">

                                <div class="input-group mb-3">

                                    <div class="input-group-prepend">

                                        <span title="(Opcional) Anotaciones adicionales referentes al concepto aplicado: " class="input-group-text" id="basic-addon1"><i class="fa-solid fa-quote-left"></i></span>

                                    </div>

                                    <textarea title="(Opcional) Anotaciones adicionales referentes al concepto aplicado: " class="form-control" placeholder="Agregue en este apartado si es necesario observaciones adicionales respecto al concepto que aplicará a la ficha ..." name="notas_concepto_ficha" id="notas_concepto_ficha" cols="30" rows="10"></textarea>

                                </div>

                            </div>

                        </div> <!-- Cierra Row -->

                    </div> <!-- Cierra Container -->

                    <?php 
                    
                        // $registroDetalleConceptoFicha = new ControladorContratoAdmins();
                        // $registroDetalleConceptoFicha -> ctrRegistroDelleCptoFicha();
                    
                    ?>

                </div> <!-- Cierra Modal Body -->

                <div class="modal-footer">

                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Agregar Concepto</button>

                    <button type="button" class="cancelarAdmins btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancelar</button>

                </div>

            </div> <!-- Cierra Modal Content -->

        </form> <!-- Cierra Formulario -->

    </div> <!-- Cierra Modal Dialog -->

</div> <!-- Cierra Modal Fade -->



<!-- ESTO QUE COLOCAMOS ACÁ NOS AYUDA A QUE NO SE SOLAPE EL BUSCADOR CON LA ESTRCUTURA DEL MODAL,
ES UN DESPERFECTO QUE SE TIENE CON EL PLUGUIN Y BOOTSTRAP CON MODALS, POR ENDE PODEMOS HACER
ESTO PARA SOLAPAR LA ESTRUCTURA BASE DEL DISEÑO. -->
<script>

//   $('#selectAddConceptoFicha').select2({
//         dropdownParent: $('#agregarDetalleConceptoFicha')
//   });

</script>