<?php

class ControladorPlantilla{

    /**MÉTODO QUE INCLUYE LA PLANTILLA */
    public function ctrPlanilla(){
        include "views/plantilla.php";
    }

    /**MÉTODO PARA LLAMADO GENERAL DE ESTRUCTURA PLANTILLA */
    static public function ctrMostrarPlantilla($id){

		$tabla = "plantilla_alphus";
        $item = "id";
        $valor = $id;

		$respuesta = ModeloPlantillaAlphus::mdlMostrarPlantilla($tabla, $item, $valor);

		return $respuesta;

	}

}

?>