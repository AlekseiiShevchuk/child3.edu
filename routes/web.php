<?php
Route::get('/', function () {
    return redirect('/categoties');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('categoties', 'CategotiesController');
    Route::post('categoties_mass_destroy', ['uses' => 'CategotiesController@massDestroy', 'as' => 'categoties.mass_destroy']);
    Route::resource('lessons', 'LessonsController');
    Route::post('lessons_mass_destroy', ['uses' => 'LessonsController@massDestroy', 'as' => 'lessons.mass_destroy']);
    Route::resource('slides', 'SlidesController');
    Route::post('slides_mass_destroy', ['uses' => 'SlidesController@massDestroy', 'as' => 'slides.mass_destroy']);
    Route::resource('answers', 'AnswersController');
    Route::post('answers_mass_destroy', ['uses' => 'AnswersController@massDestroy', 'as' => 'answers.mass_destroy']);
    Route::resource('reactions', 'ReactionsController');
    Route::post('reactions_mass_destroy', ['uses' => 'ReactionsController@massDestroy', 'as' => 'reactions.mass_destroy']);

});
