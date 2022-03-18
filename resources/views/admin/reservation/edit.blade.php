@extends('layouts.admin')

@section('title', 'Admin - Modification réservation')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Admin - Modification réservation</h1>

            <form action="{{ route('admin.reservation.update', ['id' => $data['id']]) }}" method="post">
                @method('PUT')
                <div>
                    <input type="text" class="form-control" value="{{ $data['id'] }}" readonly>
                </div>
                @include('admin.reservation._form')
            </form>
        </div>
    </div>
</div>
@endsection