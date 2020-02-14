@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>  <h1 class="text-center">
        <b> Create New Reception </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   
   
<form action="{{ route('reception.store') }}" method="POST">
    @csrf
     <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8">
          <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Reception Name:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="reception_name" id="receptionName" placeholder="Write reception Name" required>
                         
               </div>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8">
          <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Reception Address:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="reception_address" id="receptionAddress" placeholder="Write reception Address" required>
                         
               </div>
       </div>

       
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
             <br> <button type="submit" class="btn btn-success">Submit</button>
                  <a class="btn btn-primary" href="{{ route('/categoty') }}"> Back</a>
        </div>
    </div>
   
</form>
     @endsection  