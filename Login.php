<?php

//prompt function
function prompt($prompt_msg){
    echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
}

$host="localhost";
$user="root";
$password="";
$db="Library";

$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

if(isset($_POST['id'])){

    $uname=$_POST['id'];
    $password=$_POST['Password'];

    $sql="select * from login where id='".$uname."'AND Password='".$password."' limit 1";

    $result=mysqli_query($con,$sql);

    if((mysqli_num_rows($result)==1) && ($uname=='Admin'))
    {
        header("Location: AdminLogin.html");
    }
    else if(mysqli_num_rows($result)==1)
    {
        header("Location: Student_Login.html");

    }
    else{
        $prompt_msg = "Incorrect ID or Password";
        prompt($prompt_msg);
        exit();
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<title>Login Page</title>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="Homepage.css" rel="stylesheet">
<link href="Homepage2.css" rel="stylesheet">
<link href="Login.css" rel="stylesheet">
<style>
    body, h1, h2, h3, h4, h5 {
        font-family: "Poppins", sans-serif
    }

    body {
        font-size: 16px;
    }

    .w3-half img {
        margin-bottom: -6px;
        margin-top: 16px;
        opacity: 0.8;
        cursor: pointer
    }

    .w3-half img:hover {
        opacity: 1
    }
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" id="mySidebar"
     style="z-index:3;width:300px;font-weight:bold;"><br>
    <div class="w3-container">
        <img src="Indian_Institute_of_Information_Technology,_Kota_Logo.png"
             style="float: left; width: 100px;height: 60px;margin-right: 10px;">
        <h3 class="w3-padding-64"><b>Indian Institute of Information Technology Kota</b></h3>
    </div>
    <div class="w3-bar-block">
        <a class="w3-bar-item w3-button w3-hover-white" href="Homepage.html" onclick="w3_close()">Home Page</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Login.php" onclick="w3_close()">Login</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Collection_Dev.html" onclick="w3_close()">Collection
            Development Division</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Elecronic_Dev.html" onclick="w3_close()">Electonic
            Resources Division</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Important_Links.html" onclick="w3_close()">Important
            Links</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="About_us.html" onclick="w3_close()">About Us</a>
    </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
    <a class="w3-button w3-red w3-margin-right" href="javascript:void(0)" onclick="w3_open()">☰</a>
    <span>Indian Institute of Information Technology Kota</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" id="myOverlay" onclick="w3_close()" style="cursor:pointer"
     title="close side menu"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">


    <!--Login-->
    <div class="loginBox">

        <img class="user" src="user.png">
        <h2>Log In Here</h2>
        <form method="post" action="#">
            <p>Identity Number</p>
            <input name="id" placeholder="Enter ID" type="text">
            <p>Password</p>
            <input name="Password" placeholder="Enter Password" type="password">
            <input name="" type="submit" value="sign In">


        </form>
    </div>

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }
    </script>

</body>
</html>
