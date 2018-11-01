<?php

    $con = mysqli_connect("localhost","root", "4472897njieS_", "PharmacyManagementSystem");
    if($con){
            $pId = $_GET['id'];
          $priceQuery = "SELECT pUnitPrice FROM products WHERE id = $pId";
        $query = mysqli_query($con, $priceQuery);
        $res = "";

        while($total = mysqli_fetch_array($query)){
             $res .="<b>".$total['pUnitPrice']."</b> <br/>";
        }
        echo $res;
    }
    else{
            echo "<h1>sorry Connection Failed. Please check your connection string</h1>";
    }


?>