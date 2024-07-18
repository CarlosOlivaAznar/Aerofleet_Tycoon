<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Mapa -->
<link rel="stylesheet" href="../../leaflet/leaflet.css">
<script src="{{ asset('leaflet/leaflet.js') }}"></script>
<script src="{{ asset('leaflet/leaflet.rotatedMarker.js') }}"></script>

<!-- Boxicons -->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<!-- Css -->
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<title>AeroFleet</title>

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('images/logos/logo_AFT_100px_icon.png') }}">

<!-- Metadatos -->
<meta name="description" content="Take to the skies with Aerofleet, a real-time airline management simulator. Manage your fleet, perform maintenance, optimize routes, and handle airport slots, rentals, and salaries. Develop your airline empire today!">

<meta property="og:title" content="AeroFleet"/>
<meta property="og:description" content="Take to the skies with Aerofleet, a real-time airline management simulator. Manage your fleet, perform maintenance, optimize routes, and handle airport slots, rentals, and salaries. Develop your airline empire today!" />
<meta property="og:image" content="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" />
<meta property="og:url" content="{{ route('landing.landing') }}" />
<meta property="og:site_name" content="AeroFleet" />

<meta name="twitter:title" content="AeroFleet" />
<meta name="twitter:description" content="Take to the skies with Aerofleet, a real-time airline management simulator. Manage your fleet, perform maintenance, optimize routes, and handle airport slots, rentals, and salaries. Develop your airline empire today!" />
<meta name="twitter:image" content="{{ asset('images/logos/logo_AFT_100px_icon.png') }}" />
<meta name="twitter:card" content="summary_large_image" />

<!-- Modo Oscuro -->
<script src="{{ asset('js/darkMode.js') }}"></script>