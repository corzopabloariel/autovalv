<div class="col-12 col-md d-flex align-items-stretch px-0" style="height: 66px; overflow: hidden">
    <div class="cotizacion titulo text-uppercase position-relative font-roboto d-flex align-items-center w-100">
        <div class="position-absolute w-100 h-100"></div>
        <div class="w-100 p-4 d-flex justify-content-between align-items-start">
            <div class="d-flex align-items-baseline">
                cotización <span>online</span>
            </div>
            <a href="{{ URL::to( 'cotizacion' ) }}" class="btn rounded-pill px-3 py-0 font-roboto d-flex align-items-center">ingresar</a>
        </div>
    </div>
</div>
<div class="col-12 col-md d-flex align-items-stretch" style="height: 66px; overflow: hidden">
    <div class="buscador text-uppercase font-roboto position-relative d-flex align-items-center w-100">
        <div class="position-absolute w-100 h-100"></div>
        <div class="w-100 p-4">
            <form action="{{ route( 'buscar' ) }}" method="get">
                <input type="search" name="buscar" placeholder="Buscar modelo o código de producto..." class="form-control text-white px-0 bg-transparent border-left-0 border-right-0 border-top-0"/>
            </form>
        </div>
    </div>
</div>