@extends('layout')

@section('content')
{{--@include('conexionBD')--}}
    @if($index != 'inicio')
    @foreach($index as $parte)
    <h1>{{$parte->titulo}}</h1>
    @php
    $elementos = $parte->elemento
    @endphp
        @foreach($elementos as $elemento)
            @switch($elemento->tipo)
                @case('img')
                <img src="{{$elemento->contenido}}">
                @break
                @case('p')
                <p>{{$elemento->contenido}}</p>
                @break
                @case('video')
                <iframe width="1280" height="720" src="{{$elemento->contenido}}" frameborder="0" allowfullscreen></iframe>
                @break
            @endswitch
        @endforeach
    @endforeach
    @else
        <div style="display: flex">
        <iframe width="1280" height="720" src="https://www.youtube.com/embed/ekzhLuNs0N4?VQ = hd720" frameborder="0" allowfullscreen=""></iframe>
        <iframe width="1280" height="720" src="https://www.youtube.com/embed/cnjlB7DZEvc?VQ = hd720" frameborder="0" allowfullscreen=""></iframe>
        </div>
    @endif




@endsection
