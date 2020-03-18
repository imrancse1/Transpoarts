@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Inventory </b>
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
                <!-- <a class="btn btn-success" href="{{route('create-inventory')}}"> Create New Inventory</a> -->
                <a class="btn btn-success" href="{{route('show-stock')}}"> Show Wirehouse Stock</a>
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
                  <th>Product Name</th>
                   <th>Wirehouse Name</th> 

                  <th>Receive Qty</th>
                  <!--<th>Deduction Qty</th>-->
                  <th>Stock IN</th>
                  
                  <!-- <th width="250px">Action</th> -->
                </tr>
                
                </thead>
                <tbody>

                   @foreach($inventory as $key=>$inventory)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>
                      {{$inventory->product_name}}
                     
                    </td>
                     <td>{{$inventory->wirehouse_name}}</td> 
                    
                    <td>{{$inventory->inventory_receive}} KG</td>
                    <!--<td>{{$inventory->deduction}} KG</td>-->
                   <td>{{$inventory->inventory_receive}} KG</td>  

                         
                    
              </tr>
              @endforeach
               <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$total_stock}} KG : Total Stock</td>
                <td></td>
              </tr>

              

             
              
                </tfoot>
              </table>
            </div>

           

         
              
            <!-- /.box-body -->

    </div>

     @endsection  
     