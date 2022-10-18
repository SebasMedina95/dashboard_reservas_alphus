<?php

// require_once "../../controladores/ruta.controlador.php";

// $ruta = ControladorRuta::ctrRuta();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso Admon Alphus</title>
    <link rel="icon" href="views/img/plantilla/iconoAlphus.png">
    <!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" integrity="zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=">
    <link rel="stylesheet" href="views/resources/css/login.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

    <section>

        <div class="imgBx">

            <img src="views/img/plantilla/pexels-karolina-grabowska-7603108.jpg">

        </div>

        <div class="contentBx">

            <div class="formBx">

                <img class="imgLogo" src="views/img/plantilla/alphus_complete_banner.png" alt="">

                <h2>Acceso al Administrador</h2>

                <form method="POST">

                    <div class="inputBx">

                        <span><i class="fa-solid fa-user"></i> <b> Usuario: </b></span>

                        <input class="form-control" type="text" name="userLogin" id="userLogin" placeholder="Ingrese el usuario ..." autocomplete="off" required>

                    </div>

                    <div class="inputBx">

                        <span><i class="fa-solid fa-key"></i> <b> Password: </b></span>

                        <input class="form-control" type="password" name="passLogin" id="passLogin" placeholder="Ingrese el password ..." autocomplete="off" required>

                    </div>

                    <div class="inputBx">

                        <button type="submit"><i class="fa-solid fa-sign-in"></i>  Ingresar</button>

                    </div>

                    <hr>

                    <div class="inputBx">

                        <p>¿Olvido su contraseña? <a href="#">Ingrese aquí</a></p>

                        <p>Puede volver al sitio dando click <a href="<?php echo $ruta; ?>">en este enlace <i class="fa-solid fa-globe"></i></a></p>

                    </div>

                    <?php

                    $ingreso = new ControladorEmpleados();
                    $ingreso -> ctrIngresoAdmonContenido(); 


                    ?> 

                </form>

            </div>

        </div>

    </section>

</body>
</html>