<?php

class ControladorConceptos{

	/*****************************************
	************* MOSTRAR CARGOS *************
	******************************************/

	static public function ctrMostrarConceptos($item, $valor){

		$tabla = "conceptos";

		$respuesta = ModeloConceptos::mdlMostrarConceptos($tabla, $item, $valor);

		return $respuesta;

	}

    /**************************************************
	************* MOSTRAR CARGOS LIMITADOS*************
	***************************************************/

	// static public function ctrMostrarCargosLimit(){

	// 	$tabla = "cargos_empleado";
    //     $limit = 1;

	// 	$respuesta = ModeloCargos::mdlMostrarCargosLimit($tabla, $limit);

	// 	return $respuesta;

	// }

    /***************************************************
	********** REGISTRO DE CONCEPTOS CONTABLES *********
	****************************************************/
    public function ctrRegistroConcepto(){
        /**Que nos venga alguna de las variables POST */
        
        if(isset($_POST["capitulo"])){

            $tabla = "conceptos";

            $datos = array("capitulo" => $_POST["capitulo"],
                           "concepto" => $_POST["concepto"],
                           "descripcion" => $_POST["descripcion_concepto"],
                           "porcentaje" => $_POST["porcentaje_concepto"],
                           "estado" => "0");

            $respuesta = ModeloConceptos::mdlRegistroConcepto($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El concepto para nómina ha sido creado correctamente!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            }else{

                echo '<script> 
                
                    Swal.fire({
                        icon: "error",
                        title: "¡ Opss ... Error !",
                        text: "No pudimos registrar el concepto!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            } /**Condicional ¿Ok? de Admins */	

        } /**Condicional vienen variables POST */

    } /**Método de ctrRegistroAdministrador */

    /**************************************************
	********** EDICIÓN DE CONCEPTOS CONTABLES *********
	***************************************************/
    public function ctrEditarConcepto(){

        /**Que nos venga alguna de las variables POST */
        if(isset($_POST["editarCapitulo"])){

            /**Como ya hicimos las validaciones vía JS, pasamos a la acción ... */

            $tabla = "conceptos";

            $datos = array("capitulo" => $_POST["editarCapitulo"],
                           "concepto" => $_POST["editarConcepto"],
                           "descripcion" => $_POST["editarDescripcion_concepto"],
                           "porcentaje" => $_POST["editarPorcentaje_concepto"],
                           "id" => $_POST["editarConceptoId"]);

            $respuesta = ModeloConceptos::mdlEditarConceptos($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El concepto para nómina ha sido actualizado correctamente!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            }else{

                echo '<script> 
                
                    Swal.fire({
                        icon: "error",
                        title: "¡ Opss ... Error !",
                        text: "No pudimos actualizar el concepto!"
                    }).then(function(result){
    
                        if(result.value || !result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            } /**Condicional ¿Ok? de CARGOS */

        }

    }

    /***************************************************
	********** ELIMINACIÓN DE ADMINISTRADORES **********
	****************************************************/

	// static public function ctrEliminarCargo($id){

	// 	$tabla = "cargos_empleado";

	// 	$respuesta = ModeloCargos::mdlEliminarCargo($tabla, $id);

	// 	return $respuesta;

	// }

}/**Clase */