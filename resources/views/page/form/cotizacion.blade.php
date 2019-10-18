<!DOCTYPE html>
<html>
<body>
    <h2>Cotización</h2>
    <br/>
    <h3>Datos personales</h3>
	<ul>
        <li><strong>Nombre:</strong> {{$nombre}}</li>
        <li><strong>Empresa:</strong> {{$empresa}}</li>
        <li><strong>Cargo:</strong> {{$cargo}}</li>
        <li><strong>Email:</strong> <a href="mailto:{{$email}}">{{$email}}</a></li>
        <li><strong>Teléfono:</strong> {{$telefono}}</li>
	</ul>
    <br>
    <h3>Datos técnicos</h3>
    <ul>
        <li><strong>Accionamiento:</strong> {{$accionamiento}}</li>
        <li><strong>Fluido:</strong> {{$fluido}}</li>
        <li><strong>Configuración:</strong> {{$configuracion}}</li>
        <li><strong>Temperatura del trabajo (ºC):</strong> {{$temperaturaTrabajo}}</li>
        <li><strong>Medida de conexión:</strong> {{$conexion}}</li>
        <li><strong>Presión de trabajo:</strong> {{$presionTrabajo}}</li>
        <li><strong>Tipo de conexión:</strong> {{$conexionTipo}}</li>
        <li><strong>Tensión de trabajo:</strong> {{$tensionTrabajo}}</li>
        <li><strong>Material del cuerpo:</strong> {{$configuracion}}</li>
        <li><strong>Código de válvula:</strong> {{$codigoValvula}}</li>
    </ul>
    <h4>Mensaje</h4>
    <p>{{$mensaje}}</p>
</body>
</html>