<div class="content-wrapper" style="min-height: 823px;">
    
  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Resumen Estadístico del Hotel</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Resumen Estadístico del Hotel</li>

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

        <div class="col-lg-12">

          <div class="card card-primary card-outline">

            <div class="card-header border-transparent">

              

            </div>

            <hr class="hrAnaliticaSitio">

            <div class="card-body">

              <!-- Main content -->
              <section class="content">

                <div class="container-fluid">

                  <div class="row">

                      <?php 

                        include "modules/top.php";

                      ?>

                      <div class="col-3">

                      <?php 

                        include "modules/mejorHabitacion.php";

                      ?>

                      </div>

                      <div class="col-3">

                      <?php 

                        include "modules/peorHabitacion.php";

                      ?>

                      </div>

                      <div class="col-6">

                        <?php 

                          include "modules/ventas.php";

                        ?>

                      </div>

                      <div class="col-6">

                        <?php 

                          include "modules/calendario.php";

                        ?>
                        
                      </div>

                      <div class="col-6">

                        <div class="col-12">

                          <?php 

                            include "modules/ultimosUsuarios.php";

                          ?>

                        </div>

                        <div class="col-12">

                          <?php 

                            include "modulos/ultimasReservas.php";

                          ?>

                        </div>
                        
                      </div>

                    </div>

                  </div>

                </div>

              </section>

            </div>

            <div class="card-footer">

              <p class="card-text float-right text-muted"> Informe General Analítico de Data.</p>

            </div>

          </div><!-- /.card -->

        </div><!-- /.col-md-6 -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div><!-- /. content -->

</div> <!-- /.content-wrapper -->