<?php
ob_start();
include("allconection.php");
$servsrname = "localhost";
$username = "root";
$password = "";
$database = "mainproject";

$conn = new mysqli($servsrname, $username, $password, $database);

$sql = "select * from prodect;";
$res = $conn -> query($sql);
 if($res ->num_rows>0){
     while($row = $res -> fetch_assoc()){
        $product_title = $row['pro_name'];
        $product_image1 = $row['pro_img'];
        $product_price = $row['pro_price'];
        $category_quality = $row['pro_quality'];
        $prodect_id = $row['pro_id'];

        echo "
        <div class='product'>
         <img src='./outputimg/$product_image1' alt='Product'> 
           <h5> id: $prodect_id</h5>                         
            <h3>$product_title</h3>
            <p class='price'>💲$product_price/-</p>
            <p class='quality'>quality:$category_quality</p>
            <button class='add-to-cart'> save_key </button>
            <button class='add-to-cancel'>buy know</button>
        </div>                        
    ";
     }
 }

 if (isset($_POST["text1"])) {
    $table_creat = $_POST["text1"];
    $query = "CREATE TABLE $table_creat (pro_img varchar(255), pro_name varchar(255), pro_quality int, pro_price varchar(255), pro_id int)";

    if (!$conn->connect_error) {
        if ($conn->query($query) === TRUE) {
            header("location:prodect_total_view.php");
            ob_end_flush();
            exit();
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Connection failed: " . $conn->connect_error;
    }
}
?>
<script>

        
document.addEventListener('DOMContentLoaded', function() {
    var table_creat = document.getElementById('table_cart');
    var table_cancel = document.getElementById('table_insert');
    var table_none = document.getElementById('table_cancel');

    if (table_creat && table_cancel) {
        table_creat.addEventListener('click', function() {
            table_cancel.style.display = 'block';
        });

        table_none.addEventListener('dblclick', function() {
            table_cancel.style.display = 'none';
        });
    } else {
        console.error("One or both elements not found.");
    }
});



</script>
  <style>            
        *{
            padding:0;           
            margin:0;
            box-sizing:border-box;
        }
        h5{
         color:red; margin-left:16%;
         position: absolute; font-size: 1.2em; 
        }
        .quality{
            font-size: 1em;
            position: absolute;
            margin-left:16%;
            margin-top:22px;
        }
        .price{
            font-size: 1.2em;
            position: absolute;
            margin-left:24%;
            margin-top:110px;
        }       
        .product {
    display: flex;
    overflow: hidden;
    border: 1px solid #ccc;
    margin:50px;
    padding: 20px;
    transition: 0.9s;
    width: 90%;
    height: 200px;
}

.product:hover {
    box-shadow: 0px 0px 5px black;
}

.product img {
    width: 180px; 
    height: auto;
    margin-right: 20px;
    object-fit: contain;
}
h3{
    margin-top:50px;
    margin-left:16%;
    width:70%;
    position: absolute;
    font-size: 1rem;
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
/* table_cart start*/
#table_cart{
    border-radius:10px;
    box-shadow:0px 0px 10px black;
    width:1.7%;
    font-size:1em;
    background-color:transparent;
    cursor:pointer;
    border:none;
    outline:none;
    color:black;
    position: absolute;
    top:2%;
    left:80%;
    transition:1s;
}
#table_cart:hover{
    color: green;
}
#table_insert{
    width:15%;
    position: absolute;
    top:3%;
    left:60%;
    animation: table 1s linear alternate;
}@keyframes table{
    from{ transform: scale(2.5) translate(-1000px) ;}to{transform: scale(1) translate(0px);}
}
#table_insert input{
    background-color:transparent;
    border:none;
    outline:none;
    border-bottom:1px solid black;
}
/* search*/
.search_page{
    border-radius:10px;
    box-shadow:0px 0px 10px black;
    width:1.7%;
    position: absolute;
    top:2%;
    left:83%;
}
.search_page input,button{
    cursor:pointer;
    background-color:transparent;
    font-size:1rem;
    border:none;
    outline:none;
}

</style>
<button id="table_cart"> 🗝️</button>

<form method="post" id="table_insert" style="display:none;"> 
    <input type="text" name="text1" placeholder="set key..." required>
    <input type="submit" name="submit2" id="table_cancel" value="🗝️"  style="border:none;cursor:pointer;">
</form>

<form action="search.php" method="post" class='search_page'>
    <input type="submit" name ="sub" value="🔎">
</form>

<form action="cart.php" method="post" class='search_page' style="margin-left:40px;">
<button type="submit"><img src="imges/trolley.png" width="20px" height="20px"></button>
</form>


