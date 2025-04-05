<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authentifier l'utilisateur
        $request->authenticate();
    
        // Régénérer la session pour éviter les attaques de fixation de session
        $request->session()->regenerate();
    
        // Vérification du rôle de l'utilisateur pour la redirection
        if (Auth::check()) {
            if (Auth::user()->role === 'administrateur') {
                // Si l'utilisateur est un administrateur, rediriger vers le dashboard administrateur
                return redirect()->route('dashboard');
            }
    
            // Si l'utilisateur est un membre du personnel, rediriger vers leur tableau de bord
            return redirect()->route('dashboard_personnel');
        }
    
        // Si l'utilisateur n'est pas authentifié, rediriger vers la page de connexion
        return redirect()->route('login')->with('error', 'Veuillez vous connecter');
    }
    
    /**


     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
