<nav>
    <span class="version">V-0.3.0 (ALPHA)</span>  
    @if (Auth::user()->tipoUsuario === 1)
    <a href="{{ route('admin.index') }}" style="margin-left: 10px"><i class="bx bx-terminal"></i><span>{{ __('navbar.admin') }}</span></a>
    @endif
    <a data-modal-target="bugReport"><i class="bx bx-bug-alt"></i><span>{{ __('navbar.bugreport') }}</span></a>
    <h3><span>{{ __('navbar.balance') }}</span>{{ session('saldo') }} €</h3>

    <div class="modal" id="bugReport">
        <div class="contenido-modal">
          <form action="{{ route('bugreport') }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>{{ __('navbar.bugreport') }}</h2>
            </div>
            <div class="cuerpo-modal">
              <p>{{ __('navbar.text') }}</p><br>
              @method('POST')
              @csrf
              <label for="texto">{{ __('navbar.description') }}</label>
              <textarea name="informe" id="informe"></textarea>
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">{{ __('navbar.cancel') }}</span>
                <input type="submit" class="aceptar" value="{{ __('navbar.send') }}">
              </div>
            </div>
          </form>
        </div>
    </div> 

      <script src="{{ asset('js/modals.js') }}"></script>
</nav>