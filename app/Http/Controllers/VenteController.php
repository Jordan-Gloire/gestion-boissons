<?php


// app/Http/Controllers/VenteController.php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\User;
use App\Models\Boisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



// class VenteController extends Controller
// {
//     /**
//      * Afficher toutes les ventes effectuées par un employé.
//      */
//     public function index($userId)
//     {
//         // Récupérer toutes les ventes de l'employé spécifié
//         $ventes = Vente::where('user_id', $userId)
//                     ->with('boisson') // Charger les informations sur la boisson
//                     ->get();

//         // Retourner les ventes dans la vue
//         return view('ventes.index', compact('ventes'));
//     }

//     /**
//      * Enregistrer une nouvelle vente.
//      */
//     public function store(Request $request)
//     {
//         // Validation des données du formulaire
//         $request->validate([
//             'boisson_id' => 'required|exists:boissons,id',
//             'quantite' => 'required|integer|min:1',
//         ]);

//         // Trouver la boisson sélectionnée
//         $boisson = Boisson::findOrFail($request->boisson_id);

//         // Calcul du total de la vente
//         $total = $boisson->prix * $request->quantite;

//         // Créer la vente
//         $vente = Vente::create([
//             'user_id' => Auth::user()->id, // Utiliser l'utilisateur authentifié
//             'boisson_id' => $boisson->id,
//             'quantite' => $request->quantite,
//             'total' => $total,
//         ]);

//         // Rediriger avec un message de succès
//         return redirect()->route('ventes.index', ['userId' => Auth::user()->id])
//                          ->with('success', 'Vente enregistrée avec succès!');
//     }

//     /**
//      * Afficher les détails d'une vente spécifique.
//      */
//     public function show($id)
//     {
//         // Trouver la vente avec l'ID spécifié
//         $vente = Vente::with('boisson', 'user') // Charger les informations sur la boisson et l'utilisateur
//                         ->findOrFail($id);

//         // Retourner les détails de la vente dans une vue
//         return view('ventes.show', compact('vente'));
//     }
// }



class VenteController extends Controller
{
    /**
     * Afficher toutes les ventes effectuées par un employé.
     */
    public function index($userId)
    {
        // Récupérer toutes les ventes de l'employé spécifié
        $ventes = Vente::where('user_id', $userId)
            ->with('boisson') // Charger les informations sur la boisson
            ->paginate(10);  // Pagination pour éviter trop de résultats à afficher

        // Retourner les ventes dans la vue
        return view('ventes.index', compact('ventes'));
    }

    /**
     * Afficher le formulaire pour enregistrer une nouvelle vente.
     */
    public function create()
    {
        // Récupérer toutes les boissons disponibles
        $boissons = Boisson::all();

        // Retourner la vue pour ajouter une vente
        return view('ventes.create', compact('boissons'));
    }

    /**
     * Enregistrer une nouvelle vente.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'boisson_id' => 'required|exists:boissons,id',
            'quantite' => 'required|integer|min:1',
        ], [
            'boisson_id.required' => 'Veuillez sélectionner une boisson.',
            'boisson_id.exists' => 'La boisson sélectionnée n\'existe pas.',
            'quantite.required' => 'Veuillez saisir une quantité.',
            'quantite.integer' => 'La quantité doit être un nombre entier.',
            'quantite.min' => 'La quantité doit être supérieure ou égale à 1.',
        ]);

        // Trouver la boisson sélectionnée
        $boisson = Boisson::findOrFail($request->boisson_id);

        // Calcul du total de la vente
        $total = $boisson->prix * $request->quantite;

        // Créer la vente
        $vente = Vente::create([
            'user_id' => Auth::user()->id, // Utiliser l'utilisateur authentifié
            'boisson_id' => $boisson->id,
            'quantite' => $request->quantite,
            'total' => $total,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('ventes.index', ['userId' => Auth::user()->id])
            ->with('success', 'Vente enregistrée avec succès!');
    }

    /**
     * Afficher les détails d'une vente spécifique.
     */
    public function show($id)
    {
        // Trouver la vente avec l'ID spécifié
        $vente = Vente::with('boisson', 'user') // Charger les informations sur la boisson et l'utilisateur
            ->findOrFail($id);

        // Retourner les détails de la vente dans une vue
        return view('ventes.show', compact('vente'));
    }

    /**
     * Modifier une vente (si nécessaire).
     */
    public function edit($id)
    {
        // Trouver la vente
        $vente = Vente::findOrFail($id);
        $boissons = Boisson::all();

        // Retourner la vue d'édition de vente
        return view('ventes.edit', compact('vente', 'boissons'));
    }

    /**
     * Mettre à jour une vente existante.
     */
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'boisson_id' => 'required|exists:boissons,id',
            'quantite' => 'required|integer|min:1',
        ], [
            'boisson_id.required' => 'Veuillez sélectionner une boisson.',
            'boisson_id.exists' => 'La boisson sélectionnée n\'existe pas.',
            'quantite.required' => 'Veuillez saisir une quantité.',
            'quantite.integer' => 'La quantité doit être un nombre entier.',
            'quantite.min' => 'La quantité doit être supérieure ou égale à 1.',
        ]);

        // Trouver la vente à modifier
        $vente = Vente::findOrFail($id);

        // Trouver la boisson sélectionnée
        $boisson = Boisson::findOrFail($request->boisson_id);

        // Calcul du nouveau total
        $total = $boisson->prix * $request->quantite;

        // Mettre à jour la vente
        $vente->update([
            'boisson_id' => $boisson->id,
            'quantite' => $request->quantite,
            'total' => $total,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('ventes.index', ['userId' => Auth::user()->id])
            ->with('success', 'Vente mise à jour avec succès!');
    }

    /**
     * Supprimer une vente.
     */
    public function destroy($id)
    {
        // Trouver et supprimer la vente
        $vente = Vente::findOrFail($id);
        $vente->delete();

        // Rediriger avec un message de succès
        return redirect()->route('ventes.index', ['userId' => Auth::user()->id])
            ->with('success', 'Vente supprimée avec succès!');
    }
}
