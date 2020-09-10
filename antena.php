<?php
    include_once 'BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT idAntena, nombreAntena, modeloAntena, modoAntena, ipAntena, usuarioAntena, claveAntena, macAntena, lugarAntena FROM antena";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("INCLUDES/header.php") ?>
                    <div><pre></pre>
                        <h4 class="text-center text-dark">Antenas</h4> 
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
                                    <table id="tablaAntenas" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre Antena</th>
                                                <th>Modelo</th>                                
                                                <th>Modo Antena</th>  
                                                <th>IP</th>
                                                <th>Usuario</th>
                                                <th>Clave</th>
                                                <th>MAC</th>  
                                                <th>Lugar</th>
                                                
                                                <th></th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                            
                                                foreach($data as $dat) 
                                                {                                                        
                                            ?>
                                                <tr>
                                                    <td><?php echo $dat['idAntena'] ?></td>
                                                    <td><?php echo $dat['nombreAntena'] ?></td>
                                                    <td><?php echo $dat['modeloAntena'] ?></td>
                                                    <td><?php echo $dat['modoAntena'] ?></td>
                                                    <td><?php echo $dat['ipAntena'] ?></td> 
                                                    <td><?php echo $dat['usuarioAntena'] ?></td> 
                                                    <td><?php echo $dat['claveAntena'] ?></td> 
                                                    <td><?php echo $dat['macAntena'] ?></td>
                                                    <td><?php echo $dat['lugarAntena'] ?></td>
                                                                                                            
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
                            <form id="formAntenas">    
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreAntena" class="col-form-label">Nombre Antena:</label>
                                        <input type="text" class="form-control" id="nombreAntena">
                                    </div>
                                    <div class="form-group">
                                        <label for="modelo" class="col-form-label">Modelo:</label>
                                        <input type="text" class="form-control" id="modelo">
                                    </div>                
                                    <div class="form-group">
                                        <label for="modoAntena" class="col-form-label">Modo Antena:</label>
                                        <input type="text" class="form-control" id="modoAntena">
                                    </div>           
                                    <div class="form-group">
                                        <label for="ipAntena" class="col-form-label">IP:</label>
                                        <input type="text" class="form-control" id="ipAntena">
                                    </div>
                                    <div class="form-group">
                                        <label for="usuarioAntena" class="col-form-label">Usuario:</label>
                                        <input type="text" class="form-control" id="usuarioAntena">
                                    </div>                
                                    <div class="form-group">
                                        <label for="claveAntena" class="col-form-label">Clave:</label>
                                        <input type="text" class="form-control" id="claveAntena">
                                    </div>
                                    <div class="form-group">
                                        <label for="macAntena" class="col-form-label">MAC:</label>
                                        <input type="text" class="form-control" id="macAntena">
                                    </div>                
                                    <div class="form-group">
                                        <label for="lugarAntena" class="col-form-label">Lugar:</label>
                                        <input type="text" class="form-control" id="lugarAntena">
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