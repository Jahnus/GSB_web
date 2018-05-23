@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'validerVisiteur']) !!}
<div class="col-md-12 well well-sm">
    <center>
        <h1>{{ $titreVue }}</h1>
        <p>* champs requis</p></br>
    </center>
    <div class="form-horizontal">    
        <div class="form-group">
            <input type="hidden" name="id_visiteur" value="{{ $visiteur->id_visiteur or 0 }}"/>
            <label class="col-md-3 control-label">Nom* : </label>
            <div class="col-md-3">
                <input type="text" name="nom" value="{{ $visiteur->nom_visiteur or '' }}" placeholder="Entrer un nom" class="form-control" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Prénom : </label>
            <div class="col-md-3">
                <input type="text" name="prenom" value="{{ $visiteur->prenom_visiteur or '' }}" placeholder="Entrer un prénom" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Adresse : </label>
            <div class="col-md-3">
                <input type="text" name="adresse" value="{{ $visiteur->adresse_visiteur or '' }}" placeholder="Entrer une adresse" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Code postal : </label>
            <div class="col-md-3">
                <input type="number" name="cp" value="{{ $visiteur->cp_visiteur or '' }}" placeholder="Entrer un code postal" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Ville : </label>
            <div class="col-md-3">
                <input type="text" name="ville" value="{{ $visiteur->ville_visiteur or '' }}" placeholder="Entrer une ville" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Date d'embauche : </label>
            <div class="col-md-3">
                <input type="date" name="date" value="{{ $visiteur->date_embauche or '' }}" placeholder="Sélectionner une date" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Login* : </label>
            <div class="col-md-3">
                <input type="text" name="login" value="{{ $visiteur->login_visiteur or '' }}" placeholder="Entrer un login" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mot de passe* : </label>
            <div class="col-md-3">
                <input type="text" name="pwd" value="{{ $visiteur->pwd_visiteur or '' }}" placeholder="Entrer un mot de passe" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Laboratoire* : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbLabo' required>
                    <OPTION VALUE="0">Sélectionner un laboratoire</option>
                    @foreach ($laboratoires as $laboratoire)
                        selected=""
                        <option value="{{ $laboratoire->id_laboratoire }}"
                            @if($laboratoire->id_laboratoire == $visiteur->id_laboratoire)
                                selected="selected"
                            @endif
                            > {{ $laboratoire->nom_laboratoire }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Secteur* : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbSecteur' required>  
                    <OPTION VALUE=0>Sélectionner un secteur</option>
                    @foreach ($secteurs as $secteur)
                        selected=""
                        <option value="{{ $secteur->id_secteur }}"
                            @if($secteur->id_secteur == $visiteur->id_secteur)
                                selected="selected"
                            @endif
                            > {{ $secteur->lib_secteur }} </option>
                    @endforeach
                </select>
            </div>
        </div>     
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span> Valider</button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" onclick="javascript: window.location = '{{ url('/') }}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler</button>
            </div>           
        </div>
	    <div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop