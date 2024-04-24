<nav>
    <span class="version">V-0.3.0</span>
    <a data-modal-target="bugReport"><i class="bx bx-bug-alt"></i><span>Informar de un error</span></a>
    <h3><span>Saldo:</span>{{ session('saldo') }} €</h3>

    <div class="modal" id="bugReport">
        <div class="contenido-modal">
          <form action="{{ route('bugreport') }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>Informar de un error</h2>
            </div>
            <div class="cuerpo-modal">
              <p>Si quieres informar de un error, rellena el siguiente area de texto describiendo con el maximo detalle posible, si necesita ayuda adicional no dude en entrar en nuestra comunidad de discord para recibir ayuda</p><br>
              @method('POST')
              @csrf
              <label for="texto">Describe el error:</label>
              <textarea name="informe" id="informe"></textarea>
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">Cancelar</span>
                <input type="submit" class="aceptar" value="Enviar">
              </div>
            </div>
          </form>
        </div>
    </div> 

      <script src="{{ asset('js/modals.js') }}"></script>
</nav>