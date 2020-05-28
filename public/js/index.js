let botonmenu = document.getElementById('menubutton');
let menuimg = document.getElementById('menuimg');
let menulateral = document.getElementById("menulateral");
let resultadoPaginas = false;

//al cargar la pagina se crean todos los eventos
window.onload=function(){
    //funcion que abre  cierra el menu
    botonmenu.addEventListener("click", function(){
        if(menulateral.className == 'ocultar'){
            menuimg.style.transform='rotate(-90deg)';
            menulateral.classList.remove("ocultar");
            menulateral.classList.add("mostrar");
        }else {
            menuimg.style.transform='rotate(0deg)';
            menulateral.classList.remove("mostrar");
            menulateral.classList.add("ocultar");

            document.getElementById("resultado").style.height = "0";
            document.getElementById("busqueda").value= "";
            document.getElementById("busqueda").style.borderBottomLeftRadius = "17px";
            document.getElementById("busqueda").style.borderBottomRightRadius = "17px";

            resultadoPaginas = false;
        }
    });
    //funcion para cuando se clicka fuera del buscador que cierre la caja resultados
    document.body.addEventListener("click", function(){
        document.getElementById("resultado").style.visibility = "hidden";

        document.getElementById("busqueda").style.borderBottomLeftRadius = "17px";
        document.getElementById("busqueda").style.borderBottomRightRadius = "17px";
    }, false);

    //funcion para cuando se clicka en el buscador que muestre si hay resultados
    document.getElementById("busqueda").addEventListener("click", function(ev){
        document.getElementById("resultado").style.visibility = "visible";

        if(resultadoPaginas == true){
            document.getElementById("busqueda").style.borderBottomLeftRadius = "0";
            document.getElementById("busqueda").style.borderBottomRightRadius = "0";
        }

        ev.stopPropagation();
    }, false);
};

//funcion que se ejecuta al clickar en el enlace de una pagina y muestra dica pagina
function mostrarPagina(id){
    $.ajax({
        url: '/paginaajax/' + id ,
        type: "get",
        success: function (result) {
            window.history.pushState('', 'Manual SG', '/');
            menuimg.style.transform='rotate(0deg)';
            menulateral.classList.remove("mostrar");
            menulateral.classList.add("ocultar");
            document.getElementById('contenedor').innerHTML = result;

            if ( document.getElementById("resultado").hasChildNodes() )
            {
                while ( document.getElementById("resultado").childNodes.length >= 1 )
                {
                    document.getElementById("resultado").removeChild( resultado.firstChild );
                }
            }

            resultadoPaginas = false;
            document.getElementById("resultado").style.height = "0";
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError)
        }
    });
}

//funcion que se ejecuta al clickar en el logo y te lleva al inicio
document.getElementById("logo").addEventListener("click", function(){
    $.ajax({
        url: '/' ,
        type: "get",
        success: function (result) {
            window.history.pushState('', 'Manual SG', '/');
            let stringInicio = "        <div id=\"inicio\">\n" +
                "            <h1 id=\"tituloIndex\">MANUAL WONTAW Y WONTAGES</h1>\n" +
                "            <div id=\"videosInicio\">\n" +
                "                <iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/ekzhLuNs0N4?VQ = hd720\" frameborder=\"0\" allowfullscreen=\"\"></iframe>\n" +
                "                <iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/cnjlB7DZEvc?VQ = hd720\" frameborder=\"0\" allowfullscreen=\"\"></iframe>\n" +
                "            </div>\n" +
                "        </div>"
            document.getElementById('contenedor').innerHTML = stringInicio;

        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError)
        }
    });
});

//funcion que al clickar una imagen la muestra la imagen en su tamaño original
function mostrarImagen(src){
    let div = document.createElement('div');
    div.setAttribute('id', 'contenedorImagenGrande');
    let img = document.createElement('img');
    img.setAttribute('id', 'imagenGrande');
    img.setAttribute('src', src);
    div.appendChild(img);
    let salir = document.createElement('img');
    salir.setAttribute('src', '../img/close.png');
    salir.addEventListener("click", function(){
        document.getElementById('contenedor').removeChild(div)
    });
    salir.setAttribute('id', 'botonCerrar');
    div.appendChild(salir);
    document.getElementById('contenedor').appendChild(div)
}

//funcion que se ejecuta al estar escribiendo en el buscador
function buscar(texto) {
    let buscador = document.getElementById("busqueda");

    if(texto == ""){
        buscador.style.borderBottomLeftRadius = "17px";
        buscador.style.borderBottomRightRadius = "17px";
        document.getElementById("resultado").style.height = "0";
    }

    if(texto != ""){
        if ( document.getElementById("resultado").hasChildNodes() )
        {
            while ( document.getElementById("resultado").childNodes.length >= 1 )
            {
                document.getElementById("resultado").removeChild( resultado.firstChild );
            }
        }

        $.ajax({
            url: '/?busqueda=' + texto ,
            type: "get",
            async : false,
            success: function (result) {
                document.getElementById("resultado").style.height = "0";

                buscador.style.borderBottomLeftRadius = "17px";
                buscador.style.borderBottomRightRadius = "17px";

                let contenido = $("<div />").html(result).find('#paginas').html();

                if (contenido != null) {
                    document.getElementById("resultado").style.height = "auto";

                    buscador.style.borderBottomLeftRadius = "0";
                    buscador.style.borderBottomRightRadius = "0";
                    resultadoPaginas = true;
                }
                else{
                    resultadoPaginas = false;
                }
                eval(contenido);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError)
            }
        });
    }
}
