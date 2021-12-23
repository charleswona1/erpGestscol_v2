<div class="app-header header-shadow">
			
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
    </div>    <div class="app-header__content">
        <div class="app-header-left">
             <div class="search-wrapper">
                <div class="input-holder">
               
                    
                </div> 
                <button class="close"></button>
            </div>

            @php
                $part_url = Request::path();
                $etablissement_id = $part_url[9];
                \Debugbar::info($etablissement_id);
                $etablissement = App\Models\Etablissement::find($etablissement_id);
            @endphp

            <div class="widget-heading">
                <h6  style="fond-weight:bolder; margin-bottom:30px; color:black; text-align:center; position: relative; margin:auto;">
                    {{ $etablissement->type_etablissement }} {{ $etablissement->name }}
                    </br>
                    <span style="font-size:0.9em; color:grey;">Année Scolaire 2021-2022</span>
                </h6>
            </div>
                        
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-1">
                <div class="widget-content p-1">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" class="rounded-circle" src="{{ asset('assets2/images/avatars/1.jpg') }}" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <button type="button" tabindex="0" class="dropdown-item">Profil</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Configuration</button>
                                    <button type="button" tabindex="0" class="dropdown-item">Activités</button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <button type="button" tabindex="0" class="dropdown-item">Déconnexion</button>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{Auth::user()->firstName}} {{Auth::user()->lastName}}
                            </div>
                            <div class="widget-subheading">
                                Administrateur
                            </div>
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    
</div>  
