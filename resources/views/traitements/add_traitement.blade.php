@extends('layouts.layout')

@section('title', 'Traittement/ajout')
@section('content')

<header class="w3-container w3-padding w3-light-grey">
        <h1 class="w3-center">Enregistrement des Traitements</h1>
    </header>
    
    <div class="w3-content w3-padding">
        <form id="traitement-form" class="w3-container w3-padding w3-card">
            <h2 class="w3-center">Informations du Patient</h2>
            <p>
                <label for="nom-patient" class="w3-label">Nom du patient :</label>
                <input type="text" id="nom-patient" name="nom_patient" class="w3-input" required>
            </p>
            <p>
                <label for="prenom-patient" class="w3-label">Prénom du patient :</label>
                <input type="text" id="prenom-patient" name="prenom_patient" class="w3-input" required>
            </p>
            <p>
                <label for="date-naissance-patient" class="w3-label">Date de naissance du patient :</label>
                <input type="date" id="date-naissance-patient" name="date_naissance_patient" class="w3-input" required>
            </p>

            <h2 class="w3-center">Informations sur le Traitement</h2>
            <p>
                <label for="nom-traitement" class="w3-label">Nom du traitement :</label>
                <input type="text" id="nom-traitement" name="nom_traitement" class="w3-input" required>
            </p>
            <p>
                <label for="description-traitement" class="w3-label">Description du traitement :</label>
                <textarea id="description-traitement" name="description_traitement" class="w3-input" required></textarea>
            </p>
            <p>
                <label for="date-debut-traitement" class="w3-label">Date de début :</label>
                <input type="date" id="date-debut-traitement" name="date_debut_traitement" class="w3-input" required>
            </p>
            <p>
                <label for="date-fin-traitement" class="w3-label">Date de fin :</label>
                <input type="date" id="date-fin-traitement" name="date_fin_traitement" class="w3-input" required>
            </p>

            <h2 class="w3-center">Médicaments Prescrits</h2>
            <div id="medicaments-list">
                <div class="medicament-entry">
                    <p>
                        <label class="w3-label">Nom du médicament :</label>
                        <input type="text" name="medicament[]" class="w3-input" required>
                    </p>
                    <p>
                        <label class="w3-label">Dosage :</label>
                        <input type="text" name="dose[]" class="w3-input" required>
                    </p>
                </div>
            </div>
            <button type="button" id="add-medicament" class="w3-button w3-green w3-margin-top">Ajouter un médicament</button>

            <button type="submit" class="w3-button w3-blue w3-margin-top w3-block">Enregistrer les informations</button>
        </form>
    </div>

    <script>
        document.getElementById("add-medicament").addEventListener("click", function() {
            let medicamentsList = document.getElementById("medicaments-list");

            let newEntry = document.createElement("div");
            newEntry.classList.add("medicament-entry");
            newEntry.innerHTML = `
                <p>
                    <label class="w3-label">Nom du médicament :</label>
                    <input type="text" name="medicament[]" class="w3-input" required>
                </p>
                <p>
                    <label class="w3-label">Dosage :</label>
                    <input type="text" name="dose[]" class="w3-input" required>
                </p>
            `;
            medicamentsList.appendChild(newEntry);
        });

        document.getElementById("traitement-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche l'envoi du formulaire pour test
            alert("Traitement enregistré avec succès !");
        });
    </script>
@endsection