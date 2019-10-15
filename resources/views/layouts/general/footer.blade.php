<footer>
    <div class="container pt-5">
        <div class="row justify-content-start">
            <div class="col-12 col-md-6 col-lg-5 d-flex align-items-center">
                <div class="">
                    <img class="logo align-self-center" src="{{ asset($data['empresa']['images']['logoFooter']['i']) }}" alt="" srcset="">
                    <div class="mt-2">{!! $data[ "empresa" ]->footer[ "text" ] !!}</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg">
                <h3 class="title text-uppercase mb-4">Sitemap</h3>
                <ul class="list-unstyled mb-0 menu text-uppercase">
                    <li class="mb-2"><a href="{{ URL::to( '/' ) }}">inicio</a></li>
                    <li class="my-2"><a href="{{ URL::to( '/empresa' ) }}">la empresa</a></li>
                    <li class="my-2"><a href="{{ URL::to( '/productos' ) }}">productos</a></li>
                    <li class="my-2"><a href="{{ URL::to( '/documentacion' ) }}">documentación</a></li>
                    <li class="my-2"><a href="{{ URL::to( '/cotizacion' ) }}">cotización online</a></li>
                    <li class="my-2"><a href="{{ URL::to( '/contacto' ) }}">contacto</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg">
                <h3 class="title text-uppercase mb-4">{{ config('app.name') }}</h3>
                <ul class="list-unstyled info mb-0">
                    <li class="d-flex pt-1">
                        <i style="margin-right:10px;" class="icono fas fa-map-marker-alt"></i>
                        <div class="" style="margin-top: -5px; width: calc(100% - 37px)" >
                            <p class="mb-0"><a href="{{ $data[ 'empresa' ]->domicile[ 'link' ] }}" target="blank">{{ $data[ 'empresa' ]->domicile["calle"] }} {{ $data[ 'empresa' ]->domicile["altura"] }} @if(!empty($data[ 'empresa' ]->domicile["cp"])) ({{ $data[ 'empresa' ]->domicile["cp"] }})@endif<br>{{ $data[ 'empresa' ]->domicile["provincia"] }}@if(!empty($data[ 'empresa' ]->domicile["localidad"])) - {{ $data[ 'empresa' ]->domicile["localidad"] }}@endif | {{ $data[ 'empresa' ]->domicile["pais"] }}</a></p>
                        </div>
                    </li>
                        @php
                    $A_tel = $A_wha = [];
                    foreach($data["empresa"]->phone AS $t) {
                        if($t["tipo"] == "tel")
                            $A_tel[] = $t;
                        else
                            $A_wha[] = $t;
                    }
                    @endphp
                    <li class="d-flex mt-2">
                        <i style="margin-right:10px;" class="icono fas fa-phone-volume"></i>
                        <div class="" style="margin-top: -5px; width: calc(100% - 37px)">
                            @foreach($A_tel AS $t)
                                @php
                                $visible = $t[ "telefono" ];
                                $telefono = $t[ "telefono" ];
                                if( !empty( $t[ "visible" ] ) )
                                    $visible = $t[ "visible" ];
                                @endphp
                                @if( $t[ "is_link" ] )
                                    <a title="{{ $visible }}" class="text-truncate d-block" href="tel:{{ $telefono }}">{{ $visible }}</a>
                                @else
                                    {{ $visible }}
                                @endif
                            @endforeach
                        </div>
                    </li>
                    @if(!empty($A_wha))
                    <li class="d-flex mt-2">
                        <i class="fab fa-whatsapp" style="color:#4DC95C; margin-right:10px;"></i>
                        <div class="" style="margin-top: -5px; width: calc(100% - 37px)">
                            @foreach($A_wha AS $t)
                                <a title="{{ $t['visible'] }}" class="whatsapp text-truncate d-block" href="https://wa.me/{!!$t['telefono']!!}">{{ $t["visible"] }}</a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    <li class="d-flex mt-2">
                        <i style="margin-right:10px;" class="icono far fa-envelope"></i>
                        <div class="" style="margin-top: -5px; width: calc(100% - 37px)">
                            @foreach($data["empresa"]["email"] as $e)
                                <a title="{{ $e }}" class="text-truncate d-block" href="mailto:{!!$e!!}" target="blank">{!!$e!!}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="osole py-2">
    <div class="container">
        <div class="row by">
            <div class="col-12">
                <hr class="my-2"/>
                <p class="mb-0 d-flex justify-content-between">
                    <span>© {{ env( 'APP_YEAR' ) }}</span>
                    <a target="_blank" href="{{ env('APP_UAUTHOR') }}" style="color:inherit" class="right text-uppercase">by {{ env('APP_AUTHOR') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>