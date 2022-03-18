@extends('layouts.app')

@section('title', 'Admin - Modification réservation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin - Modification réservation</h1>

            {{-- code utile pour débogger un formulaire et une validation qui ne fonctionnent pas correctement --}}
            {{--
            @if ($errors->any())
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif
            --}}

            <form action="{{ route('admin.reservation.update', ['id' => $reservation->id]) }}" method="post">
                @method('PUT')
                <div>
                    <input type="text" class="form-control" value="{{ $reservation->id }}" readonly>
                </div>
                @include('admin.reservation._form')
            </form>
        </div>
    </div>
</div>
@endsection