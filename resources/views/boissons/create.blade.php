@extends('layouts.app')

@section('content')
    <h1>Ajouter une boisson</h1>
    <form action="{{ route('boissons.store') }}" method="POST">
        @csrf
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="type" placeholder="Type">
        <input type="number" name="prix" placeholder="Prix">
        <input type="number" name="stock" placeholder="Stock">
        <button type="submit">Ajouter</button>
    </form>
@endsection
