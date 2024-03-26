<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "mainproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    ?>
    <html>
    <body>
    <?php                                                          
$delevery_pro =" SELECT * FROM probuy";
$result_pro = $conn ->query($delevery_pro);
if($result_pro ->num_rows> 0){
    while($values = $result_pro -> fetch_assoc()){
        $num =  $values['pro_cusnum'];
        $name = $values['pro_cusname'];
        $add = $values['cust_add'];
        $order_time = $values['pro_buytime'];
        $delevery_date = $values['pro_deleverytime'];
        $pro_id = $values['pro_id'];
        $pro_name = $values['pro_name'];
        $pro_qual = $values['pro_quality'];
        $price_peo = $values['pro_price'];
        echo "<table class='product-table'>";
        echo "<tr><th colspan='2'>Product Details</th></tr>";
        
        echo "<tr><td><b>Customer Name:</b></td><td>$name</td></tr>";
        echo "<tr><td><b>Customer Number:</b></td><td>$num</td></tr>";
        echo "<tr><td><b>Customer Address:</b></td><td>$add</td></tr>";
        echo "<tr><td><b>Order Time:</b></td><td>$order_time</td></tr>";
        echo "<tr><td><b>Delivery Date:</b></td><td>$delevery_date</td></tr>";
        echo "<tr><td><b>Product ID:</b></td><td>$pro_id</td></tr>";
        echo "<tr><td><b>Product Name:</b></td><td>$pro_name</td></tr>";
        echo "<tr><td><b>Product Quality:</b></td><td>$pro_qual</td></tr>";
        echo "<tr><td><b>Product Price:</b></td><td>$price_peo</td></tr>";
        
        echo "</table>";

        
    }
}

if(isset($_POST["delete_pro"])){
    $delete_prodect = "TRUNCATE TABLE probuy";
    $delete_res = mysqli_query($conn, $delete_prodect);
    
    if($delete_res === TRUE){
        header("location:delevery.php");
            ob_end_flush();
        exit();
    } else {
        echo "<script>alert('All records deleted error!');</script>";
    }
}

?>
<div>
<form method="post">
    <button type="submit" name="delete_pro"><img src="imges/trash.png" width="40px" height="40px"></button>
</form>
<button onclick="printTable()"><img src="imges/laser.png" width="40px" height="40px"></button>
</div>
<style>
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table td,
        .product-table th {
            padding: 5px;
            text-align: left;
            border: 1px solid black;
            
        }
        .product-table th {
            text-align: center;
            background-color: #f2f2f2;
        } 
        button{
            border:none;
            outline:none;
            background-color:transparent;
            cursor:pointer;
            float:right;
        }
    </style>
    <script>
        function printTable() {

            document.body.innerHTML;
    window.print();
}
</script>
    </body>
    <html>