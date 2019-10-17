<section class="mt-3">
    <div class="container-fluid">
        @include( 'layouts.general.form' )
        @include( 'layouts.general.table' )
    </div>
</section>
@push('scripts')
<script>
    window.pyrus = new Pyrus( window.data.familia_id === null ? "familia" : "subfamilia" , null , src );

    familiasFunction = ( t , id ) => {
        window.location = `${url_simple}/adm/familias/${id}/sub`;
    };
    
    /** */
    init( () => { } );
</script>
@endpush