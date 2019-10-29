<div class="wrapper-home bg-white wrapper-">
    <div class="container-fluid">
        <div class="row SinEspacio">
            <div class="col-12 col-lg-8 pl-0">
                <div id="carouselExampleIndicators" class="carousel bg-white slide wrapper-slider" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i = 0 ; $i < count($data['sliders']) ; $i++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        @for($i = 0 ; $i < count($data['sliders']) ; $i++)
                        <div class="carousel-item @if($i == 0) active @endif">
                            <img class="d-block w-100" src="{{asset($data['sliders'][$i]['image'][ 'i' ])}}" >
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg container-grid pr-0">
                <div class="cotizacion d-flex align-items-center" style="background-image: url({{ asset( 'images/general/cotizacion.jpg' ) }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                    <div class="ml-5 pl-3 w-100">
                        <h3 class="title font-roboto">Cotización Online</h3>
                        <p class="font-lat">Rápido, Fácil y Sin Costo</p>
                        <div class="mt-2">
                            <a href="{{ URL::to( 'cotizacion' ) }}" class="btn px-4 rounded-pill text-uppercase">ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="buscador d-flex align-items-center" style="background-image: url({{ asset( 'images/general/buscador.jpg' ) }}); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                    <div class="ml-5 pl-3 pr-5 w-100">
                        <h3 class="title font-roboto">Buscar Productos</h3>
                        <p class="font-lat">Por Modelo o Código</p>
                        <form action="{{ route( 'buscar' ) }}" method="get" class="d-flex align-items-center">
                            <i class="fas fa-search mr-3"></i><input type="search" name="buscar" placeholder="Estoy buscando..." style="width: auto;" class="form-control text-white px-0 bg-transparent border-left-0 border-right-0 border-top-0"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container destacado py-5">
        <h3 class="title text-center font-lato">
            <span>PRODUCTOS DESTACADOS</span>
        </h3>
        <div class="row normal mt-3">
            @foreach( $data[ "productos" ] AS $p )
                @php
                    $images = $p->images;
                    $img = "";
                    if( count( $images ) > 0)
                        $img = $images[ 0 ]->image[ 'i' ];
                @endphp
                <div class="col-12 col-md-6 col-lg-3 mt-4 producto wrapper-link">
                    <a href="{{ URL::to( 'productos/' . str_slug( $p->familia->title ) . '/' . str_slug( $p->title ) . '/' . $p->id ) }}">
                        <div class="card">
                            <img src="{{ asset( $img ) }}" alt="" class="card-img-top border-bottom-0">
                            <div class="card-body font-lato text-center">
                                {!! $p->title !!}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="iconos">
        <div class="container">
            <div class="row py-5 justify-content-center icon">
                @foreach( $data[ "contenido" ]->content[ 'icon' ] AS $c )
                    <div class="col-4 col-md-3 col-xl-2 d-flex bg-transparent align-items-center flex-column">
                        @isset( $c[ 'icon' ][ 'i' ] )
                        <img src="{{ asset( $c[ 'icon' ][ 'i' ] ) }}" alt="icon" class="mb-2" srcset="">
                        @endisset
                        <div class="mx-auto text-center">{!! $c[ 'text' ] !!}</div>
                    </div>
                @endforeach
                {{--<div class="col-12">
                    <ul class="list-group py-4 list-group-horizontal d-flex justify-content-center  border-0">
                    </ul>--}}
            </div>
        </div>
    </div>
</div>
<div class="wrapper-contacto">
    {!! $data[ "empresa" ]->domicile[ "mapa" ] !!}
</div>