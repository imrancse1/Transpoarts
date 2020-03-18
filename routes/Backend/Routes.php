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
// Batch Controller
		Route::get('/batch',[
			'as' => '/batch',
			'uses' => 'BatchController@index'
		]);

		Route::get('/batch-create',[
			'as' => 'create-batch',
			'uses' => 'BatchController@createBatch'
		]);

		Route::post('/batch-batch',[
			'as' => 'store-batch',
			'uses' => 'BatchController@storeBatch'
		]);

		Route::get('/batch-edit/{batchId}',[
			'as' => 'batch-edit',
			'uses' => 'BatchController@editBatch'
		]);

		Route::post('/batch-update/{batchId}',[
			'as' => 'update-batch',
			'uses' => 'BatchController@updateBatch'
		]);

		Route::get('/batch-delete/{batchId}',[
			'as' => 'batch-delete',
			'uses' => 'BatchController@deleteBatch'
		]);

		// supplier route controller 
		Route::get('/supplier',[
			'as' => '/supplier',
			'uses' => 'RawSupplierController@index'
		]);

		Route::get('/supplier-create',[
			'as' => 'create-supplier',
			'uses' => 'RawSupplierController@createSupplier'
		]);

		Route::post('/supplier-create',[
			'as' => 'store-supplier',
			'uses' => 'RawSupplierController@storeSupplier'
		]);

		Route::get('/supplier-edit/{supplierId}',[
			'as' => 'supplier-edit',
			'uses' => 'RawSupplierController@editSupplier'
		]);

		Route::post('/supplier-update/{supplierId}',[
			'as' => 'update-supplier',
			'uses' => 'RawSupplierController@updateSupplier'
		]);

		Route::get('/supplier-delete/{supplierId}',[
			'as' => 'supplier-delete',
			'uses' => 'RawSupplierController@deleteSupplier'
		]);

		//product route controller
		route::get('/product',[
			'as' => '/product',
			'uses' => 'ProductController@index'
		]);
		route::get('/product-create',[
			'as' => 'create-product',
			'uses' => 'ProductController@createProduct'
		]);
		route::post('/product-store',[
					'as' => 'store-product',
					'uses' => 'ProductController@storeProduct'
		]);
		route::get('/product-edit/{productId}',[
					'as' => 'product-edit',
					'uses' => 'ProductController@editProduct'
		]);
		route::post('/product-update/{productId}',[
					'as' => 'update-product',
					'uses' => 'ProductController@updateProduct'
		]);
		route::get('/product-delete/{productId}',[
					'as' => 'product-delete',
					'uses' => 'ProductController@deleteProduct'
		]);

		// Wirehouse Controller route

		route::get('/wirehouse',[
					'as' => '/wirehouse',
					'uses' => 'WirehouseController@index'
		]);
		route::get('/create-wirehouse',[
					'as' => 'create-wirehouse',
					'uses' => 'WirehouseController@createWirehouse'
		]);
		route::post('/store-wirehouse',[
					'as' => 'store-wirehouse',
					'uses' => 'WirehouseController@storeWirehouse'
		]);
		route::get('/wirehouse-edit/{wirehouseId}',[
					'as' => 'wirehouse-edit',
					'uses' => 'WirehouseController@editWirehouse'
		]);
		route::post('/update-wirehouse/{wirehouseId}',[
					'as' => 'update-wirehouse',
					'uses' => 'WirehouseController@updateWirehouse'
		]);
		route::get('/delete-wirehouse/{wirehouseId}',[
					'as' => 'wirehouse-delete',
					'uses' => 'WirehouseController@deleteWirehouse'
		]);

		// bank controller route
		route::get('/bank',[
					'as' => '/bank',
					'uses' => 'BankController@index'
		]);
		route::get('/create-bank',[
					'as' => 'create-bank',
					'uses' => 'BankController@createBank'
		]);
		route::post('/store-bank',[
					'as' => 'store-bank',
					'uses' => 'BankController@storeBank'
		]);
		route::get('/bank-edit/{bankId}',[
					'as' => 'bank-edit',
					'uses' => 'BankController@editBank'
		]);
		route::post('/bank-update/{bankId}',[
					'as' => 'update-bank',
					'uses' => 'BankController@updateBank'
		]);
		route::get('/bank-delete/{bankId}',[
					'as' => 'bank-delete',
					'uses' => 'BankController@deleteBank'
		]);

		//trsnsport route controller
		route::get('/transport',[
					'as' => '/transport',
					'uses' => 'TransportController@index'
		]);
		route::get('/transport-create',[
					'as' => 'create-transport',
					'uses' => 'TransportController@createTransport'
		]);
		route::post('/transport-store',[
					'as' => 'store-transport',
					'uses' => 'TransportController@storeTransport'
		]);
		route::get('/transport-edit/{transportId}',[
					'as' => 'transport-edit',
					'uses' => 'TransportController@editTransport'
		]);
		route::post('/transport-update/{transportId}',[
					'as' => 'update-transport',
					'uses' => 'TransportController@updateTransport'
		]);
		route::get('/transport-delete/{transportId}',[
					'as' => 'transport-delete',
					'uses' => 'TransportController@deleteTransport'
		]);

		// purchase route controller
		route::get('/purchase',[
					'as' => '/purchase',
					'uses' => 'PurchaseController@index'
		]);
		route::get('/purchase-create',[
					'as' => 'create-purchase',
					'uses' => 'PurchaseController@createPurchase'
		]);
		route::post('/purchase-store',[
					'as' => 'store-purchase',
					'uses' => 'PurchaseController@storePurchase'
		]);
		route::get('/purchase-edit/{purchaseId}',[
					'as' => 'purchase-edit',
					'uses' => 'PurchaseController@editPurchase'
		]);
		route::post('/purchase-update/{purchaseId}',[
					'as' => 'update-purchase',
					'uses' => 'PurchaseController@updatePurchase'
		]);
		route::get('/purchase-delete/{purchaseId}',[
					'as' => 'purchase-delete',
					'uses' => 'PurchaseController@deletePurchase'
		]);
		route::get('/lessPurchase',[
					'as' => '/lessPurchase',
					'uses' => 'PurchaseController@lessPurchase'
		]);
		route::get('/lessPurchase-delete/{lessPurchaseId}',[
					'as' => 'lessPurchase-delete',
					'uses' => 'PurchaseController@deleteLessPurchase'
		]);
		 Route::get('supplierWiseWirehouse/{supplierId}', [
		'as' => 'supplierWiseWirehouse',
		'uses' => 'PurchaseController@supplierWiseWirehouse'
		]);

	    Route::get('wirehouseWiseProducts/{wirehouseId}', [
		'as' => 'wirehouseWiseProducts',
		'uses' => 'PurchaseController@wirehouseWiseProducts'
		]);

		Route::get('productWiseRemain/{productId}', [
		'as' => 'productWiseRemain',
		'uses' => 'PurchaseController@productWiseRemain'
		]);

		Route::get('purchase-edit/wirehouseWiseProducts/{wirehouseId}',[
				'as' => 'wirehouseWiseProducts',
				'uses' => 'PurchaseController@editwirehouseWiseProducts'
		]);
		Route::get('purchase-edit/productWiseRemain/{productId}',[
				'as' => 'productWiseRemain',
				'uses' => 'PurchaseController@editProductWiseRemain'
		]);
		

		///supplierBilling route controller
		
		route::get('/supplierBill',[
					'as' => '/supplierBill',
					'uses' => 'SupplierBillController@index'
		]);
		route::get('/supplierBill-create',[
					'as' => 'create-supplierBill',
					'uses' => 'SupplierBillController@create'
		]);
		route::post('/supplierBill-store',[
					'as' => 'store-supplierBill',
					'uses' => 'SupplierBillController@storeSupplierBill'
		]);
		route::get('/supplierBill-edit/{supplierBillId}',[
					'as' => 'supplierBill-edit',
					'uses' => 'SupplierBillController@editSupplierBill'
		]);
		route::post('/supplierBill-update/{supplierBillId}',[
					'as' => 'update-supplierBill',
					'uses' => 'SupplierBillController@updateSupplierBill'
		]);
		route::get('/supplierBill-delete/{supplierBillId}',[
					'as' => 'supplierBill-delete',
					'uses' => 'SupplierBillController@deleteSupplierBill'
		]);

		//  showSupplier route controller
		
		route::get('/showSupplier',[
					'as' => '/showSupplier',
					'uses' => 'ShowSupplierController@index'
		]);
		route::get('/showpurchase',[
					'as' => '/showpurchase',
					'uses' => 'ShowSupplierController@showpurchase'
		]);


		//inventory Route controller
		
		route::get('/inventory',[
					'as' => '/inventory',
					'uses' => 'InventoryController@index'
		]);
		route::get('/inventory-create',[
					'as' => 'create-inventory',
					'uses' => 'InventoryController@createInventory'
		]);
		route::post('/inventory-store',[
					'as' => 'store-inventory',
					'uses' => 'InventoryController@storeInventory'
		]);
		route::get('/inventory-edit/{inventoryId}',[
					'as' => 'inventory-edit',
					'uses' => 'InventoryController@editInventory'
		]);
		route::post('/update-inventory/{inventoryId}',[
					'as' => 'update-inventory',
					'uses' => 'InventoryController@updateInventory'
		]);
		route::get('/delete-inventory/{inventoryId}',[
					'as' => 'inventory-delete',
					'uses' => 'InventoryController@deleteInventory'
		]);

	    Route::get('wirehouseWiseProduct/{wirehouseId}', [
		'as' => 'wirehouseWiseProduct',
		'uses' => 'InventoryController@wirehouseWiseProduct'
		]);
		
		Route::get('productWiseStock/{productId}', [
		'as' => 'productWiseStock',
		'uses' => 'InventoryController@productWiseStock'
		]);
		Route::get('productWiseDeduction/{productId}', [
				'as' => 'productWiseDeduction',
				'uses' => 'InventoryController@productWiseDeduction'
		]);
		Route::get('productWiseAmountId/{productId}', [
				'as' => 'productWiseAmountId',
				'uses' => 'InventoryController@productWiseAmountId'
		]);

		route::get('/inventory-show-stock',[
					'as' => 'show-stock',
					'uses' => 'InventoryController@showStock'
		]);


// WorkOrderController route

		route::get('/workOrder',[
					'as' => '/workOrder',
					'uses' => 'WorkOrderController@workOrder'
		]);
		route::get('/create-workOrder',[
					'as' => 'create-workOrder',
					'uses' => 'WorkOrderController@createWorkOrder'
		]);
		route::post('/store-workOder',[
					'as' => 'store-workOder',
					'uses' => 'WorkOrderController@saveWorkOrder'
		]);



		Route::get('supplierWiseProduct/{productId}', [
				'as' => 'supplierWiseProduct',
				'uses' => 'WorkOrderController@supplierWiseProduct'
		]);
		Route::get('productWiseOrder/{supplierId}', [
				'as' => 'productWiseOrder',
				'uses' => 'WorkOrderController@productWiseOrder'
		]);
		Route::get('supplierWiseRemain/{supplierId}', [
				'as' => 'supplierWiseRemain',
				'uses' => 'WorkOrderController@supplierWiseRemain'
		]);





});


 // <option value="">===Select wirehouse===</option>
 //                    @foreach($wirehouses as $wirehouse)
 //                    <option value="{{$wirehouse->wirehouse_id}}">{{$wirehouse->wirehouse_name }}</option>
 //                    @endforeach