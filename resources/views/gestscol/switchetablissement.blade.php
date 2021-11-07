<x-gestscol title="Login">
    <div class="auth-page">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
                <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                    <div class="mdc-card p-5 h-100 d-flex flex-column justify-content-center align-items-center">
                        <h3 class="text-center mb-5">sur quelle etablissement voulez-vous accéder ?</h3>

                        <div class="row justify-content-center">
                            @foreach (Auth::user()->etablissementUser as $etablissement)
                            <div class="card m-4" style="max-width: 250px">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted text-center">{{$etablissement->etablissement->type_etablissement}}</h6>
                                    <h5 class="card-title text-center">{{$etablissement->etablissement->name}}</h5>
                                    <a href="{{route('gestscol.index',$etablissement->etablissement)}}" class="card-link">Suivre</a>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
            </div>
        </div>
    </div>
</x-gestscol>