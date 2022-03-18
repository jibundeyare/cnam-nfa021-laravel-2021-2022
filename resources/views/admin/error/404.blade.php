@extends('layouts.app')

@section('title', 'Admin - Erreur 404 Non trouvé')

@section('content')
<h1>Admin - Erreur 404 Non trouvé</h1>
@if ($message)
<p>{{ $message }}</p>
@endif
<p>Désolé :(</p>
@endsection