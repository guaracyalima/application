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

//Route::get('/', function () {
//    return view('index');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'DashboardController@index')->name('index');


    Route::group(['middleware' => 'auth.check'], function (){
        Route::get('/', 'DashboardController@index')->name('index');

        /*
         * PEPLOES
         */

        //voters
        Route::get('voters', 'VotersController@index')->name('voters');
        Route::get('voters/create', 'VotersController@create')->name('new_voters');
        Route::post('voters/create', 'VotersController@store')->name('voters_add');
        Route::get('voters/show/{id}', 'VotersController@show')->name('show_voters');
        Route::get('voters/destroy/{id}', 'VotersController@delete')->name('destroy_voter');
        Route::get('voters/edit/{id}', 'VotersController@edit')->name('edit_voter');
        Route::post('voters/update/{id}', 'VotersController@update')->name('update_voter');



        //Candidates
        Route::get('candidates', 'CandidatesController@index')->name('candidates');
        Route::get('candidates/create', 'CandidatesController@create')->name('new_candidate');
        Route::post('candidates/add', 'CandidatesController@store')->name('add_candidate');
        Route::get('candidates/show/{id}', 'CandidatesController@show')->name('show_candidates');
        Route::get('candidates/edit/{id}', 'CandidatesController@edit')->name('edit_candidates');
        Route::post('candidates/update/{id}', 'CandidatesController@update')->name('update_candidates');
        Route::get('candidates/destroy/{id}', 'CandidatesController@destroy')->name('destroy_candidates');

        //Candidates
        Route::get('colaborator', 'CollaboratorsController@index')->name('colaborator');
        Route::get('colaborator/create', 'CollaboratorsController@create')->name('new_colaborator');
        Route::post('colaborator/create', 'CollaboratorsController@store')->name('colaborator_add');
        Route::get('colaborator/show/{id}', 'CollaboratorsController@show')->name('show_colaborator');
        Route::get('colaborator/edit/{id}', 'CollaboratorsController@edit')->name('edit_colaborator');
        Route::post('colaborator/update/{id}', 'CollaboratorsController@update')->name('update_colaborator');
        Route::get('colaborator/delete/{id}', 'CollaboratorsController@destroy')->name('destroy_colaborator');


        //Candidates
        Route::get('mail', 'MailController@index')->name('mail');
        Route::get('mail/create', 'MailController@create')->name('new_mail');
        Route::get('mail/show/{id}', 'MailController@show')->name('show_mail');

        /*
         * TERITORY
         */

        //teritories
        Route::get('teritories', 'RegionsController@index')->name('teritories');
        Route::get('teritories/create', 'RegionsController@create')->name('new_regions');
        Route::get('teritories/edit/{id}', 'RegionsController@edit')->name('edit_regions');
        Route::post('teritories/update/{id}', 'RegionsController@update')->name('update_regions');
        Route::get('teritories/destroy/{id}', 'RegionsController@destroy')->name('destroy_regions');


        //teritories
        Route::get('states', 'StatesController@index')->name('states');
        Route::get('states/create', 'StatesController@create')->name('new_states');
        Route::get('states/edit/{id}', 'StatesController@edit')->name('edit_states');
        Route::get('states/show/{id}', 'StatesController@show')->name('show_states');

        //teritories
        Route::get('cities', 'CitiesController@index')->name('cities');
        Route::get('cities/create', 'CitiesController@create')->name('new_cities');
        Route::post('cities/store', 'CitiesController@store')->name('add_cities');
        Route::get('cities/edit/{id}', 'CitiesController@edit')->name('edit_cities');
        Route::post('cities/update/{id}', 'CitiesController@update')->name('update_cities');
        Route::get('cities/destroy/{id}', 'CitiesController@destroy')->name('destroy_cities');


        /*
         * OCCUPATIONS
         */

        //teritories
        Route::get('occupations', 'OccupationsController@index')->name('occupations');
        Route::get('occupations/create', 'OccupationsController@create')->name('new_occupations');
        Route::post('occupations/store', 'OccupationsController@store')->name('add_occupations');
        Route::get('occupations/edit/{id}', 'OccupationsController@edit')->name('edit_occupations');
        Route::post('occupations/update/{id}', 'OccupationsController@update')->name('update_occupations');
        Route::get('occupations/destroy/{id}', 'OccupationsController@destroy')->name('destroy_occupations');

        /*
         * PLANS
         */

        //plans
        Route::get('plans', 'PlansController@index')->name('plans');
        Route::get('plans/create', 'PlansController@create')->name('new_plans');
        Route::post('plans/store', 'PlansController@store')->name('add_plans');
        Route::get('plans/show/{id}', 'PlansController@show')->name('show_plans');
        Route::get('plans/edit/{id}', 'PlansController@edit')->name('edit_plans');
        Route::post('plans/update/{id}', 'PlansController@update')->name('update_plans');
        Route::get('plans/destroy/{id}', 'PlansController@destroy')->name('destroy_plans');


        /*
         * PACKAGES
         */

        //package
        Route::get('packages', 'PackagesController@index')->name('packages');
        Route::get('packages/create', 'PackagesController@create')->name('new_packages');
        Route::post('packages/store', 'PackagesController@store')->name('add_packages');
        Route::get('packages/show/{id}', 'PackagesController@show')->name('show_packages');
        Route::get('packages/edit/{id}', 'PackagesController@edit')->name('edit_packages');
        Route::post('packages/update/{id}', 'PackagesController@update')->name('update_packages');
        Route::get('packages/destroy/{id}', 'PackagesController@destroy')->name('destroy_packages');

        /*
         * SCHOOLINGS
         */

        //schoolings
        Route::get('schooling', 'EducationsController@index')->name('schooling');
        Route::get('schooling/create', 'EducationsController@create')->name('new_schooling');
        Route::post('schooling/store', 'EducationsController@store')->name('add_schooling');
        Route::get('schooling/edit/{id}', 'EducationsController@edit')->name('edit_schooling');
        Route::post('schooling/update/{id}', 'EducationsController@update')->name('update_schooling');
        Route::get('schooling/show/{id}', 'EducationsController@show')->name('show_schooling');
        Route::get('schooling/destroy/{id}', 'EducationsController@destroy')->name('destroy_schooling');

    });