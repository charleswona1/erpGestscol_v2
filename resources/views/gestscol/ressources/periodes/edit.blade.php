<x-gest-scol title="Modification d'une période">
    
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-next icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Modification d'une Période

                        </div>
                    </div>
                    <div class="page-title-actions">

                        <div class="d-inline-block dropdown">


                        </div>
                    </div>
                </div>
            </div>
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">
                    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                        <span>Formulaire</span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="main-card mb-3 card">

                                <div class="card-body ">
                                    {{ html()->form('POST', URL::full())->open() }}
                                        @csrf
                                        <table class="col-md-10">
                                            <tr class="col-md-5">
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Numéro <span
                                                                style="color:red;">*</span></label>
                                                        <input placeholder=" Numéro" value="{{$periode->numero}}" name="numero" type="number"
                                                            class="form-control" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Pourcentage
                                                            Annuel (%) <span style="color:red;">*</span></label>
                                                        <input name="pourcentage" value="{{$periode->pourcentage}}" placeholder="Pourcentage " step=any type="number"
                                                            class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="col-md-5">
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Date de début
                                                            <span style="color:red;">*</span></label>
                                                        <input name="startAt" value="{{$periode->startAt}}" placeholder="Date de début" type="date"
                                                            class="form-control" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Date de fin
                                                            <span style="color:red;">*</span></label>
                                                        <input name="endAt" value="{{$periode->endAt}}" placeholder="Date de fin " type="date"
                                                            class="form-control" required>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>


                                        <button class="mt-1 btn btn-secondary"><a href="periodes-liste.html"
                                                style="color:white; text-decoration:none;">Annuler</a></button>
                                        <button class="mt-1 btn btn-success" type="submit">Modifier</button>

                                        {{ html()->form()->close() }}
                                    </div>
                            </div>
                        </div>

                    </div>

                </div>
                </x-gestscol>
