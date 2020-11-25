
var inicializar = function () {
    contador = 0;
};

document.body.onload = inicializar();

var addFila = function () {
    contador += 1;

    var formulario = document.querySelector('form#examen');

    var card = document.createElement('div');
    card.className = 'card text-center';

    var cardBody = document.createElement('div');
    cardBody.className = 'card-body';

    var titulo = document.createElement('h5');
    titulo.className = 'card-title';
    titulo.innerHTML = 'Panel titulo';

    var div = document.createElement('div');
    div.setAttribute("ondrop", "drop(event)");
    div.setAttribute("ondragover", "allowDrop(event)");
    div.setAttribute("id", "div" + contador);
    div.style.width = "100%";
    div.style.height = "50px";
    div.style.border = "1px solid black";

    var imagen = document.createElement('img');
    imagen.style.width = "50px";
    imagen.style.height = "50px";
    imagen.style.marginTop = "2%";
    imagen.style.cursor = "pointer";
    imagen.setAttribute("id", "del" + contador);
    imagen.setAttribute("src", "../img/del.png");
    imagen.setAttribute("onclick", 'delFila()');

    cardBody.appendChild(titulo);
    cardBody.appendChild(div);
    cardBody.appendChild(imagen);
    card.appendChild(cardBody);


    formulario.appendChild(card);
};

var eliminarFila = function () {
    this.parentNode.parentNode.removeChild(this.parentNode);
};



