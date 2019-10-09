<section class="mt-3">
    <div class="container-fluid">
        <div class="card mb-2">
            <div class="card-body">
                <div class="wrapper-documentacion bg-white font-lato">
                    <div class="container">
                        <div class="row">
                            @foreach( $data[ "documentacion" ] AS $d )
                            <div class="col-12 col-md-4 col-lg-3 text-center">
                                <div class="card mx-auto border-0">
                                    <img src="{{ asset( $d->cover[ 'i' ]) }}" alt="" class="card-img-top border border-bottom-0">
                                    <div class="card-body border">
                                        {{ $d->title }}
                                    </div>
                                    @if( file_exists( public_path() . "/" . $d->file[ 'i' ] ) )
                                    <div class="card-footer d-flex justify-content-around border-0 bg-transparent">
                                        <a href="{{ asset( $d->file[ 'i' ] ) }}" target="blank"><i class="fas fa-eye"></i></a>
                                        <a href="{{ asset( $d->file[ 'i' ] ) }}" download><i class="fas fa-download"></i></a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        </div>
    </div>
</section>
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.pyrus = new Pyrus( "documentacion" , null , src );
    window.elementos = @json($data["documentacion"]);

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" },
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

    /** ------------------------------------- */
    init = ( callbackOK ) => {
        $( "#form .container-form" ).html(window.pyrus.formulario());
        $( "#wrapper-tabla > div" ).html(window.pyrus.table([ {NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"} ]));
        
        window.pyrus.elements( $( "#tabla" ) , `{{ asset('/') }}` , window.elementos , [ "e" , "d" ] );
        window.pyrus.editor( CKEDITOR );
        callbackOK.call(this,null);
    }
    /** */
    init( function() {
        
    });
</script>
@endpush