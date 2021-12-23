<x-gestscol title="Création d'une sanction">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-news-paper icon-gradient bg-premium-dark">
                    </i>
                </div>
                <div>
                    Modification d'une sanction
                </div>
            </div>
            <div class="page-title-actions">

                <div class="d-inline-block dropdown">


                </div>
            </div>    </div>
    </div>            
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                <span>Formulaire</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            {{ html()->form('POST', URL::full())->open() }}
            <div class="row">
                <div class="col-md-12">
                        <div class="main-card mb-3 card">

                        <div class="card-body ">
                            <form class="">
                                <input name="id"  type="hidden" class="form-control" value="{{$sanction->id_sanction }}">

                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Libelle de sanction <span style="color:red;">*</span></label>
                                    <input name="libelle" id="exampleEmail" placeholder="Libelle de sanction" type="texte" class="form-control" value="{{$sanction->libelle }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                    
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Abbriévation <span style="color:red;">*</span></label><input name="abbreviation" value="{{$sanction->abbreviation }}" placeholder="Abbriévation" type="texte" class="form-control" required>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Dégré <span style="color:red;">*</span></label>
                                        <input name="degre" id="degre" placeholder="Dégré" type="number" class="form-control" value="{{$sanction->degre }}" required>
                                    </div>
                                </div>
                                <div class="col-md">

                                    
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Seuil <span style="color:red;">*</span></label>
                                        <input name="seuil" value="{{$sanction->seuil }}" placeholder="Seuil" type="texte" class="form-control" required>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="inputState">Unité</label>
                                        <select id="inputState" class="form-control" name="unite">
                                            <option value="1" @if ($sanction->seuil==1) selected @endif>H</option>
                                            <option value="2" @if ($sanction->seuil==2) selected @endif>J</option>
                                            <option value="3" @if ($sanction->seuil==3) selected @endif>U</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                    <button class="mt-1 btn btn-secondary"><a href="" style="color:white; text-decoration:none;">Annuler</a></button>
                                    <button type="submit" class="mt-1 btn btn-success">Modifier</button>

                                    {{ html()->form()->close() }}
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
<<<<<<< HEAD
</x-gestscol>
=======
            </x-gest-scol>
>>>>>>> 9e2b752ab9bd5b94279da3873774997e59b5e5ae
