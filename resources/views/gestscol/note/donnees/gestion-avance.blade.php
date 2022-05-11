<x-gest-scol title="Gestion Avancée des notes">
    <div class="app-page-title" style="position:relative; top:0%;">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-share icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div> Gestion Avancée des Evaluations
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
                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true"
                        class="dropdown-menu dropdown-menu-right">
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
    <div class="alert alert-warning alert-dismissible fade show d-none" id="alert-warning" role="alert">
        Le pourcentage de cette periode ou sous periode doit etre égale à 100%
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body ">
                        <form class="">
                            @php
                                $enseignant = "";
                            @endphp
                            <table class="col-md-12">
                                <tr>
                                    <td>
                                        <div class="position-relative form-group"><label
                                                for="exampleSelect" class="">Classe <span
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
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Matière 
                                                <span style="color:red;">*</span>
                                            </label>
                                            <select name="classe_matiere_id" id="classe_matiere" class="form-control" disabled required>
                                                <option>Selectionnez une matiere</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Enseignant <span style="color:red;"> </span></label>
                                            <input name="enseignant" id="enseignant" placeholder="" type="text" class="form-control" disabled>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="limitation" class="">Limitation <span style="color:red;">*</span></label>
                                                <select name="periode_id" id="limitation" class="form-control" required disabled>
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
                

                <div id="evaluationPeriode">

                  
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function goTo(requestUrl,id) {
            if (id === null) {

            } else {
                requestUrl += ("?niveau=" + id)
                window.location = requestUrl;
            }
        }
    </script>

    @push('javascripts')
        <script type="text/javascript">
            
            jQuery(document).ready(function($) {
                $('#evaluationPeriode').empty();
                $('.limitation').empty();
                let idMatierAnnee = "";
                let idClasseAnnee = "";

                $('#classeAnneeId').on('change',function(ev){
                    classeAnneId = ev.target.value;
                    $('#evaluationPeriode').empty();
                    $('#periodeId').prop('selectedIndex',0)
                    $('#periodeId').prop('disabled',true)
                    $('#sous_periode').empty();
                    idMatierAnnee = "";
                    $.ajax({
                        url: "{{route('gestscol.notes.matiere-classe',$etablissement)}}",
                        type: "GET",
                        data:{
                            "classeAnneId": classeAnneId,
                        },

                        success:function(response){
                            console.log(response);
                            let data = ""
                            idClasseAnnee = ev.target.value;
                            $('#classe_matiere').empty();
                            $('#classe_matiere').prop("disabled", false);

                            data += "<option>Selectionnez une matiere</option>";
                            $.each(response, function(key,val){
                                data+="<option value="+val.id+">"+val.name+"</option>";
                            });
                        
                            $('#classe_matiere').append(data);
                        
                        },
                        error: function(errors){
                            console.log(errors);
                            $('#classe_matiere').prop("disabled", true);
                            //location.reload();
                        }
                    });
                }); 

                $('#classe_matiere').on('change',function(ev){
                    matiereAnne = ev.target.value;
                    $('#evaluationPeriode').empty();
                    $('#limitation').prop('selectedIndex',0)
                    $('#periodeId').prop('selectedIndex',0)
                    $('#sous_periode').empty();
                    idMatierAnnee = "";
                    $.ajax({
                        url: "{{route('gestscol.notes.ensaigant-matiere',$etablissement)}}",
                        type: "GET",
                        data:{
                            "matiereAnne": matiereAnne,
                        },

                        success:function(response){
                            console.log(response);
                            let data = ""
                            idMatierAnnee = matiereAnne;
                            $('#enseignant').prop("placeholder", response.name);
                            $('#limitation').prop("disabled", false);
                        },
                        error: function(errors){
                        console.log(errors);
                        $('#enseignant').prop("placeholder", "");
                        $('#limitation').prop("disabled", true);
                        //location.reload();
                        }
                    });
                }); 

                $("#limitation").on('change',function(ev){
                    $('.limitation').empty();

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

                    optionChoix();
                });

                function optionChoix(){
                    $('#periodeId').on('change',function(ev){
                        periodeId = ev.target.value;
                        $('#evaluationPeriode').empty();
                        $.ajax({
                            url: "{{route('gestscol.notes.sous-periode',$etablissement)}}",
                            type: "GET",
                            data:{
                                "periodeId": periodeId,
                                "isAvance": true,
                                "matiereAnne": idMatierAnnee,
                                "classeAnneId": idClasseAnnee,
                            },

                            success:function(response){
                                console.log(response);
                                let data = "";
                                let table = "";
                            
                                data += "<option>Selectionnez une sous periode</option>";
                                $.each(response.sousPeriodes, function(key,val){
                                    data+="<option value="+val.id+">"+val.numero+"</option>";
                                });
                                
                                
                                if (response.evaluations.length > 0) {
                                        var tb = "";
                                        var th = generateRowTh("","No","Evaluation","Date","Barème","SP","P","%SP","%P","Moy","Max","Min","Effectif","qMoy","%Moy");
                                    
                                    $.each(response.evaluations, function (i, evaluation) {
                                
                                        tb += generatTBody(
                                            '<input type="radio" data-key="'+evaluation.id+'" name="evaluation" class="evaluation" id="'+evaluation.id+'">',
                                            i+1,
                                            evaluation.evalutionName,
                                            evaluation.date_evaluation,
                                            evaluation.bareme,
                                            evaluation.spName,
                                            evaluation.pName,
                                            '<input style="width:100%;" id="spPourcent" type="number" value="'+evaluation.pourcentage_sous_periode+'" min="0" max="100" step="0.1" disabled/>',
                                            '<input style="width:100%;" data-key="'+evaluation.id+'" value="'+evaluation.pourcentage_periode+'" class="pPourcent" id="pPourcent" type="number" min="0" max="100" step="0.1"/>',
                                            evaluation.moy,
                                            evaluation.max,
                                            evaluation.min,
                                            evaluation.effectif,
                                            evaluation.qMoy,
                                            evaluation.pMoy+" %");
                                    });
                                    
                                       

                                        
                                    table +=generateMultiColumnTable(th,tb,"Resultat sur les pros");
                                        $('#evaluationPeriode').append(table);
                                        
                                        let evalution_id = 0;

                                        $('#updateNote').on('click',function(){
                                            $('.evaluation').each(function(key,val){
                                                if ($(this)[0].checked) {
                                                    evalution_id = $(this)[0].id
                                                }
                                            });
                                            if(evalution_id != 0){
                                                etablissement = "{{$etablissement->id}}";
                                                base_url = window.location.origin;
                                                url = "gestscol/"+etablissement+"/note/"+evalution_id+"/edit";
                                                window.location = base_url+"/"+ url;
                                            }
                                            
                                        });

                                        $('#saveEvaPeriode').on('click',function(){
                                            let evaluationPeriodes = [];
                                            let pSomme = 0;
                                            $('#alert-warning').addClass("d-none");

                                        
                                            $('.pPourcent').each(function(){
                                                evaluation = {
                                                    "id": $(this)[0].attributes['data-key'].value,
                                                    "p": $(this)[0].value ,
                                                };
                                                evaluationPeriodes.push(evaluation);
                                                pSomme = pSomme + parseInt($(this)[0].value);
                                            });

                                            if (pSomme !== 100) {
                                                $('#alert-warning').removeClass("d-none");
                                            } else {
                                                $.ajax({
                                                    url: "{{route('gestscol.notes.update-evaluation',$etablissement)}}",
                                                    type: "POST",
                                                    data:{
                                                        "_token": "{{ csrf_token() }}",
                                                        "evaluationPeriode":evaluationPeriodes
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
                                }else{
                                    table = '<div class="main-card mb-3 card">'+
                                                '<div class="card-body" class="scroll-area-md">'+ 
                                                    '<h3>Aucune Données disponible</h3>'+
                                                '</div>'+
                                            '</div>';
                                        $('#evaluationPeriode').append(table);
                                }

                            },
                            error: function(errors){
                                console.log(errors);
                                
                                //location.reload();
                            }
                        });
                    });

                    $('#sous_periode').on('change',function(ev){
                        sousPeriodeId = ev.target.value;
                        $('#evaluationPeriode').empty();
                        $.ajax({
                            url: "{{route('gestscol.notes.get-evaluation-periode',$etablissement)}}",
                            type: "GET",
                            data:{
                                "sousPeriodeId": sousPeriodeId,
                                "matiereAnne": idMatierAnnee,
                                "classeAnneId": idClasseAnnee,
                            },

                            success:function(response){
                                console.log(response);
                                let table = "";

                                var th = generateRowTh("","No","Evaluation","Date","Barème","SP","P","%SP","%P","Moy","Max","Min","Effectif","qMoy","%Moy");
                                if (response.length > 0) {
                                        var tb = "";
                                        
                                       
                                            $.each(response, function (i, evaluation) {
                                                tb += generatTBody(
                                                    '<input type="radio" class="evaluation" data-key="'+evaluation.id+'" name="evaluation" id="'+evaluation.id+'">',
                                                    i+1,
                                                    evaluation.evalutionName,
                                                    evaluation.date_evaluation,
                                                    evaluation.bareme,
                                                    evaluation.spName,
                                                    evaluation.pName,
                                                    '<input style="width:100%;" data-key="'+evaluation.id+'" id="spPourcent" type="number" min="0" max="100" value="'+evaluation.pourcentage_sous_periode+'" class="spPourcent" step="0.1"/>',
                                                    '<input style="width:100%;" data-key="'+evaluation.id+'" id="pPourcent" type="number" min="0" max="100" value="'+evaluation.pourcentage_periode+'" step="0.1" disabled/>',
                                                    evaluation.moy,
                                                    evaluation.max,
                                                    evaluation.min,
                                                    evaluation.effectif,
                                                    evaluation.qMoy,
                                                    evaluation.pMoy+" %");
                                            });
                                        
                                        

                                        table +=generateMultiColumnTable(th,tb,"Resultat sur les pros");
                                        $('#evaluationPeriode').append(table);
                                        let evalution_id = 0;

                                        $('#updateNote').on('click',function(){
                                            $('.evaluation').each(function(key,val){
                                                if ($(this)[0].checked) {
                                                    evalution_id = $(this)[0].id
                                                }
                                            });
                                            if(evalution_id != 0){
                                                etablissement = "{{$etablissement->id}}";
                                                base_url = window.location.origin;
                                                url = "gestscol/"+etablissement+"/note/"+evalution_id+"/edit";
                                                window.location = base_url+"/"+ url;
                                            }
                                            
                                        });

                                        $('#saveEvaPeriode').on('click',function(){
                                            let evaluationPeriodes = [];
                                            let spSomme = 0;
                                            $('#alert-warning').addClass("d-none");
                                            $('.spPourcent').each(function(){
                                                evaluation = {
                                                    "id": $(this)[0].attributes['data-key'].value,
                                                    "sp": $(this)[0].value ,
                                                };

                                                evaluationPeriodes.push(evaluation);
                                                spSomme = spSomme + parseInt($(this)[0].value);
                                            });
                                            console.log(spSomme);
                                            if (spSomme !== 100) {
                                                $('#alert-warning').removeClass("d-none");
                                            } else {
                                                
                                                $('#alert-warning').addClass("d-none");
                                                $.ajax({
                                                    url: "{{route('gestscol.notes.update-evaluation',$etablissement)}}",
                                                    type: "POST",
                                                    data:{
                                                        "_token": "{{ csrf_token() }}",
                                                        "evaluationPeriode":evaluationPeriodes
                                                    },

                                                    success:function(response){
                                                        console.log(response);  
                                                        $('#alert-success').removeClass("d-none");
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
                                }
                                else{
                                    table = '<div class="main-card mb-3 card">'+
                                                '<div class="card-body" class="scroll-area-md">'+ 
                                                    '<h3>Aucune Données disponible</h3>'+
                                                '</div>'+
                                            '</div>';
                                        $('#evaluationPeriode').append(table);
                                }
                            },
                            error: function(errors){
                            console.log(errors);
                            $('#sous_periode').prop("disabled", true);
                            //location.reload();
                            }
                        });
                    });
                }

                

                var generateMultiColumnTable = function (thead, tbody,title) {
                    var table = '<div class="main-card mb-3 card">'+
                                    '<div class="card-body" class="scroll-area-md">'+ 
                                        '<table class="mb-2 table table-hover">'+
                                            '<thead>'+
                                            '<tr>'+
                                                thead+
                                            '</tr>'+
                                            '</thead>'+
                                            '<tbody >'+
                                                tbody+
                                            '</tbody>'+
                                        '</table>'+
                                        '<button class="m-1 btn btn-warning text-white">Consulter</button>'+
                                        '<button class="m-1 btn btn-secondary" id="updateNote">Modifier</button>'+
                                        '<button class="m-1 btn btn-success" id="saveEvaPeriode">Enregistrer</button>'+
                                        '<button class="m-1 btn btn-danger" id="deleteEvaPeriode">Supprimer</button>'+
                                    '</div>'+
                                '</div>';   
                    return table;
                }

                //fonction qui permet de creer les entetes et le body d\'un table a une ligne 
                var generateRowTh = function (... val) {
                    var th = "";
                    for (let i = 0; i < val.length; i++) {
                        th += '<th>'+val[i]+'</th>';
                    }
                    return th;
                }

                var generatTBody = function (...val) {
                    var th = "";
                    var tr = "";
                
                    for (let i = 0; i < val.length; i++) {
                        th += '<th>'+val[i]+'</th>';
                    }
                    tr = '<tr>'+th+'</tr>';
                
                    return tr;
                }

                var generatTBodyEmpty = function (val,size) {
                    var th = "";
                    var tr = "";
                
                   
                    th += '<th colspan="'+size+'" classe="text-center">'+val+'</th>';
                    
                    tr = '<tr>'+th+'</tr>';
                
                    return tr;
                }
            
                
            })

            
        </script>    
    @endpush
</x-gest-scol>