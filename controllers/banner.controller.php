<?php

class ControladorBanner{

	/**********************************************
	*********** MOSTRAR LISTADO BANNER ************
	***********************************************/

	static public function ctrMostrarBanner($item, $valor){

		$tabla = "banner";

		$respuesta = ModeloBanner::mdlMostrarBanner($tabla, $item, $valor);

		return $respuesta;

	}

	/**********************************************
	*********** REGISTRAR NUEVO BANNER ************
	***********************************************/

	public function ctrRegistroBanner(){

		if(isset($_FILES["subirBanner"]["tmp_name"]) && !empty($_FILES["subirBanner"]["tmp_name"])){

			list($ancho, $alto) = getimagesize($_FILES["subirBanner"]["tmp_name"]);

			$nuevoAncho = 1440;
			$nuevoAlto = 600;

			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL BANNER
			=============================================*/

			$directorio = "views/img/banner";		

			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

			if($_FILES["subirBanner"]["type"] == "image/jpeg"){

				$aleatorio = mt_rand(100,999);

				$ruta = $directorio."/".$aleatorio.".jpg";

				$origen = imagecreatefromjpeg($_FILES["subirBanner"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta);	

			}

			else if($_FILES["subirBanner"]["type"] == "image/png"){

				$aleatorio = mt_rand(100,999);

				$ruta = $directorio."/".$aleatorio.".png";

				$origen = imagecreatefrompng($_FILES["subirBanner"]["tmp_name"]);						

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

			$tabla = "banner";

			$respuesta = ModeloBanner::mdlRegistroBanner($tabla, $ruta);

			if($respuesta == "ok"){

				echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El banner ha sido creado correctamente!"
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
                        text: "No pudimos registrar al banner!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            }	

		}

	}

	/*=============================================
	Editar Banner
	=============================================*/

	public function ctrEditarBanner(){

		if(isset($_POST["editarIdBanner"])){
			
			if(isset($_FILES["editarFotoBanner"]["tmp_name"]) && !empty($_FILES["editarFotoBanner"]["tmp_name"])){				

				list($ancho, $alto) = getimagesize($_FILES["editarFotoBanner"]["tmp_name"]);

				$nuevoAncho = 1440;
				$nuevoAlto = 600;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL BANNER
				=============================================*/

				$directorio = "views/img/banner";
			
				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				if(isset($_POST["imgFotoBannerActual"])){
					
					unlink($_POST["imgFotoBannerActual"]);

				}

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["editarFotoBanner"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoBanner"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}

				else if($_FILES["editarFotoBanner"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFotoBanner"]["tmp_name"]);						

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

				$tabla = "banner";
				$id = $_POST["editarIdBanner"];

				$respuesta = ModeloBanner::mdlEditarBanner($tabla, $id, $ruta);

				if($respuesta == "ok"){

					echo '<script> 
                
						Swal.fire({
							icon: "success",
							title: "¡ Correcto !",
							text: "El banner ha sido actualizado correctamente!"
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
							text: "No pudimos actualizar al banner!"
						}).then(function(result){
		
							if(result.value || !result.value){   
								window.location = "'.$_SERVER["REQUEST_URI"].'";
							} 
		
						});
					
					</script>';

				}

			}		

		}	

	}

	/************************************************
	******* ELIMINACIÓN DE BANNER Y DE IMAGEN *******
	*************************************************/

	static public function ctrEliminarBanner($id, $ruta){
		
		unlink("../".$ruta); //Elimine la imágen del directorio ...

		$tabla = "banner";

		$respuesta = ModeloBanner::mdlEliminarBanner($tabla, $id);

		return $respuesta;

	}

}