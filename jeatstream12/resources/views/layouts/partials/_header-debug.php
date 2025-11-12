{{-- 
  Este archivo SÓLO contiene la barra de debug.
  Es llamado desde app-header.blade.php
--}}
<div class="bg-yellow-300 p-4 text-center text-black"> {{-- Añadido text-black para legibilidad --}}
    <strong>DEBUG:</strong> 
    Usuario: {{ Auth::user()->nombre }} | 
    Roles: {{ Auth::user()->getRoleNames()->implode(', ') }} |
    ¿Es Admin?: {{ Auth::user()->hasRole('administrador') ? 'SÍ' : 'NO' }}
</div>