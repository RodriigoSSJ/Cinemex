<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc($titulo); ?></title>
    <!-- Agrega la referencia a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0f0f0f;
            color: #ffffff;
        }
        /* Estilos adicionales específicos para esta página */
        .boton-con-imagen {
            background: none;
            border: none;
            cursor: pointer;
        }
        .boton-con-imagen img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1><?php echo esc($titulo); ?></h1>
    <table>
        <thead>
            <th><button class="boton-con-imagen btn btn-outline-primary" onclick="mostrarModal()">
                    <img src="https://play-lh.googleusercontent.com/BNmEw1TlON8udcnoaxSB0dskIi6IlluHhTFXObj_tXJ2Io28ZinhzMekZMzzxeZsY5zL" width="230" height="300">
                </button>
            </th>
            <!-- Aquí van las otras imágenes de las películas -->
        </thead>
    </table>
    <select name="Pelicula" id="Pelicula" class="form-control">
        <?php foreach ($peliculas as $pelicula) : ?>
            <option value="<?php echo $pelicula->PeliculaId; ?>"><?php echo $pelicula->Pelicula_Nombre; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="Nombre">Nombre:</label>
    <input type="text" name="Nombre" class="form-control"><br>

    <label for="Entradas">Entradas:</label>
    <input type="text" id="Entradas" name="Entradas" class="form-control"><br>

    <button onclick="calcularTotal()" class="btn btn-primary">Calcular Total</button><br>

    <label for="Total">Total a pagar:</label>
    <label id="Total" name="Total"></label><br>

    <label for="Pagar">Pagar con:</label>
    <input type="text" id="Pagar" name="Pagar" class="form-control"><br>

    <button onclick="calcularCambio()" class="btn btn-primary">Cambio</button><br>

    <label for="Cambio">El cambio es:</label>
    <label id="Cambio" name="Cmabio"></label><br>

    <input type="submit" value="CONFIRMAR" name="Confirmar" class="btn btn-primary">
    <!-- Agrega la referencia a Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function calcularTotal() {
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
    document.getElementById("Total").textContent = total;
}
function calcularCambio() {
            var Total = parseInt(document.getElementById("Total").textContent);
            var PagarCon = parseInt(document.getElementById("Pagar").value);
            var Cambio;
            if(PagarCon < Total){
                alert("Necesitas mas efectivo.");
            }else{
                Cambio = PagarCon - Total;
                document.getElementById("Cambio").textContent = Cambio;
            }
}
    </script>
</body>
</html>
