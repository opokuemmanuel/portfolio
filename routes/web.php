<?php
//
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
Route::get('/loginUser', function () {
    return view('user.loginUser');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/serach', 'searchController@search')->name('home');

//Auth::routes();
//

Route::group(['middleware'=>'auth'] ,function(){

    //All routes on products//////////////
    Route::get('/ShowAddProduct', [App\Http\Controllers\ProjectsController::class, 'ShowAddProduct'])->name('ShowAddProduct');
    Route::get('/ShowAddProductStaff', [App\Http\Controllers\ProjectsController::class, 'ShowAddProductStaff'])->name('ShowAddProductStaff');
    Route::post('/addProject', [App\Http\Controllers\ProjectsController::class, 'addProject'])->name('addProject');
    Route::post('/addProjectStaff', [App\Http\Controllers\ProjectsController::class, 'addProjectStaff'])->name('addProjectStaff');
    Route::get('/allProjects', [App\Http\Controllers\ProjectsController::class, 'allProjects'])->name('allProjects');
    Route::get('/allProjectStaff', [App\Http\Controllers\ProjectsController::class, 'allProjectsStaff'])->name('allProjectsStaff');
    Route::get('/DeleteProject/{id}', [App\Http\Controllers\ProjectsController::class, 'delete']);
    Route::get('/DeleteProjectStaff/{id}', [App\Http\Controllers\ProjectsController::class, 'deleteStaff']);
    Route::get('/EditProject/{id}', [App\Http\Controllers\ProjectsController::class, 'editProject']);
    Route::get('/EditProjectStaff/{id}', [App\Http\Controllers\ProjectsController::class, 'editProjectStaff']);
    Route::post('/updateProject', [App\Http\Controllers\ProjectsController::class, 'updateProject'])->name('updateProject');
    Route::post('/updateProjectStaff', [App\Http\Controllers\ProjectsController::class, 'updateProjectStaff'])->name('updateProjectStaff');

    ////////////////All routes on login/signIn///////////////////////////

    ////////////////////All rutes on search///////////////
    Route::get('/SearchStaff', [App\Http\Controllers\ProjectsController::class, 'search_projectStaff'])->name('SearchStaff');
    Route::get('/Search', [App\Http\Controllers\ProjectsController::class, 'search_project'])->name('Search');

    //////////////////All routes on logs///////////////////////////////////////
    Route::get('/logs', [App\Http\Controllers\logsController::class, 'logs'])->name('logs');



///////////////////All routes on staff///////////////////////////////
    Route::get('/user', [App\Http\Controllers\userController::class, 'show'])->name('ShowAddUser');
    Route::get('/allUsers', [App\Http\Controllers\userController::class, 'allUsers'])->name('AllUsers');
    Route::get('/EditStaffs/{id}', [App\Http\Controllers\userController::class, 'ShowEdit']);
    Route::get('/deleteStaff/{staff_id}', [App\Http\Controllers\userController::class, 'delete']);


    Route::get('/show/auth/logs', [App\Http\Controllers\logsController::class, 'auth_logs'])->name('Auth_logs');

});


//All routes on dashboard/////////////////////
Route::get('/dashboard', [App\Http\Controllers\dashboardController::class, 'showDashboard'])->name('dashboard');
Route::get('/dashboardStaff', [App\Http\Controllers\dashboardController::class, 'showDashboardStaff'])->name('dashboardStaff');

Route::get('/', [App\Http\Controllers\portfolioController::class, 'portfolio']);

//Route::get('/','portfolioController@portfolio');

////////////////All routes on login/signIn///////////////////////////
Route::get('/signUp/User', [App\Http\Controllers\accessController::class, 'showSignUp'])->name('SignupUser');
Route::get('/login/User', [App\Http\Controllers\accessController::class, 'showLogin'])->name('showLogin');
Route::post('/login/account', [App\Http\Controllers\accessController::class, 'loginUser'])->name('loginUser');

///////////////////////// view auth user////////////////////////////////////////////////
Route::get('/ViewUser/{id}', [App\Http\Controllers\logsController::class, 'view_user']);

