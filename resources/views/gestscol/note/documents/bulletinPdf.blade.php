<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Gestion Scolaire | @yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('assets1/images/favicon.png') }}" />
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        
        <style>
            
            body {
                padding: 0px;
                margin: 0px;
            }

            .flex-justify-between {
                display: -webkit-box; /* wkhtmltopdf uses this one */
                display: flex;
                -webkit-box-pack: space-between; /* wkhtmltopdf uses this one */
                justify-content: space-between;
            }

            .content-entete {
                padding: 0px 50px 0px 50px;
            }

            .subline-entete {
                border-bottom: solid 1px #ada4a4;
                margin-top: 15px;
                margin-inline: 60px;
                width: 150px;
            }

            .table-no-border {
                width: 100%;
                border: 1px solid;
            }

            .container{
                padding: 15px 30px 15px 15px;
                height: 1092px;
                /* background-color: gold; */
                
            }

            .border {
                border: 1px solid;
            }

            .table-border {
                width: 100%;
                border-collapse: collapse;
            }

            td, th {
                padding-top: 4px;
                padding-left: 4px;
            }

            .title-matier {
                font-weight: bold;
                font-size: 15px;
            }
            .subtitle-matier {
                font-weight: normal;
                font-size: 10px;
                margin-left: 10px
            }
            .small-table {
                width: 48%;
            }

        </style>

    </head>
    <body id="main">

        @foreach ($dataBullletin as $data)
            <div class="container content-body">
                <div class="content-entete">

                    
                    @if($data["has_header"]  == 'true')         
                        <div class="flex-justify-between">
                            <div style="text-align: center;">
                                <div style="color: black; font-size:16px; font-weight:400px; font-family:auto; margin-top: 5px;">REPUBLIC DU CAMEROUN</div>
                                <div style="color: black; font-size:14px; font-weight:bold; font-family:auto; margin-top: 5px;">Ministère des Enseignements Secondaires</div>
                                <div style="color: black; font-size:11px; font-weight:bold; font-family:auto; margin-top: 5px;">Délégation Régionale du Centre</div>
                                <div class="subline-entete"></div>
                            </div>
                
                            <div style="text-align: center;">
                                <div style="color: black; font-size:16px; ffont-weight:400px; font-family:auto; margin-top: 5px;">ARCHIDIOCESE DE YAOUNDE</div>
                                <div style="color: black; font-size:14px; font-weight:bold; font-family:auto; margin-top: 5px;">Collège Mgr. François Xavier VOGT</div>
                                <div style="color: black; font-size:11px; font-weight:bold; font-family:auto; margin-top: 5px;">BP 765 Yaoundé - Tel.22-31-54-28</div>
                                <div class="subline-entete"></div>
                            </div>
                            
                        </div>
                    @else
                        <div style="height: 100px"></div>        
                    @endif

                    
                    <div style="color: black; font-size:18px; font-weight:bold; font-family:auto;text-align: center;">BULLETIN SÉQUENTIEL N°1</div>
                </div>

                @php
                    // var_dump(gettype($data['studentData']));
                    $studentData = $data["studentData"];
                @endphp

                <div class="table-no-border flex-justify-between">
                    <div style="width: 99.8%; padding: 10px;">
                        <div style="display: flex; margin-bottom: 5px;font-size: 14px;">
                            <div>Année: </div>
                            <div style="margin-left: 20px; font-weight: bold; font-size: 14px;">{{$studentData["anne_academique"]}}</div>
                        </div>

                        <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                            <div style="display: flex">Classe: <div style="margin-left: 20px; font-weight: bold; font-size: 14px;">{{$studentData["classe_annee"]}}</div></div>
                            <div style="display: flex">Effectif: <div style="margin-left: 5px; font-weight: bold; font-size: 14px;"> {{$studentData["effectif"]}}</div> </div>
                            <div style="display: flex">Matricule: <div style="margin-left: 5px; font-weight: bold; font-size: 14px;"> {{$studentData["matricule"]}}</div> </div>
                            <div style="display: flex">Titulaire: <div style="margin-left: 5px; font-weight: bold; font-size: 14px;"> {{$studentData["titulaire"]}}</div> </div> 
                        </div>

                        <div style="display: flex; margin-bottom: 5px; font-size: 14px;">
                            <div>Nom: </div>
                            <div style="margin-left: 28px; font-weight: bold">{{$studentData["nom"]}}</div>
                        </div>

                        <div style="display: flex; justify-content: space-between;">
                            <div style="display: flex">Né(e) le: <div style="margin-left: 9px; font-weight: bold;">{{$studentData["date_naissance"]}}</div></div>
                            <div style="display: flex">à: <div style="margin-left: 5px; font-weight: bold; font-size: 14px;">{{$studentData["lieu_naissance"]}}</div> </div>
                            <div>Redt: {{$studentData["is_redouble"] ? "Oui" : "Non"}}</div>
                            <div style="display: flex">N°: <div style="margin-left: 5px; font-weight: bold; font-size: 14px;">{{$studentData["numero"]}}</div></div>   
                        </div>
                    </div>
                    <div >
                        <div style="width: 67px; height: 107px; background-image: url({{$studentData["avatar_url"]}}); background-size: cover">
                            {{-- <img style="width: 100%;height: 100%;" src= alt="" srcset=""> --}}
                        </div>
                    </div>
                </div>

                @php
                    $total_point = 0;
                    $rang = $data["rang"];
                    $coef = 0;
                    $moyenne = 0;   
                @endphp

                <div>
                    
                    @for ($i = 0; $i < sizeof($data["ligneGroupes"]); $i++)

                        @php
                            $ligneGroupe = $data["ligneGroupes"][$i];
                            $ligneSyntheses = $data["ligneGroupes"][$i]["ligneSyntheses"];

                            $total_point += $ligneGroupe['somme_point'];
                            $coef += $ligneGroupe['somme_coef'];
                        @endphp

                        <table class="table-border" style="font-size: 14px!important">
                            <tr class="border" style="background-color: rgb(151, 144, 144)">
                                <th>MATIERES / Enseignants</th>
                                <th class="border">Moy.</th>
                                <th class="border">Cf.</th>
                                <th class="border">Total</th>
                                <th class="border">Rg</th>
                                <th class="border">Détails des Notes</th>
                                <th class="border">Visa du prof.</th>
                            </tr>
                            @foreach ($ligneSyntheses as $ligneSynthese)
                                <tr>
                                    <td class="border">
                                        <div class="title-matier">{{$ligneSynthese->name}}</div>
                                        <div class="subtitle-matier">{{$ligneSynthese->nameEnseignant}}</div>
                                    </td>
                                    <td class="border" style="text-align: center">{{$ligneSynthese->moyenne}}</td>
                                    <td class="border" style="text-align: center">{{$ligneSynthese->coef}}</td>
                                    <td class="border" style="text-align: center">{{$ligneSynthese->total_point}}</td>
                                    <td class="border" style="text-align: center">{{$ligneSynthese->rang}}e</td>
                                    <td class="border" style="font-size: 14px">
                                        <div>Cahiers {10/20} Contrôle {13.5/20}</div>
                                        <div>Interrogation {10/20}</div>
                                    </td>
                                    <td class="border"></td>
                                </tr>
                            @endforeach
                        
                            
                        </table>
                        <div style="padding-left: 10px; display: flex; background-color: rgb(207, 198, 198); padding-top: 5px; padding-bottom: 5px;">
                            <div style="font-weight: bold; width: 30%; font-size: 14px;">{{$ligneGroupe->name}}</div>
                            <div style="display: flex;  width: 35%;">
                                <div style="display: flex">Points: <div style="margin-left: 10px; font-weight: bold; font-size: 14px;"> {{$ligneGroupe->somme_point}}</div></div>
                                <div style="display: flex; margin-left: 50px">Coefs: <div style="margin-left: 10px; font-weight: bold; font-size: 14px;"> {{$ligneGroupe->somme_coef}} </div></div>
                            </div>
                            <div style="display: flex; width: 25%">Moyenne: <div style="margin-left: 10px; font-weight: bold; font-size: 14px;"> {{$ligneGroupe->moyenne_groupe}}</div></div>
                        </div>
                        
                    @endfor
                </div>

                @php
                    $moyenne = $total_point / $coef;
                    $moyenne = round($moyenne,2,PHP_ROUND_HALF_DOWN);
                    $appreciation;

                    if ($moyenne == 0) {
                        $appreciation = "Null";
                    } else if ($moyenne > 0 && $moyenne <= 5) {
                        $appreciation = "Mauvais";
                    } else if ($moyenne > 5 && $moyenne <= 8) {
                        $appreciation = "Faible";
                    } else if ($moyenne > 8 && $moyenne < 10) {
                        $appreciation = "Mediocre";
                    } else if ($moyenne >= 10 && $moyenne < 12) {
                        $appreciation = "Passable";
                    } else if ($moyenne >= 12 && $moyenne < 14) {
                        $appreciation = "Assez bien";
                    } else if ($moyenne >= 14 && $moyenne < 16) {
                        $appreciation = "Bien";
                    } else if ($moyenne >= 16 && $moyenne < 18) {
                        $appreciation = "Très bien";
                    } else if ($moyenne >= 18 && $moyenne < 20) {
                        $appreciation = "Excellent";
                    } else if($moyenne == 20) {
                        $appreciation = "Parfait";
                    }
                                                    
                    $syntheseClasse = $data["syntheseClasse"];
                @endphp

                <div style="width: 100%; display: flex; padding-left: 0px; padding-right: 0px; margin-top: 20px;">
                    <div style="width: 30%;">
                    <div class="border" style="color: black; text-align: center; font-weight: bold; font-size: 14px;">DISCIPLINE</div>
                    <div style="display: flex; justify-content: space-between; margin-top: 5px; font-size: 12px;">
                            <div class="small-table">
                                <table class="table-border;">
                                    <tr>
                                        <td class="border">Abs.Inj (h):</td>
                                        <td class="border"></td>
                                    </tr>
                                    <tr>
                                        <td class="border">Abs.Jus (h):</td>
                                        <td class="border">16</td>
                                    </tr>
                                    <tr>
                                        <td class="border">Punition:</td>
                                        <td class="border"></td>
                                    </tr>
                                    <tr>
                                        <td class="border">Retards:</td>
                                        <td class="border"></td>
                                    </tr>
                                    <tr>
                                        <td class="border">Retenues:</td>
                                        <td class="border"></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="small-table;">
                                <table class="table-border">
                                    <tr>
                                        <td class="border">Avert.:</td>
                                        <td class="border"></td>
                                    </tr>
                                    <tr>
                                        <td class="border">Ret tot:</td>
                                        <td class="border">16</td>
                                    </tr>
                                    <tr>
                                        <td class="border">Av total:</td>
                                        <td class="border"></td>
                                    </tr>
                                    <tr>
                                        <td class="border">Ex 3jrs:</td>
                                        <td class="border"></td>
                                    </tr>
                                    <tr>
                                        <td class="border">Blam:</td>
                                        <td class="border"></td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                    </div>
                    <div style="width: 60%; padding-inline: 20px; font-size: 14px;">
                        <div class="flex-justify-between">
                            <div style="width: 30%">
                                <table class="table-border">
                                    <tr>
                                        <td class="border">Points</td>
                                        <td class="border">Coefs</td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-weight: bold">{{$total_point}}</td>
                                        <td class="border" style="font-weight: bold">{{$coef}}</td>
                                    </tr>
                                    
                                </table>
                            </div>

                            <div style="width: 30%">
                                <table class="table-border">
                                    <tr>
                                        <td class="border" style="font-weight: bold">Moy.Gen</td>
                                        <td class="border" style="font-weight: bold">Rang</td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-weight: bold">{{$moyenne}}</td>
                                        <td class="border" style="font-weight: bold">{{$rang}}e</td>
                                    </tr>
                                    
                                </table>
                            </div>

                            <div style="width: 30%; font-size: 14px;">
                                <table class="table-border">
                                    <tr>
                                        <td class="border">M.Cla</td>
                                        <td class="border">Min</td>
                                        <td class="border">Max</td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-weight: bold">{{$syntheseClasse['moy_classe']}}</td>
                                        <td class="border" style="font-weight: bold">{{$syntheseClasse['moy_min']}}</td>
                                        <td class="border" style="font-weight: bold">{{$syntheseClasse['moy_max']}}</td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>

                        @php
                        $moyenneScolaire = $moyenne;
                        @endphp

                        <div style="display: flex; justify-content: end; margin-top: 10px;">
                            <div style="font-size: 14px; margin-top: 2px;">Moyenne Scolaire:</div>
                            <div class="border" style="font-weight: bold; text-align: center; padding-inline: 20px;font-size: 12px;">{{$moyenneScolaire}}</div>
                        </div>

                        <div style="display: flex; justify-content: end; margin-top: 10px;">
                            <div style="font-size: 14px; margin-top: 2px;">Appréciation:</div>
                            <div class="border" style="font-weight: bold; text-align: center; padding-inline: 75px;font-size: 12px;">{{$appreciation}}</div>
                        </div>
                    </div>
                    <div style="width: 30%">
                        <div style="width: 90%">
                            <table class="table-border">
                                <tr>
                                    <td class="border" style="font-weight: bold;font-size: 11px;">MENTION(S) DU TRAVAIL</td>
                                </tr>
                                <tr>
                                    <td class="border" style="font-weight: bold;font-size: 11px;">@php if($moyenne > 12) {echo("TABLEAU D'HONNEUR"); } else { echo("---"); } @endphp</td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>

                </div>

                <div style="margin-top: 20px;">
                    <table class="table-border">
                        <tr>
                            <td class="border"><div style="height: 75px; text-align: center; font-size: 12px;"> Visa des Parents</div></td>
                            <td class="border"> <div style="height: 75px; text-align: center; font-size: 12px;"> Le Surveillant Général </div></td>
                            <td class="border"><div style="height: 75px; text-align: center; font-size: 12px;"> Le Principal </div> </td>
                        </tr>
                    </table>
                </div>
            
            </div>
        @endforeach

        
    </body>

    <footer>
        
            <script>
                
                var element = document.getElementById('main');
                html2pdf(element);
                 
            </script>
        
    </footer>
</html>