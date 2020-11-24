/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var inicializar = function () {
    var boton = document.getElementById('addPregunta');
    boton.onclick = addLinea;
};

// Inicialización de la aplicación
document.body.onload = inicializar;

var addLinea = function () {
    var nombreProducto = document.getElementById('producto').value;
    var cantidadProducto = document.getElementById('cantidad').value;
    var precioUnitario = document.getElementById('precio-unitario').value;
    var totalProducto = cantidadProducto * precioUnitario;

    addFilaTaula(nombreProducto, cantidadProducto, precioUnitario, totalProducto);
    recalcularTotal();
    resetLinea();
};

var addFilaTaula = function () {
    var cosDiv = document.querySelector('div#preguntas');

    var card = document.createElement('div.card');
    var cardBody = document.createElement('div.card-body');
    var cardText = document.createElement('div.card-text');

    card.innerHTML = 'Hola Hola';

    card.appendChild(cardBody);
    card.appendChild(cardText);

    cosDiv.appendChild(card);
};

var eliminarFila = function () {
    this.parentNode.parentNode.removeChild(this.parentNode);
    recalcularTotal();
};



