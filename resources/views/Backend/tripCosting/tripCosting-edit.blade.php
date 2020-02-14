@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
        <b>Update Trip Costing</b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{ route('tripCost-update',$tripCosting->tripcost_id) }}" method="POST">
    @csrf
     <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8">
            <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Drives Expence:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="drives_expence" id="drivesExpence" value="{{$tripCosting->drives_expence}}" placeholder="Write drives expence " required>
                         
               </div>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8">
          <br>    <label for="batchName" class="col-form-label col-sm-3 text-right">Assistive Salary:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="assistive_salary" id="assistiveSalary" value="{{$tripCosting->assistive_salary}}" placeholder="Write assistive salary" required>
                         
               </div>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8">
            <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Others Expence:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="others_expence" id="othersExpence" value="{{$tripCosting->others_expence}}" placeholder="Write reception Address" required>
                         
               </div>
       </div>

       
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
              <br>  <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('/tripCosting') }}"> Back</a>
        </div>
    </div>
   
</form>
     @endsection  