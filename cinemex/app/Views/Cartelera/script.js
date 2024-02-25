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