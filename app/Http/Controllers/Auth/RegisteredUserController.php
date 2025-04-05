<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PersonnelMedical;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validation complète des champs du formulaire
        $validated = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'prenom'     => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role'       => ['required', 'in:administrateur,personnel_medical'],
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar'     => ['nullable', 'image', 'max:2048'],
            'specialite' => ['nullable', 'string', 'max:255'],
        ]);

        // Générer un code personnel unique
        do {
            $codePersonnel = Str::upper(Str::random(8));
        } while (User::where('code_personnel', $codePersonnel)->exists());

        // Gestion de l'avatar
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // Création de l'utilisateur avec les champs correspondants
        $user = User::create([
            'name'           => $validated['name'],
            'prenom'         => $validated['prenom'],
            'email'          => $validated['email'],
            'role'           => $validated['role'],
            'code_personnel' => $codePersonnel,
            'avatar'         => $avatarPath,
            'password'       => Hash::make($validated['password']),
        ]);

        // Créer une entrée dans personnel_medical si applicable
        if ($validated['role'] === 'personnel_medical') {
            PersonnelMedical::create([
                'users_id'   => $user->id,
                'specialite' => $validated['specialite'] ?? null,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // Redirection selon le rôle
        return match ($user->role) {
            'administrateur'      => redirect()->route('dashboard'),
            'personnel_medical'   => redirect()->route('dashboard_personnel'),
            default               => redirect('/'),
        };
    }
}