@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Create New Input Vehicle </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{ route('vehicle.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
             <br>  <label for="category_id" class="col-form-label col-sm-3 text-right">Category Name</label>
                   <div class="col-sm-9">
                     <select name="category_id" class="form-control" id="category_id" required="">
                           <option value="">===Select Category===</option>
                                 @foreach($categotys as $categoty)
                                <option value="{{$categoty->category_id}}">{{$categoty->category_name}}</option>
                                @endforeach
                            </select>
                         
                         </div>
                     </div>


        <div class="col-xs-8 col-sm-8 col-md-8">
                       <br>   <label for="vehicleName" class="col-form-label col-sm-3 text-right">Vehicle Name:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="vehicle_name" value="" id="vehicleName" placeholder="Write Vehicle name here" required>
                         
                         </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                      <br>    <label for="vehicle_license_number" class="col-form-label col-sm-3 text-right">Vehicle License Number:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="vehicle_license_number" value="" id="vehicle_license_number" placeholder="Write vehicle license number" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('/inputVehicle') }}"> Back</a>
        </div>

    </div>
   
</form>
     @endsection  