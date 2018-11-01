var productName = "";
    var productId = 0;
    var isTaxable = 0;
    var initTotal = 0;
    var vat = 0;
    $(document).ready(function(){

        $("#productSubmit").on('click',function(){
            //alert("Form Submit");
        });
            
            //alert("This is a test.");
            $("#proId").blur(function(){
               var tmp = $( "#proId" ).val();
               
            //console.log(tmp);
            $.get("/test/"+tmp,function(data){
                productName = data.pName
                productId = data.id;
                isTaxable = data.isTax;
                console.log(isTaxable);
                $("#unitPrice").val(data.pUnitPrice);
                $("#watchForId").val(productId);
               // console.log(productId);
            });
            
        });
        
        $("#proGId").blur(function(){
            var tmp = $( "#proGId" ).val();
               
            //console.log(tmp);
            $.get("/test/"+tmp,function(data){
                productName = data.pName
                productId = data.id;
                isTaxable = data.isTax;
                console.log(isTaxable);
                $("#unitPrice").val(data.pUnitPrice);
                $("#watchForId").val(productId);
               // console.log(productId);
            });
        })
        $("#isGeneric").click(function(){
            $flag = $("#isGeneric").is(":Checked");
            if($flag){
                console.log("Yes");
               
                $("#isGeneric1").css("display","block");
                $("#proId1").css("display","none");
            }
            else{
                console.log("No It is not checked");
                        //$("#isGeneric1").css("display","none");                      

                $("#isGeneric1").css("display","none");
                $("#proId1").css("display","block");
            }

        });
        
        $("#pQuantity").blur(function(){
             //curId = 0;
            //console.log(productId+" is the curProduct");
            if(isTaxable == 1){
            var uPrice = $("#unitPrice").val();
            var quantity = $("#pQuantity").val();
            var totalPrice = 0;
            var initTotal = parseFloat(quantity) * parseFloat(uPrice);//= parseInt($("#totalPrice").val());
            var totalPrice = parseFloat(quantity) * parseFloat(uPrice);
            var initTot = parseFloat($("#totalPrice").val());
            vat = totalPrice*(15/100);
            initTotal = initTotal;
            totalPrice = initTot+totalPrice;
             $("#totalPrice").val(totalPrice);
            }
            else{
            var uPrice = $("#unitPrice").val();
            var quantity = $("#pQuantity").val();
            var initTotal = parseFloat(quantity) * parseFloat(uPrice);//= parseInt($("#totalPrice").val());
            var totalPrice = parseFloat(quantity) * parseFloat(uPrice);
            var initTot = parseFloat( $("#totalPrice").val());
            totalPrice = initTot+totalPrice;
            $("#totalPrice").val(totalPrice);
            }

            
           //totalPrice = q*uPrice;
            //alert(x*y);
           

            $('#tblSales').append("<tr id='row"+productId+"'><td>"+ productName+"</td><td>"+ quantity+" </td><td>"+initTotal+
                "</td><td><button onClick='test("+productId+")'class='btn btn-danger '"+"_"+initTotal+"_"+">Remove Product</button></td></tr>");//var tblRow = "<tr>";
                var formatD = productName+","+quantity+","+initTotal+","+productId+","+vat.toFixed(2);
                alert(formatD);
                $.get('/addTmpData/'+formatD,function(data){

                })
        });
        
        $('#tblSales').on('click', 'button', function(e){
            e.preventDefault();
            //<button onclick="test(2)" class="btn btn-danger " 2="">Remove Product</button>
            
            //console.log(curPId);
            var tmp = window.confirm("Are You sure You want to remove this Product From the Chart list?");
            //alert(tmp);
            if(tmp){
  

                curPId = e.target.outerHTML.split("(")[1].split(")")[0];
                $.get('/deleteProduct/'+curPId,function(data){});
                var xyz = $(this).parents('tr').remove();

                var reverse = parseFloat(e.target.outerHTML.split("_")[1]); //To get the amount of the deleted item
                var prevAmount = parseFloat($("#totalPrice").val()); // to get the amount before a delete
                var backTrack = prevAmount - reverse;
                if(backTrack === NaN){
                    $("#totalPrice").val(0);
                }else{
                    $("#totalPrice").val(backTrack);
                }
               
            return false;
            }
            else{
                return true;
            }
        });
    });
    function test(input){
        //alert(input);
        
    }