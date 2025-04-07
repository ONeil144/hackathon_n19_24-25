<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\PersonnelMedical;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
    * Afficher la liste des personnels médicaux.
    */
    public function index()
    {
        // Authorization check (if not already handled by middleware)
        if (Auth::user()->role !== 'administrateur') {
            abort(403, 'Unauthorized action.');
        }
        
        $users = User::all();

        return view('admin', compact('users'));
    }

    public function destroy(User $user)
    {
        // Authorization check (ensure admin, and possibly prevent deleting self)
        if (Auth::user()->role !== 'administrateur') {
            abort(403, 'Unauthorized action.');
        }
        if ($user->id === Auth::id()) {
             return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        try {
           
            $user->delete();
            return redirect()->route('dashboard')->with('success', 'Utilisateur supprimé avec succès.'); // Redirect to the admin panel route
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'utilisateur.');
        }
    }
}
