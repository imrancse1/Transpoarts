@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
     <br> <h1 class="text-center">
     <b> Update Batch  </b>
      </h1>
     
    </section>
@endsection
@section('main-content')
    
   

   
<form action="{{route('update-batch',$batchs->batch_id)}}" method="POST">
    @csrf
     <div class="row">

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="batch_name" class="col-form-label col-sm-3 text-right">Batch Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="batch_name" value="{{$batchs->batch_name}}" id="batch_name" placeholder="Write batch name here" required>
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="product_name" class="col-form-label col-sm-3 text-right">Product Name:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="product_name" value="{{$batchs->product_name}}" id="product_name" placeholder="Write Phone Number" required>
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="gender" class="col-form-label col-sm-3 text-right">Gender:</label>
             <div class="col-sm-9">
                <input type="radio" name="gender" value="Male" {{ $batchs->gender == 'Male' ? 'checked' : '' }}  > Male
                <input type="radio" name="gender" value="Female" {{ $batchs->gender == 'Female' ? 'checked' : '' }}    > Female     
                <input type="radio" name="gender" value="Both" {{ $batchs->gender == 'Both' ? 'checked' : '' }}    > Both     
            </div>
           
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="male_product_number" class="col-form-label col-sm-3 text-right">Male Product Number:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="male_product_number" value="{{$batchs->male_product_number}}" id="male_product_number" placeholder="Write male product number here" required>
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="female_product_number" class="col-form-label col-sm-3 text-right">Female Product Number:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="female_product_number" value="{{$batchs->female_product_number}}" id="female_product_number" placeholder="Write female product number here" required>
                         
            </div>
        </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br> <label for="total_product_number" class="col-form-label col-sm-3 text-right">Total Product Number:</label>
             <div class="col-sm-9">
                <input type="text" class="form-control" name="total_product_number" value="{{$batchs->total_product_number}}" id="total_product_number" placeholder="Write total product number here" required>
                         
            </div>
        </div>



        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br> <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-primary" href="{{route('/batch')}}"> Back</a>
        </div>

    </div>
   
</form>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(e){
        $("input").change(function(){
            var sum = 0;
            $("input[name=male_product_number]").each(function(){
                sum = sum + parseInt($(this).val());
            })
            $("input[name=female_product_number]").each(function(){
                sum = sum + parseInt($(this).val());
            })
            $("input[name=total_product_number]").val(sum);
        });
    });




</script>

@endsection  