<div class="content-wrapper" style="min-height: 823px;">

    <!-- Content Header (Page header) -->
    <div class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1 class="m-0">Contratos</h1>

                </div><!-- /.col -->

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

                        <li class="breadcrumb-item"><a href="empleados">Empleados</a></li>

                        <li class="breadcrumb-item active">Contratos Empleados</li>

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

                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#crearContratoEmpleado"><i class="fa-solid fa-folder-plus"></i> Agregar Contrato</a>

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
                        <!-- A partir de la tabla tablaContratosAdmins lo obtendré desde JS para hacer el proceso
                        de asignación y trabajar trayendo la data con una petición AJAX. -->
                        <table style="width: 100%;" class="table table-hover table-striped dt-responsive" id="tablaContratosEmpleados">

                            <thead class="estiloTablasGeneral">
                            
                            <tr>
                                
                                <th></th>
                                <th>Opciones: </th>
                                <th>Fotografía: </th>
                                <th>Doc_Empleado: </th>
                                <th>Nombre_Empleado: </th>
                                <th>Identificación_Contratación: </th>
                                <th>Salario_Básico: </th>
                                <th>Cuenta_Ahorros: </th>
                                <th>%_Riesgo: </th>
                                <th>Periodo_Pago: </th>
                                <th>Tipo_Contrato: </th>
                                <th>Inicio_Contratación: </th>
                                <th>Fin_Contratación: </th>
                                <th>Cargo_Empleado: </th>
                                <th>Estado_Contratación: </th>
                                <th>Anotaciones_Contrato: </th>
                                <th>Registro: </th>

                            </tr>

                            <tbody>

                            </tbody>

                            </thead>

                        </table>

                        </div>

                        <div class="card-footer">

                        <p class="card-text float-right text-muted"> Contratos de Empleados/Administradores del Hotel.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div><!-- /.content-wrapper -->

<style>
    #tablaContratosAdmins tbody td:eq(0) {
        text-align: left;
    }
    #tablaContratosAdmins tbody td img {
        text-align: center;
    }
</style>