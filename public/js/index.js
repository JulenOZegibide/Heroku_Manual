let botonmenu = document.getElementById('menubutton');
let menuimg = document.getElementById('menuimg');
let menulateral = document.getElementById("menulateral");

botonmenu.addEventListener("click", function(){
    if(menulateral.className == 'ocultar'){
        menuimg.style.transform='rotate(-90deg)';
        menulateral.classList.remove("ocultar");
        menulateral.classList.add("mostrar");
    }else {
        menuimg.style.transform='rotate(0deg)';
        menulateral.classList.remove("mostrar");
        menulateral.classList.add("ocultar");

        resultado.style.visibility = "hidden";
        document.getElementById("busqueda").value= "";
        document.getElementById("busqueda").style.borderBottomLeftRadius = "17px";
        document.getElementById("busqueda").style.borderBottomRightRadius = "17px";
    }
});

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
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError)
        }
    });
}

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

let resultado = document.createElement('div');
resultado.setAttribute('id', 'resultado');
document.body.appendChild(resultado);
resultado.style.visibility = "hidden";


function buscar(texto) {
    let buscador = document.getElementById("busqueda");

    if(texto == ""){
        buscador.style.borderBottomLeftRadius = "17px";
        buscador.style.borderBottomRightRadius = "17px";
        resultado.style.visibility = "hidden";
    }

    if(texto != ""){
        resultado.style.visibility = "visible";

        if ( resultado.hasChildNodes() )
        {
            while ( resultado.childNodes.length >= 1 )
            {
                resultado.removeChild( resultado.firstChild );

            }
        }


        $.ajax({
            url: '/?busqueda=' + texto ,
            type: "get",
            async : true,
            success: function (result) {
                buscador.style.borderBottomLeftRadius = "0";
                buscador.style.borderBottomRightRadius = "0";

                let contenido = $("<div />").html(result).find('#paginas').html();
                eval(contenido);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError)
            }
        });
    }
}
