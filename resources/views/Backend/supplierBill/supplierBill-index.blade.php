@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Supplier Bill </b>
      </h1>
    </section>

    <style type="text/css">
      .btn-success {
          margin-bottom: 9px !important;
          margin-right: 25px !important;
    }
    </style>
@endsection
@section('main-content')
    <div class="row">
        <div class="col-lg-12 margin-tb ">
           
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('create-supplierBill')}}"> Create New Supplier Bill</a>
            </div>
        </div>
    </div>
   

    <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Date</th>
                  <th>Supplier Name</th>
                  <th>Payment Mode</th>
                  <th>Bank Name</th>
                  <th>Account Name</th>
                  <th>Account Number</th>
                  <th>Pay</th>
                  <th>Actual Quantity</th>
                  <th>Purchase Rate</th>
                  <th>Transport Price</th>
                  <th>Payable Amount</th>
                  <th>Note</th>
                  <th>Debit</th>
                  <th>Credit</th>
                  
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                 @foreach($supplierBill as $key=>$supplierBill)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$supplierBill->date}}</td>
                    <td>{{$supplierBill->supplier_name}}</td>
                    <td>{{$supplierBill->payment_mode}}</td>
                    <td>{{$supplierBill->bank_name}}</td>
                    <td>{{$supplierBill->account_name}}</td>
                    <td>{{$supplierBill->account_number}}</td>
                    <td>{{$supplierBill->pay_amount}}</td>
                    <td>{{$supplierBill->actual_quantity}}</td>
                    <td>{{$supplierBill->purchase_rate}}</td>
                    <td>{{$supplierBill->transport_price}}</td>
                    <td>{{$supplierBill->total_payable_amount}}</td>
                    <td>{{$supplierBill->description_note}}</td>
                    <td>{{$supplierBill->total_payable_amount}}</td>
                    <td>{{$supplierBill->total_payable_amount - $supplierBill->pay_amount}}</td>
                   
                    
                
                    <td>
                      <a href="{{route('supplierBill-edit',$supplierBill->supplierBill_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('supplierBill-delete',$supplierBill->supplierBill_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  