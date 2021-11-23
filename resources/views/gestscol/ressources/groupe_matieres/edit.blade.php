<x-gest-scol title="Groupe de Matière par Niveau Scolaire">

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-share icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Groupe de Matière par Niveau Scolaire
                            <!-- <div class="page-title-subheading">Liste des Apprenants.
                            </div> -->
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <a href="parametrages-matieres.html">
                            <button class=" btn btn-primary">
                                <!-- <i class="fa fa-plus"></i> --> Paramétrages
                            </button>
                        </a>

                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-info">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                    <div class="col-md-10">
                        <div class="main-card mb-3 card">
                            <x-flashback></x-flashback>

                            <div class="card-body ">
                                {{ html()->form('POST', URL::full())->open() }}
                                @csrf
                                    <table class="col-md-12">
                                        <tr>
                                            <td>


                                            </td>
                                            <td width="50%">
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Nom du Groupe <span
                                                            style="color:red;">*</span></label>
                                                    <input name="name" value="{{$groupeMatiere->name}}" placeholder=" " type="text"
                                                        class="form-control" required>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Numéro du Groupe
                                                        <span style="color:red;">*</span></label>
                                                    <input name="numero" value="{{$groupeMatiere->numero}}" placeholder=" " type="number"
                                                        class="form-control" required>
                                                </div>
                                            </td>

                                        </tr>

                                    </table>


                                    <button class="mt-1 btn btn-secondary"><a href="periodes-liste.html"
                                            style="color:white; text-decoration:none;">Annuler</a></button>
                                    <button class="mt-1 btn btn-success">Modifier</button>

                                {{ html()->form()->close() }}
                            </div>
                        </div>


                        <div class="main-card mb-3 card">

                            <div class="card-body" class="scroll-area-md">
                                <!-- <h5 class="card-title">Table with hover</h5> -->
                                <table class="mb-0 table table-hover">
                                    <thead>
                                        <tr>

                                            <th>Numéro</th>
                                            <th>Nom du Groupe</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($groupematieres as $item)
                                            <tr>
                                                <td>{{ $item->numero }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td class="mdc-data-table__cell">
                                                    <a href="utilisateur-profil.html"><i
                                                            class="fas fa-eye"></i></a>
                                                            <a href="{{ route('gestscol.niveaux.groupeMatieres.edit',[$etablissement,$niveau, $item]) }}"><i class="fas fa-edit" aria-hidden="true"></i>
  
                                                    <a href=""><i class="fas fa-print"></i></i></a>
                                                    <a href="{{ route('gestscol.niveaux.groupeMatieres.delete',[$etablissement,$niveau , $item]) }}"
                                                        style="color:red;"><i class="fas fa-trash"></i></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">
                                                    <div class="lead text-center text-muted pt-30 pb-30">
                                                        Pas de groupe de matieres
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforelse


                                        <tr>
                                            <th scope="row" colspan="5">
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>
    </x-gestscol>
