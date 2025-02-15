@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Gestion des Ventes de Boissons</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Ajouter une boisson</h1>
        
        <form action="{{ route('boissons.store') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-600">Nom de la boisson</label>
                <input type="text" name="nom" id="nom" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Nom">
            </div>
            
            <!-- Type -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-600">Type de boisson</label>
                <input type="text" name="type" id="type" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Type">
            </div>

            <!-- Prix -->
            <div>
                <label for="prix" class="block text-sm font-medium text-gray-600">Prix</label>
                <input type="number" name="prix" id="prix" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Prix">
            </div>

            <!-- Stock -->
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-600">Stock</label>
                <input type="number" name="stock" id="stock" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Stock">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Ajouter</button>
        </form>
    </div>
@endsection
