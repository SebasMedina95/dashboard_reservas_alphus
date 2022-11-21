<?php

class ControladorPlanes{

	/*****************************************
	***** MOSTRAR LOS PLANES REGISTRADOS *****
	******************************************/

	static public function ctrMostrarPlanes($item, $valor){

		$tabla = "planes";

		$respuesta = ModeloPlanes::mdlMostrarPlanes($tabla, $item, $valor);

		return $respuesta;

	}

	/**********************************
	***** REGISTRAR UN NUEVO PLAN *****
	***********************************/

	public function ctrRegistroPlanes(){

		if(isset($_POST["tipoPlan"])){

			/**Vamos a quitar los . o decimas que traiga el valor, para registrarlo pulpamente. */
			$precio_alta = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["precio_alta"]);
			$precio_baja = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["precio_baja"]);

			if(isset($_FILES["fotoPlan"]["tmp_name"]) && !empty($_FILES["fotoPlan"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["fotoPlan"]["tmp_name"]);

				$nuevoAncho = 480;
				$nuevoAlto = 382;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN
				=============================================*/

				$directorio = "views/img/planes";		

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["fotoPlan"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$_POST["tipoPlan"]."-".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["fotoPlan"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}

				else if($_FILES["fotoPlan"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$_POST["tipoPlan"]."-".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["fotoPlan"]["tmp_name"]);						

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

				$tabla = "planes";

				$datos = array("tipo" => $_POST["tipoPlan"],
								"img" => $ruta,
								"min_descripcion" => $_POST["min_descripcion"],
								"precio_alta" => $precio_alta,
								"precio_baja" => $precio_baja,
								"estado" => "1");

				$respuesta = ModeloPlanes::mdlRegistroPlan($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script> 
			
						Swal.fire({
							icon: "success",
							title: "¡ Correcto !",
							text: "El plan ha sido creado correctamente!"
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
							text: "No pudimos registrar el plan!"
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

	/*************************************************
	********** EDICIÓN DE PLAN SELECCIONADO **********
	**************************************************/

	public function ctrEditarPlanes(){

		if(isset($_POST["editarIdPlan"])){

			$ruta = $_POST["imgFotoPlanActual"];
			/**Vamos a quitar los . o decimas que traiga el valor, para registrarlo pulpamente. */
			$editarPrecio_alta = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["editarPrecio_alta"]);
			$editarPrecio_baja = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["editarPrecio_baja"]);
		
			if(isset($_FILES["editarFotoPlan"]["tmp_name"]) && !empty($_FILES["editarFotoPlan"]["tmp_name"])){				

				list($ancho, $alto) = getimagesize($_FILES["editarFotoPlan"]["tmp_name"]);

				$nuevoAncho = 480;
				$nuevoAlto = 382;

				/*****************************************************************
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				*****************************************************************/

				$directorio = "views/img/planes";
			
				/*****************************************************************
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				*****************************************************************/

				if(isset($_POST["imgFotoPlanActual"])){
					
					unlink($_POST["imgFotoPlanActual"]);

				}

				/*************************************************************************
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				*************************************************************************/

				if($_FILES["editarFotoPlan"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$_POST["editarTipoPlan"]."-".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoPlan"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}

				else if($_FILES["editarFotoPlan"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/".$_POST["editarTipoPlan"]."-".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFotoPlan"]["tmp_name"]);						

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

			}

			$tabla = "planes";

			$datos = array("id"=> $_POST["editarIdPlan"],
						   "tipo" => $_POST["editarTipoPlan"],
						   "img" => $ruta,
						   "min_descripcion" => $_POST["editarMin_descripcion"],
						   "precio_alta" => $editarPrecio_alta,
						   "precio_baja" => $editarPrecio_baja);

			$respuesta = ModeloPlanes::mdlEditarPlan($tabla, $datos);

			if($respuesta == "ok"){

				echo '<script> 
		
					Swal.fire({
						icon: "success",
						title: "¡ Correcto !",
						text: "El plan ha sido actualizado correctamente!"
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
						text: "No pudimos actualizar el plan!"
					}).then(function(result){
	
						if(result.value || !result.value){   
							window.location = "'.$_SERVER["REQUEST_URI"].'";
						} 
	
					});
				
				</script>';

			}

		}	

	}

	/************************************************
	******* ELIMINACIÓN DE PLANES Y DE IMAGEN *******
	*************************************************/

	static public function ctrEliminarPlan($id, $ruta){
		
		unlink("../".$ruta); //Elimine la imágen del directorio ...

		$tabla = "planes";

		$respuesta = ModeloPlanes::mdlEliminarPlan($tabla, $id);

		return $respuesta;

	}

}