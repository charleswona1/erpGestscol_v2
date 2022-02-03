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
                    <center>
                        <img width="150" class="border shadow" src="assets/images/avatars/1.jpg" alt="">
                    </center>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="main-card mb-1 card">
                {{-- <div class="card-body" style="float: left;">
                    <h5 class="card-title" style="color:black; text-align:center;">Bulletin Séquenciel 1
                    </h5>
                    <table id="myTable" class="table border " cellspacing="0" width="100%"
                        style="white-space:nowrap;">
                        <thead>
                            <tr>
                                <th class="border" colspan="2">Nom(s) & Prénom(s)</th>
                                <td class="border" colspan="6" style="margin:auto; width:auto;">Gilles
                                    Fabrizio ZANETTIN</td>
                                <th class="border">Classe</th>
                                <td class="border">6e 1</td>
                                <th class="border">Effectif</th>
                                <td class="border">51</td>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th class="border">Né(e) Le</th>
                                <td class="border">10/02/2002</td>
                                <th class="border">A</th>
                                <td class="border">Youndé</td>
                                <th class="border">Red</th>
                                <td class="border">Non</td>
                                <th class="border">Matricule</th>
                                <td class="border">FGI2017YDE </td>
                                <th class="border">N°</th>
                                <td class="border">50</td>
                                <th class="border">Prof T.</th>
                                <td class="border">ATANGANA Jean</td>

                            </tr>

                        </tbody>

                    </table>

                </div> --}}

            </div>

            <div class="main-card mb-3 card">
                <div class="card-body" style="float: left;">
                    <table id="myTable" class="table border " cellspacing="0" width="100%"
                        style="white-space:nowrap;">
                        <thead>
                            <tr class="bg-light">
                                <th class="border">Matières/Enseignants</th>
                                <th class="border" style="margin:auto; width:auto;">Moy</th>
                                <th class="border">Coef</th>
                                <th class="border">Total</th>
                                <th class="border">Rang</th>
                                <th class="border">Détails de Notes</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="border">
                                    <strong>Mathématiques</strong>
                                    <br><span style="font-size:0.8em;">TCHUINKAM Christophe</span>
                                </td>
                                <td class="border">16,00</td>
                                <td class="border">4,0</td>
                                <td class="border">64,00</td>
                                <td class="border">3e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {16/20}
                                        <br />Contrôle {16/20}</span>
                                </td>

                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>SVT</strong>
                                    <br><span style="font-size:0.8em;">BATCHOM Charlotte</span>
                                </td>
                                <td class="border">8,00</td>
                                <td class="border">2,0</td>
                                <td class="border">16,00</td>
                                <td class="border">16e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {08/20}
                                </td>

                            </tr>
                        </tbody>

                    </table>

                </div>
                <div class="card mb-1" style="text-align:center;">
                    <table>
                        <tr>
                            <th>Matières Scientifiques</th>
                            <td>Points</td>
                            <th>68,00</th>
                            <td>Coefs</td>
                            <th>6.0</th>
                            <td>Moyenne</td>
                            <th>11,33</th>
                        </tr>
                    </table>
                </div>



                <div class="card-body"
                    style="float: left; ">

                    <table id="myTable" class="table border " cellspacing="0" width="100%"
                        style="white-space:nowrap;">

                        <tbody>

                            <tr>
                                <td class="border">
                                    <strong>Anglais</strong>
                                    <br><span style="font-size:0.8em;">DJUIKOM Chantal</span>
                                </td>
                                <td class="border">16,00</td>
                                <td class="border">4,0</td>
                                <td class="border">64,00</td>
                                <td class="border">3e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {16/20}
                                        <br />Contrôle {16/20}</span>
                                </td>

                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>Expression Ecrite</strong>
                                    <br><span style="font-size:0.8em;">NGUIMBOUS Jean Calvin</span>
                                </td>
                                <td class="border">8,00</td>
                                <td class="border">2,0</td>
                                <td class="border">16,00</td>
                                <td class="border">16e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {08/20}
                                </td>

                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>Anglais</strong>
                                    <br><span style="font-size:0.8em;">DJUIKOM Chantal</span>
                                </td>
                                <td class="border">16,00</td>
                                <td class="border">4,0</td>
                                <td class="border">64,00</td>
                                <td class="border">3e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {16/20}
                                        <br />Contrôle {16/20}</span>
                                </td>

                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>Expression Ecrite</strong>
                                    <br><span style="font-size:0.8em;">NGUIMBOUS Jean Calvin</span>
                                </td>
                                <td class="border">8,00</td>
                                <td class="border">2,0</td>
                                <td class="border">16,00</td>
                                <td class="border">16e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {08/20}

                                </td>

                            </tr>
                        </tbody>

                    </table>

                </div>
                <div class="card mb-0" style="text-align:center;">
                    <table>
                        <tr>
                            <th>Matières Littéraires</th>
                            <td>Points</td>
                            <th>138,50</th>
                            <td>Coefs</td>
                            <th>13.0</th>
                            <td>Moyenne</td>
                            <th>10,65</th>
                    </table>
                </div>
                <div class="card-body"
                    style="float: left; ">
                    <table id="myTable" class="table border " cellspacing="0" width="100%"
                        style="white-space:nowrap;">

                        <tbody>

                            <tr>
                                <td class="border">
                                    <strong>Informatique</strong>
                                    <br><span style="font-size:0.8em;">NTSA Armand Clement</span>
                                </td>
                                <td class="border">05,00</td>
                                <td class="border">2,0</td>
                                <td class="border">10,00</td>
                                <td class="border">42e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé
                                        {10/20}<br />Contrôle {0/20}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>EPS</strong>
                                    <br><span style="font-size:0.8em;">MBOULE MBOULE Ismael</span>
                                </td>
                                <td class="border">10,00</td>
                                <td class="border">2,0</td>
                                <td class="border">20,00</td>
                                <td class="border">32e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {10/20}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>E.S.F</strong>
                                    <br><span style="font-size:0.8em;">BILOA Laurencia</span>
                                </td>
                                <td class="border">14,00</td>
                                <td class="border">1,0</td>
                                <td class="border">14,00</td>
                                <td class="border">28e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {14/20}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">
                                    <strong>T.M</strong>
                                    <br><span style="font-size:0.8em;">AHANDA ALAIN</span>
                                </td>
                                <td class="border">15,00</td>
                                <td class="border">1,0</td>
                                <td class="border">15,00</td>
                                <td class="border">12e</td>
                                <td class="border">
                                    <span style="font-size:0.8em;">Devoir surveillé {15/20}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card mb-0" style="text-align:center;">
                    <table>
                        <tr>
                            <th>Matières de Formation Humaine</th>
                            <td>Points</td>
                            <th>59,00</th>
                            <td>Coefs</td>
                            <th>6.0</th>
                            <td>Moyenne</td>
                            <th>9,83</th>
                        </tr>
                    </table>
                </div>
                <div class="card-body" style="float: left;">
                    <div class="row" style="margin:auto;">
                        <div class="col-sm-4">
                            <table id="myTable" class="table-cell w-100" cellspacing="0"
                                style="white-space:nowrap;">
                                <thead>
                                    <tr>
                                        <th class="border bg-light"  colspan=" 2">Discipline
                                        <th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="border">Abs.Inj (h)</td>
                                        <th class="border"> 02</th>
                                    </tr>
                                    <tr>
                                        <td class="border">Abs.Jus (h)</td>
                                        <td class="border"> </td>
                                    </tr>
                                    <tr>
                                        <td class="border">Punition</td>
                                        <td class="border"> </td>
                                    </tr>
                                    <tr>
                                        <td class="border">Retards</td>
                                        <td class="border"> </td>
                                    </tr>
                                    <tr>
                                        <td class="border">Retenues</td>
                                        <td class="border"> </td>
                                    </tr>
                                    <tr>
                                        <td class="border">Avert. (h)</td>
                                        <td class="border"> </td>
                                    </tr>
                                    <tr>
                                        <td class="border">Blâmes</td>
                                        <td class="border"> </td>
                                    </tr>
                                    <tr>
                                        <td class="border">Exclusion</td>
                                        <td class="border"> </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="col-sm-8">
                            <table id="myTable" class="table" cellspacing="0"
                                style="white-space:nowrap;">
                                <thead>
                                    <tr>
                                        <th class="border bg-light">Points</th>
                                        <th class="border bg-light">Coefs</th>
                                        <th class="border bg-light">Moyenne</th>
                                        <th class="border bg-light">Rang</th>
                                        <th class="border bg-light">M.Cla</th>
                                        <th class="border bg-light">Min</th>
                                        <th class="border bg-light">Max</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border">265,50</td>
                                        <td class="border">25.0</td>
                                        <th class="border bg-success">10,62</th>
                                        <th class="border">52e</th>
                                        <td class="border">10,95</td>
                                        <td class="border">5,10</td>
                                        <td class="border">16,20</td>
                                    </tr>

                                </tbody>

                            </table>
                            <table id="myTable" class="table" cellspacing="0"
                                style="white-space:nowrap;">
                                <thead>
                                    <tr>
                                        <td class="border">Appréciation</td>
                                        <th class="border">Passable</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="text-align:center;">
                    <table>
                        <tr>
                            <th>Visa des Parents</th>
                            <th>Le Surveillant Général</th>
                            <th>Le Principal</th>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="main-card mb-3 card">
                <div class="card-body card-shadow-primary"
                    style="float: left; overflow-y: scroll; height:500px;">
                    <!--<h5 class="card-title"> Matricules des Apprenants</h5> -->

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Imprimer l'entête</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Imprimer la photo</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Sélectionner toute la
                            Classe</label>
                    </div>
                    <br />
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1"
                                value="option1" checked>
                            Ordre Alphabétique
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2"
                                value="option2">
                            Ordre de Mérite
                        </label>
                    </div>
                    <br/>
                    <center>
                        <button class="mt-1 btn btn-info"><a href="index.html"
                                style="color:white; text-decoration:none;">Imprimer</a></button>
                        <a href="index.html"><button class="mt-1 btn btn-primary">Exporter</button></a>
                    </center>
                      
                    <div id="liste_eleves">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('javascripts')
        <script>
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
                getEleve();
            });

            $('#classe_annee_id').on('change',function(e){
                getEleve(e.target.value);
            })

            function getEleve(val){
                $('#liste_eleves').empty();
                $.ajax({
                    url: "{{route('gestscol.bulletins.eleves',$etablissement)}}",
                    type: "GET",
                    data : {
                        classe_id: val,
                    },
                    success:function(response){
                        console.log(response);
                        
                        let table ="";

                        if(response.length>0){
                            var tb = "";
                    
                            var th = generateRowTh("N°","Nons Apprenant","Action");
                            
                            $.each(response, function (i, eleve) {
                                tb += generatTBody(
                                    i+1,
                                    eleve.nom,
                                    "<input type='checkbox' class='form-check' id='eleve-checked' name="+eleve.id+" disabled/>"
                                );
                            });
                            table +=generateMultiColumnTable(th,tb,"");
                            $('#liste_eleves').append(table);
                        }
                    
                    },
                    error: function(errors){
                        console.log(errors);
                    }
                });
            }

            var generateMultiColumnTable = function (thead, tbody, title) {
                
                var table = '<div class="card-body w-100" style="float: left;">'+
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
        </script>
    @endpush

</x-gest-scol>    