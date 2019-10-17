<section class="mt-3">
    <div class="container-fluid">
        <div class="card mb-2">
            <div class="card-body">
                <div class="wrapper-documentacion bg-white font-lato">
                    <div class="container">
                        <div class="row">
                            @foreach( $data[ "elementos" ] AS $d )
                            <div class="col-12 col-md-4 col-lg-3 text-center">
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
            </div>
        </div>
        @include( 'layouts.general.form' )
        @include( 'layouts.general.table' )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus( "documentacion" , null , src );
    
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {} );
</script>
@endpush