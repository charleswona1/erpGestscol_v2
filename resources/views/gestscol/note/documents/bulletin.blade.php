<x-gest-scol title="Modification d'une classe">
    <div class="app-page-title" style="position:relative; top:0%;">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-display2 icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>Bulletins de Notes des Apprenants</div>
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

    <div class="row">
        <div class="col-lg-8">
            <div class="main-card mb-2 pb-0 card">

                <div class="card-body ">
                    <form class="table">
                        <table style="width:100%; white-space:nowrap;">
                            <tr>
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
                                <td>
                                    <div class="position-relative form-group"><label for="exampleSelect"
                                            class="">Classe</label>
                                        <select name="select" id="classe_annee_id" class="form-control"
                                            required>
                                            <option>Selectionnez une classe</option>
                                            @foreach ($classes as $classe)
                                                 <option value="{{$classe->id}}">{{$classe->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="exampleSelect"
                                            class="">Format</label>
                                        <select name="select" id="exampleSelect" class="form-control"
                                            required>
                                            <option>A4</option>
                                            <option>A5</option>
                                        </select>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="form-group">

                                        <textarea class="form-control" placeholder="Note de bas de page"
                                            id="exampleTextarea" rows="1"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="main-card mb-1 card">

                <div class="card-body" class="scroll-area-md">
                   <!-- <center>
                        <img width="150" class="border shadow" src="assets/images/avatars/1.jpg" alt="">
                    </center> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- section Bulletin -->
        <div class="col-lg-8">
            <div class="main-card mb-1 card">
                
            </div>

            <div class="main-card mb-3 card" id="bulletin-card">
                
            </div>
        </div>


        <!-- section apprenant -->
        <div class="col-lg-4">
            <div class="main-card mb-3 card">
                <div class="card-body card-shadow-primary"
                    style="float: left; overflow-y: scroll; height:500px;">
                    <!--<h5 class="card-title"> Matricules des Apprenants</h5> -->

                    <div id="filter-bulletin">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="without-header">
                            <label class="custom-control-label" for="without-header">Imprimer sans entête</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="select-class">
                            <input id="etablissement" name="etablissement" type="hidden" value={{$etablissement->id}}>
                            <label class="custom-control-label" for="select-class">Sélectionner toute la classe</label>
                        </div>
                    </div>
                    
                    <br/>
                      
                    <div id="liste_eleves">

                    </div>
                    <div id="btn-export-pdf">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('javascripts')
        <script>
            var periode_type = '';
            var periode_id = null;
            
            var student_id = null;
            var etablissement_id = $('#etablissement')[0].attributes.value.value;

            console.log(etablissement_id);
            $('#limitation').prop('selectedIndex',0);
            $('#classe_annee_id').prop('selectedIndex',0);

            $('#filter-bulletin').hide();
            
            $("#limitation").on('change',function(ev){
                $('.limitation').empty();
                $('#cloture').empty();
                $('#clotureBtn').prop("disabled", true);
                
                
                limit = ev.target.value;
                periode_type = limit;

                if(limit == "sp"){
                    $('.limitation').append(
                        '<label for="sous_periode" class="">Sous période <span style="color:red;">*</span></label>'+
                        '<select name="sous_periode_id" id="sous_periode" class="form-control" required>'+
                            '<option value="">selectionnez une sous période</option>'+
                            @foreach ($sous_periodes as $sous_periode)
                                '<option value="{{$sous_periode->id}}">{{$etablissement->nom_sous_periode }} {{$sous_periode->numero}}</option>'+
                            @endforeach
                        '</select>'
                    );

                    $('#sous_periode').on('change', function(ev){
                        periode_id = ev.target.value;
                    });

                } else {
                    $('.limitation').append(
                        '<label for="periodeId" class="">Période <span style="color:red;">*</span></label>'+
                        '<select name="periode_id" id="periodeId" class="form-control" required>'+
                            '<option value="">selectionnez une période</option>'+
                            '@foreach ($periodes as $periode)'+
                                '<option value="{{$periode->id}}">{{$etablissement->nom_periode }} {{$periode->numero}}</option>'+
                            '@endforeach'+
                        '</select>'
                    );

                    $('#periodeId').on('change', function(ev){
                        periode_id = ev.target.value;
                    });                        
                }
                getEleve();
            });

            $('#classe_annee_id').on('change',function(e){
                getEleve(e.target.value);
            })

            // let studentId = 1;
            // let periode = 1; 
            // let $limitation = 'sp';
            // let etablissement = $etablissement;

            function getEleve(val) {
                $('#liste_eleves').empty();
                $.ajax({
                    url: "{{route('gestscol.bulletins.eleves',$etablissement)}}",
                    type: "GET",
                    data : {
                        classe_id: val,
                    },
                    success:function(response) {
                       
                        let table ="";

                        // console.log("====================== etablissement");
                        // console.log(etablissement);

                        if(response.length > 0) {

                            $('#filter-bulletin').show();
                            var tb = "";
                            
                            $('#select-class').on('change',function(e) {
                                console.log($('.form-check'))
                                
                                let isCheck = $('#select-class').prop('checked');
                                console.log($('#eleve_0'))
                                $("input[name='eleve']").prop("checked", isCheck);
                                // $('#eleve_0').prop('checked', isCheck)   
                            })
                            var th = generateRowTh("N°","Nons Apprenant");
                            
                            $.each(response, function (i, eleve) {
                              
                                tb += generatTBody(
                                    i+1,
                                    eleve.nom,
                                    '<input type="radio" value="'+ eleve.id +'" name="eleve" class="form-check" id="'+ eleve.id +'">'
                                );
                            });

                                                        
                            table +=generateMultiColumnTable(th,tb,"");
                            $('#liste_eleves').append(table);
                            $('.form-check').on('change',function(e) {
                                $('#bulletin-card').empty();
                                var hasHeader = true;
                                $("input[id='without-header']").prop("checked", false);
                                student_id = $(this)[0].attributes.id.value,

                                $.ajax({
                                    url: "{{route('gestscol.bulletins.bulletin-data',$etablissement)}}",
                                    type: "GET",
                                    data : {
                                        student_id: student_id,
                                        limitation: periode_type,
                                        periode: periode_id
                                    },
                                    success:function(response) {
                                        console.log(response);

                                        let total_point = 0;
                                        let rang = response["rang"];
                                        let coef = 0;
                                        let moyenne = 0;
                                        
                                        let ligneGroupes = response["ligneGroupes"];

                                        console.log("=========== ligneGroupes")
                                        console.log(ligneGroupes);
                                        let syntheseClasse = response["syntheseClasse"];
                                        let tableBul ="";
                                        
                                        dataBulletin = {
                                            "ligneGroupes": ligneGroupes,
                                            "syntheseClasse": syntheseClasse,
                                            "rang": rang
                                        };

                                        if(!response["success"]) {
                                            tableBul  += '<div class="page-title-heading p-4">' +
                                                '<div style="font-size: x-large;">Impossible de fournir le bulletin de note de cet apprenant</div>' +
                                            '</div>'

                                            $('#btn-export-pdf').empty();
                                        } else {

                                            var btn = generateButtonExportPdf(1,student_id,periode_id,periode_type,true);
                                                $('#btn-export-pdf').empty();
                                                $('#btn-export-pdf').append(btn);

                                    
                                            
                                            $('#without-header').on('change',function(e) {
                                                console.log(" ==================== success =============")
                                                console.log(ligneGroupes)
                                                if(ligneGroupes) {
                                                    let isCheck = $('#without-header').prop('checked');
                                                    console.log("============== isCheck ===============")
                                                    hasHeader = !isCheck
                                                    console.log(hasHeader)
                                                    var btn = generateButtonExportPdf(etablissement_id, student_id,periode_id,periode_type,hasHeader);
                                                    $('#btn-export-pdf').empty();
                                                    $('#btn-export-pdf').append(btn);
                                                }
                                        
                                               
                                                
                                            })
                                            
                                            

                                            console.log(hasHeader);


                                            for(let i = 0; i < ligneGroupes.length; i++) {
                                                let ligneSyntheses = ligneGroupes[i]["ligneSyntheses"];

                                                total_point += ligneGroupes[i]['somme_point'];
                                                coef += ligneGroupes[i]['somme_coef'];

                                                var tbb = "";
                                                var thb = generateRowTh("Matières/Enseignants", "Moy", "Coef", "Total", "Rang", "Détails de Notes");
                                                $.each(ligneSyntheses, function (i, ligneSynthese) {
                                                    
                                                    tbb += generatTBody(
                                                        '<strong>' + ligneSynthese.name + '</strong> <br><span style="font-size:0.8em;">' + ligneSynthese.nameEnseignant + '</span>',
                                                        parseFloat(ligneSynthese.moyenne).toFixed(2),
                                                        ligneSynthese.coef,
                                                        parseFloat(ligneSynthese.total_point).toFixed(2),
                                                        ligneSynthese.rang + 'e',
                                                        '<span style="font-size:0.8em;">Devoir surveillé {16/20}<br />Contrôle {16/20}</span>'
                                                    );
                                                });

                                                tableBul +=generateBulletinTable(thb,tbb,"");
                                                tableBul += '<div class="card mb-1" style="text-align:center;">' +
                                                    '<table>' +
                                                        '<tr>' +
                                                            '<th>' + ligneGroupes[i]['name'] + '</th>' +
                                                            '<td>Points</td>' +
                                                            '<th>' + ligneGroupes[i]['somme_point'] + '</th>' +
                                                            '<td>Coefs</td>' +
                                                            '<th>' + ligneGroupes[i]['somme_coef'] + '</th>' +
                                                            '<td>Moyenne</td>' +
                                                            '<th>' + ligneGroupes[i]['moyenne_groupe'] + '</th>' +
                                                        '</tr>' +
                                                    '</table>' +
                                                '</div>'
                                                  
                                            }
                                        
                                            moyenne = total_point / coef;
                                            moyenne = parseFloat(moyenne).toFixed(2);

                                            let appreciation;
                                            let color;
                                            if (moyenne == 0) {
                                                appreciation = "Null";
                                                color = "bg-danger";
                                            } else if (moyenne > 0 && moyenne <= 5) {
                                                appreciation = "Mauvais";
                                                color = "bg-danger";
                                            } else if (moyenne > 5 && moyenne <= 8) {
                                                appreciation = "Faible";
                                                color = "bg-danger";
                                            } else if (moyenne > 8 && moyenne < 10) {
                                                appreciation = "Mediocre";
                                                color = "bg-warning";
                                            } else if (moyenne >= 10 && moyenne < 12) {
                                                color = "bg-success";
                                                appreciation = "Passable";
                                            } else if (moyenne >= 12 && moyenne < 14) {
                                                color = "bg-success";
                                                appreciation = "Assez bien";
                                            } else if (moyenne >= 14 && moyenne < 16) {
                                                color = "bg-success";
                                                appreciation = "Bien";
                                            } else if (moyenne >= 16 && moyenne < 18) {
                                                color = "bg-success";
                                                appreciation = "Très bien";
                                            } else if (moyenne >= 18 && moyenne < 20) {
                                                color = "bg-success";
                                                appreciation = "Excellent";
                                            } else if(moyenne == 20) {
                                                color = "bg-success";
                                                appreciation = "Parfait";
                                            }
                                            

                                            tableBul += '<div class="card-body bulletin-summary" style="float: left;">'+
                                                            '<div class="row" style="margin:auto;">'+
                                                                '<div class="col-sm-4">'+
                                                                    '<table id="myTable" class="table-cell w-100" cellspacing="0"'+
                                                                        'style="white-space:nowrap;">'+
                                                                        '<thead>'+
                                                                            '<tr>'+
                                                                                '<th class="border bg-light"  colspan=" 2">Discipline'+
                                                                                '<th>'+
                                                                            '</tr>'+
                                                                        '</thead>'+
                                                                        '<tbody>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Abs.Inj (h)</td>'+
                                                                                '<th class="border"> 02</th>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Abs.Jus (h)</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Punition</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Retards</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Retenues</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Avert. (h)</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Blâmes</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Exclusion</td>'+
                                                                                '<td class="border"> </td>'+
                                                                            '</tr>'+
                                                                        '</tbody>'+
                                                                    '</table>'+
                                                                '</div>'+
                                                                '<div class="col-sm-8">'+
                                                                    '<table id="myTable" class="table" cellspacing="0"'+
                                                                        'style="white-space:nowrap;">'+
                                                                        '<thead>'+
                                                                            '<tr>'+
                                                                                '<th class="border bg-light">Points</th>'+
                                                                                '<th class="border bg-light">Coefs</th>'+
                                                                                '<th class="border bg-light">Moyenne</th>'+
                                                                                '<th class="border bg-light">Rang</th>'+
                                                                                '<th class="border bg-light">M.Cla</th>'+
                                                                                '<th class="border bg-light">Min</th>'+
                                                                                '<th class="border bg-light">Max</th>'+
                                                                            '</tr>'+
                                                                        '</thead>'+
                                                                        '<tbody>'+
                                                                            '<tr>'+
                                                                                '<td class="border">' + total_point + '</td>'+
                                                                                '<td class="border">' + coef + '</td>'+
                                                                                '<th class="border '+ color +'">' + moyenne + '</th>'+
                                                                                '<th class="border">' + rang + 'e</th>'+
                                                                                '<td class="border">' + syntheseClasse['moy_classe'] + '</td>'+
                                                                                '<td class="border">' + syntheseClasse['moy_min'] + '</td>'+
                                                                                '<td class="border">' + syntheseClasse['moy_max'] + '</td>'+
                                                                            '</tr>'+
                                                                        '</tbody>'+
                                                                    '</table>'+
                                                                    '<table id="myTable" class="table" cellspacing="0"'+
                                                                        'style="white-space:nowrap;">'+
                                                                        '<thead>'+
                                                                            '<tr>'+
                                                                                '<td class="border">Appréciation</td>'+
                                                                                '<th class="border">'+ appreciation +'</th>'+
                                                                            '</tr>'+
                                                                        '</thead>'+
                                                                    '</table>'+
                                                                '</div>'+
                                                            '</div>'+
                                                        '</div>'+
                                                        '<div class="card mb-3 bulletin-summary" style="text-align:center;">'+
                                                           '<table>'+
                                                                '<tr>'+
                                                                    '<th>Visa des Parents</th>'+
                                                                    '<th>Le Surveillant Général</th>'+
                                                                    '<th>Le Principal</th>'+
                                                            '</table>'+
                                                        '</div>'
                                        }




                                            
                                        
                                        
                                        $('#bulletin-card').append(tableBul); 
                                       
                                    },
                                    error: function(errors) {
                                        console.log(errors);
                                    }
                                })
                            })
                        }
                    
                    },
                    error: function(errors){
                        console.log(errors);
                    }
                });
            }

            var generateButtonExportPdf = function(etablissement, student_id, periode_id, periode_type, hasHeader) {
                let url = window.location.origin + "/gestscol/" + etablissement + "/bulletins/" + student_id + "/" + periode_id + "/" + periode_type + "/" + hasHeader + "/bulletin-pdf";
                var btn = '<a class="m-1 btn btn-info text-white bulletin.pdf" href="' + url + '" >Export to PDF</a>';
                return btn;
            }

            var generateMultiColumnTable = function (thead, tbody, title) {

                // let url = window.location.origin + "/gestscol/" + etablissement + "/bulletins/" + student_id + "/" + periode_id + "/" + periode_type + "/" + $('#without-header').prop('checked') + "/bulletin-pdf";
                
                var table = '<div class="card-body w-100" id="list-student" style="float: left;">'+
                    '<h5 class="card-title" style="color:black;">'+title+'</h5>'+
                        
                    '<table id="myTable" class="table border table-hover" cellspacing="0" width="100%" style="white-space:nowrap;">'+
                        '<thead>'+
                        '<tr>'+
                            thead+
                        '</tr>'+
                        '</thead>'+
                        '<tbody >'+
                            tbody+
                        '</tbody>'+
                    '</table>'+

                    // '<a class="m-1 btn btn-info text-white bulletin.pdf" href="' + url + '" >Export to PDF</a>'
                    
                    
                    // '<button class="m-1 btn btn-success text-white">Imprimer Tous</button>'+
                    // '<button class="m-1 btn btn-secondary" id="updateNote">Exporter</button>'+
                    
                '</div>';   
                return table;
            }

            var generateBulletinTable = function (thead, tbody, title) {
                
                let tableb = '<div class="card-body" style="float: left;">'+
                        
                    '<table id="myTable" class="table border" cellspacing="0" width="100%" style="white-space:nowrap;">'+
                        '<thead>'+
                        '<tr class="bg-light">'+
                            thead+
                        '</tr>'+
                        '</thead>'+
                        '<tbody >'+
                            tbody+
                        '</tbody>'+
                    '</table>'+
                '</div>';   
                return tableb;
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

        </script>
    @endpush

</x-gest-scol>    