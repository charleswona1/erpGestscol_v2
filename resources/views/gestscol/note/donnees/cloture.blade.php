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
                                            <select name="periode_id" id="limitation" class="form-control" required>
                                                <option value="">selectionnez une limite</option>
                                                <option value="sp">Sous-Période</option>
                                                <option value="p">Période</option>
                                            </select>
                                    </div>
                                </td>
                                <td >
                                    <div class="position-relative form-group limitation">
                                        
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
                            Clôture</button>
                    <button class="mt-1 btn btn-secondary"><a href="index.html"
                            style="color:white; text-decoration:none;">Annuler</a></button>
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
        <script>
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
                        cloture(data,msg);
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
                        cloture(data,msg); 
                    }
                });


            }

            function cloture(data,msg){
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
                                        ...eleve.notesEleve.noteParMatiere
                                        );
                                });
                            }
                            table +=generateMultiColumnTable(th,tb,msg);
                            $('#cloture').append(table);
                        },
                        error: function(errors){
                            console.log(errors);
                        }
                    });
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
                                '<button class="m-1 btn btn-info text-white">Imprimerr</button>'+
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
        </script>
    @endpush
</x-gest-scol>