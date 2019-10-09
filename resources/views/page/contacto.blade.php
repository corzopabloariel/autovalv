<div class="wrapper-contacto bg-white">
    <div class="container">
        <div class="row py-3">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        contacto
                    </div>
                </div>
            </div>
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="cotizacion text-uppercase position-relative font-roboto d-flex align-items-center w-100">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            cotización <span>online</span>
                        </div>
                        <a class="btn rounded-pill px-3 py-0 font-roboto">ingresar</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="buscador text-uppercase font-roboto position-relative w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        <input type="search" name="buscar" placeholder="Buscar modelo o código de producto..." class="form-control text-white px-0 bg-transparent border-left-0 border-right-0 border-top-0"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $data[ "empresa" ]->domicile[ "mapa" ] !!}
</div>