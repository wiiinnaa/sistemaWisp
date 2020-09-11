<?php
    include_once '../BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Recepción de los datos enviados mediante POST desde el JS   

    $nombreUsuario = (isset($_POST['nombreUsuario'])) ? $_POST['nombreUsuario'] : '';
    $cargoUsuario = (isset($_POST['cargoUsuario'])) ? $_POST['cargoUsuario'] : '';
    $telefonoUsuario = (isset($_POST['telefonoUsuario'])) ? $_POST['telefonoUsuario'] : '';
    $usuarioUsuario = (isset($_POST['usuarioUsuario'])) ? $_POST['usuarioUsuario'] : '';
    $pass = (isset($_POST['claveUsuario'])) ? $_POST['claveUsuario'] : '';

    $claveUsuario = md5($pass); //Encrita la contraseña
    
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : '';

    switch($opcion){
        case 1: //alta
            $consulta = "INSERT INTO usuario (nombreUsuario, cargoUsuario, telefonoUsuario, usuarioUsuario, claveUsuario) 
                        VALUES('$nombreUsuario', '$cargoUsuario', '$telefonoUsuario', '$usuarioUsuario', '$claveUsuario') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT idUsuario, nombreUsuario, cargoUsuario, telefonoUsuario, usuarioUsuario, claveUsuario 
                        FROM usuario ORDER BY idUsuario DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //modificación
            $consulta = "UPDATE usuario SET nombreUsuario='$nombreUsuario', cargoUsuario='$cargoUsuario', telefonoUsuario='$telefonoUsuario', usuarioUsuario='$usuarioUsuario', claveUsuario='$claveUsuario'
                        WHERE idUsuario='$idUsuario' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT idUsuario, nombreUsuario, cargoUsuario, telefonoUsuario, usuarioUsuario, claveUsuario 
                        FROM usuario WHERE idUsuario='$idUsuario' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;        
        case 3://baja
            $consulta = "DELETE FROM usuario WHERE idUsuario='$idUsuario' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;        
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
    $conexion = NULL;