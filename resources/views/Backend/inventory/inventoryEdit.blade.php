@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>    <h1 class="text-center">
     <b> Update Inventory </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{route('update-inventory',$inventory->inventory_id)}}" method="POST">
    @csrf
     <div class="row ">
        


        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="product_id" class="col-form-label col-sm-3 text-right">Product Name:</label>
             <div class="col-sm-9">
                <select name="product_id" class="form-control" id="product_id" required="">
                 @if(count($products) > 0)
                @foreach($products as $product)
                <option value="{{$product->product_id}}" {{($product->product_id == $inventory->product_id) ? 'selected' : ''}} >{{$product->product_name}}</option>
                @endforeach     
                @endif
                </select>
                         
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="wirehouse_id" class="col-form-label col-sm-3 text-right">Wirehouse Name:</label>
             <div class="col-sm-9">
                <select name="wirehouse_id" class="form-control" id="wirehouse_id" required="">
                 @if(count($wirehouses) > 0)
                @foreach($wirehouses as $wirehouse)
                <option value="{{$wirehouse->wirehouse_id}}" {{($wirehouse->wirehouse_id == $inventory->wirehouse_id) ? 'selected' : ''}} >{{$wirehouse->wirehouse_name}}</option>
                @endforeach     
                @endif
                </select>
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="stock_in" class="col-form-label col-sm-3 text-right">Stock In:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="stock_in"  id="stock_in" value="{{$inventory->stock_in}}" required>
                                 
            </div>
        </div>




          <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="recevie" class="col-form-label col-sm-3 text-right">Recevie Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="recevie"  id="recevie" value="{{$inventory->recevie}}" required>
                                 
            </div>
        </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="deduction" class="col-form-label col-sm-3 text-right">Deduction Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="deduction"  id="deduction" value="{{$inventory->deduction}}" required>
                                 
            </div>
        </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="deduction_quantity" class="col-form-label col-sm-3 text-right">Total Amount:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="total_amount"  id="total_amount" value="{{$inventory->total_amount}}" required>
                                 
            </div>
        </div>     
        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br><br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/inventory') }}"> Back</a>

                 

        </div>


    </div>
     <br>
     <br>
     <br>
   
</form>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>



@endsection  