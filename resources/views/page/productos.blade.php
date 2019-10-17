<div class="wrapper-productos wrapper- bg-white font-lato">
    <div class="container">
        <div class="row normal">
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
        <div class="row pb-5 mt-0 normal">
            @foreach( $data[ "productos" ] AS $p )
            <div class="col-12 col-md-3 mt-4 producto wrapper-link">
                <a href="{{ URL::to( 'productos/' . str_slug( $p->title ) . '/' . $p->id ) }}">
                    <div class="card">
                        <img src="{{ asset( $p->image[ 'i' ] ) }}" class="card-img-top" alt="{{ $p->id }}">
                        <div class="card-body">
                            <p class="card-text">{{ $p->title }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>