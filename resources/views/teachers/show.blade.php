@extends('layouts.app_2')

@section('title', 'Detalle Docente')

@section('content')

<div class="bg-light text-dark rounded mt-5 pt-5 mb-5 pb-5 text-center">
    <img src="{{ Storage::url($tutor->photo) }}" width="350" height="310" class="mb-5">
    <p class="card-text"> <b>Nombre:</b> {{$tutor->name}} </p>
    <p class="card-text"> <b>Apellido:</b> {{$tutor->lastname}} </p>
    <p class="card-text"> <b>Titulo Universitario:</b> {{$tutor->university_degree}} </p>
    <p class="card-text"> <b>Edad:</b> {{$tutor->age}} años </p>
    <p class="card-text"> <b>Fecha Contrato:</b> {{$tutor->contract_date}} </p>
    <p class="card-text"> <b>Documento de Identidad:</b>
        <br>
        <iframe src="{{ Storage::url($tutor->identify_document) }}" width="400" height="400"></iframe>
    </p>

    <div class="text-center p-3">
        <a href="/teachers/{{$tutor->id}}/edit" class="btn btn-warning">Editar</a>
        <br>
        <br>
        {{-- Para este caso no se necesita escribir destroy en la ruta como sí escribimos
        edit en la ruta para obtener el formulario de edición. Aquí creamos un formulario
        simplemente para poder incluir el botón para eliminar --}}
        <form class="form-group" action="/teachers/{{$tutor->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</div>

@endsection
