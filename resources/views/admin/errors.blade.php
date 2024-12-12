@extends('master')

@section('content')
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
            <h1>{{ __('admin.errors') }}</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.index') }}">{{ __('admin.title') }}</a></li>
                <li>/</li>
                <li><span>{{ __('admin.errors') }}</span></li>
            </ul>
            </div>
        </div>

        @if(count($errors) > 0)
        <div class="tablas">
        <div class="cabecera">
            <i class="bx bx-bug-alt"></i>
            <h3>{{ __('admin.errors') }}</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>{{ __('admin.message') }}</th>
                    <th>{{ __('admin.file') }}</th>
                    <th>{{ __('admin.line') }}</th>
                    <th>{{ __('admin.uid') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($errors as $error)
                <tr>
                    <td>{{ $error->message }}</td>
                    <td>{{ $error->file }}</td>
                    <td> {{ $error->line }} </td>
                    <td>
                        @if ($error->user_id != 0)
                            {{ $error->user->name }} ({{ $error->user->nombreCompanyia }})
                        @else
                            {{ __('admin.unregisteredUser') }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        @else
            <div class="mensaje">
            <i class="bx bx-error"></i>
            <h4>{{ __('admin.noErr') }}</h4>
            </div>
        @endif

    </main>
  </div>
@endsection()