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
    }
});


function mostrarPagina(id){
    $.ajax({
        url: '/pagina/' + id ,
        type: "get",
        success: function (result) {
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


