@extends('layouts.layout')

@section('title', 'Liste des Examens')

@section('content')
<div class="w3-container w3-padding-16">
    <h2 class="w3-center w3-text-blue">Liste des Examens</h2>

    <!-- Message de succès après enregistrement -->
    @if(session('success'))
        <div class="w3-panel w3-green">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <!-- Table des examens -->
    <div class="w3-card-4 w3-margin-top w3-padding-32 w3-light-grey w3-round-large">
        <table class="w3-table w3-bordered w3-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($examens as $examen)
                    <tr>
                        <td>{{ $examen->exam_code }}</td>
                        <td>{{ $examen->exam_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($examen->exam_date)->format('d/m/Y') }}</td>
                        <td>{{ $examen->exam_type }}</td>
                        <td>
                            <a href="{{ route('examens.edit', $examen->id) }}" class="w3-btn w3-blue w3-round-small">Modifier</a>
                            <form action="{{ route('examens.destroy', $examen->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w3-btn w3-red w3-round-small">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Lien vers la page d'ajout d'examen -->
    <div class="w3-margin-top">
        <a href="{{ route('examens.create') }}" class="w3-btn w3-blue w3-round-large">Ajouter un Examen</a>
    </div>
</div>

@endsection
