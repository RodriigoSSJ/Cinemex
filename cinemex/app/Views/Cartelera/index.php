<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal con Formulario y Menú</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #e9ecef;
        }

        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-primary:hover {
            background-color: #495057;
            border-color: #495057;
        }

        .modal-content {
            background-color: #f8f9fa;
        }

        h1 {
            color: #343a40;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .modal-header {
            background-color: #343a40;
            color: #fff;
        }

        .modal-title {
            color: #fff;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .form-group label {
            color: #343a40;
            font-weight: bold;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #495057;
            border-color: #495057;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#segundoModal">Agregar Función</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Cinemex</h1>
        <!-- Botón para abrir el modal -->
        <?php foreach($peliculas as $pelicula) : ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formularioModal">
                <img src="<?php echo $pelicula->Pelicula_URL; ?>" width="230" height="300">
            </button>
        <?php endforeach; ?><br>
        <!-- Modal Formulario -->
        <div class="modal fade" id="formularioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulario de Contacto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario -->
                        <form action="<?php echo site_url('taquilla/insertarBoleto'); ?>" method="post">
                            <div class="form-group">
                                <select name="Pelicula" id="Pelicula" class="form-control">
                                <?php foreach ($peliculas as $pelicula) : ?>
                                <option value="<?php echo $pelicula->PeliculaId; ?>"><?php echo $pelicula->Pelicula_Nombre; ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Nombre">Nombre:</label>
                                <input type="text" class="form-control" id="Nombre" name="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="Entradas">Entradas:</label>
                                <input type="text" class="form-control" id="Entradas" name="Entradas">
                            </div>
                            <div class="form-group">
                                <button onclick="calcularTotal(event)" class="btn btn-primary">Calcular Total</button>
                            </div>
                            <div class="form-group">
                                <label for="Total">Total a Pagar:</label>
                                <input type="text" class="form-control" id="Total" name="Total" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Pagar">Pagar con:</label>
                                <input type="text" class="form-control" id="Pagar" name="Pagar">
                            </div>
                            <div class="form-group">
                                <button onclick="calcularCambio(event)" class="btn btn-primary">Cambio</button>
                            </div>
                            <div class="form-group">
                                <label for="Cambio">El cambio es:</label>
                                <input type="text" class="form-control" id="Cambio" name="Cambio" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Segundo -->
        <div class="modal fade" id="segundoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresa la Pelicula</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                <form action="<?php echo site_url('taquilla/insertarPelicula'); ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Pelicula:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" class="form-control" id="precio" name="precio">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS y jQuery (necesarios para el funcionamiento de los modales) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function calcularTotal(event) {
            event.preventDefault();

            var PeliculaId = document.getElementById("Pelicula").value;
            var entradas = parseInt(document.getElementById("Entradas").value);
            var precioPelicula;
    switch (PeliculaId) {
        case "1":
            precioPelicula = 40;
            break;
        case "2":
            precioPelicula = 45;
            break;
        case "3":
            precioPelicula = 60;
            break;
        case "4":
            precioPelicula = 35;
            break;
        default:
            precioPelicula = 0;
    }
    var total = precioPelicula * entradas;
    document.getElementById("Total").value = total;
}
function calcularCambio(event) {
            event.preventDefault();
            var Total = parseInt(document.getElementById("Total").value);
            var PagarCon = parseInt(document.getElementById("Pagar").value);
            var Cambio;
            if(PagarCon < Total){
                alert("Necesitas mas efectivo.");
            }else{
                Cambio = PagarCon - Total;
                document.getElementById("Cambio").value = Cambio;
            }
}
    </script>
</body>
</html>
