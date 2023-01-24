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

<!-- /*********************************************************************/ -->
<!-- /*********************************************************************/ -->

<div class="content-wrapper" style="min-height: 823px;">
    
  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Habitaciones del Hotel</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Habitaciones</li>

          </ol>

        </div><!-- /.col -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">

    <div class="container-fluid">

      <div class="row">

        <!-- *********************************************** -->
        <!-- ***** LISTADO DE HABITACIONES REGISTRADAS ***** -->
        <!-- *********************************************** -->
        
        <div class="col-xl-5">

          <div class="card card-primary card-outline">

            <!-- card-header -->
            <div class="card-header pl-2 pl-sm-3">
            
              <a href="habitaciones" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Crear nueva habitación</a>

              <div class="card-tools">
                
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>

              </div>      

            </div> <!-- card-header -->

            <!-- body-card -->
            <div class="card-body">

              <table style="width: 100%;" class="table table-sm table-bordered table-hover table-striped dt-responsive display nowrap" id="tablaHabitaciones">

                <thead class="estiloTablasGeneral">
                  
                  <tr>
                    
                    <th>#</th> 
                    <th>Color</th>
                    <th>Categoría Hab.</th>
                    <th>Estado Habitación</th>
                    <th>Habitación</th>
                    <th>Opciones</th>

                  </tr>

                  <tbody>

                  </tbody>

                </thead>

              </table>

            </div> <!-- body-card -->

          </div> <!-- card card-primary -->

        </div> <!-- col-xl-4 -->

        <!-- ****************************************************** -->
        <!-- ***** GESTOR GENERAL DE HABITACIONES REGISTRADAS ***** -->
        <!-- ****************************************************** -->

        <?php

          /**Recordemos que, al dar clic en el ojito de ver habitación, enviamos la variable GET con
           * el ID de la habitación y pre cargamos pero esta vez con la habitación que vamos a requerir: */
          if(isset($_GET["id_h"])){

            $habitacion = ControladorHabitaciones::ctrMostrarhabitaciones($_GET["id_h"]); /**Re usamos el mismo del AJAX y le mandamos la variable GET de parámetro */

          }else{

            $habitacion = null;

          }

        ?>

        <div class="col-xl-7">

          <div class="card card-secondary card-outline">

            <!-- **************************************************************************** -->
            <!-- **************** HEADER DE CATEGORÍA Y ESTILO DE HABITACIÓN **************** -->
            <!-- **************************************************************************** -->

            <div class="card-header">

              <h5  class="card-title"><b>Categoría: </b><?php echo isset($habitacion["tipo"]) ? $habitacion["tipo"] : 'Sin Seleccionar' ?> / <b>Habitación: </b><?php echo isset($habitacion["estilo"]) ? $habitacion["estilo"] : 'Sin Seleccionar' ?> - <?php echo isset($habitacion["descripcion"]) ? $habitacion["descripcion"] : '...' ?></h5>

              <!-- Programo acá un Preload  si fuera utilizar JQuery para esperar que se haga la transacción -->
              <div class="preload"></div>
  
              <div class="card-tools">

                <button type="button" class="btn btn-success btn-sm guardarHabitacion">
                  
                  <i class="fas fa-save"></i> Guardar Habitación
                
                </button>
            
                <?php 

                  /**Entonces, si dado el caso tenemos data, debemos contener en algún elemento la eliminación, es decir
                   * guardamos el id de eliminar para poder eliminar luego las imágenes relacionadas con la habitación y no dejar
                   * basura en la base de datos 
                   * Validamos si tenemos variable GET, o sea habitación, habilitamos para la eliminación*/
                  if($habitacion != null){

                    $galeria = json_decode($habitacion["galeria"], true);

                    /**Recordemos que el implode nos volverá a convertir el array que tenemos ahora en un String y lo separa por comas ,*/
                    echo '<button type="button" class="btn btn-danger btn-sm eliminarHabitacion" idEliminarHab="'.$habitacion["id_h"].'" galeriaHabitacion="'.implode(",", $galeria).'" recorridoHabitacion="'.$habitacion["recorrido_virtual"].'">
                  
                          <i class="fas fa-trash"></i> Eliminar Habitación

                        </button>';

                  }

                ?>

              </div>

            </div> <!-- /.header-card -->

            <!-- ************************************************************** -->
            <!-- **************** BODY GENERAL PARA HABITACIÓN **************** -->
            <!-- ************************************************************** -->

            <div class="card-body">
              
              <!-- Capturamos el ID de la habitación que vamos a actualizar! -->
              <input type="hidden" class="idHabitacion" value="<?php echo $habitacion["id_h"]?>">

              <!-- ****************************************************************** -->
              <!-- **************** CATEGORÍA Y NOMBRE DE HABITACIÓN **************** -->
              <!-- ****************************************************************** -->

              <div class="d-flex flex-column flex-md-row justify-content-start mb-3">
                
                <div class="form-inline mx-3 px-3">

                  <div class="row">

                    <div class="col-md-6">
                  
                      <div class="input-group mb-3">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon3"><b class="text-muted"><i class="fa-solid fa-hotel"></i> Categoría:</b></span>
                          
                        </div>

                        <?php 

                          /**Estamos en el modo edición, entonces, el campo de tipo no se actualiza ...
                           * Importante, sobre el mismo value del OPTION colocaré tanto el ID como el nombre para luego, por medio de un Split acceder
                           * tanto al nombre como el ID por medio de indicies. */
                          if($habitacion != null){

                            echo '<select class="form-control seleccionarTipo" readonly>
                              
                              <option value="'.$habitacion["id"].','.$habitacion["tipo"].'">'.$habitacion["tipo"].'</option>

                            </select>';
                          
                          /**Quiere decir que vamos a guardar una nueva, entonces presento las opciones: */
                          }else{

                            echo '<select class="form-control seleccionarTipo">

                              <option value="">Seleccione</option>';

                              $categorias = ControladorCategorias::ctrMostrarCategorias(null, null);

                              foreach ($categorias as $key => $value) {
                              
                                echo '<option value="'.$value["id"].','.$value["tipo"].'">'.$value["tipo"].'</option>';
                              
                              }

                            echo '</select>';    

                          }

                        ?>
                        
                      </div>  

                    </div>

                    <div class="col-md-6">

                      <div class="input-group mb-3">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon3"><b class="text-muted"><i class="fa-solid fa-bed"></i> Habitación:</b></span>

                        </div>
                        
                        <!-- Para mostrar el estilo -> nombre de la habitación -->
                        <?php 

                          if($habitacion != null){
                            /**No podemos editar el estilo de la habitación:  */
                            echo '<input type="text" class="form-control seleccionarEstilo" value="'.$habitacion["estilo"].'" readonly>';
                          
                          }else{

                            echo '<input type="text" placeholder="Habitación ..." class="form-control seleccionarEstilo">';

                          }

                        ?>  

                      </div>

                    </div>

                    <div class="col-md-8">

                      <div class="input-group mb-3">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon3"><b class="text-muted"><i class="fa-solid fa-bed"></i> Descripción:</b></span>

                        </div>

                        <?php 

                          if($habitacion != null){
                            /**No podemos editar el descriptivo de la habitación:  */
                            echo '<input type="text" class="form-control seleccionarDescripcion" value="'.$habitacion["descripcion"].'" readonly>';
                          
                          }else{

                            echo '<input type="text" placeholder="Descripción ..." class="form-control seleccionarDescripcion" readonly>';

                          }

                        ?>  

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="input-group mb-3">

                        <div class="input-group-prepend">

                          <span class="input-group-text" id="basic-addon3"><b class="text-muted"><i class="fa-solid fa-check-to-slot"></i> Estado:</b></span>

                        </div>

                        <?php 

                          if($habitacion != null){

                            if($habitacion["estado"] == "1"){

                              echo '<input type="button" class="form-control btn btn-info btnActivarHabitacion" onclick="gestionarEstHabitacion('.$habitacion["id_h"].')" estadoHabitacion="1" idHabitacionEstado="'.$habitacion["id_h"].'" value="Disponible para Cliente">';

                            }else{

                              echo '<input type="button" class="form-control btn btn-dark btnActivarHabitacion" onclick="gestionarEstHabitacion('.$habitacion["id_h"].')" estadoHabitacion="0" idHabitacionEstado="'.$habitacion["id_h"].'" value="Inhabilitado para Cliente">';

                            }
                          
                          }else{

                            echo '<input type="button" class="form-control btn btn-secondary btnActivarHabitacion" value="Activo por defecto" disabled>';

                          }

                        ?>  

                      </div>

                    </div>

                  </div> <!-- row -->

                </div>

              </div>
              
              <!-- ************************************************** -->
              <!-- **************** GALERÍA IMÁGENES **************** -->
              <!-- ************************************************** -->

              <div class="card rounded-lg card-secondary card-outline">
                
                <div class="card-header pl-2 pl-sm-3">

                  <h5>Galería de Imágenes:</h5>

                </div>

                <div class="card-body">  

                  <ul class="row p-0 vistaGaleria">

                  <?php 

                    /**Vamos a usar en el button la clase quitarFotoAntigua para hacer la misma funcionalidad que el quitarFoto de
                     * la nueva galería pero, esta vez, a la antigua galería y, adicional, el atributo temporal lo vamos a asignar
                     * de entrada con el valor que nos trae la galería antigua que ya tenemos registrada. */
                    if($habitacion != null){

                      $galeria = json_decode($habitacion["galeria"], true); /**Convierto ese String en un array */

                      foreach ($galeria as $key => $value) {

                        echo '<li class="col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none">
                      
                                <img class="card-img-top" src="'.$value.'">

                                <div class="card-img-overlay p-0 pr-3">
                                  
                                   <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoAntigua" id="quitarFotoAntigua" temporal="'.$value.'">
                                     
                                     <i title="Remover Imagen" class="fas fa-trash"></i>

                                   </button>

                                </div>

                              </li>';

                      }

                    }

                   ?>
                    
                  </ul>

                </div>

                <!-- Guardo en inputs ocultos la nueva galería que resulta del arrastre o la antigua antes de ser actualizada -->
                <input type="hidden" class="inputNuevaGaleria">
                
                <!-- Mantendremos en una variable almacenada la antigua galería para que nos sirva para tener un retorno o espejo
                comparativo a la hora de validar y envíar las imágenes cuando vamos a actualizar una habitación y no solo para agregar nuevas ...
                El implode es para que me convierta en un array las imágenes, todo lo que encuentre con , lo convertirá en un índice.
              
                En conclusión, arriba lo teniamos convertido en un array, acá lo volvemos a convertir en una cadena de texto separada por comas
                para tener guardado el pre galería por si se modifica allí algo.

                -->
                <input type="hidden" class="inputAntiguaGaleria" value="<?php if($galeria){ echo implode(",", $galeria); } else {  } ?>">

                <div class="card-footer">
                  
                  <!-- Importantísimo el tema del ID galeria para manejar la subida de imagenes sin necesidad de arrastrar -->
                  <input type="file" multiple id="galeria" class="d-none"> <!-- multiple para poder contener varias imágenes al tiempo, y lo mantengo oculto para que a traves del input pueda usar un área para hacer clic y traer las imágenes del label siguiente (Con el label aplicando la etiqueta for al id del input file nos funciona la generalidad para aplicar el input): -->

                  <label for="galeria" class="text-dark text-center py-5 border rounded bg-white w-100 subirGaleria">

                    Haz clic aquí o arrastra las imágenes <br>
                    <span class="help-block small">Dimensiones: 940px * 480px | Peso Max. 2MB | Formato: JPG o PNG</span>
                     
                  </label>

                </div>

              </div>

              <!-- ******************************************************** -->
              <!-- **************** VÍDEO E IMAGEN DE 360° **************** -->
              <!-- ******************************************************** -->

              <div class="row">

                <div class="col-12 col-xl-6">

                  <div class="card rounded-lg card-secondary card-outline">
                    
                    <div class="card-header pl-2 pl-sm-3">
                        
                      <h5>Vídeo Habitación:</h5>

                    </div>

                    <!-- En este div visualizaremos el vídeo de youtube -->
                    <div class="card-body vistaVideo">

                    <!-- Solo si tenemos una habitación mostramos, de lo contrario, proponemos data desde JS -->
                    <?php if ($habitacion != null): ?>

                        <iframe width="100%" height="320" src="https://www.youtube.com/embed/<?php echo $habitacion["video"]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       
                    <?php endif ?>
                      
                    
                    </div>

                    <div class="card-footer">
                      
                      <div class="input-group"> 

                        <div class="input-group-prepend">
                          <span class="p-2 bg-secondary rounded-left small">youtube.com/watch?v=</span>
                        </div>

                      <!-- Solo si tenemos una habitación mostramos, de lo contrario, proponemos data desde JS -->
                      <?php if ($habitacion != null): ?>
                        
                        <input type="text" class="form-control agregarVideo" placeholder="Agregue el código del vídeo" value="<?php echo $habitacion["video"]; ?>">

                      <?php else: ?>

                        <input type="text" class="form-control agregarVideo" placeholder="Agregue el código del vídeo">

                      <?php endif ?>

                      </div>

                    </div>

                  </div>
                  
                </div>

                <div class="col-12 col-xl-6">
                  
                  <div class="card rounded-lg card-secondary card-outline">
                    
                    <div class="card-header pl-2 pl-sm-3">

                      <h5>Recorrido Virtual (360°):</h5>

                    </div>
                    
                    <!-- Aquí en neste div enviaremos la visualización de la imagen a 360° -->
                    <div class="card-body ver360">
                    
                      <!-- Solo si tenemos una habitación mostramos, de lo contrario, proponemos data desde JS -->
                      <?php if ($habitacion != null): ?>
                        
                        <div class="pano 360Antiguo" back="<?php echo $habitacion["recorrido_virtual"]; ?>">

                          <div class="controls">
                            <a href="#" class="left">&laquo;</a>
                            <a href="#" class="right">&raquo;</a>
                          </div>

                        </div>

                      <?php endif ?>

                    </div>

                    <div class="card-footer"> 
                       
                       <!-- Así como en galería, capturamos la antigua imagen de 360° por si no se va cambiar y para mantener el control
                       si dado el caso si se llega a cambiar -->
                       <input type="hidden" class="antiguoRecorrido" value="<?php echo $habitacion["recorrido_virtual"]; ?>">

                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen360">
                        <label class="custom-file-label" for="imagen360">Agregar imagen 360°</label>
                      </div>

                    </div>

                  </div>

                </div>
                
              </div>

              <!-- *********************************************************** -->
              <!-- **************** DESCRIPCIÓN DE HABITACIÓN **************** -->
              <!-- *********************************************************** -->

              <div class="card rounded-lg card-secondary card-outline">

                <div class="card-header pl-2 pl-sm-3">

                  <h5>Descripción de la Habitación:</h5>

                </div>

                <!-- <div class="card-body"> -->

                  <div id="container">
                  
                    <textarea class="descripcionHabitacion" id="descripcionHabitacion">
                      
                      <?php 

                        if($habitacion != null){

                          echo $habitacion["descripcion_h"];

                        } 

                      ?>

                    </textarea>

                  </div>

                <!-- </div> -->

              </div>

            </div> <!-- card-body -->

            <!-- footer-card -->

            <div class="card-footer">
              
              <!-- Programo acá un Preload  si fuera utilizar JQuery para esperar que se haga la transacción -->
              <div class="preload"></div>
              
              <div class="card-tools float-right">
            
                <!-- <button type="button" class="btn btn-info btn-sm guardarHabitacion">
                  
                  <i class="fas fa-save"></i> Guardar Footer
                
                </button> -->

                <p class="text-muted">Administración de Habitaciones.</p>

                <?php 

                  // if($habitacion != null){

                  //   $galeria = json_decode($habitacion["galeria"], true);

                  //   echo '<button type="button" class="btn btn-danger btn-sm eliminarHabitacion" idEliminar="'.$habitacion["id_h"].'" galeriaHabitacion="'.implode(",", $galeria).'" recorridoHabitacion="'.$habitacion["recorrido_virtual"].'">
                  
                  //         <i class="fas fa-trash"></i> 

                  //       </button>';

                  // }

                ?>

              </div>

            </div> <!-- footer-card -->

          </div> <!-- card card-secondary card-outline -->

        </div>

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div><!-- /. content -->

</div> <!-- /.content-wrapper -->