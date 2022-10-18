<?php

class ControladorEmpleados{

    /**********************************************
	********** INGRESO DE ADMINISTRADORES *********
	***********************************************/

    public function ctrIngresoAdmonContenido(){

		if(isset($_POST["userLogin"])){
            /**Nada de caracteres especiales */
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["userLogin"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passLogin"])){
                /**Encriptamos la contraseña */
			   	$encriptarPassword = crypt($_POST["passLogin"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                //$encriptarPassword = $_POST["passLogin"];

			   	$tabla = "administradores";
			    $item = "usuario";
			    $valor = $_POST["userLogin"];

				$respuesta = ModeloEmpleados::mdlMostrarEmpleados($tabla, $item, $valor);
				/**Debo validar con el is_array por la versión de PHP 8 */
				if(is_array($respuesta) && $respuesta["usuario"] == $_POST["userLogin"] && $respuesta["password"] == $encriptarPassword){
                    /**El usuario debe estar validado */
					if($respuesta["estado"] == 1){
                        /**Creamos las variables de sesión */
						$_SESSION["validarSesionBackend"] = "ok";
				 		$_SESSION["idEmpleadoLogeado"] = $respuesta["id"];
                        /**Re direcciono al inicio por que todo esta OK 
                         * Si usamos $_SERVER["REQUEST_URI"] el nos va devolver pero a donde estabamos, REQUEST_URI captura la URL actual*/
				 		echo '<script>

                            Swal.fire({
                                position: "top-center",
                                icon: "success",
                                title: "Bienvenido al sistema!",
                                showConfirmButton: false,
                                timer: 1500
                            });

							setTimeout(function(){
                                window.location = "'.$_SERVER["REQUEST_URI"].'";
                             }, 1500);

				 		</script>';

			 		}else{

                        echo'<script>

                            swal.fire({
                                icon: "error",
                                title: "Oops... ERROR!",
                                text: "¡El usuario no se encuentra habilitado!",
                                
                            }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 

                            });

                        </script>';	

			 		} /**Usuario existe pero está inhabilitado */

				}else{

                    echo'<script>

                            swal.fire({
                                icon: "error",
                                title: "Oops... ERROR!",
                                text: "¡El usuario y/o la contraseña son incorrectos!",
                                
                            }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 

                            });

                        </script>';	

				} /**Usuario / Contraseña incorrectos. */

			}else{

                echo'<script>

                            swal.fire({
                                icon: "error",
                                title: "Oops... ERROR!",
                                text: "¡No se permite el uso de ningún tipo de caracter especial!",
                                
                            }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 

                            });

                        </script>';	

			} /**Tenemos que el usuario y contraseña coinciden */

		} /**Me llego $_POST["userLogin"] */

	} /**Método ctrIngresoAdmonContenido */

    /**********************************************
	*********** MOSTRAR ADMINISTRADORES ***********
	***********************************************/

	static public function ctrMostrarEmpleados($item, $valor){

		$tabla = "administradores";

		$respuesta = ModeloEmpleados::mdlMostrarEmpleados($tabla, $item, $valor);

		return $respuesta;

	} /**Método ctrMostrarAdministradores */

    /*****************************************
	********** REGISTRO DE EMPLEADOS *********
	******************************************/
    public function ctrRegistroEmpleados(){
        /**Que nos venga alguna de las variables POST */
        
        if(isset($_POST["documento"])){

            /************************************************** */
            /************ Encriptamos la contraseña *********** */
            /************************************************** */
            $encriptarPassword = crypt($_POST["passwordUsuario"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            /******************************************************************************************* */
            /***************************************** IMPORTANTE! ***************************************
             * Las validaciones en general se hicieron vía JS en el archivo administradores.js,
             * aquí consolidamos las validaciones y no dejaremos llegar si no se cumple con la lógica
             * del negocio, todas las validaciones se harán este punto para que la info llegue "pulpa".*/
            /******************************************************************************************* */

            if(isset($_FILES["fotoUsuario"]["tmp_name"]) && !empty($_FILES["fotoUsuario"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["fotoUsuario"]["tmp_name"]);
                /**Nuevas dimensiones */
                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /********************************************************** */
                /****** GENERAMOS EL DIRECTORIO PARA GUARDAR LA IMÁGEN ******/
                /********************************************************** */
                /**Sobre el elemento de control */
                $directorio = "views/img/admins/".$_POST["documento"];	

                if(!file_exists($directorio)){	

                    mkdir($directorio, 0755);

                }

                /************************************************************************************** */
                /******* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP ****** */
                /******* Ya tenemos la validación general para JPG y PNG en JS, entonces omitimos *******/ 
                /*************** parte de la validación por que ya garantizamos lo que llega ************/
                /************************************************************************************** */
                /**Si es una imágen JPG */
                if($_FILES["fotoUsuario"]["type"] == "image/jpeg"){

                    //$aleatorio = mt_rand(100,999);

                    $ruta = $directorio."/".$_POST["documento"].".jpg";

                    $origen = imagecreatefromjpeg($_FILES["fotoUsuario"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    
                    imagejpeg($destino, $ruta);	
                
                /**Si es una imágen PNG */
                }else if($_FILES["fotoUsuario"]["type"] == "image/png"){

                    //$aleatorio = mt_rand(100,999);

                    $ruta = $directorio."/".$_POST["documento"].".png";

                    $origen = imagecreatefrompng($_FILES["fotoUsuario"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagealphablending($destino, FALSE);
        
                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }else{

                    echo '<script> 
            
                        Swal.fire({
                            icon: "error",
                            title: "¡ Opss ... Error !",
                            text: "Las imágenes solo pueden ser JPG o PNG ...!"
                        }).then(function(result){

                            if(result.value){   
                                window.location = "'.$_SERVER["REQUEST_URI"].'";
                            } 

                        });
                    
                    </script>';

                    return;

                }
            
            /**Entonces dejaremos la ruta por defecto de la imagen Default */
            }else{

                $ruta = "views/img/admins/default/default.png";
    
            }

            $tabla = "administradores";

            // echo 'LA VARIABLE DATE ME LLEGA COMO: ' . $_POST["fecha_nacimiento"];

            // return;

            $datos = array("perfil" => $_POST["perfil"],
                           "primer_nombre" => $_POST["primerNombre"],
                           "segundo_nombre" => $_POST["segundoNombre"],
                           "primer_apellido" => $_POST["primerApellido"],
                           "segundo_apellido" => $_POST["segundoApellido"],
                           "tipo_documento" => $_POST["tipoDocumento"],
                           "documento" => $_POST["documento"],
                           "email" => $_POST["correoElectronico"],
                           "telefono_fijo" => $_POST["telefonoFijo"],
                           "telefono_movil" => $_POST["telefonoCelular"],
                           "direccion" => $_POST["direccion"],
                           "fecha_nacimiento" => $_POST["fecha_nacimiento"],
                           "estado_civil" => $_POST["estado_civil"],
                           "tipo_regimen" => $_POST["tipo_regimen"],
                           "tipo_persona" => $_POST["tipo_persona"],
                           "anotaciones_usuario" => $_POST["anotaciones_usuario"],
                           "usuario" => $_POST["nombreUsuario"],
                           "password" => $encriptarPassword,
                           "foto" => $ruta,
                           "estado" => "0");


            $respuesta = ModeloEmpleados::mdlRegistroEmpleados($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El administrador ha sido creado correctamente!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            }else{

                echo '<script> 
                
                    Swal.fire({
                        icon: "error",
                        title: "¡ Opss ... Error !",
                        text: "No pudimos registrar al administrador!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            } /**Condicional ¿Ok? de Admins */	

        } /**Condicional vienen variables POST */

    } /**Método de ctrRegistroAdministrador */


} /**Class ControladorEmpleados*/

?>