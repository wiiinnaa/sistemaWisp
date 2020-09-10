<?php
    include_once 'BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT idTarifa,nombreTarifa, descargarTarifa, subidaTarifa,precioTarifa FROM tarifa";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("INCLUDES/header.php") ?>
                    <div><pre></pre>
                        <h4 class="text-center text-dark">Tarifas</h4> 
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
                                    <table id="tablaTarifas" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre Tarifa</th>
                                                <th>Descarga</th>                                
                                                <th>Subida</th>  
                                                <th>precio</th>
                                                                                                
                                                <th></th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                            
                                                foreach($data as $dat) 
                                                {                                                        
                                            ?>
                                                <tr>
                                                    <td><?php echo $dat['idTarifa'] ?></td>
                                                    <td><?php echo $dat['nombreTarifa'] ?></td>
                                                    <td><?php echo $dat['descargarTarifa'] ?></td>
                                                    <td><?php echo $dat['subidaTarifa'] ?></td>
                                                    <td><?php echo $dat['precioTarifa'] ?></td>                                                    
                                                                                                            
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
                            <form id="formTarifas">    
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreTarifa" class="col-form-label">Nombre Tarifa:</label>
                                        <input type="text" class="form-control" id="nombreTarifa">
                                    </div>
                                    <div class="form-group">
                                        <label for="descargarTarifa" class="col-form-label">Descarga:</label>
                                        <input type="text" class="form-control" id="descargarTarifa">
                                    </div>                
                                    <div class="form-group">
                                        <label for="subidaTarifa" class="col-form-label">Subida:</label>
                                        <input type="text" class="form-control" id="subidaTarifa">
                                    </div>           
                                    <div class="form-group">
                                        <label for="precioTarifa" class="col-form-label">Precio:</label>
                                        <input type="text" class="form-control" id="precioTarifa">
                                    </div>
                                    
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