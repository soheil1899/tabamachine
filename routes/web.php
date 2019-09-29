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


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');





Route::namespace('Admin')->middleware(['auth', 'CheckAdmin'])->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin');

});



Route::prefix('{lang?}')->namespace('Client')->middleware('Langswitch')->group(function () {

    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/machine/{id}', 'MachineController@index')->name('machine');
    Route::get('/aboutus', 'IndexController@aboutus')->name('about.us');
    Route::get('/contactus', 'IndexController@contactus')->name('contactus');
    Route::get('/customer', 'IndexController@customer')->name('customer');
    Route::post('/savemessage', 'IndexController@savemessage')->name('save.message');
    Route::post('/changelanguage', 'IndexController@changelanguage')->name('change.language');


});



// dashboard
Route::prefix('dashboard')->namespace('Admin')->middleware(['auth', 'CheckAdmin'])->group(function () {



    Route::get('/changemyinfo', 'AdminController@getmyinfo')->name('changemyinfo');
    Route::post('/getmyinfo', 'AdminController@getmyinfos')->name('get.myinfo');
    Route::post('saveuserinfo', 'UserController@saveuserinfo')->name('saveuser.info');





    Route::group(['middleware' => 'CheckUseradmin'], function () {
        // user
        Route::get('user', 'UserController@index')->name('user.list');
        Route::post('users', 'UserController@getusers')->name('get.users');
        Route::post('saveuser', 'UserController@saveuser')->name('save.user');
        Route::post('deleteuser', 'UserController@deleteuser')->name('delete.user');
        Route::post('saveuseraccess', 'UserController@saveuseraccess')->name('saveuser.access');
        Route::get('user/{id}', 'UserController@userinfo')->name('user.info');
        Route::post('getuserinfo', 'UserController@getuserinfo')->name('getuser.info');
        Route::post('savestoreinfo', 'UserController@savestoreinfo')->name('savestore.info');


    });


    Route::group(['middleware' => 'CheckSuperadmin'], function () {

        Route::get('setting', 'SettingController@index')->name('setting');
        Route::post('getsetting', 'SettingController@getsetting')->name('get.setting');
        Route::post('savelogoimage', 'SettingController@savelogoimage')->name('save.logoimage');
        Route::post('savebannerimage', 'SettingController@savebannerimage')->name('save.bannerimage');
        Route::post('savesetting', 'SettingController@savesetting')->name('save.setting');
        Route::post('savecompanycatalog', 'SettingController@savecompanycatalog')->name('save.companycatalog');




        Route::get('customerlist', 'CustomerController@index')->name('customer.list');
        Route::post('getcustomer', 'CustomerController@getcustomer')->name('get.customer');
        Route::post('savecustomer', 'CustomerController@savecustomer')->name('save.customer');
        Route::post('deletecustomer', 'CustomerController@deletecustomer')->name('delete.customer');




        Route::get('posts', 'CommentController@index')->name('posts');
        Route::post('getcomment', 'CommentController@getcomment')->name('get.comment');




        Route::get('menu', 'MenuController@index')->name('menu');
        Route::post('getmenugroup', 'MenuController@getmenugroup')->name('get.menugroup');
        Route::post('savegroupmenu', 'MenuController@savegroupmenu')->name('save.menugroup');
        Route::post('deletegroupmenu', 'MenuController@deletegroupmenu')->name('delete.menugroup');
        Route::get('submenu/{id}', 'MenuController@submenu')->name('submenu');
        Route::post('getsubmenu', 'MenuController@getsubmenu')->name('get.submenu');
        Route::post('savesubmenu', 'MenuController@savesubmenu')->name('save.submenu');
        Route::post('deletesubmenu', 'MenuController@deletesubmenu')->name('delete.submenu');
    });






    Route::group(['middleware' => 'CheckWriteradmin'], function () {
        // article
        // group
        Route::get('article', 'ArticleController@index')->name('article.group.list');
        Route::post('getarticlegroups', 'ArticleController@getarticlegroups')->name('get.articlegroups');
        Route::post('savegroup', 'ArticleController@savegroup')->name('save.articlegroup');
        // article
        Route::get('articles/{id}', 'ArticleController@articles')->name('articles');
        Route::post('getarticles', 'ArticleController@getarticles')->name('get.articles');
        Route::post('savearticle', 'ArticleController@savearticle')->name('save.article');
        Route::post('savearticleimage', 'ArticleController@savearticleimage')->name('save.articleimage');
        Route::post('changeorder', 'ArticleController@changeorder')->name('changeorder.article');
        Route::post('deletearticle', 'ArticleController@deletearticle')->name('delete.article');
        Route::post('savearticlepdf', 'ArticleController@savearticlepdf')->name('save.articlepdf');
        Route::post('savearticleattr', 'ArticleController@savearticleattr')->name('save.articleattr');
        //content
        Route::get('articles/articles-content/{id}', 'ArticleController@articlecontent')->name('get.articlecontent');
        Route::post('getarticlecontent', 'ArticleController@getarticlecontent')->name('get.articlecontent');
        Route::post('savearticlecontent', 'ArticleController@savearticlecontent')->name('save.articlecontent');
        Route::post('deletecontent', 'ArticleController@deletecontent')->name('delete.content');
        Route::post('changecontentorder', 'ArticleController@changecontentorder')->name('change.contentorder');
        Route::post('savefile', 'ArticleController@savefile')->name('save.file');
        Route::post('savegallery', 'ArticleController@savegallery')->name('save.gallery');
        Route::post('deletegalleryimage', 'ArticleController@deletegalleryimage')->name('delete.galleryimage');
        Route::post('changepublisharticle', 'ArticleController@changepublisharticle')->name('changepublish.article');
        // content new
        Route::get('newcontent', 'ArticleController@newcontent')->name('new.content');
        Route::post('newcontentreload', 'ArticleController@newcontentreload')->name('new.content.reload');

    });


    // slider
    Route::get('slider', 'SliderController@index')->name('slider');
    Route::post('getslider', 'SliderController@getslider')->name('getslider');
    Route::post('savesliderimage', 'SliderController@savesliderimage')->name('save.sliderimage');
    Route::post('deletesliderimage', 'SliderController@deletesliderimage')->name('delete.sliderimage');
    Route::post('deleteslider', 'SliderController@deleteslider')->name('delete.slider');
    Route::post('changepublishslider', 'SliderController@changepublishslider')->name('changepublish.slider');
    Route::post('saveimagedetails', 'SliderController@saveimagedetails')->name('saveimage.details');



    // tag
    Route::get('tag', 'TagController@index')->name('tag.list');
    Route::post('gettags', 'TagController@gettags')->name('get.tags');
    Route::post('savetag', 'TagController@savetag')->name('save.tag');







    Route::get('changeuserinfo', 'UserController@changeuserinfo')->name('changeuserinfo');
    Route::post('getuserinfo', 'UserController@getuserinfo')->name('getuserinfo');
    Route::post('saveuserinfo', 'UserController@saveuserinfo')->name('saveuserinfo');


























});
