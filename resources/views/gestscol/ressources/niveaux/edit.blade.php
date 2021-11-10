<x-gestscol title="Modifier un niveau scolaire">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-help2 icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Modification d'un niveau
    
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
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body ">
                                    {{ html()->form('POST', URL::full())->open() }}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="position-relative form-group">
                                                    <label  class="">Nom du niveau <span style="color:red;">*</span></label>
                                                    <input name="name" placeholder="Nom du cycle" value="{{$niveau->name}}" type="texte" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="position-relative form-group">
                                                    <label  class="">Selection du cycle <span style="color:red;">*</span></label>
                                                    <select name="cycle_id" class="form-control">
                                                        <option value="">Selection d'un cycle</option>
                                                        @foreach ($cycles as $cycle)
                                                            <option value="{{$cycle->id}}" 
                                                                @if ($cycle->id == $niveau->cycle_id)
                                                                    selected
                                                                @endif
                                                                >{{$cycle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
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