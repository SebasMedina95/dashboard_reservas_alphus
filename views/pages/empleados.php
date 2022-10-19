<div class="content-wrapper" style="min-height: 823px;">
    
  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0">Empleados Hotel</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

            <li class="breadcrumb-item active">Empleados</li>

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

              <!-- Barra de opciones -->
              <ul class="nav nav-pills">

                <li class="nav-item dropdown">

                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bars"></i> Menú Opciones</a>

                  <div class="dropdown-menu">

                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#crearAdministrador"><i class="fa-solid fa-plus"></i> Agregar Admin</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#"><i class="fa-solid fa-book"></i> Reporte Admins</a>

                  </div>

                </li>

                <!-- ********************************************************************************************************************* -->

                <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bars"></i> Nómina</a>

                  <div class="dropdown-menu">

                    <a class="dropdown-item" href="administradores-contratos"><i class="fa-solid fa-file-signature"></i> Contrato</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#"><i class="fa-solid fa-id-card-clip"></i> Fichas Nómina</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#"><i class="fa-solid fa-file-invoice-dollar"></i> Planillas Nómina</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#"><i class="fa-solid fa-file-contract"></i> Generar Nómina</a>

                  </div>

                </li>

                <!-- ********************************************************************************************************************* -->

                <li class="nav-item dropdown">

                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-bars"></i> Información Contable y Varios</a>

                  <div class="dropdown-menu">

                    <a class="dropdown-item" href="configuracion-global"><i class="fa-solid fa-sack-dollar"></i> Configuración Global</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="configuracion-cargos"><i class="fa-solid fa-font-awesome"></i> Configuración Cargos</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="conceptos"><i class="fa-solid fa-sitemap"></i> Configuración Conceptos</a>

                  </div>

                </li>

              </ul>

            </div>

            <hr class="hrAnaliticaSitio">

            <div class="card-body">

              <!-- ******************************* -->
              <!-- **** CONTENIDO DE LA TABLA **** -->
              <!-- ******************************* -->
              <!-- A partir de la tabla tablaEmpleados lo obtendré desde JS para hacer el proceso
              de asignación y trabajar trayendo la data con una petición AJAX. -->
              <table style="width: 100%;" class="table table-hover table-striped dt-responsive display nowrap" id="tablaEmpleados">

                <thead class="estiloTablasGeneral">
                  
                  <tr>
                    
                    <th style="width:10px"></th>
                    <th>Opciones: </th>
                    <th style="width:20px">Foto: </th>
                    <th>Identificación: </th>
                    <th>Nombres: </th>
                    <th>Apellidos: </th>
                    <th>Email: </th>
                    <th>Perfil: </th>
                    <th>Usuario: </th>
                    <th>Estado: </th>
                    <th>#.Tel Fijo: </th>
                    <th>#.Tel Móvil: </th>
                    <th>Dirección Residencial: </th>
                    <th>Tipo Régimen: </th>
                    <th>Tipo Persona: </th>
                    <th>Fecha Nacimiento: </th>
                    <th>Anotaciones Adicionales: </th>

                  </tr>

                  <tbody>

                  </tbody>

                </thead>

              </table>

            </div>

            <div class="card-footer">

              <p class="card-text float-right text-muted"> Informe General Gestión de Empleados.</p>

            </div>

          </div><!-- /.card -->

        </div><!-- /.col-md-6 -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div><!-- /. content -->

</div> <!-- /.content-wrapper -->