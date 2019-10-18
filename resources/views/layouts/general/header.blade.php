<div id="menuNav" class="modal fade menuNav" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-top-0 border-left-0 border-bottom-0">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush info">
                    <li class="list-group-item border-top-0 border-bottom-0 d-flex justify-content-center">
                        <a href="{{ URL::to( '/' ) }}"><img style="max-width: 177px;" onError="this.src='{{ asset('images/general/no-img.png') }}'" src="{{ asset($data['empresa']->images['logo']['i']) }}?t=<?php echo time(); ?>" /></a>
                    </li>
                    <li class="list-group-item text-uppercase border-top-0 mt-4 @if(Request::is('/')) active @endif"><a href="{{ URL::to( '/' ) }}">Inicio</a></li>
                    <li class="list-group-item text-uppercase @if(Request::is('empresa*')) active @endif"><a href="{{ URL::to('empresa') }}">La Empresa</a></li>
                    <li class="list-group-item text-uppercase @if(Request::is('productos*')) active @endif"><a href="{{ URL::to('productos') }}">Productos</a></li>
                    <li class="list-group-item text-uppercase @if(Request::is('documentacion*')) active @endif"><a href="{{ URL::to('documentacion') }}">Documentación</a></li>
                    <li class="list-group-item text-uppercase @if(Request::is('cotizacion*')) active @endif"><a href="{{ URL::to('cotizacion') }}">Cotización Online</a></li>
                    <li class="list-group-item text-uppercase border-bottom-0 @if(Request::is('contacto*')) active @endif"><a href="{{ URL::to('contacto') }}">Contacto</a></li>
                    
                    <li class="list-group-item text-uppercase d-flex mt-4 border-top-0">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <div class="" style="margin-top: -6px;">
                            <p class="mb-0"><a href="{{ $data[ 'empresa' ]->domicile[ 'link' ] }}" target="blank">{{ $data[ 'empresa' ]->domicile["calle"] }} {{ $data[ 'empresa' ]->domicile["altura"] }} @if(!empty($data[ 'empresa' ]->domicile["cp"])) ({{ $data[ 'empresa' ]->domicile["cp"] }})@endif<br>{{ $data[ 'empresa' ]->domicile["provincia"] }}@if(!empty($data[ 'empresa' ]->domicile["localidad"])) - {{ $data[ 'empresa' ]->domicile["localidad"] }}@endif | {{ $data[ 'empresa' ]->domicile["pais"] }}</a></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="w-100 font-lato">
    <nav class="navbar navbar-light p-0 bg-white">
        <div style="background-image: url({{ asset($data['empresa']['images']['header']['i']) }}); background-position: center right; min-height: 110px; width: 100%; background-repeat: no-repeat; background-size: 100% 100%">
            <div class="container">
                <div class="position-relative w-100 d-flex justify-content-between align-items-center" style="height: 110px;">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img onError="this.src='{{ asset('images/general/no-img.png') }}'" src="{{ asset($data['empresa']['images']['logo']['i']) }}?t=<?php echo time(); ?>" />
                    </a>
                    <img src="{{ asset($data['empresa']['images']['icon']['i']) }}" alt="" class="ocsa">
                    <button class="navbar-toggler rounded-0 bg-white show-tablet" type="button" data-toggle="modal" data-target="#menuNav" style="right:0;">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row w-100 mx-0 links">
            <a href="{{ URL::to( '/' ) }}" class="col-12 col-md text-center py-2 text-uppercase @if(Request::is('/')) active @endif">inicio</a>
            <a href="{{ URL::to( 'empresa' ) }}" class="col-12 col-md text-center py-2 text-uppercase @if(Request::is('empresa*')) active @endif">la empresa</a>
            <a href="{{ URL::to( 'productos' ) }}" class="col-12 col-md text-center py-2 text-uppercase @if(Request::is('producto*')) active @endif">productos</a>
            <a href="{{ URL::to( 'documentacion' ) }}" class="col-12 col-md text-center py-2 text-uppercase @if(Request::is('documentacion*')) active @endif">documentación</a>
            <a href="{{ URL::to( 'contacto' ) }}" class="col-12 col-md text-center py-2 text-uppercase @if(Request::is('contacto*')) active @endif">contacto</a>
        </div>
    </nav>
</header>