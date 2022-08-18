@extends('layouts.app')

@section('title', 'Detalle cursos')

@section('content')

    <div class="bg-light text-dark rounded mt-5 pt-5 mb-5 pb-5 text-center">
        <img src="{{ Storage::url($grade->imagen) }}" width="300" height="220" class="mb-5">
        <p class="card-text"> <b>Contenido:</b> {{$grade->description}} </p>
        <p class="card-text"> <b>Duración:</b> {{$grade->duration}} Horas</p>
        <a href="/courses/{{$grade->id}}/edit" class="btn btn-primary">Editar</a>

        {{--Para este caso no se necesita escribir destroy en la ruta como si
            escribimos edit en la ruta para obtener el formulario de edición. Aquí
            creamos un formulario simplemente para poder incluir el botón para eliminar.--}}

            <form class="form-group" action="/courses/{{$grade->id}}" method="POST">
            @csrf
            @method('DELETE')
            <br>
            <button type="submit" class="btn btn-danger">--Eliminar--</button>
        </form>


    </div>

@endsection


















