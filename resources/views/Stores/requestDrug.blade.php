
@extends('layout/app')
@section('content')
    <h1>Adding Product to Store id</h1>
<form>
        <div class="form-group">
            {!! Form::label("pName", "Product Name") !!}
            {!! Form::text("pName", "$productName", ["readonly",'id'=>'productId','required','class'=>'form-control','placeholder'=>'Product Quantity']) !!}
        </div>
                <div class="form-group">
            {!! Form::label('pType', 'Store Requesting to') !!}
            {!! Form::select('pType',$sList, "S",['id'=>'storeList','placeholder'=>'Please Select the Store You want to make your request from.','required','class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("toWH", "To") !!}
            {!! Form::text("toWH", $sRequestingName, ["readonly",'id'=>'toWH','required','class'=>'form-control','placeholder'=>'Product Quantity']) !!}
        </div>

        <div class="form-group">
            {!! Form::label("pQuantity", "Quantity Requesting") !!}
            {!! Form::number("pQuantity", "", ['id'=>'quantity','required','class'=>'form-control','placeholder'=>'Product Quantity']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("RFR", "Reason for Request") !!}
            {!! Form::textarea('RFR', '', ['id'=>'reason','required','class'=>'form-control','placeholder'=>'Note']) !!}
        </div>
        <div class="form-group">
            {!! Form::number("pId", "$pId", ['id'=>'xyz','required','class'=>'hideField form-control','placeholder'=>'Product Quantity']) !!}
        </div>
         <div class="form-group">
            {!! Form::number("pId", "$sId", ['id'=>'storeRequestingId','required','class'=>'hideField form-control','placeholder'=>'Product Quantity']) !!}
        </div>

          
    </form>
    <button class="btn btn-primary btn-lg btn-block" id="msgDesc">Submit Request</button>
@endsection
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script>
    $(document).ready(function(){
                $flag = -1;
                $flag2 = -1;
                $spQuantity = -1;
                $msgDesc = "";
                $reasonForRequest = "";
                $pRequesting = 0;$sRequesting=0;$sGiving=0;$pGiving=0;$quantityRqstin=0;$rfr=0;
                $('#reason').blur(function(){
                    $msgDesc = $('#reason').val();
                    $reasonForRequest = $('#reason').val();
                })
     $('#storeList').blur(function(){
         $pId = $('#xyz').val();
         $storeId = $('#storeList').val();
         //alert("YOu just clicked out the store list "+$storeId);
         $.get("/makequery/"+$pId+"/"+$storeId,function(data){
            
                   

                $qpUPrice= data['pInQ']['pUnitPrice'];$qpStore= data['pInQ']['pWareHouse'];$qpName = data['pInQ']['pName']; 
                $qpExpDate = data['pInQ']['pExpDate'];$qpCat = data['pInQ']['pCat'];$qpMDate= data['pInQ']['pMDate'];
                $qpType = data['pInQ']['pType'];$qpTax  = data['pInQ']['isTax'];

                    // = data['pInQ']['']
                $test = new Array();
                console.log($qpUPrice+" : "+$qpStore+" : "+$qpName+" : "+$qpExpDate+" : "+$qpCat+" : "+$qpMDate+" : "+$qpType+" : "+$qpTax);
                $totalProducts = data['size'];
                console.log($test.length);
                for($counter = 0; $counter <$totalProducts; $counter++){
                    if(data['products'][$counter]['pName'] === $qpName){
                        $test.push(data['products'][$counter]);
                    }
                    else{
                        console.log("false");
                    }
                    
                }
                if($test.length >0){
                    ////
 //$qpUPrice;$qpStore$qpName$qpExpDate $qpCat$qpMDate$qpType$qpTax
                    ////

                     $spUPrice= $test[0]['pUnitPrice'];$spStore= $test[0]['pWareHouse'];$spName = $test[0]['pName']; 
                $spExpDate = $test[0]['pExpDate'];$spCat = $test[0]['pCat'];$spMDate= $test[0]['pMDate'];$spQuantity= $test[0]['pQuantity'];
                $spType = $test[0]['pType'];$spTax  = $test[0]['isTax'];


                    if($spUPrice != $qpUPrice){
                        alert("Sorry you cannot proceed with this Request.\n"+
                        "The unit price of the product that matches this products name are not the same.\n"+
                        "Please check in another store that can fulfill your request\n");
                        $flag = -1;
                    }
                    else if($spExpDate != $qpExpDate){
                        alert("Sorry you cannot proceed with this Request.\n"+
                        "These Products are of different expiry date.\n"+
                        "Please check in another store that can fulfill your request\n");
                        $flag = -1;
                    }
                    else if($spCat != $qpCat){
                        alert("Sorry you cannot proceed with this Request.\n"+
                        "These Products are of different Categories.\n"+
                        "Please check in another store that can fulfill your request\n");
                        $flag = -1;
                    }
                    else if($spMDate != $qpMDate){
                        alert("Sorry you cannot proceed with this Request.\n"+
                        "These Products are of dirrerent Manufacturing Date. \n"+
                        "Please check in another store that can fulfill your request\n");
                        $flag = -1;
                    }
                    else if($spType != $qpType){
                        alert("Sorry you cannot proceed with this Request.\n"+
                        "These Products are not of the same type.\n"+
                        "Please check in another store that can fulfill your request\n");
                        $flag = -1;
                    }
                    else if($spTax != $qpTax){
                        alert("Sorry you cannot proceed with this Request.\n"+
                        "These Products are not of the same tax type.\n"+
                        "Please check in another store that can fulfill your request\n");
                         $flag = -1;
                    }else{
                       // productId,storeList,toWH,quantity,xyz
                        $flag = 1;
                        
                        
                       $rfr=0;
                        $productName = $("#productId").val();
                        $sGiving = $("#storeList").val();
                        $sRequesting = $("#storeRequestingId").val();
                        $pRequesting = $("#xyz").val();
                        $quantity = $("#quantity").val();
                        $pGiving = $test[0]['id'];

                         
                       // console.log("ProductName => "+$productName+" Store From => "+$storeFrom+" Store To => "+$storeTo+" Quantity => "+$quantity+" Product d => "+$productId);
                    }
               
                }
                else{
                    alert("Sorry there is not product of the same name in this store. Please check in the other stores.");
                    $flag = -1;
                }
               
                
            
            
            });
     });
        $('#quantity').blur(function(){
            $tmpQVal = $("#quantity").val();
             if($tmpQVal === ""){
                 alert("Sorry the field cannot be left empty!");
                 $flag2 = -1;
             }
             else{
                     $qRequesting = parseInt($tmpQVal);
             console.log(typeof($qRequesting));
                    if($qRequesting > $spQuantity ){
                        alert("Sorry The Amount you requesting for is more than the actual amount of this product in store.\n"+
                            "Please check in another store that has enough of this product for request.")
                            $flag2 = -1;
                    }
                    else if($qRequesting <=0){
                        alert("Sorry Please specify in a value");
                        console.log(typeof($qRequesting));
                        $flag2 = -1;
                    }
                    else{
                        console.log($flag2);
                        $flag2 = 1;
                        $quantityRqstin = $qRequesting;
                        console.log($flag2);
                    }
             }
            
                    
        });
       $('#msgDesc').on('click',function(){
         // console.log("From The submit Button"+$flag +" flag => "+$flag2);

           //$msgDesc = "dfs";
                    if($msgDesc === ""){
                        alert("Sorry This request is yet to be submitted. Please check and make sure your input for the reason is correct.\nThanks You");
                    }
                    else if($flag == -1){
                        alert("Sorry This request is yet to be submitted.\nPlease check and make sure Select a correct store to request a product.\nThanks You"+ $msgDesc);
                     }
                     else if($flag2 == -1){
                        alert("Sorry This request is yet to be submitted.\nPlease check and make sure the right amoung of quantity can be request.\nThanks You"+ $msgDesc);
                        
                     }
                     else{
                        
                         alert("Request has been successfully submitted for approval.\nPlease inform the Officer in charge to consider your request for approval.\nThank YOu");
                          $.get("/addToAprroveList/"+$pRequesting+"/"+$sRequesting+"/"+$sGiving+"/"+$pGiving+"/"+$quantityRqstin+"/"+1+"/"+$reasonForRequest,function(data){
                                window.location.replace("/stores"); 
                          });
                        
                     }
                    
    })


    });
   
    /*
if($flag == 1 && $flag2 ==1){
                        alert("Request successfully submitted. Please inform the officer responsible to approve the request.")
                    }else{
                        alert("Sorry This request is yet to be submitted. Please check and make sure all your inputs are correct.\nThanks You")
                    }
    */
</script>