@extends('layouts.app')

@section('title', 'Accueil')

@section('style')
@parent
{{-- <link rel="stylesheet" href="{{ asset('special-style.css') }}"> --}}
@endsection

@section('script')
@parent
{{-- <script src="{{ asset('js/special-script.js') }}" defer></script>> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!-- 1ère colonne -->
        <div class="col-lg-5">
            <article>
                <h2>Test</h2>
                <p>
                    <img class="img-fluid" src="{{ asset('img/taylor-heery-pLQuWniq9kU-unsplash.jpg') }}" alt="">
                </p>
                <p>
                    Vous êtes sur la page de test.
                </p>
                <p>
                    {{ $message }}
                </p>
            </article>
        </div>
        <!-- 2ème colonne -->
        <div class="col-lg-5">
            <article>
                <h2>Test</h2>
                <p>
                    <img class="img-fluid" src="{{ asset('img/taylor-heery-pLQuWniq9kU-unsplash.jpg') }}" alt="">
                </p>
                <p>
                    Vous êtes sur la page de test.
                </p>
                <p>
                    {{ $message }}
                </p>
            </article>
        </div>
        <!-- 3ème colonne -->
        <div class="col-lg-2">
            <article>
                <h2>Test</h2>
                <p>
                    <img class="img-fluid" src="{{ asset('img/taylor-heery-pLQuWniq9kU-unsplash.jpg') }}" alt="">
                </p>
                <p>
                    Vous êtes sur la page de test.
                </p>
                <p>
                    {{ $message }}
                </p>
            </article>
        </div>
    </div>
</div>
@endsection