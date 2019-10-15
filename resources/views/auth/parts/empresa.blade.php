<section class="mt-3">
    <div class="container-fluid">
        <div style="display: block;" id="wrapper-form" class="">
            <div class="card">
                <div class="card-body">
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="{{ url('/adm/empresa/update') }}" method="put" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="btn d-block px-5 mx-auto mb-2 btn-success text-uppercase text-center">cambios<i class="far fa-save ml-2"></i></button>
                        <div class="container-form">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.pyrusImage = new Pyrus( "empresa_images" , null , src );

    window.pyrusImageFooter = new Pyrus( "empresa_images_footer" , null , src );

    window.pyrusDomicilio = new Pyrus( "empresa_domicilio" );
    window.pyrusTelefono = new Pyrus( "empresa_telefono" );
    window.pyrusEmail = new Pyrus( "empresa_email" );
    window.pyrusHorario = new Pyrus( "empresa_horario" );

    window.pyrusFooter = new Pyrus( "empresa_footer" );
    
    window.datos = @JSON( $data[ "contenido" ] )
    
    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrusImage.objetoSimple, TIPO: "U", COLUMN: "images" },

                { DATA: window.pyrusDomicilio.objetoSimple, TIPO: "U", COLUMN: "domicile" },
                { DATA: window.pyrusFooter.objetoSimple, TIPO: "U", COLUMN: "footer" },
                { DATA: window.pyrusHorario.objetoSimple, TIPO: "U", COLUMN: "schedule" },
                { DATA: window.pyrusTelefono.objetoSimple, TIPO: "M", COLUMN: "phone" , TAG : "phone" , KEY : "phone" , BUCLE: `${window.pyrusTelefono.name}_phone_tipo` },
                { DATA: window.pyrusEmail.objetoSimple, TIPO: "A", COLUMN: "email" }
            ]
        ));
        for( let x in CKEDITOR.instances )
            formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
        formSave( t , formData );
    };
    removeElement = ( t ) => {
        let img = $( t ).closest( ".element" ).find( ".hidden-image" ).val();
        if( img == "" ) {
            $( t ).closest( ".element" ).remove();
            return null;
        }
        if( window.imageRemove === undefined )
            window.imageRemove = [];
        window.imageRemove.push( img );
    };
    /** ------------------------------------- */
    addTelefono = ( t, value = null ) => {
        let target = $( `#wrapper-phone` );
        let html = "";
        if( window[ `phone` ] === undefined ) window[ `phone` ] = 0;
        window[ `phone` ] ++;
        html += '<div class="col-12 mt-2 tel">';
            html += '<div class="bg-light p-2 border overflow-hidden position-relative">';
                html += window.pyrusTelefono.formulario( window[ `phone` ] , `phone` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="$(this).closest('.tel').remove()" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
    
        target.append(html);

        window.pyrusTelefono.show( null , `{{ asset('/') }}` , value , window[ `phone` ] , `phone` );
    };
    
    addEmail = ( t, value = null ) => {
        let target = $(`#wrapper-email`);
        let html = "";
        if( window[ `email` ] === undefined ) window[ `email` ] = 0;
        window[ `email` ] ++;

        html += '<div class="col-12 mt-2 email">';
            html += '<div class="bg-light p-2 border position-relative overflow-hidden">';
                html += window.pyrusEmail.formulario( window[ `email` ] , `email` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="$(this).closest('.email').remove()" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';

        target.append(html);
        window.pyrusEmail.show( null , `{{ asset('/') }}` , { email : value } , window[ `email` ] , `email` );
    }
    /** ------------------------------------- */
    init = (callbackOK) => {
        console.log("CONSTRUYENDO FORMULARIO Y TABLA");
        form = "";
        /** */
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Logotipos & Favicon</legend>`;
            form += window.pyrusImage.formulario();
        form += `</fieldset>`;

        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Domicilio</legend>`;
            form += window.pyrusDomicilio.formulario();
        form += `</fieldset>`;
        
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Horarios</legend>`;
            form += window.pyrusHorario.formulario();
        form += `</fieldset>`;
        
        form += '<div class="row justify-content-center pt-3">';
            form += '<div class="col-md-6 col-12">';
                form += `<button id="btnTelefono" type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addTelefono( this )">Teléfono<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
            form += '<div class="col-md-6 col-12">';
                form += `<button id="btnEmail" type="button" class="btn btn-block btn-info text-center text-uppercase" onclick="addEmail( this )">Email<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += '<div class="row justify-content-center">';
            form += '<div class="col-md-6 col-12">';
                form += '<div class="row" id="wrapper-phone"></div>';
            form += `</div>`;
            form += '<div class="col-md-6 col-12">';
                form += '<div class="row mt-0" id="wrapper-email"></div>';
            form += `</div>`;
        form += `</div>`;

        form += `<fieldset class="border mt-4 p-3">`;
            form += `<legend class="border-bottom">Frase FOOTER</legend>`;
            form += window.pyrusFooter.formulario();
        form += `</fieldset>`;

        $("#form .container-form").html( form );

        window.pyrusFooter.editor( CKEDITOR );
        callbackOK.call( this );
    }
    shortcut.add( "Alt+Ctrl+S" , function () {
        if( $( "#form" ).is (":visible" ) ) {
            $( "#form" ).submit();
        }
    }, {
        "type": "keydown",
        "propagate": true,
        "target": document
    });
    /** */
    init( function() {
        date = new Date();
        logo = logoFooter = favicon = header = icon = "";
        if( Object.keys( window.datos.images ).length > 0 ) {
            if(window.datos.images.logo !== undefined)
                logo = `{{ asset('${window.datos.images.logo.i}') }}?t=${date.getTime()}`;
            if(window.datos.images.logoFooter !== undefined)
                logoFooter = `{{ asset('${window.datos.images.logoFooter.i}') }}?t=${date.getTime()}`;
            if(window.datos.images.favicon !== null)
                favicon = `{{ asset('${window.datos.images.favicon.i}') }}?t=${date.getTime()}`;
            if(window.datos.images.icon !== null)
                icon = `{{ asset('${window.datos.images.icon.i}') }}?t=${date.getTime()}`;
            if(window.datos.images.header !== null)
                header = `{{ asset('${window.datos.images.header.i}') }}?t=${date.getTime()}`;
        }
        $( `#src-${window.pyrusImage.name}_logo` ).attr( "src" , logo );
        $( `#src-${window.pyrusImage.name}_logoFooter` ).attr( "src" , logoFooter );
        $( `#src-${window.pyrusImage.name}_favicon` ).attr( "src" , favicon );
        $( `#src-${window.pyrusImage.name}_icon` ).attr( "src" , icon );
        $( `#src-${window.pyrusImage.name}_header` ).attr( "src" , header );

        window.pyrusHorario.show( null , `{{ asset('/') }}` , window.datos.schedule );
        window.pyrusDomicilio.show( null , `{{ asset('/') }}` , window.datos.domicile );
        window.pyrusFooter.show( CKEDITOR , `{{ asset('/') }}` , window.datos.footer );
        //window.pyrusHorario.show( null , `{{ asset('/') }}` , window.datos.horarios );
        window.datos.email.forEach( function( e ) {
            addEmail( $( "#btnEmail" ) , e );
        });
        
        if( window.datos.phone !== null ) {
            window.datos.phone.forEach( function( t ) {
                addTelefono( $( "#btnTelefono" ) , t );
            });
        }
    });
</script>
@endpush