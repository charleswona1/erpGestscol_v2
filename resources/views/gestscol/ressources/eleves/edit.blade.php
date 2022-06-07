<x-gest-scol title="Modifier un élève">
    
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-study icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Formulaire de modification d'un Apprenant
                            <!-- <div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
    
    
            {{ html()->form('POST', URL::full())->open() }}
                <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="tab" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            <span>Informations Personnelles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="tab" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            <span>Informations Familiales</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="tab" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            <span>Autres Informations</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Identification</h5>
                                        
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Nom complet <span style="color:red;">*</span></label>
                                            <input name="nom" id="nom_apprenant" value="{{$eleve->nom}}"  placeholder="Nom complet de l'élève" type="text" class="form-control">
                                            <x-errors name="nom"/>
                                        </div>
                                        <div class="row">
                                            <div class="position-relative form-group col-lg-6">
                                                <label for="dateN" class="">Né le <span style="color:red;">*</span></label>
                                                <input name="date_naissance" id="dateN" value="{{$eleve->date_naissance}}" placeholder="date de naissance" type="date" class="form-control">
                                                <x-errors name="date_naissance"/>
                                            </div>
                                            <div class="position-relative form-group col-lg-6">
                                                <label for="lieuNaissance" class="">A <span style="color:red;">*</span></label>
                                                <input name="lieu_naissance" id="lieuNaissance" value="{{$eleve->lieu_naissance}}" placeholder="Lieu de naissance" type="text" class="form-control">
                                                <x-errors name="lieu_naissance"/>
                                            </div>
                                        </div>
    
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Sexe <span style="color:red;">*</span></label>
                                            <select name="sexe"  id="sexe" class="form-control">
                                                <option value="M" @if($eleve->sexe == "M") selected  @endif>Masculin</option>
                                                <option value="F" @if($eleve->sexe == "F") selected  @endif>Féminin</option>
                                            </select>
                                            <x-errors name="sexe"/>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="exampleText" class="">Domicile <span style="color:red;">*</span></label>
                                            <textarea name="domicile" id="domicile" class="form-control">{{$eleve->domicile}}</textarea>
                                            <x-errors name="domicile"/>
                                        </div>
                                        {{-- <div class="position-relative form-group">
                                            <label for="exampleFile" class="">Photo</label>
                                            <input name="file" id="image" type="file" class="form-control-file">
                                            <small class="form-text text-muted">Le taille de la photo doit être de 2Mo maximum.</small>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 h-100">
                                <div class="main-card mb-3 card ">
                                    <div class="card-body">
                                        <div class="position-relative form-group">
                                            <label for="exampleSelect" class="">Réligion</label>
                                            <select name="religion" id="religion" class="form-control">
                                                <option value="Catholique" @if($eleve->region == "Catholique") selected  @endif>Catholique</option>
                                                <option value="Protestant" @if($eleve->region == "Protestant") selected  @endif>Protestant</option>
                                                <option value="Evangeliste" @if($eleve->region == "Evangeliste") selected  @endif>Evangeliste</option>
                                                <option value="Panthécotiste" @if($eleve->region == "Panthécotiste") selected  @endif>Panthécotiste</option>
                                                <option value="Musulman" @if($eleve->region == "Musulman") selected  @endif>Musulman</option>
                                                <option value="Budiste" @if($eleve->region == "Budiste") selected  @endif>Budiste</option>
                                                <option value="autre" @if($eleve->region == "autre") selected  @endif>Autre</option>
                                            </select>
                                            <x-errors name="region"/>
                                        </div>
                                        <div class="position-relative form-group" style="display:none;">
                                            <label for="autre_religion" class="">Preciser </label>
                                            <input name="autre_religion" value="{{$eleve->autre_religion}}" id="autre_religion" placeholder="Preciser l'autre religion" type="text" class="form-control">
                                            
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="email" class="">Email</label>
                                            <input name="email" id="email" value="{{$eleve->email}}" placeholder="Email" type="email" class="form-control">
                                            <x-errors name="email"/>
                                        </div>
                                        <div class="position-relative form-group">
                                            <label for="contact" class="">Contact</label>
                                            <input name="telephone" id="contact" value="{{$eleve->telephone}}" placeholder="Téléphone de l'élève" type="text" class="form-control">
                                            <x-errors name="telephone"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card mb-3 card ">
                                    <div class="card-body"><label for="exampleSelect" class="">Groupe Sanguin <span style="color:red;">*</span></label>
                                        <fieldset class="position-relative form-group">
                                            <div class="position-relative form-check">
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "A+") checked  @endif value="A+"> A+ &nbsp; &nbsp; &nbsp;</label>
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "A-") checked  @endif value="A-"> A- &nbsp;&nbsp; &nbsp; &nbsp;</label>
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "AB+") checked  @endif value="AB+"> AB+ &nbsp;&nbsp; &nbsp; &nbsp;</label>
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "AB-") checked  @endif value="AB-"> AB- &nbsp; &nbsp;&nbsp; &nbsp;</label>
                                            </div>
                                            <div class="position-relative form-check">
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "B+") checked  @endif value="B+"> B+ &nbsp; &nbsp; &nbsp;</label>
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "B-") checked  @endif value="B-"> B-  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</label>
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "O+") checked  @endif value="O+"> O+ &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</label>
                                                <label class="form-check-label"><input name="groupe_sanguin" type="radio" class="form-check-input" @if($eleve->groupe_sanguin == "O-") checked  @endif value="O-"> O- &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
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
                            <div class="col-md-8">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">PARENTS</h5>

                                        <div class="row mb-2">
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Nom de la Mère <span style="color:red;">*</span></label>
                                                <input name="nom_mere" id="nom_mere" value="{{$eleve->nom_mere}}" placeholder="Nom de la mère" type="text" class="form-control">
                                                <x-errors name="nom_mere"/>
                                            </div>

                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Profession</label>
                                                <input name="profession_mere" id="prof_mere" value="{{$eleve->profession_mere}}" placeholder="Profession de la mère" type="text" class="form-control">
                                                <x-errors name="profession_mere"/>
                                            </div>

                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Téléphone</label>
                                                <input name="tel_mere" id="tel_mere" value="{{$eleve->tel_mere}}" placeholder="Téléphone de la mère" type="text" class="form-control">
                                                <x-errors name="tel_mere"/>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Nom du Père</label>
                                                <input name="nom_pere" id="nom_pere" value="{{$eleve->nom_pere}}" placeholder="Nom du père" type="text" class="form-control">
                                            </div>
                                        
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Profession</label>
                                                <input name="profession_pere" id="prof_pere" value="{{$eleve->profession_pere}}" placeholder="Profession du père" type="text" class="form-control">
                                            </div>
                                        
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Téléphone</label>
                                                <input name="tel_pere" id="tel_pere" value="{{$eleve->tel_pere}}" placeholder="Téléphone du père" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="nom_tuteur" class="">Nom du Tuteur</label>
                                                <input name="nom_tuteur" id="nom_tuteur" value="{{$eleve->nom_tuteur}}" placeholder="Nom du tuteur" type="text" class="form-control">
                                            </div>
                                        
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="profession_tuteur" class="">Profession</label>
                                                <input name="profession_tuteur" id="prof_tuteur" value="{{$eleve->profession_tuteur}}" placeholder="Profession du tuteur" type="text" class="form-control">
                                            </div>
                                        
                                            <div class="position-relative form-group col-lg-4">
                                                <label for="lieuNaissance" class="">Téléphone</label>
                                                <input name="tel_tuteur" id="tel_tuteur" value="{{$eleve->tel_tuteur}}" placeholder="Téléphone du tuteur" type="text" class="form-control">
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="main-card mb-3 card h-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">CONTACT D'URGENCE</h5>
                                        <div>
                                            <div class="position-relative form-group">
                                                <div class="position-relative form-group">
                                                    <label for="exampleSelect" class="">Personne à contacter en cas d'urgence</label>
                                                    <select name="type_contact" id="index_contact" class="form-control">
                                                        <option value="pere" @if ("pere" == $eleve->type_contact)
                                                            selected
                                                        @endif>Père</option>
                                                        <option value="mere" @if ("mere" == $eleve->type_contact)
                                                            selected
                                                        @endif>Mère</option>
                                                        <option value="tuteur" @if ("tuteur" == $eleve->type_contact)
                                                            selected
                                                        @endif>Tuteur</option>
                                                        <option value="autre" @if ("autre" == $eleve->type_contact)
                                                            selected
                                                        @endif>Autre</option>
                                                    </select>
                                                    <x-errors name="type_contact"/>
                                                </div>
                                                <input name="autres" id="lieuNaissance" value="{{$eleve->prof_mere}}" placeholder="Téléphone de l'Autre contact" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">etablissement antérieur</h5>
                                        <div class="position-relative form-group">
                                            <div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Etablissement</label>
                                                    <input name="precedent_etablissement" value="{{$eleve->prof_mere}}" id="etablA" placeholder="Etablissement" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class="">Niveau redoublé</label>
                                                    <select name="precedent_niveau" id="" class="form-control">
                                                        <option value="">selectionner le niveau précédent</option>
                                                        @foreach ($niveaux as $niveau)
                                                        <option value="{{$niveau->name}}" @if ($niveau->name == $eleve->precedent_niveau)
                                                            selected
                                                        @endif>{{$niveau->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="row px-3">
                                                    <div class="form-check col-lg-3">
                                                        <input class="form-check-input" @if ($eleve->is_redouble)
                                                            checked
                                                        @endif value="{{$eleve->prof_mere}}" name="is_redouble" type="checkbox" id="redoublant" >
                                                        <label class="form-check-label" for="redoublant">
                                                            Redoublant
                                                        </label>
                                                    </div>

                                                    <div class="form-check col-lg-3">
                                                        <input class="form-check-input" @if ($eleve->ancien)
                                                            checked
                                                        @endif value="{{$eleve->prof_mere}}" name="ancien" type="checkbox" id="ancien" >
                                                        <label class="form-check-label" for="ancien">
                                                            Ancien
                                                        </label>
                                                    </div>

                                                    <div class="form-check col-lg-3">
                                                        <input class="form-check-input" @if ($eleve->is_interne)
                                                            checked
                                                        @endif name="is_interne" type="checkbox" id="is_interne" >
                                                        <label class="form-check-label" for="is_interne">
                                                            Interne
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Niveau courant</h5>
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class="">Niveau courant</label>
                                            <select name="niveau_id" class="form-control">
                                                <option value="">selectionner le niveau précédent</option>
                                                @foreach ($niveaux as $niveau)
                                                <option value="{{$niveau->id}}">{{$niveau->name}}</option>
                                                @endforeach
                                            </select>
                                            <x-errors name="niveau_id"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Aptitude</h5>
                                        <div class="position-relative form-group">
                                            <div>
                                                <div class="custom-checkbox custom-control">
                                                    <input name="aptitude" id="Apte" type="radio" class="form-check-input" value="Apte">
                                                    <label class="form-check-label" for="Apte">Apte</label>
                                                </div>
                                                <div class="custom-checkbox custom-control">
                                                    <input name="aptitude" id="Inapte" type="radio" class="form-check-input" value="Inapte">
                                                    <label class="form-check-label" for="Inapte">Inapte</label>
                                                </div>
                                                <div class="custom-checkbox custom-control">
                                                    <input name="aptitude" id="Handicape" type="radio" class="form-check-input" value="Handicapé">
                                                    <label class="form-check-label" for="Handicape">Handicapé</label>
                                                </div>
                                            </div>
                                            <x-errors name="aptitude"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="mt-2 btn btn-success" >Enrégistrer</button>
                    </div>
                </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</x-gestscol>