<x-gest-scol title="Liste des niveaux scolaires">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-help2 icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Liste des niveaux scolaires
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{route("gestscol.niveaux.add",$etablissement)}}">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target="bd-example-modal-lg">
                                <i class=" fa fa-plus"></i> Nouveau niveau
                            </button>
                        </a>
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
                                        <th width="5%">#</th>
                                        <th >Niveau</th>
                                        <th >Cycle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($niveaux as $key=>$niveau)
                                    <tr>
                                        <th>
                                            {{$key + 1}}
                                        </th>
                                        <td>{{$niveau->name}}</td>
                                        <td>{{$niveau->cycles->name}}</td>
    
                                        <td class="mdc-data-table__cell">
                                            <a href="#"><i class="fas fa-eye"></i></i></a>
                                            <a href="{{route('gestscol.niveaux.edit',[$etablissement,$niveau])}}"><i class="fas fa-edit"></i></i></a>
                                            <a href="{{route('gestscol.niveaux.delete',[$etablissement,$niveau])}}" style="color:red;"><i class="fas fa-trash"></i></i></a>
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