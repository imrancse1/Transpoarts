@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>  <h1 class="text-center">
      <b> Wirehouse Wise Stock </b>
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
               <a class="btn btn-success" href="{{route('/inventory')}}"> Back Inventory</a>
               
            </div>
        </div>
    </div>
   

    <div class="box">

      

            <!-- /.box-header -->
            <div class="box-body">

              <table id="dataTable" class="table table-bordered table-striped ">

                <thead>
                <tr>
                   <th>Wirehouse Serial Number</th>
                  <th>Wirehouse Wise Stock</th>
                </tr>
                
                </thead>
                <tbody>

                   @foreach($wireHouseWiseAmount as $key=>$wireHoueStock)
                  <tr>
                    <td>{{$key + 1}}</td>
                   
                     
                     <td>{{$wireHoueStock}}</td> 
                  </tr>
                    @endforeach
                </tfoot>
              </table>
            </div>
              
            <!-- /.box-body -->

    </div>

     @endsection  
     