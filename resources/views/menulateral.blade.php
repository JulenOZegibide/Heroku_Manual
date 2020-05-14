    <script type="text/javascript">


        var mymenu=new drilldownmenu({
            menuid: 'drillmenu1',
            breadcrumbid: 'drillcrumb',
            persist: {enable: true, overrideselectedul: true}
        })

    </script>



    <div id="drillmenu1" class="drillmenu">
        <ul style="min-height: 100vh">
            @foreach($circuitos as $circuito)
                @php
                    $primernivel = \App\Circuito::select('*')->where('nivel' , '=' , 1)->where('id','=',$circuito->id)->get();
                @endphp
                    @foreach($primernivel as $circuitonvl)
                        @php
                            $segundonivel = \App\Circuito::select('*')->where('nivel' , '=' , 2)->where('padre','=',$circuitonvl->id)->get();
                        @endphp
                        <li><a href="#">{{$circuitonvl->titulo}}</a>
                            <ul>
                            @if(sizeof($segundonivel) == 0)
                                @php
                                $paginas = \App\Pagina::select('*')->where('circuito_id' , '=' , $circuitonvl->id)->get();
                                @endphp
                                @foreach($paginas as $pagina)
                                        <li><button onclick="mostrarPagina({{$pagina->id}})">{{$pagina->titulo}}</button></li>
                                    @endforeach
                            @else
                                @foreach($segundonivel as $circuitonvl2)
                                    @php
                                        $tercernivel = \App\Circuito::select('*')->where('nivel' , '=' , 3)->where('padre','=',$circuitonvl2->id)->get();
                                    @endphp
                                    <li><a href="#">{{$circuitonvl2->titulo}}</a>
                                        <ul>
                                            @if(sizeof($tercernivel) == 0)
                                                @php
                                                    $paginas = \App\Pagina::select('*')->where('circuito_id' , '=' , $circuitonvl2->id)->get();
                                                @endphp
                                                @foreach($paginas as $pagina)
                                                    <li><button onclick="mostrarPagina({{$pagina->id}})">{{$pagina->titulo}}</button></li>
                                                @endforeach
                                            @else
                                                @foreach($tercernivel as $circuitonvl3)
                                                    @php
                                                        $cuartornivel = \App\Circuito::select('*')->where('nivel' , '=' , 4)->where('padre','=',$circuitonvl3->id)->get();
                                                    @endphp
                                                    <li><a href="#">{{$circuitonvl3->titulo}}</a>

                                                        <ul>
                                                            @if(sizeof($cuartonivel) == 0)
                                                                @php
                                                                    $paginas = \App\Pagina::select('*')->where('circuito_id' , '=' , $circuitonvl3->id)->get();
                                                                @endphp
                                                                @foreach($paginas as $pagina)
                                                                    <li><button onclick="mostrarPagina({{$pagina->id}})">{{$pagina->titulo}}</button></li>                                                                @endforeach
                                                            @else
                                                                @foreach($cuartonivel as $circuitonvl4)
                                                                    @php
                                                                        $quintonivel = \App\Circuito::select('*')->where('nivel' , '=' , 5)->where('padre','=',$circuitonvl4->id)->get();
                                                                    @endphp
                                                                    <li><a href="#">{{$circuitonvl4->titulo}}</a>

                                                                        <ul>
                                                                            @if(sizeof($quintonivel) == 0)
                                                                                @php
                                                                                    $paginas = \App\Pagina::select('*')->where('circuito_id' , '=' , $circuitonvl4->id)->get();
                                                                                @endphp
                                                                                @foreach($paginas as $pagina)
                                                                                    <li><button onclick="mostrarPagina({{$pagina->id}})">{{$pagina->titulo}}</button></li>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach($quintonivel as $circuitonvl5)
                                                                                    <li><a href="#">{{$circuitonvl5->titulo}}</a></li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>

                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            @endif
                            </ul>
                        </li>
                    @endforeach
            @endforeach
        </ul>
    </div>

