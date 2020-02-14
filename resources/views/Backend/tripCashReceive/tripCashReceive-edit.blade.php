@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Trip Cash Receive </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{ route('tripCashReceive-update',$tripCashReceive->trip_cash_receives_id) }}" method="POST">
    @csrf
     <div class="row">

 

        <div class="col-xs-8 col-sm-8 col-md-8">
                       <br>   <label for="amount" class="col-form-label col-sm-3 text-right">Amount:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="amount"  id="amount" value="{{$tripCashReceive->amount}}" placeholder="Write amount here" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/tripCashReceive') }}"> Back</a>
        </div>

    </div>
   
</form>
     @endsection  