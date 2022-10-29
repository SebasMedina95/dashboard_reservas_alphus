<div class="content-wrapper" style="min-height: 823px;">

    <!-- Content Header (Page header) -->
    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0">Configuración de Conceptos Contables para Nómina</h1>

                </div><!-- /.col -->

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

                        <li class="breadcrumb-item"><a href="empleados">Empleados</a></li>

                        <li class="breadcrumb-item active">Configuración Conceptos</li>

                    </ol>

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </div><!-- /.content-header -->

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

                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#crearConceptoNomina"><i class="fa-solid fa-folder-plus"></i> Agregar Concepto</a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="empleados"><i class="fa-solid fa-rotate-left"></i> Volver a Empleados</a>

                                    </div>

                                </li>

                            </ul>

                        </div>

                        <hr class="hrAnaliticaSitio">

                        <div class="card-body">

                            <!-- ******************************* -->
                            <!-- **** CONTENIDO DE LA TABLA **** -->
                            <!-- ******************************* -->
                            <!-- A partir de la tabla tablaConceptos lo obtendré desde JS para hacer el proceso
                            de asignación y trabajar trayendo la data con una petición AJAX. -->
                            <table style="width: 100%;" class="table table-hover table-striped dt-responsive display nowrap" id="tablaConceptos">

                                <thead class="estiloTablasGeneral">
                                
                                <tr>
                                    
                                    <th style="width:10px">#</th>
                                    <th>Opciones</th>
                                    <th>Capitulo</th>
                                    <th>Concepto</th>
                                    <th>Porcentaje</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>

                                </tr>

                                <tbody>

                                </tbody>

                                </thead>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div><!-- /.content-wrapper -->