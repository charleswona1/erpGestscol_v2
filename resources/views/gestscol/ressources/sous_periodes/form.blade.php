<x-gest-scol title="Creation d'une sous période">
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-albums icon-gradient bg-premium-dark">
                            </i>
                        </div>
                        <div>Création d'une Sous-Période

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
                                                    <div class="position-relative form-group"><label for="exampleSelect"
                                                            class="">Période <span
                                                                style="color:red;">*</span></label>
                                                        <select name="periode_id" class="form-control" required>
                                                            @foreach ($periodes as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nom_periode() }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Numéro de
                                                            Sous-Période<span style="color:red;">*</span></label>
                                                        <input name="numero" placeholder=" " type="number"
                                                            class="form-control" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="col-md-5">
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Date de début
                                                            <span style="color:red;">*</span></label>
                                                        <input name="startAt" placeholder=" " type="date"
                                                            class="form-control" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail" class="">Date de fin
                                                            <span style="color:red;">*</span></label>
                                                        <input name="endAt" placeholder=" " type="date"
                                                            class="form-control" required>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>


                                        <button class="mt-1 btn btn-secondary"><a href="#"
                                                style="color:white; text-decoration:none;">Annuler</a></button>
                                        <button class="mt-1 btn btn-success">Enregistrer</button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-gestscol>
