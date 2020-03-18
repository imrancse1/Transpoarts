@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>    <h1 class="text-center">
     <b> Create Work Order </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{route('store-workOder')}}" name="form1" method="POST">
    @csrf
     <div class="row ">
        
    

        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="raw_supplier_id" class="col-form-label col-sm-3 text-right">Supplier Name</label>
             <div class="col-sm-9">
                <select name="raw_supplier_id" class="form-control" id="raw_supplier_id" required="">
                <option value="">===Select Supplier===</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{$supplier->raw_supplier_id}}">{{$supplier->supplier_name }}</option>
                    @endforeach
                </select>
                         
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="product_id" class="col-form-label col-sm-3 text-right">Product Name:</label>
             <div class="col-sm-9">
                <select name="product_id" class="form-control" id="product_id" required="">
                </select>
                         
            </div>
        </div>

   

          <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="purchase_id" class="col-form-label col-sm-3 text-right">Order Quantity:</label>
            <div class="col-sm-9">
            <select name="purchase_id" class="form-control" id="purchase_id" required="">
            </select>         
             </div>
             
         </div>


        <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="word_remain_quantity" class="col-form-label col-sm-3 text-right">Remain Quantity:</label>
            <div class="col-sm-9">
            <select name="word_remain_quantity" class="form-control" id="word_remain_quantity" required="">
            </select>        
            </div>
        </div>



        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br><br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/workOrder') }}"> Back</a>

                 

        </div>


    </div>
     <br>
     <br>
     <br>
   
</form>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script type="text/javascript">

     $("#raw_supplier_id").on('change', function(){
            var supplierId = $(this).val();
            var productId = $("#product_id");

            $.ajax({
                url: "supplierWiseProduct/"+supplierId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    productId.empty();
                    var content = '<option selected="" disabled="">Please Select Product</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.product_name+'"> '+value.product_name+''
                        '</option>';
                    });
                    productId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });

     $("#raw_supplier_id").on('change', function(){
            var productId = $(this).val();
            var wordOrderId = $("#purchase_id");

            $.ajax({
                url: "productWiseOrder/"+productId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    wordOrderId.empty();
                    var content = '<option selected="" disabled="">Please Select Order Quantity</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.order_quantity+'"> '+value.order_quantity+''
                        '</option>';
                    });
                    wordOrderId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });

     $("#raw_supplier_id").on('change', function(){
            var supplierId = $(this).val();
            var workRemainId = $("#word_remain_quantity");

            $.ajax({
                url: "supplierWiseRemain/"+supplierId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    workRemainId.empty();
                    var content = '<option selected="" disabled="">Please Select Order Quantity</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.remain_quantity+'"> '+value.remain_quantity+''
                        '</option>';
                    });
                    workRemainId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });


    
</script>
    


@endsection  