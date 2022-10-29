<?php 

session_start();
require_once "../../controllers/contratosEmpleados.controller.php";
require_once "../../models/contratosEmpleados.model.php";

require_once "../../controllers/conceptos.controller.php";
require_once "../../models/conceptos.model.php";

class TablaFichaContrato{

    /*=============================================
	TABLA DE DETALLE DE CONCEPTOS DE LA FICHA
	=============================================*/ 

	public function mostrarTablaDtalleCptos(){

		$item = "id_ficha";
		$valor = $_SESSION["idGetFichaSession"];

		$respuesta = ControladorContratoEmpleados::ctrMostrarDetallesConcepto($item, $valor);

		// echo json_encode($respuesta);

        if(count($respuesta) == 0){

			$datosJson = '{"data":[]}';

			echo $datosJson;

			return;

		}

        $datosJson = '{
	
            "data":[';
    
            foreach ($respuesta as $key => $value) {

                if($value["capitulo"] == "1"){
                    $capitulo = "SALARIO";
                }else if($value["capitulo"] == "2"){
                    $capitulo = "DEDUCCIÓN";
                }else if($value["capitulo"] == "3"){
                    $capitulo = "PRESTACIÓN";
                }else if($value["capitulo"] == "4"){
                    $capitulo = "OTROS";
                }else if($value["capitulo"] == "5"){
                    $capitulo = "COMPENSACIÓN FLEXIBLE";
                }else if($value["capitulo"] == "6"){
                    $capitulo = "APOYO ECONÓMICO";
                }else if($value["capitulo"] == "7"){
                    $capitulo = "PROVICIONES";
                }else{
                    $capitulo = "SIN DEFINIR";
                }
    
                if($value["estado"] == 0){
    
                    $estado = "<button title='Habilitar Concepto Contable' onclick='gestionarEstCargoEmp(".$value["id"].")' id='botonCamEstCarg".$value["id"]."' class='btn btn-dark btn-sm btnActivarCargoEmp' estadoCargo='1' idCargo='".$value["id"]."'>Concepto Contable Inactivo</button>";
    
                }else{
    
                    $estado = "<button title='Inhabilitar Concepto Contable' onclick='gestionarEstCargoEmp(".$value["id"].");' id='botonCamEstCarg".$value["id"]."' class='btn btn-info btn-sm btnActivarCargoEmp' estadoCargo='0' idCargo='".$value["id"]."'>Concepto Contable Activo</button>";
                }
    
                $acciones = "<button title='Eliminar Concepto' onclick='botonEliminarDetaConcepto(".$value["id"].");' class='btn btn-danger btn-sm eliminarDetalleConcepto' idDetalleConcepto='".$value["id"]."'><i class='fas fa-trash-alt'></i></button></div>";
            
            $datosJson .='[
                            "'.($key+1).'",
                            "'.$acciones.'",
                            "'.$capitulo.'",
                            "'.$value["concepto"].'",
                            "'.$value["descripcion"].'",
                            "'.$value["porcentaje"].'",
                            "'.$estado.'",
                            "'.$value["notas_concepto"].'",
                            "'.$value["fecha"].'"
                        ],';
    
            }
    
            $datosJson = substr($datosJson, 0, -1);
    
            $datosJson .= ']}';
    
            echo $datosJson;

	}

}

/*=============================================
DETALLES DE CONCEPTO
=============================================*/ 

$mostrar = new TablaFichaContrato();
$mostrar -> mostrarTablaDtalleCptos();


?>