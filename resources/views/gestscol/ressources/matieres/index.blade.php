<x-gest-scol title="Liste des matières">

    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-note2 icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Liste des Matières
                            <!-- <div class="page-title-subheading">Liste des Apprenants.
                            </div> -->
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{ route('gestscol.matieres.add', $etablissement) }}">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg">
                                <i class="  fa fa-plus"></i> Nouvelle Matière
                            </button>
                        </a>

                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-secondary">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-cog fa-w-20"></i>
                                </span>
                                Actions
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <x-flashback></x-flashback>
                        
                        <div class="card-body" class="scroll-area-md">
                            <!-- <h5 class="card-title">Table with hover</h5> -->
                            <table class="mb-0 table table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox">
                                                </label>
                                            </div>
                                        </th>
                                        <th width="20%">Numéro</th>
                                        <th>Nom de la Matière</th>
                                        <th>Abréviation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($matieres as $key => $matiere)
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox">
                                                    </label>
                                                </div>
                                            </th>
                                            <td>{{$key + 1}}</td>
                                            <td>{{ $matiere->name }}</td>
                                            <td>{{ $matiere->abreviation }}</td>

                                            <td class="mdc-data-table__cell">
                                                <a href="utilisateur-profil.html"><i class="fas fa-eye"></i></a>
                                                <a
                                                href="{{ route('gestscol.matieres.edit', [$etablissement, $matiere]) }}"><i
                                                    class="fas fa-edit"></i></a>
                                                <a href=""><i class="fas fa-print"></i></a>
                                                <a href="{{ route('gestscol.matieres.delete', [$etablissement, $matiere]) }}"
                                                    style="color:red;"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                <div class="lead text-center text-muted pt-30 pb-30">
                                                    Pas de matières
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse


                                    <tr>
                                        <th scope="row">
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-gestscol>
