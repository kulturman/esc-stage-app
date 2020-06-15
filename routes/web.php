<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/password/reset', 'ResetPasswordController@index');

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::resource('roles', 'RoleController');

Route::resource('filieres', 'FiliereController');

Route::resource('annees', 'AnneeController');

Route::resource('users', 'UserController')->middleware('auth');
Route::get('/etudiants' , 'UserController@viewEtudiants')->name('etudiants.index');
Route::get('/etudiants/create' , 'UserController@createEtudiant')->name('etudiants.create');


Route::resource('stages', 'StageController')->except(['create']);
Route::get('/mes/stages' , 'StageController@mesStages')->name('stages.my_stages');
Route::get('/etudiants/{student}/stage/create' , 'StageController@create')->name('users.create.stage');

Route::get('/depots/{stage}/create' , 'DepotController@create')->name('depots.create');
Route::resource('depots', 'DepotController')->except(['create']);
Route::resource('modules', 'ModuleController');
Route::resource('entreprises', 'EntrepriseController');
Route::resource('professeurs', 'ProfesseurController');

Route::get('/choix/professeurs', 'ProfesseurController@choixProfesseur')->name('professeurs.choix');
Route::post('/choix/professeurs', 'ProfesseurController@storeChoixProfesseur');
Route::get('/disponibles/professeurs', 'ProfesseurController@listProfesseursDisponibles');
Route::get('/mes/choix', 'EtudiantController@mesChoix')->name('etudiants.mes_choix');
Route::get('/choix/etudiants', 'EtudiantController@listChoixEtudiants')->name('etudiants.liste_choix');
Route::post('validate/depot/{depot}', 'DepotController@validateDepot')->name('depots.validate');

Route::get('amend/depot/{depot}', 'DepotController@showAmendForm')->name('depots.amend');
Route::post('amend/depot/{depot}', 'DepotController@amendDepot');
Route::get('can/depots', 'DepotController@can')->name('depots.can');
Route::get('prof/{stage}/suggestions', 'DepotController@viewSuggestions')->name('depots.view_suggesions');

Route::resource('soutenances', 'SoutenanceController');
Route::get('/notify_teachers', 'UtilController@notifyTeachers');

Route::get('/stats/phase', 'StageController@statPhase');
Route::get('/get-student-by-name', 'EtudiantController@getByName')->name('etudiants.get-by-name');

Route::resource('preinscriptions', 'PreinscriptionController');
Route::post('/notify/preinscriptions/{preInscrit}', 'PreinscriptionController@notify')
        ->name('preinscriptions.notify');
//Route::post('preinscriptions', 'PreinscriptionControlle@notifyAll')->name('preinscriptions.notifyAll');

Route::resource('prospects', 'ProspectController');

Route::get('/change/password', 'UserController@showPasswordChangeForm')->name('users.change_password');
Route::post('/change/password', 'UserController@updatePassword')->name('users.change_password');

Route::get('/rapports/validation/create', 'RapportFinalController@create')->name('rapports.create');
Route::post('/rapports/validation/create', 'RapportFinalController@store');
Route::get('/rapports/validation', 'RapportFinalController@index')->name('rapports.index');