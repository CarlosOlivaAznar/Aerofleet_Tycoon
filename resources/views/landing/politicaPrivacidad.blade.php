<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>{{ __('landing.privacy') }}</h1><br>

        <div class="changelog" style="padding: 25px 30px">
            {!! __('legal.privacyPolicy') !!}
        </div>
    </main>

    @include('partials.footer')
</body>
</html>