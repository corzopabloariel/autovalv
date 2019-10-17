<section class="mt-3">
    <div class="container-fluid">
        <div style="display: none;" id="wrapper-form" class="">
            <div class="card">
                <div class="card-body">
                    <button onclick="remove(this)" type="button" class="close position-absolute" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="" method="put" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button class="btn btn-success px-5 text-uppercase d-block mx-auto mb-4"><i class="fas fa-save ml-3"></i></button>
                        <div class="container-form"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mt-2" id="wrapper-tabla">
            <div class="card-body">
                <table class="table mb-0" id="tabla"></table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.pyrus = new Pyrus( "metadatos" );

    /** -------------------------------------
        Agrega o ejecuta algún evento después de la carga inicial
     ** ------------------------------------- */
    addfinish = () => {
        $( `#${window.pyrus.name}_section`).val( window.data.section );
    };
    /** ------------------------------------- */
    edit = ( t , seccion ) => {
        //$(t).attr("disabled",true);
        window.data.section = seccion;
        add( $("#btnADD") , seccion , window.data.elementos.metadata[ seccion ] );
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init = ( callbackOK ) => {
        /** */
        $( "#form .container-form" ).html( window.pyrus.formulario() );
        $( "#wrapper-tabla > div.card-body" ).html( window.pyrus.table( [ { NAME:"ACCIONES" , COLUMN: "acciones" , CLASS: "text-center" , WIDTH: "150px" } ] ) );
        
        window.pyrus.editor( CKEDITOR );
        window.pyrus.elements( $( "#tabla" ) , url_simple , window.data.elementos.metadata , [ "e" , "d" ] );
        callbackOK.call( this , null );
    };
    /** */
    init( () => {});
</script>
@endpush