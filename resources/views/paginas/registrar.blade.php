@extends('home')

@section('contenido')
    <h1 class="text-center text-success">Registrar Curso</h1>

    <form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data">
        <!---
            csrf: solictando el token para el envio de datos
        -->
        @csrf
        <label for="">Titulo</label>
        <input type="text" class="form-control" name="titulo">

        <label for="">Descripcion</label>
        <input type="text" class="form-control" name="descripcion">

        <label for="">Precio</label>
        <input type="text" class="form-control" name="precio">

        <label for="">Imagen</label>
        <input type="file" class="form-control" name="imagen">

        <label for="">Seleccione un Instructores</label>
        <select name="instructores" class="form-control">
            @foreach ($instructor as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

        <input type="submit" class="btn btn-success my-4" value="Guardar Curso">
    </form>
@endsection