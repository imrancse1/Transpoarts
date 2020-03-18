<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\RawSupplier;
use App\Transport;
use App\Purchase;
use App\Wirehouse;
use App\SupplierBill;
use App\Bank;
use Auth;
use Session;

class ShowSupplierController extends Controller
{
	public function index(){

    	$showSupplier = SupplierBill::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','supplier_bills.raw_supplier_id')
        ->join('banks','banks.bank_id','=','supplier_bills.bank_id')
        ->join('purchases','purchases.purchase_id','=','supplier_bills.purchase_id')
        

    	
    	->get();

    	 
    	

     	
        // echo "<pre>";
        // print_r($additon);
        // exit();

    	return view('Backend.show.showSupplier-index',compact('showSupplier'));
	}

    public function showpurchase(){

        $purchases = Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
        ->join('products','products.product_id','=','purchases.product_id')
        ->join('wirehouses','wirehouses.wirehouse_id','=','purchases.wirehouse_id')
        // ->join('transports','transports.transport_id','=','purchases.transport_id')
       // ->join('supplier_bills','supplier_bills.purchase_id','=','purchases.purchase_id')
        
        ->get();
        
        // echo "<pre>";
        // print_r($purchases);
        // exit(); 

        $additon = Purchase::sum('total_payable_amount');      
        return view('Backend.show.showPurchase',compact('purchases','additon'));
    }

    
}
