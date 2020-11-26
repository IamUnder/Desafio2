
var inicializar = function () {
    contador = 0;
};

document.body.onload = inicializar();

var addFila = function () {
    contador += 1;

    nombre = 'card-' + contador;

    var formulario = document.querySelector('form#examen');

    //Creo la card
    var card = document.createElement('div');
    card.className = 'card d-flex justify-content-center mb-1 ' + nombre;
    card.id = 'card-' + contador;

    //Creo el card-body
    var cardBody = document.createElement('div');
    cardBody.className = 'card-body text-center';

    //Pongo el titulo de la 
    var titulo = document.createElement('h5');
    card.setAttribute("name", "tituloPregunta");
    titulo.className = 'card-title';
    titulo.innerHTML = 'Pregunta&nbsp;' + contador;

    //Creamos el div con el drop and Drop
    var div = document.createElement('div');
    div.className = 'd-flex justify-content-center align-items-center';
    div.setAttribute("ondrop", "drop(event)");
    div.setAttribute("ondragover", "allowDrop(event)");
    div.setAttribute("id", "div" + contador);
    div.style.width = "100%";
    div.style.height = "100px";
    div.style.border = "1px solid black";

    var imagen = document.createElement('img');
    imagen.className = 'ml-3 mb-3 mt-0';
    imagen.style.width = "50px";
    imagen.style.height = "50px";
    imagen.style.marginTop = "2%";
    imagen.style.cursor = "pointer";
    imagen.setAttribute("id", "del" + contador);
    imagen.setAttribute("src", "../img/delete.png");

    cardBody.appendChild(titulo);
    cardBody.appendChild(div);
    card.appendChild(cardBody);
    card.appendChild(imagen);

    imagen.addEventListener('click', delPregunta);

    formulario.appendChild(card);
};

var delPregunta = function () {
    this.parentNode.parentNode.removeChild(this.parentNode.parentNode.removeChild(this.parentNode));

    resetearContador();

};

var resetearContador = function () {



};