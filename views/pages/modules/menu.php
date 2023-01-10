<?php 

$item = "id";
$valor = $_SESSION["idEmpleadoLogeado"];
$administrador = ControladorEmpleados::ctrMostrarEmpleados($item , $valor);

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="inicio" class="brand-link">

    <img src="views/img/plantilla/iconoAlphus.png" alt="Hotel Alphus" class="brand-image img-circle elevation-3" style="opacity: .8">

    <span class="brand-text font-weight-light">Hotel Alphus</span>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="image">

        <?php if(!$administrador["foto"] == ""): ?>

          <img src="<?php echo $administrador["foto"]; ?>" class="img-circle elevation-2 tamImagenHeader" alt="User Image">

        <?php else: ?>

          <img src="../../../views/img/admins/default/default.png" class="img-circle elevation-2 tamImagenHeader" alt="User Image">

        <?php endif; ?>

      </div>

      <div class="nombreMenuUserLog0 info">

        <a href="#" class="d-block">

          <span class="d-block nombreMenuUserLog1"> <?php echo $administrador["primer_nombre"] .' '.$administrador["segundo_nombre"] ?> </span>

          <span class="d-block nombreMenuUserLog2"> <?php echo $administrador["primer_apellido"] .' '.$administrador["segundo_apellido"] ?> </span>
        
        </a>

      </div>

    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">

      <div class="input-group" data-widget="sidebar-search">

        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar Página ..." aria-label="Search">

        <div class="input-group-append">

          <button class="btn btn-sidebar">

            <i class="fas fa-search fa-fw"></i>

          </button>

        </div>

      </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <!-- <li class="nav-item">

          <a target="_blanck" href="<?php echo $ruta; ?>" class="nav-link active">

            <i class="fa-solid fa-hotel"></i>

            <p>  Hotel</p>

          </a>

        </li> -->

        <li class="nav-item">

            <?php if($_GET["pagina"] == "inicio"): ?>

              <a href="inicio" class="nav-link active">

            <?php else: ?>

              <a href="inicio" class="nav-link">

            <?php endif; ?>

            <i class="fa-solid fa-globe"></i>

            <p>  Inicio Admon</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "empleados"): ?>

            <a href="empleados" class="nav-link active">

          <?php else: ?>

            <a href="empleados" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-user-tie"></i>

            <p>  Empleados</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "banner"): ?>

            <a href="banner" class="nav-link active">

          <?php else: ?>

            <a href="banner" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-image"></i>

            <p>  Banner</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "planes"): ?>

            <a href="planes" class="nav-link active">

          <?php else: ?>

            <a href="planes" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-bag-shopping"></i>

            <p>  Planes</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "categorias"): ?>

            <a href="categorias" class="nav-link active">

          <?php else: ?>

            <a href="categorias" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-table-list"></i>

            <p>  Categorías Habitación</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "habitaciones"): ?>

            <a href="habitaciones" class="nav-link active">

          <?php else: ?>

            <a href="habitaciones" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-bed"></i>

            <p>  Habitaciones</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "reservas"): ?>

            <a href="reservas" class="nav-link active">

          <?php else: ?>

            <a href="reservas" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-calendar-days"></i>

            <p>  Reservas</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "testimonios"): ?>

            <a href="testimonios" class="nav-link active">

          <?php else: ?>

            <a href="testimonios" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-user-check"></i>

            <p>  Testimonios</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "usuarios"): ?>

            <a href="usuarios" class="nav-link active">

          <?php else: ?>

            <a href="usuarios" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-users"></i>

            <p>  Usuarios</p>

          </a>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "atracciones" || $_GET["pagina"] == "servicioAtracciones"): ?>

            <a href="#" class="nav-link active">

          <?php else: ?>

            <a href="#" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-bus"></i>

            <p> Atracciones

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <?php if($_GET["pagina"] == "atracciones"): ?>

                <a href="atracciones" class="nav-link active">

              <?php else: ?>

                <a href="atracciones" class="nav-link">

              <?php endif; ?>

                <i class="far fa-circle nav-icon"></i>

                <p>Atracción</p>

              </a>

            </li>

            <li class="nav-item">

              <?php if($_GET["pagina"] == "servicioAtracciones"): ?>

                <a href="servicioAtracciones" class="nav-link active">

              <?php else: ?>

                <a href="servicioAtracciones" class="nav-link">

              <?php endif; ?>

                <i class="far fa-circle nav-icon"></i>

                <p>Servicio</p>

              </a>

            </li>

          </ul>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "restaurante" || $_GET["pagina"] == "comprasRestaurante" || $_GET["pagina"] == "ventasRestaurante"): ?>

            <a href="#" class="nav-link active">

          <?php else: ?>

            <a href="#" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-utensils"></i>

            <p> Restaurante

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <?php if($_GET["pagina"] == "restaurantes"): ?>

                <a href="restaurantes" class="nav-link active">

              <?php else: ?>

                <a href="restaurantes" class="nav-link">

              <?php endif; ?>

                <i class="far fa-circle nav-icon"></i>

                <p>Round de Imágenes</p>

              </a>

            </li>

            <li class="nav-item">

              <?php if($_GET["pagina"] == "carta"): ?>

                <a href="carta" class="nav-link active">

              <?php else: ?>

                <a href="carta" class="nav-link">

              <?php endif; ?>

                <i class="far fa-circle nav-icon"></i>

                <p>Carta</p>

              </a>

            </li>

            <li class="nav-item">

              <?php if($_GET["pagina"] == "comprasRestaurante"): ?>

                <a href="comprasRestaurante" class="nav-link active">

              <?php else: ?>

                <a href="comprasRestaurante" class="nav-link">

              <?php endif; ?>

                <i class="far fa-circle nav-icon"></i>

                <p>Compras</p>

              </a>

            </li>

            <li class="nav-item">

              <?php if($_GET["pagina"] == "ventasRestaurante"): ?>

                <a href="ventasRestaurante" class="nav-link active">

              <?php else: ?>

                <a href="ventasRestaurante" class="nav-link">

              <?php endif; ?>

                <i class="far fa-circle nav-icon"></i>

                <p>Ventas</p>

              </a>

            </li>

          </ul>

        </li>

        <li class="nav-item">

          <?php if($_GET["pagina"] == "plantilla-hotel"): ?>

            <a href="plantilla-hotel" class="nav-link active">

          <?php else: ?>

            <a href="plantilla-hotel" class="nav-link">

          <?php endif; ?>

            <i class="fa-solid fa-paintbrush"></i>

            <p>  Plantilla Hotel </p>

          </a>

        </li>

      </ul>
      
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>