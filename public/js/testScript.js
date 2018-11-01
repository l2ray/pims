
function fetchfromMysqlDatabase(input){
       
         //Browser Support Code

            var ajaxRequest;  // The variable that makes Ajax possible!
            
            try {        
               // Opera 8.0+, Firefox, Safari
               ajaxRequest = new XMLHttpRequest();
            } catch (e) {
               
               // Internet Explorer Browsers
               try {
                  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
               } catch (e) {
                  
                  try {
                     ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                  } catch (e) {
                     // Something went wrong
                     alert("Your browser broke!");
                     return false;
                  }
               }
            }
            
            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.
            ajaxRequest.onreadystatechange = function() {
            
               if(ajaxRequest.readyState == 4) {
                  var ajaxDisplay = document.getElementById('unitPrice');
                  alert(ajaxRequest.responseText);
                  //ajaxDisplay.innerHTML = ajaxRequest.responseText;
               }
            }
            
            // Now get the value from user and pass it to
            // server script.
            var product = document.getElementById('product').value;
            var queryString = "?id = " + product ;
            
         
            ajaxRequest.open("GET", "getProduct.php" + queryString, true);
            ajaxRequest.send(null); 
         }

  /*//  var x = document.getElementById("product").value;
    $.ajax({
    type: "GET",
    dataType: "html",
    url: "localhost/ajaxHtml/getRecord.php?id="+input,
    cache: false,
    beforeSend: function(){
        //$("#sampleScript").html('Loading Please wait...');
    },
    success: function(htmlData){
        //alert(x);
        alert(htmlData);
        //$("#unitPrice").html(htmlData);
    }
});
*/
//}