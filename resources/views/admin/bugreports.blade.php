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
            <h1>{{ __('admin.bugreport') }}</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">{{ __('admin.title') }}</a></li>
                <li>/</li>
                <li><span>{{ __('admin.bugreport') }}</span></li>
            </ul>
            </div>
        </div>

        @if(count($bugreports) > 0)
        <div class="tablas">
        <div class="cabecera">
            <i class="bx bx-user"></i>
            <h3>{{ __('admin.users') }}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>{{ __('admin.user') }}</th>
                    <th>{{ __('admin.report') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bugreports as $bugreport)
                <tr>
                    <td>{{ $bugreport->user->name }} ({{ $bugreport->user->nombreCompanyia }})</td>
                    <td>{{ $bugreport->bug }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        @else
            <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('admin.noBR') }}</h4>
            </div>
        @endif

    </main>
  </div>
</body>
</html>