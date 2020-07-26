 <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LanguageController;
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


    // Switch between the included languages
    Route::get('lang/{lang}', [LanguageController::class, 'swap']);
    Route::group(['middleware' => ['auth'], 'namespace' => 'Backend', 'prefix' => 'backend'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('posts', 'PostController');
        Route::resource('branches', 'BranchController');
        Route::resource('cities', 'CityController');
        Route::resource('universities', 'UniversityController');
        Route::resource('departments', 'DepartmentController');
        Route::resource('languages', 'LanguageController');
        Route::resource('achievementtypes', 'AchievementTypeController');
        Route::resource('achievements', 'AchievementController');
        Route::resource('sliders', 'SliderController');

    });



    Route::group(['namespace' => 'Frontend'], function () {
        Route::get('/', function () {
            return view('welcome');
        });
        Route::domain('{branch_subdomain}.' . config('app.short_url'))->group(function () {
            Route::get('/', 'ProductsController@index')->name('products.index');
            Route::resource('products', 'ProductsController')->only(['index', 'show']);
        });
    });

Auth::routes();

Route::get('/home',
    function () {
        return view('welcome');
    });
