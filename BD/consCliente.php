<?php
    include_once '../BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Recepción de los datos enviados mediante POST desde el JS   

    $nombreCliente = (isset($_POST['nombreCliente'])) ? $_POST['nombreCliente'] : '';
    $telefonoCliente = (isset($_POST['telefonoCliente'])) ? $_POST['telefonoCliente'] : '';
    $direccionCliente = (isset($_POST['direccionCliente'])) ? $_POST['direccionCliente'] : '';
    $fechInicPerioCliente = (isset($_POST['fechInicPerioCliente'])) ? $_POST['fechInicPerioCliente'] : '';
    $fechFinPerioCliente = (isset($_POST['fechFinPerioCliente'])) ? $_POST['fechFinPerioCliente'] : '';

    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : '';

    switch($opcion){
        case 1: //alta
            $consulta = "INSERT INTO cliente (nombreCliente, telefonoCliente, direccionCliente, fechInicPerioCliente, fechFinPerioCliente, apCliente) 
                        VALUES('$nombreCliente', '$telefonoCliente', '$direccionCliente', '$fechInicPerioCliente', '$fechFinPerioCliente', '$apCliente') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT idCliente, nombreCliente, telefonoCliente, direccionCliente, fechInicPerioCliente, fechFinPerioCliente, apCliente 
                        FROM cliente ORDER BY idCliente DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //modificación
            $consulta = "UPDATE cliente SET nombreCliente='$nombreCliente', telefonoCliente='$telefonoCliente', direccionCliente='$direccionCliente', fechInicPerioCliente='$fechInicPerioCliente', fechFinPerioCliente='$fechFinPerioCliente', apCliente='$apCliente'
                        WHERE idCliente='$idCliente' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT idCliente, nombreCliente, telefonoCliente, direccionCliente, fechInicPerioCliente, fechFinPerioCliente, apCliente 
                        FROM cliente WHERE idCliente='$idCliente' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;        
        case 3://baja
            $consulta = "DELETE FROM cliente WHERE idCliente='$idCliente' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;        
    }
    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
    $conexion = NULL;