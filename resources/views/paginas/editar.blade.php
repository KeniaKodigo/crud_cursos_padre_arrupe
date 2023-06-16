@extends('home')

@section('contenido')
<h1 class="text-center text-success">Editar Curso</h1>

<form action="{{ route('actualizar', $curso->id) }}" method="POST">
    @method('PUT')
    @csrf
    <label for="">Titulo</label>
    <input type="text" class="form-control" name="titulo" value="{{ $curso->title }}">

    <label for="">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ $curso->description }}">

    <label for="">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ $curso->price }}">

    <label for="">Seleccione un Instructores</label>
    <select name="instructores" class="form-control">
        <option value="{{ $curso->id_instructor }}">{{ $curso->instructor }}</option>
        @foreach ($instructor as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>

    <input type="submit" class="btn btn-success" value="Actualizar Curso">
</form>
@endsection