<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <title>SisVentas</title>

            <!-- Bootstrap Css -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

            <!-- Google fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap">

            <!-- Ionic icons -->
            <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">

            <!-- sweetalert2 Css -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" integrity="sha512-hAFMASi3RewTdcR5m7meVmbFAwEu+2t9oXGrckvHgW5ozmKpk7AIfOM9Y/DfdKvfVMTZB6cwXpCBPeIyaCqT2Q==" crossorigin="anonymous">
            
            <!-- Hoja de estilos -->
            <link rel="stylesheet" href="CSS/style.css">
        </head>
        <body>
            <div id="login">
                <br>
                <br>
                <h3 class="text-center display-4">Bienvenido a SistemaWisp</h3><pre></pre>
                <br>
                <br>
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-4">
                            <div id="login-box" class="card card-body col-md-12 bg-light text-dark">
                                <form id="formLogin" class="form" action="" method="POST">
                                    <h3 class="text-center text-dark">Iniciar Sesión</h3>
                                    <div class="form-group">
                                        <label for="usuario" class="text-dark">Usuario</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario" class="text-dark">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" name="submit" class="btn btn-info btn-lg btn-block"value="Conectar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Jquery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            
            <!-- Popper -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            
            <!-- Bootstrap js -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            
            <!-- sweetalert2 js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js" integrity="sha512-iZf/6rwsggmMPq9Zs6AY7j6LEpPiuLIz6BFCIrQabT+j0UlGaffGlSi1an4Va+/1B7Od1OBRTV74E5WV3NDoHQ==" crossorigin="anonymous"></script>
            
            <!-- Codigo js -->
            <script src="JS/login.js"></script>
        </body>
    </html>