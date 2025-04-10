<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $personnels = User::where('role', 'personnel_medical')
                          ->with('personnelMedical')
                          ->get();
        
        return view('dashboard', compact('personnels'));
    }

    public function updateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $id,
        'specialite' => 'nullable|string'
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'prenom' => $request->prenom,
        'email' => $request->email,
    ]);

    if ($user->role === 'personnel_medical') {
        // Vérifie si la relation existe déjà
        if ($user->personnelMedical) {
            $user->personnelMedical->update([
                'specialite' => $request->specialite
            ]);
        } else {
            PersonnelMedical::create([
                'user_id' => $user->id,
                'specialite' => $request->specialite
            ]);
        }
    }

    return redirect()->route('dashboard')->with('success', 'Utilisateur mis à jour avec succès');
}

// supprimer un utilisateur

public function deleteUser($id)
{
    // Trouver l'utilisateur par son ID
    $personnel = User::find($id);

    if ($personnel) {
        // Supprimer l'utilisateur
        $personnel->delete();

        // Rediriger avec un message de succès
        return redirect()->route('dashboard')->with('success', 'Utilisateur supprimé avec succès.');
    }

    // Si l'utilisateur n'est pas trouvé, rediriger avec un message d'erreur
    return redirect()->route('dashboard')->with('error', 'Utilisateur non trouvé.');
}


}
