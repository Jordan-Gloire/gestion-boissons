@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Gestion des Ventes de Boissons</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-6">
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">🍹 Liste des Boissons</h1>

        <!-- Bouton d'ajout -->
        <div class="mb-4 text-right ">
            <a href="{{ route('boissons.create') }}" class="px-6  py-3 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white font-semibold rounded-lg shadow-lg transform hover:scale-105 hover:shadow-xl transition duration-300 ease-in-out">
                <i class="fas fa-plus-circle"></i> Ajouter une boisson
            </a>            
        </div>

        <!-- Liste des boissons -->
        <ul class="space-y-4">
            @foreach ($boissons as $boisson)
                <li class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow">
                    <div class="flex items-center space-x-4">
                        <!-- Icône selon le type -->
                        <span class="text-2xl">
                            @if ($boisson->type == 'soda') 🥤
                            @elseif ($boisson->type == 'vin') 🍷
                            @elseif ($boisson->type == 'bière') 🍺
                            @else 🥛 @endif
                        </span>
        
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $boisson->nom }}</h2>
                            <p class="text-gray-600 dark:text-gray-400">{{ number_format($boisson->prix) }} frs</p>
                            <!-- Ajout du stock et type -->
                            <p class="text-gray-600 dark:text-gray-400">Stock: {{ $boisson->stock }}</p>
                            <p class="text-gray-600 dark:text-gray-400">Type: {{ ucfirst($boisson->type) }}</p>
                        </div>
                    </div>
        
                    <!-- Boutons d'actions -->
                    <div class="space-x-2">
                        <a href="{{ route('boissons.edit', $boisson) }}" class="text-green-500 hover:text-green-700">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('boissons.destroy', $boisson) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        
    </div>
</div>
@endsection
