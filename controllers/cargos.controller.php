<?php

class ControladorCargos{

	/*****************************************
	************* MOSTRAR CARGOS *************
	******************************************/

	static public function ctrMostrarCargos($item, $valor){

		$tabla = "cargos_empleado";

		$respuesta = ModeloCargos::mdlMostrarCargos($tabla, $item, $valor);

		return $respuesta;

	}

    /**************************************************
	************* MOSTRAR CARGOS LIMITADOS*************
	***************************************************/

	static public function ctrMostrarCargosLimit(){

		$tabla = "cargos_empleado";
        $limit = 1;

		$respuesta = ModeloCargos::mdlMostrarCargosLimit($tabla, $limit);

		return $respuesta;

	}

    /**************************************
	********** REGISTRO DE CARGOS *********
	***************************************/
    public function ctrRegistroCargo(){
        /**Que nos venga alguna de las variables POST */
        
        if(isset($_POST["cargo"])){

            $tabla = "cargos_empleado";

            $datos = array("cargo" => $_POST["cargo"],
                           "alias" => $_POST["alias"],
                           "estado" => "0");

            $respuesta = ModeloCargos::mdlRegistroCargo($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El cargo para empleado ha sido creado correctamente!"
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
                        text: "No pudimos registrar el cargo!"
                    }).then(function(result){
    
                        if(result.value){   
                            window.location = "'.$_SERVER["REQUEST_URI"].'";
                        } 
    
                    });
                
                </script>';

            } /**Condicional ¿Ok? de Admins */	

        } /**Condicional vienen variables POST */

    } /**Método de ctrRegistroAdministrador */

    /**************************************************
	********** EDICIÓN DE CARGOS DE EMPLEADO **********
	***************************************************/
    public function ctrActualizarCargo(){

        /**Que nos venga alguna de las variables POST */
        if(isset($_POST["editarCargoEmp"])){

            /**Como ya hicimos las validaciones vía JS, pasamos a la acción ... */

            $tabla = "cargos_empleado";

            $datos = array("id" => $_POST["editarIdCargos"],
                           "cargo" => $_POST["editarCargoEmp"],  /**Tomamos el elemento POST pero de Edición */
                           "alias" => $_POST["editarAlias"]); /**Tomamos el elemento POST pero de Edición */

            $respuesta = ModeloCargos::mdlEditarCargos($tabla, $datos);

            if($respuesta == "ok"){

                echo '<script> 
                
                    Swal.fire({
                        icon: "success",
                        title: "¡ Correcto !",
                        text: "El cargo para empleado ha sido actualizado correctamente!"
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
                        text: "No pudimos actualizar el cargo!"
                    }).then(function(result){
    
                        if(result.value){   
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

	static public function ctrEliminarCargo($id){

		$tabla = "cargos_empleado";

		$respuesta = ModeloCargos::mdlEliminarCargo($tabla, $id);

		return $respuesta;

	}

}/**Clase */