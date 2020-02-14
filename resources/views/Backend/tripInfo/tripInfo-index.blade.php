@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
   <br>   <h1 class="text-center">
    <b> Check all Info Trip </b>
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
                <a class="btn btn-success" href="{{route('/tripInfo.create')}}"> Create new Trip Info</a>
            </div>
        </div>
    </div>
   

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>No</th>
            <th>vehicle Name</th>
            <th>Number Of Trip</th>
            <th>Up Trip</th>
            <th>Down Trip</th>
            <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>
              @foreach($tripInfos as $key=>$tripInfo)
                   
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$tripInfo->vehicle_name}}</td>
                    <td>{{$tripInfo->number_of_trip}}</td>
                    <td>{{$tripInfo->up_trip}}</td>
                    <td>{{$tripInfo->down_trip}}</td>
                     <td>
                      <a href="{{route('trip-edit',$tripInfo->trip_info_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('trip-delete',$tripInfo->trip_info_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  