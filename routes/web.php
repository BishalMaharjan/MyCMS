<?php
use App\Vacancies;
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
Route::view('/', 'welcome');



Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', function () {
    return ('welcome');
})->middleware(['auth', 'auth.user']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/categories/create', 'CategoriesController@create')->middleware('auth');
    Route::get('/categories/index', 'CategoriesController@index')->name('home.categories')->middleware('auth');

    Route::post('/categories/{id}', 'CategoriesController@store');
    Route::post('/categories', 'CategoriesController@store');
    Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit')->middleware('auth');
    Route::patch('/categories/{id}', 'CategoriesController@update')->name('categories.update');
    Route::delete('/categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');

    Route::get('/content/index', 'ContentController@index')->name('home.contents')->middleware('auth');
    Route::get('/content/create', 'ContentController@create')->middleware('auth');
    Route::post('/contents', 'ContentController@store');
    Route::get('/contents/edit/{id}', 'ContentController@edit')->name('contents.edit')->middleware('auth');
    Route::patch('/contents/{id}', 'ContentController@update')->name('contents.update')->middleware('auth');
    Route::delete('/contents/{content}', 'ContentController@destroy')->name('contents.destroy')->middleware('auth');
    Route::get('/contents_categories/{category}', 'ContentController@category_contents_index')->middleware('auth');
    Route::get('/content_detail_index/{id}', 'ContentController@show_index');

});
Route::get('/generate/models', '\\Jimbolino\\Laravel\\ModelBuilder\\ModelGenerator5@start');


Auth::routes();
Route::get('/bookmark/create', 'BookmarkController@create')->name('bookmark.create');
Route::post('/bookmark', 'BookmarkController@store')->name('bookmark.store');
Route::get('/bookmark/index', 'BookmarkController@index')->name('bookmark.index')->middleware('auth');
Route::delete('/bookmark/{id}', 'BookmarkController@destroy')->name('bookmark.destroy')->middleware('auth');

Route::get('/categories/list', 'CategoriesController@categories');
Route::get('/contents', 'ContentController@view_contents');
Route::get('/content_detail/{id}', 'ContentController@show');
Route::get('/contents/{category}', 'ContentController@category_contents');





Route::get('/home', 'HomeController@index')->name('home');


Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth', 'admin']],
    function () {
        Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
        Route::get('/vacancy', 'VacancyController@index')->name('home.vacancy');
        Route::get('/create_vacancy', 'VacancyController@create')->name('create.vacancy');
        Route::post('/create_vacancy', 'VacancyController@store')->name('store.vacancy');
        Route::get('/show_vacancy/{id}', 'VacancyController@show')->name('show.vacancy');
        Route::get('/edit_vacancy/{id}', 'VacancyController@edit')->name('edit.vacancy');
        Route::patch('/update_vacancy/{id}', 'VacancyController@update')->name('update.vacancy');
        Route::delete('/delete_vacancy/{id}', 'VacancyController@destroy')->name('delete.vacancy');

        Route::get('/user', 'UserController@index')->name('home.user');
        Route::get('/create_user', 'UserController@create')->name('create.user');
        Route::post('/create_user', 'userController@store')->name('store.user');
        Route::get('/edit_user/{id}', 'UserController@edit')->name('edit.user');
        Route::patch('/update_user/{id}', 'UserController@update')->name('update.user');
        Route::delete('/delete_user/{id}', 'UserController@destroy')->name('delete.user');

        Route::get('/role', 'RoleController@index')->name('home.role');
        Route::get('/create_role', 'RoleController@create')->name('create.role');
        Route::post('/create_role', 'RoleController@store')->name('store.role');
        Route::get('/edit_role/{id}', 'RoleController@edit')->name('edit.role');
        Route::patch('/update_role/{id}', 'RoleController@update')->name('update.role');
        Route::delete('/delete_role/{id}', 'RoleController@destroy')->name('delete.role');

        Route::get('/categories/create', 'CategoriesController@create')->middleware('auth');
        Route::get('/categories/index', 'CategoriesController@index')->name('home.categories')->middleware('auth');
    
        Route::post('/categories/{id}', 'CategoriesController@store');
        Route::post('/categories', 'CategoriesController@store');
        Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit')->middleware('auth');
        Route::patch('/categories/{id}', 'CategoriesController@update')->name('categories.update');
        Route::delete('/categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');
    
        Route::get('/content/index', 'ContentController@index')->name('home.contents')->middleware('auth');
        Route::get('/content/create', 'ContentController@create')->middleware('auth');
        Route::post('/contents', 'ContentController@store');
        Route::get('/contents/edit/{id}', 'ContentController@edit')->name('contents.edit')->middleware('auth');
        Route::patch('/contents/{id}', 'ContentController@update')->name('contents.update')->middleware('auth');
        Route::delete('/contents/{content}', 'ContentController@destroy')->name('contents.destroy')->middleware('auth');
        Route::get('/contents_categories/{category}', 'ContentController@category_contents_index')->middleware('auth');
        Route::get('/content_detail_index/{id}', 'ContentController@show_index');

        Route::get('/marketing/create', 'MarketingController@create')->name('marketing.create');
Route::get('/marketing/index', 'MarketingController@index')->name('marketing.index');
Route::get('/marketing/{id}/view', 'MarketingController@show')->name('marketing.view');
Route::post('/marketing', 'MarketingController@store')->name('marketing.store');
Route::get('/marketing/{id}/edit', 'MarketingController@edit')->name('marketing.edit');
Route::patch('/marketing/{id}', 'MarketingController@update')->name('marketing.update');
Route::delete('/marketing/{advertisment}', 'MarketingController@destroy')->name('marketing.destroy');

Route::get('/advertisment/create', 'AdvertismentController@create')->name('advertisment.create');
Route::get('/advertisment/index', 'AdvertismentController@index')->name('advertisment.index');
Route::get('/advertisment/{id}/view', 'AdvertismentController@show')->name('advertisment.view');
Route::post('/advertisment', 'AdvertismentController@store')->name('advertisment.store');
Route::get('/advertisment/{id}/edit', 'AdvertismentController@edit')->name('advertisment.edit');
Route::patch('/advertisment/{id}', 'AdvertismentController@update')->name('advertisment.update');
Route::delete('/advertisment/{advertisment}', 'AdvertismentController@destroy')->name('advertisment.destroy');

    }
);
Route::group(
    ['prefix' => 'editor',  'middleware' => ['auth', 'editor']],
    function () {
        Route::get('dashboard', 'Editor\DashboardController@index')->name('editor.dashboard');

//         Route::get('/categories/create', 'CategoriesController@create');
//         Route::get('/categories/index', 'CategoriesController@index')->name('home.categories');
    
//         Route::post('/categories/{id}', 'CategoriesController@store');
//         Route::post('/categories', 'CategoriesController@store');
//         Route::get('/categories/edit/{id}', 'CategoriesController@edit')->name('categories.edit');
//         Route::patch('/categories/{id}', 'CategoriesController@update')->name('categories.update');
//         Route::delete('/categories/{category}', 'CategoriesController@destroy')->name('categories.destroy');
    
//         Route::get('/content/index', 'ContentController@index')->name('home.contents');
//         Route::get('/content/create', 'ContentController@create');
//         Route::post('/contents', 'ContentController@store');
//         Route::get('/contents/edit/{id}', 'ContentController@edit')->name('contents.edit');
//         Route::patch('/contents/{id}', 'ContentController@update')->name('contents.update');
//         Route::delete('/contents/{content}', 'ContentController@destroy')->name('contents.destroy');
//         Route::get('/contents_categories/{category}', 'ContentController@category_contents_index');
//         Route::get('/content_detail_index/{id}', 'ContentController@show_index');

//         Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
//         Route::get('/vacancy', 'VacancyController@index')->name('home.vacancy');
//         Route::get('/create_vacancy', 'VacancyController@create')->name('create.vacancy');
//         Route::post('/create_vacancy', 'VacancyController@store')->name('store.vacancy');
//         Route::get('/show_vacancy/{id}', 'VacancyController@show')->name('show.vacancy');
//         Route::get('/edit_vacancy/{id}', 'VacancyController@edit')->name('edit.vacancy');
//         Route::patch('/update_vacancy/{id}', 'VacancyController@update')->name('update.vacancy');
//         Route::delete('/delete_vacancy/{id}', 'VacancyController@destroy')->name('delete.vacancy');

//         Route::get('/marketing/create', 'MarketingController@create')->name('marketing.create');
// Route::get('/marketing/index', 'MarketingController@index')->name('marketing.index');
// Route::get('/marketing/{id}/view', 'MarketingController@show')->name('marketing.view');
// Route::post('/marketing', 'MarketingController@store')->name('marketing.store');
// Route::get('/marketing/{id}/edit', 'MarketingController@edit')->name('marketing.edit');
// Route::patch('/marketing/{id}', 'MarketingController@update')->name('marketing.update');
// Route::delete('/marketing/{advertisment}', 'MarketingController@destroy')->name('marketing.destroy');


// Route::get('/advertisment/create', 'AdvertismentController@create')->name('advertisment.create');
// Route::get('/advertisment/index', 'AdvertismentController@index')->name('advertisment.index');
// Route::get('/advertisment/{id}/view', 'AdvertismentController@show')->name('advertisment.view');
// Route::post('/advertisment', 'AdvertismentController@store')->name('advertisment.store');
// Route::get('/advertisment/{id}/edit', 'AdvertismentController@edit')->name('advertisment.edit');
// Route::patch('/advertisment/{id}', 'AdvertismentController@update')->name('advertisment.update');
// Route::delete('/advertisment/{advertisment}', 'AdvertismentController@destroy')->name('advertisment.destroy');
        
    }
);
Route::group(
    ['prefix' => 'user',  'middleware' => ['auth', 'user']],
    function () {
        Route::get('dashboard', 'User\DashboardController@index')->name('user.dashboard');
    }
);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'EditorController@user')->name('user');

    Route::get('/permission_denied', 'EditorController@PermissionDenied')->name('nopepermission');

    Route::get('/editorpanel', 'EditorController@editor')->name('editor');

    Route::get('/adminpanel', 'EditorController@admin')->name('admin');
});

Route::get('/abc', function () {
    $arr = [19, 21, 46];
    $collection = collect($arr);
    dd($collection);
});
Route::get('/example', 'CollectionController@example');

Route::get('/backup', function () {

    \Illuminate\Support\Facades\Artisan::call('backup:run');

    return 'Successful backup!';

});