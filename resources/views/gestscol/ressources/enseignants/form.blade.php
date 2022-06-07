<x-gest-scol title="Creation d'un ">
    
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-add-user icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Formulaire de création d'un Enseignant
    
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
                                        <input name="name" id="name_apprenant"  placeholder="Nom complet de l'élève" type="text" class="form-control">
                                        <x-errors name="name"/>
                                   </div>
                                    <div class="row">
                                        <div class="position-relative form-group col-lg-6">
                                            <label for="dateN" class="">Date de naissance <span style="color:red;">*</span></label>
                                            <input name="date_naissance" id="dateN"  placeholder="date de naissance" type="date" class="form-control">
                                            <x-errors name="date_naissance"/>
                                        </div>
                                        <div class="position-relative form-group col-lg-6">
                                            <label for="lieuNaissance" class="">Lieu <span style="color:red;">*</span></label>
                                            <input name="lieu_naissance" id="lieuNaissance" placeholder="Lieu de naissance" type="text" class="form-control">
                                            <x-errors name="lieu_naissance"/>
                                        </div>
                                    </div>

                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Sexe <span style="color:red;">*</span></label>
                                        <select name="sexe"  id="sexe" class="form-control">
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                        <x-errors name="sexe"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Domicile <span style="color:red;">*</span></label>
                                        <textarea name="localisation" id="localisation" class="form-control"></textarea>
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
                                        <label for="exampleSelect" class="">Statut au sein de l'établissement</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Permanent">Permanent</option>
                                            <option value="Vacataire">Vacataire</option>
                                        </select>
                                        <x-errors name="status"/>
                                    </div>
    
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Niveau Scolaire</label>
                                        <select name="diplome" id="niveau" class="form-control">
                                            <option value="BEPC">BEPC</option>
                                            <option value="Probatoire">Probatoire</option>
                                            <option value="Baccalauréat">Baccalauréat</option>
                                            <option value="Licence">Licence</option>
                                            <option value="Master">Master</option>
                                            <option value="Doctorat">Doctorat</option>
                                        </select>
                                        <x-errors name="diplome"/>
                                    </div>
    
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Réligion</label>
                                        <select name="religion" id="religion" class="form-control">
                                            <option value="Catholique">Catholique</option>
                                            <option value="Protestant">Protestant</option>
                                            <option value="Evangeliste">Evangeliste</option>
                                            <option value="Panthécotiste">Panthécotiste</option>
                                            <option value="Musulman">Musulman</option>
                                            <option value="Budiste">Budiste</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                        <x-errors name="religion"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="email" class="">Email</label>
                                        <input name="email" id="email" placeholder="Email" type="email" class="form-control">
                                        <x-errors name="email"/>
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="telephone" class="">Contact</label>
                                        <input name="telephone" id="contact" placeholder="Téléphone de l'enseignant" type="text" class="form-control">
                                        <x-errors name="telephone"/>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label for="exampleSelect" class="">Groupe Sanguin <span style="color:red;">*</span></label>
                                    <fieldset class="position-relative form-group">
                                        <div class="position-relative form-check">
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="A+"> A+ &nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="A-"> A- &nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="AB+"> AB+ &nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="AB-"> AB- &nbsp; &nbsp;&nbsp; &nbsp;</label>
                                        </div>
                                        <div class="position-relative form-check">
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="B+"> B+ &nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="B-"> B-  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="O+"> O+ &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</label>
                                            <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" value="O-"> O- &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
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
                                                <label for="matricule" class="">Matricule</label>
                                                <input name="matricule" id="matricule" placeholder="Matricule" type="text" class="form-control">
                                                <x-errors name="matricule"/>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="num_cnps" class="">Numéro CNPS</label>
                                                <input name="num_cnps" id="cnps" placeholder="N° CNPS père" type="text" class="form-control">
                                                <x-errors name="num_cnps"/>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="num_cni" class="">Numéro CNI</label>
                                                <input name="num_cni" id="cni" placeholder="N° CNI" type="text" class="form-control">
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
                                            <option value="Pr">Professeur</option>
                                            <option value="Dr">Docteur</option>
                                            <option value="Mr">Monsieur</option>
                                            <option value="Mme">Madame</option>
                                            <option value="Mlle">Mademoiselle</option>
                                            <option value="Abbe">Abbé</option>
                                            <option value="Pasteur">Pasteur</option>
                                            <option value="Fr">Frère</option>
                                        </select>
                                        <x-errors name="titre"/>
                                    </div>
                                
                                    <div class="position-relative form-group">
                                        <label for="num_autorisation" class="">numero d'autorisation</label>
                                        <input name="num_autorisation" id="num_autorisation" placeholder="Numero d'autorisation" type="text" class="form-control">
                                        <x-errors name="num_autorisation"/>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">CONTACT D'URGENCE</h5>
                                    <div class="position-relative form-group">
                                        <label for="exampleSelect" class="">Numéro de téléphone d'urgence</label>
                                        <input name="autre" id="numero2" placeholder="Téléphone de l'Autre contact" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="mt-1 ml-3 btn btn-success" type="submit">Enrégistrer</button>
                    </div>
                </div>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</x-gest-scol>