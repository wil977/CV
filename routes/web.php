<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','AcceuilController@index');
Route::get('/route',function ()
{
  return view('auth/register');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'AcceuilAdminController@index')->name('dashboard');

//Route concernant la gestion des propos
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/propos', 'ProposAdminController@index')->name('propos');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/propos/save', 'ProposAdminController@saveP')->name('Savepropos');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/propos/edit', 'ProposAdminController@editP')->name('Editpropos');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/propos/delete', 'ProposAdminController@deleteP')->name('Deletepropos');

//Route concernant la gestion des Compétences
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/competences', 'CompetenceAdminController@index')->name('competence');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/competences/save', 'CompetenceAdminController@saveC')->name('Savecompetence');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/competences/edit', 'CompetenceAdminController@editC')->name('Editcompetence');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/competences/delete', 'CompetenceAdminController@deleteC')->name('Deletecompetence');

//Route concernant la gestion des Services
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/services', 'ServiceAdminController@index')->name('service');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/services/save', 'ServiceAdminController@saveS')->name('Saveservice');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/services/edit', 'ServiceAdminController@editS')->name('Editservice');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/services/delete', 'ServiceAdminController@deleteS')->name('Deleteservice');

//Route concernant la gestion des Education
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/educations', 'EducationAdminController@index')->name('education');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/educations/save', 'EducationAdminController@saveEd')->name('Saveeducation');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/educations/edit', 'EducationAdminController@editEd')->name('Editeducation');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/educations/delete', 'EducationAdminController@deleteEd')->name('Deleteeducation');

//Route concernant la gestion des Education
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/experiences', 'ExperienceAdminController@index')->name('experience');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/experiences/save', 'ExperienceAdminController@saveEx')->name('Saveexperience');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/experiences/edit', 'ExperienceAdminController@editEx')->name('Editexperience');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/experiences/delete', 'ExperienceAdminController@deleteEx')->name('Deleteexperience');

//Route concernant la gestion des contacts
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/contacts', 'ContactAdminController@index')->name('contact');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/contacts/save', 'ContactAdminController@saveCo')->name('Savecontact');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/contacts/edit', 'ContactAdminController@editCo')->name('Editcontact');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/contacts/delete', 'ContactAdminController@deleteCo')->name('Deletecontact');

//Route concernant la gestion des contacts
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/messages', 'MessageAdminController@index')->name('message');
Route::post('/dashboard/messages/save', 'MessageAdminController@saveM')->name('Savemessage');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/messages/delete', 'MessageAdminController@deleteM')->name('Deletemessage');

//Route concernant la gestion des mise a jour de cv
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/uploadcv', 'UploadcvAdminController@index')->name('cvview');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/uploadcv/upload', 'UploadcvAdminController@uploadFile')->name('uploadcv');
Route::get('/dashboard/uploadcv/download', 'UploadcvAdminController@downloadFile')->name('downloadcv');

//Route concernant la gestion des Statistiques
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/stats', 'StatAdminController@index')->name('stat');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/stats/save', 'StatAdminController@saveSt')->name('Savestat');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/stats/edit', 'StatAdminController@editSt')->name('Editstat');
Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/stats/delete', 'StatAdminController@deleteSt')->name('Deletestat');
