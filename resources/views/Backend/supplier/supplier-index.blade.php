@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Supplier </b>
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
                <a class="btn btn-success" href="{{route('create-supplier')}}"> Create New Supplier</a>
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
                  <th>Supplier Phone</th>
                  <th>Supplier Address</th>
                  <th>Supplier Company</th>
                
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                 @foreach($suppliers as $key=>$supplier)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$supplier->supplier_name}}</td>
                    <td>{{$supplier->supplier_phone}}</td>
                    <td>{{$supplier->supplier_address}}</td>
                    <td>{{$supplier->supplier_company}}</td>
                
                    <td>
                      <a href="{{route('supplier-edit',$supplier->raw_supplier_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('supplier-delete',$supplier->raw_supplier_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  