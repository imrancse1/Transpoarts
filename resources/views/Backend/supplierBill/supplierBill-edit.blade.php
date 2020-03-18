@extends('Backend.app')
@section('content-header')
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <br>    <h1 class="text-center">
     <b> Update Supplier Bill </b>
      </h1>
      
    </section>
@endsection
@section('main-content')
  
<form action="{{route('update-supplierBill',$supplierBill->supplierBill_id)}}" method="POST">
    @csrf
     <div class="row ">
        
       <div class="col-xs-8 col-sm-8 col-md-8">
             <br><label for="date" class="col-form-label col-sm-3 text-right">Date:</label>
            <div class="col-sm-9">
            <input type="date" class="form-control" name="date" value="{{$supplierBill->date}}"  id="date" required>
                         
             </div>
         </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="raw_supplier_id" class="col-form-label col-sm-3 text-right">Supplier Name</label>
             <div class="col-sm-9">
                <select name="raw_supplier_id" class="form-control" id="raw_supplier_id" required="">

                 @if(count($suppliers) > 0)
                @foreach($suppliers as $supplier)
                <option value="{{$supplier->raw_supplier_id}}" {{($supplier->raw_supplier_id == $supplierBill->raw_supplier_id) ? 'selected' : ''}} >{{$supplier->supplier_name}}</option>
                @endforeach     
                @endif
                
                </select>
                         
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="purchase_id" class="col-form-label col-sm-3 text-right">Purchase Date</label>
             <div class="col-sm-9">
                <select name="purchase_id" class="form-control" id="purchase_id" required="">
                

                 @if(count($purchase) > 0)
                @foreach($purchase as $purchase)
                <option value="{{$purchase->purchase_id}}" {{($purchase->purchase_id == $supplierBill->purchase_id) ? 'selected' : ''}} >{{$purchase->date}}</option>
                @endforeach     
                @endif

                </select>
                         
            </div>
        </div>


        <div class="col-xs-8 col-sm-8 col-md-8">
         <br><label for="product_id" class="col-form-label col-sm-3 text-right">Payment Mode:</label>
             <div class="col-sm-9">
                <select name="payment_mode" class="form-control select" id="myselect" required="">
                <option value="">{{$supplierBill->payment_mode}}</option>
                 <option value="Bank">Bank</option>
                 <option value="Cash">Cash</option>            
                </select>
                         
            </div>
        </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8" style="display: none;">
         <br><label for="bank_id" class="col-form-label col-sm-3 text-right">Bank Name</label>
             <div class="col-sm-9">
                <select name="bank_id" class="form-control" id="bank_id" >
                @if(count($banks) > 0)
                @foreach($banks as $bank)
                <option value="{{$bank->bank_id}}" {{($bank->bank_id == $supplierBill->bank_id) ? 'selected' : ''}} >{{$bank->bank_name}}</option>
                @endforeach     
                @endif
                </select>
                         
            </div>
        </div>

        

         <div class="col-xs-8 col-sm-8 col-md-8" style="display: none;">
             <br><label for="account_name" class="col-form-label col-sm-3 text-right">Account Name:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="account_name"   id="account_name" value="{{$supplierBill->account_name}}" >
                         
             </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8" style="display: none;">
             <br><label for="account_number" class="col-form-label col-sm-3 text-right">Supplier Account Number:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="account_number"   id="account_number" value="{{$supplierBill->account_number}}" >
                         
             </div>
         </div>

         <div class="col-xs-8 col-sm-8 col-md-8" style="display: none;">
             <br><label for="pay_amount" class="col-form-label col-sm-3 text-right">Pay Amount:</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="pay_amount"  id="pay_amount" value="{{$supplierBill->pay_amount}}" >
                         
             </div>
         </div>  

         <div class="col-xs-8 col-sm-8 col-md-8 reference" style="display: none;">
             <br><label for="description_note" class="col-form-label col-sm-3 text-right">Description Note:</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control"  name="description_note"  id="description_note" value="{{$supplierBill->description_note}}" >   
             </div>
         </div>

        
        <div class="col-xs-8 col-sm-8 col-md-8 text-center">
               <br><br> <button type="submit" class="btn btn-success">Submit</button>
                 <a class="btn btn-primary" href="{{ route('/supplierBill') }}"> Back</a>

                 

        </div>


    </div>
     <br>
     <br>
     <br>
   
</form>

@section('extra-js')
@endsection

@section('script')
<script type="text/javascript">
      $(document).ready(function(){
        $(".select").on('change',function(){
        var optionData = $("#myselect option:selected").text();
        if(optionData == 'Bank'){
            $(".reference").show().prev().show().prev().show().prev().show().prev().show();
        }else {
            $(".reference").hide().prev().show().prev().hide().prev().hide().prev().hide();
        }
        });
      });
</script>
@endsection
@endsection  