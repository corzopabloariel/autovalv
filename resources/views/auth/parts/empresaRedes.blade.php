<section class="mt-3">
    <div class="container-fluid">
        <button id="btnADD" onclick="add(this)" class="btn position-fixed rounded-circle btn-primary text-uppercase" type="button"><i class="fas fa-plus"></i></button>
        <div style="display: none;" id="wrapper-form" class="mt-2">
            <div class="card">
                <div class="card-body">
                    <button onclick="remove(this)" type="button" class="close position-absolute" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
</div>
@push('scripts')
<script>
    window.pyrus = new Pyrus( "redes" );
    window.elementos = @json( $data[ "contenido" ] );

    formSubmit = function( t ) {
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
    add = function(t, id = 0, data = null) {
        let btn = $(t);
        if(btn.is(":disabled"))
            btn.removeAttr("disabled");
        else
            btn.attr("disabled",true);
        $("#wrapper-form").toggle(800,"swing");
        $("#wrapper-tabla").toggle("fast");

        if( window.pyrus.objeto.PADRE !== undefined ) {
            if( id != 0 ) {
                action = `{{ url('/adm/${window.pyrus.objeto.PADRE}/${window.pyrus.name}/update/${id}') }}`;
                method = "PUT";
            } else {
                action = `{{ url('/adm/${window.pyrus.objeto.PADRE}/${window.pyrus.name}') }}`;
                method = "POST";
            }
        } else {
            if( id != 0 ) {
                action = `{{ url('/adm/${window.pyrus.name}/update/${id}') }}`;
                method = "PUT";
            } else {
                action = `{{ url('/adm/${window.pyrus.name}') }}`;
                method = "POST";
            }
        }
        window.pyrus.show( null , `{{ asset('/') }}` , data );
        
        elmnt = document.getElementById("form");
        elmnt.scrollIntoView();
        $("#form").attr( "action" , action );
        $("#form").attr( "method" , method );
    };
    /** ------------------------------------- */
    remove = function(t) {
        add($("#btnADD"));
        window.pyrus.clean( null );
    };
    /** ------------------------------------- */
    erase = function(t, id) {
        window.pyrus.delete( t , { title : "ATENCIÓN" , body : "¿Eliminar registro?" } , `{{ url('/adm/${window.pyrus.objeto.PADRE}/${window.pyrus.name}/delete') }}` , id );
    };
    /** ------------------------------------- */
    edit = function(t, id) {
        add( $("#btnADD") , parseInt( id ), window.elementos[id] );
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
    init = function( callbackOK ) {
        console.log("CONSTRUYENDO FORMULARIO Y TABLA");
        /** */
        $("#form .container-form").html(window.pyrus.formulario());
        $("#wrapper-tabla > div").html(window.pyrus.table([ {NAME:"ACCIONES", COLUMN: "acciones", CLASS: "text-center", WIDTH:"150px"} ]));
        $(`#${window.pyrus.name}_section`).val( window.section );

        window.pyrus.elements( $( "#tabla" ) , `{{ asset('/') }}` , window.elementos , [ "e" , "d" ] );

        callbackOK.call(this,null);
    }
    /** */
    init( function() {});
</script>
@endpush