<div class="wrapper-home bg-white" style="padding-top: 15px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 pl-0">
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
            <div class="col-12 col-md px-0 d-flex align-items-stretch flex-column justify-content-between">
                <div class="cotizacion" style="background-image: url({{ asset( 'images/general/cotizacion.jpg' ) }}); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
                <div class="buscador" style="background-image: url({{ asset( 'images/general/buscador.jpg' ) }}); background-position: center center; background-repeat: no-repeat; background-size: cover;"></div>
            </div>
        </div>
    </div>
    <div class="container destacado py-4">
        <h3 class="title text-center font-lato">
            <span>PRODUCTOS DESTACADOS</span>
        </h3>
    </div>
    <div class="iconos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group py-4 list-group-horizontal d-flex justify-content-center icon border-0">
                        @foreach( $data[ "contenido" ]->content[ 'icon' ] AS $c )
                            <li class="list-group-item d-flex bg-transparent align-items-center flex-column px-5 border-0">
                                @isset( $c[ 'icon' ][ 'i' ] )
                                <img src="{{ asset( $c[ 'icon' ][ 'i' ] ) }}" alt="icon" class="mb-2" srcset="">
                                @endisset
                                <p class="mx-auto text-center">{!! $c[ 'text' ] !!}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>