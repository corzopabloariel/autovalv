<div class="wrapper-contacto bg-white font-lato wrapper-">
    <div class="container">
        <div class="row normal">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        contacto
                    </div>
                </div>
            </div>
            @include( 'layouts.general.dato' )
        </div>
        <div class="pb-4 wrapper-">
            <form action="" method="post" class="p-4">
                @csrf
                <div class="p-2">
                    <div class="row normal">
                        <div class="col-12 col-md-8">
                            <div class="row normal">
                                <div class="col-12 col-md">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-12 col-md">
                                    <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="row normal mt-4">
                                <div class="col-12 col-md">
                                    <input type="text" name="empresa" class="form-control" placeholder="Empresa">
                                </div>
                                <div class="col-12 col-md">
                                    <select class="form-control" name="tipo" id="">
                                        <option value="" hidden selected>Tipo de Cliente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row normal mt-4">
                                <div class="col-12 col-md">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-12 col-md">
                                    <input type="phone" name="telefono" class="form-control" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="row normal mt-4">
                                <div class="col-12 col-md">
                                    <textarea name="mensaje" id="" class="form-control" placeholder="Mensaje" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row normal mt-4">
                                <div class="col-12 terminos">
                                    <div class="form-check">
                                        <input onchange="terminosShow( this , 'btn' );" required class="form-check-input" type="checkbox" name="terminos" value="1" id="terminos">
                                        <label class="form-check-label" for="terminos">
                                            Acepto los términos y condiciones de privacidad
                                        </label>
                                    </div>
                                    <div class="mt-2">{{ $data[ "terminos" ]->content[ "frase" ] }}</div>
                                </div>
                                <div class="col-12 d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-danger font-lato text-uppercase px-5 text-white rounded-pill">enviar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md">
                            <ul class="list-unstyled info mb-0 pl-4">
                                <li class="d-flex">
                                    <i class="icono fas fa-info-circle"></i>
                                    <div class="" style="width: calc(100% - 37px)" >
                                        <h4>Atención al Público</h4>
                                        {{ $data[ 'empresa' ]->schedule[ 'publico' ] }}
                                        <h4 class="mt-2">Expedición de Mercadería</h4>
                                        {{ $data[ 'empresa' ]->schedule[ 'mercaderia' ] }}
                                    </div>
                                </li>
                                <li class="d-flex mt-4">
                                    <i class="icono fas fa-map-marker-alt"></i>
                                    <div class="" style="width: calc(100% - 37px)" >
                                        <p class="mb-0"><a href="{{ $data[ 'empresa' ]->domicile[ 'link' ] }}" target="blank">{{ $data[ 'empresa' ]->domicile["calle"] }} {{ $data[ 'empresa' ]->domicile["altura"] }} @if(!empty($data[ 'empresa' ]->domicile["cp"])) ({{ $data[ 'empresa' ]->domicile["cp"] }})@endif<br>{{ $data[ 'empresa' ]->domicile["provincia"] }}@if(!empty($data[ 'empresa' ]->domicile["localidad"])) - {{ $data[ 'empresa' ]->domicile["localidad"] }}@endif | {{ $data[ 'empresa' ]->domicile["pais"] }}</a></p>
                                    </div>
                                </li>
                                    @php
                                $A_tel = $A_wha = [];
                                foreach($data["empresa"]->phone AS $t) {
                                    if($t["tipo"] == "tel")
                                        $A_tel[] = $t;
                                    else
                                        $A_wha[] = $t;
                                }
                                @endphp
                                <li class="d-flex mt-4">
                                    <i class="icono fas fa-phone-volume"></i>
                                    <div class="" style="width: calc(100% - 37px)">
                                        @foreach($A_tel AS $t)
                                            @php
                                            $visible = $t[ "telefono" ];
                                            $telefono = $t[ "telefono" ];
                                            if( !empty( $t[ "visible" ] ) )
                                                $visible = $t[ "visible" ];
                                            @endphp
                                            @if( $t[ "is_link" ] )
                                                <a title="{{ $visible }}" class="text-truncate d-block" href="tel:{{ $telefono }}">{{ $visible }}</a>
                                            @else
                                                {{ $visible }}
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                @if(!empty($A_wha))
                                <li class="d-flex mt-4">
                                    <i class="icono fab fa-whatsapp"></i>
                                    <div class="" style="width: calc(100% - 37px)">
                                        @foreach($A_wha AS $t)
                                            <a title="{{ $t['visible'] }}" class="whatsapp text-truncate d-block" href="https://wa.me/{!!$t['telefono']!!}">{{ $t["visible"] }}</a>
                                        @endforeach
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {!! $data[ "empresa" ]->domicile[ "mapa" ] !!}
</div>