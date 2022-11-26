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
	Route::post('api/fetch-states', [CityController::class, 'fetchState']);
	Route::resource('villages', VillageController::class);
	Route::post('api/fetch-cities', [CityController::class, 'fetchCity']);
	Route::resource('universities', UniversityController::class);
	Route::resource('schools', SchoolController::class);
	Route::resource('colleges', CollegeController::class);
	Route::resource('eobjects', EobjectController::class);
	Route::resource('professions', ProfessionController::class);
	Route::resource('subobjects', SubobjectController::class);
	
	
});