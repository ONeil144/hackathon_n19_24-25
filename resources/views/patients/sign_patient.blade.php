@extends('layouts.layout')

@section('title', 'Patient/ajout')

@section('content')

<!-- Conteneur principal -->
<div class="w3-container w3-padding-32" style="min-height: 80vh;">
    <div class="w3-card w3-white w3-padding-large w3-round w3-margin-top w3-margin-bottom" style="max-width: 600px; margin: auto;">
        <h2 class="w3-center">Ajouter un Patient</h2>

        <form action="" method="POST" class="w3-container" id="multiStepForm">
            @csrf

            <!-- Étape 1 -->
            <div id="etape1">
                <label class="w3-text-indigo"><b>Nom</b></label>
                <input class="w3-input w3-border w3-round required" type="text" name="nom" required>
                <label class="w3-text-indigo"><b>Prénom</b></label>
                <input class="w3-input w3-border w3-round required" type="text" name="prenom" required>
                <label class="w3-text-indigo"><b>Age</b></label>
                <input class="w3-input w3-border w3-round required" type="text" name="age" required>
                <label class="w3-text-indigo"><b>Email</b></label>
                <input class="w3-input w3-border w3-round required" type="email" name="email" required>

                <label class="w3-text-indigo"><b>Téléphone</b></label>
                <input class="w3-input w3-border w3-round required" type="phone" name="phone" required>

                <label class="w3-text-indigo"><b>Adresse</b></label>
                <input class="w3-input w3-border w3-round required" type="text" name="adresse" required>

                <label class="w3-text-indigo"><b>Ville</b></label>
                <input class="w3-input w3-border w3-round required" type="text" name="ville" required>

                <h2>Sexe</h2>
                <p>
                    <input class="w3-radio" type="radio" name="gender" value="masculin" checked>
                    <label>Masculin</label>
                </p>
                <p>
                    <input class="w3-radio" type="radio" name="gender" value="feminin">
                    <label>Féminin</label>
                </p>

                <label class="w3-text-indigo"><b>Nationalité</b></label>
                <select class="w3-select w3-border required" name="nationalite">
                    <option value="" disabled selected>Choisir</option>
                    <option value="1">Béninoise</option>
                    <option value="2">Togolaise</option>
                    <option value="3">Nigériane</option>
                </select>

                <button type="button" class="w3-button w3-indigo w3-margin-top w3-round" onclick="nextStep()">Suivant</button>
            </div>

            <!-- Étape 2 -->
            <div id="etape2" style="display: none;">
                <label class="w3-text-indigo"><b>Poids (kg)</b></label>
                <input class="w3-input w3-border w3-round required" type="number" name="poids" required>

                <label class="w3-text-indigo"><b>Taille (cm)</b></label>
                <input class="w3-input w3-border w3-round required" type="number" name="taille" required>

                <label class="w3-text-indigo"><b>Profession</b></label>
                <input class="w3-input w3-border w3-round required" type="text" name="profession" required>

                <label class="w3-text-indigo"><b>Groupe Sanguin</b></label>
                <select class="w3-select w3-border required" name="groupe_sanguin">
                    <option value="" disabled selected>Choisir</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>

                <label class="w3-text-indigo"><b>Stade MRC</b></label>
                <select class="w3-select w3-border required" name="stade_mrc">
                    <option value="" disabled selected>Choisir(NB: TFG = Taux de Filtration Glomérulaire en ml/min)</option>
                    <option value="Stade 1">Stade 1 : Maladie rénale chronique légère (TFG ≥ 90)</option>
                    <option value="Stade 2">Stade 2 : Maladie rénale chronique modérément légère (TFG 60-89)</option>
                    <option value="Stade 3">Stade 3 : Maladie rénale chronique modérée (TFG 30-59)</option>
                    <option value="Stade 4">Stade 4 : Maladie rénale chronique sévère (TFG 15-29)</option>
                    <option value="Stade 5">Stade 5 : Insuffisance rénale terminale (TFG < 15)</option>
                </select>

                <button type="button" class="w3-button w3-grey w3-margin-top w3-round" onclick="prevStep()">Retour</button>
                <button type="submit" class="w3-button w3-green w3-margin-top w3-round">Enregistrer</button>
            </div>

        </form>
    </div>
</div>

<script>
    function nextStep() {
        // Vérifier que tous les champs requis de l'étape 1 sont remplis
        let valid = true;
        document.querySelectorAll("#etape1 .required").forEach(function(input) {
            if (!input.value.trim()) {
                valid = false;
                input.classList.add("w3-border-red"); // Ajoute une bordure rouge si vide
            } else {
                input.classList.remove("w3-border-red");
            }
        });

        if (valid) {
            document.getElementById("etape1").style.display = "none";
            document.getElementById("etape2").style.display = "block";
        }
    }

    function prevStep() {
        document.getElementById("etape1").style.display = "block";
        document.getElementById("etape2").style.display = "none";
    }
</script>

@endsection

