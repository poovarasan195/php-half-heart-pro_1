<?php
include("allconection.php");

$servername = "localhost";
$username = "root";
$password = "";
$database = "mainproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 if(isset($_POST["sub"])){
if (isset($_POST["num1"])) {
    $prodect = $_POST["num1"];

    $query = "SELECT * FROM prodect WHERE pro_price <= ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $prodect);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            
            $product_title = $row['pro_name'];
            $product_image1 = $row['pro_img'];
            $product_price = $row['pro_price'];
            $category_quality = $row['pro_quality'];
            $prodect_id = $row["pro_id"];
              echo "     <div class='product'>
              <img src='./outputimg/$product_image1' alt='Product'> 
                <h5> id: $prodect_id</h5>                         
                 <h3>$product_title</h3>
                 <p class='price'> Rs:$product_price/-</p>
                 <p class='quality'>quality:$category_quality</p>
                 <button class='add-to-cart'> save_key </button>
                 <button class='add-to-cancel'>buy know</button>
             </div> ";      
        }
    } else {
        echo "<script> alert(' not prodect ');</script>";
    }

}

 }
?>
<html>
<body>
<form method="post">
    <input type="number" name="num1" placeholder="enter youer price limite" required>
    <input type="submit" value="submit" name="sub" style="border:none; cursor: pointer;">
</form>
<style>
    *{
        margin:0;
        pading:0;
    }
   
    form{
        top:20px;
        left:75%;
        position: absolute;
        width:15%;
        display:flex;
        flex-direction: column;
    }
    form input{
        outline:none;
        background-color:transparent;
        border:none;
        border-bottom:1px solid black;
        line-height:2rem;
    }
    
    h5{
         color:red; margin-left:16%; margin-top:0%;
         position: absolute; font-size: 1.3em; 
        }
        .quality{
            font-size: 1em;
            position: absolute;
            margin-left:16%;
            margin-top:22px;
        }
        .price{
            font-size: 2.2em;
            position: absolute;
            margin-left:24%;
            margin-top:98px;
        }
       
        .product {
    display: flex;
    overflow: hidden;
    border: 1px solid #ccc;
    margin: 20px;
    padding: 10px;
    transition: 0.9s;
    width: 95%;
    height: 200px;
}

.product:hover {
    box-shadow: 0px 0px 5px black;
}

.product img , #search_prodect img{
    width: 180px; 
    height: auto;
    margin-right: 20px;
    object-fit: contain;
}
h3{
    margin-top:48px;
    margin-left:16%;
    width:70%;
    position: absolute;
    font-size: 1.2rem;
    margin-bottom: 5px;
}



.add-to-cart{
    position: absolute;
    background-color: #f90;
    color: white;
    border: none;
    padding: 8px 15px;
    cursor: pointer;
    outline: none;
    margin-top: 11%;
    margin-left: 16%;
    transition: 0.3s;
}
.add-to-cancel{
    position: absolute;
    background-color: #f90;
    color: white;
    border: none;
    padding: 8px 15px;
    cursor: pointer;
    outline: none;
    margin-top: 11%;
    margin-left: 25%;
    transition: 0.3s;
}

.add-to-cart:hover, .add-to-cancel:hover {
    color: #f90;
    background-color: white;
}
    </style>
    </body>
    </html>
