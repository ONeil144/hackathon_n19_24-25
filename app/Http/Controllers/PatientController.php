<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Afficher la liste des patients
    public function index()
    {
        $patients = Patient::all(); // Récupérer tous les patients
        return view('patients.index', compact('patients'));
    }

    // Afficher le formulaire pour créer un nouveau patient
    public function create()
    {
        return view('patients.sign_patient');
    }

    // Sauvegarder un nouveau patient dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients',
            'phone' => 'required|string|max:15',
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès!');
    }

    // Afficher un patient spécifique
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    // Afficher le formulaire pour modifier un patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    // Mettre à jour un patient dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'required|string|max:15',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Patient modifié avec succès!');
    }

    // Supprimer un patient de la base de données
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès!');
    }
}
