@extends('layouts.layout')

@section('title', 'Tableau de Bord')

@section('content')
    <div class="w3-row-padding w3-margin-top">
        <div class="w3-third">
            <div class="w3-card w3-padding w3-blue w3-center">
                <h3>Patients</h3>
                <p><i class="fa fa-users w3-xxlarge"></i></p>
                <p>125 Patients enregistrés</p>
                <a href="{{ route('patients.liste') }}" class="w3-button w3-white w3-round">Voir plus</a>
            </div>
        </div>
        <div class="w3-third">
            <div class="w3-card w3-padding w3-green w3-center">
                <h3>Consultations</h3>
                <p><i class="fa fa-stethoscope w3-xxlarge"></i></p>
                <p>50 Consultations aujourd'hui</p>
                <a href="{{ route('consultation.liste') }}" class="w3-button w3-white w3-round">Voir plus</a>
            </div>
        </div>
        <div class="w3-third">
            <div class="w3-card w3-padding w3-red w3-center">
                <h3>Rendez-vous</h3>
                <p><i class="fa fa-calendar w3-xxlarge"></i></p>
                <p>30 Rendez-vous à venir</p>
                <a href="#" class="w3-button w3-white w3-round">Voir plus</a>
            </div>
        </div>
    </div>
@endsection
