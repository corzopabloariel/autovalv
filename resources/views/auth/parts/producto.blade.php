<section class="mt-3">
    <div class="container-fluid">
        @include( 'layouts.general.form' )
        <div class="card mt-2">
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <input type="search" @isset( $data[ 'buscar' ] ) value="{{ $data[ 'buscar' ] }}" @endisset name="buscar" placeholder="Buscar Familia, Título, Metadatos ..." class="form-control border-left-0 border-right-0 border-top-0">
                </form>
            </div>
        </div>
        <div class="card mt-2" id="wrapper-tabla">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0" id="tabla"></table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                @if( isset( $data[ 'buscar' ] ) )
                    {{ $data[ "elementos" ]->appends( [ "buscar" => $data[ 'buscar' ] ] )->links() }}
                @else
                    {{ $data[ "elementos" ]->links() }}
                @endif
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.pyrus = new Pyrus( "producto" , { familia_id : { DATA: window.data.familias }} , src );
    window.pyrusDetalles = new Pyrus( "producto_detalle" );

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" },
                { DATA: window.pyrusDetalles.objetoSimple, TIPO: "M", COLUMN: "details" , TAG : "details" , KEY : "details" },
            ]
        ));
        for( let x in CKEDITOR.instances )
            formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
        formSave( t , formData );
    };
    imagesFunction = ( t , id ) => {
        window.location = `${url_simple}/adm/productoimages/${id}`;
    };
    removeFile = ( t ) => {
        let url = `${url_simple}/adm/producto/${window.elementData.id}/file`;
        deleteFile( t , url , "¿Seguro de eliminar el Archivo?" );
    };
    /** -------------------------------------
     *      ABRIR FORMULARIO
     ** ------------------------------------- */
    add = ( t , id = 0 , data = null ) => {
        let btn = $(t);
        let action = `${url_simple}/adm/${window.pyrus.name}`;
        let method = "POST";
        window.formAction = "CREATE";
        window.elementData = data;
        if( btn.is(":disabled") )
            btn.prop( "disabled" , false );
        else
            btn.prop( "disabled" , true );
        $( "#wrapper-form" ).toggle( 800 , "swing" );
        $( "#wrapper-tabla" ).toggle( "fast" );
        
        if(id != 0) {
            action = `${url_simple}/adm/${window.pyrus.name}/update/${id}`;
            method = "PUT";
            $( "#form" ).data( "id" , id );
            window.formAction = "UPDATE";
        }
        $( "#wrapper-detalle" ).html( "" );
        if( data !== null )
            data.details.forEach( function( x ) {
                addDetalle( null , x );
            } );
        else {
            Arr = [
                {
                    key : "Conexión" , value : "",
                },
                {
                    key : "Orificio de Pasaje" , value : "",
                },
                {
                    key : "Presión Máxima" , value : "",
                },
                {
                    key : "Temperatura Máxima" , value : "",
                },
                {
                    key : "Cuerpo" , value : "",
                },
                {
                    key : "Accionamiento" , value : "",
                },
                {
                    key : "Aplicación" , value : "",
                }
            ];
            Arr.forEach( function( x ) {
                addDetalle( null , x );
            } );
        }
        window.pyrus.show( CKEDITOR , url_simple , data );
        document.getElementById( "form" ).scrollIntoView();
        $( "#form" ).prop( "action" , action ).prop( "method" , method );
        addfinish( data );
    };
    /** ------------------------------------- */
    addDetalle = ( t, value = null ) => {
        let target = $( `#wrapper-detalle` );
        let html = "";
        if( window[ `details` ] === undefined ) window[ `details` ] = 0;
        window[ `details` ] ++;
        html += '<div class="col-12 mt-2 item">';
            html += '<div class="bg-light p-2 border overflow-hidden position-relative">';
                html += window.pyrusDetalles.formulario( window[ `details` ] , `details` );
                html += `<i style="line-height:14px; cursor: pointer; right: 0; top: 0; padding: 5px;border-radius: 0 0 0 .4em;" onclick="$(this).closest('.item').remove()" class="fas fa-times position-absolute text-white bg-danger"></i>`;
            html += '</div>';
        html += '</div>';
    
        target.append(html);

        window.pyrusDetalles.show( null , url_simple , value , window[ `details` ] , `details` );
    };

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        let form = window.pyrus.formulario();
        let h = '<div class="row justify-content-center">';
            h += '<div class="col-md-6 col-12">';
                h += `<button id="btnDetalle" type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addDetalle( this )">Detalle<i class="fas fa-plus ml-2"></i></button>`;
            h += `</div>`;
        h += `</div>`;
        h += '<div class="row" id="wrapper-detalle"></div>';
        $( "#form .container-form" ).html( form );
        $( "#detallesFORM" ).html( h );
        $( "#wrapper-tabla > div.card-body" ).html(window.pyrus.table([ {NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"} ]));
        
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos.data , [ "e" , "d" ] , [ { icon : '<i class="fas fa-images"></i>' , class: 'btn-dark' , function : 'images' , title: "Imágenes" } ] );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call(this,null);
    }
    /** */
    init( () => {
        
    });
</script>
@endpush