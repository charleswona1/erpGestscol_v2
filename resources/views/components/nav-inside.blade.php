<nav class="navbar navbar-expand-lg navbar-light bg-white" style="margin-bottom:25px; position:relative; top:-20px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @php
        $part_url = Request::path();
        $etablissement_id = $part_url[9];
        \Debugbar::info($etablissement_id);
        $etablissement = App\Models\Etablissement::find($etablissement_id);
    @endphp
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nav-link-icon fa fa-database"> </i> Données
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="{{route('gestscol.notes.saisie-note', $etablissement)}}">Saisie de Notes</a></li>
                <li><a class="dropdown-item" href="{{route('gestscol.notes.gestion-avance', $etablissement)}}">Gestion avancée des Evaluations</a></li>
                <li><a class="dropdown-item" href="{{route('gestscol.cloture.classe', $etablissement)}}">Clôture</a></li>
                <li><a class="dropdown-item" href="#">Décisions du Conseil</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nav-link-icon fa fa-edit"></i> Documents
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Listes de Classes</a></li>
                <li><a class="dropdown-item" href="#">Notes et Analyses</a></li>
                <li><a class="dropdown-item" href="{{route('gestscol.bulletins.bulletin-eleve', $etablissement)}}">Bulletins de Notes</a></li>
                <li><a class="dropdown-item" href="#">Relevé de Notes</a></li>
                <li><a class="dropdown-item" href="#">Livret Scolaire</a></li>
                <li><a class="dropdown-item" href="#">Situation Disciplinaire</a></li>
                <li><a class="dropdown-item" href="#">Fiches Synthèses</a></li>
                <li><a class="dropdown-item" href="#">Analyses Moyennes</a></li>
                <li><a class="dropdown-item" href="#">Diplômes</a></li>
                <li><a class="dropdown-item" href="#">Bourses Scolaire</a></li>
                <li><a class="dropdown-item" href="#">Certicicat de Scolarité</a></li>
                <li><a class="dropdown-item" href="#">Certificat de Radiation</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nav-link-icon fa fa-cog"></i> Système
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Changer le Mots de passe</a></li>
                <li><a class="dropdown-item" href="#">Gestion des Années Scolaires</a></li>
                <li><a class="dropdown-item" href="#">Journal des Updates</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="nav-link-icon fa fa-cogs"></i> Outils
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Envoie SMS</a></li>
                <li><a class="dropdown-item" href="#">Envoie Email</a></li>
                <li><a class="dropdown-item" href="#">Production Cartes</a></li>
                <li><a class="dropdown-item" href="#">Photo d'Examen</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Aide ?</a>
            </li>
            
        </ul>
      
        <div class="search-wrapper">
            <div class="input-holder">
                <input type="text" class="search-input" placeholder="Faire une recherche...">
                <button class="search-icon"><span></span></button>
            </div>
            <button class="close"></button>
        </div>
      
    </div>
    
  </nav>