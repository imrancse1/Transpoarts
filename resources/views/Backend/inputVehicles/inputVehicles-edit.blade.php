@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Input Vehicle  </b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Home</li>
      </ol>
    </section>
@endsection
@section('main-content')
    
   


<form action="{{ route('vehicle.update',$vehicles->input_vehicle_id) }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
             <br>  <label for="classId" class="col-form-label col-sm-3 text-right">Category Name</label>
                   <div class="col-sm-9">
                     <select name="category_id" class="form-control" id="category_id" required="">

                      @if(count($category) > 0)
                      @foreach($category as $category)
                      <option value="{{$category->category_id}}" {{($category->category_id == $vehicles->category_id) ? 'selected' : ''}} >{{$category->category_name}}</option>
                      @endforeach     
                      @endif
                         </select>
                         </div>
                     </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                      <br>    <label for="batchName" class="col-form-label col-sm-3 text-right">Vehicle Name:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="vehicle_name" value="{{$vehicles->vehicle_name}}" id="vehicle_name" placeholder="Write vehicle name" required>
                         
                         </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
                      <br>    <label for="batchName" class="col-form-label col-sm-3 text-right">Vehicle License Number:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="vehicle_license_number" value="{{$vehicles->vehicle_license_number}}" id="vehicle_license_number" placeholder="Write vehicle license number" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('/inputVehicle') }}"> Back</a>
        </div>

    </div>
   
</form>
     @endsection  