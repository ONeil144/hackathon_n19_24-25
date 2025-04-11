@extends('layouts.layout')

@section('title', 'Ajouter un Examen')

@section('content')
<div class="w3-container w3-padding-16">
    <h2 class="w3-center w3-text-blue">Enregistrer un Examen</h2>
    
    <!-- Formulaire d'ajout d'examen -->
    <div class="w3-card-4 w3-margin-top w3-padding-32 w3-light-grey w3-round-large">
        <form action="{{ route('examens.store') }}" method="POST" class="w3-container">
            @csrf

            <!-- Affichage des erreurs -->
            @if ($errors->any())
                <div class="w3-panel w3-red">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Code de l'examen -->
            <p>
                <label for="exam_code">Code de l'Examen</label>
                <input class="w3-input w3-border w3-round" type="text" name="exam_code" id="exam_code" value="{{ old('exam_code') }}" placeholder="Entrez le code de l'examen">
            </p>

            <!-- Nom de l'examen -->
            <p>
                <label for="exam_name">Nom de l'Examen</label>
                <input class="w3-input w3-border w3-round" type="text" name="exam_name" id="exam_name" value="{{ old('exam_name') }}" placeholder="Entrez le nom de l'examen">
            </p>

            <!-- Date de l'examen -->
            <p>
                <label for="exam_date">Date de l'Examen</label>
                <input class="w3-input w3-border w3-round" type="date" name="exam_date" id="exam_date" value="{{ old('exam_date') }}">
            </p>

            <!-- Type d'examen -->
            <p>
                <label for="type_examen">Type d'Examen</label>
                <select class="w3-select w3-border w3-round" name="type_examen" id="type_examen">
                    <option value="" disabled selected>Choisir le type d'examen</option>
                    <option value="Laboratoire" {{ old('type_examen') == 'Laboratoire' ? 'selected' : '' }}>Laboratoire</option>
                    <option value="Imagerie" {{ old('type_examen') == 'Imagerie' ? 'selected' : '' }}>Imagerie</option>
                    <option value="Consultation" {{ old('type_examen') == 'Consultation' ? 'selected' : '' }}>Consultation</option>
                </select>
            </p>

            <!-- Patient -->
            <p>
                <label for="patients_id">Patient</label>
                <select class="w3-select w3-border w3-round" name="patients_id" id="patients_id">
                    <option value="" disabled selected>Choisir un patient</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patients_id') == $patient->id ? 'selected' : '' }}>
                            {{ $patient->nom }} {{ $patient->prenom }}
                        </option>
                    @endforeach
                </select>
            </p>

            <!-- Personnel médical -->
            <p>
                <label for="personnel_medical_id">Personnel Médical</label>
                <select class="w3-select w3-border w3-round" name="personnel_medical_id" id="personnel_medical_id">
                    <option value="" disabled selected>Choisir le personnel médical</option>
                    @foreach($personnels as $personnel)
                        <option value="{{ $personnel->id }}" {{ old('personnel_medical_id') == $personnel->id ? 'selected' : '' }}>
                            {{ $personnel->specialite }} {{ $personnel->prenom }}
                        </option>
                    @endforeach
                </select>
            </p>

            <!-- Dossier médical -->
            <p>
                <label for="dossier_medical_id">Dossier Médical</label>
                <select class="w3-select w3-border w3-round" name="dossier_medical_id" id="dossier_medical_id">
                    <option value="" disabled selected>Choisir le dossier médical</option>
                    @foreach($dossiers as $dossier)
                        <option value="{{ $dossier->id }}" {{ old('dossier_medical_id') == $dossier->id ? 'selected' : '' }}>
                            Dossier #{{ $dossier->id }}
                        </option>
                    @endforeach
                </select>
            </p>

            <!-- Description de l'examen -->
            <p>
                <label for="exam_description">Description</label>
                <textarea class="w3-input w3-border w3-round" name="exam_description" id="exam_description" placeholder="Entrez une brève description de l'examen">{{ old('exam_description') }}</textarea>
            </p>

            <!-- Bouton d'enregistrement -->
            <button class="w3-btn w3-blue w3-round-large w3-block w3-margin-top">Enregistrer l'Examen</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Vous pouvez ajouter ici des scripts personnalisés pour des interactions supplémentaires si nécessaire
</script>
@endsection
