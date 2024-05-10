<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <main>
    <div class="pag-login" style="background-image: url({{ asset('images/bg-auth.jpg') }})">
      
        <div>
          <img src="{{ asset('images/logos/logo_AFT_.png') }}" alt="logoAFT">
          <form action="#" class="formularioBasico">
            @csrf

            <div class="campos">
                <label for="info">
                    {{ __('auth.gratitude') }}
                </label>
            </div>

            <div class="campos">
              <label for="info">
                {{ __('auth.issues') }}
              </label>
            </div>

            <div class="campos">
                @if (session('status') == 'verification-link-sent')
                    <label for="resendInfo">
                        {{ __('auth.resend') }}
                    </label>
                @endif
            </div>
            

            <div class="campos">
                <div class="forms-alineados">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <input type="submit" value="{{ __('auth.resendVerification') }}">
                    </form>
    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" class="linkForm" value="{{ __('auth.logout') }}">
                    </form>
                </div>
            </div>

            
            
          </form>
        </div>
    </div>
  </main>
</body>
</html>