@extends('layouts.layout')

@section('title', 'Modifier l\'Examen')

@section('content')
<div class="w3-container w3-padding-16">
    <h2 class="w3-center w3-text-blue">Modifier l'Examen</h2>
    
    <!-- Formulaire de modification de l'examen -->
    <div class="w3-card-4 w3-margin-top w3-padding-32 w3-light-grey w3-round-large">
        <form action="{{ route('examens.update', $examen->id) }}" method="POST" class="w3-container">
            @csrf
            @method('PUT')

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
                <input class="w3-input w3-border w3-round" type="text" name="exam_code" id="exam_code" value="{{ old('exam_code', $examen->exam_code) }}" placeholder="Entrez le code de l'examen">
            </p>

            <!-- Nom de l'examen -->
            <p>
                <label for="exam_name">Nom de l'Examen</label>
                <input class="w3-input w3-border w3-round" type="text" name="exam_name" id="exam_name" value="{{ old('exam_name', $examen->exam_name) }}" placeholder="Entrez le nom de l'examen">
            </p>

            <!-- Date de l'examen -->
            <p>
                <label for="exam_date">Date de l'Examen</label>
                <input class="w3-input w3-border w3-round" type="date" name="exam_date" id="exam_date" value="{{ old('exam_date', $examen->exam_date) }}">
            </p>

            <!-- Type d'examen -->
            <p>
                <label for="exam_type">Type d'Examen</label>
                <select class="w3-select w3-border w3-round" name="exam_type" id="exam_type">
                    <option value="" disabled>Choisir le type d'examen</option>
                    <option value="Laboratoire" {{ old('exam_type', $examen->exam_type) == 'Laboratoire' ? 'selected' : '' }}>Laboratoire</option>
                    <option value="Imagerie" {{ old('exam_type', $examen->exam_type) == 'Imagerie' ? 'selected' : '' }}>Imagerie</option>
                    <option value="Consultation" {{ old('exam_type', $examen->exam_type) == 'Consultation' ? 'selected' : '' }}>Consultation</option>
                </select>
            </p>

            <!-- Description de l'examen -->
            <p>
                <label for="exam_description">Description</label>
                <textarea class="w3-input w3-border w3-round" name="exam_description" id="exam_description" placeholder="Entrez une brève description de l'examen">{{ old('exam_description', $examen->exam_description) }}</textarea>
            </p>

            <!-- Bouton de modification -->
            <button class="w3-btn w3-blue w3-round-large w3-block w3-margin-top">Modifier l'Examen</button>
        </form>
    </div>
</div>

@endsection
