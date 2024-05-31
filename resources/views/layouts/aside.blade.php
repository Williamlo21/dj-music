<aside class="bg-light border-end">
    <div class="list-group list-group-flush">
        <a @if (auth()->check()) href="{{ route('home.index') }}"
                        @else
                            href="{{ route('welcome') }}" @endif
            class="list-group-item list-group-item-action active" aria-current="true">Inicio</a>
        <a href="{{ route('solicitud.index') }}" class="list-group-item list-group-item-action">Mis solicitudes</a>
        @auth
            @role('CLIENTE')
                <a href="{{ route('solicitud.index') }}" class="list-group-item list-group-item-action">VIP</a>
            @endrole
            @role('DJ')
                <a href="{{ route('solicitud.indexDJ') }}" class="list-group-item list-group-item-action">Solicitudes</a>
            @endrole
            @role('ADMINISTRADOR')
                <a href="{{ route('solicitud.index') }}" class="list-group-item list-group-item-action">Gestionar DJs</a>
                <a href="{{ route('solicitud.index') }}" class="list-group-item list-group-item-action">Gestionar Clientes</a>
            @endrole
        @endauth

    </div>
</aside>
