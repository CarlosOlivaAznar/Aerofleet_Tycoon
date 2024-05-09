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
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </label>
            </div>

            <div class="campos">
                @if (session('status') == 'verification-link-sent')
                    <label for="resendInfo">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </label>
                @endif
            </div>
            

            <div class="campos">
                <div class="forms-alineados">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <input type="submit" value="{{ __('Resend Verification Email') }}">
                    </form>
    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" class="linkForm" value="{{ __('Log Out') }}">
                    </form>
                </div>
            </div>

            
            
          </form>
        </div>
    </div>
  </main>
</body>
</html>