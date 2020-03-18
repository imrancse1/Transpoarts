@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Wirehouse </b>
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
                <a class="btn btn-success" href="{{route('create-wirehouse')}}"> Create New Wirehouse</a>
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
                  
                  <th>Wirehouse Name</th>
                  <th>Wirehouse Address</th>
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                   @foreach($wirehouse as $key=>$wirehouse)
                  <tr>
                    <td>{{++$key}}</td>
                    <!-- <td>{{$wirehouse->supplier_name}}</td> -->
                    <td>{{$wirehouse->wirehouse_name}}</td>
                    <td>{{$wirehouse->wirehouse_address}}</td>
                    
                
                    <td>
                      <a href="{{route('wirehouse-edit',$wirehouse->wirehouse_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('wirehouse-delete',$wirehouse->wirehouse_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                 

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  