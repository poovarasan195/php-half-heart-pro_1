<html>
    <head>

</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mainproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    if (isset($_POST["show"])) {
        $show = $_POST["show"];

        $validate_query = "SHOW TABLES LIKE '$show'";
        $query_result = mysqli_query($conn, $validate_query);

        if ($query_result !== false && mysqli_num_rows($query_result) > 0) {
            
    $select_query = "SELECT * FROM $show;";
    $result_query = mysqli_query($conn, $select_query);
while ($row = mysqli_fetch_assoc($result_query)) {
    $product_title = $row['pro_name'];
    $product_image1 = $row['pro_img'];
    $product_price = $row['pro_price'];
    $category_quality = $row['pro_quality'];
    $prodect_id = $row['pro_id'];

    
    echo "
    <div class='show'>
    <img src='./outputimg/$product_image1' class='product-image' alt='$product_title'>
    <h3>$product_title</h3>
    <p>Quality: $category_quality</p>
    <p>Price: $product_price /-</p>
    <p class='product-id'>Product ID:$prodect_id</p>
</div>
";
      }
     }else{
        echo "<script> alert(' key value is invalid')</script>";
     }
    }
}
  

   if(isset($_POST["delete_name"]) && isset($_POST["delete_id"])){

    $shows = $_POST["delete_name"];
    $validate_query_delete = "SHOW TABLES LIKE '$shows'";
    $query_result = mysqli_query($conn, $validate_query_delete);

    if ($query_result !== false && mysqli_num_rows($query_result) > 0) {
       $delete_name = $_POST["delete_name"];
       $delete_id = $_POST["delete_id"];

     $delete_pro = "DELETE FROM $delete_name  WHERE pro_id='$delete_id';";
     if(!$conn -> connect_error){
        $conn -> query($delete_pro);

     }
   }else{
    echo "<script> alert(' key value is invalid')</script>";
 }
}
?>
<style> 
*{
    margin:0;
    padding:0;
}
.show {
    border: 1px solid #ccc;
    padding: 20px;
    margin: 10px;
    width: 200px;
    height: 350px;
    text-align: center;
    float: left;
    overflow:auto;
    backdrop-filter:blur(40px);
}

img {
    width: 150px;
    height: 150px;
}

.add-to-cart {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}
#show_my_prodect{
    display:none;
    position: absolute;
    margin-top:3.6%;
    margin-left:83%;
    animation: show_f 1s linear alternate;
}
@keyframes show_f{
    from{ transform: scale(2.5) translate(-300px) ;}to{transform: scale(1) translate(0px);}
}
#show_my_prodect input{
    color:#444;
    line-height:1rem;
    outline:none;
    border:none;
    background-color:transparent;
    border-bottom:1px solid red;
}
.delete_from{
    position: absolute;
    margin-top:7%;
    margin-left:83%;
    display:flex;
    flex-direction: column;
    width:16%;
    border-radius:10px;
    background-color:red;
    transform-origin: top ;
    clip-path: circle( 0% at 100% 0%);
    transition:2s;
}
.delete_from input[type='text']{
    color:#444;
    line-height:2rem;
    outline:none;
    border:none;
    background-color:transparent;
    border-bottom:1px solid red;
}
.delete_from input[type='submit']{
    border-radius:20px;
    width:40px;
    line-height:2rem;
    outline:none;
    border:none;
   background-color:red;
   transition:1s;
}
.delete_from input:hover{
    color:red;
}
/*img_pop */
.img_pop{
    width:30px;
    height:30px;
    margin-left:10px;
    cursor:pointer;
}
.img{
    margin-left:90%;
}
.emp{
    position: fixed;
    z-index: -999;  
    background-image:url("imges/back.jpg") ;
    background-size: cover;
    width:100%;
    height:100%;
    transition:2s;
}


    </style>
    <div class="emp" id="img_back">
    </div>
<form method="post" id="show_my_prodect" > 
    <input type="text" name="show" placeholder="search..." required>
    <input type="submit" name="submit" value="🔎" style="border:none; width:40px; height:40px; font-size:20px; cursor:pointer;">
</form>
<!-- delete from-->
<form id="delete_form" class="delete_from" method="POST"> 
    <lable id="cancel_form" style="cursor:pointer;">❌</lable>
    <input type="text" name="delete_name" placeholder="enter u key" required>
    <input type="text" name="delete_id" placeholder="enter prodect id" required>
    <input type="submit" name="delete_key" value="🗑️">
</form>
<div class="img">
<img src="imges\search (4).png" class="img_pop" id="search_i">
<img src="imges\trash.png" class="img_pop" id="delete_i">
</div>
<script>
        var delete_show = document.getElementById('delete_form');
        var deoete_i=document.getElementById('delete_i');
        var img_back=document.getElementById('img_back');
        var cancel_form=document.getElementById('cancel_form');

        deoete_i.addEventListener('click', function() {
    delete_show.style.clipPath = "circle(100% at 50% 0%)";
    delete_show.style.backgroundColor = "transparent";
    delete_show.style.backdropFilter = "blur(40px)";
    img_back.style.backgroundImage = "url('imges/back2.jpg')";

    setTimeout(function(){
        cancel_form.addEventListener('click', function(){
            delete_show.style=" clip-path: circle( 0% at 50% 0%);";
            img_back.style.backgroundImage = "url('imges/back.jpg')";
         });
   });
});

var search_form = document.getElementById('show_my_prodect');
var search_butt = document.getElementById('search_i');   

search_butt.addEventListener('click', function() {
    search_form.style.display="block";

    setTimeout(function() {
        search_butt.addEventListener('dblclick', function() {
            search_form.style.display="none";
        });
    }, 500);
});


    </script>
</body>
    </html>