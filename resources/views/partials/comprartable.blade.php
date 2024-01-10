<table>
    <thead>
      <tr>
        <th>Avion</th>
        <th>Modelo</th>
        <th>Precio</th>
        <th>Rango</th>
        <th>Comprar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($aviones as $avion)
      <tr>
          <td>
              <img src="{{ asset($avion->img) }}" alt="">
          </td>
          <td>{{ $avion->modelo }}</td>
          <td>{{ number_format($avion->precio, 0, ',', '.') }}</td>
          <td>{{ $avion->rango }}km</td>
          <td><a class="comprar" href="{{ route('flota.comprar', ['id' => $avion->id]) }}"><i class="bx bx-shopping-bag"></i></a></td>
      </tr>
      @endforeach
    </tbody>
</table>