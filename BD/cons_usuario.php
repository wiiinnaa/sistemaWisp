<?php
    include_once '../BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Recepción de los datos enviados mediante POST desde el JS   

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
    $cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : '';
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';

    switch($opcion)
    {
        case 1: //alta
            $consulta = "INSERT INTO usuario (nombreUsuario, apellidoUsuario, usuarioUsuario, claveUsuario, cargoUsuario, telefonoUsuario) VALUES('$nombre', '$apellidos', '$usuario', '$clave','$cargo','$telefono') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT idUsuario, nombreUsuario, apellidoUsuario, usuarioUsuario, claveUsuario, cargoUsuario, telefonoUsuario FROM usuario ORDER BY idUsuario DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //modificación
            $consulta = "UPDATE usuario SET nombreUsuario='$nombre', apellidoUsuario='$apellidos', usuarioUsuario='$usuario' claveUsuario='$clave', cargoUsuario='$cargo', telefonoUsuario='$telefono', WHERE idUsuario='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT idUsuario, nombreUsuario, apellidoUsuario, usuarioUsuario, claveUsuario, cargoUsuario, telefonoUsuario FROM usuario WHERE idUsuario='$id' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;        
        case 3://baja
            $consulta = "DELETE FROM usuario WHERE idUsuario='$id' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;        
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
    $conexion = NULL;