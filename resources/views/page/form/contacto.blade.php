<!DOCTYPE html>
<html>
<body>
    @if( isset( $producto ) )
        <h3>Consulta de producto:</h3>
        <a target="blank" href="{{ URL::to( 'productos/' . str_slug( $producto->familia->title ) . '/' . str_slug( $producto->title ) . '/' . $producto->id ) }}">
            {!! $producto->title !!}
        </a>
    @else
        <h3>Datos de contacto</h3>
    @endif
	<ul>
        <li><strong>Nombre:</strong> {{$nombre}} {{$apellido}}</li>
        <li><strong>Empresa:</strong> {{$empresa}}</li>
        <li><strong>Email:</strong> <a href="mailto:{{$email}}">{{$email}}</a></li>
        <li><strong>Teléfono:</strong> {{$telefono}}</li>
	</ul>
    <br>
    <h4>Mensaje</h4>
    <p>{{$mensaje}}</p>
</body>
</html>