<?php

class ControladorCategorias{

	/************************************************
	****** REGISTRO DE CATEGORÍA DE HABITACIÓN ******
	*************************************************/

	public function ctrRegistroCategoria(){

		if(isset($_POST["rutaCategoria"])){

			/**Vamos a quitar los . o decimas que traiga el valor, para registrarlo pulpamente. */
			$continental_alta = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["continental_alta"]);
			$continental_baja = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["continental_baja"]);
			$americano_alta = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["americano_alta"]);
			$americano_baja = str_replace(array("#", "'", ";" , "." , "," , " ", ""), '', $_POST["americano_baja"]);

			if(isset($_FILES["fotoCategoria"]["tmp_name"]) && !empty($_FILES["fotoCategoria"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["fotoCategoria"]["tmp_name"]);

				$nuevoAncho = 359;
				$nuevoAlto = 254;

				/******************************************************************
				****** Creamos el directorio donde vamos a guardar la imagen ******
				*******************************************************************/

				$directorio = "views/img/".strtolower($_POST["tipoCategoria"]);	

				if(!file_exists($directorio)){	

					mkdir($directorio, 0755);

				}	

				/**********************************************************************************
				***** DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP *****
				**********************************************************************************/

				if($_FILES["fotoCategoria"]["type"] == "image/jpeg"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/portada.jpg";

					$origen = imagecreatefromjpeg($_FILES["fotoCategoria"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);	

				}

				else if($_FILES["fotoCategoria"]["type"] == "image/png"){

					$aleatorio = mt_rand(100,999);

					$ruta = $directorio."/portada.png";

					$origen = imagecreatefrompng($_FILES["fotoCategoria"]["tmp_name"]);						

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

				$tabla = "categorias";

				$datos = array("ruta" => $_POST["rutaCategoria"],
							   "color" => $_POST["colorCategoria"],
							   "tipo" => $_POST["tipoCategoria"],
							   "img" => $ruta,
							   "descripcion" => $_POST["descripcionCategoria"],
							   "continental_alta" => $continental_alta,
							   "continental_baja" => $continental_baja,
							   "americano_alta" => $americano_alta,
							   "americano_baja" => $americano_baja,
							   "estado" => "1");

				$respuesta = ModeloCategorias::mdlRegistroCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script> 
			
						Swal.fire({
							icon: "success",
							title: "¡ Correcto !",
							text: "La categoría de habitación ha sido creada correctamente!"
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
							text: "No pudimos registrar la categoría de habitación!"
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

    /***************************************************
	***** MOSTRAR LISTADO CATEGORÍAS DE HABITACIÓN *****
	****************************************************/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*************************************************************************
	***** MOSTRAR LISTADO DE COMODIDADES DE LAS CATEGORÍAS DE HABITACIÓN *****
	**************************************************************************/

	static public function ctrMostrarComodidadesCategorias($item, $valor){

		$tabla = "comodidades";

		$respuesta = ModeloCategorias::mdlMostrarComodidadesCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/************************************************************
	***** MOSTRAR LISTADO DETALLES CATEGORÍAS DE HABITACIÓN *****
	*************************************************************/

	static public function ctrMostrarDetallesCategorias($item, $valor){

		$tabla = "detalle_comodidades";

		$respuesta = ModeloCategorias::mdlMostrarDetallesCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/**************************************************************************
	********** ELIMINACIÓN DE DETALLES DE COMODIDAD PARA RE ISERCIÓN **********
	***************************************************************************/

	static public function ctrEliminarDetalleCatergoriaReInsert($id){

		$tabla = "detalle_comodidades";

		$respuesta = ModeloCategorias::mdlEliminarDetalleCatergoriaReInsert($tabla, $id);

		return $respuesta;

	}
	

}

?>