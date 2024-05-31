@extends('app')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cancion</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->cancion }}</td>
                            <td>
                                <span class="" style="color: @if ($solicitud->status == 'EN ESPERA') YELLOW @endif @if ($solicitud->status == 'CANCELADO' || $solicitud->status == 'RECHAZADO') RED @endif @if ($solicitud->status == 'ACEPTADO') GREEN @endif">
                                    {{ $solicitud->status }}
                                </span>
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
