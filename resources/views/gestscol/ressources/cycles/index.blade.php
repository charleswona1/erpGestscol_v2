<x-gestscol title="Liste des cycles">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-help2 icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Liste des Cycles Scolaires
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <a href="{{route("gestscol.cycles.add",$etablissement)}}">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal"
                                data-target="bd-example-modal-lg">
                                <i class=" fa fa-plus"></i> Nouveau Cycle
                            </button>
                        </a>
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
                                        <th width="5%">#</th>
                                        <th >Nom du cycle</th>
                                        <th >Etablissements</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @forelse ($cycles as $key=>$cycle)
                                    <tr>
                                        <th>
                                            {{$key + 1}}
                                        </th>
                                        <td>{{$cycle->name}}</td>
                                        <td>{{$cycle->etablissement->name}}</td>
    
                                        <td class="mdc-data-table__cell">
                                            <a href="#"><i class="fas fa-eye"></i></i></a>
                                            <a href="{{route('gestscol.cycles.edit',[$etablissement,$cycle])}}"><i class="fas fa-edit"></i></i></a>
                                            <a href="{{route('gestscol.cycles.delete',[$etablissement,$cycle])}}" style="color:red;"><i class="fas fa-trash"></i></i></a>
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