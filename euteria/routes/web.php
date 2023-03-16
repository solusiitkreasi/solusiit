<?php

use App\Models\Backend\Simanja;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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


Auth::routes([
    'register'=>false,
    'verify'=>false,
    'reset'=>false
]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/storage/link',function(){
    Artisan::call('storage:link');
});

Route::middleware(['auth'])->group(function(){
    Route::name('admin.')->group(function(){ /* admin prefix name */        
        Route::prefix('admin')->group(function(){ /* admin prefix url */
            /* DASHBOARD */
            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            
            Route::namespace('Backend')->group(function(){
                /* ERROR HANDLER */
                Route::get('forbidden', 'ErrorController@forbidden')->name('forbidden');

                /* PROFILE */
                Route::get('user/profile','UserController@profile')->name('user.profile');
                Route::put('user/profile','UserController@profileUpdate')->name('user.profileUpdate');
                Route::put('user/profile/password','UserController@changePassword')->name('user.changePassword');

                /* POST IMAGE */
                Route::get('post-image/post/{post_id}','PostImageController@post')->name('post-image.post');
                Route::delete('post-image/{id}','PostImageController@destroy')->name('post-image.destroy');
                
                // Route::middleware(['role:superadmin|admin'])->group(function(){
                    /* MENU */
                    Route::get('menu/source','MenuController@source')->name('menu.source');
                    Route::get('menu/order/{type}/{id}','MenuController@order')->name('menu.order');
                    Route::resource('menu', 'MenuController');
                    /* USER */
                    Route::get('user/source','UserController@source')->name('user.source');
                    Route::resource('user', 'UserController');
                    /* ROLE */
                    Route::get('role/source','RoleController@source')->name('role.source');
                    Route::get('role/permission/{id}', 'RoleController@permission')->name('role.permission');
                    Route::resource('role', 'RoleController');
                    /* PERMISSION */
                    Route::get('permission/source','PermissionController@source')->name('permission.source');
                    Route::resource('permission', 'PermissionController');

                // });
                /* SETTING */
                Route::get('setting/get_setting', 'SettingController@get_setting')->name('setting.get_setting');                                
                Route::resource('setting', 'SettingController');                                
                /* POST */
                Route::get('post/{slug}/source','PostController@source')->name('post.source');
                Route::get('post/{slug}','PostController@index')->name('post.index');
                Route::get('post/{slug}/create','PostController@create')->name('post.create');
                Route::post('post/{slug}/store','PostController@store')->name('post.store');
                Route::get('post/{slug}/{id}','PostController@show')->name('post.show');
                Route::get('post/{slug}/edit/{id}','PostController@edit')->name('post.edit');
                Route::put('post/{slug}/update/{id}','PostController@update')->name('post.update');
                Route::delete('post/{slug}/destroy/{id}','PostController@destroy')->name('post.destroy');                        
                
                /* SLIDER */
                Route::get('slider/source','SliderController@source')->name('slider.source');
                Route::resource('slider', 'SliderController');
                Route::get('slider/order/{type}/{id}','SliderController@order')->name('slider.order');

                /* BRAND */
                Route::get('brand/source','PostBrandController@source')->name('brand.source');
                Route::resource('brand', 'PostBrandController');

                /* CATEGORY */
                Route::get('category/source','PostCategoryController@source')->name('category.source');
                Route::resource('category', 'PostCategoryController');

                /* TESTIMONY */
                Route::get('testimony/source','TestimonyController@source')->name('testimony.source');
                Route::resource('testimony', 'TestimonyController');

                /* FEEDBACK */
                Route::get('feedback/source','FeedbackController@source')->name('feedback.source');
                Route::resource('feedback', 'FeedbackController');

                Route::get('post-category','PostCategoryController@getCategory');
                
                
            });
        });
    });
});

/* LANGUAGE SWITCH */
Route::get('lang/{language}', function($lang){
    
    $previous_url = url()->previous();

    if(!in_array($lang, config('translatable.locales')))
    {
        return redirect()->route('index');
    }
    request()->session()->put('locale', $lang);
    return redirect($previous_url);
    
})->name('lang.switch');

Route::namespace('Frontend')->group(function(){
    /* HOME */
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/404', 'IndexController@not_found')->name('index.404');
    Route::get('/tentang-kami', 'IndexController@about')->name('index.about');
    Route::get('/hubungi-kami', 'IndexController@contact')->name('index.contact');
    
    /* FEEDBACK */
    Route::post('/feedback', 'FeedbackController@store')->name('index.feedback.store');
    
    /* UTILITY */
    Route::get('/provinsi', 'UtilityController@provinsi')->name('index.utility.provinsi');
    Route::get('/kota', 'UtilityController@kota')->name('index.utility.kota');
    Route::get('/menu/{slug}', 'UtilityController@menu')->name('index.utility.menu');

    /* DINAMYC MENU */
    Route::get('/{slug}', 'IndexController@menu')->name('index.menu');
    Route::get('/{menu_slug}/{post_slug}', 'IndexController@show')->name('index.show');
});

