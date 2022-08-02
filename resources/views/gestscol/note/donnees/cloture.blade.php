<x-gest-scol title="cloture">
    <div class="app-page-title" style="position:relative; top:0%;">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>Calculs de Notes
                    
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-secondary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-cog fa-w-20"></i>
                        </span>
                        Actions
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true"
                        class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <i class="fa fa-download fa-w-20"></i> &ensp; &ensp;
                                    <span>
                                        Exporter
                                    </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <i class="fa fa-print fa-w-20"></i> &ensp; &ensp;
                                    <span>
                                        Imprimer
                                    </span>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <i class="fa fa-trash fa-w-20"></i> &ensp; &ensp;
                                    <span>
                                        Supprimer
                                    </span>

                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-danger alert-dismissible fade show d-none" id="alert-danger" role="alert">
        Vous devez choisir la classe, une limitation et une periode.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="main-card mb-2 card">

                <div class="card-body">
                    <form class="">
                        <table style="table-layout: fixed;">
                            <tr>
                                <td style="width: 33%;">
                                    <div class="position-relative form-group"><label for="exampleSelect"
                                            class="">Classe</label>
                                            <select name="classe_annee_id" id="classeAnneeId" class="form-control" required>
                                                <option value="">selectionnez une classe</option>
                                                @foreach ($classes as $classe)
                                                    <option value="{{$classe->id}}">{{$classe->name}}</option>
                                                @endforeach
    
                                            </select>
                                    </div>
                                </td>
                                <td style="width: 33%;">
                                    <div class="position-relative form-group"><label for="limitation"
                                            class="">Limitation</label>
                                            <select name="periode_id" id="limitation" class="form-control" onchange="UI.Module.Cloture.GetLimitation(this.value)" required>
                                                <option value="">selectionnez une limite</option>
                                                <option value="sp">Sous-Période</option>
                                                <option value="p">Période</option>
                                            </select>
                                    </div>
                                </td>
                                <td >
                                    <div class="position-relative form-group limitation">
                                        <label for="Choix_limite" class="">Choix <span style="color:red;">*</span></label>
                                        <select name="sous_periode_id" id="Choix_limite" class="form-control Choix_limite" required>
                                            <option value="">selectionnez une limite</option>
                                        </select>
                                    </div>
                                </td>
                                


                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="main-card mb-3 card">
                <div class="card-body" class="scroll-area-md">
                    <button class="mt-1 btn btn-success" id="clotureBtn" disabled>Lancer la
                        Clôture
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="main-card mb-3 card" id="cloture">
               
            </div>
        </div>
        <div class="col-lg-4">
            <div class="main-card mb-3 card">
                <div class="card-body card-shadow-primary" style="float: left; overflow-y: scroll;">
                    <table class="mb-0 table table-bordered">
                        <thead>
                            <tr>
                                <th>Elèves Non Classés</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ABAH BIKOA Léonie Caline Neully</td>
                            </tr>
                            <tr>
                                <td>Gilles Fabrizio ZANETTIN</td>
                            </tr>
                            <tr>
                                <td>ZANGA Berthe Gladys</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('javascripts')
        
        
        
        <script type="text/javascript" src="{{ asset('lib/modules/cloture.js') }}"></script>
        <script>
            UI.Module.Cloture.listPeriode = @json($periodes);
            UI.Module.Cloture.listSousPeriode = @json($sous_periodes)
        </script>
        {{-- <script>
            
            
            $('#clotureBtn').prop("disabled", true);

            $("#classeAnneeId").on('change',function(ev){
                ressetAll(true);
            })

            $("#limitation").on('change',function(ev){
                $('.limitation').empty();
                $('#cloture').empty();
                $('#clotureBtn').prop("disabled", true);

                limit = ev.target.value;
                if(limit == "sp"){
                    $('.limitation').append(
                        '<label for="sous_periode" class="">Choix <span style="color:red;">*</span></label>'+
                        '<select name="sous_periode_id" id="sous_periode" class="form-control" required>'+
                            '<option value="">selectionnez une limite</option>'+
                            @foreach ($sous_periodes as $sous_periode)
                                '<option value="{{$sous_periode->id}}">{{$sous_periode->numero}}</option>'+
                            @endforeach
                        '</select>'
                    );

                }else{
                    $('.limitation').append(
                        '<label for="periodeId" class="">Choix <span style="color:red;">*</span></label>'+
                        '<select name="periode_id" id="periodeId" class="form-control" required>'+
                            '<option value="">selectionnez une limite</option>'+
                            '@foreach ($periodes as $periode)'+
                                '<option value="{{$periode->id}}">{{$periode->numero}}</option>'+
                            '@endforeach'+
                        '</select>'
                    );                        
                }
                optionChoix(limit)
            });
            

            function optionChoix(limit){
                let data =null;
                $('#periodeId').on('change',function(ev){
                    ev.preventDefault();
                    $('#cloture').empty();
                    data = {
                        "periode_id": ev.target.value,
                        "classe_annee_id": $('#classeAnneeId').val()
                    };
                    if($('#classe_annee_id').val() != "" && $('#limitation').val() == limit){
                        $('#clotureBtn').prop("disabled", false);
                        msg ="Cloture de la période "+ev.target.value;
                        PrevisionnelCloture(data,msg);
                    }
                
                });

                $('#sous_periode').on('change',function(ev){
                    ev.preventDefault();
                    $('#cloture').empty();
                    data = {
                        "classe_annee_id": $('#classeAnneeId').val(),
                        "sous_periode_id": ev.target.value,
                    };
                    console.log(data);
                    if($('#classe_annee_id').val() != "" && $('#limitation').val() == limit){
                        $('#clotureBtn').prop("disabled", false);
                        msg ="Cloture de la sous période "+ev.target.value;
                        PrevisionnelCloture(data,msg); 
                    }
                });


            }

            function PrevisionnelCloture(data,msg){
                $('#clotureBtn').off().on('click',function(ev){
                    ev.preventDefault();
                    $('#cloture').empty();
                    $.ajax({
                        url: "{{route('gestscol.cloture.periode',$etablissement)}}",
                        type: "GET",
                        data : data,
                        success:function(response){
                            console.log(response);
                            
                            let elevesNotes = response.eleves;
                            let matiereAnnees = response.matieres;
                            let table ="";
                            if(elevesNotes.length>0){
                                var tb = "";
                                let matieres = [];
                                $.each(matiereAnnees, function (i, item) {
                                    matieres.push(item.abreviation);
                                })
                                var th = generateRowTh("N°","Nons Apprenant","A","Red","Rang","M.Gen","M.Grp1","M.Grp2","M.Grp3",...matieres);
                                
                                $.each(elevesNotes, function (i, eleve) {
                                    let ancien = eleve.ancien == 0? "Non":"Oui";
                                    let redoublant = eleve.is_redouble == 0? "Non":"Oui";
                                    // let noteMatieres = ...eleve.notesEleve.noteParMatiere;
                                    let ListNotes = [];
                                    $.each([...eleve.notesEleve.noteParMatiere],function(index,elt){
                                        ListNotes.push(elt.note);
                                    });
                                    tb += generatTBody(
                                        i+1,
                                        eleve.nom,
                                        ancien,
                                        redoublant,
                                        i+1,
                                        eleve.notesEleve.moyenGenerale,
                                        eleve.notesEleve.moyenGrp1,
                                        eleve.notesEleve.moyenGrp2,
                                        eleve.notesEleve.moyenGrp3,
                                        ...ListNotes
                                    );
                                });
                            }
                            table +=generateMultiColumnTable(th,tb,msg);
                            $('#cloture').append(table);

                            $('#saveCloture').on('click',function(){
                                let synthese = [];
                                let itemSynthese = null;
                                let effectifs = 0;

                                // gestion des synthese 
                                $.each(elevesNotes, function(i,eleveNote){
                                    let som_point = 0;
                                    let som_coef = 0;
                                    let moyenne_generale = 0;
                                    let rang = 0;
                                    let mention = "";
                                    $.each(eleveNote.notesEleve.noteParMatiere, function(y,matiere){
                                        som_point = som_point + (matiere.note * matiere.coef);
                                        som_coef = som_coef + matiere.coef;
                                    });

                                    if (eleveNote.notesEleve.moyenGenerale < 8) {
                                        mention = "Insuffisant";
                                    }else if(eleveNote.notesEleve.moyenGenerale < 10 && eleveNote.notesEleve.moyenGenerale >= 8){
                                        mention = "Mediocre";
                                    }else if(eleveNote.notesEleve.moyenGenerale < 12 && eleveNote.notesEleve.moyenGenerale >= 10){
                                        mention = "Passable";
                                    }else if(eleveNote.notesEleve.moyenGenerale < 14 && eleveNote.notesEleve.moyenGenerale >= 12){
                                        mention = "Assez-Bien";
                                    }else if(eleveNote.notesEleve.moyenGenerale < 16 && eleveNote.notesEleve.moyenGenerale >= 14){
                                        mention = "Bien";
                                    }else if(eleveNote.notesEleve.moyenGenerale < 18 && eleveNote.notesEleve.moyenGenerale >= 16){
                                        mention = "Très-Bien";
                                    }else if(eleveNote.notesEleve.moyenGenerale >= 18){
                                        mention = "Excéllent";
                                    }
                                    
                                    itemSynthese = {
                                        eleve_classe_id:eleveNote.eleve_id,
                                        som_point: som_point.toFixed(2),
                                        som_coef: som_coef,
                                        moyenne_generale: eleveNote.notesEleve.moyenGenerale,
                                        rang: i + 1,
                                        mention:mention,
                                        appreciation:""
                                    }

                                    synthese.push(itemSynthese);
                                    effectifs = effectifs + 1;
                                });
                                // gestion des lignes de synthese
                                let ligneSyntheseArray = [];
                                $.each(elevesNotes, function(i,eleve){
                                    let arrayNoteEleves = eleve.notesEleve.noteParMatiere;
                                    $.each(arrayNoteEleves, function(y, noteEleve){
                                        let ligneSynthese = {
                                            eleve_classe_id : eleve.eleve_id,
                                            classe_matiere_id : noteEleve.classe_matiere_id,
                                            groupe_matiere_id : noteEleve.groupe_matiere_id,
                                            total_point : noteEleve.note * noteEleve.coef,
                                            coef : noteEleve.coef,
                                            moyenne : noteEleve.note,
                                            rang : calculeRang(elevesNotes, noteEleve.note, noteEleve.classe_matiere_id)
                                        };

                                        ligneSyntheseArray.push(ligneSynthese);
                                    });
                                });

                                // gestion de ligne de groupe
                                let ligneGroupeArray = [];
                                $.each(elevesNotes, function(i,eleve){
                                    let ligneGroupes = eleve.notesEleve.ligneGroupes;
                                    $.each([...ligneGroupes],function(index, ligne){
                                        let itemLigne = {
                                            eleve_classe_id : eleve.eleve_id,
                                            somme_point : (ligne.coef * ligne.moyenne_groupe).toFixed(2),
                                            somme_coef : ligne.coef,
                                            moyenne_groupe : ligne.moyenne_groupe,
                                            groupe_matiere_id : ligne.groupe_matiere_id
                                        };
                                        ligneGroupeArray.push(itemLigne);
                                    })
                                    
                                });
                                
                                // object de la cloture
                                let datas = {
                                    _token: "{{ csrf_token() }}",
                                    ...data,
                                    annee_academique_id: elevesNotes[0].annee_academique_id,
                                    ...moyennGroupe(elevesNotes),
                                    listeSynthese: synthese,
                                    effectif: effectifs,
                                    listeLigneSynthese : ligneSyntheseArray,
                                    listLigneGroupe : ligneGroupeArray
                                };

                                console.log(datas);
                                saveCloture(datas);
                            });
                        },
                        error: function(errors){
                            console.log(errors);
                            setTimeout(() => {
                                location.reload(); 
                            }, 1000);
                        }
                    });
                });
            }


            function saveCloture(data){
                console.log(data);
                $.ajax({
                        url: "{{route('gestscol.cloture.saveCloture',$etablissement)}}",
                        type: "POST",
                        data : data,
                        success:function(response){
                            console.log(response);
                            
                        },
                        error: function(errors){
                            console.log(errors);
                        }
                    });
            }

            var generateMultiColumnTable = function (thead, tbody, title) {
                
                var table = '<div class="card-body" style="float: left; overflow-x: scroll;">'+
                                '<h5 class="card-title" style="color:black;">'+title+'</h5>'+
                                 
                                '<table id="myTable" class="table border " cellspacing="0" width="100%" style="white-space:nowrap;">'+
                                    '<thead>'+
                                    '<tr>'+
                                        thead+
                                    '</tr>'+
                                    '</thead>'+
                                    '<tbody >'+
                                        tbody+
                                    '</tbody>'+
                                '</table>'+
                                '<button class="m-1 btn btn-info text-white" id="saveCloture">Cloturer</button>'+
                                '<button class="m-1 btn btn-secondary" id="updateNote">Exporter</button>'+
                                
                            '</div>';   
                return table;
            }

            //fonction qui permet de creer les entetes et le body d\'un table a une ligne 
            var generateRowTh = function (... val) {
                var th = "";
                for (let i = 0; i < val.length; i++) {
                    th += '<th class="border">'+val[i]+'</th>';
                }
                return th;
            }

            var generatTBody = function (...val) {
                var th = "";
                var tr = "";
            
                for (let i = 0; i < val.length; i++) {
                    th += '<td class="border">'+val[i]+'</td>';
                }
                tr = '<tr>'+th+'</tr>';
            
                return tr;
            }

            function ressetAll(limit=false){
                $('#cloture').empty();
                if(limit == true){
                    $('.limitation').empty();
                }
            }

            function moyennGroupe(lists){
                let moy_generale = 0;
                let moyenne_max = 0;
                let moyenne_min = lists[0].notesEleve.moyenGenerale;

                if(lists.length > 0){
                    $.each(lists, function(i,elt){
                        moy_generale = moy_generale + elt.notesEleve.moyenGenerale;
                        if(moyenne_max < elt.notesEleve.moyenGenerale){
                            moyenne_max = elt.notesEleve.moyenGenerale;
                        }
                        if(moyenne_min > elt.notesEleve.moyenGenerale){
                            moyenne_min = elt.notesEleve.moyenGenerale;
                        }
                    });
                }

                return {
                    moy_classe:(moy_generale/lists.length).toFixed(2),
                    moy_max:moyenne_max.toFixed(2),
                    moy_min:moyenne_min.toFixed(2),
                };
            }

            function calculeRang(eleves, note, classe_matiere_id){
                let notes = [];
                $.each(eleves, function(i,eleve){
                    let arrayNoteEleves = eleve.notesEleve.noteParMatiere;
                    notes.push(arrayNoteEleves.find(elt => elt.classe_matiere_id == classe_matiere_id).note); 
                });
                notes = notes.sort(function(a,b){return b - a});
                return notes.findIndex(elt => elt == note) + 1;
            }
            
        </script> --}}
        
         
    @endpush
</x-gest-scol>