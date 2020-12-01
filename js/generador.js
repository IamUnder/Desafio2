
var inicializar = function () {
    contador = 0;
};

document.body.onload = inicializar();

var addFila = function () {
    contador += 1;

    nombre = 'card-' + contador;

    var formulario = document.querySelector('div#preguntas');

    //Creo la card
    var card = document.createElement('div');
    card.setAttribute("name", "cards");
    card.className = 'card d-flex justify-content-center mb-1  border-success cards';
    card.id = nombre;

    //Creo el card-body
    var cardBody = document.createElement('div');
    cardBody.className = 'card-body text-center';

    //Pongo el titulo de la 
    var titulo = document.createElement('h5');
    titulo.setAttribute("name", "tituloPregunta");
    titulo.className = 'card-title';
    titulo.innerHTML = 'Pregunta&nbsp;' + contador;

    //Creamos el div con el drop and Drop
    var div = document.createElement('div');
    div.className = 'd-flex justify-content-center align-items-center overflow-auto';
    div.setAttribute("ondrop", "drop(event)");
    div.setAttribute("ondragover", "allowDrop(event)");
    div.setAttribute("id", "div" + contador);
    div.setAttribute("name", "DragDrop");
    div.style.width = "100%";
    div.style.height = "10vh";
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
    this.parentNode.parentNode.removeChild(this.parentNode);

    resetearContador();

};

var resetearContador = function () {

    var preguntas;
    var cards;
    var contadorAux;
    var divsDragDrop;

    preguntas = document.getElementsByName('tituloPregunta');
    cards = document.getElementsByName('cards');
    divsDragDrop = document.getElementsByName('DragDrop');

    for (var i = 0; i < preguntas.length; i++) {
        preguntas[i].innerHTML = 'Pregunta&nbsp;' + (i + 1);
        cards[i].id = 'card-' + (i + 1);
        divsDragDrop[i].id = 'div' + (i + 1);
        contadorAux = (i + 1);
    }
    contador = contadorAux;

};

var prepararObjeto = function () {

    var formulario;
    formulario = document.getElementById('examen');

    var tituloExamen;
    tituloExamen = formulario.getElementsByTagName('input');

    var descripcion;
    descripcion = formulario.getElementsByTagName('textarea');

    var dniProfesor;
    dniProfesor = formulario.getElementsByTagName('small');
    var textoDNI;
    textoDNI = dniProfesor[0].innerHTML;
    console.log('El DNI del profesor es: ' + textoDNI);

    console.log('Titulo del examen: ' + tituloExamen[0].value);
    console.log('La descripcion es: ' + descripcion[0].value);


    var conjPreguntas;
    conjPreguntas = formulario.getElementsByTagName('p');
    var preguntasTam = conjPreguntas.length;

    var pregunta;

    for (i = 0; i < conjPreguntas.length; i++) {
        pregunta = conjPreguntas[i].innerHTML;
        console.log('La pregunta numero ' + (i + 1) + ' es: ' + pregunta);
    }
    let examen = new Examen(textoDNI, tituloExamen, descripcion, conjPreguntas);
};

class Examen {
    constructor(dni_Profesor, titulo, descripcion, preguntas) {
        this.dni_Profesor = dni_Profesor;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.preguntas = preguntas;
    }
    
}
