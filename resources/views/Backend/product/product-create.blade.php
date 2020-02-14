@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br>  <h1 class="text-center">
     <b> Create New Product </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{ route('product.store') }}" method="POST">
    @csrf
     <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8">
          <br>    <label for="batchName" class="col-form-label col-sm-3 text-right">Product Name:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="product_name" id="productName" placeholder="Write Product Name" required>
                         
               </div>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8">
            <br>  <label for="batchName" class="col-form-label col-sm-3 text-right">Weight Unit Tons:</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" name="weight_unit_tons" id="weight_unit_tons" placeholder="Write weight unit tons" required>
                         
               </div>
       </div>

       
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
              <br>  <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/product') }}"> Back</a>
        </div>
    </div>
   
</form>
     @endsection  