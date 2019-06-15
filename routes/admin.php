
<?php 
Route::get('/', function() {
    return redirect()->route('admin.login.form');
    //return view('admin.dashboard');
});



Route::group(['middleware' => 'admin.guest'], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');
});




Route::group(['middleware' => 'admin','as' => 'admin.'], function() { 


    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout.post');
    Route::get('profile', 'ProfileController@index')->name('profile.show');
   
    Route::put('change-password', 'ProfileController@update')->name('password.update');



    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index')->middleware('can:browse_dashboard');

    Route::post('file', 'DashboardController@file')->name('file');


    Route::get('bread', 'BreadController@index')->name('bread.index')->middleware('can:browse_bread');
    Route::get('bread/create', 'BreadController@create')->name('bread.create')->middleware('can:add_bread');
    Route::get('bread/{slug}/edit', 'BreadController@edit')->name('bread.edit')->middleware('can:edit_bread');
    Route::put('bread/{bread}/update', 'BreadController@update')->name('bread.update')->middleware('can:edit_bread');
    Route::delete('bread/{slug}/delete', 'BreadController@destroy')->name('bread.destroy')->middleware('can:delete_bread');
    Route::post('bread', 'BreadController@store')->name('bread.store')->middleware('can:add_bread');


    Route::get('role', 'RoleController@index')->name('role.index')->middleware('can:browse_role');
    Route::get('role/create', 'RoleController@create')->name('role.create')->middleware('can:add_role');
    Route::get('role/{role}/edit', 'RoleController@edit')->name('role.edit')->middleware('can:edit_role');
    Route::post('role', 'RoleController@store')->name('role.store')->middleware('can:add_role');
    Route::put('role/{role}', 'RoleController@update')->name('role.update')->middleware('can:edit_role');


    Route::get('menu', 'MenuController@index')->name('menu.index')->middleware('can:browse_menu');
    Route::get('menu/create', 'MenuController@create')->name('menu.create')->middleware('can:add_menu');
    Route::get('menu/{menu}/edit', 'MenuController@edit')->name('menu.edit')->middleware('can:edit_menu');
    Route::post('menu', 'MenuController@store')->name('menu.store')->middleware('can:add_menu');
    Route::put('menu/{menu}', 'MenuController@update')->name('menu.update')->middleware('can:edit_menu');
    Route::delete('menu/{menu}', 'MenuController@destroy')->name('menu.destroy')->middleware('can:delete_menu');

    Route::get('setting', 'MenuController@index')->name('setting.index')->middleware('can:browse_setting');
    Route::get('site-setting', 'SiteSettingController@index')->name('site-setting.index')->middleware('can:browse_site_setting');
    Route::get('blog', 'SiteSettingController@index')->name('blog.index')->middleware('can:browse_blog');


    Route::post('logo', 'SiteSettingController@logo')->name('site-setting.logo')->middleware('can:logo_site_setting');


    //sliders
    Route::match(['get','patch'],'project', 'ProjectController@index')->name('project.index')->middleware('can:browse_project');
    Route::get('project/create', 'ProjectController@create')->name('project.create')->middleware('can:add_project');
    Route::get('project/{project}', 'ProjectController@show')->name('project.show')->middleware('can:read_project');
    Route::get('project/{project}/edit', 'ProjectController@edit')->name('project.edit')->middleware('can:edit_project');
    Route::post('project', 'ProjectController@store')->name('project.store')->middleware('can:add_project');
    Route::put('project/{project}', 'ProjectController@update')->name('project.update')->middleware('can:edit_project');
    Route::delete('project/{project}', 'ProjectController@destroy')->name('project.destroy')->middleware('can:delete_project');
    Route::patch('project','ProjectController@index')->name('project.index')->middleware('can:browse_categories');

    //Slider
    Route::match(['get','patch'],'slider', 'SliderController@index')->name('slider.index')->middleware('can:browse_slider');
    Route::get('slider/create', 'SliderController@create')->name('slider.create')->middleware('can:add_slider');
    Route::get('slider/{slider}', 'SliderController@show')->name('slider.show')->middleware('can:read_slider');
    Route::get('slider/{slider}/edit', 'SliderController@edit')->name('slider.edit')->middleware('can:edit_slider');
    Route::post('slider', 'SliderController@store')->name('slider.store')->middleware('can:add_slider');
    Route::put('slider/{slider}', 'SliderController@update')->name('slider.update')->middleware('can:edit_slider');
    Route::delete('slider/{slider}', 'SliderController@destroy')->name('slider.destroy')->middleware('can:delete_slider');

    //Post
    Route::match(['get','patch'],'post', 'PostController@index')->name('post.index')->middleware('can:browse_post');
    Route::get('post/create', 'PostController@create')->name('post.create')->middleware('can:add_post');
    Route::get('post/{post}', 'PostController@show')->name('post.show')->middleware('can:read_post');
    Route::get('post/{post}/edit', 'PostController@edit')->name('post.edit')->middleware('can:edit_post');
    Route::post('post', 'PostController@store')->name('post.store')->middleware('can:add_post');
    Route::put('post/{post}', 'PostController@update')->name('post.update')->middleware('can:edit_post');
    Route::delete('post/{post}', 'PostController@destroy')->name('post.destroy')->middleware('can:delete_post');

    //Category
    Route::match(['get','patch'],'category', 'CategoryController@index')->name('category.index')->middleware('can:browse_category');
    Route::get('category/create', 'CategoryController@create')->name('category.create')->middleware('can:add_category');
    Route::get('category/{category}', 'CategoryController@show')->name('category.show')->middleware('can:read_category');
    Route::get('category/{category}/edit', 'CategoryController@edit')->name('category.edit')->middleware('can:edit_category');
    Route::post('category', 'CategoryController@store')->name('category.store')->middleware('can:add_category');
    Route::put('category/{category}', 'CategoryController@update')->name('category.update')->middleware('can:edit_category');
    Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy')->middleware('can:delete_category');


    //Tag
    Route::match(['get','patch'],'tag', 'TagController@index')->name('tag.index')->middleware('can:browse_tag');
    Route::get('tag/create', 'TagController@create')->name('tag.create')->middleware('can:add_tag');
    Route::get('tag/{tag}', 'TagController@show')->name('tag.show')->middleware('can:read_tag');
    Route::get('tag/{tag}/edit', 'TagController@edit')->name('tag.edit')->middleware('can:edit_tag');
    Route::post('tag', 'TagController@store')->name('tag.store')->middleware('can:add_tag');
    Route::put('tag/{tag}', 'TagController@update')->name('tag.update')->middleware('can:edit_tag');
    Route::delete('tag/{tag}', 'TagController@destroy')->name('tag.destroy')->middleware('can:delete_tag');


    

    
    


});

    
