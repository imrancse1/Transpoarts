@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Transport </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{route('update-transport',$transport->transport_id)}}" method="POST">
    @csrf
     <div class="row">

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="vehicle_name" class="col-form-label col-sm-3 text-right">Vehicle Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="vehicle_name" value="{{$transport->vehicle_name}}" id="vehicle_name" placeholder="Write vehicle name here" required>
                         
            </div>
        </div>
        <!-- <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="transport_price" class="col-form-label col-sm-3 text-right"> Transport Price:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="transport_price" value="{{$transport->transport_price}}" id="transport_price" placeholder="Write transport price here" required>
                         
            </div>
        </div> -->

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="up_trip" class="col-form-label col-sm-3 text-right">Up Trip:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="up_trip" value="{{$transport->up_trip}}" id="up_trip" placeholder="Write up trip here" required>
                         
            </div>
        </div> 
        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="down_trip" class="col-form-label col-sm-3 text-right">Down Trip:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="down_trip" value="{{$transport->down_trip}}" id="down_trip" placeholder="Write down trip here" required>
                         
            </div>
        </div>



        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{route('/transport')}}"> Back</a>
        </div>

    </div>
   
</form>



@endsection  