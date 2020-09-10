<?php
    include_once '../BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Recepción de los datos enviados mediante POST desde el JS   

    $nombreTarifa = (isset($_POST['nombreTarifa'])) ? $_POST['nombreTarifa'] : '';
    $descargarTarifa = (isset($_POST['descargarTarifa'])) ? $_POST['descargarTarifa'] : '';
    $subidaTarifa = (isset($_POST['subidaTarifa'])) ? $_POST['subidaTarifa'] : '';
    $precioTarifa = (isset($_POST['precioTarifa'])) ? $_POST['precioTarifa'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idTarifa = (isset($_POST['idTarifa'])) ? $_POST['idTarifa'] : '';

    switch($opcion){
        case 1: //alta
            $consulta = "INSERT INTO tarifa (nombreTarifa, descargarTarifa, subidaTarifa, precioTarifa) 
                        VALUES('$nombreTarifa', '$descargarTarifa', '$subidaTarifa', '$precioTarifa') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT idTarifa, nombreTarifa, descargarTarifa, subidaTarifa, precioTarifa 
                        FROM tarifa ORDER BY idTarifa DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //modificación
            $consulta = "UPDATE tarifa SET nombreTarifa='$nombreTarifa', descargarTarifa='$descargarTarifa', subidaTarifa='$subidaTarifa', precioTarifa='$precioTarifa'
                        WHERE idTarifa='$idTarifa' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT idTarifa, nombreTarifa, descargarTarifa, subidaTarifa, precioTarifa 
                        FROM tarifa WHERE idTarifa='$idTarifa' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;        
        case 3://baja
            $consulta = "DELETE FROM tarifa WHERE idTarifa='$idTarifa' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;        
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
    $conexion = NULL;