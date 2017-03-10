<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('services/two-datatables', 'ServiceController@getUsersDataTables');

Route::get('services/two-datatables/posts', 'ServiceController@getPostsDataTables');

Route::controllers([
    'auth'       => 'Auth\AuthController',
    'password'   => 'Auth\PasswordController',
    //'authrajpasa'       => 'Authrajpasa\AuthrajpasaController',
    //'passwordrajpasa'   => 'Authrajpasa\PasswordrajpasaController',
    'fluent'     => 'FluentController',
    'eloquent'   => 'EloquentController',
    'collection' => 'CollectionController',
    'html'       => 'HtmlBuilderController',
    'sitemap'    => 'SitemapController',
    'buttons'    => 'ButtonsController',
    'services'   => 'ServiceController',
    'relation'   => 'RelationController',
    'product'   => 'ProductController',
    'companyraj'   => 'CompanyrajController',
    'management'   => 'ManagementController',
    'counter'   => 'CounterController',
    'busraj'   => 'BusrajController',
    'seatavailable'   => 'SeatavailableController',
    'hotel'   => 'HotelController',
    'room'   => 'RoomController',
    'division'   => 'DivisionController',
    'district'   => 'DistrictController',
    'upazilla'   => 'UpazillaController',
    'bookingb'   => 'BookingbController',
    'bookinghotel'   => 'BookinghotelController',
    'laun'   => 'LaunController',
    'touristplace'   => 'TouristplaceController',
    'busticket'      => 'BusticketController',
    'share'          => 'ShareController',
]);

Route::resource('users', 'UsersController');
Route::get('getManager','SelectBoxController@getManager');


Route::get('{view}', function ($view) {
    if (view()->exists($view)) {
        return view($view);
    }

    return app()->abort(404, 'Page not found!');
});
Route::get('/rajpasa/rajpasasoft/busticket/list/{data}', function($data){
    $dataArray = array('departure' => data['0'],
                        'arrival' => data['1']
     );

    return view($view);
});
Route::get('/rajpasa/rajpasasoft/busraj/list/{data}', function($data){
    $dataArray = array('departure' => data['0'],
                        'arrival' => data['1']
     );

    return view($view);
});
