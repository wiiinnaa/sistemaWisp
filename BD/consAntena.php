<?php
    include_once '../BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    // Recepción de los datos enviados mediante POST desde el JS   

    $nombreAntena = (isset($_POST['nombreAntena'])) ? $_POST['nombreAntena'] : '';
    $modeloAntena = (isset($_POST['modeloAntena'])) ? $_POST['modeloAntena'] : '';
    $modoAntena = (isset($_POST['modoAntena'])) ? $_POST['modoAntena'] : '';
    $ipAntena = (isset($_POST['ipAntena'])) ? $_POST['ipAntena'] : '';
    $usuarioAntena = (isset($_POST['usuarioAntena'])) ? $_POST['usuarioAntena'] : '';
    $claveAntena = (isset($_POST['claveAntena'])) ? $_POST['claveAntena'] : '';
    $macAntena = (isset($_POST['macAntena'])) ? $_POST['macAntena'] : '';
    $lugarAntena = (isset($_POST['lugarAntena'])) ? $_POST['lugarAntena'] : '';
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idAntena = (isset($_POST['idAntena'])) ? $_POST['idAntena'] : '';

    switch($opcion){
        case 1: //alta
            $consulta = "INSERT INTO antena (nombreAntena, modeloAntena, modoAntena, ipAntena, usuarioAntena, claveAntena, macAntena, lugarAntena) 
                        VALUES('$nombreAntena', '$modeloAntena', '$modoAntena', '$ipAntena', '$usuarioAntena', '$claveAntena', '$macAntena', '$lugarAntena') ";			
            $resultado = $conexion->prepare($consulta);
            $resultado->execute(); 

            $consulta = "SELECT idAntena, nombreAntena, modeloAntena, modoAntena, ipAntena, usuarioAntena, claveAntena, macAntena, lugarAntena 
                        FROM antena ORDER BY idAntena DESC LIMIT 1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 2: //modificación
            $consulta = "UPDATE antena SET nombreAntena='$nombreAntena', modeloAntena='$modeloAntena', modoAntena='$modoAntena', ipAntena='$ipAntena', usuarioAntena='$usuarioAntena', claveAntena='$claveAntena', macAntena='$macAntena', lugarAntena='$lugarAntena'
                        WHERE idAntena='$idAntena' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta = "SELECT idAntena, nombreAntena, modeloAntena, modoAntena, ipAntena, usuarioAntena, claveAntena, macAntena, lugarAntena 
                        FROM antena WHERE idAntena='$idAntena' ";       
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            break;        
        case 3://baja
            $consulta = "DELETE FROM antena WHERE idAntena='$idAntena' ";		
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();                           
            break;        
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
    $conexion = NULL;