@extends('app')
@section('css')

@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Registrarme</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registro.store') }}">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @csrf
                            <div class="mb-3">
                                <label for="nombres" class="form-label ">Nombres</label>
                                <input type="text" class="form-control @error('nombres') is-invalid @enderror " id="nombres" name="nombres" placeholder="{{ old('nombres') }}"  value="{{ old('nombres') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label ">Apellidos</label>
                                <input type="text" class="form-control @error('apellidos') is-invalid @enderror " id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="numero_documento" class="form-label ">Número de documento</label>
                                <input type="text" class="form-control @error('numero_documento') is-invalid @enderror " id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Usuario</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Ej: @miuser" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electronico</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <p class="text-muted">¿Ya tienes cuenta? <span><a href="{{ route('login.index') }}">Inicia sesión aquí!</a></span></p>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Registrarme</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

@endsection
