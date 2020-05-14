<h1>{{$pagina->titulo}}</h1>

<!--Se busca si existen bloques-->
@if($bloques)
    <!--Si existen bloques recorro el array de bloques que contiene la pagina-->
    @foreach($bloques as $bloque)

        <h3>{{$bloque->titulo}}</h3>
            @php
            $columnas = $bloque->columna;
            @endphp
        <div style="width: 1260px;margin: 0 auto;background-color: red;height: 300px;position: relative;">
            <!--Recorro las columnas que contiene cada bloque-->
            @foreach($columnas as $columna)
            @php
                $elementos = $columna->elemento;

            @endphp
                <div id="column_container" style="border: 1px solid black; position: absolute; width: {{$columna->ancho . 'px'}}; height: {{$columna->alto . 'px'}}; left:{{$columna->espacio_izquierda . 'px'}}; top:{{$columna->espacio_arriba . 'px'}}">
                <strong>{{$columna->titulo}}</strong>

                <!--Recorro los elementos que contiene cada columna y los muestro-->
                @foreach($elementos as $elemento)
                    <!--Recibe el atributo tipo desde base de datos y dependiendo de lo que reciba crea una imagen,parrafo o video-->
                    @switch($elemento->tipo)
                        @case('img')
                            <img src="{{$elemento->contenido}}" style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}">
                        @break
                        @case('title')
                        <h4 style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}">{{$elemento->contenido}}</h4>
                        @break
                        @case('p')
                        <p style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}">{{$elemento->contenido}}</p>
                        @break
                        @case('video')
                        <iframe src="{{$elemento->contenido}}" frameborder="0" allowfullscreen style="position: absolute; width: {{$elemento->ancho . 'px'}}; height: {{$elemento->alto . 'px'}}; left:{{$elemento->espacio_izquierda . 'px'}}; top:{{$elemento->espacio_arriba . 'px'}}"></iframe>
                        @break
                    @endswitch
                @endforeach
            </div>
            @endforeach
        </div>
    @endforeach
@endif
<hr>
<hr>
<hr>
<hr>

<div style="width: 1260px;margin: 0 auto;background-color: red;height: 300px;position: relative;">
    <div style="border: 1px solid black;height: 300px; width: 700px;position: absolute;">
        <p style="position: absolute;left: 0;top: 0">Can't go through the whole song without getting emotional. This is what real good music does to you. Everytime I hear "I had a dream I was you..." tears come down from my eyes.</p>
    </div>
    <div style="border: 1px solid black;height: 300px;width: 560px;position: absolute;left: 700px;">
        <p style="position: absolute;left: 0;top: 0">Can't go through the whole song without getting emotional. This is what real good music does to you. Everytime I hear "I had a dream I was you..." tears come down from my eyes.</p>
    </div>
</div>
