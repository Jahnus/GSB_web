@extends('layouts.master')
@section('content')
<div class="container col-md-12 well well-md">
    <div class="blanc">
        <center><h1>Liste des visiteurs</h1></center>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>Date d'embauche</th>
                <th>Laboratoire</th>
                <th>Secteur</th>
                <th>Modification </th>
                <th>Suppression </th>
            </tr>
        </thead>
        @foreach($visiteurs as $visiteur)
        <tr>   
            <td> {{ $visiteur->nom_visiteur }} </td> 
            <td> {{ $visiteur->prenom_visiteur }} </td>
            <td> {{ $visiteur->adresse_visiteur }} </td>
            <td> {{ $visiteur->cp_visiteur }} </td>
            <td> {{ $visiteur->ville_visiteur }} </td>
            <td> {{ $visiteur->date_embauche }} </td>
            <td> {{ $visiteur->nom_laboratoire }} </td>
            <td> {{ $visiteur->lib_secteur }} </td>
            <td style="text-align:center;"><a href="{{ url('/modifierVisiteur') }}/{{ $visiteur->id_visiteur }}">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
            <td style="text-align:center;">
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                    onclick="javascript:if (confirm('Suppression confirmée ?')) { window.location='{{ url('/supprimerVisiteur') }}/{{ $visiteur->id_visiteur }}';}">
                </a>
            </td>                    
        </tr>
        @endforeach
        <BR> <BR>
    </table>
    <div class="col-md-6 col-md-offset-3">
        @include('error')
    </div>
</div>
@stop