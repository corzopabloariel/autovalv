<header class="w-100 font-lato">
    <nav class="navbar navbar-light p-0 bg-white">
        <div style="background-image: url({{ asset($data['empresa']['images']['header']['i']) }}); background-position: center; min-height: 110px; width: 100%;">
            <div class="container">
                <div class="position-relative w-100 d-flex justify-content-between align-items-center" style="height: 110px;">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img style="width: 177px;" onError="this.src='{{ asset('images/general/no-img.png') }}'" src="{{ asset($data['empresa']['images']['logo']['i']) }}?t=<?php echo time(); ?>" />
                    </a>
                    <img src="{{ asset($data['empresa']['images']['icon']['i']) }}" alt="">
                </div>
            </div>
        </div>
        <div class="row w-100 mx-0">
            <a href="{{ URL::to( '/' ) }}" class="col-12 col-md text-center py-3 text-uppercase @if(Request::is('/')) active @endif">inicio</a>
            <a href="{{ URL::to( 'empresa' ) }}" class="col-12 col-md text-center py-3 text-uppercase @if(Request::is('empresa*')) active @endif">la empresa</a>
            <a href="{{ URL::to( 'productos' ) }}" class="col-12 col-md text-center py-3 text-uppercase @if(Request::is('producto*')) active @endif">productos</a>
            <a href="{{ URL::to( 'documentacion' ) }}" class="col-12 col-md text-center py-3 text-uppercase @if(Request::is('documentacion*')) active @endif">documentación</a>
            <a href="{{ URL::to( 'dimensionamiento' ) }}" class="col-12 col-md text-center py-3 text-uppercase @if(Request::is('*dimensionamiento')) active @endif">dimensionamiento</a>
            <a href="{{ URL::to( 'contacto' ) }}" class="col-12 col-md text-center py-3 text-uppercase @if(Request::is('contacto')) active @endif">contacto</a>
        </div>
    </nav>
</header>