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
        <div id="carouselExampleIndicators" class="carousel slide wrapper-slider" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0 ; $i < count($data['sliders']) ; $i++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @for($i = 0 ; $i < count($data['sliders']) ; $i++)
                <div class="carousel-item @if($i == 0) active @endif">
                    <img class="d-block w-100" src="{{asset($data['sliders'][$i]['image'][ 'i' ])}}" >
                    @if(!empty($data['sliders'][$i]['content']))
                    <div class="carousel-caption position-absolute w-100 h-100" style="top: 0; left: 0;">
                        <div class="container position-relative h-100 w-100 d-flex align-items-center justify-content-start">
                            <div class="texto">
                                {!! $data['sliders'][$i]['content'] !!}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endfor
            </div>
        </div>
        <div style="display: none;" id="wrapper-form" class="mt-4">
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
        <div class="card mt-4" id="wrapper-tabla">
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    window.pyrus = new Pyrus("slider", null, src);
    window.section = "{{ $data['seccion'] }}";
    window.elementos = @json($data["sliders"]);
    
    /** -------------------------------------
        Agrega o ejecuta algún evento después de la carga inicial
     ** ------------------------------------- */
    addfinish = () => {
        $( `#${window.pyrus.name}_seccion`).val( window.section );
    };
    /** -------------------------------------
     *      INICIO
     ** ------------------------------------- */
    init( () => {} );
</script>
@endpush