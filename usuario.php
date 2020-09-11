<?php
    include_once 'BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT idUsuario, nombreUsuario, cargoUsuario, telefonoUsuario, usuarioUsuario, claveUsuario FROM usuario";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include("INCLUDES/header.php") ?>
                    <div><pre></pre>
                        <h4 class="text-center text-dark">Usuarios</h4> 
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
                                    <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre Usuario</th>
                                                <th>Cargo</th>
                                                <th>Telefono</th>
                                                <th>Nick de Usuario</th>

                                                <th></th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                            
                                                foreach($data as $dat) 
                                                {                                                        
                                            ?>
                                                <tr>
                                                    <td><?php echo $dat['idUsuario'] ?></td>
                                                    <td><?php echo $dat['nombreUsuario'] ?></td>
                                                    <td><?php echo $dat['cargoUsuario'] ?></td>
                                                    <td><?php echo $dat['telefonoUsuario'] ?></td>
                                                    <td><?php echo $dat['usuarioUsuario'] ?></td> 
    
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
                            <form id="formUsuarios">    
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombreUsuario" class="col-form-label">Nombre Usuario:</label>
                                        <input type="text" class="form-control" id="nombreUsuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="cargoUsuario" class="col-form-label">Cargo:</label>
                                        <input type="text" class="form-control" id="cargoUsuario">
                                    </div>                
                                    <div class="form-group">
                                        <label for="telefonoUsuario" class="col-form-label">Telefono</label>
                                        <input type="text" class="form-control" id="telefonoUsuario">
                                    </div>           
                                    <div class="form-group">
                                        <label for="usuarioUsuario" class="col-form-label">Nick Usuario:</label>
                                        <input type="text" class="form-control" id="usuarioUsuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="claveUsuario" class="col-form-label">Clave:</label>
                                        <input type="password" class="form-control" id="claveUsuario">
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