<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PersonnelMedical;
use App\Models\DossierMedical;
use App\Http\Controllers\Controller;

use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller {
    public function create()
    {
        $patients = Patient::all();
        $personnels = PersonnelMedical::all();
        $dossiers = DossierMedical::all();

        return view('examens.create', compact('patients', 'personnels', 'dossiers'));
    }

    //liste des examens 

    public function index()
{
    // Récupérer tous les examens
    $examens = Examen::all();

    // Retourner la vue avec les examens
    return view('examens.index', compact('examens'));
}



public function store(Request $request)
{
    $data = $request->validate([
        'patients_id' => 'required|exists:patients,id',
        'personnel_medical_id' => 'required|exists:personnel_medical,id',
        'dossier_medical_id' => 'required|exists:dossier_medicals,id',
        'type_examen' => 'required|string',
        'categorie' => 'nullable|string',
        'code_loinc' => 'nullable|string',
        'nom_laboratoire' => 'nullable|string',
        'plage_reference' => 'nullable|string',
        'valeur_critique' => 'nullable|string',
        'valeur_obtenue' => 'nullable|string',
        'fichier_resultat' => 'nullable|file|mimes:pdf,jpg,png,jpeg',
    ]);

    // Upload fichier si présent
    if ($request->hasFile('fichier_resultat')) {
        $data['fichier_resultat'] = $request->file('fichier_resultat')->store('examens', 'public');
    }

    $data['statut_validation'] = 'en attente'; // par défaut

    Examen::create($data);

    return redirect()->route('examens.create')->with('success', 'Examen enregistré avec succès');
}

// Méthode pour afficher le formulaire de modification
public function edit($id)
{
    // Récupérer l'examen avec l'id donné
    $examen = Examen::findOrFail($id);

    // Retourner la vue de modification avec l'examen à modifier
    return view('examens.edit', compact('examen'));
}

// Méthode pour mettre à jour l'examen
public function update(Request $request, $id)
{
    // Valider les données envoyées
    $validatedData = $request->validate([
        'exam_code' => 'required|string|max:255',
        'exam_name' => 'required|string|max:255',
        'exam_date' => 'required|date',
        'exam_type' => 'required|string|max:255',
        'exam_description' => 'nullable|string|max:1000',
    ]);

    // Récupérer l'examen à modifier
    $examen = Examen::findOrFail($id);

    // Mettre à jour les données
    $examen->update($validatedData);

    // Rediriger avec un message de succès
    return redirect()->route('examens.index')->with('success', 'Examen mis à jour avec succès.');
}

// Méthode pour supprimer un examen
public function destroy($id)
{
    // Récupérer l'examen à supprimer
    $examen = Examen::findOrFail($id);

    // Supprimer l'examen
    $examen->delete();

    // Rediriger avec un message de succès
    return redirect()->route('examens.index')->with('success', 'Examen supprimé avec succès.');
}


}
