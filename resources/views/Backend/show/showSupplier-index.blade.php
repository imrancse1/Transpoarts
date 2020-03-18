@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Show All Supplier List </b>
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
                  <th>Account Name</th>
                  <th>Account Number</th>
                  <th>Pay Amount</th>
                  <th>Actual Quantity</th>
                  <th>Purchase Rate</th>
                  <th>Transport Price</th>
                  <th>Total Payable Amount</th>
                  <th>Description Note</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                 @foreach($showSupplier as $key=>$showSupplier)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$showSupplier->date}}</td>
                    <td>{{$showSupplier->supplier_name}}</td>
                    <td>{{$showSupplier->payment_mode}}</td>
                    <td>{{$showSupplier->account_name}}</td>
                    <td>{{$showSupplier->account_number}}</td>
                    <td>{{$showSupplier->pay_amount}}</td>
                    <td>{{$showSupplier->actual_quantity}}</td>
                    <td>{{$showSupplier->purchase_rate}}</td>
                    <td>{{$showSupplier->transport_price}}</td>
                    <td>{{$showSupplier->total_payable_amount}}</td>
                    <td>{{$showSupplier->description_note}}</td>
                    
              </tr>
              @endforeach

             <!--  <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total Amount:</td>
                <td></td>
                <td></td>
                <td></td>
              </tr> -->
              </tfoot>
              </table>



            </div>
            <!-- /.box-body -->
          </div>
     @endsection  