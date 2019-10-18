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
        </div>
    </div>
</section>
@push('scripts')
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>
    window.pyrus = new Pyrus( "producto_images" , null , src );

    /** -------------------------------------
        Agrega o ejecuta algún evento después de la carga inicial
     ** ------------------------------------- */
    addfinish = () => {
        $( `#${window.pyrus.name}_producto_id` ).val( window.data.producto_id );
    };
    /** ------------------------------------- */
    init( function() {
        
    });
</script>
@endpush