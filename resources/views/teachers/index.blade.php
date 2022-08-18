@extends('layouts.app_2')

@section('title', 'Lista Docentes')

@section('content')

    <h2 class="text-center mt-5 p-t5">Listado de Docentes</h2>

    {{-- Sirve para iterar arrays, Es decir nos permite realizar ciclos --}}
    <div class="row bg-light text-dark rounded mt-5 pt-3 mb-3 pb-3">
        @foreach ( $tutor as $professor)
        {{--  la doble llave sirve para interpolar, interpolar es traer una variable de otro lenguaje al lenguaje que se esta usando acutalmente --}}

            <div class="col-sm">
                <div class="card" style="width: 20rem;">
                    <img src="{{ Storage::url($professor->photo) }}" width="319" height="220" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-center"> {{$professor->name}} {{$professor->lastname}} </h5>
                        {{-- <p class="card-text"> <b>Contenido:</b> {{$tutor->description}} </p> --}}
                        {{-- <p class="card-text"> <b>Duración:</b> {{$tutor->duration}} Horas</p> --}}
                        <div class="text-center">
                            <a href="/teachers/{{$professor->id}}" class="btn btn-primary">Ver información</a>
                        </div>
                    </div>
                </div>
                <br>
            </div>

        @endforeach
    </div>

@endsection
