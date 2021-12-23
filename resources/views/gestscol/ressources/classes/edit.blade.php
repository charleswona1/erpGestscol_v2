<x-gest-scol title="Modification d'une classe">
    
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-folder icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Modification d'une classe

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
                                    @csrf
                                    <div class="position-relative form-group"><label for="exampleSelect"
                                            class="">Niveau Scolaire <span
                                                style="color:red;">*</span></label>
                                        <select name="niveau_id" class="form-control" required>
                                            <option>choisir un niveau</option>
                                            @foreach ($niveaux as $niveau)
                                                @if ($niveau->id == $classe->getNiveau->id)
                                                    <option value="{{ $niveau->id }}" selected>{{ $niveau->name }}
                                                    </option>
                                                
                                                @else
                                                    <option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Nom de la Classe <span
                                                style="color:red;">*</span></label>
                                        <input name="name" id="exampleEmail" value="{{ $classe->name }}"
                                            placeholder="Classe" type="texte" class="form-control" required>
                                    </div>




                                    <button class="mt-1 btn btn-secondary"><a href="classe-liste.html"
                                            style="color:white; text-decoration:none;">Annuler</a></button>
                                    <button class="mt-1 btn btn-success" type="submit">Enregistrer</button>

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
