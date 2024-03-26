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


<form id="buy_product" method="POST">
<span id="buy_cancel">❌</span>
    <div class="form-group">
        <label for="cus_name">Name</label>
        <input type="text" id="cus_name" name="cus_name" required>
    </div>
    
    <div class="form-group">
        <label for="cus_num">Phone number</label>
        <input type="text" id="cus_num" name="cus_num" required>
    </div>
    
    <div class="form-group">
        <label for="text_buyid">Enter ID</label>
        <input type="text" id="text_buyid" name="text_buyid" required>
    </div>
    
    <div class="form-group">
        <label for="text_buyadd">Address</label>
        <input type="text" id="text_buyadd" name="text_buyadd" required>
    </div>
    
  <center>  <input type="submit" name="submit_buy" value="Order now" class="submit-button"></center>
</form>
<!-- add to cart page-->

<form method="post" id="save_form"> 
    <input type="text" name="text2"  placeholder="key value..." required>
    <input type="text" name="text3"  placeholder="pro id..." required id="input" onkeyup="onlynum()">
    <input type="submit" name="submit1" value="🔜" style="border:none;cursor:pointer; width:5%;"><span id="save_cancel" style="cursor:pointer; margin-left:5px;">❌</span>
</form>

<?php 
   if (isset($_POST["submit_buy"])) {
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
           if (isset($_POST["text_buyid"]) && isset($_POST["text_buyadd"]) && isset($_POST["cus_name"]) && isset( $_POST["cus_num"])) {
               $prod_id = $_POST["text_buyid"];
               $prod_add = $_POST["text_buyadd"];
               $prod_name = $_POST["cus_name"];
               $prod_num = $_POST["cus_num"];
   
               $cus_det = "INSERT INTO probuy (pro_id, pro_name, pro_quality, pro_price, pro_buytime, pro_deleverytime, cust_add, pro_cusname, pro_cusnum)
                           SELECT pro_id, pro_name, pro_quality, pro_price, NOW(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), ?, ?, ?
                           FROM prodect
                           WHERE pro_id = ?";
   
               $stmt = $conn->prepare($cus_det);
               $stmt->bind_param('ssss', $prod_add, $prod_name, $prod_num, $prod_id);
   
               if ($stmt->execute()) {
                header("location: prodect_total_view.php");
                   exit();
               } else {
                   echo "Error inserting data: " . $conn->error;
               }
           } else {
               echo "Missing POST parameters";
           }
       }
   }

   //   save later form

   
if(isset($_POST["submit1"])){
    if (isset($_POST["text2"]) && isset($_POST["text3"])) {
    
        $table_name = $_POST["text2"];
        $valu_set = $_POST["text3"];
   //select perticular table
   
        $validate_query = "SHOW TABLES LIKE '$table_name'";
        $validate_result = mysqli_query($conn, $validate_query);
    
        if ($validate_result && mysqli_num_rows($validate_result) > 0) {
        $value_save = "INSERT INTO  $table_name(pro_img, pro_name, pro_quality, pro_price, pro_id) SELECT pro_img, pro_name, pro_quality, pro_price, pro_id from prodect where pro_id = $valu_set; ";
        if (!$conn->connect_error) {
            if ($conn->query($value_save) === TRUE) {
                header("location:prodect_total_view.php");
                ob_end_flush();
                exit();
            } else {
                echo "Error inserting data: " . $conn->error;
            }
        } else {
            echo "Connection failed: " . $conn->connect_error;
        }
    } else {
        echo "<script> alert(' u can not insert the key '); </script> ";
    }
    }
    }
   ?>
<style>
    #buy_product{
        z-index: 99;
    color:#0056b3;
    display:none;
    backdrop-filter:blur(10px);
    top:10%;
    right:10%;
    position: fixed;
    width:20%;
    animation: buy .2s linear alternate;
}
@keyframes buy{
    from{transform: scale(0)}to{transform: scale(1)}
}
.form-group {
    border:none;
    border-bottom:1px solid #444;
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

 #buy_product input[type="text"] {
    color:#007bff;
    outline:none;
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.submit-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition:1.1s;
}

.submit-button:hover {
    border-radius:100px;
    background-color: #0056b3;
}
#buy_product span{
    cursor:pointer;
    float:right;
}
/*save later */
#save_form{
    display:none;
    width:30%;
    position: fixed;
    top:3%;
    left:50%;
    animation: table 1s linear alternate;
}@keyframes table{
    from{ transform: scale(2.5) translate(-1000px) ;}to{transform: scale(1) translate(0px);}
}
#save_form input{
    width:20%;
    background-color:transparent;
    border:none;
    outline:none;
    border-bottom:1px solid black;
}
</style>
<script>
        document.addEventListener('DOMContentLoaded', function() {
    var buy_prodect_visible = document.getElementById('buy_product');
    var buy_all = document.querySelectorAll('.add-to-cancel');
    var buy_cancel = document.getElementById('buy_cancel');

    buy_all.forEach(button => {
        button.addEventListener('click', function() {
            buy_prodect_visible.style.display = 'block';
        });
    });

    buy_cancel.addEventListener('click', function() {
        buy_prodect_visible.style.display = 'none';
    });

    var save_cancel = document.getElementById('save_cancel'); 
    var save_cart = document.querySelectorAll('.add-to-cart');
    var save_later = document.getElementById('save_form');

    if (save_cancel && save_cart.length > 0 && save_later) {
        save_cart.forEach(button => {
            button.addEventListener('click', function() {
                save_later.style.display = 'block';
            });
        });

        save_cancel.addEventListener('click', function() {
            save_later.style.display = 'none'; 
        });
    }
});

function onlynum(){
            var input =document.getElementById('input');
            var value = /[^0-9]/;
            input.value = input.value.replace(value,"");
        }

</script>
</body>
</html>