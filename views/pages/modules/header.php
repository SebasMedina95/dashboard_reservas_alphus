<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <!-- ********** INFORMACIÓN BIENVENIDA ********** -->
  <ul class="navbar-nav">

    <li class="nav-item">

      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

    </li>

    <li class="nav-item d-none d-sm-inline-block">

      <a href="#" class="nav-link"><b>Bienvenido</b>, Empleados del Sistema. </a>

    </li>

  </ul>

  <!-- ********** TODO EL APARTADO DE PERSONA LOGEADA ********** -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown">

      <a class="nav-link" data-toggle="dropdown" href="#">

        <!-- <i title="Usuario Actual" class="fa-solid fa-user"></i> -->
        <div class="imgPanel user-panel">

          <!-- <div class="image"> -->

            <img src="views/img/plantilla/user2-160x160.jpg" class="img-circle" alt="User Image">

          <!-- </div> -->
          
        </div>

      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <div class="cabeceraPerfilLogeado">

          <span class="dropdown-header">Usuario Logeado en el Gestor</span>

        </div>

        <div class="imgUserLog mt-2 pb-2 mb-2 d-flex text-center">

          <div class="image">

            <img src="views/img/plantilla/user2-160x160.jpg" class="img-circle" alt="User Image">

          </div>
          
        </div>

        <div class="dropdown-divider"></div>
        
        <span class="spanMailLog text-muted text-sm"> JSebastian19952011@hotmail.com </span>

        <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-book"></i>  Documento:

            <span class="float-right text-muted text-sm"> CC - 1216717949 </span>

          </a>

        <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-user"></i></i> Nombre:

            <span class="float-right text-muted text-sm"> Juan Sebastian </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-user"></i>  Apellido:

            <span class="float-right text-muted text-sm"> Medina Toro </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-user-tie"></i>  Rol:

            <span class="float-right text-muted text-sm"> Administrador General </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-barcode"></i></i>  Cod. Usuario:

            <span class="float-right text-muted text-sm"> COD123456 </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-gear"></i>  Estado

            <span class="float-right text-muted text-sm badge badge-secondary text-white"> Activo </span>

          </a>

          <div class="dropdown-divider"></div>

          <div class="cabeceraPerfilLogeado">

            <a href="#" class="dropdown-item dropdown-footer"><i class="fa-solid fa-eye"></i> Visualizar Perfil</a>

            <a href="salir" class="dropdown-item dropdown-footer"><i class="fa-solid fa-right-to-bracket"></i> Finalizar Sesión</a>

          </div>

      </div>

    </li>

    <!-- ********** TODO LO RELACIONADO CON LAS NOTIFICACIONES ********* -->

    <li class="nav-item dropdown">

      <a class="nav-link" data-toggle="dropdown" href="#">

        <i title="Notificaciones del Hotel" class="far fa-bell"></i>

        <span class="badge badge-danger navbar-badge">15</span>

      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <span class="dropdown-header">Menu de Notificaciones</span>

        <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-users"></i> Usuarios

            <span class="float-right text-muted text-sm badge badge-info text-white"> + 4 </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-hotel"></i>  Nuevas Reservas

            <span class="float-right text-muted text-sm badge badge-warning text-white"> + 6 </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa-solid fa-book"></i></i>  Testimoniales

            <span class="float-right text-muted text-sm badge badge-success text-white"> + 5 </span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item dropdown-footer">Todas las Notificaciones</a>

      </div>

    </li>

    <!-- Todo lo que tiene que ver con el modo oscuro del sitio por medio del botón ... -->

    <li class="nav-item">

      <!-- <a class="nav-link cambiarModoLuz" modo="2" data-widget="control-sidebar" data-slide="true" href="#" role="button"> -->
      <a class="nav-link cambiarModoLuzPlantilla" data-widget="control-sidebar" data-slide="true" href="#" role="button">

        <i title="Modo Oscuro" class="fa-solid fa-moon"></i>

      </a>

    </li>

    <!-- Limpiador del sitio artesanal para limpiar caché por efectos indeseados de los navegadores -->

    <li class="nav-item">

      <a class="nav-link limpiarCacheSitio" href="#" role="button">

        <i title="Limpiar Caché y Recargar Página" class="fa-solid fa-broom"></i>

      </a>

    </li>

    <!-- Maximizador del sitio incorporado -->

    <li class="nav-item">

      <a class="nav-link" data-widget="fullscreen" href="#" role="button">

        <i title="Maximizar Ventana" class="fas fa-expand-arrows-alt"></i>

      </a>

    </li>

  </ul>

</nav>
<!-- /.navbar -->