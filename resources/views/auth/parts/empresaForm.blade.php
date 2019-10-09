<section class="mt-3">
    <div class="container-fluid">
        <div style="display: block;" id="wrapper-form" class="">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Ingrese a qué mail desea redirigir los formularios que contiene el sitio.
                    </div>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" class="pt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="btn d-block px-5 mx-auto mb-2 btn-success text-uppercase text-center">cambios<i class="far fa-save ml-2"></i></button>
                        <div class="container-form mt-5">
                            <div class="row mt-3">
                                <div class="col-12 col-md-5 d-flex align-items-center">
                                    <label for="" class="m-0">
                                        Contacto - <a href="{{ URL::to('contacto') }}" target="blank" class="text-primary">ir al Formulario</a>
                                    </label>
                                </div>
                                <div class="col-12 col-md-7">
                                    <input type="email" required name="contacto" placeholder="Ingrese mail" @if(isset($data['contenido']['form']['contacto'])) value="{{ $data['contenido']['form']['contacto'] }}" @endif class="form-control border-top-0 border-left-0 border-right-0 rounded-0">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-5 d-flex align-items-center">
                                    <label for="" class="m-0">
                                        Cotización - <a href="{{ URL::to('cotizacion') }}" target="blank" class="text-primary">ir al Formulario</a>
                                    </label>
                                </div>
                                <div class="col-12 col-md-7">
                                    <input type="email" required name="cotizacion" placeholder="Ingrese mail" @if(isset($data['contenido']['form']['cotizacion'])) value="{{ $data['contenido']['form']['cotizacion'] }}" @endif class="form-control border-top-0 border-left-0 border-right-0 rounded-0">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    formSubmit = function(t) {
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        formSave( t , formData );
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
</script>
@endpush