<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\User;
use App\Models\Formation;
use Illuminate\Http\Request;

class CoursController extends Controller
{

    public function index()
    {
        $cours = Cours::with('formation')->get();
        return view('admin.apps.cours.cours', compact('cours'));
    }

    public function create()
    {
        $formations = Formation::all();
        return view('admin.apps.cours.courscreate', compact( 'formations'));
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'formation_id' => 'required|exists:formations,id',
        ]);

        Cours::create($request->all());


        return redirect()->route('cours')->with('success', 'Cours ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un cours.
     */
    public function show($id)
    {
        $cours = Cours::with('formation')->findOrFail($id);
        return view('admin.apps.cours.coursshow', compact('cours'));
    }

    /**
     * Afficher le formulaire d'édition d'un cours.
     */
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        // $users = User::all();
        $formations = Formation::all();
        return view('admin.apps.cours.coursedit', compact('cours', 'formations'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'formation_id' => 'required|exists:formations,id',
        ]);

        $cours = Cours::findOrFail($id);
        $cours->update($request->all());
        // return redirect()->route('coursupdate', ['id' => $cours->id])->with('success', 'Cours mis à jour avec succès.');


        return redirect()->route('cours')->with('success', 'Cours mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('cours')->with('delete', 'Cours supprimé avec succès.');
    }
}
