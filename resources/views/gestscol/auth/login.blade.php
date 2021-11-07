<x-gestscol title="Login">
    <div class="auth-page">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
                <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                    <div class="mdc-card">
                        {{ html()->form('POST', URL::full())->open() }}
                        
                        <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                    <div class="mdc-text-field w-100">
                                        <input type="text" class="mdc-text-field__input @error('email') is-invalid @enderror" name="email" id="email text-field-hero-input" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <div class="mdc-line-ripple">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="text-field-hero-input" class="mdc-floating-label">Email</label>
                                    </div>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                    <div class="mdc-text-field w-100">
                                        <input class="mdc-text-field__input @error('password') is-invalid @enderror" name="password" type="password" id="password text-field-hero-input" id="password">
                                        <div class="mdc-line-ripple">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="text-field-hero-input" class="mdc-floating-label">Mots de Passe</label>
                                    </div>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                    <div class="mdc-form-field">
                                        <div class="form-check">
                                            <input class="form-check-input" name="remember" type="checkbox" value="off" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                            Se souvenir de moi
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex align-items-center justify-content-end">
                                    <a href="#">Mot de passe oublié</a>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                    
                                    <button class="mdc-button mdc-button--raised w-100" type="submit">Se connecter</button>
                                </div>
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
                <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
            </div>
        </div>
    </div>
</x-gestscol>
