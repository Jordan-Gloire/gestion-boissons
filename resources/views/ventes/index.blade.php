<!-- resources/views/ventes/index.blade.php -->

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
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Ventes effectuées par l'employé</h1>

            <!-- Affichage d'un message de succès -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table des ventes -->
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-gray-600">Boisson</th>
                        <th class="py-3 px-6 text-left text-gray-600">Quantité</th>
                        <th class="py-3 px-6 text-left text-gray-600">Total</th>
                        <th class="py-3 px-6 text-left text-gray-600">Date</th>
                        <th class="py-3 px-6 text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventes as $vente)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-4 px-6">{{ $vente->boisson->nom }}</td>
                            <td class="py-4 px-6">{{ $vente->quantite }}</td>
                            <td class="py-4 px-6">{{ $vente->total }}€</td>
                            <td class="py-4 px-6">{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('ventes.show', $vente->id) }}" class="text-blue-600 hover:underline">Détails</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Bouton pour ajouter une nouvelle vente -->
            <div class="mt-6 text-right">
                    <a href="{{ route('ventes.create') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700">
                        Ajouter une vente
                    </a>
            </div>
        </div>
    </div>
@endsection
