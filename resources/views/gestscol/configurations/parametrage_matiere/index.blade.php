<x-gest-scol title="Paramétrage des Matières par Niveau">
    <div class="app-page-title" style="position:relative; top:0%;">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-share icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>Paramétrage des Matières par Niveau
                </div>
            </div>
            <div class="page-title-actions">

                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
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

            <div class="col-md-10">
                <div class="main-card mb-3 card">
                    <x-flashback></x-flashback>
                    <div class="card-body ">
                        {{ html()->form('POST', URL::full())->open() }}
                        @csrf
                        <table class="col-md-12">
                            <tr>
                                <td>
                                    <div class="position-relative form-group"><label for="exampleSelect"
                                            class="">Niveau <span
                                                style="color:red;">*</span></label>
                                        <select name="niveau_id" id="niveau_id" class="form-control" required>
                                            <option value="">Selectionnez un niveau</option>
                                            @foreach ($niveaux as $niveau)
                                                <option value="{{ $niveau->id }}">{{ $niveau->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group"><label for="exampleSelect"
                                            class="">Matière <span
                                                style="color:red;">*</span></label>
                                        <select name="matiere_id" class="form-control" required>
                                            <option value="">Selectionnez une matiere</option>
                                            @foreach ($matieres as $matiere)
                                                <option value="{{ $matiere->id }}">
                                                    {{ $matiere->name }}</option>
                                            @endforeach
                                        
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Coefficient <span
                                                style="color:red;">*</span></label>
                                        
                                                <input name="coefficient"
                                            placeholder=" " type="float" class="form-control" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail" class="">Groupe <span
                                                style="color:red;">*</span></label>
                                                <select name="groupe_matiere_id" id="group_matiere" class="form-control" required disabled>
                                                    <option value="">Selectionnez le groupe</option>
                                                </select>              
                                                <!--<input
                                            name="groupe_matiere_id" placeholder=" " type="number"
                                            class="form-control" required>-->
                                    </div>
                                </td>
                            </tr>

                        </table>


                        <button class="mt-1 btn btn-secondary"><a href="classe-liste.html"
                                style="color:white; text-decoration:none;">Annuler</a></button>
                        <button class="mt-1 btn btn-success" type="submit">Enregistrer</button>

                        {{ html()->form()->close() }}
                    </div>
                </div>


                <div class="main-card mb-3 card">

                    <div class="card-body" class="scroll-area-md">
                        <!-- <h5 class="card-title">Table with hover</h5> -->
                        <table class="mb-0 table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="exampleCustomCheckbox">
                                            </label>
                                        </div>
                                    </th>
                                    <th>Matière</th>
                                    <th>Coefficient</th>
                                    <th>Groupe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($matiere_niveaux as $item)

                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" id="exampleCustomCheckbox"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="exampleCustomCheckbox">
                                                </label>
                                            </div>
                                        </th>
                                        <td>{{ $item->matiere->name }}</td>
                                        <td>{{ $item->coefficient }}</td>
                                        <td>{{ $item->groupe_matiere->name }}</td>

                                        <td class="mdc-data-table__cell">
                                            <a href="utilisateur-profil.html"><i
                                                    class="fas fa-eye"></i></i></a>
                                            <a
                                                href="{{ route('gestscol.parametrages.matiere.edit', [$etablissement,$item]) }}"><i
                                                    class="fas fa-edit"></i></i></a>
                                            <a href=""><i class="fas fa-print"></i></i></a>
                                            <a href="{{ route('gestscol.parametrages.matiere.delete', [$etablissement,$item]) }}"
                                                style="color:red;"><i class="fas fa-trash"></i></i></a>
                                        </td>
                                    </tr>


                                @empty
                                    <tr>
                                        <td colspan="10">
                                            <div class="lead text-center text-muted pt-30 pb-30">
                                                Pas de parametrage de sanctions
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <th scope="row" colspan="5">
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('javascripts')
        <script>
            $('#group_matiere').prop("disabled", true);
            $('#niveau_id').on('change',function (ev) {
                niveau_id = ev.target.value;
                
                $.ajax({
                    url: "{{route('gestscol.parametrages.matiere.groupeMatiere',$etablissement)}}",
                    type: "POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        niveau_id: niveau_id
                    },

                    success:function(response){
                        $('#group_matiere').empty();
                        console.log(response);
                        let data = ""
                        $('#group_matiere').prop("disabled", false);
                        data += "<option value=''>Selectionnez le groupe</option>";
                            $.each(response, function(key,val){
                                data+="<option value="+val.id+">"+val.name+"</option>";
                            });
                        
                        $('#group_matiere').append(data);
                    },
                    error: function(errors){
                       console.log(errors)
                    }
                });
            });
        </script>
    @endpush
</x-gest-scol>
