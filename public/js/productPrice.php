<?php
    header('Content-Type: text/xml');// to generate xml content
    echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

    echo '<response>';

    $con = mysqli_connect("localhost","root", "4472897njieS_", "PharmacyManagementSystem");
    if($con){
        $pId = $_GET['id'];
        if($pId == ''){
          echo " ";
        }
        $priceQuery = "SELECT pUnitPrice FROM products WHERE id = $pId";
        $query = mysqli_query($con, $priceQuery);

        while($total = mysqli_fetch_array($query)){
            echo $total['pUnitPrice'];
        }


        //$result = mysqli_fetch_all($query);
    }
    else{
            echo "<h1>sorry Connection Failed. Please check your connection string</h1>";
    }


    echo '</response>';
?>
