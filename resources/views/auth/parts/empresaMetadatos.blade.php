<section class="mt-3">
    <div class="container-fluid">
        <div class="d-none">
            <button disabled="true" id="btnADD" onclick="add(this)" class="btn btn-primary text-uppercase" type="button">Agregar<i class="fas fa-plus ml-2"></i></button>
        </div>
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
    window.metadatos = @json( $data[ "contenido" ][ "metadata" ] );

    formSubmit = ( t ) => {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );

        let formData = new FormData( formElement );
        formData.append( "ATRIBUTOS", JSON.stringify(
            [
                { DATA: window.pyrus.objetoSimple, TIPO: "U" }
            ]
        ));
        formSave( t , formData );
    };
    /** ------------------------------------- */
    add = ( t , seccion = "" , data = null ) => {
        let btn = $(t);

        $("#wrapper-form").toggle(800,"swing");

        $("#wrapper-tabla").toggle("fast");

        if(seccion != "") {
            method = "put";
            action = `{{ url('/adm/empresa/${window.pyrus.name}/update/${seccion}') }}`;
        } else {
            method = "post";
            action = `{{ url('/adm/empresa/${window.pyrus.name}/store') }}`;
        }
        $("#form button").text(`${seccion.toUpperCase()}`);
        window.pyrus.show( null , `{{ asset('/') }}` , data );
        $( `#${window.pyrus.name}_section`).val( seccion );
        elmnt = document.getElementById("form");
        elmnt.scrollIntoView();
        $("#form").attr("action",action);
        $("#form").attr("method",method);
    };
    /** ------------------------------------- */
    remove = ( t ) => {
        add($("#btnADD"));
        window.pyrus.clean( null );
    };
    /** ------------------------------------- */
    edit = ( t , seccion ) => {
        //$(t).attr("disabled",true);
        add( $("#btnADD") , seccion , window.metadatos[ seccion ] );
    };
    shortcut.add( "Alt+Ctrl+S" , function () {
        if( $( "#form" ).is( ":visible" ) )
            $( "#form" ).submit();
    }, {
        "type": "keydown",
        "propagate": true,
        "target": document
    });
    /** ------------------------------------- */
    init = ( callbackOK ) => {
        console.log("CONSTRUYENDO FORMULARIO Y TABLA");
        /** */
        $( "#form .container-form" ).html(window.pyrus.formulario());
        $( "#wrapper-tabla > div" ).html(window.pyrus.table([ {NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"} ]));

        window.pyrus.elements( $( "#tabla" ) , `{{ asset('/') }}` , window.metadatos , [ "e" ] );

        callbackOK.call(this,null);
    }
    /** */
    init( function() {});
</script>
@endpush