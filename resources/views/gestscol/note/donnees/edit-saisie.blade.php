<x-gest-scol title="Modification d'une classe">
    <div class="app-page-title" style="position:relative; top:0%;">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-share icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div> Saisie des Notes
                    <!-- <div class="page-title-subheading">Liste des Apprenants.
                        </div> -->
                </div>
            </div>
            <div class="page-title-actions">
                <a href="">
                    <button class=" btn btn-primary">
                        <!-- <i class="fa fa-plus"></i> --> Consulter
                    </button>
                </a>

                <!-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button> -->
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
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
    <div class="alert alert-success alert-dismissible fade show d-none" id="alert-success" role="alert">
        Les notes de l'élèves sur cette periode on ete créé correctement
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-danger alert-dismissible fade show d-none" id="alert-danger" role="alert">
        Une erreur c'est produite la procedure a été intérompue
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row">

        <div class="col-lg-12">

            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-body ">
                        <table class="col-md-12">
                            <tr>
                                <td>
                                    <div class="position-relative form-group"><label for="exampleSelect" class="">Classe <span
                                                style="color:red;">*</span></label>
                                        <select name="classe_annee_id" id="classeAnneeId" class="form-control" disabled>
                                            <option value="">selectionnez une classe</option>
                                            @foreach ($classes as $classe)
                                                <option value="{{$classe->id}}" 
                                                    @if ($evaluationPeriode->classe_annee_id == $classe->id)
                                                        selected
                                                    @endif
                                                    >{{$classe->getNiveau->name}}{{$classe->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="matiere_niveau" class="">Matière <span
                                                style="color:red;">*</span></label>
                                        <select name="matiere_niveau_id" id="matiere_niveau" class="form-control" disabled >
                                            <option>{{$evaluationPeriode->MatiereNiveau->matiere->name}}</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="periodeId" class="">Période <span
                                                style="color:red;">*</span></label>
                                        <select name="periode_id" id="periodeId" class="form-control" disabled>
                                            <option value="">selectionnez une periode</option>
                                            @foreach ($periodes as $periode)
                                                <option value="{{$periode->id}}" 
                                                    @if ($evaluationPeriode->periode_id == $periode->id)
                                                        selected
                                                    @endif
                                                    >{{$periode->numero}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="sous_periode" class="">Sous-Période<span
                                                style="color:red;">*</span></label>
                                        <select name="sous_periode_id" id="sous_periode" class="form-control" disabled >
                                            <option>{{$evaluationPeriode->SousPeriode->numero}}</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="position-relative form-group"><label for="evaluation_id" class="">Evaluation <span
                                                style="color:red;">*</span></label>
                                        <select name="evaluation_id" id="evaluation_id" class="form-control" disabled>
                                            <option value="">selectionnez une evaluation</option>
                                            @foreach ($evaluations as $evaluation)
                                                <option value="{{$evaluation->id}}"
                                                    @if ($evaluationPeriode->evaluation_id == $evaluation->id)
                                                        selected
                                                    @endif
                                                    >{{$evaluation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Barème <span
                                                style="color:red;">*</span></label>
                                        <input name="bareme" id="bareme" placeholder="{{$evaluationPeriode->bareme}}" type="number" class="form-control" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group">
                                        <label for="date_evaluation" class="">Date <span
                                                style="color:red;">*</span></label>
                                        <input name="date_evaluation" id="date_evaluation" placeholder="" value="{{$evaluationPeriode->date_evaluation}}" type="date" class="form-control" disabled>
                                    </div>
                                </td>

                                <td>
                                    <div class="position-relative form-group">
                                        <label for="commentataire" class="">Commentaires <span
                                                style="color:red;"> </span></label>
                                        <input name="commentataire" id="commentataire" placeholder="{{$evaluationPeriode->commentataire}}" type="text" class="form-control" disabled>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                
                <div class="main-card mb-3 card" id="result-eleve">
                   <div class="card-body" class="scroll-area-md">
                       <table class="mb-0 table table-hover">
                            <thead>
                                <tr> 
                                    <th>N°</th> 
                                    <th>Nom de l'apprenant</th> 
                                    <th>Note /{{$evaluationPeriode->bareme}}</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($elevesClasse as $key=>$eleve)
                                    <tr>
                                        <th>{{$key + 1}}</th>
                                        <th>{{$eleve->nom}}</th>
                                        <th>
                                           
                                            <input 
                                            type="number" 
                                            name="fieldStudent" 
                                            step="0.01" min="0"  
                                            data-key="{{($eleve->noteByEvaluation($evaluationPeriode->id) !== null)?$eleve->noteByEvaluation($evaluationPeriode->id)->id:null}}" 
                                            max="{{$evaluationPeriode->bareme}}" 
                                            id="{{$eleve->id}}" 
                                            value="{{($eleve->noteByEvaluation($evaluationPeriode->id) !== null)?$eleve->noteByEvaluation($evaluationPeriode->id)->note:0.00}}" 
                                            class="form-control fieldStudent"/>
                                        </th>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                       </table>
                    </div>
                </div>
                <button class="mt-1 btn btn-success" type="button" id="updateNote">Enregistrer</button>
                
            </div>
        </div>
        <input type="hidden" name="jsonData" id="jsonData">
    </div>

    @push('javascripts')
        <script>
            let notes = [];
            $('#updateNote').on('click',function(){
                $('.fieldStudent').each(function(index){
                    note = {
                        "id": $(this)[0].attributes['data-key'].value,
                        "note": $(this)[0].value ,
                        "eleve_classe_id": $(this)[0].id,
                        "evaluation_periode_id": "{{$evaluationPeriode->id}}"
                    };
                    notes.push(note);
                });
                console.log(notes);
                $.ajax({
                    url: "{{route('gestscol.notes.saveNote',$etablissement)}}",
                    type: "POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "notes":notes
                    },

                    success:function(response){
                        console.log(response);  
                        $('#alert-success').removeClass("d-none");
                        setTimeout(() => {
                            location.reload(); 
                        }, 1000);
                        
                    },
                    error: function(errors){
                       console.log(errors);
                       $('#alert-danger').removeClass("d-none");
                        setTimeout(() => {
                            location.reload(); 
                        }, 1000);
                    }
                });

            })
        </script>
    @endpush
</x-gest-scol>