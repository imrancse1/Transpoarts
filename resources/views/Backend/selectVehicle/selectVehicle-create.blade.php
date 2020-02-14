@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <br> <h1 class="text-center">
      <b>Create New Vehicle</b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   

   
<form action="{{ route('selectvehicle.store') }}" method="POST">
    @csrf
     <div class="row">
    <br>
      <div class="col-xs-8 col-sm-8 col-md-8">
               <label for="input_vehicle_id" class="col-form-label col-sm-3 text-right">Select Vehicle Name</label>
                   <div class="col-sm-9">
                     <select name="input_vehicle_id" class="form-control" id="input_vehicle_id" required="">
                           <option value="">===Select Vehicle===</option>
                                 @foreach($inputVehicle as $inputVehicle)
                                <option value="{{$inputVehicle->input_vehicle_id}}">{{$inputVehicle->vehicle_name}}</option>
                                @endforeach
                            </select>
                         
                         </div>
                     </div>
       
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
          <br>
                <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/selectVehicle') }}"> Back</a> 
        </div>
        
    </div>
   
</form>
     @endsection  