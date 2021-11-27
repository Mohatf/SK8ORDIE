<?php

    //Creamos una funcion llamada conectar()

    function conectar($remota){

        //Leemos la variable $remota para determinar donde me conecto

        if($remota){

            //Conexión AWS
            $servidor = "bdchaibazahouanimohamed.cshv5hls6pld.eu-west-3.rds.amazonaws.com";
        }else{

            //Local
            $servidor= "localhost:3306";
        }

        //Valor del usuario
        $usuario = "Mohatf";

        //Contraseña del usuario
        $password = "634073855Tqm";

        //Esquema de Base de datos
        $BD= "TiendaSkate";

        //Realizamos la conexión de la BD con la función mysqli_connect();

        $conexion = mysqli_connect($servidor,$usuario,$password,$BD);

        if(!$conexion){
            echo mysqli_connect_error();
            return false;
        }else{
            // echo "La conexión se ha realizado con exito. <br>";
            return $conexion;
            
        }

    }

?>