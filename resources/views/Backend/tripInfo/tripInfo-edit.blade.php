@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br> <h1 class="text-center">
     <b> Update Trip Info </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

@if($trip)   
<form action="{{ route('tripInfo-update',$trip->trip_info_id) }}" method="POST">
    @csrf
     <div class="row">
        
       
         <div class="col-xs-8 col-sm-8 col-md-8">
             <br>  <label for="classId" class="col-form-label col-sm-3 text-right">Vehicle Name</label>
                   <div class="col-sm-9">
                     <select name="input_vehicle_id" class="form-control" id="input_vehicle_id" required="">
                     	@if(count($vehicles) > 0)
                   		@foreach($vehicles as $vehicle)
                     	<option value="{{$vehicle->input_vehicle_id}}" {{($vehicle->input_vehicle_id == $trip->input_vehicle_id) ? 'selected' : ''}} >{{$vehicle->vehicle_name}}</option>
                    	@endforeach     
                     	@endif
                    </select>
                         </div>
                     </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="batchName" class="col-form-label col-sm-3 text-right">Number of Trip:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="number_of_trip" value="{{$trip->number_of_trip}}" id="number_of_trip" placeholder="Write number of trip" required>
                         
                         </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="batchName" class="col-form-label col-sm-3 text-right">Up Trip:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="up_trip" id="up_trip" value="{{$trip->up_trip}}" placeholder="Write up trip" required>
                         
                         </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="batchName" class="col-form-label col-sm-3 text-right">Down Trip:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="down_trip" value="{{$trip->down_trip}}" id="down_trip" placeholder="Write down trip" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/tripInfo') }}"> Back</a>
        </div>

    </div>
   
</form>
@endif
     @endsection  