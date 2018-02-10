<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routess
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware ( 'auth:api' )->get ( '/user' , function ( Request $request ) {
    return $request->user ();
} );
Route::group ( [ 'middleware' => [ 'cors' ] ] , function () {

    Route::group ( [ 'prefix' => 'login' ] , function () {
        Route::post ( '' , 'AuthController@auth' );

    } );
    Route::get ( 'me' , 'AuthController@bodao' );
    Route::group ( [ 'prefix' => 'users' ] , function () {
        Route::get ( '' , 'UsersController@index' );
        Route::post ( '' , 'UsersController@store' );
        Route::get ( 'me/{id}' , 'UsersController@show' );
        Route::put ( '/{id}' , 'UsersController@update' );
        Route::delete ( '/{id}' , 'UsersController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'candidates' ] , function () {
        Route::get ( '' , 'CandidatesController@index' );
        Route::post ( '' , 'CandidatesController@store' );
        Route::get ( '/{id}' , 'CandidatesController@show' );
        Route::put ( '/{id}' , 'CandidatesController@update' );
        Route::delete ( '/{id}' , 'CandidatesController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'plans' ] , function () {
        Route::get ( '' , 'PlansController@index' );
        Route::post ( '' , 'PlansController@store' );
        Route::get ( '/{id}' , 'PlansController@show' );
        Route::put ( '/{id}' , 'PlansController@update' );
        Route::delete ( '/{id}' , 'PlansController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'voters' ] , function () {
        Route::get ( '/myvorets/{id}' , 'VotersController@index' );
        Route::get ( '/collaborator/{id}' , 'VotersController@myvoters' );
        Route::post ( '' , 'VotersController@store' );
        Route::get ( '/{id}' , 'VotersController@show' );
        Route::put ( '/{id}' , 'VotersController@update' );
        Route::delete ( '/{id}' , 'VotersController@destroy' );
        Route::get ( 'mylastweek' , 'VotersController@created_in_last_week' );
    } );
    Route::group ( [ 'prefix' => 'collaborators' ] , function () {
        Route::get ( '/mycollaborator/{id}' , 'CollaboratorsController@index' );
        Route::post ( '' , 'CollaboratorsController@store' );
        Route::get ( '/{id}' , 'CollaboratorsController@show' );
        Route::get ( '/coordinator/{id}' , 'CollaboratorsController@is_coordinator' );
        Route::put ( '/{id}' , 'CollaboratorsController@update' );
        Route::delete ( '/{id}' , 'CollaboratorsController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'teritories' ] , function () {
        Route::get ( '' , 'RegionsController@index' );
        Route::post ( '' , 'RegionsController@store' );
        Route::get ( '/{id}' , 'RegionsController@show' );
        Route::put ( '/{id}' , 'RegionsController@update' );
        Route::delete ( '/{id}' , 'RegionsController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'states' ] , function () {
        Route::get ( '' , 'StatesController@index' );
        Route::post ( '' , 'StatesController@store' );
        Route::get ( '/{id}' , 'StatesController@show' );
        Route::put ( '/{id}' , 'StatesController@update' );
        Route::delete ( '/{id}' , 'StatesController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'cities' ] , function () {
        Route::get ( '' , 'CitiesController@index' );
        Route::post ( '' , 'CitiesController@store' );
        Route::get ( '/{id}' , 'CitiesController@show' );
        Route::put ( '/{id}' , 'CitiesController@update' );
        Route::delete ( '/{id}' , 'CitiesController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'packages' ] , function () {
        Route::get ( '' , 'PackagesController@index' );
        Route::post ( '' , 'PackagesController@store' );
        Route::get ( '/{id}' , 'PackagesController@show' );
        Route::put ( '/{id}' , 'PackagesController@update' );
        Route::delete ( '/{id}' , 'PackagesController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'mailing' ] , function () {
        Route::get ( 'mymails/{id}' , 'SendmailsController@index' );
        Route::post ( '' , 'SendmailsController@store' );
        Route::get ( '/{id}' , 'SendmailsController@show' );
        Route::get ( '/{id}' , 'SendmailsController@show' );
        Route::put ( '/{id}' , 'SendmailsController@update' );
        Route::delete ( '/{id}' , 'SendmailsController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'occupations' ] , function () {
        Route::get ( '' , 'OccupationsController@index' );
        Route::post ( '' , 'OccupationsController@store' );
        Route::get ( '/{id}' , 'OccupationsController@show' );
        Route::put ( '/{id}' , 'OccupationsController@update' );
        Route::delete ( '/{id}' , 'OccupationsController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'educations' ] , function () {
        Route::get ( '' , 'EducationsController@index' );
        Route::post ( '' , 'EducationsController@store' );
        Route::get ( '/{id}' , 'EducationsController@show' );
        Route::put ( '/{id}' , 'EducationsController@update' );
        Route::delete ( '/{id}' , 'EducationsController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'brokens' ] , function () {
        Route::get ( '' , 'BrokensController@index' );
        Route::post ( '' , 'BrokensController@store' );
        Route::get ( '/{id}' , 'BrokensController@show' );
        Route::put ( '/{id}' , 'BrokensController@update' );
        Route::delete ( '/{id}' , 'BrokensController@destroy' );
    } );
    Route::group ( [ 'prefix' => 'rolers' ] , function () {
        Route::get ( '' , 'RolersController@index' );
        Route::post ( '' , 'RolersController@store' );
        Route::get ( '/{id}' , 'RolersController@show' );
        Route::put ( '/{id}' , 'RolersController@update' );
        Route::delete ( '/{id}' , 'RolersController@destroy' );
    } );
    // Route::get('/sms/send/{to}', function(\Nexmo\Client $nexmo, $to){
    //     $message = $nexmo->message()->send([
    //         'to' => $to,
    //         'from' => '@leggetter',
    //         'text' => 'Teste de envio de SMS - Eleja-se!'
    //     ]);
    //     Log::info('sent message: ' . $message['message-id']);
    // });
    Route::group ( [ 'prefix' => 'report' ] , function () {
        Route::get ( '' , 'ReportController@index' );
        Route::get ( 'numeric' , 'ReportsController@numeric_report' );
        Route::get ( 'supporters' , 'ReportsController@supporters' );
        Route::get ( 'voters_created_today' , 'ReportsController@voters_created_today' );
        Route::get ( 'created_in_last_month' , 'ReportsController@created_in_last_month' );
        Route::get ( 'created_in_last_week' , 'ReportsController@created_in_last_week' );
        Route::post ( 'agetotage' , 'ReportsController@agetoage' );
        Route::get ( 'birth_in_the_month' , 'ReportsController@voter_of_birth_is_in_the_month' );
        Route::get ( 'mysupporters/{id}' , 'ReportsController@mysupporters' );
        Route::get ( 'myvoters/{id}' , 'ReportsController@myvoters' );
    } );
    Route::group ( [ 'prefix' => 'enrichiment_voter' ] , function () {
        Route::get ( '' , 'VoterMoreInformationsController@index' );
        Route::post ( '' , 'ReportsController@store' );
    } );
    Route::group ( [ 'prefix' => 'research' ] , function () {
        Route::get ( '' , 'ResearchesController@index' );
        Route::post ( '' , 'ResearchesController@store' );
    } );
    Route::group ( [ 'prefix' => 'sms' ] , function () {
        Route::get ( '' , 'SmsController@index' );
        Route::post ( '' , 'SmsController@new_message_test' );
    } );
    Route::group ( [ 'prefix' => 'advancedsearch' ] , function () {
        Route::get ( '' , 'ReportsController@advances_search_all' );
        Route::post ( '/agetoage' , 'AdvancedSearch@agetoage' );
        Route::post ( '/byoccupation' , 'AdvancedSearch@byoccupation' );
        Route::post ( '/byeducation' , 'AdvancedSearch@byeducation' );
        Route::post ( '/multiples' , 'AdvancedSearch@multiples' );
    } );
    //  });
    Route::get ( 'send_test_email' , function () {

    } );
    //all projects
    Route::group ( [ 'prefix' => 'projects' ] , function () {
        Route::get ( '' , 'ProjectsController@index' );
        Route::post ( '' , 'ProjectsController@store' );
        Route::get ( '/{id}' , 'ProjectsController@show' );
        Route::put ( '/{id}' , 'ProjectsController@update' );
        Route::delete ( '/{id}' , 'ProjectsController@destroy' );
    } );

} );
