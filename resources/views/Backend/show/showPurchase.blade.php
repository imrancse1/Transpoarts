@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b>  all Purchase </b>
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
                  <th>Product Name</th>
                  <th>Wirehouse Name</th>
                  <th>Order Qty</th>
                  <th>Receive Qty</th>
                  <!--<th>Remain Qty</th>-->
                  <th>Deduction Qty</th>
                  <th>Actual Qty</th>
                  <th>Bill Qty</th>
                  <th>Rate</th>
                  <th>Transport Vehicle</th>
                  <th>Transport Fare</th>
                  <th>Total Payable Amount</th>
                  
                 
                </tr>
                </thead>
                <tbody>

                   @foreach($purchases as $key=>$purchase)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$purchase->date}}</td>
                   <td>{{$purchase->supplier_name}}</td>
                    <td>{{$purchase->product_name}}</td>
                    <td>{{$purchase->wirehouse_name}}</td>
                    <!--<td>{{$purchase->order_quantity}} KG</td>-->
                    <td>{{$purchase->remain_quantity}} KG</td>
                    <td>{{$purchase->receive_quantity}} KG </td>
                   
                    <td>{{$purchase->deduction_quantity}} KG</td>
                    <td>{{$purchase->actual_quantity}} KG</td>
                    <td>{{$purchase->bill_quantity}} KG</td>
                    <td>{{$purchase->purchase_rate}} Tk</td>
                    <td>{{$purchase->transport_vehicle}} </td>
                    <td>{{$purchase->transport_fare}} Tk</td>
                    <td>{{$purchase->total_payable_amount}} Tk</td>
                    
              </tr>
              @endforeach
                     <tr>
                <td></td>
                <td></td>
                <td></td>
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
                <td>{{$additon}} Tk</td>
                <td></td>
               
              </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  