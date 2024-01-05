@if ($flash = Session::get('exito'))
<div class="alerta exito">
    <span class="cerrarbtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ $flash }}
</div>
@elseif($flash = Session::get('warning'))
<div class="alerta warning">
    <span class="cerrarbtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ $flash }}
</div>
@elseif($flash = Session::get('error'))
<div class="alerta error">
    <span class="cerrarbtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{ $flash }}
</div>
@endif