<?php
    include_once 'BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT idCliente, nombreCliente, telefonoCliente, direccionCliente, fechInicPerioCliente, fechFinPerioCliente, apCliente FROM cliente";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("INCLUDES/header.php") ?>
                    <div><pre></pre>
                        <h4 class="text-center text-dark">Clientes</h4> 
                    </div>    
        
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">            
                            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Registra Nuevo</button>    
                            </div>    
                        </div>    
                    </div>    
                    <br>  
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">        
                                    <table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre Cliente</th>
                                                <th>Telefono</th>                                
                                                <th>Direccion</th>  
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Concluir</th>
                                                <th>Ap</th>
                                                
                                                <th></th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                            
                                                foreach($data as $dat) 
                                                {                                                        
                                            ?>
                                                <tr>
                                                    <td><?php echo $dat['idCliente'] ?></td>
                                                    <td><?php echo $dat['nombreCliente'] ?></td>
                                                    <td><?php echo $dat['telefonoCliente'] ?></td>
                                                    <td><?php echo $dat['direccionCliente'] ?></td>
                                                    <td><?php echo $dat['fechInicPerioCliente'] ?></td> 
                                                    <td><?php echo $dat['fechFinPerioCliente'] ?></td> 
                                                    <td><?php echo $dat['apCliente'] ?></td> 
                                                                                                                                                                
                                                    <td></td>
                                                </tr>
                                            <?php
                                                }
                                            ?>                                
                                        </tbody>        
                                    </table>                    
                                </div>
                            </div>    
                        </div>  
                    </div>    
        
                    <!--Modal para CRUD-->
                    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <form id="formClientes">    
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreCliente" class="col-form-label">Nombre Cliente:</label>
                                        <input type="text" class="form-control" id="nombreCliente">
                                    </div>
                                    <div class="form-group">
                                        <label for="telefonoCliente" class="col-form-label">Telefono:</label>
                                        <input type="text" class="form-control" id="telefonoCliente">
                                    </div>                
                                    <div class="form-group">
                                        <label for="direccionCliente" class="col-form-label">Direccion:</label>
                                        <input type="text" class="form-control" id="direccionCliente">
                                    </div>           
                                    <div class="form-group">
                                        <label for="fechInicPerioCliente" class="col-form-label">Fecha inicio:</label>
                                        <input type="date" class="form-control" id="fechInicPerioCliente">
                                    </div>
                                    <div class="form-group">
                                        <label for="fechFinPerioCliente" class="col-form-label">Fecha concluir:</label>
                                        <input type="date" class="form-control" id="fechFinPerioCliente">
                                    </div>                
                                    <div class="form-group">
                                        <label for="apCliente" class="col-form-label">Ap:</label>
                                        <input type="text" class="form-control" id="apCliente">
                                    </div>
                                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                                </div>
                            </form>    
                            </div>
                        </div>
                    </div>
<?php include("INCLUDES/footer.php") ?>