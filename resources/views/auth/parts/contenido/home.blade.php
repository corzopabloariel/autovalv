<div id="wrapper-form" class="mt-2">
    <div class="card mb-2">
        <div class="card-body">
            <div class="wrapper-home bg-white font-lato">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group list-group-horizontal d-flex justify-content-center icon border-0">
                                @foreach( $data[ "contenido" ]->content[ 'icon' ] AS $c )
                                    <li class="list-group-item d-flex align-items-center flex-column px-5 border-0">
                                        @isset( $c[ 'icon' ][ 'i' ] )
                                        <img src="{{ asset( $c[ 'icon' ][ 'i' ] ) }}" alt="icon" class="mb-2" srcset="">
                                        @endisset
                                        <p class="mx-auto text-center">{!! $c[ 'text' ] !!}</p>
                                    </li>
                                @endforeach
                            </ul>
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
    window.pyrus = new Pyrus( "contenido_home" , null , src );
    
    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        /**
         * KEY - DATA
         */
        formData.append("ATRIBUTOS",JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "M", KEY: "icon" , COLUMN: "icon" , TAG : "icon" , BUCLE : `${window.pyrus.name}_icon_lim` },
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
    addicon = ( t , value = null ) => {
        let target = $(`#wrapper-icon`);
        let html = "";
        if( window.icon === undefined ) window.icon = 0;
        window.icon ++;

        html += '<div class="col-12 icon mb-2">';
            html += '<input type="hidden" class="hidden" />';
            html += '<div class="p-2 position-relative overflow-hidden bg-light border">';
                html += window.pyrus.formulario( window.icon , "icon" );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="remove_( this , 'icon' )" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append( html );
        if( value !== null )
            target.find( ".icon:last-child() .hidden" ).val( "1" );
        window.pyrus.show( null , `{{ asset('/') }}` , value , window.icon , "icon" );
        window.pyrus.editor( CKEDITOR , window.icon , "icon" );
    };
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        let form = "";
        /** */
        form += `<h1 class="text-uppercase">Íconos + Textos</h1>`;
        form += '<div class="row justify-content-center mt-3">';
            form += '<div class="col-md col-12"><div class="row mb-n2" id="wrapper-icon"></div></div>';
            form += '<div class="col-md-2 col-12 d-flex align-items-stretch">';
                form += '<button id="btnicon" type="button" class="d-flex align-items-center justify-content-center btn btn-block btn-dark text-center text-uppercase" onclick="addicon(this)"><i class="fas fa-plus ml-2"></i></button>';
            form += `</div>`;
        form += `</div>`;

        $( "#form .container-form" ).html( form );
        
        callbackOK.call( this );
    };
    /** */
    init(function() {
        if( window.contenido.content !== null ) {
            if( window.contenido.content.icon !== null )
                window.contenido.content.icon.forEach( function( x ) {
                    addicon( null , x );
                });
        }
    });
</script>
@endpush