@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Bank </b>
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
                <a class="btn btn-success" href="{{route('create-bank')}}"> Create New Bank</a>
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
                  <th>Bnak Name</th>
                  <th>Bnak Licence</th>
                  <th>Bank Address</th>
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                   @foreach($bank as $key=>$bank)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$bank->bank_name}}</td>
                    <td>{{$bank->bank_licence}}</td>
                    <td>{{$bank->bank_address}}</td>
                    
                
                    <td>
                      <a href="{{route('bank-edit',$bank->bank_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('bank-delete',$bank->bank_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                 

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  