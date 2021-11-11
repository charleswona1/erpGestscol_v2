<x-gest-scol title="Crée un cycle">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-help2 icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Creation d'un Cycle
    
                        </div>
                    </div>
                    <div class="page-title-actions">
    
                        <div class="d-inline-block dropdown">
    
    
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
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Nom du Cycle <span style="color:red;">*</span></label>
                                            <input name="name"  type="texte" class="form-control" required>
                                        </div>
                                        <button class="mt-1 btn btn-success" type="submit">Enrégistrer</button>
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