
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mainproject";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (isset($_POST["username"]) && isset($_POST["password"])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];


    $sql = "SELECT * FROM admin WHERE admin_name='$user' AND admin_pass='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: admin_page.php");
        exit();
    } else {
        header("location: index.php");
        exit();
    }
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Half-heart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="imges/icon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div id="main_div"> 
      <!--but to admin click-->
      <button id="user_button">🔜</button>
          <!--start with nav header-->
          <div id="nav_div">
            <a href="#" data-aos="fade-right">home</a>
            <a href="#footer2" data-aos="fade-right">about us</a>
            <a href="#shop_location" data-aos="fade-right">location</a>
            <a href="#footer1" data-aos="fade-right">connect us</a>            
          </div>
          <!--ent the nav bar-->
          <!--user_form tag-->
          <form class="row g-3" id="from_user" method="post">
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">user_name</label>
              <input type="text" name="username" class="form-control" id="user_name" placeholder="user_name" required>
            </div>
            <div class="col-auto">
              <label for="inputPassword2" class="visually-hidden">Password</label>
              <input type="password" name="password" class="form-control" id="user_pass" placeholder="Password" required>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
            </div>
          </form>
          <!--end form_user tag-->
          <!--icon avather ser-->
        <div class="icon_avather">
          <img src="imges/avather.png" data-aos="fade-left">
      </div>
      <div class="brand_name">
      <h1 data-aos="slide-right" data-aos-duration="2000" data-aos-once="false">Half heart</h1>
      <h1 data-aos="slide-right" data-aos-duration="2000" data-aos-once="false">Half heart</h1>
     </div>
     <div class="deff">
      <span>one stop shop for all your laptop needs</span>
   <p>____________________________________________</p>
     </div>
     </div>
     <div class="secondmaindiv">
          <!--start brand slide-->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            
            <div class="carousel-inner">
              <div class="item active">
                  <span><img src="imges/appel.png" alt="" width="300px" height="200px"></span>
                  <span><img src="imges/hp.png" alt="" width="300px" height="200px"></span>
                  <span><img src="imges/asus.png" alt="" width="300px" height="200px"></span>
                  <span><img src="imges/xiaomi-33354.png" alt="" width="300px" height="200px"></span>
              </div>
          
              <div class="item">
                <span><img src="imges/msi.png" alt="" width="300px" height="200px"></span>
                <span><img src="imges/ps4.png" alt="" width="300px" height="200px"></span>
                <span><img src="imges/razer.png" alt="" width="300px" height="200px"></span>
                <span><img src="imges/sony.png" alt="" width="300px" height="200px"></span>
              </div>
            
              <div class="item">
                <span><img src="imges/dell.png" alt="" width="300px" height="200px"></span>
                <span><img src="imges/lenovo.png" alt="" width="300px" height="200px"></span>
                <span><img src="imges/huawei.png" alt="" width="300px" height="200px"></span>
                <span><img src="imges/samsung.png" alt="" width="300px" height="200px"></span>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="icon-prev" aria-hidden="true"></span>
              
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="icon-next" aria-hidden="true"></span>
            </a>
             </div>
             <!--prodect pointer-->
             <div class="pointer_pro">
      <img src="imges/finger.png" alt="12" data-aos="fade-right">
        </div>
        <!--prodect_send key-->
        <div class="prodect_send">
          <a href="prodect_total_view.php"  data-aos="zoom-out-up">salE...</a>
        </div>
     </div>
       
      <div class="third_div">
         <center><span> back to top</span></center><p></p>

         <div class="footer">
                <div class="footer1" id="footer1">
                   <b>connect with us</b>
                   <li><img src="imges/facebook (1).png" width="20px" height="20px">facebook</li>
                   <li><img src="imges/instagram (1).png " width="20px" height="20px">instagram</li>
                   <li><img src="imges/twitter (1).png " width="20px" height="20px">twitter</li>
                   <li><img src="imges/tinder.png" width="20px" height="20px">tinder</li>
                </div>
                <div class="footer2" id="footer2">
                  <b> about us</b>
                  <li><a href="prodect_total_view.php" style="text-decoration:none; color:white;">prodect</a></li>
                  <li><a href="cart.php"  style="text-decoration:none; color:white;">cart</a></li>
                  <li onclick="alert(' call: 9025534716')" style="cursor: pointer;">help</li>
                </div>
                <div class="footer3" id="shop_location">
                  <b>shop details</b>
                  <li><img src="imges/facebook (1).png" width="20px" height="20px">Half-heart.com </li>
                  <li> <img src="imges/instagram (1).png " width="20px" height="20px"> <a href="https://www.instagram.com/?hl=en" style="font-size: 15px; text-decoration: none; color: white;">01_half-heart_00</a></li>
                  <li><img src="imges/twitter (1).png " width="20px" height="20px">Half-heart_00</li>
                  <li><img src="imges/phone-call.png" width="20px" height="20px"> +91 9025534716</li>
                  <li><img src="imges/placeholder.png" width="20px" height="20px"><a href="https://www.google.com/maps/place/Sankarapuram+-+Cuddalore+Rd,+Thiruvathigai,+Panruti,+Tamil+Nadu+607106/@11.7671931,79.5590867,17z/data=!3m1!4b1!4m6!3m5!1s0x3a54a5f5134071e3:0x58877f1f503db24!8m2!3d11.7671931!4d79.561667!16s%2Fg%2F11h2m6ss81?entry=ttu" style="font-size: 9px; text-decoration: none; color: white;">Sankarapuram - Cuddalore Rd,Thiruvathigai, Panruti, Tamil Nadu 607106</a></li>
                </div>
                <div class="footer4">
                  <img src="imges/love.png" >
                </div>
         </div>
      </div>

    <script src="script.js"></script> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
          once: false, 
      duration: 2000 
        });
      });
      </script>

  
</body>
</html>