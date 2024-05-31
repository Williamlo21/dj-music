@extends('app')
@section('css')
<style>
    .oli{
        background-color: red;
    }
</style>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cancion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitudes as $solicitud)
                        <tr @if($solicitud->user->vip == 1)
                            class="table-warning"
                        @endif>
                            <td>{{ $solicitud->cancion }}</td>
                            <td>
                                <span
                                    style="color: @if ($solicitud->status == 'EN ESPERA') YELLOW @endif @if ($solicitud->status == 'CANCELADO' || $solicitud->status == 'RECHAZADO') RED @endif @if ($solicitud->status == 'ACEPTADO') GREEN @endif">
                                    {{ $solicitud->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('solicitud.aceptarSolicitud', ['solicitud_id' => $solicitud->id]) }}"
                                    class="btn btn-sm btn-success">Aceptar</a>
                                <a href="{{ route('solicitud.rechazarSolicitud', ['solicitud_id' => $solicitud->id]) }}"
                                    class="btn btn-sm btn-danger">Rechazar</a>

                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('content')
@endsection
