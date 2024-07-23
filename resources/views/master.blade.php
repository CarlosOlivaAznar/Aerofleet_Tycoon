<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
@if ($_COOKIE['modoOscuro'] === 'true')
<body class="dark" @yield('estilosBody')>
@else
<body @yield('estilosBody')>
@endif
    @section('content')      
    @show
</body>
</html>