<?php

class ControladorHabitaciones{

    /***********************************************************
	****** MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN ******
	************************************************************/

	static public function ctrMostrarHabitaciones($valor){

		$tabla1 = "categorias";
		$tabla2 = "habitaciones";

		$respuesta = ModeloHabitaciones::mdlMostrarHabitaciones($tabla1, $tabla2, $valor);

		return $respuesta;

	}

	/*************************************************
	********* REGISTRAR UNA NUEVA HABITACIÓN *********
	**************************************************/

	static public function ctrNuevaHabitacion($datos){
		
		/*************************************
		********* Validando Galería: *********
		**************************************/
		if($datos["galeria"] != ""){

			/**Almacenamos las rutas de las imagenes */
			$ruta = array();
			$guardarRuta = array();

			/**Recordemos que recibimos como String, entonces decodificamos en array
			 * porque nos viene con esa estructura... */
			$galeria = json_decode($datos["galeria"], true);

			/**Recorremos cada imágen para poder procesarla: */
			for($i = 0; $i < count($galeria); $i++){

				list($ancho, $alto) = getimagesize($galeria[$i]);

				$nuevoAncho = 940;
				$nuevoAlto = 480;

				/***********************************************************************
				***** UBICAMOS Y GENERAMOS EL DIRECTORIO PARA GUARDAR LAS IMÁGENES *****
				***********************************************************************/
				$directorio = "../views/img/".$datos["tipo"];	/**Recordemos que tipo nos trae el nombre de la categoría -> carpeta */

				/**Aplicamos el strtolower sobre el titulo para que quede todo en minúscula y coincida el nombre de la carpeta */
				array_push($ruta, strtolower($directorio."/".$datos["estilo"].($i+1).".jpg"));

				/**Como las imágenes vienen en base 64, ya no importa en quie formato sube, el las convierte al formato JPG */
				$origen = imagecreatefromjpeg($galeria[$i]);
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagejpeg($destino, $ruta[$i]);	

				/** Para guardar las rutas que almacenaremos en la base de datos y le aplico substr 3 para quitar los ../ de la ruta*/
				array_push($guardarRuta, substr($ruta[$i], 3)); 

			}

		}else{

			echo'<script>

					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "La galería no puede ir vacía, es requerido el set de fotos ..."
					}).then(function(result){

						if(result.value){   
							history.back();
						} 
					});

				</script>';

			return;

		}

		/****************************************************************
		********* Validando recorrido virtual o imagen de 360°: *********
		*****************************************************************/
		if($datos["recorrido_virtual"] != ""){
				
			list($ancho, $alto) = getimagesize($datos["recorrido_virtual"]);

			$nuevoAncho = 4030;
			$nuevoAlto = 1144;

			$directorio = "../views/img/".$datos["tipo"];	
			$ruta360 = strtolower($directorio."/".$datos["estilo"]."-360.jpg");

			$origen = imagecreatefromjpeg($datos["recorrido_virtual"]);
			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
			imagejpeg($destino, $ruta360);	

		}else{

			echo'<script>

					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "El recorrido virtual o imagen de 360° es necesaria ..."
					}).then(function(result){

						if(result.value){   
							history.back();
						} 
					});

				</script>';

			return;

		}

		$tabla = "habitaciones";

		$datos = array("tipo_h" => $datos["tipo_h"],
					   "estilo" => $datos["estilo"],
					   "galeria" => json_encode($guardarRuta), /**Vuelvo y codifíco para guardar, recordemos que lo necesitamos como cadena de Texto y arriba era array... */
					   "video" => $datos["video"],
					   "recorrido_virtual" => substr($ruta360,3), /**Le quito el ../ */
					   "descripcion_h" => $datos["descripcion"],
					   "estado" => "1");

		$respuesta = ModeloHabitaciones::mdlNuevaHabitacion($tabla, $datos);

		return $respuesta; 

	}

	/**************************************************
	********* ACTUALIZACIÓN DE UNA HABITACIÓN *********
	***************************************************/
	static public function ctrEditarHabitacion($datos){

		/**La galería es necesaria, entonces debemos validar que no nos quede vacía */
		if($datos["galeriaAntigua"] == "" && $datos["galeria"] == ""){

			echo'<script>

					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "La galería no puede ir vacía, es requerido el set de fotos ..."
					}).then(function(result){

						if(result.value){   
							history.back();
						} 
					});

				</script>';

			return;

		}

		/**Eliminamos las fotos de la galería de la carpeta, esto con el fin de que sea mas fácil actualizar,
		 * es mas práctico eliminar lo que había y registrar lo que venga como si fuera nuevo: */

		 /**1. Traemos la habitación que coincida con el idHabitacion que nos estará llegando: */
		$traerHabitacion = ModeloHabitaciones::mdlMostrarHabitaciones("categorias", "habitaciones", $datos["idHabitacion"]);

		/**2. Si galería antigua nos llega con datos, entonces debemos remover, significa que debo eliminar fotos que ya no usaré: */
		if($datos["galeriaAntigua"] != ""){	

			$galeriaBD = json_decode($traerHabitacion["galeria"], true); //Decodificamos para trabajar .
			$galeriaAntigua = explode("," , $datos["galeriaAntigua"]); //Convertimos en array lo que nos viene como String que es galeriaAntigua

			$guardarRuta = $galeriaAntigua; //Guardamos lo que nos llega de la galería antigua
	
			$borrarFoto = array_diff($galeriaBD, $galeriaAntigua); //array_diff Me busca diferencias entre 2 arrays

			/**Las diferencias que encuentre en el anterior línea de código se guardan en $borrarFoto y estás son las que debemos
			 * quitar del servidor: */
			foreach ($borrarFoto as $key => $valueFoto){
					
				unlink("../".$valueFoto);

			}

		}else{

			/**Si la galería antigua viene vacía, entonces eliminamos todas las fotos. Recordemos que al eliminar todas las fotos de galería antigua
			 * el input de galería antigua queda vacía, entonces, eliminaríamos todas las fotos de la galería
			 */
			$galeriaBD = json_decode($traerHabitacion["galeria"], true);

			foreach ($galeriaBD as $key => $valueFoto){

				unlink("../".$valueFoto);

			}
			
		}//Condicional si galeria antigua trae data

		/**3. Cuando viene fotos nuevas entonces: */
		if($datos["galeria"] != ""){

			$ruta = array();
			$guardarRuta = array();

			$galeria = json_decode($datos["galeria"], true); /**Agregamos los valores respectivos para procesar: */
			$galeriaAntigua = explode("," , $datos["galeriaAntigua"]); /**Agregamos los valores respectivos para procesar: */

			for($i = 0; $i < count($galeria); $i++){

				list($ancho, $alto) = getimagesize($galeria[$i]);

				$nuevoAncho = 940; /**Definimos las dimensiones */
				$nuevoAlto = 480; /**Definimos las dimensiones */

				$aleatorio = mt_rand(100,999); 

				/**********************************************************************
				******** Creamos el directorio donde vamos a guardar la imagen ********
				*** Se hace el mismo proceso como cuando es el agregar anteriormente **
				***********************************************************************/

				$directorio = "../views/img/".$datos["tipo"];	

				array_push($ruta, strtolower($directorio."/".$datos["estilo"].$aleatorio.".jpg"));

				$origen = imagecreatefromjpeg($galeria[$i]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta[$i]);	

				array_push($guardarRuta, substr($ruta[$i], 3)); /**Recordemos que debemos quitar el ../ */

			}

			/**Agregamos las fotos antiguas que teníamos */
			if($datos["galeriaAntigua"] != ""){

				foreach ($galeriaAntigua as $key => $value) {
					
					array_push($guardarRuta, $value);

				}

			}

		}//Condicional fotos nuevas

		/**Si viene un recorrido virtual - 360° - Nuevo */
		if($datos["recorrido_virtual"] != "undefined"){	

			/**Primero siendo el caso, para estar seguros elimine la imagen antigua */
			unlink("../".$datos["antiguoRecorrido"]);
			
			list($ancho, $alto) = getimagesize($datos["recorrido_virtual"]);

			$nuevoAncho = 4030;
			$nuevoAlto = 1144;

			$directorio = "../views/img/".$datos["tipo"];	

			$ruta360 = strtolower($directorio."/".$datos["estilo"]."-360.jpg");

			$origen = imagecreatefromjpeg($datos["recorrido_virtual"]);

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagejpeg($destino, $ruta360);

			$ruta360 = substr($ruta360,3);	

		}else{
			/**Si no dejamos el que teníamos */
			$ruta360 = $datos["antiguoRecorrido"];
			
		} //Condicional recorrido virtual nuevo

		$tabla = "habitaciones";

		$datos = array("id_h" => $datos["idHabitacion"],
						"tipo_h" => $datos["tipo_h"],
						"estilo" => $datos["estilo"],
						"galeria" => json_encode($guardarRuta),
						"video" => $datos["video"],
						"recorrido_virtual" => $ruta360,
						"descripcion_h" => $datos["descripcion"]);

		$respuesta = ModeloHabitaciones::mdlEditarHabitacion($tabla, $datos);

		return $respuesta; 

	}

	/************************************************
	********* ELIMINACIÓN DE UNA HABITACIÓN *********
	*************************************************/

	static public function ctrEliminarHabitacion($datos){
		
		/**Eliminamos primero las fotos de la galería */
		/**Convierto en un array que separe los indices a partir de las , y recorrer para elimiar */
		$galeriaHabitacionElimAction = explode("," , $datos["galeriaHabitacionElimAction"]);

		foreach ($galeriaHabitacionElimAction as $key => $value) {
			
			unlink("../".$value);
		
		}

		/**Eliminamos Ahora la imagen de 360° */
		unlink("../".$datos["recorritoVirHabitacionElimAction"]);	

		$tabla = "habitaciones";

		$respuesta = ModeloHabitaciones::mdlEliminarHabitacion($tabla, $datos["idHabitacionElimAction"]);

		return $respuesta;

	}

	/***********************************************************
	********* MOSTRAR MANTENIMIENTOS DE UNA HABITACIÓN *********
	************************************************************/
	static public function ctrMostrarMantenimientos($valor){

		$tabla1 = "categorias";
		$tabla2 = "habitaciones";
		$tabla3 = "administradores";
		$tabla4 = "mantenimientos";

		$respuesta = ModeloHabitaciones::mdlMostrarMantenimientos($tabla1, $tabla2, $tabla3, $tabla4, $valor);

		return $respuesta;

	}

}