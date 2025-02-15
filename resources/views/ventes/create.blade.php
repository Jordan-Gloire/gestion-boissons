<!-- resources/views/ventes/create.blade.php -->

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
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Enregistrer une nouvelle vente</h1>

            <!-- Message de succès -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('ventes.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <!-- Sélection de la boisson -->
                    <div>
                        <label for="boisson_id" class="block text-sm font-medium text-gray-700">Boisson</label>
                        <select id="boisson_id" name="boisson_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            @foreach($boissons as $boisson)
                                <option value="{{ $boisson->id }}">{{ $boisson->nom }} - {{ $boisson->prix }}€</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantité -->
                    <div>
                        <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité</label>
                        <input type="number" name="quantite" id="quantite" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required min="1">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="mt-4 inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700">
                            Enregistrer la vente
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
