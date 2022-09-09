<x-gest-scol title="Modification d'un enseignant ">
    
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-add-user icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Formulaire de modification d'un Enseignant
    
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Buttons
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="tab" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                        <span>Informations Personnelles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="tab" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <span>Informations professionnelles</span>
                    </a>
                </li>
            </ul>
            {{ html()->form('POST', URL::full())->open() }}
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Identification</h5>
                                    
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Nom complet <span style="color:red;">*</span></label>
                                        <input name="name" id="name_apprenant" value="{{$enseignantAnnee->name}}" placeholder="Nom complet" type="text" class="form-control">
                                        <x-errors name="name"/>
                                   </div>
                                    <div class="row">
                                        <div class="position-relative form-group col-lg-6">
                                            <label for="dateN" class="">Date de naissance <span style="color:red;">*</span></label>
                                            <input name="date_naissance" id="dateN" value="{{$enseignantAnnee->date_naissance}}" placeholder="date de naissance" type="date" class="form-control">
                                            <x-errors name="date_naissance"/>
                                        </div>
                                        <div class="position-relative form-group col-lg-6">
                                            <label for="lieuNaissance" class="">Lieu <span style="color:red;">*</span></label>
                                            <input name="lieu_naissance" id="lieuNaissance" value="{{$enseignantAnnee->lieu_naissance}}" placeholder="Lieu de naissance" type="text" class="form-control">
                                            <x-errors name="lieu_naissance"/>
                                        </div>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Sexe <span style="color:red;">*</span></label>
                                        <select name="sexe"  id="sexe" class="form-control">
                                            <option value="M" @if($enseignantAnnee->sexe == "M") selected  @endif>Masculin</option>
                                            <option value="F" @if($enseignantAnnee->sexe == "F") selected  @endif>Féminin</option>
                                        </select>
                                        <x-errors name="sexe"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Domicile <span style="color:red;">*</span></label>
                                        <textarea name="localisation" id="localisation" class="form-control">{{$enseignantAnnee->localisation}}</textarea>
                                        <x-errors name="localisation"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleFile" class="">Photo</label>
                                        <input name="file" id="image" type="file" class="form-control-file">
                                        <x-errors name="file"/>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <!--<h5 class="card-title">Sizing</h5> -->
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Statut au sein de l'établissement <span style="color:red;">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Permanent" @if($enseignantAnnee->status == "Permanent") selected  @endif>Permanent</option>
                                            <option value="Vacataire" @if($enseignantAnnee->status == "Vacataire") selected  @endif>Vacataire</option>
                                        </select>
                                        <x-errors name="status"/>
                                    </div>
    
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Niveau Scolaire <span style="color:red;">*</span></label>
                                        <select name="diplome" id="niveau" class="form-control">
                                            <option value="BEPC" @if($enseignantAnnee->diplome == "BEPC") selected  @endif>BEPC</option>
                                            <option value="Probatoire" @if($enseignantAnnee->diplome == "Probatoire") selected  @endif>Probatoire</option>
                                            <option value="Baccalauréat" @if($enseignantAnnee->diplome == "Baccalauréat") selected  @endif>Baccalauréat</option>
                                            <option value="Licence" @if($enseignantAnnee->diplome == "Licence") selected  @endif>Licence</option>
                                            <option value="Master" @if($enseignantAnnee->diplome == "Master") selected  @endif>Master</option>
                                            <option value="Doctorat" @if($enseignantAnnee->diplome == "Doctorat") selected  @endif>Doctorat</option>
                                        </select>
                                        <x-errors name="diplome"/>
                                    </div>
    
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Réligion</label>
                                        <select name="religion" id="religion" class="form-control">
                                            <option value="Catholique" @if($enseignantAnnee->region == "Catholique") selected  @endif>Catholique</option>
                                                <option value="Protestant" @if($enseignantAnnee->region == "Protestant") selected  @endif>Protestant</option>
                                                <option value="Evangeliste" @if($enseignantAnnee->region == "Evangeliste") selected  @endif>Evangeliste</option>
                                                <option value="Panthécotiste" @if($enseignantAnnee->region == "Panthécotiste") selected  @endif>Panthécotiste</option>
                                                <option value="Musulman" @if($enseignantAnnee->region == "Musulman") selected  @endif>Musulman</option>
                                                <option value="Budiste" @if($enseignantAnnee->region == "Budiste") selected  @endif>Budiste</option>
                                                <option value="autre" @if($enseignantAnnee->region == "autre") selected  @endif>Autre</option>
                                        </select>
                                        <x-errors name="religion"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="email" class="">Email</label>
                                        <input name="email" value="{{$enseignantAnnee->email}}" id="email" placeholder="Email" type="email" class="form-control">
                                        <x-errors name="email"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="telephone" class="">Contact <span style="color:red;">*</span></label>
                                        <input name="telephone" value="{{$enseignantAnnee->telephone}}" id="contact" placeholder="Téléphone de l'enseignant" type="text" class="form-control">
                                        <x-errors name="telephone"/>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label for="exampleSelect" class="">Groupe Sanguin <span style="color:red;">*</span></label>
                                    <fieldset class="position-relative form-group">
                                        <div class="position-relative form-check">
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "A+") checked  @endif value="A+"> A+ &nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "A-") checked  @endif value="A-"> A- &nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "AB+") checked  @endif value="AB+"> AB+ &nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "AB-") checked  @endif value="AB-"> AB- &nbsp; &nbsp;&nbsp; &nbsp;</label>
                                        </div>
                                        <div class="position-relative form-check">
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "B+") checked  @endif value="B+"> B+ &nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "B-") checked  @endif value="B-"> B-  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "O+") checked  @endif value="O+"> O+ &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($enseignantAnnee->groupe_sanguin == "O-") checked  @endif value="O-"> O- &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
                                        </div>
                                    </fieldset>
                                    <x-errors name="groupe_sanguin"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">SITUATION</h5>
                                    <div>
                                        <div class="position-relative form-group">
                                            <div class="position-relative form-group">
                                                <label for="matricule" class="">Matricule <span style="color:red;">*</span></label>
                                                <input name="matricule" value="{{$enseignantAnnee->matricule}}" id="matricule" placeholder="Matricule" type="text" class="form-control">
                                                <x-errors name="matricule"/>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="num_cnps" class="">Numéro CNPS <span style="color:red;">*</span></label>
                                                <input name="num_cnps" value="{{$enseignantAnnee->num_cnps}}" id="cnps" placeholder="N° CNPS" type="text" class="form-control">
                                                <x-errors name="num_cnps"/>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="num_cni" class="">Numéro CNI <span style="color:red;">*</span></label>
                                                <input name="num_cni" value="{{$enseignantAnnee->num_cni}}" id="cni" placeholder="N° CNI" type="text" class="form-control">
                                                <x-errors name="num_cni"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Titre</label>
                                        <select name="titre" id="titre" class="form-control">
                                            <option value="Pr" @if($enseignantAnnee->titre == "Pr") selected  @endif>Professeur</option>
                                            <option value="Dr" @if($enseignantAnnee->titre == "Dr") selected  @endif>Docteur</option>
                                            <option value="Mr" @if($enseignantAnnee->titre == "Mr") selected  @endif>Monsieur</option>
                                            <option value="Mme" @if($enseignantAnnee->titre == "Mme") selected  @endif>Madame</option>
                                            <option value="Mlle" @if($enseignantAnnee->titre == "Mlle") selected  @endif>Mademoiselle</option>
                                            <option value="Abbe" @if($enseignantAnnee->titre == "Abbe") selected  @endif>Abbé</option>
                                            <option value="Pasteur" @if($enseignantAnnee->titre == "Pasteur") selected  @endif>Pasteur</option>
                                            <option value="Fr" @if($enseignantAnnee->titre == "Fr") selected  @endif>Frère</option>
                                        </select>
                                        <x-errors name="titre"/>
                                    </div>
                                
                                    <div class="position-relative form-group">
                                        <label for="num_autorisation" class="">numero d'autorisation <span style="color:red;">*</span></label>
                                        <input name="num_autorisation" value="{{$enseignantAnnee->num_autorisation}}" id="num_autorisation" placeholder="Numero d'autorisation" type="text" class="form-control">
                                        <x-errors name="num_autorisation"/>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">CONTACT D'URGENCE</h5>
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Numéro de téléphone d'urgence</label>
                                        <input name="autre" id="numero2" value="{{$enseignantAnnee->autre}}" placeholder="Téléphone de l'Autre contact" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="mt-1 ml-3 btn btn-success" type="submit">Modifier</button>
                    </div>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</x-gest-scol>