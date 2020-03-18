@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Wirehouse </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{route('update-wirehouse',$wirehouse->wirehouse_id)}}" method="POST">
    @csrf
     <div class="row">

        

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="wirehouse_name" class="col-form-label col-sm-3 text-right">Wirehouse Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="wirehouse_name" value="{{$wirehouse->wirehouse_name}}" id="wirehouse_name" placeholder="Write wirehouse name here" required>
                         
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="wirehouse_name" class="col-form-label col-sm-3 text-right">Wirehouse Address:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="wirehouse_address" value="{{$wirehouse->wirehouse_address}}" id="wirehouse_address" placeholder="Write wirehouse Address here" required>
                         
            </div>
        </div>


        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{route('/wirehouse')}}"> Back</a>
        </div>

    </div>
   
</form>



@endsection  