<?php

class ControladorCategorias{

    /***************************************************
	***** MOSTRAR LISTADO CATEGORÍAS DE HABITACIÓN *****
	****************************************************/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

}

?>