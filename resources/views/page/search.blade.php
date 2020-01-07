<div class="wrapper-productos bg-white font-lato wrapper-">
    <div class="container">
        <div class="row SinEspacio hidden-mobile">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        Buscador
                    </div>
                </div>
            </div>
            @include( 'layouts.general.dato' )
        </div>
        <div class="row wrapper- pb-5 mt-0">
            @forelse($data[ "elementos"] as $p )
                @php
                    $images = $p->images;
                    $img = "";
                    if( count( $images ) > 0)
                        $img = $images[ 0 ]->image[ 'i' ];
                @endphp
                <div class="col-12 col-md-4 col-lg-3 mt-4 producto wrapper-link">
                    <a href="{{ URL::to( 'productos/' . str_slug( strip_tags( $p->familia->title ) ) . '/' . str_slug( strip_tags( $p->title ) ) . '/' . $p->id ) }}">
                        <div class="card">
                            <img src="{{ asset( $img ) }}" alt="" class="card-img-top border-bottom-0">
                            <div class="card-body">
                                {!! $p->title !!}
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h3 class="py-5">Sin resultados para <strong>"{{ $data[ "buscar" ] }}"</strong></h3>
                </div>
            @endforelse
        </div>
    </div>
</div>