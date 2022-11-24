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

	/*************************************************************************
	***** MOSTRAR LISTADO DE COMODIDADES DE LAS CATEGORÍAS DE HABITACIÓN *****
	**************************************************************************/

	static public function ctrMostrarComodidadesCategorias($item, $valor){

		$tabla = "comodidades";

		$respuesta = ModeloCategorias::mdlMostrarComodidadesCategorias($tabla, $item, $valor);

		return $respuesta;

	}

}

?>