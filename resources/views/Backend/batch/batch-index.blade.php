@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Batch </b>
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
                <a class="btn btn-success" href="{{route('create-batch')}}"> Create New Drives</a>
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
                  <th>Batch Name</th>
                  <th>Product Name</th>
                  <th>Gender</th>
                  <th>Total Product Number</th>
                  <th>Male Product Number</th>
                  <th>Female Product Number</th>
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                 @foreach($batchs as $key=>$batch)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$batch->batch_name}}</td>
                    <td>{{$batch->product_name}}</td>
                    <td>{{$batch->gender}}</td>
                    <td>{{$batch->total_product_number}}</td>
                    <td>{{$batch->male_product_number}}</td>
                    <td>{{$batch->female_product_number}}</td>
                    <td>
                      <a href="{{route('batch-edit',$batch->batch_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('batch-delete',$batch->batch_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  