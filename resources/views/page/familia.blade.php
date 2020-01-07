<div class="wrapper-productos bg-white font-lato wrapper-">
    <div class="container">
        <div class="row SinEspacio hidden-mobile">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        productos
                    </div>
                </div>
            </div>
            @include( 'layouts.general.dato' )
        </div>
        <div class="row py-5 mt-0 wrapper- SinEspacio">
            <div class="col-12 col-md-3 d-none d-lg-block">
                <div class="sidebar dont-collapse-sm" id="accordionMenu">
                    <ul class="list-group list-group-flush menu-lateral">
                    @foreach( $data[ "familias" ] AS $m )
                    <li class="list-group-item p-0" id="heading_{{ $m->id }}">
                        <div class="d-flex p-3 align-items-center justify-content-between collapsed" data-toggle="collapse" data-target="#collapse_{{ $m->id }}" @if( $data[ 'familia' ]->id == $m->id ) aria-expanded="true" @else aria-expanded="false" @endif>
                            @php
                            $productos = $m->productos;
                            @endphp
                            <a href="{{ URL::to( 'productos/' . str_slug( strip_tags( $m->title ) ) . '/' . $m->id ) }}">
                                {!! $m->title !!}
                            </a>
                            @if( count( $productos ) > 0 )
                            <i class="fas fa-angle-right"></i>
                            @endif
                        </div>
                        @if( count( $productos ) > 0 )
                            <ul class="list-group collapse @if( $data[ 'familia' ]->id == $m->id ) show @endif" id="collapse_{{ $m->id }}"  aria-labelledby="heading_{{ $m->id }}" data-parent="#accordionMenu">
                            @foreach ($productos AS $f )
                            <li class="list-group-item p-0">
                                <a href="{{ URL::to( 'productos/' . str_slug( strip_tags( $m->title ) ) . '/' . str_slug( strip_tags( $f->title ) ) . '/' . $f->id ) }}" class="p-3 d-block">
                                    <i class="fas fa-arrow-right mr-2"></i>{!! $f->title !!}
                                </a>
                            </li>
                            @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="row normal mt-n4">
                    @forelse( $data[ "productos" ] AS $p )
                        @php
                            $images = $p->images;
                            $img = "";
                            if( count( $images ) > 0)
                                $img = $images[ 0 ]->image[ 'i' ];
                        @endphp
                        <div class="col-6 col-xs-6 col-md-4 col-lg-4 mt-4 producto wrapper-link">
                            <a href="{{ URL::to( 'productos/' . str_slug( strip_tags( $data['familia']->title ) ) . '/' . str_slug( strip_tags( $p->title ) ) . '/' . $p->id ) }}">
                                <div class="card">
                                    <img src="{{ asset( $img ) }}" alt="" class="card-img-top border-bottom-0">
                                    <div class="card-body">
                                        {!! $p->title !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <h3 class="py-5">Sin resultados</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>