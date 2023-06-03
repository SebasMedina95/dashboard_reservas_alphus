<?php

require_once "../controllers/testimonios.controller.php";
require_once "../models/testimonios.model.php";

class AjaxTestimonios{


	/*=============================================
	Aprobar o desaprobar testimonio
	=============================================*/	

	public $idTestimonio;
	public $estadoTestimonio;

	public function ajaxAprobarTestimonio(){

		$tabla = "testimonios";

		$item1 = "id_testimonio";
		$valor1 = $this->idTestimonio;

		$item2 = "aprobado";
		$valor2 = $this->estadoTestimonio;

		$respuesta = ModeloTestimonios::mdlAprobarTestimonio($tabla, $item1, $valor1, $item2, $valor2);

		echo json_encode($respuesta);

	}

}


/*=============================================
Activar o desactivar Testimonio
=============================================*/	

if(isset($_GET["estadoTestimonio"])){

	$aprobarTestimonios = new AjaxTestimonios();
	$aprobarTestimonios -> idTestimonio = $_GET["idTestimonio"];
	$aprobarTestimonios -> estadoTestimonio = $_GET["estadoTestimonio"];
	$aprobarTestimonios -> ajaxAprobarTestimonio();

}