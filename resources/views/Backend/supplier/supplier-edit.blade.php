@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Supplier  </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{route('update-supplier',$suppliers->raw_supplier_id)}}" method="POST">
    @csrf
     <div class="row">

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="supplier_name" class="col-form-label col-sm-3 text-right">Supplier Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="supplier_name" value="{{$suppliers->supplier_name}}" id="supplier_name" placeholder="Write supplier name here" required>
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="supplier_phone" class="col-form-label col-sm-3 text-right">Supplier Phone:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="supplier_phone" value="{{$suppliers->supplier_phone}}" id="supplier_phone" placeholder="Write Supplier Phone Number" required>
                         
            </div>
        </div>

         

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="supplier_address" class="col-form-label col-sm-3 text-right">Supplier Address:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="supplier_address" value="{{$suppliers->supplier_address}}" id="supplier_address" placeholder="Write supplier address here" >
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="supplier_company" class="col-form-label col-sm-3 text-right">Supplier Company:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="supplier_company" value="{{$suppliers->supplier_company}}" id="supplier_company" placeholder="Write supplier company here" >
                         
            </div>
        </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{route('/supplier')}}"> Back</a>
        </div>

    </div>
   
</form>



@endsection  