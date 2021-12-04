<x-gest-scol title="Affectation des matieres">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title" style="position:relative; top:0%;">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-display2 icon-gradient bg-happy-itmeo">
                            </i>
                        </div>
                        <div>Répartition des Enseignants dans les Classes</div>
                    </div>
                    <div class="page-title-actions">
                       
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

            <x-flashback></x-flashback>
            <div class="card mb-3 main-card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-form-label px-3">Niveaux</label>
                        <div class="col-md-3">
                            <select name="" id="niveau" class="form-control">
                                <option value="">Selectionner un niveau</option>
                                @forelse ($niveaux as $niveau)
                                    <option value="{{$niveau->id}}" @if ((isset($niveauSeleted)) && ($niveau->id == $niveauSeleted))
                                        selected
                                    @endif >{{$niveau->name}}</option>
                                @empty
                                    <option>Aucun niveau</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>
                                        <div class="search-wrapper">
                                            <div class="input-holder">
                                                <input type="text" class="search-input" placeholder="Rechercher un enseignant...">
                                                <button class="search-icon"><span></span></button>
                                            </div>
                                            <button class="close"></button>
            
                                        </div>  
                                    </td>
                                    <td>
                                        <button class="mt-1 btn btn-primary">Lister</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="card-body pt-3"> 
                            <h5 class="card-title" style="color:black;">Tous les enseignants</h5>
                            <table id="myTable" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom de l'Enseignant</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($enseignants as $key => $enseignant)
                                        <tr>
                                            <td width="10%">{{$key + 1}}</td>
                                            <td width="80%">{{$enseignant->name}}</td>
                                            <td><input type="radio" name="enseignant_annee_id" id="{{$enseignant->id}}"></td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center">Aucun enseignant crée</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
    
                </div>
                <div class="col-lg-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table>
                                <tr >
                                    <td width="60%" >
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <div class="position-relative form-group">
                                                    <select name="select" id="classe" name="classe_annee_id" class="form-control" required>
                                                        <option value="">liste des classes</option>
                                                        @forelse ($classes as $classe)
                                                            <option value="{{$classe->id}}" >{{$classe->name}}</option>
                                                        @empty
                                                            <option>Aucune classe disponible</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="effectif" class="pt-2"></div>
                                            </div>
                                        </div>
                                        
                                        
                                    </td>
                                </tr>
                            </table>
    
                        </div>
                      
                        <div class="card-body pt-1">
                            <h5 class="card-title" style="color:black;"> Matiere du niveau</h5>
                            <table class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nom de la matiere</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody id="result-apprenant">
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button class="mt-1 btn btn-secondary"><a href="index.html" style="color:white; text-decoration:none;">Annuler</a></button>
                    <a href="index.html"><button class="mt-1 btn btn-success">Affecter</button></a>
                </div>
                </td>
                </tr>
    
                <tr>
                    <th scope="row" colspan="5">
                </tr>
                </tr>
                </tbody>
                </table>
            </div>
            <div class="main-card mb-3 card">
    
                <div class="card-body" class="scroll-area-md">
                    <!-- <h5 class="card-title">Table with hover</h5> -->
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
    
                                <th>Matière</th>
                                <th>Enseignant</th>
    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
    
                                <td width="50%">Anglais</td>
                                <td>ABAH BIKOA Léonie Caline Neully</td>
    
    
    
                            </tr>
    
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
    </div>
    <script>
        function selectNiveau(requestUrl,id) {
            if (id === null) {

            } else {
                requestUrl += ("?niveau=" + id)
                window.location = requestUrl;
            }
        }
    </script>

    @push('javascripts')
        <script>
            let niveau = "";
            $('#niveau').on('change',function(ev){
                niveau = ev.target.value;
                selectNiveau("{{route('gestscol.matiere.affectations', $etablissement)}}",niveau)
            });

            $('#result-apprenant').empty();
            $('#effectif').empty();
            let classe_id = "";


            // $('#classe').on('change',function (ev) {
            //     classe_id = ev.target.value;
            //     niveau = $('#niveau').val();
            //     console.log($('#niveau'))
            //     $.ajax({
            //         url: "{{route('gestscol.student.eleve-classe',$etablissement)}}",
            //         type: "POST",
            //         data:{
            //             "_token": "{{ csrf_token() }}",
            //             classe: classe_id,
            //             niveau: niveau
            //         },

            //         success:function(response){
            //             console.log(response);
            //             let data = ""
            //             let effectif = "Effectifs : "+response.length
            //             $('#effectif').append(effectif);

            //             $.each(response, function(key,val){
            //                 console.log(key+'=='+val);
            //                 data+=generatTBody(key+1,val?.nom,'<input type="checkbox" class="appClass" name="" id="'+val.id+'">');
            //             });
            //             $('#result-apprenant').append(data);
            //         },
            //         error: function(errors){
            //         console.log(errors)
            //         }
            //     });
            // });

            $('#envoyer').on('click',function(){
                let apprenants = [];
                $('.appSansClass').each(function(key,val){
                    if ($(this)[0].checked) {
                        apprenants.push($(this)[0].id)
                    }
                });

                if(apprenants.length == 0){
                    alert('selectionnez au moins un eleve');
                    return;
                }
                if(classe_id == ""){
                    alert('selectionnez un classe');
                    return;
                }

                $.ajax({
                    url: "{{route('gestscol.student.addaffectations',$etablissement)}}",
                    type: "POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        dataAffectation: apprenants,
                        classe : classe_id
                    },

                    success:function(response){
                        location.reload();
                    },
                    error: function(errors){
                    console.log(errors)
                    }
                });
            });

            $('#remove').on('click',function(){
                let apprenants = [];
                $('.appClass').each(function(key,val){
                    if ($(this)[0].checked) {
                        apprenants.push($(this)[0].id)
                    }
                });

                if(apprenants.length == 0){
                    alert('selectionnez au moins un eleve');
                    return;
                }
            

                $.ajax({
                    url: "{{route('gestscol.student.removeaffectations',$etablissement)}}",
                    type: "POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        dataAffectation: apprenants,
                        classe : classe_id
                    },

                    success:function(response){
                        location.reload();
                    },
                    error: function(errors){
                    console.log(errors)
                    }
                });
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