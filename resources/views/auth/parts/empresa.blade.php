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

    window.pyrusTexto = new Pyrus( "empresa_texto" );

    window.pyrusFooter = new Pyrus( "empresa_footer" );
    
    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrusImage.objetoSimple, TIPO: "U", COLUMN: "images" },

                { DATA: window.pyrusDomicilio.objetoSimple, TIPO: "U", COLUMN: "domicile" },
                { DATA: window.pyrusFooter.objetoSimple, TIPO: "U", COLUMN: "footer" },
                { DATA: window.pyrusTexto.objetoSimple, TIPO: "U", COLUMN: "text" },
                { DATA: window.pyrusHorario.objetoSimple, TIPO: "U", COLUMN: "schedule" },
                { DATA: window.pyrusTelefono.objetoSimple, TIPO: "M", COLUMN: "phone" , TAG : "phone" , KEY : "phone" },
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

        window.pyrusTelefono.show( null , url_simple , value , window[ `phone` ] , `phone` );
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
        window.pyrusEmail.show( null , url_simple , { email : value } , window[ `email` ] , `email` );
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
        
        form += `<fieldset class="border p-3">`;
            form += `<legend class="border-bottom">Textos</legend>`;
            form += window.pyrusTexto.formulario();
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
    };
    /** */
    init( function() {
        window.pyrusImage.show( null , url_simple , window.data.elementos.images );
        window.pyrusHorario.show( null , url_simple , window.data.elementos.schedule );
        window.pyrusDomicilio.show( null , url_simple , window.data.elementos.domicile );
        window.pyrusFooter.show( CKEDITOR , url_simple , window.data.elementos.footer );
        window.pyrusTexto.show( null , url_simple , window.data.elementos.text );
        window.data.elementos.email.forEach( function( e ) {
            addEmail( $( "#btnEmail" ) , e );
        });
        
        if( window.data.elementos.phone !== null ) {
            window.data.elementos.phone.forEach( function( t ) {
                addTelefono( $( "#btnTelefono" ) , t );
            });
        }
    });
</script>
@endpush