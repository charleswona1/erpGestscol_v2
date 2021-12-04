<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    @php
        $part_url = Request::path();
        $etablissement_id = $part_url[9];
        \Debugbar::info($etablissement_id);
        $etablissement = App\Models\Etablissement::find($etablissement_id);
    @endphp
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <h6 class="widget-heading" style="fond-weight:bolder; margin-bottom:30px; color:black; text-align:center;">
                {{ $etablissement->type_etablissement }} {{ $etablissement->name }} <br>
                <span style="font-size:0.9em; color:grey;">Année Scolaire 2021-2022</span>
            </h6>
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Tableau de Bord</li>
                <li>
                    <a href="" class="{{ Request::is('gestscol/' . $etablissement->id) ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-graph1"></i> Tableau de bord
                    </a>
                </li>
                <li class="app-sidebar__heading">Ressources</li>
                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/student*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/student*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-study"></i> Apprenants
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('gestscol/' . $etablissement->id . '/student*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.student.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/student') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Liste
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.student.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/student/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer un Apprenant
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/enseignants*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/enseignants*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-add-user"></i> Enseignants
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('gestscol/' . $etablissement->id . '/enseignants*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.enseignants.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/enseignants') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Liste
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.enseignants.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/enseignants/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer un Enseignant
                            </a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/classes*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/classes*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-folder"></i> Classes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('gestscol/' . $etablissement->id . '/classe*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.classes.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/classes/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Liste des classes.
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.classes.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/classe') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Créer une classe.
                            </a>
                        </li>
                        <li>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/matieres*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/matieres*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-folder"></i> Matière
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('gestscol/' . $etablissement->id . '/classe*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.matieres.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/matiere') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Liste des matières.
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.matieres.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/matiere/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer une Matière
                            </a>
                        </li>
                      
                    </ul>
                </li>

                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/cycles*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/cycles*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-help2"></i> Cycles
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('gestscol/' . $etablissement->id . '/cycles*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.cycles.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/cycles') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Listes des cycles
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.cycles.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/cycles/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer un cycle
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/niveaux*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/nuveau*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-network"></i> Niveaux Scolaires
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{ Request::is('gestscol/' . $etablissement->id . '/niveaux*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.niveaux.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/niveaux') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon"></i> Listes des niveaux
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.niveaux.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/niveaux/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer un niveau
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="{{ Request::is('gestscol/' . $etablissement->id . '/periodes*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/periode*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-network"></i> Périodes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul
                        class="{{ Request::is('gestscol/' . $etablissement->id . '/periodes*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.periodes.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/periodes') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Liste des Périodes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.periodes.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/periodes/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer une Période
                            </a>
                        </li>
            
                    </ul>
                </li>
                <li>
                    <a href="#"
                        class="{{ Request::is('gestscol/' . $etablissement->id . '/sousperiodes*') ? 'mm-active' : '' }}"
                        aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/sousperiode*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-albums"></i> Sous-Périodes
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul
                        class="{{ Request::is('gestscol/' . $etablissement->id . '/sousperiodes*') ? 'mm-collapse mm-show' : '' }}">
                        <li>
                            <a href="{{ route('gestscol.sousperiodes.index', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/sousperiodes') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Liste des sous-Périodes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.sousperiodes.add', $etablissement) }}"
                                class="{{ Request::is('gestscol/' . $etablissement->id . '/sousperiodes/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer une sous-Période
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/evaluations*') ? 'mm-active' : '' }}"
                    aria-expanded={{ Request::is('gestscol/' . $etablissement->id . '/evaluation*') ? true : false }}>
                        <i class="metismenu-icon pe-7s-news-paper"></i> Evaluations
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/evaluations*') ? 'mm-collapse mm-show' : '' }}">
                   
                        <li>
                            <a href="{{ route('gestscol.evaluations.index', $etablissement) }}"
                            class="{{ Request::is('gestscol/' . $etablissement->id . '/evaluations') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Liste des evaluations
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gestscol.evaluations.add', $etablissement) }}"
                            class="{{ Request::is('gestscol/' . $etablissement->id . '/evaluations/add') ? 'mm-active' : '' }}">
                                <i class="metismenu-icon">
                                </i>Créer un type d'evaluation
                            </a>
                        </li>
                     
                    </ul>
                </li>
                <li>
                    <a  href="#">
                        <i class="metismenu-icon pe-7s-display2"></i> Matricules
                    </a>
                </li>


                <li class="app-sidebar__heading">Configurations</li>
                <li>
                    <a href="{{ route('gestscol.student.affectations', $etablissement) }}"
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/affectations/student') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-display2"></i> Elèves dans les classes
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-display2"></i> Elèves et matières d'option
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i> Elèves composants les groupes
                    </a>
                </li>
                <li>
                    <a href="{{ route('gestscol.matiere.affectations', $etablissement) }}" 
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/affectations/matiere') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-shuffle"></i> Affectations des matières
                    </a>
                </li>
                <li>
                    <a href="{{ route('gestscol.parametrages.matiere.index', $etablissement ) }}"
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/configurations/matiere') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-share"></i> Paramétrages des matières
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-way"></i> Gestion des moyennes
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-like2"></i> Appréciations de notes
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-star"></i> Mention du travail
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-medal"></i> bourses
                    </a>
                </li>
                <li class="app-sidebar__heading">Discipline</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-mouse">
                        </i>Consultation
                    </a>
                </li>
                <li>
                    <a href="{{ route('gestscol.sanctions.index', $etablissement) }}"
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/sanctions/index') ? 'mm-active' : '' }}"
                    >
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Sanction
                    </a>
                </li>
                <li>
                    <a href="{{ route('gestscol.parametragesanctions.index', $etablissement) }}"
                    class="{{ Request::is('gestscol/' . $etablissement->id . '/parametragesanctions/index') ? 'mm-active' : '' }}"
                    >
                        <i class="metismenu-icon pe-7s-pendrive">
                        </i>Paramétrage de Sanctions
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
