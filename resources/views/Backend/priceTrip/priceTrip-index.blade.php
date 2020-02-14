@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
     <b>  Check all Price Info </b>
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
                <a class="btn btn-success" href="{{ route('priceTrip.create') }}"> Create New Price Info</a>
            </div>
        </div>
    </div>
   

    <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Price No</th>
                  <th>Number of Trip</th>
                   <th>Up Trip</th>
                   <th>Down  Trip</th>
                   <th>Amount</th>
                  
                    <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                 @foreach($priceTrips as $key=>$priceTrip)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$priceTrip->number_of_trip}}</td>
                    <td>{{$priceTrip->up_trip}}</td>
                    <td>{{$priceTrip->down_trip}}</td>
                    <td>{{$priceTrip->amount}}</td>
                    <td>
                      <a href="{{route('priceTrip-edit',$priceTrip->priceTrips_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('priceTrip-delete',$priceTrip->priceTrips_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  