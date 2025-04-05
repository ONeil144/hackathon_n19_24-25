<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Nom -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Prénom -->
        <div class="mt-4">
            <x-input-label for="prenom" :value="__('Prénom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation mot de passe -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Rôle -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Rôle')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="">-- Sélectionner un rôle --</option>
                <option value="administrateur" {{ old('role') == 'administrateur' ? 'selected' : '' }}>Administrateur</option>
                <option value="personnel_medical" {{ old('role') == 'personnel_medical' ? 'selected' : '' }}>Personnel médical</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Spécialité (affichée uniquement si personnel médical) -->
        <div class="mt-4" id="specialite-container" style="display: none;">
            <x-input-label for="specialite" :value="__('Spécialité')" />
            <x-text-input id="specialite" class="block mt-1 w-full" type="text" name="specialite" :value="old('specialite')" />
            <x-input-error :messages="$errors->get('specialite')" class="mt-2" />
        </div>

        <!-- Avatar (optionnel) -->
        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar (optionnel)')" />
            <input type="file" id="avatar" name="avatar" class="block mt-1 w-full" accept="image/*" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script pour afficher la spécialité uniquement si personnel médical -->
    <script>
        const roleSelect = document.getElementById('role');
        const specialiteContainer = document.getElementById('specialite-container');

        function toggleSpecialite() {
            if (roleSelect.value === 'personnel_medical') {
                specialiteContainer.style.display = 'block';
            } else {
                specialiteContainer.style.display = 'none';
            }
        }

        // Initialisation
        toggleSpecialite();
        roleSelect.addEventListener('change', toggleSpecialite);
    </script>
</x-guest-layout>
