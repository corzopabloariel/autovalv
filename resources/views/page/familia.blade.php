<div class="wrapper-productos bg-white font-lato" style="padding-top: 15px;">
    <div class="container">
        <div class="row" style="padding-bottom: 15px;">
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
        <div class="row pb-5">
            <div class="col-12 col-md-4">
                <div class="sidebar dont-collapse-sm" id="accordionMenu">
                    <ul class="list-group list-group-flush menu-lateral">
                    @foreach( $data[ "familias" ] AS $m )
                    <li class="list-group-item p-0" id="heading_{{ $m->id }}">
                        <div class="d-flex p-3 align-items-center justify-content-between collapsed" data-toggle="collapse" data-target="#collapse_{{ $m->id }}" aria-expanded="false">
                            @php
                            $productos = $m->productos;
                            @endphp
                            <a href="{{ URL::to( 'productos/' . str_slug( $m->title ) . '/' . $m->id ) }}">
                                {{ $m->title }}
                            </a>
                            @if( count( $productos ) > 0 )
                            <i class="fas fa-angle-right"></i>
                            @endif
                        </div>
                        @if( count( $productos ) > 0 )
                            <ul class="list-group collapse" id="collapse_{{ $m->id }}"  aria-labelledby="heading_{{ $m->id }}" data-parent="#accordionMenu">
                            @foreach ($productos AS $f )
                            <li class="list-group-item p-0">
                                <a href="{{ URL::to( 'productos/' . str_slug( $m->title ) . '/' . str_slug( $f->title ) . '/' . $f->id ) }}" class="p-3 d-block">
                                    <i class="fas fa-arrow-right mr-2"></i>{{ $f->title }}
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
                <div class="row">
                    @foreach( $data[ "productos" ] AS $p )
                        @php
                            $images = $p->images;
                            $img = "";
                            if( count( $images ) > 0)
                                $img = $images[ 0 ]->image[ 'i' ];
                        @endphp
                        <div class="col-12 col-md-6 col-lg-4 producto">
                            <a href="{{ URL::to( 'productos/' . str_slug( $data['familia']->title ) . '/' . str_slug( $p->title ) . '/' . $p->id ) }}">
                                <div class="card">
                                    <img src="{{ asset( $img ) }}" alt="" class="card-img-top border border-bottom-0">
                                    <div class="card-body border">
                                        {{ $p->title }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>