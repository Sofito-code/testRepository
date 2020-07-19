<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h2>hola {{$name}}, bienvenido a Chocoloco</h2>
<p>Por favor confirma tu correo electrónico.</p>
<p>simplemente debes hacer click en el siguiente enlace:</p>
<a class="btn btn-outline-primary" href="{{ route('verified_email')}}">
    Confirmar correo electronico
</a>

</body>
</html>
