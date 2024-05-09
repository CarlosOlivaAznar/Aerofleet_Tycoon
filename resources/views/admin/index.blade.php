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
              </tr> 
              @endforeach
            </tbody>
        </table>
      </div>

    </main>
  </div>
</body>
</html>