<div id="wrapper-form" class="mt-2">
    <div class="card mb-2">
        <div class="card-body">
            <div class="wrapper-empresa bg-white font-lato">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-justify contenido">
                            {!! $data[ "elementos" ]->content[ "text1" ] !!}
                            <div class="frase1 my-4 text-center font-roboto">
                                {!! $data[ "elementos" ]->content[ "phrase1" ] !!}
                            </div>
                            {!! $data[ "elementos" ]->content[ "text2" ] !!}
                            <div class="frase2 text-center mx-auto px-3 my-4">
                                {!! $data[ "elementos" ]->content[ "phrase2" ] !!}
                            </div>
                            <img src="{{ asset( $data[ 'elementos' ]->content[ 'image' ][ 'i' ] ) }}" onerror="this.src='{{ asset(`images/general/no-image-icon.png`) }}'" alt="La empresa" srcset="">
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
                <div class="container-form"></div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.pyrus = new Pyrus("contenido_empresa", null, src);

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        $("#form .container-form").html( window.pyrus.formulario() );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call(this);
    };
    /** */
    init( () => {
        window.pyrus.show( CKEDITOR , url_simple , window.data.elementos.content );
    });
</script>
@endpush