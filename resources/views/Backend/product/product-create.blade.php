@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Create New Product  </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{route('store-product')}}" method="POST">
    @csrf
     <div class="row">


         <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="wirehouse_id" class="col-form-label col-sm-3 text-right">Wirehouse Name:</label>
             <div class="col-sm-9">
                <select name="wirehouse_id" class="form-control" id="wirehouse_id" required="">
                 <option value="">===Select wirehouse===</option>
                    @foreach($wirehouses as $wirehouse)
                    <option value="{{$wirehouse->wirehouse_id}}">{{$wirehouse->wirehouse_name }}</option>
                    @endforeach
                </select>
                         
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="product_name" class="col-form-label col-sm-3 text-right">Product Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="product_name" value="" id="product_name" placeholder="Write product name here" required>
                         
            </div>
        </div>

       

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{route('/product')}}"> Back</a>
        </div>

    </div>
   
</form>



@endsection  