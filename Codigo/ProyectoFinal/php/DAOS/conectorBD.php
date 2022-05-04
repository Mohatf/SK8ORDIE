<?php

    //Creamos una funcion llamada conectar()

    function conectar($remota){

        //Leemos la variable $remota para determinar donde me conecto

        if($remota){

  
            $servidor= "localhost:3306";
        }else{

          echo('error en la base de datos');
            
        }

        //Valor del usuario
        $usuario = "debianDB";

        //Contraseña del usuario
        $password = "debianDB";

        //Esquema de Base de datos
        $BD= "tiendaskate";

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
