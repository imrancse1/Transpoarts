<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[
	'as' => '/',
	'uses' => 'DashBoardController@index'
]);

Route::get('/login',[
	'as' => '/login',
	'uses' => 'DashBoardController@index'
]);

Route::post('/login-check',[
	'as' => '/login-check.post',
	'uses' => 'LoginController@loginCheck'
]);

Route::group(['middleware' => 'adminAuth'],function(){
		Route::get('dashboard',[
			'as' => 'dashboard',
			'uses'=> 'LoginController@dashboard'
		]);

		Route::get('/logout',[
			'as' => '/logout',
			'uses' => 'LoginController@Logout'
		]);
// Category Controller
		Route::get('/categoty',[
			'as' => '/categoty',
			'uses' => 'VehicleCatagoryController@index'
		]);

		Route::get('/categotyCreate',[
			'as' => 'category.create',
			'uses' => 'VehicleCatagoryController@create'
		]);

		Route::post('/categotystore',[
			'as' => 'categoty.store',
			'uses' => 'VehicleCatagoryController@store'
		]);

		Route::post('/categotyupdate/{categoryId}',[
			'as' => 'categoty.update',
			'uses' => 'VehicleCatagoryController@categoryUpdate'
		]);


		Route::get('/categotyedit/{categoryId}',[
			'as' => 'category-edit',
			'uses' => 'VehicleCatagoryController@categoryEdit'
		]);
		Route::get('/categorydestroy/{categoryId}',[
			'as' => 'category.destroy',
			'uses' => 'VehicleCatagoryController@categoryDestroy'
		]);

		// inputVehicle controller

		Route::get('/inputVehicle',[
				'as' => '/inputVehicle',
				'uses' => 'InputVehicleController@index'
		]);

		Route::get('/Vehiclecreate',[
				'as' => 'vehicle.create',
				'uses' => 'InputVehicleController@create'
		]);

		Route::get('/Vehiclestore',[
				'as' => 'vehicle.store',
				'uses' => 'InputVehicleController@store'
		]);

		Route::post('/Vehiclestore',[
				'as' => 'vehicle.store',
				'uses' => 'InputVehicleController@store'
		]);

		Route::get('/vehicle-edit/{vehicleId}',[
				'as' => 'vehicle-edit',
				'uses' => 'InputVehicleController@vehicleEdit'
		]);
		Route::post('/vehicle.update/{vehicleId}',[
				'as' => 'vehicle.update',
				'uses' => 'InputVehicleController@vehicleUpdate'
		]);
		Route::get('/vehicle-delete/{vehicleId}',[
				'as' => 'vehicle-delete',
				'uses' => 'InputVehicleController@vehicleDelete'
		]);

		//tripInfo controller
		Route::get('/tripInfo',[
				'as' => '/tripInfo',
				'uses' => 'TripInfoController@index'
		]);
		Route::get('/tripInfocreate',[
				'as' => '/tripInfo.create',
				'uses' => 'TripInfoController@create'
		]);
		Route::post('/tripInfostore',[
				'as' => 'tripInfo-store',
				'uses' => 'TripInfoController@store'
		]);

		Route::get('/trip-edit/{tripId}',[
				'as' => 'trip-edit',
				'uses' => 'TripInfoController@tripEdit'
		]);

		Route::post('/tripInfo-update/{tripId}',[
				'as' => 'tripInfo-update',
				'uses' => 'TripInfoController@tripUpdate'
		]);

		Route::get('/trip-delete/{tripId}',[
				'as' => 'trip-delete',
				'uses' => 'TripInfoController@tripDelete'
		]);


		///reception controller

		Route::get('/reception',[
				'as' => '/reception',
				'uses' => 'ReceptionController@index'
		]);
		Route::get('/receptioncreate',[
				'as' => '/reception.create',
				'uses' => 'ReceptionController@create'
		]);
		Route::post('/receptionstore',[
				'as' => 'reception.store',
				'uses' => 'ReceptionController@store'
		]);
		Route::get('/reception-edit/{receptionId}',[
				'as' => 'reception-edit',
				'uses' => 'ReceptionController@receptionEdit'
		]);
		Route::post('/reception-update/{receptionId}',[
				'as' => 'reception-update',
				'uses' => 'ReceptionController@receptionUpdate'
		]);
		Route::get('/reception-delete/{receptionId}',[
				'as' => 'reception-delete',
				'uses' => 'ReceptionController@receptionDelete'
		]);

		///selectVehicle route controller

		Route::get('/selectVehicle',[
				'as' => '/selectVehicle',
				'uses' => 'SelectVehicleController@index'
		]);

		Route::get('/selectVehiclecreate',[
				'as' => 'selectvehicle.create',
				'uses' => 'SelectVehicleController@create'
		]);

		Route::post('/selectVehiclestore',[
				'as' => 'selectvehicle.store',
				'uses' => 'SelectVehicleController@store'
		]);

		Route::get('/selectvehicles-edit/{selectvehiclesId}',[
				'as' => 'selectvehicles-edit',
				'uses' => 'SelectVehicleController@selectvehiclesEdit'
		]);
		Route::post('/selectvehicle-update/{selectvehiclesId}',[
				'as' => 'selectvehicle-update',
				'uses' => 'SelectVehicleController@selectvehicleUpdate'
		]);
		Route::get('/selectvehicle-delete/{selectvehiclesId}',[
				'as' => 'selectvehicles-delete',
				'uses' => 'SelectVehicleController@selectvehicleDelete'
		]);

		///drives controller
		Route::get('/drives',[
				'as' => '/drives',
				'uses' => 'DriveController@index'
		]);

		Route::get('/drivescreate',[
				'as' => 'drives.create',
				'uses' => 'DriveController@create'
		]);

		Route::post('/drivesstore',[
				'as' => 'drives.store',
				'uses' => 'DriveController@store'
		]);
		Route::get('/drive-edit/{driveId}',[
				'as' => 'drive-edit',
				'uses' => 'DriveController@driveEdit'
		]);
		Route::post('/drive-update/{driveId}',[
				'as' => 'drives-update',
				'uses' => 'DriveController@driveUpdate'
		]);
		Route::get('/drive-delete/{driveId}',[
				'as' => 'drive-delete',
				'uses' => 'DriveController@driveDelete'
		]);
		

		

		//priceTrip route controller
		Route::get('/priceTrip',[
				'as' => '/priceTrip',
				'uses' => 'PriceTripController@index'
		]);

		Route::get('/priceTripcreate',[
				'as' => 'priceTrip.create',
				'uses' => 'PriceTripController@create'
		]);

		Route::post('/priceTripstore',[
				'as' => 'priceTrip.store',
				'uses' => 'PriceTripController@store'
		]);
		Route::get('/priceTrip-edit/{priceTripId}',[
				'as' => 'priceTrip-edit',
				'uses' => 'PriceTripController@priceTripEdit'
		]);
		Route::post('/priceTrip-update/{priceTripId}',[
				'as' => 'priceTrip-update',
				'uses' => 'PriceTripController@priceTripUpdate'
		]);
		Route::get('/priceTrip-delete/{priceTripId}',[
				'as' => 'priceTrip-delete',
				'uses' => 'PriceTripController@priceTripDelete'
		]);


		//product route controller
		Route::get('/product',[
				'as' => '/product',
				'uses' => 'ProductController@index'
		]);
		Route::get('/productcreate',[
				'as' => '/product.create',
				'uses' => 'ProductController@create'
		]);
		Route::post('/productstore',[
				'as' => 'product.store',
				'uses' => 'ProductController@store'
		]);
		Route::get('/product-edit/{productId}',[
				'as' => 'product-edit',
				'uses' => 'ProductController@productEdit'
		]);

		Route::post('/product-update/{productId}',[
				'as' => 'product-update',
				'uses' => 'ProductController@productUpdate'
		]);
		Route::get('/product-delete/{productId}',[
				'as' => 'product-delete',
				'uses' => 'ProductController@productDelete'
		]);

		//tripCosting route controller
		
		Route::get('/tripCosting',[
				'as' => '/tripCosting',
				'uses' => 'TripCostingController@index'
		]);
		Route::get('/tripCostingcreate',[
				'as' => '/tripCost.create',
				'uses' => 'TripCostingController@create'
		]);
		Route::post('/tripCostingstore',[
				'as' => 'tripCost.store',
				'uses' => 'TripCostingController@store'
		]);
		Route::get('/tripCost-edit/{tripCostId}',[
				'as' => 'tripCost-edit',
				'uses' => 'TripCostingController@tripCostEdit'
		]);
		Route::post('/tripCost-update/{tripCostId}',[
				'as' => 'tripCost-update',
				'uses' => 'TripCostingController@tripCostUpdate'
		]);
		Route::get('/tripCost-delete/{tripCostId}',[
				'as' => 'tripCost-delete',
				'uses' => 'TripCostingController@tripCostDelete'
		]);


		//fuelExpenses route controller
		Route::get('/fuelExpenses',[
				'as' => '/fuelExpenses',
				'uses' => 'FuelExpensesController@index'
		]);
		Route::get('/fuelExpensescreate',[
				'as' => '/fuelExpenses.create',
				'uses' => 'FuelExpensesController@create'
		]);
		
		Route::post('/fuelExpensesstore',[
				'as' => 'fuelExpenses.store',
				'uses' => 'FuelExpensesController@store'
		]);
		Route::get('/fuelExpense-edit/{fuelExpenseId}',[
				'as' => 'fuelExpense-edit',
				'uses' => 'FuelExpensesController@fuelExpenseEdit'
		]);
		Route::post('/fuelExpense-update/{fuelExpenseId}',[
				'as' => 'fuelExpenses-update',
				'uses' => 'FuelExpensesController@fuelExpenseUpdate'
		]);
		Route::get('/fuelExpense-delete/{fuelExpenseId}',[
				'as' => 'fuelExpense-delete',
				'uses' => 'FuelExpensesController@fuelExpenseDelete'
		]);
		

		//tripCashReceive route controller

		Route::get('/tripCashReceive',[
				'as' => '/tripCashReceive',
				'uses' => 'TripCashReceiveController@index'
		]);
		Route::get('/tripCashReceivecreate',[
				'as' => 'tripCashReceive.create',
				'uses' => 'TripCashReceiveController@create'
		]);
		Route::post('/tripCashReceivestore',[
				'as' => 'tripCashReceive.store',
				'uses' => 'TripCashReceiveController@store'
		]);
		Route::get('/tripCashReceive-edit/{tripCashReceiveId}',[
				'as' => 'tripCashReceive-edit',
				'uses' => 'TripCashReceiveController@tripCashReceiveEdit'
		]);
		Route::post('/tripCashReceive-update/{tripCashReceiveId}',[
				'as' => 'tripCashReceive-update',
				'uses' => 'TripCashReceiveController@tripCashReceiveUpdate'
		]);
		Route::get('/tripCashReceive-delete/{tripCashReceiveId}',[
				'as' => 'tripCashReceive-delete',
				'uses' => 'TripCashReceiveController@tripCashReceiveDelete'
		]);

		//Datatable  route
		Route::get('/dataTable',[
			'as' => 'data-table',
			'uses' => 'DashBoardController@dataTableShow'
		]);
	
});


