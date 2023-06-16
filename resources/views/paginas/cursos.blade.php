@extends('home')

@section('contenido')
    <h1 class="text-center text-primary">Cursos Disponibles!</h1>

    <a href="{{ url('/formulario') }}" class="btn btn-dark mb-2">Registrar Curso</a>

    <div class="row">
        @foreach ($cursos as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ url('/') }}/img/curso.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text">Precio: ${{ $item->price }}</p>
                        
                        <form action="{{ route('editar', $item->id ) }}" method="POST">
                            @method('GET')
                            @csrf
                            <button class="btn btn-primary">Editar</button>
                        </form>

                        <form action="{{ route('eliminar', $item->id ) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection