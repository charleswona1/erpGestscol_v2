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
                                        <select name="classe_annee_id" id="classeAnneeId" class="form-control" required>
                                            <option value="">selectionnez une classe</option>
                                            @foreach ($classes as $classe)
                                                <option value="{{$classe->id}}">{{$classe->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="matiere_niveau" class="">Matière <span
                                                style="color:red;">*</span></label>
                                        <select name="matiere_niveau_id" id="matiere_niveau" class="form-control" disabled required>
                                            <option>Selectionnez une matiere</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="periodeId" class="">Période <span
                                                style="color:red;">*</span></label>
                                        <select name="periode_id" id="periodeId" class="form-control" required>
                                            <option value="">selectionnez une periode</option>
                                            @foreach ($periodes as $periode)
                                                <option value="{{$periode->id}}">{{$periode->numero}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="sous_periode" class="">Sous-Période<span
                                                style="color:red;">*</span></label>
                                        <select name="sous_periode_id" id="sous_periode" class="form-control" disabled required>
                                            <option>Sélectionner un sous periode</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="position-relative form-group"><label for="evaluation_id" class="">Evaluation <span
                                                style="color:red;">*</span></label>
                                        <select name="evaluation_id" id="evaluation_id" class="form-control" required>
                                            <option value="">selectionnez une evaluation</option>
                                            @foreach ($evaluations as $evaluation)
                                                <option value="{{$evaluation->id}}">{{$evaluation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Barème <span
                                                style="color:red;">*</span></label>
                                        <input name="bareme" id="bareme" placeholder=" " type="number" class="form-control" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group">
                                        <label for="date_evaluation" class="">Date <span
                                                style="color:red;">*</span></label>
                                        <input name="date_evaluation" id="datePickerId" placeholder=" " type="date" class="form-control date_evaluation"
                                            required>
                                    </div>
                                </td>

                                <td>
                                    <div class="position-relative form-group">
                                        <label for="commentataire" class="">Commentaires <span
                                                style="color:red;"> </span></label>
                                        <input name="commentataire" id="commentataire" placeholder=" " type="text" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <button class="mt-1 btn btn-light" type="button" id="saveEvaluation">Saisir Notes</button>
                    </div>
                </div>

                
                <div class="main-card mb-3 card" id="result-eleve">

                </div>
                <button class="mt-1 btn btn-success d-none" type="button" id="saveNote">Enregistrer</button>
                
            </div>
        </div>
        <input type="hidden" name="jsonData" id="jsonData">
    </div>

    @push('javascripts')
        <script>
            datePickerId.max = new Date().toISOString().split("T")[0];
            $('#result-eleve').empty();
            let evaluationPeriode = "";
            let notes = [];
            let bareme = 0;
            $('#classeAnneeId').on('change',function(ev){
                classeAnneId = ev.target.value;
                $.ajax({
                    url: "{{route('gestscol.notes.matiere-classe',$etablissement)}}",
                    type: "GET",
                    data:{
                        "classeAnneId": classeAnneId,
                    },

                    success:function(response){
                        console.log(response);
                        let data = ""
                        
                        $('#matiere_niveau').empty();
                        $('#matiere_niveau').prop("disabled", false);

                        data += "<option>Selectionnez une matiere</option>";
                        $.each(response, function(key,val){
                            data+="<option value="+val.id+">"+val.name+"</option>";
                        });
                       
                        $('#matiere_niveau').append(data);
                       
                    },
                    error: function(errors){
                       console.log(errors);
                       $('#matiere_niveau').prop("disabled", true);
                    }
                });
            });

            $('#periodeId').on('change',function(ev){
                periodeId = ev.target.value;
                $.ajax({
                    url: "{{route('gestscol.notes.get-evaluation-periode',$etablissement)}}",
                    type: "GET",
                    data:{
                        "periodeId": periodeId,
                    },

                    success:function(response){
                        console.log(response);
                        let data = ""
                        
                        $('#sous_periode').empty();
                        $('#sous_periode').prop("disabled", false);

                        data += "<option>Selectionnez une sous periode</option>";
                        $.each(response, function(key,val){
                            data+="<option value="+val.id+">"+val.numero+"</option>";
                        });
                       
                        $('#sous_periode').append(data);
                       
                    },
                    error: function(errors){
                       console.log(errors);
                       $('#sous_periode').prop("disabled", true);
                    }
                });
            });

            $('#saveEvaluation').on('click',function(){
                let classeAnnee = $('#classeAnneeId').val();
                let matiereNiveau = $('#matiere_niveau').val();
                let periodeId = $('#periodeId').val();
                let sousPeriode = $('#sous_periode').val();
                let evaluation= $('#evaluation_id').val();
                let baremeEvaluation = $('#bareme').val();
                let dateEvaluation = $('.date_evaluation').val();
                let commentataire = $('#commentataire').val();

                if(classeAnnee == ""|| matiereNiveau=="" || periodeId=="" || sousPeriode=="" || evaluation=="" || baremeEvaluation == "" || dateEvaluation == "" ){
                    alert('Parameter failure');
                }else{

                    $.ajax({
                    url: "{{route('gestscol.notes.save_evaluation_periode',$etablissement)}}",
                    type: "POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "classe_annee_id":classeAnnee,
                        "classe_matiere_id": matiereNiveau,
                        "periode_id": periodeId,
                        "sous_periode_id": sousPeriode,
                        "date_evaluation": dateEvaluation,
                        "evaluation_id":evaluation,
                        "bareme": baremeEvaluation,
                        "commentataire": commentataire
                    },

                    success:function(response){
                        console.log(response);  
                        evaluationPeriode = response.evaluationPeriode;
                        bareme = evaluationPeriode.bareme;
                        let data = "";
                        data += '<div class="card-body" class="scroll-area-md">';
                        data += '<table class="mb-0 table table-hover">';
                        data += '<thead>';
                        data += '<tr> <th>N</th> <th>Nom de l\'Apprenant</th> <th>Note /'+evaluationPeriode.bareme+'</th> </tr>';
                        data += '</thead>';
                        data += '<tbody>';
                            $.each(response.elevesClasse, function(key,val){
                                let note = {
                                    "note": null,
                                    "eleve_classe_id": val.id,
                                    "evaluation_periode_id": evaluationPeriode.id
                                };

                                notes.push(note);

                                data += generatTBody(key+1, val.nom, '<input type="number" data-key="'+key+'" name="fieldStudent" step="0.01" min="0" value="" max="'+evaluationPeriode.bareme+'" id="'+val.id+'" class="form-control fieldStudent"/>' )
                            });
                        data += '</tbody>';
                        data += '</table>';
                        data += '</div>';
                   
                        $('#saveNote').removeClass("d-none");
                        $('#result-eleve').append(data);
                        $('#jsonData').val(notes.toString());

                    },
                    error: function(errors){
                       console.log(errors);
                       $('#result-eleve').empty();
                    }
                });
                }
            });

            $('#saveNote').on('click',function(){
                let error = false;
                $.each(notes, function(key, elt){
                    let inpute = $('input[data-key="'+key+'"]');
                    console.log(parseInt(inpute.val()));
                    if( parseFloat(inpute.val()) > parseFloat( bareme)){
                        inpute.addClass("border border-danger");
                        error = true;
                    }else{
                        inpute.removeClass("border border-danger");
                        notes[key].note = inpute.val();
                    }
                    
                });
                if(!error){
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
                }

                

            });

            var generatTBody = function (...val) {
                var th = "";
                var tr = "";
               
                for (let i = 0; i < val.length; i++) {
                     th += '<th>'+val[i]+'</th>';
                }
                tr = '<tr>'+th+'</tr>';
               
                return tr;
            }


        </script>
    @endpush
</x-gest-scol>