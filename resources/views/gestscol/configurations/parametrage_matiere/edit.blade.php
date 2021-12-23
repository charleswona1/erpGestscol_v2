<x-gestscol title="Paramétrage des Matières par Niveau">

    
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-share icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Paramétrage des Matières par Niveau
                        </div>
                    </div>
                    <div class="page-title-actions">

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
                                            <div class="position-relative form-group"><label for="exampleSelect"
                                                    class="">Niveau <span
                                                        style="color:red;">*</span></label>
                                                <select name="niveau_id" class="form-control" required>
                                                    @foreach ($niveaux as $niveau)
                                                        @if ($niveau->id == $matiereNiveau->niveau_scolaire->id)
                                                            <option value="{{ $niveau->id }}" selected>
                                                                {{ $niveau->name }}</option>
                                                        @else
                                                            <option value="{{ $niveau->id }}">{{ $niveau->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <x-errors name="niveau_id"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="position-relative form-group"><label for="exampleSelect"
                                                    class="">Matière <span
                                                        style="color:red;">*</span></label>
                                                <select name="matiere_id" class="form-control" required>
                                                    
                                                    @foreach ($matieres as $matiere)
                                                        @if ($matiere->id == $matiereNiveau->matiere->id)
                                                            <option value="{{ $matiere->id }}" selected>
                                                                {{ $matiere->name }}</option>
                                                        @else
                                                            <option value="{{ $matiere->id }}">{{ $matiere->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <x-errors name="matiere_id"/>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Coefficient <span
                                                        style="color:red;">*</span></label>
                                                <input name="coefficient" placeholder=" " type="float"
                                                    value="{{ $matiereNiveau->coefficient }}" class="form-control"
                                                    required>
                                                    <x-errors name="coefficient"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Groupe <span
                                                        style="color:red;">*</span></label>
                                                        <select name="groupe_matiere_id" class="form-control" required>
                                                    
                                                            @foreach ($groupe_matieres as $groupe_matiere)
                                                                @if ($groupe_matiere->id == $matiereNiveau->groupe_matiere->id)
                                                                    <option value="{{ $groupe_matiere->id }}" selected>
                                                                        {{ $groupe_matiere->name }}</option>
                                                                @else
                                                                    <option value="{{ $groupe_matiere->id }}">{{ $groupe_matiere->name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <x-errors name="groupe_matiere_id"/>
                                                        
                                            </div>
                                        </td>
                                    </tr>

                                </table>


                                <button class="mt-1 btn btn-secondary"><a href="classe-liste.html"
                                        style="color:white; text-decoration:none;">Annuler</a></button>
                                <button class="mt-1 btn btn-success" type="submit">Modifier</button>

                                {{ html()->form()->close() }}
                            </div>
                        </div>


                        <div class="main-card mb-3 card">

                            <div class="card-body" class="scroll-area-md">
                                <!-- <h5 class="card-title">Table with hover</h5> -->
                                <table class="mb-0 table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>Matière</th>
                                            <th>Coefficient</th>
                                            <th>Groupe</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($matiere_niveaux as $item)

                                            <tr>
                                                <th>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" id="exampleCustomCheckbox"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label" for="exampleCustomCheckbox">
                                                        </label>
                                                    </div>
                                                </th>
                                                <td>{{ $item->matiere->name }}</td>
                                                <td>{{ $item->coefficient }}</td>
                                                <td>{{ $item->groupe_matiere->name }}</td>

                                                <td class="mdc-data-table__cell">
                                                    <a href="utilisateur-profil.html"><i
                                                            class="fas fa-eye"></i></i></a>
                                                    <a
                                                        href="{{ route('gestscol.parametrages.matiere.edit', [$etablissement, $item]) }}"><i
                                                            class="fas fa-edit"></i></i></a>
                                                    <a href=""><i class="fas fa-print"></i></i></a>
                                                    <a href="{{ route('gestscol.parametrages.matiere.delete', [$etablissement, $item]) }}"
                                                        style="color:red;"><i class="fas fa-trash"></i></i></a>
                                                </td>
                                            </tr>


                                        @empty
                                            <tr>
                                                <td colspan="10">
                                                    <div class="lead text-center text-muted pt-30 pb-30">
                                                        Pas de parametrage de sanctions
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
</x-gestscol>
