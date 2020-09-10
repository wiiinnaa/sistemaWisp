<?php
    session_start();

    if($_SESSION["s_usuario"] === null)
    {
        header("Location: index.php");
    }
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
                            <a href="usuario.php" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i> Usuarios</a>
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