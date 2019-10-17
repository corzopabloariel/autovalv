<section class="mt-3">
    <div class="container-fluid">
        @include( 'layouts.general.form' )
        <div class="card mt-2" id="wrapper-tabla">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0" id="tabla"></table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                {{ $data[ "elementos" ]->links() }}
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
        window.location = `{{ URL::to( 'adm/productoimages/${id}' ) }}`;
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

        form += '<div class="row justify-content-center pt-3">';
            form += '<div class="col-md-6 col-12">';
                form += `<button id="btnDetalle" type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addDetalle( this )">Detalle<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += '<div class="row" id="wrapper-detalle"></div>';
        $( "#form .container-form" ).html( form );
        $( "#wrapper-tabla > div.card-body" ).html(window.pyrus.table([ {NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"} ]));
        
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos.data , [ "e" , "d" ] , [ { icon : '<i class="fas fa-images"></i>' , class: 'btn-dark' , function : 'images' } ] );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call(this,null);
    }
    /** */
    init( () => {
        
    });
</script>
@endpush