<section class="mt-3">
    <div class="container-fluid">
        <button id="btnADD" onclick="add( this )" class="btn position-fixed rounded-circle btn-primary text-uppercase" type="button"><i class="fas fa-plus"></i></button>
        
        <div id="carouselExampleIndicators" class="carousel slide wrapper-slider" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0 ; $i < count($data['elementos']) ; $i++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @for($i = 0 ; $i < count($data['elementos']) ; $i++)
                <div class="carousel-item @if($i == 0) active @endif">
                    <img class="d-block w-100" src="{{asset($data['elementos'][$i]->image[ 'i' ])}}" >
                    @if( !empty( $data[ 'elementos' ][ $i ]->content ) )
                    <div class="carousel-caption position-absolute w-100 h-100" style="top: 0; left: 0;">
                        <div class="container position-relative h-100 w-100 d-flex align-items-center justify-content-start">
                            <div class="texto">
                                {!! $data['elementos'][$i]->content !!}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
        @include( 'layouts.general.form' )
        @include( 'layouts.general.table' )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus("slider", null, src);
    
    /** -------------------------------------
        Agrega o ejecuta algún evento después de la carga inicial
     ** ------------------------------------- */
    addfinish = () => {
        $( `#${window.pyrus.name}_section`).val( window.data.section );
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {} );
</script>
@endpush