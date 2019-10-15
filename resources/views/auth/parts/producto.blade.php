<section class="mt-3">
    <div class="container-fluid">
        <button id="btnADD" onclick="add(this)" class="btn position-fixed rounded-circle btn-primary text-uppercase" type="button"><i class="fas fa-plus"></i></button>
        <div class="my-4">
            <button class="btn text-center rounded-0 btn-warning">
                <i class="fas fa-pencil-alt" aria-hidden="true"></i> Editar
            </button>
            <button class="btn text-center rounded-0 btn-danger">
                <i class="fas fa-trash-alt" aria-hidden="true"></i> Eliminar
            </button>
        </div>
        <div style="display: none;" id="wrapper-form" class="mt-2">
            <div class="card">
                <div class="card-body">
                    <button onclick="remove(this)" type="button" class="close position-absolute" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button class="btn btn-success px-5 text-uppercase d-block mx-auto mb-4"><i class="fas fa-save ml-3"></i></button>
                        <div class="container-form"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-2" id="wrapper-tabla">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0" id="tabla"></table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                {{ $data[ "producto" ]->links() }}
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.familias = @json( $data[ 'familias' ] );
    window.pyrus = new Pyrus( "producto" , { familia_id : { DATA: window.familias , TIPO: "op" }} , src );
    window.pyrusDetalles = new Pyrus( "producto_detalle" );
    window.elementos = @json($data["producto"]);

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" },
                { DATA: window.pyrusDetalles.objetoSimple, TIPO: "M", COLUMN: "details" , TAG : "details" , KEY : "details" , BUCLE: `${window.pyrusDetalles.name}_details_key` },
            ]
        ));
        for( let x in CKEDITOR.instances )
            formData.set( x , CKEDITOR.instances[ `${x}` ].getData() );
        formSave( t , formData );
    };
    /** ------------------------------------- */
    add = ( t , id = 0 , data = null ) => {
        let btn = $(t);
        if( btn.is( ":disabled" ) )
            btn.prop( "disabled" , false );
        else
            btn.prop( "disabled" , true );
        $( "#wrapper-form" ).toggle( 800 , "swing" );
        $( "#wrapper-tabla" ).toggle( "fast" );

        if( id != 0 ) {
            action = `{{ url('/adm/${window.pyrus.name}/update/${id}') }}`;
            method = "PUT";
        } else {
            action = `{{ url('/adm/${window.pyrus.name}') }}`;
            method = "POST";
        }
        window.pyrus.show( CKEDITOR , `{{ asset('/') }}` , data );
        if( data !== null ) {
            data.details.forEach( function( x ) {
                addDetalle( null , x );
            } );
        }
        elmnt = document.getElementById("form");
        elmnt.scrollIntoView();
        $( "#form" ).prop( "action" , action );
        $( "#form" ).prop( "method" , method );
    };
    /** ------------------------------------- */
    erase = ( t , id ) => {
        window.pyrus.delete( t , { title : "ATENCIÓN" , body : "¿Eliminar registro?" } , `{{ url('/adm/${window.pyrus.name}/delete') }}` , id );
    };
    /** ------------------------------------- */
    remove = (t) => {
        alertify.confirm( "ATENCIÓN" , "¿Cerrar sin guardar registro?",
            function() {
                window.pyrus.clean( CKEDITOR );
                add( $( "#btnADD" ) );
            },
            function() {}
        ).set( 'labels' , { ok : 'Confirmar' , cancel : 'Cancelar' } );
    };
    /** ------------------------------------- */
    edit = ( t , id ) => {
        $(t).prop( "disabled" , true );
        window.pyrus.one( `{{ url('/adm/${window.pyrus.name}/${id}/edit') }}`, function( res ) {
            $( t ).prop( "disabled" , false );
            add( $("#btnADD") , parseInt( id ) , res.data );
        } );
    };
    clone = function( t, id ) {

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
    
    shortcut.add("Alt+Ctrl+N", function () {
        if(!$("#form").is(":visible")) {
            $("#btnADD").click();
        } else {
            remove( null );
        }
    }, {
        "type": "keydown",
        "propagate": true,
        "target": document
    });
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

        window.pyrusDetalles.show( null , `{{ asset('/') }}` , value , window[ `details` ] , `details` );
    };

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        let form = "";

        form += window.pyrus.formulario();

        form += '<div class="row justify-content-center pt-3">';
            form += '<div class="col-md-6 col-12">';
                form += `<button id="btnDetalle" type="button" class="btn btn-block btn-dark text-center text-uppercase" onclick="addDetalle( this )">Detalle<i class="fas fa-plus ml-2"></i></button>`;
            form += `</div>`;
        form += `</div>`;
        form += '<div class="row" id="wrapper-detalle"></div>';
        $( "#form .container-form" ).html( form );
        $( "#wrapper-tabla > div.card-body" ).html(window.pyrus.table([ {NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"} ]));
        
        window.pyrus.elements( $( "#tabla" ) , `{{ asset('/') }}` , window.elementos.data , [ "e" , "d" ] , [ { icon : '<i class="fas fa-images"></i>' , class: 'btn-dark' , function : 'images' } ] );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call(this,null);
    }
    /** */
    init( function() {
        
    });
</script>
@endpush