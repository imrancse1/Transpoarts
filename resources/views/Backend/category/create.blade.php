@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Create New Vehicle Catagory </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
    
   
   
<form action="{{ route('categoty.store') }}" method="POST">
    @csrf
     <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8">
           <br><br> <label for="category_name" class="col-form-label col-sm-3 text-right">Category Name:</label>
               <div class="col-sm-8 ">
                   <input type="text" class="form-control text-center" name="category_name" id="category_name" placeholder="Write Category Name" required>
                         
               </div>
       </div>

       
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{ route('/categoty') }}"> Back</a>
        </div>
    </div>
   
</form>
     @endsection  