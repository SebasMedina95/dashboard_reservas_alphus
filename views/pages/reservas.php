<div class="content-wrapper" style="min-height: 823px;">
    
  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Reservaciones del Hotel</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Reservaciones</li>

          </ol>

        </div><!-- /.col -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content-header -->

  <!--===============================================
  ****** Aquí pondrémos el gráfico de reservas ******
  ================================================-->
  <?php 

    include "modules/ventas.php";
    
  ?>

  <!-- Main content -->
  <div class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12">

          <div class="card card-primary card-outline">

            <!-- <div class="card-header border-transparent">

              <h3 class="card-title"><b>Reservaciones</b></h3>

              <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse">

                  <i class="fas fa-minus"></i>

                </button>

                <button type="button" class="btn btn-tool" data-card-widget="remove">

                  <i class="fas fa-times"></i>

                </button>

              </div> -->

            </div>

            <hr class="hrAnaliticaSitio">

            <div class="card-body">

              <table style="width: 100%;" class="table table-bordered table-hover table-striped dt-responsive display nowrap" id="tablaReservas">
                  
                  <thead class="estiloTablasGeneral">

                    <tr>

                      <th>#</th> 
                      <th>Acciones</th>          
                      <th>Código</th>
                      <th>Usuario</th>
                      <th>Pago</th>
                      <th>Pasarela</th>
                      <th>Ingreso</th> 
                      <th>Salida</th>           
                      <th>Reservación</th>           
                      <th>Transacción</th> 
                      <th>Descripción</th>

                    </tr>   

                  </thead>

                  <tbody>

                  </tbody>

              </table>

            </div>

            <div class="card-footer">

              <p class="card-text float-right text-muted"> Informe General de la Gestión de Reservas.</p>

            </div>

          </div><!-- /.card -->

        </div><!-- /.col-md-6 -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div><!-- /. content -->

</div> <!-- /.content-wrapper -->