<h1>{{$pagina->titulo}}</h1>

<!--Se busca si existen bloques-->
@if($bloques)
    <!--Si existen bloques recorro el array de bloques que contiene la pagina-->
    @foreach($bloques as $bloque)
        <h3>{{$bloque->titulo}}</h3>
        @php
        $columnas = $bloque->columna;
        @endphp
        <div id="bloque">
            <!--Recorro las columnas que contiene cada bloque-->
            @foreach($columnas as $columna)
            @php
                $elementos = $columna->elemento;
            @endphp
                <div class="column_container" style=" width: {{$columna->ancho . 'px'}}; height: {{$columna->alto . 'px'}}; left:{{$columna->espacio_izquierda . 'px'}}; top:{{$columna->espacio_arriba . 'px'}}">
                <!--Recorro los elementos que contiene cada columna y los muestro-->
                @foreach($elementos as $elemento)
                    <!--Recibe el atributo tipo desde base de datos y dependiendo de lo que reciba crea una imagen,parrafo o video-->
                    @switch($elemento->tipo)
                        @case('img')
                            <img class="imagen" src="{{secure_asset('ImagenesBD/' . $elemento->contenido)}}" style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}" onclick="mostrarImagen(this.src);">
                        @break
                        @case('title')
                            <h4 class="titulo" style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}">{{$elemento->contenido}}</h4>
                        @break
                        @case('p')
                            <p class="parrafo" style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}; font-size:13px">{{$elemento->contenido}}</p>
                        @break
                        @case('video')
                            <iframe class="video" src="{{$elemento->contenido}}" frameborder="0" allowfullscreen style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}"></iframe>
                        @break
                    @endswitch
                @endforeach
            </div>
            @endforeach
        </div>
    @endforeach
@endif
