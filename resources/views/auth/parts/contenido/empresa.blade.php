<div id="wrapper-form" class="mt-2">
    <div class="card mb-2">
        <div class="card-body">
            <div class="wrapper-empresa bg-white font-lato">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-justify contenido">
                            {!! $data[ "contenido" ]->content[ "text1" ] !!}
                            <div class="frase1 my-4 text-center font-roboto">
                                {!! $data[ "contenido" ]->content[ "phrase1" ] !!}
                            </div>
                            {!! $data[ "contenido" ]->content[ "text2" ] !!}
                            <div class="frase2 text-center mx-auto px-3 my-4">
                                {!! $data[ "contenido" ]->content[ "phrase2" ] !!}
                            </div>
                            <img src="{{ asset( $data[ 'contenido' ]->content[ 'image' ][ 'i' ] ) }}" onerror="this.src='{{ asset(`images/general/no-image-icon.png`) }}'" alt="La empresa" srcset="">
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
    window.contenido = @json($data["contenido"]);

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append("ATRIBUTOS",JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple , TIPO: "U" , PALABRA:"historia", DATAC: window.pyrus.especificacion }
            ]
        ));

        for( let x in CKEDITOR.instances )
            formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
        formSave( t , formData );
    };
    shortcut.add("Alt+Ctrl+S", function () {
        if($("#form").is(":visible")) {
            $("#form").submit();
        }
    }, {
        "type": "keydown",
        "propagate": true,
        "target": document
    });
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        let form = "";
        /** */
        form += window.pyrus.formulario();

        $("#form .container-form").html( form );
        window.pyrus.editor( CKEDITOR );
        setTimeout(() => {
            callbackOK.call(this);
        }, 50);
    }
    /** */
    init(function() {
        window.pyrus.show( CKEDITOR , `{{ asset('/') }}` , window.contenido.content );
    });
</script>
@endpush