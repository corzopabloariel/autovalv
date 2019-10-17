<div id="wrapper-form" class="mt-2">
    <div class="card mb-2">
        <div class="card-body">
            <div class="wrapper-home bg-white font-lato">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            {!! $data[ "elementos" ]->content[ 'text' ] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="{{ url('/adm/contenido/' . $data['section'] . '/update') }}" method="put" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn d-block px-5 mx-auto mb-2 btn-success text-uppercase text-center">cambios<i class="far fa-save ml-2"></i></button>
                <div class="container-form mt-3"></div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    window.pyrus = new Pyrus( "terminos" , null , src , { frase : { REMOVE : 1 } } );
    
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {
        if( window.data.elementos.content !== null )
            window.pyrus.show( CKEDITOR , null , window.data.elementos.content );
    });
</script>
@endpush