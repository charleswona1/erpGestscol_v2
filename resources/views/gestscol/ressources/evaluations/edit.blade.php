<x-gest-scol title="Modification d'un type d'Evaluation">
    
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-news-paper icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Modification d'un type d'Evaluation
    
                        </div>
                    </div>    
                </div>
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
                    <div class="row">
                        <div class="col-md-6">
                             <div class="main-card mb-3 card">
                                <div class="card-body ">
                                    {{ html()->form('POST', URL::full())->open() }}
                                        @csrf 
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Nom du type l'Evaluation <span style="color:red;">*</span></label>
                                            <input name="name" value="{{$evaluation->name}}" placeholder="Nom du type d'evaluation" type="texte" class="form-control" required>
                                        </div>
                                        <button class="mt-1 btn btn-success">Modifier</button>
                                        {{ html()->form()->close() }}
                                    </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-gestscol>
