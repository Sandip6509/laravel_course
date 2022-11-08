<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ConditionalController;
use App\Http\Controllers\CrudOperationController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\LoopsController;
use App\Http\Controllers\QueryBuilderController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/welcome', 'view', ['message' => 'This is first messages','name' =>'My name is Sandip']);
// Route::get('/{firstName}/{lastName}', function($firstName,$lastName){
//     return "My name is ".$firstName.' '.$lastName;
// });

// Route::get('user/profile', function(){
//     return "route name";
// })->name('profile');
// Route::get('/greeting', function () {
//     return "Greeting";
// });
// Route::get('/unavailable', function () {
//     return view('unavailable');
// });
// Route::redirect('/', 'greeting');

// Route::get('user',[UserController::class,'index']);
// Route::resource('test',TestController::class);

// Route::view('/about','about');
// Route::view('/contact','contact');
// Route::group(['middleware'=> ['CheckAuth']], function(){
//     Route::view('/user_profile','user_profile');
//     Route::view('/user_dashboard','user_dashboard');
// });

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-view', function () {
    return view('test');
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/nesting-view', [UserController::class, 'nestingView']);

Route::get('/view-existence', [UserController::class, 'viewExistence']);

Route::get('/test', [UserController::class, 'testFunction']);

//Passing data to views.

Route::get('/name-array', [UserController::class, 'nameArray']);

Route::get('/compact-function', [UserController::class, 'compactFunction']);

Route::get('/with-function/{id}', [UserController::class, 'withFunction']);

// Coditional
Route::get('/condition-statement',[ConditionalController::class,'conditionStatement']);
Route::get('/loop-example',[LoopsController::class,'loopExample']);

// Component
Route::get('/alert-component',[UserController::class,'alertComponent']);

// Helpers
Route::get('/array-helpers',[UserController::class,'arrayHelpers']);
Route::get('/paths-helpers',[UserController::class,'pathHelpers']);
Route::get('/string-helpers',[UserController::class,'stringHelpers']);
Route::get('/fluent-helpers',[UserController::class,'fluentHelpers'])->name('fluent.string');
Route::get('/url-helpers',[UserController::class,'urlHelpers']);
Route::get('/misc-helpers',[UserController::class,'miscHelpers']);
Route::get('/custom-helpers',[UserController::class,'customHelpers']);
Route::get('/http-client-curl',[UserController::class,'httpClientCurl']);
Route::get('/http-client',[UserController::class,'httpClient']);
Route::view('/login', 'login');
Route::post('/http-methods',[UserController::class,'httpMethods']);
Route::get('/session-methods',[UserController::class,'sessionMethods']);
Route::get('/flash-method',[UserController::class,'flashMethods']);
Route::get('/flash-data', [UserController::class, 'flashData']);
Route::get('/flash-another-data', [UserController::class, 'flashAnotherData']);

// Database
Route::get('/check-db-connection',[DatabaseController::class,'checkDbConnection']);
Route::get('/sql-query',[DatabaseController::class,'sqlQueries']);
Route::get('/retrieve-method',[QueryBuilderController::class,'retrieveMethod']);
Route::get('/aggregate-method',[QueryBuilderController::class,'aggregateMethod']);
Route::get('/select-statement',[QueryBuilderController::class,'selectStatement']);
Route::get('/join-statement',[QueryBuilderController::class,'joinStatement']);
Route::get('/where-statement',[QueryBuilderController::class,'whereMethod']);
Route::get('/ordering',[QueryBuilderController::class,'ordering']);
Route::get('/grouping',[QueryBuilderController::class,'grouping']);
Route::get('/limit-offset',[QueryBuilderController::class,'limitAndoffset']);
Route::get('/operations',[QueryBuilderController::class,'operation']);
// One To One
Route::get('/get-brand-data',[BrandController::class,'oneToone']);
Route::get('/get-dealer-data',[BrandController::class,'One2One']);
// One To Many
Route::get('/get-many-rel', [BrandController::class,'One2Many']);
// Many To Many
Route::get('belongsToManyDealers',[BrandController::class,'belongsToManyDealers']);
Route::get('belongsToManyBrands',[BrandController::class,'belongsToManyBrands']);

// Has One Through
Route::get('view-cities',[RelationController::class,'viewCities'])->name('view_cities');
Route::get('view-multiple-cities',[RelationController::class,'viewMultipleCities'])->name('view_multiple_cities');

// One To One Polymorphic
Route::get('one-to-one-polymorphic',[BrandController::class,'OneToOnePolymorphic']);
Route::get('one-to-many-polymorphic',[BrandController::class,'OneToManyPolymorphic']);
Route::get('many-to-many-polymorphic',[BrandController::class,'ManyToManyPolymorphic']);

// Accessor
Route::get('accessor',[UserController::class,'accessor'])->name('accessor');
// Mutator
Route::get('mutator',[UserController::class,'mutator'])->name('mutator');

// Route Model Binding 1 Implicit
// Route::get('implicit/users/{user:first_name}', function(User $user){
//     echo '<pre>';
//     print_r($user);
//     echo exit;
// });
// 2
// Route::get('implicit/users/{user:last_name}',[UserController::class,'getUser']);
// 3
Route::get('implicit/users/{user}',[UserController::class,'getUser']);
// 4
Route::get('implicit/users/{user}/brand/{brand}', function(User $user, Brand $brand){
    echo '<pre>';
    print_r([$user,$brand]);
    echo exit;
});

// Route Model Binding 1 explicit
Route::get('explicit/users/{user}',function($user){
    echo '<pre>';
    print_r($user);
    echo exit;
});

Route::get('localization',[UserController::class,'localization']);

// CRUD
Route::resource('crud', CrudOperationController::class);

// Email Send
Route::get('sendmail',[UserController::class,'sendMail']);

// Queue & job
Route::get('queue', function () {
    return view('queue');
});

Route::post('queue', [UserController::class, 'queue'])->name('queue');
