<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mainproject";
    
   $conn = new mysqli($servername, $username, $password, $database);
    
   
     if(!$conn){
      die(mysql_error($conn));
     }

     $select_query = "SELECT * FROM prodect";
     $result_query = mysqli_query($conn, $select_query);
 
     while ($row = mysqli_fetch_assoc($result_query)) {
         $product_title = $row['pro_name'];
         $product_image1 = $row['pro_img'];
         $product_price = $row['pro_price'];
         $category_quality = $row['pro_quality'];
         $prodect_id = $row['pro_id'];
 
         // Ensure the image path is constructed properly within the src attribute
         echo "
         <div class='product'>
             <img src='./outputimg/$product_image1' class='product-image' alt='$product_title'>
             <div class='product-details'>
                 <h3 class='product-title'>$product_title</h3>
                 <p class='product-quality'>quality:$category_quality</p>
                 <p class='product-price'>Price: $product_price /-</p>  <p class='product-id'>id: $prodect_id </p>
                 <button class='add-to-cart-btn'>save_key</button>
                 <button class='add-to-sale-btn'>buy now</button>
             </div>
         </div>";
     
     }
     
?> 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin insert img</title>
    <style>
        *{
            padding:0;
            margin:0;
        }
       
.product {
    display: flex;
    border: 1px solid #ccc;
    margin: 10px;
    padding: 10px;
    transition:.9s;
}
.product:hover{
    box-shadow:0px 0px 5px black;
}

.product-image {
    width: 250px;
    height: auto;
    margin-right: 200px;
    object-fit: contain;
}

.product-details {
    flex: 1;
}

.product-title {
    font-size: 2.2em;
    margin-bottom: 5px;
}

.product-quality {
    color: #888;
    font-size: 1.2em;
    margin-bottom: 5px;
}

.product-price {
    font-weight: 900;
}

.add-to-cart-btn {
    background-color: #f90;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    outline: none;
    margin-top:20px;
    transition:1.2s;
}
.add-to-cart-btn:hover{
  color: #f90;
  background-color:white;
}
.add-to-sale-btn:hover{
  color: #f90;
  background-color:white;
}
.add-to-sale-btn {
    background-color: #f90;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    outline: none;
    transition:1.2s;

}

         input{
            outline: none;
            line-height:2rem;
         }
         .prodectimg{
          display:grid;
            background-color:gray;  position: absolute; height:40%; width:65%; 
            border-radius: 20px;  grid-template-columns: auto auto  ;
            margin-left:33%;
            margin-top:6%;
         }
        .insert_prodect{
          border-radius: 20px;
          width:95%;
          border:1px solid white;
        }
        .admin_pass_insert{
          display:grid;
          place-items: center;
          border-radius: 20px;
          border:1px solid white;
        }
        .admin_pass_insert form{
           width:80%;
        }
         /*delete_pro srt */
         .delete_pro{
          width:30%;
          height:40%;
             background-color:red;
             color:white;
             display:flex; 
             justify-content:center;
             align-items:center;
            border-radius: 20px;
            margin-top:6.9%;          
         }
         .delete_pro input{
          margin-left:10px;
          width:80%;
          background-color:transparent;
          display:black;
          outline:none;
          border:none;
          border-bottom:1px solid black;
         }
         .form-label{
          margin-left:10px;
          margin-top:10px;
         }
         /*del_pro */
         .del_pro{
          position: absolute;
        left:20px;
        margin-top:1%;         
         }
        </style>
</head>
<body>
<div class="prodectimg">

  <div class="insert_prodect">

<form class="row g-3" 
style=" width: 90%;
   height:65%;  line-height: 3.5rem;" method="POST" enctype="multipart/form-data">
  <div class="col-6">
    <label for="inputAddress2" class="form-label">prodect_img</label>
    <input type="file" accept=".jpg, .jpeg, .png" name="image" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" >
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">name</label>
    <input type="text" name="name" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">quality</label>
    <input type='number' id="inputState" name="quality" class="form-select">
  </div>
  <div class="col-md-4">
    <label for="inputZip" class="form-label">price</label>
    <input type="text" name="price" class="form-control" id="inputZip">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">id</label>
    <input type="text" name="id" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">insert_pro</button>
  </div>
</form>

  </div>


  <div class="admin_pass_insert">
  <form class="row g-3" id="from_user" method="post">
            <div class="col-12">
              <label for="inputPassword2" class="visually-hidden">user_name</label>
              <input type="text" name="username_admin" class="form-control" id="user_name" placeholder="user_name" required>
            </div>
            <div class="col-12">
              <label for="inputPassword2" class="visually-hidden">Password</label>
              <input type="password" name="password_admin" class="form-control" id="user_pass" placeholder="Password" required>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
            </div>
          </form>
  </div>

</div>

<!-- delevery man user form-->
<form action="delevery.php" class="del_pro">
  <button type="submit" class="btn btn-primary"> order details</button>
  </form>
  
  <div class="delete_pro">
      <form method="POST" class="row g-3" >
      <label for="inputZip" class="form-label"> enter the id</label>
    <input type="text" name="delete_id" class="form-control" required>

    <input type="submit" name="subm" value="Delete" style="border:none;" >
  </form>
  </div>


        <?php
         if(isset($_POST['delete_id'])){
      $given_proid = $_POST["delete_id"];
      $delete_pro = "DELETE FROM prodect WHERE pro_id = $given_proid;";
       if(!$conn -> connect_error){
           $conn->query($delete_pro);
       }
    }

      if(isset($_POST["username_admin"]) && isset($_POST["password_admin"])){

          $admin_name = $_POST["username_admin"];
          $admin_pass = $_POST["password_admin"];

          $values_com ="SELECT * from users where user_name = '$admin_name';";
          $values_exc = $conn -> query($values_com);
          if($values_exc -> num_rows == 0){
  
          $admin_insert = "INSERT INTO users (user_name, user_pass) VALUES (?, ?)";
          $values = $conn->prepare($admin_insert);
  
          if ($values) {
            
              $values->bind_param("ss", $admin_name, $admin_pass);
              
              if ($values->execute()) {
                  echo "<script>alert('Admin added successfully');</script>";
              } else {
                  echo "<script>alert('Admin insertion failed');</script>";
              }
          } else {
              echo "<script>alert('Prepared statement error');</script>";
          }
      }
    }

      if(isset($_POST['submit'])){
        $prodectname = $_POST["name"];
        $prodectquality =$_POST["quality"];
        $prodectprice =$_POST["price"];
        $prodectid =$_POST["id"];
        
         $prodectimage = $_FILES["image"]['name'];
         $temp_image =$_FILES["image"]['tmp_name'];


         if($prodectname =='' || $prodectquality == '' || $prodectprice == '' ||  $prodectimage == '' || $prodectid == '' ){
           echo "<script> alert ('plz enter the all table😥😥')</script>";
           exit();
         }else{
          $target_directory = "./outputimg/";
          $target_path = $target_directory . $prodectimage;
          move_uploaded_file($temp_image, $target_path);

          $check_query = "SELECT pro_name FROM prodect WHERE pro_name = '$prodectname'";
          $check_result = $conn->query($check_query);
          
          if ($check_result->num_rows == 0) {
              $insert = "INSERT INTO prodect (pro_img, pro_name, pro_quality, pro_price,pro_id) VALUES ('$prodectimage','$prodectname', '$prodectquality', '$prodectprice', $prodectid)";
              if ($conn->query($insert) === TRUE) {
                echo "<script> alert('insert done');</script>";
              } else {
                  echo "Error: " . $insert . "<br>" . $conn->error;
              }
            }else{

            }
  }
}
    echo "<br>"; 
?>
</body>
</html>