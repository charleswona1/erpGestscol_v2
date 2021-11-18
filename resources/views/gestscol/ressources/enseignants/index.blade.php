<x-gest-scol title="Listes des enseignants">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-add-user icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Liste des Enseignants
                            <!-- <div class="page-title-subheading">Liste des Apprenants.
                            </div> -->
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{route('gestscol.enseignants.add',$etablissement)}}">
                            <button class=" btn btn-primary"><i class="fa fa-plus"></i> Nouvel Enseignant </button>
                        </a>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-secondary">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-cog fa-w-20"></i>
                                </span>
                                Actions
                            </button>
                           
                        </div>
                    </div>
                </div>
            </div>
            <x-flash-back></x-flash-back>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body" class="scroll-area-md">
                            <!-- <h5 class="card-title">Table with hover</h5> -->
                            <table class="mb-0 table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox"> </label></div>
                                        </th>
                                        <th>Titre</th>
                                        <th>Nom Complet</th>
                                        <th>Matière</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($enseignants as $enseignant)
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox"> </label>
                                                </div>
                                            </th>
                                            <th>{{$enseignant->titre}}</th>
                                            <th>{{$enseignant->name}}</th>
                                            <th>/</th>
                                            <th>{{$enseignant->status}}</th>
                                            <td class="mdc-data-table__cell">
                                                <a href="#"><i class="fas fa-eye"></i></i></a>
                                                <a href="{{route('gestscol.enseignants.edit',[$etablissement,$enseignant])}}"><i class="fas fa-edit"></i></i></a>
                                                {{-- <a href=""><i class="fas fa-print"></i></i></a> --}}
                                                <a href="{{route('gestscol.enseignants.delete',[$etablissement,$enseignant])}}" style="color:red;"><i class="fas fa-trash"></i></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-gest-scol>