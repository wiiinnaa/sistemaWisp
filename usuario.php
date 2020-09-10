<?php
    session_start();

    if($_SESSION["s_usuario"] === null)
    {
        header("Location: index.php");
    }
?>

<?php
    include_once 'BD/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT id, nombre, pais, edad FROM personas";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
    <html lang="en">
        <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="shortcut icon" href="#" />  
                <title>SisWisp</title>
                
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

                <!-- Google fonts -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap">

                <!-- Ionic icons -->
                <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">

                <!-- sweetalert2 Css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" integrity="sha512-hAFMASi3RewTdcR5m7meVmbFAwEu+2t9oXGrckvHgW5ozmKpk7AIfOM9Y/DfdKvfVMTZB6cwXpCBPeIyaCqT2Q==" crossorigin="anonymous">

                <!-- CSS personalizado -->
                <link rel="stylesheet" href="CSS/style.css">
                
                <!--datables CSS básico-->
                <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

                <!--datables estilo bootstrap 4 CSS-->  
                <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">      
        </head>
        
        <body>
            <div class="d-flex" id="content-wrapper">

                <!-- Sidebar -->
                <div id="sidebar-container" class="bg-light border-right">
                    <div class="logo">
                        <h4 class="font-weight-bold mb-0">SistemaWisp</h4>
                    </div>
                    <div id="login-row" class="row justify-content-center align-items-center list-group-flush">
                        <div class="list-group-flush text-center">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                            <h6>Usuario:</h6>
                                <h5><span class="badge badge-light"><?php echo $_SESSION["s_usuario"];?></span></h5>
                        </div>    
                    </div>
                        <div class="menu list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i> Inicio</a>
                            <a href="antena.php" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-wifi lead mr-2"></i> Atenas</a>
                            <a href="#" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-contacts lead mr-2"></i> Clientes</a>
                            <a href="#" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i> Usuarios</a>
                            <a href="tarifa.php" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-document lead mr-2"></i> Tarifas</a>
                            <a href="#" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-clipboard lead mr-2"></i> Reportes</a>
                        </div>
                </div>
                <!-- Fin sidebar -->

                <!-- Page Content -->
                <div id="page-content-wrapper" class="w-100 bg-light-blue">

                    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                                    
                        <button type="button" class="btn btn-outline-secondary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">                                    
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" id="link" href="bd/logout.php"><i class="fas fa-sign-out-alt"></i>
                                            <h6>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                </svg>
                                                Cerrar Sesión
                                            </h6><span class="sr-only">(current) </span>
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </nav>
                    
                    <!-- Aqui empieza codigo -->

                    <div><pre></pre>
                        <h4 class="text-center text-dark">Usuarios</h4> 
                    </div>    
        
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">            
                            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
                            </div>    
                        </div>    
                    </div>    
                    <br>  
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">        
                                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>País</th>                                
                                                <th>Edad</th>  
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                            
                                                foreach($data as $dat) 
                                                {                                                        
                                            ?>
                                                <tr>
                                                    <td><?php echo $dat['id'] ?></td>
                                                    <td><?php echo $dat['nombre'] ?></td>
                                                    <td><?php echo $dat['pais'] ?></td>
                                                    <td><?php echo $dat['edad'] ?></td>    
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
                            <form id="formPersonas">    
                                <div class="modal-body">
                                    <div class="form-group">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre">
                                    </div>
                                    <div class="form-group">
                                    <label for="pais" class="col-form-label">País:</label>
                                    <input type="text" class="form-control" id="pais">
                                    </div>                
                                    <div class="form-group">
                                    <label for="edad" class="col-form-label">Edad:</label>
                                    <input type="number" class="form-control" id="edad">
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
                    <!-- Aqui termina codigo -->

                </div>
            </div> 
        
            <!-- jQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ==" crossorigin="anonymous"></script>

            <!-- Popper JS -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            
            <!-- Datatables JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            
            <!-- Bootstrap JS -->
            <script type="text/javascript" src="datatables/datatables.min.js"></script>    
            
            <script type="text/javascript" src="JS/main.js"></script>

            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#content-wrapper").toggleClass("toggled");
                    });
            </script>
        </body>
    </html>
