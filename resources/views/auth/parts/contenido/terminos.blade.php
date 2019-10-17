<div id="wrapper-form" class="mt-2">
    <div class="card">
        <div class="card-body">
            <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="{{ url('/adm/contenido/' . $data['section'] . '/update') }}" method="put" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-success text-uppercase px-5 mx-auto d-flex align-items-center mb-5">contenido<i class="fas fa-pencil-alt ml-2"></i></button>
                <div class="container-form"></div>
                <div class="alert alert-primary mt-3 mb-0" role="alert">
                    Términos y condiciones de ejemplo sacado de <a href="https://terminosycondicionesdeusoejemplo.com/" target="_blank" rel="noopener noreferrer" class="text-dark">https://terminosycondicionesdeusoejemplo.com/ <i class="fas fa-external-link-alt ml-1"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    window.pyrus = new Pyrus("terminos", null, src);
    /** -------------------------------------
        Agrega o ejecuta algún evento después de la carga inicial
     ** ------------------------------------- */
    addfinish = () => {
        $( `#${window.pyrus.name}_section`).val( window.data.section );
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init = ( callbackOK ) => {
        console.log("CONSTRUYENDO FORMULARIO Y TABLA");
        /** */
        $("#form .container-form").html( window.pyrus.formulario() );
        window.pyrus.editor( CKEDITOR );
        
        callbackOK.call(this);
    };
    /** */
    init( () => {
        window.pyrus.show( CKEDITOR , null , window.data.elementos.content );
    });
</script>
@endpush