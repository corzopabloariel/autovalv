<div class="wrapper-productos bg-white font-lato wrapper-">
    <div class="container">
        <div class="row">
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
        <div class="row pb-5 mt-0 wrapper- normal">
            <div class="col-12 col-md-3">
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
            <div class="col-12 col-md producto-final">
                <div class="row normal">
                    <div class="col-12 col-md-4">
                        @php
                        $images = $data[ "producto" ]->images;
                        @endphp
                        <div id="carouselExampleIndicators" class="carousel bg-white slide wrapper-slider" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i = 0 ; $i < count($images) ; $i++)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner">
                                @for($i = 0 ; $i < count($images) ; $i++)
                                <div class="carousel-item @if($i == 0) active @endif">
                                    <img class="d-block w-100" src="{{ asset( $images[$i]['image'][ 'i' ] ) }}" >
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md details">
                        <h3 class="title px-3 py-2 position-relative">
                            {{ $data[ "producto" ]->title }}
                            <img src="{{ asset( $data[ 'empresa' ]->images[ 'industria' ][ 'i' ]) }}" style="width: 70px; right: 20px; top: -20px;" class="position-absolute" alt="Industria">
                        </h3>
                        @foreach( $data[ "producto" ]->details AS $d )
                        <div class="row mb-0 mt-2">
                            <div class="col-12 col-md-4 key">{{ $d[ "key" ] }}</div>
                            <div class="col-12 col-md">{{ $d[ "value" ] }}</div>
                        </div>
                        @endforeach
                        <div class="mt-3">
                            <a href="{{ asset( $data[ 'producto' ]->file[ 'i' ] ) }} }}" class="btn btn-danger btn- rounded-pill px-3" target="blank">FICHA PDF</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 info">
                        <p class="mb-2 title-">Más información</p>
                        {!! $data[ "producto" ]->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>