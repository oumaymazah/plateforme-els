<?php
//code jdid

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    // Afficher la liste des formations
    public function index()
    {
        $formations = Formation::all();
        return view('admin.apps.formation.formations', compact('formations'));
    }

    // Afficher le formulaire de création avec la liste des professeurs
    public function create()
    {
        $categories = Categorie::all();
        $professeurs = User::whereHas('roles', function ($query) {
            $query->where('name', 'professeur');
        })->pluck('name', 'id'); // Récupérer ID et nom des professeurs

        return view('admin.apps.formation.formationcreate', compact('categories', 'professeurs'));
    }

    // Enregistrer une nouvelle formation et l'assigner à un professeur
        public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|date_format:H:i',
            'type' => 'required|string',
            'prix' => 'required|numeric|regex:/^\d+(\.\d{1,3})?/',
            'categorie_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id', // Validation de l'ID professeur
        ]);



        // Création de la formation liée au professeur sélectionné
        Formation::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'duree' => $request->duree,
            'type' => $request->type,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
            'user_id' => $request->user_id, // Correction ici
        ]);

        session()->flash('success', 'Formation créée avec succès !');
        return redirect()->route('formations');
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        $categories = Categorie::all();
        $professeurs = User::whereHas('roles', function ($query) {
            $query->where('name', 'professeur');
        })->pluck('name', 'id');

        return view('admin.apps.formation.formationedit', compact('formation', 'categories', 'professeurs'));
    }

    // Mettre à jour une formation
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|date_format:H:i',
            'type' => 'required|string',
            'prix' => 'required|numeric|regex:/^\d+(\.\d{1,2})?/',
            'categorie_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $formation = Formation::findOrFail($id);

        // Vérifier que l'utilisateur sélectionné est bien un professeur
        $professeur = User::whereHas('roles', function ($query) {
            $query->where('name', 'professeur');
        })->findOrFail($request->user_id);

        $formation->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'duree' => $request->duree,
            'type' => $request->type,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
            'user_id' => $request->user->id,
        ]);

        return redirect()->route('formations')->with('success', 'Formation mise à jour avec succès.');
    }

    // Supprimer une formation
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);
        $formation->delete();
        return redirect()->route('formations')->with('delete', 'Formation supprimée avec succès.');
    }
}
