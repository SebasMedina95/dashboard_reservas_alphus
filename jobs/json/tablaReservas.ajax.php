<?php

require_once "../../controllers/reservas.controller.php";
require_once "../../models/reservas.model.php";

class TablaReservas{

	/*=============================================
	Tabla Reservas
	=============================================*/ 

	public function mostrarTabla(){

		$reservas = ControladorReservas::ctrMostrarReservas(null, null);

		if(count($reservas)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($reservas as $key => $value) {
			
			/*=============================================
			ACCIONES
			=============================================*/

			$fechaIngreso = new DateTime($value["fecha_ingreso"]);
			$fechaSalida = new DateTime($value["fecha_salida"]);

			$diff = $fechaIngreso->diff($fechaSalida);
			$dias = $diff->days;

			if($value["fecha_ingreso"] != "0000-00-00" && $value["fecha_salida"] != "0000-00-00"){

				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarReserva' onclick='editarReserva(".$value["id_reserva"].")' idReserva='".$value["id_reserva"]."' idHabitacion='".$value["id_habitacion"]."' nombreUsuario='".$value["nombre"]."' fechaIngreso='".$value["fecha_ingreso"]."' fechaSalida='".$value["fecha_salida"]."' descripcion='".$value["descripcion_reserva"]."' diasReserva='".$dias."' id='botonEditReservas".$value["id_reserva"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarReserva' onclick='eliminarReserva(".$value["id_reserva"].")' idReserva='".$value["id_reserva"]."'><i class='fa-solid fa-ban'></i></button></div>";	

			}else{

				$acciones = "<button class='btn btn-dark btn-sm'>Cancelada</button>";	
			}


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$acciones.'",
						"'.$value["codigo_reserva"].'",
						"'.$value["nombre"].'",
						"$ '.number_format($value["pago_reserva"],  2, ",", ".").'",
						"'.$value["pasarela_pago"].'",
						"'.$value["fecha_ingreso"].'",
						"'.$value["fecha_salida"].'",
						"'.$value["fecha_reserva"].'",
						"'.$value["numero_transaccion"].'",
						"'.$value["descripcion_reserva"].'"
						
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Reservas
=============================================*/ 

$tabla = new TablaReservas();
$tabla -> mostrarTabla();