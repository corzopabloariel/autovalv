<section class="mt-3">
    <div class="container-fluid">
        <button id="btnADD" onclick="add(this)" class="btn position-fixed rounded-circle btn-primary text-uppercase" type="button"><i class="fas fa-plus"></i></button>
        <div style="display: none;" id="wrapper-form" class="mt-2">
            <div class="card">
                <div class="card-body">
                    <button onclick="remove(this)" type="button" class="close position-absolute" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                    <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
</div>
@push('scripts')
<script>
    window.pyrus = new Pyrus( "redes" );
    /** ------------------------------------- */
    
    init( function() {});
</script>
@endpush