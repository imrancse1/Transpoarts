@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Create New Bank  </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{route('store-bank')}}" method="POST">
    @csrf
     <div class="row">

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="bank_name" class="col-form-label col-sm-3 text-right">Bank Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="bank_name" value="" id="bank_name" placeholder="Write bank name here" required>
                         
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="bank_licence" class="col-form-label col-sm-3 text-right"> Bank Licence:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="bank_licence" value="" id="bank_licence" placeholder="Write bank licence here" required>
                         
            </div>
        </div>
         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="bank_address" class="col-form-label col-sm-3 text-right"> Bank Address:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="bank_address" value="" id="bank_address" placeholder="Write bank address here" required>
                         
            </div>
        </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{route('/bank')}}"> Back</a>
        </div>

    </div>
   
</form>



@endsection  