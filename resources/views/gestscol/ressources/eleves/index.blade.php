<x-gest-scol title="Listes des eleves">
    
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-study icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Liste des élèves
                            <!-- <div class="page-title-subheading">Liste des Apprenants.
                            </div> -->
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{route("gestscol.student.add",$etablissement)}}">
                            <button class=" btn btn-primary"><i class="fa fa-plus"></i> Nouveau Elève </button>
                        </a>
                        {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button> --}}
                        {{-- <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Buttons
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i class="nav-link-icon lnr-inbox"></i>
                                            <span>
                                                Inbox
                                            </span>
                                            <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>
                                                Book
                                            </span>
                                            <div class="ml-auto badge badge-pill badge-danger">5</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i class="nav-link-icon lnr-picture"></i>
                                            <span>
                                                Picture
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a disabled href="javascript:void(0);" class="nav-link disabled">
                                            <i class="nav-link-icon lnr-file-empty"></i>
                                            <span>
                                                File Disabled
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
    
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
    
                        <div class="card-body" class="scroll-area-md">
                            <!-- <h5 class="card-title">Table with hover</h5> -->
                            <table class="mb-0 table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                           #
                                        </th>
                                        <th>Nom Complet</th>
                                        <th>Date de Naissance</th>
                                        <th>Lieu de Naissance</th>
                                        <th>Classe</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($eleves as $key=>$eleve)
                                        <tr>
                                            <th>
                                                {{$key + 1}}
                                            </th>
                                            <td>{{$eleve->nom}}</td>
                                            <td>{{ date('Y-m-d', strtotime($eleve->date_naissance)) }}</td>
                                            <td>{{$eleve->lieu_naissance}}</td>
                                            <td>{{isset($eleve->classe_annee)? $eleve->getClasseAnnee->name:"/"}}</td>
                                            <td class="mdc-data-table__cell">
                                                <a href="#"><i class="fas fa-eye"></i></i></a>
                                                <a href="{{route('gestscol.student.edit',[$etablissement,$eleve])}}"><i class="fas fa-edit"></i></i></a>
                                                {{-- <a href=""><i class="fas fa-print"></i></i></a> --}}
                                                <a href="{{route('gestscol.student.delete',[$etablissement,$eleve])}}" style="color:red;"><i class="fas fa-trash"></i></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <th colspan="4" class="text-center">Aucune donnéés disponibles</th>
                                    </tr> 
                                    
                                    @endforelse
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</x-gestscol>