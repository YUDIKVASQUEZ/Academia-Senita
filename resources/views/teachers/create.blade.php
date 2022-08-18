@extends('layouts.app_2')

@section('title', 'Añadir Docente')

@section('content')

    <div class="container2">
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-lg">
                <div class="form bg-light text-dark rounded">
                    <form action="/teachers" method="POST" class="mx-3 px-3 my-5 pt-2 pb-5" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        @foreach ($errors->all() as $alert)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                <li>{{$alert}}</li>
                                </ul>
                            </div>
                        @endforeach
                    @endif

                        <h2 class="text-center mt-5">Añadir nuevo Docente</h2>
                        <br>
                        <div class="form-group">
                            <label for="name">Nombre del Docente</label>
                            <input id="name" class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellido del Docente</label>
                            <input id="lastname" class="form-control" type="text" name="lastname">
                        </div>
                        <div class="form-group">
                            <label for="university_degree">Título Universitario</label>
                            <input id="university_degree" class="form-control" type="text" name="university_degree">
                        </div>
                        <div class="form-group">
                            <label for="age">Edad del Docente</label>
                            <input id="age" class="form-control" type="number" name="age">
                        </div>
                        <div class="form-group">
                            <label for="contract_date">Fecha del Contrato</label>
                            <input id="contract_date" class="form-control" type="date" name="contract_date">
                        </div>
                        <div class="form-group">
                            <label for="photo">Foto del Docente</label>
                            <input id="photo" class="" type="file" name="photo" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="identify_document">Cargue Documento de Identidad</label>
                            <input id="identify_document" class="" type="file" name="identify_document" accept="application/pdf">
                        </div>
                        <div class="button text-center">
                            <button class="btn btn-primary" type="submit">Crear Docente</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>



@endsection
