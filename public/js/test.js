var x = 0;
function testIt(input){
    //alert("You just clicked on "+input);
    
    if(x%2 ==0){
        x = 1;
        var tmp = document.getElementById(input);
        tmp.style.display="block";    //("display:block;");
    }
    else{
        x = 0;
        var tmp = document.getElementById(input);
        tmp.style.display="none";    //("display:block;");
    }

}
var xmlHttp = testFunction();
function testFunction() {
    var tmp;
    if(window.ActiveXObject){
        try {
           tmp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (error) {
            tmp = false;
        }
    }else{
        try {
            tmp = new XMLHttpRequest();
        } catch (error) {
            tmp = false;
        }
    }
    if(!tmp){
        alert("sorry There is an error with your object");
    }else{
        //alert("Success! Good");
        return tmp;
    }
}
    
function test(){
    
   
        //var val = document.getElementById("product").value;
       
       if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
            pId = encodeURIComponent(document.getElementById("product").value);
            xmlHttp.open("GET","productPrice?id="+pId,true);
            xmlHttp.onreadystatechange = handleProcess;
            
            xmlHttp.send();

       }
    
}
function handleProcess() {
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200){
            disp = xmlHttp.responseXML;
            test = disp.documentElement;
            test2 = test.firstChild.data;//xmlHttp.responseXML.documentElement.firstChild.data;
            document.getElementById("unitPrice").innerHTML = test2;
        }
    }
}
function addDrug(input){
    console.log(input);
}