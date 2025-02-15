<?php

namespace App\Http\Controllers;

use App\Models\Boisson;
use Illuminate\Http\Request;

// class BoissonController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }

class BoissonController extends Controller
{
    // public function index()
    // {
    //     $boissons = Boisson::all();
    //     return view('dashboard', compact('boissons')); // Remplacer 'boissons.index' par 'dashboard'
    // }
    public function index()
    {
        $boissons = Boisson::all();
        return view('dashboard', compact('boissons'));  // Assure-toi que 'dashboard' est bien la bonne vue
    }


    public function create()
    {
        return view('boissons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        Boisson::create($request->all());

        return redirect()->route('boissons.index')->with('success', 'Boisson ajoutée avec succès.');
    }

    public function show(Boisson $boisson)
    {
        return view('boissons.show', compact('boisson'));
    }

    public function edit(Boisson $boisson)
    {
        return view('boissons.edit', compact('boisson'));
    }

    public function update(Request $request, Boisson $boisson)
    {
        $request->validate([
            'nom' => 'string|max:255',
            'type' => 'string|max:255',
            'prix' => 'numeric|min:0',
            'stock' => 'integer|min:0'
        ]);

        $boisson->update($request->all());

        return redirect()->route('boissons.index')->with('success', 'Boisson mise à jour.');
    }

    public function destroy(Boisson $boisson)
    {
        $boisson->delete();
        return redirect()->route('boissons.index')->with('success', 'Boisson supprimée.');
    }
}
