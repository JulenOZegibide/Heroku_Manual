<?php
    if(isset($_GET["busqueda"])) {
        $busqueda = $_GET["busqueda"];
        buscarPaginas($busqueda);
    }

function buscarPaginas($busqueda){
    $paginas = App\Pagina::select('*')->where('titulo', 'like', '%' . $busqueda . '%')->get();
    foreach ($paginas as $pagina){
        echo "<script id='paginas'>
                let pagina = document.createElement('button');
                let titulo = document.createTextNode('{$pagina->titulo}');
                pagina.appendChild(titulo);
                pagina.addEventListener('click', function(){
                    mostrarPagina('{$pagina->id}');
                    document.getElementById('resultado').style.visibility = 'hidden';
                    document.getElementById('busqueda').value= '';
                    document.getElementById('busqueda').style.borderBottomLeftRadius = '17px';
                    document.getElementById('busqueda').style.borderBottomRightRadius = '17px';
                });
                pagina.setAttribute('class', 'enlacePagina');
                document.getElementById('resultado').appendChild(pagina);
              </script>";
    }
}
