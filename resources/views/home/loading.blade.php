@extends('master')

@section('content')
  <main>

    <h1>Cargando</h1>

    
  </main>
  <script>
    window.addEventListener('load', function() {
      setTimeout(() => {
        window.location.href = "{{ route('home.index') }}";
      }, 500);
    })  
  </script>
@endsection