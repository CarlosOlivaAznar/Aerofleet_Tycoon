<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
    @include('partials.navbarLanding')
    <main class="mainContent">
        <h1>{{ __('landing.donate') }}</h1><br>

        <a href="https://www.paypal.com/donate/?hosted_button_id=FQRV7KNMPJQNL" target="_blank"><div class="changelog" style="margin-bottom: 25px; text-align: center; cursor: pointer;" >
            <h3>{{ __('landing.accessDonate') }}</h3>
        </div></a>

        <div class="changelog" style="padding: 25px 30px">
            <h3>{{ __('landing.thanks') }}</h3>

            <p style="margin-top: 15px">
                {{ __('landing.donateT1') }}
            </p><br>
            <p>
                {{ __('landing.donateT2') }}
            </p><br>
            <p>
                {{ __('landing.donateT3') }} <a href="{{ route('landing.sobreMi') }}">{{ __('landing.aboutMe') }}</a> {{ __('landing.donateT4') }} <a href="https://discord.gg/sUueRvrttY" target="_blank">{{ __('landing.discordServer') }}</a>{{ __('landing.donateT5') }}
            </p><br>
            <p>
                {{ __('landing.donateT6') }}
            </p><br>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>