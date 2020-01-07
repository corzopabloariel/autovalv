<div class="wrapper-contacto bg-white font-lato wrapper-">
    <div class="container">
        <div class="row hidden-mobile">
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
        
        <div class="row wrapper- mt-0 mb-5">
            <div class="col-12">
                <div style="background-color: #eeeeee; padding: 35px 30px 65px 30px">
                    <form action="" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                        @csrf
                        <div class="p-3">
                            <div class="row normal">
                                <div class="col-12 col-lg-8">
                                    @isset( $data[ "producto" ] )
                                    <input type="hidden" name="producto_id" value="{{ $data[ 'producto' ]->id }}" />
                                    <div class="row normal">
                                        <div class="col-12 col-md">
                                            <h3 class="title-form border-bottom-0">Consulta del producto</h3>
                                            <div class="text-center">
                                                {!! $data[ "producto" ]->title !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endisset
                                    <div class="row normal">
                                        <div class="col-12 col-md">
                                            <input required type="text" name="nombre" class="form-control" placeholder="Nombre (*)">
                                        </div>
                                        <div class="col-12 col-md">
                                            <input required type="text" name="apellido" class="form-control" placeholder="Apellido (*)">
                                        </div>
                                    </div>
                                    <div class="row normal mt-4">
                                        <div class="col-12 col-md">
                                            <input required type="text" name="empresa" class="form-control" placeholder="Empresa">
                                        </div>
                                        <div class="col-12 col-md">
                                            <select required class="form-control" name="tipo" id="">
                                                <option value="" hidden selected>Tipo de Cliente (*)</option>
                                                <option>Usuario</option>
                                                <option>Instalador</option>
                                                <option>Revendedor</option>
                                                <option>Distribuidor</option>
                                                <option>Fabricante</option>
                                                <option>Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row normal mt-4">
                                        <div class="col-12 col-md">
                                            <input required type="email" name="email" class="form-control" placeholder="Email (*)">
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
                                            <div class="mt-2">{!! $data[ "terminos" ]->content[ "frase" ] !!}</div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center mt-4">
                                            <button type="submit" class="btn btn-danger font-lato text-uppercase px-5 text-white rounded-pill">enviar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg">
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
        </div>
    </div>
    {!! $data[ "empresa" ]->domicile[ "mapa" ] !!}
</div>
@push( "scripts" )
<script src="https://www.google.com/recaptcha/api.js?render=6LdX4swUAAAAADN6YumdYUgZUOIL4fVM_9kxeh24"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    enviar = ( t ) => {
        let url = t.action;
        let method = t.method;
        let idForm = t.id;
        let formElement = document.getElementById( idForm );
        let formData = new FormData( formElement );
        grecaptcha.ready(function() {
            $( ".form-control" ).prop( "readonly" , true );
            Toast.fire({
                icon: 'warning',
                title: 'Espere, enviando'
            });
            grecaptcha.execute("6LdX4swUAAAAADN6YumdYUgZUOIL4fVM_9kxeh24", {action: 'contact'}).then( function( token ) {
                formData.append( "token", token );
                axios({
                    method: method,
                    url: url,
                    data: formData,
                    responseType: 'json',
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((res) => {
                    $( ".form-control" ).prop( "readonly" , false );
                    if( parseInt( res.data.estado ) ) {
                        $( ".form-control" ).val( "" );
                        Toast.fire({
                            icon: 'success',
                            title: res.data.mssg
                        });
                    } else
                        Toast.fire({
                            icon: 'error',
                            title: res.data.mssg
                        });
                })
                .catch((err) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un error'
                    });
                })
                .then(() => {});
            });
        });
    };
</script>
@endpush