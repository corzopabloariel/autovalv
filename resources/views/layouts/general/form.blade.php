<button id="btnADD" onclick="add( this )" class="btn position-fixed rounded-circle btn-primary text-uppercase" type="button"><i class="fas fa-plus"></i></button>
@if( isset( $data[ "buttons" ] ) )
<div class="my-4">
    @foreach( $data[ "buttons" ] AS $d )
    <button class="btn {{ $d[ 'b' ] }} text-center rounded-0">
        <i class="{{ $d[ 'i' ] }}" aria-hidden="true"></i> {{ $d[ 't' ] }}
    </button>
    @endforeach
</div>
@endif
<div style="display: none;" id="wrapper-form" class="mt-2">
    <div class="card">
        <div class="card-body">
            <button onclick="remove(this)" type="button" class="close position-absolute" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <form id="form" onsubmit="event.preventDefault(); formSubmit(this);" novalidate class="pt-2" action="" method="post" enctype="multipart/form-data">
                @csrf
                <button class="btn btn-success px-5 text-uppercase d-block mx-auto mb-4"><i class="fas fa-save ml-3"></i></button>
                <div class="container-form"></div>
            </form>
        </div>
    </div>
</div>