@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
   <br>   <h1 class="text-center">
    <b> Check all Trip Costing </b>
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
                <a class="btn btn-success" href="{{route('/tripCost.create')}}"> Create new Trip Cost</a>
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
            <th>Drives Expence</th>
            <th>Assistive Salary</th>
            <th>Others Expence</th>
            <th width="250px">Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($tripCosts as $key=>$tripCost)
                  <tr>
                     <td>{{$key+1}}</td>
                     <td>{{$tripCost -> drives_expence}}</td>
                     <td>{{$tripCost -> assistive_salary}}</td>
                     <td>{{$tripCost -> others_expence}}</td>
                     <td>
                      <a href="{{route('tripCost-edit',$tripCost->tripcost_id)}}" class="btn btn-xs btn-info"><span class="fa fa-edit"></span></a>

                       <a href="{{route('tripCost-delete',$tripCost->tripcost_id)}}" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span></a>
                    </td>
              </tr>
              @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
     @endsection  