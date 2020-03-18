@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Transport </b>
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
                <a class="btn btn-success" href="{{route('create-transport')}}"> Create New Transport</a>
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
                  <th>Vehicle Name</th>
                  
                  <th>Up Trip</th>
                  <th>Down Trip</th>
                  <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                   @foreach($transports as $key=>$transport)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$transport->vehicle_name}}</td>
                    
                    <td>{{$transport->up_trip}}</td>
                    <td>{{$transport->down_trip}}</td>
                    
                
                    <td>
                      <a href="{{route('transport-edit',$transport->transport_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('transport-delete',$transport->transport_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                 

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  