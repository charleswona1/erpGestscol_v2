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

                                                            {{-- @php
                                                                $enseignant = $classe->getEnseignant->name;
                                                            @endphp --}}

                                                            <option value="{{$classe->id}}">{{$classe->getNiveau->name}}{{$classe->name}}</option>
                                                        @endforeach
            
                                                    </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group"><label
                                                for="exampleSelect" class="">Matière <span
                                                    style="color:red;">*</span></label>
                                            <select name="select" id="exampleSelect"
                                                class="form-control" required>
                                                <option>Anglais</option>
                                                <option>Mathématiques</option>
                                                <option>Littérature</option>
                                                <option>Histoire</option>

                                                <option>SVT</option>
                                                <option>Espagnol</option>
                                                <option>Expression Ecrite</option>

                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Enseignant <span
                                                    style="color:red;"> </span></label><input
                                                name="enseignant" id="exampleEmail"
                                                placeholder="{{$enseignant}}" type="text"
                                                class="form-control" disabled>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="position-relative form-group"><label
                                                for="exampleSelect" class="">Limitation <span
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
                                        <div class="position-relative form-group"><label
                                                for="exampleSelect" class="">Choix <span
                                                    style="color:red;">*</span></label>
                                            <select name="select" id="exampleSelect"
                                                class="form-control" required>
                                                <option>Séquence 1</option>
                                                <option>Séquence 2</option>
                                                <option>Séquence 3</option>
                                                <option>Séquence 4</option>
                                                <option>Séquence 5</option>
                                                <option>Séquence 6</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>


                <div class="main-card mb-3 card">

                    <div class="card-body" class="scroll-area-md">
                        <!-- <h5 class="card-title">Table with hover</h5> -->
                        <table class="mb-0 table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Evaluation</th>
                                    <th>Date</th>
                                    <th>Barème</th>
                                    <th>SP</th>
                                    <th>P</th>
                                    <th>%SP</th>
                                    <th>%P</th>
                                    <th>Moy</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                    <th>Effectif</th>
                                    <th>qMoy</th>
                                    <th>%Moy</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>1</td>
                                    <td>Devoir Surveillé</td>
                                    <td>10/12/2021</td>
                                    <td>20</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td> <input style="width:100%;" type="text" /></td>
                                    <td> <input style="width:100%;" type="text" /></td>
                                    <td>9,01</td>
                                    <td>19.0</td>
                                    <td>1.5</td>
                                    <td>89</td>
                                    <td>40</td>
                                    <td>44</td>
                                    <td> </td>
                                </tr>
                                <tr>

                                    <td>2</td>
                                    <td>Note du Cahier</td>
                                    <td>10/12/2021</td>
                                    <td>20</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td> <input style="width:100%;" type="text" /></td>
                                    <td> <input style="width:100%;" type="text" /></td>
                                    <td>9,01</td>
                                    <td>19.0</td>
                                    <td>1.5</td>
                                    <td>89</td>
                                    <td>40</td>
                                    <td>44</td>
                                    <td> </td>
                                </tr>

                                <tr>
                                    <th scope="row" colspan="5">
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                        <button class="mt-1 btn btn-warning"><a href="periodes-liste.html"
                                style="color:white; text-decoration:none;">Consulter</a></button>
                        <a href="periodes-liste.html"><button
                                class="mt-1 btn btn-secondary">Modifier</button></a>
                        <button class="mt-1 btn btn-success"><a href="periodes-liste.html"
                                style="color:white; text-decoration:none;">Enregistrer</a></button>
                        <a href="periodes-liste.html"><button
                                class="mt-1 btn btn-danger">Supprimer</button></a>
                        <a href="periodes-liste.html"><button
                                class="mt-1 btn btn-light">Annuler</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-gest-scol>