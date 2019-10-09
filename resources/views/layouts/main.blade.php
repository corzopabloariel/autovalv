<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $data['metadato']['description'] }}"/>
        <meta name=”keywords” content="{{ $data['metadato']['keywords'] }}"/>
        <title>@yield( 'headTitle' , config( 'app.name' ) . ' :: ' . $data[ 'title' ] )</title>
        
        @if( !empty( $data[ "empresa" ][ "images" ][ "favicon" ] ) )
            @if( $data[ "empresa" ][ "images" ][ "favicon" ][ "e" ] == "png" )
            <link rel="icon" type="image/png" href="{{ asset($data[ 'empresa' ][ 'images' ][ 'favicon' ][ 'i' ] ) }}" />
            @else
            <link rel="shortcut icon" href="{{ asset( $data[ 'empresa' ][ 'images' ][ 'favicon' ][ 'i' ] ) }}" />
            @endif
        @endif
        <!-- <Styles> -->
        @include( 'layouts.general.css' )
        <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
        <link rel="stylesheet" href="{{ asset('css/loading-btn.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link href="{{ asset('css/css.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/page.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/header.css') }}" rel="stylesheet">
        <link href="{{ asset('css/page/footer.css') }}" rel="stylesheet">
        @stack( 'styles' )
        <!-- </Styles> -->
    </head>
    <body>
        <div class="modal fade bd-example-modal-lg" id="terminosModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">{{ $data[ "terminos" ]->content[ "title" ] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $data[ "terminos" ]->content[ "text" ] !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modal-pass" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title">ATENCIÓN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Se le aconseja cambiar la contraseña desde la sección <a class="text-primary" href="{{-- route('client.mis_datos') --}}">MIS DATOS</a></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        @include( 'layouts.general.message' )
        <div class="">
            @include( 'layouts.general.header' )
            <section>
            @include( $data[ 'view' ] )
            </section>
            @include( 'layouts.general.footer' )
        </div>
        <!-- Scripts -->
        @include( 'layouts.general.script' )
        <script>
            window.url = "{{ url()->current() }}";
            $(document).ready(function() {
                if($("nav .menu").find(`a[href="${window.url}"]`).length)
                    $("nav .menu").find(`a[href="${window.url}"]`).addClass("active");
                $("body").on("click",".alert button.close", function() {
                    $(this).closest(".alert").remove();
                });
            });
        </script>
        @stack( 'scripts' )
        <script src="{{ asset('js/bootstrap-autocomplete.js') }}"></script>
    </body>
</html>