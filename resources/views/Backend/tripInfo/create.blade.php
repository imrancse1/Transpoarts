@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>    <h1 class="text-center">
     <b> Create New Trip Info </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{ route('tripInfo-store') }}" method="POST">
    @csrf
     <div class="row">
        
       
         <div class="col-xs-8 col-sm-8 col-md-8">
             <br>  <label for="classId" class="col-form-label col-sm-3 text-right">Vehicle Name</label>
                   <div class="col-sm-9">
                     <select name="input_vehicle_id" class="form-control" id="input_vehicle_id" required="">
                           <option value="">===Select Vehicle===</option>
                                 @foreach($inputVehicle as $inputVehicle)
                                <option value="{{$inputVehicle->input_vehicle_id}}">{{$inputVehicle->vehicle_name }}</option>
                                @endforeach
                            </select>
                         
                         </div>
                     </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="batchName" class="col-form-label col-sm-3 text-right">Number of Trip:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="number_of_trip"  id="number_of_trip" placeholder="Write number of trip" required>
                         
                         </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="batchName" class="col-form-label col-sm-3 text-right">Up Trip:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="up_trip" id="up_trip" placeholder="Write up_trip" required>
                         
                         </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="batchName" class="col-form-label col-sm-3 text-right">Down Trip:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="down_trip" value="" id="down_trip" placeholder="Write down trip" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/tripInfo') }}"> Back</a>
        </div>

    </div>
   
</form>
     @endsection  