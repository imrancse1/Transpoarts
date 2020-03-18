@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>    <h1 class="text-center">
     <b> Create New Purchase </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
   
   

   
<form action="{{route('store-purchase')}}" name="form1" method="POST">
    @csrf
     <div class="row ">
        
       <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="date" class="col-form-label col-sm-3 text-right">Date:</label>
            <div class="col-sm-9">
            <input type="date" class="form-control" name="date"  id="date" placeholder="Write date" required>
                         
             </div>
         </div>

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
         <br><label for="wirehouse_id" class="col-form-label col-sm-3 text-right">Wirehouse Name:</label>
             <div class="col-sm-9">
                 <select name="wirehouse_id" class="form-control" id="wirehouse_id" required="">
                 @if(count($wirehouses) > 0)
                @foreach($wirehouses as $wirehouse)
                <option value="{{$wirehouse->wirehouse_id}}" {{($wirehouse->wirehouse_id == $purchase->wirehouse_id) ? 'selected' : ''}} >{{$wirehouse->wirehouse_name}}</option>
                @endforeach     
                @endif
                </select>
                         
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="product_id" class="col-form-label col-sm-3 text-right">Product Name:</label>
             <div class="col-sm-9">
                <select name="product_id" class="form-control" id="product_id" required="">
                 @if(count($products) > 0)
                @foreach($products as $product)
                <option value="{{$product->product_id}}" {{($product->product_id == $purchase->product_id) ? 'selected' : ''}} >{{$product->product_name}}</option>
                @endforeach     
                @endif
                </select>
                         
            </div>
        </div>

       

          <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="order_quantity" class="col-form-label col-sm-3 text-right">Order Quantity:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="order_quantity"  id="order_quantity" value="{{$purchase->order_quantity}}"  required>          
             </div>
             <div class="col-sm-2">
                 
                     <select name="" class="form-control" id="" required="" >
                         <option>KG</option>
                     </select>
                 
             </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="supplier_chalan_qty" class="col-form-label col-sm-3 text-right">Supplier Chalan Quantity:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="supplier_chalan_qty"  id="supplier_chalan_qty" value="{{$purchase->supplier_chalan_qty}}"  required>          
             </div>
             <div class="col-sm-2">
                 
                     <select name="" class="form-control" id="" required="" >
                         <option>KG</option>
                     </select>
                
             </div>
         </div>



          <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="receive_quantity" class="col-form-label col-sm-3 text-right">Recevie Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="receive_quantity"  id="receive_quantity" value="{{$purchase->receive_quantity}}" required>
                                 
            </div>
        </div>
        
         <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="weight_quantity" class="col-form-label col-sm-3 text-right">Weight Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="weight_quantity"  id="weight_quantity" value="{{$purchase->weight_quantity}}" required>
                                 
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="remain_quantity" class="col-form-label col-sm-3 text-right">Remain Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="remain_quantity"  id="remain_quantity" value="{{$purchase->remain_quantity}}" required>
                                 
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="sack_purchase" class="col-form-label col-sm-3 text-right">Sack Weight:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="sack_purchase" value="{{$purchase->sack_purchase}}"  id="sack_purchase"  required>
                         
             </div>
         </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="merchandiser" class="col-form-label col-sm-3 text-right">Moisture Percentage:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="moisture"  id="moisture" value="{{$purchase->moisture}}" required>
                         
             </div>
         </div>



        
        <div class="col-xs-8 col-sm-8 col-md-8">
            <br><label for="deduction_quantity" class="col-form-label col-sm-3 text-right">Deduction Quantity:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control" name="deduction_quantity"  id="deduction_quantity" value="{{$purchase->deduction_quantity}}" required>
                                 
            </div>

            <div class="col-sm-2">
                 
                     <select name="" class="form-control" id="" required="" >
                         <option>Bag Pieces</option>
                     </select>
                
             </div>
        </div>

        

        

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="bill_quantity" class="col-form-label col-sm-3 text-right">Bill Quantity:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="bill_quantity"  id="bill_quantity" value="{{$purchase->bill_quantity}}" required>
                         
             </div>
         </div>  

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="purchase_rate" class="col-form-label col-sm-3 text-right">Purchase Rate:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="purchase_rate"  id="purchase_rate" value="{{$purchase->purchase_rate}}" required>
                         
             </div>
         </div>

          <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="transport_vehicle" class="col-form-label col-sm-3 text-right">Transport Vehicle:</label>
             <div class="col-sm-9">
            <input type="text" class="form-control" name="transport_vehicle"  id="transport_vehicle" value="{{$purchase->transport_vehicle}}" required>
                         
             </div>
        </div> 

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="transport_fare" class="col-form-label col-sm-3 text-right">Transport Fare:</label>
            <div class="col-sm-9">
            <input type="number" class="form-control" name="transport_fare"  id="transport_fare" value="{{$purchase->transport_fare}}" required>
                         
             </div>
         </div>
        

         <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="total_payable_amount" class="col-form-label col-sm-3 text-right">Total Payable Amount:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="total_payable_amount"  id="total_payable_amount" value="{{$purchase->total_payable_amount}}" required>
                         
             </div>
         </div>


         
        
        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br><br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/purchase') }}"> Back</a>

                 

        </div>


    </div>
     <br>
     <br>
     <br>
   
</form>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script type="text/javascript">

     // $("#raw_supplier_id").on('change', function(){
     //        var supplierId = $(this).val();
     //        var wirehouseId = $("#wirehouse_id");

     //        $.ajax({
     //            url: "supplierWiseWirehouse/"+supplierId,
     //            type: "GET",
     //            success:function(data){
     //                // console.log(data);
     //                // return false;
     //                wirehouseId.empty();
     //                var content = '<option selected="" disabled="">Please Select Wirehouse</option>';
     //                $.each(data,function(index,value) {
     //                    content += '<option value="'+value.wirehouse_id+'"> '+value.wirehouse_name+''
     //                    '</option>';
     //                });
     //                wirehouseId.append(content);
     //            },
     //            error:function(){
     //                alert("Something Went Wrong");
     //            }
     //        });
     //    });

       $("#wirehouse_id").on('change', function(){
            var wirehouseId = $(this).val();
            var productId = $("#product_id");

            $.ajax({
                url: "wirehouseWiseProducts/"+wirehouseId,
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

       $("#product_id").on('change',function(){
            var productId = $(this).val();
            var  productRemain = $("#remain_quantity");

            $.ajax({
                url: "productWiseRemain/"+productId,
                type: "GET",
                dataType: "json",
                success:function(data){
                    // console.log(data);
                    // return false;
                    productRemain.empty();
                    //product_rate.html(data);
                    $("input[name=remain_quantity]").val(data);
                    //document.getElementById('rate').innerHTML=data;
                },
                error:function(){
                    alert("Something Went Wrong");
                }
            });
        });



    
    $(document).ready(function(e){
        $("input").change(function(){
            var sub = 0;
            $("input[name=order_quantity]").each(function(){
                sub = sub + parseInt($(this).val());
            })
            $("input[name=supplier_chalan_qty]").each(function(){
                sub = sub - parseInt($(this).val());
            }) 
 
            $("input[name=remain_quantity]").val(sub);
        });
    });
    
    $(document).ready(function(e){
        $("input").change(function(){
                    var sack = 0;
                    $("input[name=sack_purchase]").each(function(){
                        sack = sack + parseInt($(this).val());
                    })
                   //var sack = document.form1.sack_purchase.value ;
            
                  var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
                   var result = mur + sack; 
                   $("input[name=deduction_quantity]").val(result);
           
        });
    });
    

    //   $(document).ready(function(e){
    //     $("input").change(function(){
    //         if (document.form1.sack_purchase.value >= 50) {
                 
    //               var grm = 1000;
    //               var kg = 50;
    //               var sack = 0.8
                  
    //               var final = (grm / kg) * sack;
    //               var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
    //               var result = mur + final; 
    //               $("input[name=deduction_quantity]").val(result);

    //         } else if (document.form1.sack_purchase.value >= 40 && document.form1.sack_purchase.value < 50 ) {
    //               var grm = 1000;
    //               var kg = 40;
    //               var sack = 0.8
    //               var final = (grm / kg) * sack;
    //                 var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
    //               var result = mur + final; 
    //               $("input[name=deduction_quantity]").val(result);

    //         } else if (document.form1.sack_purchase.value >= 30 && document.form1.sack_purchase.value < 40 ) {
    //               var grm = 1000;
    //               var kg = 30;
    //               var sack = 0.8
    //               var final = (grm / kg) * sack;
    //               var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
    //               var result = mur + final; 
    //               $("input[name=deduction_quantity]").val(result);

    //         } else if (document.form1.sack_purchase.value >= 20 && document.form1.sack_purchase.value < 30 ) {
    //               var grm = 1000;
    //               var kg = 20;
    //               var sack = 0.8
    //               var final = (grm / kg) * sack;
    //                 var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
    //               var result = mur + final; 
    //               $("input[name=deduction_quantity]").val(result); 
                  
    //         } else if (document.form1.sack_purchase.value >= 10 && document.form1.sack_purchase.value < 20 ) {
    //               var grm = 1000;
    //               var kg = 10;
    //               var sack = 0.8
    //               var final = (grm / kg) * sack;
    //               var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
    //               var result = mur + final; 
    //               $("input[name=deduction_quantity]").val(result);

    //         } else{
    //               var grm = 1000;
    //               var kg = 5;
    //               var sack = 0.8
    //               var final = (grm / kg) * sack;
    //               var mur = (document.form1.receive_quantity.value * document.form1.moisture.value) / 100
    //               var result = mur + final; 
    //               $("input[name=deduction_quantity]").val(result);
    //         }
            
    //     });
    // });

    $(document).ready(function(e){
        $("input").change(function(){

            if (document.form1.receive_quantity.value >=document.form1.supplier_chalan_qty.value) {
                 var sub = 0;
            $("input[name=supplier_chalan_qty]").each(function(){
                sub = sub + parseInt($(this).val());
            })
            $("input[name=deduction_quantity]").each(function(){
                sub = sub - parseInt($(this).val());
            }) 
 
            $("input[name=bill_quantity]").val(sub);

            }else{
                var sub = 0;
            $("input[name=receive_quantity]").each(function(){
                sub = sub + parseInt($(this).val());
            })
            $("input[name=deduction_quantity]").each(function(){
                sub = sub - parseInt($(this).val());
            }) 
 
            $("input[name=bill_quantity]").val(sub);
            }
            
        });
    });

    //  $(document).ready(function(e){
    //     $("input").change(function(){
    //         var sub = 0;
    //         $("input[name=actual_quantity]").each(function(){
    //             sub = sub + parseInt($(this).val());
    //         }) 
    //         $("input[name=bill_quantity]").val(sub);
    //     });
    // });

      $(document).ready(function(e){
        $("input").change(function(){
            var sub = 0;
            $("input[name=bill_quantity]").each(function(){
                sub = sub + parseInt($(this).val());
            }) 
            $("input[name=purchase_rate]").each(function(){
                sub = sub * parseInt($(this).val());
            })
            $("input[name=transport_fare]").each(function(){
                sub = sub - parseInt($(this).val());
            })  
            $("input[name=total_payable_amount]").val(sub);
        });
    });




</script>

@endsection  