<?php

use Illuminate\Support\Facades\Route;




Route::prefix('auth')->namespace('Auth')->name('auth.')->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/login', 'LoginController@index')->name('login');
        Route::post('/login', 'LoginController@login');
    });

    Route::middleware('auth')->group(function(){
        Route::get('logout','LogoutController')->name("logout");
        Route::get('switch','LoginController@switch')->name('switch');
    });
});

Route::middleware('auth')->group(function(){
    Route::prefix('{etablissement}')->group(function(){
        Route::get('/', 'HomeController@index')->name('index');

        // gestion des ressources 

        // ajout et liste des eleves
        Route::prefix('student')->name('student.')->namespace('Eleves')->group(function(){
            Route::get('/','ElevesController@index')->name('index');
            Route::get('/add','ElevesController@create')->name('add');
            Route::post('/add','ElevesController@store');
            Route::prefix('{eleve}')->group(function(){
                Route::get('/show','ElevesController@show')->name('show');
                Route::get('/edit','ElevesController@edit')->name('edit');
                Route::post('/edit','ElevesController@update');
                Route::get('/delete','ElevesController@delete')->name('delete');
            });
        });

        // ajout et listes des cycles
        Route::prefix('cycles')->name('cycles.')->namespace('Cycles')->group(function(){
            Route::get('/','CyclesController@index')->name('index');
            Route::get('/add','CyclesController@create')->name('add');
            Route::post('/add','CyclesController@store');
            Route::prefix('{cycle}')->group(function(){
                Route::get('/show','CyclesController@show')->name('show');
                Route::get('/edit','CyclesController@edit')->name('edit');
                Route::post('/edit','CyclesController@update');
                Route::get('/delete','CyclesController@delete')->name('delete');
            });
        });

        // ajout et listes des Niveau
        Route::prefix('niveaux')->name('niveaux.')->namespace('Niveau')->group(function(){
            Route::get('/','NiveauController@index')->name('index');
            Route::get('/add','NiveauController@create')->name('add');
            Route::post('/add','NiveauController@store');
            Route::prefix('{niveau}')->group(function(){
                Route::get('/show','NiveauController@show')->name('show');
                Route::get('/edit','NiveauController@edit')->name('edit');
                Route::post('/edit','NiveauController@update');
                Route::get('/delete','NiveauController@delete')->name('delete');

            
                    // ajout et listes des goupes de matières
            Route::prefix('groupeMatiere')->name('groupeMatieres.')->namespace('GroupeMatieres')->group(function(){
                Route::get('/','GroupeMatieresController@index')->name('index');
                Route::post('/','GroupeMatieresController@store');
            /* Route::get('/add','GroupeMatieresController@create')->name('add');
                Route::post('/add','GroupeMatieresController@store');*/
                Route::prefix('{groupeMatiere}')->group(function(){
                //  Route::get('/show','GroupeMatieresController@show')->name('show');
                    Route::get('/edit','GroupeMatieresController@edit')->name('edit');
                    Route::post('/edit','GroupeMatieresController@update');
                    Route::get('/delete','GroupeMatieresController@delete')->name('delete');
                });
            });
            
            });
        });

         // ajout et listes des Classes
         Route::prefix('classes')->name('classes.')->namespace('Classes')->group(function(){
            Route::get('/','ClassesController@index')->name('index');
            Route::get('/add','ClassesController@create')->name('add');
            Route::post('/add','ClassesController@store');
            Route::prefix('{classeAnnee}')->group(function(){
                Route::get('/show','ClassesController@show')->name('show');
                Route::get('/edit','ClassesController@edit')->name('edit');
                Route::post('/edit','ClassesController@update');
                Route::get('/delete','ClassesController@delete')->name('delete');
            });
        });

          // ajout et listes des matières
        Route::prefix('matiere')->name('matieres.')->namespace('Matieres')->group(function(){
            Route::get('/','MatieresController@index')->name('index');
            Route::get('/add','MatieresController@create')->name('add');
            Route::post('/add','MatieresController@store');
            Route::prefix('{matiere}')->group(function(){
                Route::get('/show','MatieresController@show')->name('show');
                Route::get('/edit','MatieresController@edit')->name('edit');
                Route::post('/edit','MatieresController@update');
                Route::get('/delete','MatieresController@delete')->name('delete');
            });
        });
    

           // ajout et listes des periodes
        Route::prefix('periode')->name('periodes.')->namespace('Periodes')->group(function(){
            Route::get('/','PeriodesController@index')->name('index');
            Route::get('/add','PeriodesController@create')->name('add');
            Route::post('/add','PeriodesController@store');
            Route::prefix('{periode}')->group(function(){
                Route::get('/show','PeriodesController@show')->name('show');
                Route::get('/edit','PeriodesController@edit')->name('edit');
                Route::post('/edit','PeriodesController@update');
                Route::get('/delete','PeriodesController@delete')->name('delete');
            });
        });
    
        // ajout et listes des sous periodes
        Route::prefix('sousperiode')->name('sousperiodes.')->namespace('SousPeriodes')->group(function(){
            Route::get('/','SousPeriodesController@index')->name('index');
            Route::get('/add','SousPeriodesController@create')->name('add');
            Route::post('/add','SousPeriodesController@store');
            Route::prefix('{sousPeriode}')->group(function(){
                Route::get('/show','SousPeriodesController@show')->name('show');
                Route::get('/edit','SousPeriodesController@edit')->name('edit');
                Route::post('/edit','SousPeriodesController@update');
                Route::get('/delete','SousPeriodesController@delete')->name('delete');
            });
        });

        // ajout et listes des evaluations
        Route::prefix('evaluation')->name('evaluations.')->namespace('Evaluations')->group(function(){
            Route::get('/','EvaluationsController@index')->name('index');
            Route::get('/add','EvaluationsController@create')->name('add');
            Route::post('/add','EvaluationsController@store');
            Route::prefix('{evaluation}')->group(function(){
                Route::get('/show','EvaluationsController@show')->name('show');
                Route::get('/edit','EvaluationsController@edit')->name('edit');
                Route::post('/edit','EvaluationsController@update');
                Route::get('/delete','EvaluationsController@delete')->name('delete');
            });
        });

        Route::prefix('enseignants')->name('enseignants.')->namespace('Enseignants')->group(function(){
            Route::get('/','EnseignantsController@index')->name('index');
            Route::get('/add','EnseignantsController@create')->name('add');
            Route::post('/add','EnseignantsController@store');
            Route::prefix('{enseignantAnnee}')->group(function(){
                Route::get('/show','EnseignantsController@show')->name('show');
                Route::get('/edit','EnseignantsController@edit')->name('edit');
                Route::post('/edit','EnseignantsController@update');
                Route::get('/delete','EnseignantsController@delete')->name('delete');
            });
        });

        // configuratioon des ressources 
        
        Route::prefix('affectations')->group(function(){
            Route::prefix('student')->name('student.')->namespace('Eleves')->group(function(){
                Route::get('/','EleveClassesController@index')->name('affectations');
                Route::post('/affectations','EleveClassesController@store')->name('addaffectations');
                Route::post('/removeaffectations','EleveClassesController@remove')->name('removeaffectations');
                Route::post('/eleve-classe','EleveClassesController@getEleveClasse')->name('eleve-classe');
            });
            Route::prefix('matiere')->name('matiere.')->namespace('Matieres')->group(function(){
                Route::get('/','MatieresController@indexAffectation')->name('affectations');
                Route::post('/','MatieresController@storeAffectation');
                Route::prefix('{classeMatiere}')->name('affectations.')->group(function(){
                    Route::get('/delete','MatieresController@deleteAffectionMatiere')->name('delete');
                });
            });
        });
        Route::prefix('parametrages')->name('parametrages.')->group(function(){
            Route::prefix('matiere')->name('matiere.')->namespace('Matieres')->group(function(){
                Route::get('/parametrage','MatieresController@indexParametrage')->name('index');
                Route::post('/parametrage','MatieresController@storeParametrage')->name('index');
                Route::post('/groupe-matiere','MatieresController@groupMatiereNiveau')->name('groupeMatiere');
                Route::prefix('{matiereNiveau}')->group(function(){
                    Route::get('/parametrage/edit','MatieresController@editParametrage')->name('edit');
                    Route::post('/parametrage/edit','MatieresController@updateParametrage')->name('edit');
                    Route::get('/parametrage/delete','MatieresController@deleteParametrage')->name('delete');
                });
            });
            
        });

            // parametrage des matieres par niveaux 
        
        Route::prefix('affectations')->group(function(){
            Route::prefix('student')->name('student.')->namespace('Eleves'
            )->group(function(){
                Route::get('/','EleveClassesController@index')->name('affectations');
                Route::post('/affectations','EleveClassesController@store')->name('addaffectations');
                Route::post('/removeaffectations','EleveClassesController@remove')->name('removeaffectations');
                Route::post('/eleve-classe','EleveClassesController@getEleveClasse')->name('eleve-classe');
            });
        });

        //gestion des disciplines
            // ajout et listes des evaluations
            
        Route::prefix('sanction')->name('sanctions.')->namespace('Disciplines\Sanctions')->group(function(){
            Route::get('/','SanctionsController@index')->name('index');
            Route::get('/add','SanctionsController@create')->name('add');
            Route::post('/add','SanctionsController@store');
            Route::prefix('{sanction}')->group(function(){
                Route::get('/show','SanctionsController@show')->name('show');
                Route::get('/edit','SanctionsController@edit')->name('edit');
                Route::post('/edit','SanctionsController@update');
                Route::get('/delete','SanctionsController@delete')->name('delete');
            });
        });
            // ajout et listes des parametrages des sanctions
        
        Route::prefix('parametragesanction')->name('parametragesanctions.')->namespace('Disciplines\Sanctions')->group(function(){
            Route::get('/','ParametrageSanctionsController@index')->name('index');
            Route::post('/','ParametrageSanctionsController@store')->name('index');
            
            /* Route::get('/add','ParametrageSanctionsController@create')->name('add');
            Route::post('/add','ParametrageSanctionsController@store');*/
            Route::prefix('{parametrageSanction}')->group(function(){
                Route::get('/show','ParametrageSanctionsController@show')->name('show');
                Route::get('/edit','ParametrageSanctionsController@edit')->name('edit');
                Route::post('/edit','ParametrageSanctionsController@update');
                Route::get('/delete','ParametrageSanctionsController@delete')->name('delete');
            });
        });
            // ajout et listes des consultations
        
        Route::prefix('consultation')->name('consultations.')->namespace('Disciplines\Consultations')->group(function(){
            Route::get('/','ConsultationsController@index')->name('index');
            Route::get('/add','ConsultationsController@create')->name('add');
            Route::post('/add','ConsultationsController@store');
            Route::prefix('{consultation}')->group(function(){
                Route::get('/show','ConsultationsController@show')->name('show');
                Route::get('/edit','ConsultationsController@edit')->name('edit');
                Route::post('/edit','ConsultationsController@update');
                Route::get('/delete','ConsultationsController@delete')->name('delete');
            });
        });

        //gestion des notes 

        Route::prefix('note')->name('notes.')->namespace('Notes')->group(function(){
            Route::get('/','NotesController@Saisie')->name('saisie-note');
            Route::get('/gestion-avance','NotesController@gestionAvance')->name('gestion-avance');
            Route::get('/matiere-classe','NotesController@getMatiereFromClasse')->name('matiere-classe');
            Route::get('/ensaigant-matiere','NotesController@getEnseignant')->name('ensaigant-matiere');
            Route::get('/sous-periode','NotesController@getSousPeriode')->name('sous-periode');
            Route::get('/get-evaluation-periode','NotesController@getEvaluationPeriode')->name('get-evaluation-periode');
            Route::post('/save_evaluation_periode','NotesController@saveEvaluationPeriode')->name('save_evaluation_periode');
            Route::post('/save_note','NotesController@saveNote')->name('saveNote');
            Route::post('/update-evaluation','NotesController@updateEvalution')->name('update-evaluation');
            Route::prefix('{evaluation}')->group(function(){
                Route::get('/edit','NotesController@editSaisie')->name('edit');
            });
        });

        Route::prefix('cloture')->name('cloture.')->namespace('Synthese')->group(function(){
            Route::get('/classe','SyntheseController@Index')->name('classe');
            Route::get('/periode','SyntheseController@EvaluationEleveMatierePeriode')->name('periode');
        });

        Route::prefix('bulletins')->name('bulletins.')->namespace('Synthese')->group(function(){
            Route::get('/','SyntheseController@Bulletins')->name('bulletin-eleve');
            Route::get('/eleve','SyntheseController@eleveByClasse')->name('eleves');
        });
    });
});
