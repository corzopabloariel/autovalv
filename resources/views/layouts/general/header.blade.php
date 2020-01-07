<div id="menuNav" class="modal fade menuNav" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-top-0 border-left-0 border-bottom-0">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body position-relative">
                <ul class="list-group list-group-flush info position-relative" id="accordionMenuProducto">
                    <li class="list-group-item bg-transparent border-top-0 border-bottom-0 d-flex justify-content-center">
                        <a href="{{ URL::to( '/' ) }}"><img style="max-width: 263px; width: 100%" onError="this.src='{{ asset('images/general/no-img.png') }}'" src="{{ asset($data['empresa']->images['logo']['i']) }}?t=<?php echo time(); ?>" /></a>
                    </li>
                    <li class="list-group-item bg-transparent text-uppercase border-top-0 mt-4 @if(Request::is('/')) active @endif"><a href="{{ URL::to( '/' ) }}">Inicio</a></li>
                    <li class="list-group-item bg-transparent text-uppercase @if(Request::is('empresa*')) active @endif"><a href="{{ URL::to('empresa') }}">La Empresa</a></li>
                    <li class="list-group-item bg-transparentc p-0 text-uppercase @if(Request::is('productos*')) active @endif" id="heading_productos">
                        <div class="d-flex align-items-center justify-content-between collapsed" data-toggle="collapse" data-target="#collapse_productos" @if(Request::is('productos*')) aria-expanded="true" @else aria-expanded="false" @endif style="padding: 0.75rem 1.25rem">
                            <a href="{{ URL::to('productos') }}">Productos</a>
                        </div>
                        <ul class="list-group list-group-flush menu-lateral pl-2 collapse @if(Request::is('productos*')) show @endif" id="collapse_productos" aria-labelledby="heading_productos" data-parent="#accordionMenuProducto">
                            @foreach( $data[ "familias" ] AS $m )
                            <li class="list-group-item bg-transparent p-0" id="heading_{{ $m->id }}">
                                @if( isset( $data[ 'producto' ] ) )
                                <div class="d-flex align-items-center justify-content-between collapsed" data-toggle="collapse" data-target="#collapse_{{ $m->id }}" @if( $data[ 'producto' ]->familia->id == $m->id ) aria-expanded="true" @else aria-expanded="false" @endif style="padding: 0.75rem 1.25rem">
                                @else
                                <div class="d-flex align-items-center justify-content-between collapsed" data-toggle="collapse" data-target="#collapse_{{ $m->id }}" aria-expanded="false" style="padding: 0.75rem 1.25rem">
                                @endif
                                    @php
                                    $productos = $m->productos;
                                    @endphp
                                    <a class="bg-transparent pl-2" href="{{ URL::to( 'productos/' . str_slug( strip_tags( $m->title ) ) . '/' . $m->id ) }}">
                                        {!! $m->title !!}
                                    </a>
                                    @if( count( $productos ) > 0 )
                                    <i class="fas fa-angle-right"></i>
                                    @endif
                                </div>
                                @if( count( $productos ) > 0 )
                                    @if( isset( $data[ 'producto' ]->familia->id ) )
                                    <ul class="list-group collapse @if( $data[ 'producto' ]->familia->id == $m->id ) show @endif" id="collapse_{{ $m->id }}" aria-labelledby="heading_{{ $m->id }}" data-parent="#accordionMenu">
                                    @else
                                    <ul class="list-group collapse" id="collapse_{{ $m->id }}" aria-labelledby="heading_{{ $m->id }}" data-parent="#accordionMenu">
                                    @endif
                                    @foreach ($productos AS $f )
                                    <li class="list-group-item bg-transparent p-0">
                                        <a href="{{ URL::to( 'productos/' . str_slug( strip_tags( $m->title ) ) . '/' . str_slug( $f->title ) . '/' . $f->id ) }}" class="p-3 d-block">
                                            <i class="fas fa-arrow-right mr-2"></i>{!! $f->title !!}
                                        </a>
                                    </li>
                                    @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="list-group-item bg-transparent text-uppercase d-none d-lg-block @if(Request::is('documentacion*')) active @endif"><a href="{{ URL::to('documentacion') }}">Documentación</a></li>
                    <li class="list-group-item bg-transparent text-uppercase border-bottom-0 @if(Request::is('contacto*')) active @endif"><a href="{{ URL::to('contacto') }}">Contacto</a></li>
                    <img src="{{ asset($data['empresa']['images']['icon']['i']) }}" alt="" style="opacity: .15; top: calc( 50% - 75px ); z-index: 0; left: calc( 50% - 119px ); width: 238px" class="ocsa mt-4 d-block position-absolute isDisabled">
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
                    <img src="{{ asset($data['empresa']['images']['icon']['i']) }}" alt="" class="ocsa d-none d-lg-block">
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