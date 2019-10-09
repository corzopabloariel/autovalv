<div id="wrapper-form" class="mt-2">
    <div class="card mb-2">
        <div class="card-body">
            <div class="wrapper-home bg-white font-lato">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            {!! $data[ "contenido" ]->content[ 'text' ] !!}
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
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.contenido = @json( $data[ "contenido" ] );
    window.pyrus = new Pyrus( "terminos" , null , src );
    
    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        /**
         * KEY - DATA
         */
        formData.append("ATRIBUTOS",JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" },
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
    remove_ = ( t , class_ ) => {
        let target =  $( t ).closest( `.${class_}` );
        if( window.imgDelete === undefined )
            window.imgDelete = [];
        if( target.find( ".hidden" ).val() != "" )
            window.imgDelete.push( target.attr( "src" ) );
        
        target.remove();
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        $("#form .container-form").html( window.pyrus.formulario() );
        window.pyrus.editor( CKEDITOR );
        setTimeout(() => {
            callbackOK.call(this);
        }, 50);
    };
    /** */
    init(function() {
        if( window.contenido.content !== null )
            window.pyrus.show( CKEDITOR , `{{ asset('/') }}` , window.contenido.content );
    });
</script>
@endpush