<?php 

class Conexion {

    static public function conectar(){

        $hosting  = "localhost";
        $bdHotel  = "reservas_alphus";
        $usuario  = "root";
        $password = "";
        
        $link = new PDO("mysql:
                        host=".$hosting.";
                        dbname=".$bdHotel."",
						"".$usuario."",
						"".$password."");

		$link->exec("set names utf8");

		return $link;

    }

    static public function conectarMySqlLi(){
        $mysqli = new mysqli("localhost", "root", "", "reservas_alphus");
        return $mysqli;
    }

}

?>