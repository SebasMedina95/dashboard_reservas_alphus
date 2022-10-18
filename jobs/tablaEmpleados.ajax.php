<?php 

require_once "../controllers/empleados.controller.php";
require_once "../models/empleados.model.php";

class TablaEmpleados{

	/*=============================================
	************* TABLA DE EMPLEADOS **************
	=============================================*/ 

	public function mostrarTabla(){
        /**Programamos que si enviamos doble null, nos va a mostrar a todos ... */
		$respuesta = ControladorEmpleados::ctrMostrarEmpleados(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

		$datosJson = '{
	
		"data":[';

		foreach ($respuesta as $key => $value) {
			
			if($value["id"] != 1){

				if($value["estado"] == 0){

					$estado = "<button onclick='gestionarEstAdmins(".$value["id"].")' id='botonCamEstAdmins".$value["id"]."' class='btn btn-dark btn-sm btnActivar' estadoAdmin='1' idAdmin='".$value["id"]."'>Desactivado</button>";

				}else{

					$estado = "<button onclick='gestionarEstAdmins(".$value["id"].")' id='botonCamEstAdmins".$value["id"]."' class='btn btn-info btn-sm btnActivar' estadoAdmin='0' idAdmin='".$value["id"]."'>Activado</button>";
				}

			}else{

				$estado = "<button onclick='gestionarEstSuperAdmin()' class='btn btn-primary btn-sm btnActivarAdmin'>Administrador</button>";
			}

			/**---------------------------------------------TIPO DE RÉGIMEN VAL */
			if($value["tipo_regimen"] == "1"){
				$tipoRegimen = "Estado";
			}else if($value["tipo_regimen"] == "2"){
				$tipoRegimen = "Gran Contribuyente";
			}else if($value["tipo_regimen"] == "3"){
				$tipoRegimen = "Común";
			}else if($value["tipo_regimen"] == "4"){
				$tipoRegimen = "Simple";
			}else if($value["tipo_regimen"] == "5"){
				$tipoRegimen = "No Reponsable";
			}else{
				$tipoRegimen = "Pendiente";
			}

			/**---------------------------------------------TIPO DE PERSONA VAL */
			if($value["tipo_persona"] == "1"){
				$tipoPersona = "Natural";
			}else{
				$tipoPersona = "Jurídica";
			}

			/**---------------------------------------------FOTOGRAFÍA VAL */
            if(!$value["foto"] == ""){
                $foto = "<img src='".$value["foto"]."' class='img-fluid' style='border-radius: 10px;'>";
            }else{
                $foto = "<img src='vistas/img/admins/default/default.png' class='img-fluid' style='border-radius: 10px;'>";
            }


			$acciones = "<div title='Ver Ficha' class='btn-group'><button class='btn btn-success btn-sm fichaAdministrador' data-toggle='modal' data-target='#fichaAdministrador' idAdministrador='".$value["id"]."'><i class='fa-solid fa-file-contract'></i></button><button title='Actualizar Admin' class='btn btn-warning btn-sm editarAdministrador' onclick='editarAdministrador(".$value["id"].")' id='botonEditAdmins".$value["id"]."' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button title='Eliminar Admin' class='btn btn-danger btn-sm eliminarAdministrador' onclick='eliminarAdministrador(".$value["id"].")' id='botonElimAdmins".$value["id"]."' idAdministrador='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";
		
		$datosJson .='[
					  "'."".'",
					  "'.$acciones.'",
                      "'.$foto.'",
				      "'.$value["tipo_documento"].' - '.$value["documento"].'",
				      "'.$value["primer_nombre"].' '.$value["segundo_nombre"].'",
				      "'.$value["primer_apellido"].' '.$value["segundo_apellido"].'",
				      "'.$value["email"].'",
				      "'.$value["perfil"].'",
				      "'.$value["usuario"].'",
				      "'.$estado.'",
                      "'.$value["telefono_fijo"].'",
                      "'.$value["telefono_movil"].'",
                      "'.$value["direccion"].'",
                      "'.$tipoRegimen.'",
                      "'.$tipoPersona.'",
                      "'.date("d-M-Y" , strtotime($value["fecha_nacimiento"])).'",
                      "'.$value["anotaciones"].'"
				    ],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']}';


		echo $datosJson;

	}

}

/*=============================================
Tabla Administradores
=============================================*/ 

$tabla = new TablaEmpleados();
$tabla -> mostrarTabla();