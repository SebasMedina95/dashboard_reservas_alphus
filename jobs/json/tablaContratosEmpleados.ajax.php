<?php 

require_once "../../controllers/contratosEmpleados.controller.php";
require_once "../../models/contratosEmpleados.model.php";

require_once "../../controllers/empleados.controller.php";
require_once "../../models/empleados.model.php";

//require_once "../../controllers/cargos.controller.php";
require_once "../../models/cargos.model.php";

class TablaContratosEmpleados{

    /********************************************************
	********** TABLA DE CONTRATOS ADMINS/EMPLEADOS **********
	*********************************************************/
    public function mostrarTabla(){

        /**Programamos que si enviamos doble null, nos va a mostrar a todos ... */
		$respuesta = ControladorContratoEmpleados::ctrMostrarContratoEmpleados(null, null);

		if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

        $datosJson = '{
	
        "data":[';

        foreach ($respuesta as $key => $value){

            /************************************* EMPLEADOS VAL *************************************/
			$respuestaAdmins = ModeloEmpleados::mdlMostrarEmpleados("administradores" , "id" , $value["id_admin"]);
			$docuEmpleado = $respuestaAdmins["documento"];
			$nomEmpleado = $respuestaAdmins["primer_nombre"] ." ". $respuestaAdmins["segundo_nombre"] ." ". $respuestaAdmins["primer_apellido"] ." ". $respuestaAdmins["segundo_apellido"];
			$fotografia = $respuestaAdmins["foto"];

            /************************************* CARGO EMPLEADO VAL *************************************/
			$respuestaCargos = ModeloCargos::mdlMostrarCargos("cargos_empleado" , "id" , $value["id_cargo"]);
			$nomCargo = $respuestaCargos["cargo"];

            /**---------------------------------------------PERIODO DE PAGO VAL */
			if($value["periodo_pago"] == "1"){
				$periodoPago = "Mensual";
			}else{
				$periodoPago = "Quincenal";
			}

			/**---------------------------------------------TIPO DE CONTRATO VAL */
			if($value["tipo_contrato"] == "1"){
				$tipoContrato = "Término Fíjo";
				$finalizacionContrato = date("d-M-Y" , strtotime($value["fecha_fin"]));
			}else if($value["tipo_contrato"] == "2"){
				$tipoContrato = "Término Indefinido";
				$finalizacionContrato = "No Aplica";
			}else if($value["tipo_contrato"] == "3"){
				$tipoContrato = "Obra o Labor";
				$finalizacionContrato = date("d-M-Y" , strtotime($value["fecha_fin"]));
			}else if($value["tipo_contrato"] == "4"){
				$tipoContrato = "Aprendizaje Productivo";
				$finalizacionContrato = date("d-M-Y" , strtotime($value["fecha_fin"]));
			}else if($value["tipo_contrato"] == "5"){
				$tipoContrato = "Ocasional Trabajo";
				$finalizacionContrato = date("d-M-Y" , strtotime($value["fecha_fin"]));
			}else{
				$tipoContrato = "Aprendizaje Lectivo";
				$finalizacionContrato = date("d-M-Y" , strtotime($value["fecha_fin"]));
			}

			/**---------------------------------------------FOTOGRAFÍA DEL EMPLEADO/ADMIN */
			if(!$fotografia == ""){
                $foto = "<img src='".$fotografia."' class='img-fluid' style='border-radius: 10px;' width=60%>";
            }else{
                $foto = "<img src='views/img/admins/default/default.png' class='img-fluid' style='border-radius: 10px;' width=60%>";
            }

            /**---------------------------------------------FORMATO DE MONEDA VAL */
			$salarioBaseFormat = number_format($value["salario_basico"], 2, ",",".");

			/**---------------------------------------------ESTADO VAL */
			if($value["estado"] == 0){

				$estado = "<button id='botonCamEstContratos".$value["id"]."' onclick='gestionarEstContratosAdmins(".$value["id"].")' class='btn btn-dark btn-sm btnActivarContratoAdmin' estadoContratoAdmin='1' idContratoAdmin='".$value["id"]."'>Contrato Inactivo</button>";

			}else{

				$estado = "<button id='botonCamEstContratos".$value["id"]."' onclick='gestionarEstContratosAdmins(".$value["id"].")' class='btn btn-info btn-sm btnActivarContratoAdmin' estadoContratoAdmin='0' idContratoAdmin='".$value["id"]."'>Contrato Activo</button>";
			}

            $acciones = "<div class='btn-group'><button title='Ficha de Contrato' class='btn btn-primary btn-sm verFichaContrato' onclick='verFichaContrato(".$value["id"].")' id='botonFichaContrAdmins".$value["id"]."' idContrato='".$value["id"]."'><i class='fas fa-file-alt text-white'></i></button><button title='Actualizar Contrato' class='btn btn-warning btn-sm editarContratoAdmins' onclick='editarContratoAdmins(".$value["id"].")' id='botonEditContrAdmins".$value["id"]."' idContrato='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button>".$estado."</div>";

            $datosJson .='[
                "'."".'",
                "'.$acciones.'",
                "'.$foto.'",
                "'.$docuEmpleado.'",
                "'.$nomEmpleado.'",
                "'.$value["codigo_contrato"].'",
                "'."$ ".$salarioBaseFormat.'",
                "'.$value["cuenta_ahorros"].'",
                "'.$value["porcentaje_riesgo"].'",
                "'.$periodoPago.'",
                "'.$tipoContrato.'",
                "'.date("d-M-Y" , strtotime($value["fecha_inicio"])).'",
                "'.$finalizacionContrato.'",
                "'.$nomCargo.'",
                "'.$value["anotaciones_contrato"].'",
                "'.$value["fecha"].'"
              ],';

        } /**Foreach */

        $datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']}';

		echo $datosJson;

    }/**Mostrar Tabla */

} /**Class */

/****************************************
************** Tabla Cargos *************
****************************************/ 

$tabla = new TablaContratosEmpleados();
$tabla -> mostrarTabla();


?>