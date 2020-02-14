@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Price Trip  </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{ route('priceTrip-update',$priceTrip->priceTrips_id) }}" method="POST">
    @csrf
     <div class="row">
        <!-- <div class="col-xs-8 col-sm-8 col-md-8"> -->
          <!--  <br>     <label for="trip_info_id" class="col-form-label col-sm-3 text-right">Number of Trip</label>
                   <div class="col-sm-9">
                     <select name="trip_info_id" class="form-control" id="trip_info_id" required="">
                      @if(count($trip) > 0)
                      @foreach($trip as $trip)
                      <option value="{{$trip->trip_info_id}}" {{($trip->trip_info_id == $priceTrip->trip_info_id) ? 'selected' : ''}} >{{$trip->number_of_trip}}</option>
                      @endforeach     
                      @endif
                            </select>
                         
                         </div>
                     </div> -->

                    


        <div class="col-xs-8 col-sm-8 col-md-8">
                     <br>     <label for="amount" class="col-form-label col-sm-3 text-right">Amount:</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" name="amount" value="{{$priceTrip->amount}}" id="amount" placeholder="Write amount here" required>
                         
                         </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/priceTrip') }}"> Back</a>
        </div>

    </div>
   
</form>
     @endsection  