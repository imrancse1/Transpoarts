@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <br> <h1 class="text-center">
      <b> Create New Fuel Expenses </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{ route('fuelExpenses.store') }}" method="POST">
    @csrf
     <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8">
          <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Oil Expence:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="oil_expenses" id="oilExpenses" placeholder="Write oil expence " required>
                         
               </div>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8">
          <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Mobil Expenses:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="mobil_expenses" id="mobilExpenses" placeholder="Write mobil Expenses" required>
                         
               </div>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8">
           <br> <label for="batchName" class="col-form-label col-sm-3 text-right">Others Expence:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="others_expenses" id="othersExpence" placeholder="Write others expenses" required>
                         
               </div>
       </div>

       
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
              <br>  <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('/fuelExpenses') }}"> Back</a>
        </div>
    </div>
   
</form>
     @endsection  