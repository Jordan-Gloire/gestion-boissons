<!-- resources/views/ventes/show.blade.php -->

@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Gestion des Ventes de Boissons</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Détails de la Vente</h1>

        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-800">Boisson</h3>
            <p>{{ $vente->boisson->nom }} - {{ $vente->boisson->prix }}€</p>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-800">Quantité</h3>
            <p>{{ $vente->quantite }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-800">Total</h3>
            <p>{{ $vente->total }}€</p>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-800">Vendu par</h3>
            <p>{{ $vente->user->name }}</p> <!-- Affichage du nom de l'employé -->
        </div>

        <div class="mt-6">
            <a href="{{ route('ventes.index', ['userId' => $vente->user->id]) }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Retour aux ventes
            </a>
        </div>
    </div>
</div>
@endsection
