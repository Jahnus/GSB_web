@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'listerVisiteursRecherche']) !!}
<div class="col-md-12 well well-sm">
    <center>
        <h1>Recherche d'un visiteur</h1>
        <p>Si aucun paramètre n'est saisi, la liste de tous les visiteurs sera retournée</p></br>
    </center>
    <div class="form-horizontal">    
        <div class="form-group">
            <label class="col-md-3 control-label">Nom : </label>
            <div class="col-md-3">
                <input type="text" name="cbNom" id="autoNom" placeholder="Entrer un nom" value="" class="form-control" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Laboratoire : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbLabo' >
                    <OPTION VALUE=-1>Sélectionner un laboratoire</option>
                    @foreach ($laboratoires as $laboratoire)
                        <option value="{{$laboratoire->id_laboratoire}}"> {{$laboratoire->nom_laboratoire}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Secteur : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbSecteur' >
                    <OPTION VALUE=-1>Sélectionner un secteur</option>
                    @foreach ($secteurs as $secteur)
                        <option value="{{$secteur->id_secteur}}"> {{$secteur->lib_secteur}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-ok"></span>
                    Rechercher
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                    onclick="javascript: window.location = '{{ url('/') }}';">
                    <span class="glyphicon glyphicon-remove"></span> 
                    Annuler
                </button>
            </div>           
        </div>
	<div class="col-md-6 col-md-offset-3">
            @include('error')
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

