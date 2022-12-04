<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CasteController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\MotherToungueController;
use App\Http\Controllers\PassoutYearController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StclassController;
use App\Http\Controllers\StudyYearController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\EobjectController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SubobjectController;
use App\Http\Controllers\LocationController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('countries', CountryController::class);
	Route::resource('boards', BoardController::class);
	Route::resource('courses', CourseController::class);
	Route::resource('castes', CasteController::class);
	Route::resource('exams', ExamController::class);
	Route::resource('toungues', MotherToungueController::class);
	Route::resource('passouts', PassoutYearController::class);
	Route::resource('subjects', SubjectController::class);
	Route::resource('semesters', SemesterController::class);
	Route::resource('stclasses', StclassController::class);
	Route::resource('studies', StudyYearController::class);
	Route::resource('states', StateController::class);
	Route::resource('chapters', ChapterController::class);
	Route::resource('cities', CityController::class);
	Route::resource('villages', VillageController::class);
	Route::resource('universities', UniversityController::class);
	Route::resource('schools', SchoolController::class);
	Route::resource('colleges', CollegeController::class);
	Route::resource('eobjects', EobjectController::class);
	Route::resource('professions', ProfessionController::class);
	Route::resource('subobjects', SubobjectController::class);
	Route::resource('locations', LocationController::class);
	Route::post('api/fetch-states', [LocationController::class, 'fetchState']);
	Route::post('api/fetch-cities', [LocationController::class, 'fetchCity']);
	Route::get('import-universities', [UniversityController::class, 'universityImport'])->name('import-universities');
	Route::post('importfile-universities', [UniversityController::class, 'universitiesFileImport'])->name('file-import-university');
	Route::post('api/fetch-universities', [UniversityController::class, 'fetchUniversity']);
	Route::get('import-colleges', [CollegeController::class, 'collegeImport'])->name('import-colleges');
	Route::post('importfile-colleges', [CollegeController::class, 'collegesFileImport'])->name('file-import-college');
	Route::post('add-city', [LocationController::class, 'addCity'])->name('add-city');
	Route::post('add-villege', [LocationController::class, 'addVillege'])->name('add-villege');
	
	
});