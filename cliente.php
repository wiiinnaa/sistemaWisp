<?php
    include_once 'BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT idCliente, nombreCliente, apellidoCliente, telefonoCliente, provinciaCliente, distritoCliente, direccionCliente, fechInicPerioCliente, fechFinPerioCliente, diasPendientes, comentarioCliente, apCliente, tarifa_idTarifa FROM personas";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("INCLUDES/header.php") ?>
    
<?php include("INCLUDES/footer.php") ?>