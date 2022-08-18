@extends('layouts.app_2')

@section('title', 'Editar Docente')

@section('content')

<div class="container2">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-lg">
            <div class="form bg-light text-dark rounded">
    <form action="/teachers/{{$tutor->id}}" method="POST" class="mx-3 px-3 my-5 pt-2 pb-5" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <h2 class="text-center mt-5"> Edición del Docente Agregado</h2>
            <br>
            <div class="form-group">
                <label for="name">Edita el nombre</label>
                <input id="name" class="form-control" type="text" name="name" value="{{$tutor->name}}">
            </div>
            <div class="form-group">
                <label for="lastname">Edita el Apellido</label>
                <input id="lastname" class="form-control" type="text" name="lastname" value="{{$tutor->lastname}}">
            </div>
            <div class="form-group">
                <label for="universiry_degree">Edita el Título Universitario</label>
                <input id="university_degree" class="form-control" type="text" name="university_degree" value="{{$tutor->university_degree}}">
            </div>
            <div class="form-group">
                <label for="age">Edita la Edad</label>
                <input id="age" class="form-control" type="text" name="age" value="{{$tutor->age}}">
            </div>
            <div class="form-group">
                <label for="contract_date">Edita la Fecha del Contrato</label>
                <input id="contract_date" class="form-control" type="date" name="contract_date" value="{{$tutor->contract_date}}">
            </div>
            <div class="form-group">
                <label for="photo">Edita la Foto</label>
                <br>
                <label for="photo"><img src="{{ Storage::url($tutor->photo) }}" width="80" height="80" class="mb-5"></label>
                <input id="photo" class="" type="file" name="photo" value="{{$tutor->photo}}" accept="image/*">
            </div>
            <div class="form-group">
                <label for="identify_document">Edita el Documento de Identidad</label>
                <br>
                <label for="identify_document"><iframe src="{{ Storage::url($tutor->identify_document) }}" width="100" height="100"></iframe></label>
                <input id="identify_document" class="form-control" type="file" name="identify_document" value="{{$tutor->identify_document}}" accept="application/pdf">
            </div>
            <div class="button text-center">
                <button class="btn btn-success" type="submit">Actualizar</button>
            </div>
        </form>
    </div>
</div>
<div class="col-sm">

</div>
</div>
</div>

@endsection
