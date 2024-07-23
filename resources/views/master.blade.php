<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
@if ($_COOKIE['modoOscuro'] === 'true')
<body class="dark">
@else
<body>
@endif
    @section('content')      
    @show
</body>
</html>