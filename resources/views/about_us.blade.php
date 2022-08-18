@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')

    <div class="bg-light text-dark rounded mt-5 pt-3 mb-3 pb-3">
        <p class="mt-1 pt-1">
            <h3 class="text-center">¿Quiénes somos?</h3>
        </p>
        <div class="text-start col-sm">
            <p class="mx-5 my-5 mb-5">
                YK PROGRAMING Es una escula en linea que te ofrece los mejores profesores,
                que en su área son los más expertos y en los temas de selección, además contamos
                con una gran variedad de precios que son favorables para todos.
                <br>
                Tenemos una larga trayectoria a nivel nacional, siendo los mejores en nuestra labor.
                <br><br>
                ¿Qúe esperas para contactarnos?
            </p>
        </div>
        <div class="social-media col-sm">
            <h4 class="text-center">Contáctenos:</h4>
            <div class="text-center">
                <a class="navbar-brand text-white" href="https://web.facebook.com/?_rdc=1&_rdr">
                    <img src= {{ asset('facebook.png') }} width="32" height="32" alt="" >
                </a>
                <a class="navbar-brand text-white" href="https://www.instagram.com/">
                    <img src= {{ asset('instagram.png') }} width="32" height="32" alt="" >
                </a>
                <a class="navbar-brand text-white" href="https://www.youtube.com/">
                    <img src= {{ asset('youtube.png') }} width="32" height="32" alt="" >
                </a>
            </div>
        </div>
    </div>

@endsection
