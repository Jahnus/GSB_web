<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/gsb.css') !!}
    </head>
    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}"><img alt="logoGSB" class="logo" src="images/logoGSB.png" />Laboratoire Galaxy Swiss Bourdin</a>
                    </div>
                    @if (Session::get('id') == 0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('/getLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                        </ul> 
                    </div>
                    @endif
                    @if (Session::get('id') > 0)                  
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        @if (Session::get('role') == 'A')
                        <ul class="nav navbar-nav">                           
                            <li><a href="{{ url('/rechercherVisiteur') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Rechercher visiteur</a></li>
                            <li><a href="{{ url('/ajouterVisiteur') }}"data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter visiteur</a></li>                       
                        </ul> 
                        @endif
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('/signOut') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                        </ul>                         
                    </div>
                    @endif 
                </div><!--/.container-fluid -->
            </nav>
        </div> 
        <div class="container">            
            @yield('content')
        </div>
	{!! Html::script('assets/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/ui-bootstrap-tpls.js') !!}
        {!! Html::script('assets/js/bootstrap.js') !!}
    </body>
</html>
