<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  <!-- Menu Lateral -->
  @include('partials.sidebarAdmin')
  <!-- Fin Menu Lateral -->

  <div class="contenido">
    <!-- Menu Superior -->
    @include('partials.navbar')
    <!-- Fin Menu Superior -->

    <!-- Contenido Principal -->
    <main>
      <div class="cabecera">
        <div class="titulo">
          <h1>{{ __('admin.title') }}</h1>
        </div>
        <a href="{{ route('admin.bugreports') }}" class="boton">
          <i class="bx bx-bug-alt"></i>
          <span>{{ __('admin.bugreport') }}</span>
        </a>
      </div>

      <div class="tablas">
        <div class="cabecera">
            <i class="bx bx-user"></i>
            <h3>{{ __('admin.users') }}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>{{ __('admin.airlineName') }}</th>
                    <th>{{ __('admin.name') }}</th>
                    <th>{{ __('admin.email') }}</th>
                    <th>{{ __('admin.userType') }}</th>
                    <th>{{ __('admin.peferredLang') }}</th>
                    <th>{{ __('admin.balance') }}</th>
                    <th>{{ __('admin.lastConnected') }}</th>
                    <th>{{ __('admin.actions') }}</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                  <td>{{ $user->nombreCompanyia }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if ($user->tipoUsuario === 1)
                        {{ __('admin.userType1') }}
                    @else
                        {{ __('admin.userType0') }}
                    @endif
                  </td>
                  <td>{{ $user->preferred_language }}</td>
                  <td>{{ $user->saldo }}</td>
                  <td>{{ $user->ultimaConexion }}</td>
                  <td>
                    <a class="modificar tooltip" data-modal-target="modificar{{ $user->id }}">
                      <i class="bx bx-wrench"></i>
                      <span class="tooltiptext">{{ __('admin.modify') }}</span>
                    </a>
                    <a class="vender tooltip" data-modal-target="borrar{{ $user->id }}">
                      <i class="bx bx-no-entry"></i>
                      <span class="tooltiptext">{{ __('admin.delete') }}</span>
                    </a>
                  </td>
              </tr> 
              @endforeach
            </tbody>
        </table>
      </div>

      <!-- Modales -->
      @foreach ($users as $user)
      <!-- Modificar Usuario -->
      <div class="modal" id="modificar{{ $user->id }}">
        <div class="contenido-modal">
          <form action="{{ route('admin.modificar') }}" method="POST">
            <div class="cabecera-modal">
              <span class="cerrar-modal">&times;</span>
              <h2>{{ __('admin.modify') }}</h2>
            </div>
            <div class="cuerpo-modal">
              @csrf
              <label for="nombre">{{ __('admin.nameModify') }}</label>
              <input type="text" name="nombreNuevo" id="nombreNuevo" value="{{ $user->name }}">

              <label for="nombreCompanyia">{{ __('admin.nameModifyAirline') }}</label>
              <input type="text" name="nombreNuevoCompanyia" id="nombreNuevo" value="{{ $user->nombreCompanyia }}">

              <input type="hidden" name="id" value="{{ $user->id }}">
              
            </div>
            <div class="footer-modal">
              <div class="botones">
                <span class="cancelar">{{ __('admin.deny') }}</span>
                <input type="submit" class="aceptar" value="{{ __('admin.confirm') }}">
              </div>
            </div>
          </form>
        </div>
      </div> 

      <!-- Borrar Usuario -->
      <div class="modal" id="borrar{{ $user->id }}">
        <div class="contenido-modal">
          <div class="cabecera-modal">
            <span class="cerrar-modal">&times;</span>
            <h2>{{ __('admin.delete') }}</h2>
          </div>
          <div class="cuerpo-modal">

            <p>{{ __('admin.deleteConfirmation') }} {{ $user->name }}?</p><br>
            <p>{{ __('admin.delteInfo') }}</p>
            
          </div>
          <div class="footer-modal">
            <div class="botones">
              <span class="cancelar">{{ __('admin.deny') }}</span>
              <a href="{{ route('admin.borrar', ["id" => $user->id]) }}" class="aceptar">{{ __('admin.confirm') }}</a>
            </div>
          </div>
        </div>
      </div> 
      @endforeach

      <script src="{{ asset('js/modals.js') }}"></script>

    </main>
  </div>
</body>
</html>