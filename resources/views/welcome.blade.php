<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Gestion des Ventes de Boissons</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="bg-gray-50">

    <!-- Barre de navigation fixée en haut -->
    <nav class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <a href="/" class="text-xl font-bold text-blue-600">Gestion des Ventes de Boissons</a>
            </div>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold px-4 py-2">Tableau de Bord</a>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold px-4 py-2">Se Connecter</a>
                        <a href="{{ route('register') }}" class="text-blue-600 font-semibold px-4 py-2">S'inscrire</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- En-tête avec un peu de marge pour le contenu en dessous de la barre de navigation -->
    <header class="relative bg-blue-600 text-white py-40 mt-20"
        style="background-image: url('{{ asset('/home.jpg') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Filtre noir transparent -->
        <div class="container mx-auto text-center relative z-10">
            <h1 class="text-4xl font-bold">Système de Gestion des Ventes de Boissons</h1>
            <p class="mt-2 text-lg">Gérez vos produits et suivez les ventes facilement</p>
        </div>
    </header>



    <!-- Section de Présentation -->
    <section class="my-12 text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold text-blue-600">Pourquoi Choisir Notre Système ?</h2>
            <p class="mt-4 text-lg">Notre système vous permet de gérer efficacement vos ventes, vos stocks de boissons,
                et d'offrir différents modes de paiement aux clients.</p>
        </div>
    </section>

    <!-- Fonctionnalités principales -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gestion des Produits -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-box text-4xl text-blue-600"></i> <!-- Icône des produits -->
                <h3 class="text-xl font-semibold text-blue-600 mt-4">Gestion des Produits</h3>
                <p class="mt-2">Ajoutez, modifiez et gérez vos boissons avec des informations détaillées.</p>
            </div>

            <!-- Gestion des Stocks -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-cogs text-4xl text-blue-600"></i> <!-- Icône des stocks -->
                <h3 class="text-xl font-semibold text-blue-600 mt-4">Gestion des Stocks</h3>
                <p class="mt-2">Suivez la disponibilité de chaque produit pour éviter les ruptures de stock.</p>
            </div>

            <!-- Suivi des Ventes -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <i class="fas fa-chart-line text-4xl text-blue-600"></i> <!-- Icône du suivi des ventes -->
                <h3 class="text-xl font-semibold text-blue-600 mt-4">Suivi des Ventes</h3>
                <p class="mt-2">Suivez toutes les ventes réalisées, et attribuez-les à chaque employé pour un suivi précis.</p>
            </div>
        </div>
    </div>
</section>


    <!-- Appel à l'action / Connexion -->
    <section class="py-12 bg-blue-600 text-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold">Prêt à Gérer Vos Ventes ?</h2>
            <p class="mt-4">Connectez-vous à votre compte pour commencer à gérer vos boissons et suivre les ventes.
            </p>
            <div class="mt-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="bg-white text-blue-600 py-2 px-6 rounded-lg text-xl">Accédez au Tableau de Bord</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white text-blue-600 py-2 px-6 rounded-lg text-xl">Se
                            Connecter</a>
                        <span class="mx-4">ou</span>
                        <a href="{{ route('register') }}"
                            class="bg-white text-blue-600 py-2 px-6 rounded-lg text-xl">S'inscrire</a>
                    @endauth
                @endif
            </div>
        </div>
    </section>

    <!-- Pied de page -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Gestion des Ventes de Boissons - Tous droits réservés</p>
        </div>
    </footer>

</body>

</html>
