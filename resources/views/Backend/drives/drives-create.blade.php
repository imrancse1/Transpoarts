@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Create New Input Vehicle  </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{ route('drives.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
             <br><br>  <label for="input_vehicle_id" class="col-form-label col-sm-3 text-right">Vehicle Name</label>
                   <div class="col-sm-9">
                     <select name="input_vehicle_id" class="form-control" id="input_vehicle_id" required="">
                           <option value="">===Select Vehicles===</option>
                                 @foreach($inputVehicles as $inputVehicle)
                                <option value="{{$inputVehicle->input_vehicle_id}}">{{$inputVehicle->vehicle_name}}</option>
                                @endforeach
                            </select>
                         
                         </div>
                     </div>

                    


        <div class="col-xs-8 col-sm-8 col-md-8">
                         <br> <label for="driver_name" class="col-form-label col-sm-3 text-right">Driver Name:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="driver_name" value="" id="driver_name" placeholder="Write driver name here" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('/drives') }}"> Back</a>
        </div>

    </div>
   
</form>
     @endsection  