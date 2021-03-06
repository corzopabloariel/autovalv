<div class="wrapper-contacto bg-white font-lato wrapper-">
    <div class="container">
        <div class="row hidden-mobile">
            <div class="col-12 col-md d-flex align-items-stretch">
                <div class="title text-uppercase position-relative font-lato w-100 d-flex align-items-center">
                    <div class="position-absolute w-100 h-100"></div>
                    <div class="w-100 p-4">
                        cotización online
                    </div>
                </div>
            </div>
            @include( 'layouts.general.dato' )
        </div>
        
        <div class="row mt-0 wrapper-">
            <div class="col-12">
                <div class="" style="padding: 30px 38px 46px 38px; background-color: #f0f0f0">
                    <form action="" enctype="multipart/form-data" id="formContacto" onsubmit="event.preventDefault(); enviar( this )" method="post">
                        @csrf
                        <div class="row normal">
                            <div class="col-12">
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <h3 class="title-form font-lato">Datos Técnicos</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row normal">
                            <div class="col-12">
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <select name="accionamiento" class="form-control" id="Accionamiento">
                                            <option value="" selected hidden>Accionamiento</option>
                                            <option>A Solenoide</option>
                                            <option>Neumático Simple Efecto</option>
                                            <option>Neumático Doble Efecto</option>
                                            <option>Neumático Modulante</option>
                                            <option>Hidroneumático</option>
                                            <option>Actuador Eléctrico On-Off</option>
                                            <option>Actuador Eléctrico Modulante</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" name="fluido" class="form-control" placeholder="Fluido">
                                    </div>
                                </div>
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <select name="configuracion" class="form-control" id="configuracion">
                                            <option value="" selected hidden>Configuración</option>
                                            <option>2 Vías, Normal Cerrada </option>
                                            <option>2 Vías, Normal Abierta</option>
                                            <option>3 Vías Normal Cerrada</option>
                                            <option>3 Vías Normal Abierta</option>
                                            <option>3 Vías Universal</option>
                                            <option>5 Vías Normal Cerrada</option>
                                            <option>5 Vías Normal Abierta</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" name="temperaturaTrabajo" class="form-control" placeholder="Temperatura del trabajo (ºC)">
                                    </div>
                                </div>
                                <div class="row normal">
                                    <div class="col-12 col-md-6">
                                        <select name="conexion" class="form-control" id="conexion">
                                            <option value="" selected hidden>Medida de conexión</option>
                                            <option>1/8"</option>
                                            <option>1/4"</option>
                                            <option>3/8"</option>
                                            <option>1/2"</option>
                                            <option>3/4"</option>
                                            <option>1"</option>
                                            <option>1 1/4"</option>
                                            <option>1 1/2"</option>
                                            <option>2"</option>
                                            <option>2 1/2"</option>
                                            <option>3"</option>
                                            <option>4"</option>
                                            <option>5"</option>
                                            <option>6"</option>
                                            <option>8"</option>
                                            <option>10"</option>
                                            <option>12"</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" name="presionTrabajo" class="form-control" placeholder="Presión de trabajo">
                                    </div>
                                    <div class="col-12 col-md">
                                        <select name="presion" class="form-control" id="presion">
                                            <option>bar</option>
                                            <option>kg/cm2</option>
                                            <option>psi</option>
                                            <option>mmHG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row normal">
                                    <div class="col-12 col-md-6">
                                        <select name="conexionTipo" class="form-control" id="conexionTipo">
                                            <option value="" selected hidden>Tipo de conexión</option>
                                            <option>Roscada BSP</option>
                                            <option>Roscada NPT</option>
                                            <option>Bridada</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" name="tensionTrabajo" class="form-control" placeholder="Tensión de trabajo">
                                    </div>
                                    <div class="col-12 col-md">
                                        <select name="presion" class="form-control" id="presion">
                                            <option>CA 50 Hz</option>
                                            <option>CA 60 Hz</option>
                                            <option>CC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <select name="materialCuerpo" class="form-control" id="materialCuerpo">
                                            <option value="" selected hidden>Material del cuerpo</option>
                                            <option>Bronce/Laton</option>
                                            <option>AISI 316</option>
                                            <option>AISI 304</option>
                                            <option>Nylon 66</option>
                                            <option>PVC</option>
                                            <option>Polipropileno </option>
                                            <option>Acrilico</option>
                                            <option>Teflon</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" name="codigoValvula" class="form-control" placeholder="Código de válvula">
                                    </div>
                                </div>
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <textarea name="mensaje" placeholder="Mensaje" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row normal mt-5">
                            <div class="col-12">
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <h3 class="title-form font-lato">Datos Personales</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row normal">
                            <div class="col-12">
                                <div class="row normal">
                                    <div class="col-12 col-md">
                                        <input required type="text" name="nombre" class="form-control" placeholder="Nombre y Apellido (*)">
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="text" name="cargo" class="form-control" placeholder="Cargo">
                                    </div>
                                </div>
                                <div class="row normal mt-4">
                                    <div class="col-12 col-md">
                                        <input required type="text" name="empresa" class="form-control" placeholder="Empresa (*)">
                                    </div>
                                    <div class="col-12 col-md">
                                        <input type="phone" name="telefono" class="form-control" placeholder="Teléfono">
                                    </div>
                                </div>
                                <div class="row normal mt-4">
                                    <div class="col-12 col-md">
                                        <input required type="email" name="email" class="form-control" placeholder="Email (*)">
                                    </div>
                                    <div class="col-12 col-md">
                                        <div class="custom-file">
                                            <input onchange="readFile( this , '#label-file' );" name="file" id="file" class="form-control custom-file-input" accept="image/jpeg,application/pdf" type="file" placeholder="Archivo">
                                            <label class="custom-file-label mb-0 text-truncate" data-browse="Explorar" for="file" id="label-file">Adjuntar archivo...</label>
                                        </div>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    readFile = ( input , target ) => {
        if ( input.files && input.files[ 0 ] ) {
            let reader = new FileReader();
            reader.onload = ( e ) => {
                console.log(e)
                $( target ).text( input.files[ 0 ].name );
            };
            reader.readAsDataURL( input.files[ 0 ] );
        } else
            $( target ).text( "Adjuntar archivo..." )
    };
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