@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Check all Vehicle Drives </b>
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
                <a class="btn btn-success" href="{{ route('drives.create') }}"> Create New Drives</a>
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
                  <th>Driver Name</th>
                   <th>vehicle Name</th>
                   <th>Vehicle License Number</th>
                    <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                 @foreach($drives as $drive)
                  <tr>
                    <td>{{$drive->drive_id}}</td>
                    <td>{{$drive->driver_name}}</td>
                    <td>{{$drive->vehicle_name}}</td>
                    <td>{{$drive->vehicle_license_number}}</td>
                    <td>
                      <a href="{{route('drive-edit',$drive->drive_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('drive-delete',$drive->drive_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  