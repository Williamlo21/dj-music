@extends('app')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card bg-dark text-white">
                <img src="{{ asset('img/bar.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h1 class="card-title">Un gusto en recibirte {{ Auth::user()->name }}! </h1>
                    <p class="card-text">Aquí podras hacer la solictud de tus canciones favoritas desde la comodidad de tu
                        mesa.</p>
                    <p class="card-text">Ahora que ya has iniciado sesion puedes comenzar a solicitar tus canciones favoritas.</p>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque cupiditate ullam
                        dolor. Animi labore at ad beatae dolore nam recusandae ipsum quod. Sequi quae, sint et temporibus
                        vitae nisi! Et!</p>
                        <a href="{{ route('solicitud.create') }}" class="btn btn-sm-6 btn-light">Quiero una canción!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
@endsection
