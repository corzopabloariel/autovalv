<div class="wrapper-documentacion bg-white font-lato wrapper-">
    <div class="container">
        <div class="row SinEspacio">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        documentación
                    </div>
                </div>
            </div>
            @include( 'layouts.general.dato' )
        </div>

        <div class="row SinEspacio font-lato pb-5">
            @foreach( $data[ "documentacion" ] AS $d )
            <div class="col-12 col-md-4 col-lg-3 mt-3 text-center">
                <div class="card mx-auto border-0">
                    <img src="{{ asset( $d->cover[ 'i' ]) }}" alt="" class="card-img-top border border-bottom-0">
                    <div class="card-body border">
                        {{ $d->title }}
                    </div>
                    @if( file_exists( public_path() . "/" . $d->file[ 'i' ] ) )
                    <div class="card-footer d-flex justify-content-around border-0 bg-transparent">
                        <a href="{{ asset( $d->file[ 'i' ] ) }}" target="blank"><i class="fas fa-eye"></i></a>
                        <a href="{{ asset( $d->file[ 'i' ] ) }}" download><i class="fas fa-download"></i></a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>