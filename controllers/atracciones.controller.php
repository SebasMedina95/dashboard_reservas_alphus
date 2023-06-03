<?php

class ControladorRecorrido{

	/*=============================================
	Mostrar Recorrido
	=============================================*/

	static public function ctrMostrarRecorrido($item, $valor){

		$tabla = "recorrido";

		$respuesta = ModeloRecorrido::mdlMostrarRecorrido($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	Registro Recorrido
	=============================================*/

	public function ctrRegistroRecorrido(){

		if(isset($_POST["titulo"])){

			if(isset($_FILES["fotoPeqAtraccion"]["tmp_name"]) && !empty($_FILES["fotoPeqAtraccion"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["fotoPeqAtraccion"]["tmp_name"]);

				$nuevoAncho = 455;
				$nuevoAlto = 280;

				/*=============================================
				NOMBRAMOS EL DIRECTORIO
				=============================================*/

				$directorio = "views/img/recorrido";		

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["fotoPeqAtraccion"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$rutaImgPeq = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["fotoPeqAtraccion"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaImgPeq);	

				}

				else if($_FILES["fotoPeqAtraccion"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$rutaImgPeq = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["fotoPeqAtraccion"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaImgPeq);

				}else{

					echo'<script>

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

			}

			if(isset($_FILES["fotoGraAtraccion"]["tmp_name"]) && !empty($_FILES["fotoGraAtraccion"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["fotoGraAtraccion"]["tmp_name"]);

				$nuevoAncho = 650;
				$nuevoAlto = 450;

				/*=============================================
				NOMBRAMOS EL DIRECTORIO
				=============================================*/

				$directorio = "views/img/recorrido";			

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["fotoGraAtraccion"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$rutaImgGrande = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["fotoGraAtraccion"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaImgGrande);	

				}

				else if($_FILES["fotoGraAtraccion"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$rutaImgGrande = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["fotoGraAtraccion"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaImgGrande);

				}else{

					echo'<script>

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

			}

			$tabla = "recorrido";

			$datos = array("titulo" => strtoupper($_POST["titulo"]),
							"descripcion" => $_POST["descripcion"],
							"foto_peq" => $rutaImgPeq,
							"foto_grande" => $rutaImgGrande,
							"estado" => "0");

			$respuesta = ModeloRecorrido::mdlRegistroRecorrido($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "La atracción / recorrido ha sido creada correctamente!"
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
	Editar Recorrido
	=============================================*/

	public function ctrEditarRecorrido(){

		if(isset($_POST["editarRecorridoId"])){

			$rutaImgPeq = $_POST["imgFotoAtraccionPeqActual"];
			$rutaImgGrande = $_POST["imgFotoAtraccionGraActual"];
		
			if(isset($_FILES["editarFotoAtraccionPeq"]["tmp_name"]) && !empty($_FILES["editarFotoAtraccionPeq"]["tmp_name"])){				

				list($ancho, $alto) = getimagesize($_FILES["editarFotoAtraccionPeq"]["tmp_name"]);

				$nuevoAncho = 455;
				$nuevoAlto = 280;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "views/img/recorrido";
			
				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				if(isset($_POST["imgFotoAtraccionPeqActual"])){
					
					unlink($_POST["imgFotoAtraccionPeqActual"]);

				}

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["editarFotoAtraccionPeq"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$rutaImgPeq = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoAtraccionPeq"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaImgPeq);	

				}

				else if($_FILES["editarFotoAtraccionPeq"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$rutaImgPeq = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFotoAtraccionPeq"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaImgPeq);

				}else{

					echo'<script>

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

			}

			if(isset($_FILES["editarFotoAtraccionGra"]["tmp_name"]) && !empty($_FILES["editarFotoAtraccionGra"]["tmp_name"])){				

				list($ancho, $alto) = getimagesize($_FILES["editarFotoAtraccionGra"]["tmp_name"]);

				$nuevoAncho = 455;
				$nuevoAlto = 280;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "views/img/recorrido";
			
				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				if(isset($_POST["imgFotoAtraccionGraActual"])){
					
					unlink($_POST["imgFotoAtraccionGraActual"]);

				}

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["editarFotoAtraccionGra"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$rutaImgGrande = $directorio."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoAtraccionGra"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $rutaImgGrande);	

				}

				else if($_FILES["editarFotoAtraccionGra"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$rutaImgGrande = $directorio."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFotoAtraccionGra"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagealphablending($destino, FALSE);
		
					imagesavealpha($destino, TRUE);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $rutaImgGrande);

				}else{

					echo'<script>

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

			}

			$tabla = "recorrido";

			$datos = array("id"=> $_POST["editarRecorridoId"],
							"titulo" => $_POST["editarTitulo"],
							"descripcion" => $_POST["editarDescripcion"],
							"foto_peq" => $rutaImgPeq,
							"foto_grande" => $rutaImgGrande);

			$respuesta = ModeloRecorrido::mdlEditarRecorrido($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script> 
			
					Swal.fire({
						icon: "success",
						title: "¡ Correcto !",
						text: "La atracción / recorrido ha sido actualizada correctamente!"
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
	Eliminar Recorrido
	=============================================*/

	static public function ctrEliminarRecorrido($id, $rutaPeq, $rutaGrande){
		
		unlink("../".$rutaPeq);

		unlink("../".$rutaGrande);

		$tabla = "recorrido";

		$respuesta = ModeloRecorrido::mdlEliminarRecorrido($tabla, $id);

		return $respuesta;

	}

}