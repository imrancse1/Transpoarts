@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Work Order </b>
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
                <a class="btn btn-success" href="{{route('create-workOrder')}}"> Create New Work Order</a>
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
                  <th>Supplier Name</th>
                  <th>Product Name</th>
                  <th>Order Qty</th>
                  
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($workOrder as $key=>$workOrder)
                  <tr>
                    <td>{{{$key + 1}}}</td>
                    <td>{{$workOrder->supplier_name}}</td>
                    <td>{{$workOrder->product_id}}</td>
                  
                    <td>{{$workOrder->word_remain_quantity}}</td>
                  
                    <td>
                      <a href="" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
              
                 

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  