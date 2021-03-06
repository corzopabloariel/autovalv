<div class="wrapper-empresa bg-white font-lato wrapper-">
    <div id="carouselExampleIndicators" class="carousel bg-white slide wrapper-slider" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i = 0 ; $i < count($data['sliders']) ; $i++)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @for($i = 0 ; $i < count($data['sliders']) ; $i++)
            <div class="carousel-item @if($i == 0) active @endif">
                <div style="background-image: url({{asset($data['sliders'][$i]['image'][ 'i' ])}}); background-repeat: no-repeat; background-size: auto; height: 180px; background-position: center center;"></div>
            </div>
            @endfor
        </div>
    </div>
    <div class="container">
        <div class="row wrapper- SinEspacio hidden-mobile">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        la empresa
                    </div>
                </div>
            </div>
            @include( 'layouts.general.dato' )
        </div>
        <div class="row wrapper- pb-5 mt-0 SinEspacio">
            <div class="col-12 text-justify contenido">
                <img class="order-1 order--1 mb-3 w-100" src="{{ asset( $data[ 'contenido' ]->content[ 'image' ][ 'i' ] ) }}" onerror="this.src='{{ asset(`images/general/no-image-icon.png`) }}'" alt="La empresa" srcset="">
                <div class="order--2 order-2">
                    {!! $data[ "contenido" ]->content[ "text1" ] !!}
                    <div class="frase1 my-4 text-center font-roboto">
                        {!! $data[ "contenido" ]->content[ "phrase1" ] !!}
                    </div>
                    {!! $data[ "contenido" ]->content[ "text2" ] !!}
                    <div class="frase2 text-center mx-auto px-3 my-4">
                        {!! $data[ "contenido" ]->content[ "phrase2" ] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>