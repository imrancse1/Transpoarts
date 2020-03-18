@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>    <h1 class="text-center">
     <b> Create New Inventory </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{route('store-inventory')}}" method="POST">
    @csrf
     <div class="row ">

         <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="wirehouse_id" class="col-form-label col-sm-3 text-right">Wirehouse Name:</label>
             <div class="col-sm-9">
                <select name="wirehouse_id" class="form-control" id="wirehouse_id" required="">
                  <option value="">Please Select a Wirehouse</option>
                    @foreach($wirehouses as $wirehouse)
                    <option value="{{$wirehouse->wirehouse_id}}">{{$wirehouse->wirehouse_name }}</option>
                    @endforeach
                </select>
                         
            </div>
        </div> 
        
        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="product_id" class="col-form-label col-sm-3 text-right">Product Name:</label>
             <div class="col-sm-9">
                <select name="product_id" class="form-control" id="product_id" required="">
                 <!--<option value="">===Select Product===</option>-->
                 <!--   @foreach($products as $products)-->
                 <!--   <option value="{{$products->product_id}}">{{$products->product_name }}</option>-->
                 <!--   @endforeach-->
                </select>
                         
            </div>
        </div>
        
       

         <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="stock_in" class="col-form-label col-sm-3 text-right">Stock In:</label>
            <div class="col-sm-9">
            <select name="stock_in" class="form-control" id="stock_in" required="">
            </select>
                                 
            </div>
        </div>


          <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="recevie" class="col-form-label col-sm-3 text-right">Total Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="recevie"  id="recevie" placeholder="Write receive quantity here" required>
                                 
            </div>
        </div>

        
        <!--<div class="col-xs-8 col-sm-8 col-md-8">-->
        <!--    <br><label for="deduction" class="col-form-label col-sm-3 text-right">Deduction Quantity:</label>-->
        <!--    <div class="col-sm-9">-->

        <!--    <select name="deduction" class="form-control" id="deduction" required="">-->
                 
        <!--    </select>-->
                                 
        <!--    </div>-->
        <!--</div>-->

        <!--  <div class="col-xs-8 col-sm-8 col-md-8">-->
        <!--    <br><label for="total_amount" class="col-form-label col-sm-3 text-right">Total Amount:</label>-->
        <!--    <div class="col-sm-9">-->
        <!--     <select name="total_amount" class="form-control" id="total_amount" required="">-->
        <!--    </select>-->
                                 
        <!--    </div>-->
        <!--</div>-->
        
        
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

<script type="text/javascript">
    $("#wirehouse_id").on('change', function(){
            var wirehouseId = $(this).val();
            var productId = $("#product_id");

            $.ajax({
                url: "wirehouseWiseProduct/"+wirehouseId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    productId.empty();
                    var content = '<option selected="" disabled="">Please Select Product</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.product_id+'"> '+value.product_name+''
                        '</option>';
                    });
                    productId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });

     $("#product_id").on('change', function(){
            var productId = $(this).val();
            var stockId = $("#stock_in");

            $.ajax({
                url: "productWiseStock/"+productId,
                type: "GET",
                success:function(data){
                    // console.log(data);
                    // return false;
                    stockId.empty();
                    var content = '<option selected="" disabled="">Please Select Stock</option>';
                    $.each(data,function(index,value) {
                        content += '<option value="'+value.inventory_receive+'"> '+value.inventory_receive+''
                        '</option>';
                    });
                    stockId.append(content);
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });

     $(document).ready(function(e){
        $("select").change(function(){
            var sub = 0;
            $("select[name=stock_in]").each(function(){
                sub = sub + parseInt($(this).val());
            }) 
           

            $("input[name=recevie]").val(sub);
        });
    });

        //    $("#product_id").on('change', function(){
        //     var productId = $(this).val();
        //     var deductionId = $("#deduction");

        //     $.ajax({
        //         url: "productWiseDeduction/"+productId,
        //         type: "GET",
        //         success:function(data){
        //             // console.log(data);
        //             // return false;
        //             deductionId.empty();
        //             var content = '<option selected="" disabled="">Please Select Deduction</option>';
        //             $.each(data,function(index,value) {
        //                 content += '<option value="'+value.deduction_quantity+'"> '+value.deduction_quantity+''
        //                 '</option>';
        //             });
        //             deductionId.append(content);
        //         },
        //         error:function(){
        //             alert("Something Went Wrong");
        //         }
        //     });
        // });

        //        $("#product_id").on('change', function(){
        //     var productId = $(this).val();
        //     var amountId = $("#total_amount");

        //     $.ajax({
        //         url: "productWiseAmountId/"+productId,
        //         type: "GET",
        //         success:function(data){
        //             // console.log(data);
        //             // return false;
        //             amountId.empty();
        //             var content = '<option selected="" disabled="">Please Select Amount</option>';
        //             $.each(data,function(index,value) {
        //                 content += '<option value="'+value.total_payable_amount+'"> '+value.total_payable_amount+''
        //                 '</option>';
        //             });
        //             amountId.append(content);
        //         },
        //         error:function(){
        //             alert("Something Went Wrong");
        //         }
        //     });
        // });

</script>


@endsection  