@extends('layouts.admin')

@section('title', 'Admin - Création réservation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin - Création réservation</h1>

            <form action="{{ route('admin.reservation.store') }}" method="post">
                @include('admin.reservation._form')
            </form>
        </div>
    </div>
</div>
@endsection