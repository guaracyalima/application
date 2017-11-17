<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['cors']], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('', 'AuthController@auth');
    });


//    Route::group(['middleware' => ['jwt.auth']], function () {
//the routing middleware

        Route::group(['prefix' => 'users'], function () {
            Route::get('', 'UsersController@index');
            Route::post('', 'UsersController@store');
            Route::get('/{id}', 'UsersController@show');
            Route::put('/{id}', 'UsersController@update');
            Route::delete('/{id}', 'UsersController@destroy');
        });

        Route::group(['prefix' => 'candidates'], function () {
            Route::get('', 'CandidatesController@index');
            Route::post('', 'CandidatesController@store');
            Route::get('/{id}', 'CandidatesController@show');
            Route::put('/{id}', 'CandidatesController@update');
            Route::delete('/{id}', 'CandidatesController@destroy');
        });

        Route::group(['prefix' => 'plans'], function () {
            Route::get('', 'PlansController@index');
            Route::post('', 'PlansController@store');
            Route::get('/{id}', 'PlansController@show');
            Route::put('/{id}', 'PlansController@update');
            Route::delete('/{id}', 'PlansController@destroy');
        });

        Route::group(['prefix' => 'voters'], function () {
            Route::get('', 'VotersController@index');
            Route::post('', 'VotersController@store');
            Route::get('/{id}', 'VotersController@show');
            Route::put('/{id}', 'VotersController@update');
            Route::delete('/{id}', 'VotersController@destroy');
        });

        Route::group(['prefix' => 'collaborators'], function () {
            Route::get('', 'CollaboratorsController@index');
            Route::post('', 'CollaboratorsController@store');
            Route::get('/{id}', 'CollaboratorsController@show');
            Route::put('/{id}', 'CollaboratorsController@update');
            Route::delete('/{id}', 'CollaboratorsController@destroy');
        });

        Route::group(['prefix' => 'teritories'], function () {
            Route::get('', 'RegionsController@index');
            Route::post('', 'RegionsController@store');
            Route::get('/{id}', 'RegionsController@show');
            Route::put('/{id}', 'RegionsController@update');
            Route::delete('/{id}', 'RegionsController@destroy');
        });

        Route::group(['prefix' => 'states'], function () {
            Route::get('', 'StatesController@index');
            Route::post('', 'StatesController@store');
            Route::get('/{id}', 'StatesController@show');
            Route::put('/{id}', 'StatesController@update');
            Route::delete('/{id}', 'StatesController@destroy');
        });

        Route::group(['prefix' => 'cities'], function () {
            Route::get('', 'CitiesController@index');
            Route::post('', 'CitiesController@store');
            Route::get('/{id}', 'CitiesController@show');
            Route::put('/{id}', 'CitiesController@update');
            Route::delete('/{id}', 'CitiesController@destroy');
        });

        Route::group(['prefix' => 'packages'], function () {
            Route::get('', 'PackagesController@index');
            Route::post('', 'PackagesController@store');
            Route::get('/{id}', 'PackagesController@show');
            Route::put('/{id}', 'PackagesController@update');
            Route::delete('/{id}', 'PackagesController@destroy');
        });

        Route::group(['prefix' => 'mailing'], function () {
            Route::get('', 'SendmailsController@index');
            Route::post('', 'SendmailsController@store');
            Route::get('/{id}', 'SendmailsController@show');
            Route::put('/{id}', 'SendmailsController@update');
            Route::delete('/{id}', 'SendmailsController@destroy');
        });

        Route::group(['prefix' => 'occupations'], function () {
            Route::get('', 'OccupationsController@index');
            Route::post('', 'OccupationsController@store');
            Route::get('/{id}', 'OccupationsController@show');
            Route::put('/{id}', 'OccupationsController@update');
            Route::delete('/{id}', 'OccupationsController@destroy');
        });

        Route::group(['prefix' => 'educations'], function () {
            Route::get('', 'EducationsController@index');
            Route::post('', 'EducationsController@store');
            Route::get('/{id}', 'EducationsController@show');
            Route::put('/{id}', 'EducationsController@update');
            Route::delete('/{id}', 'EducationsController@destroy');
        });


    Route::group(['prefix' => 'brokens'], function () {
        Route::get('', 'BrokensController@index');
        Route::post('', 'BrokensController@store');
        Route::get('/{id}', 'BrokensController@show');
        Route::put('/{id}', 'BrokensController@update');
        Route::delete('/{id}', 'BrokensController@destroy');
    });

        Route::get('/sms/send/{to}', function(\Nexmo\Client $nexmo, $to){
            $message = $nexmo->message()->send([
                'to' => $to,
                'from' => '@leggetter',
                'text' => 'Teste de envio de SMS - Eleja-se!'
            ]);
            Log::info('sent message: ' . $message['message-id']);
        });

    //});


});
