<?php

require_once "../../controllers/usuarios.controller.php";
require_once "../../models/usuarios.model.php";

class TablaUsuarios{

 /*=============================================
	Tabla Usuarios
	=============================================*/ 

	public function mostrarTabla(){

		$usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);

		if(count($usuarios)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($usuarios as $key => $value) {

	 		/*=============================================
			IMAGEN
			=============================================*/	
			if($value["foto"] != ""){

				$foto = "<img src='".$value["foto"]."' class='rounded-circle' width='50px'>";

			}else{

				$foto = "<img src='views/img/usuarios/default/default.png' class='rounded-circle' width='50px'>";
			}

			/*=============================================
			CANTIDAD DE RESERVAS
			=============================================*/	

			$reservas = "<div class='sumarReservas' idUsuario='".$value["id_u"]."'>0</div>";
			$testimonios = "<div class='sumarTestimonios' idUsuario='".$value["id_u"]."'>0</div>";

			
			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$foto.'",
						"'.$value["nombre"].'",
						"'.$value["email"].'",
						"'.$value["numero_documento"].'",
						"'.$value["celular"].'",
						"'.$value["CantidadReservas"].'",
						"'.$value["CantidadTestimonios"].'"
					
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Usuarios
=============================================*/ 

$tabla = new TablaUsuarios();
$tabla -> mostrarTabla();