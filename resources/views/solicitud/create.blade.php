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
                        <h3>Solicitar canción</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('solicitud.store') }}">
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
                                <label for="cancion" class="form-label ">Nombre de la canción</label>
                                <input type="text" class="form-control @error('cancion') is-invalid @enderror " id="cancion" name="cancion" value="{{ old('cancion') }}" required>
                            </div>

                            <button type="submit" class="btn btn-dark w-100">Solicitar</button>
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
