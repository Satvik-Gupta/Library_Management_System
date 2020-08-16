<?php
//prompt function
function prompt($prompt_msg){
    echo("<script type='text/javascript'>  alert('".$prompt_msg."'); </script>");
}


$host="localhost";
$user="root";
$password="";
$db="Library";


$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);






    $sql1="select * from Book_Details ";
    $result1=mysqli_query($con,$sql1);

?>


<!DOCTYPE html>
<html lang="en">
<title>Current Library Collection</title>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="Homepage.css" rel="stylesheet">
<link href="Homepage2.css" rel="stylesheet">
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
        <a class="w3-bar-item w3-button w3-hover-white" href="Student_Login.html" onclick="w3_close()">Student Home</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Student_Issue.php" onclick="w3_close()">Books Issued </a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Lib_Collection.php" onclick="w3_close()">Current Library Collection</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Homepage.html" onclick="w3_close()">Log Out</a>

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

    <!-- Header -->
    <div class="w3-container" id="Starting" style="margin-top:80px">
        <h1 class="w3-jumbo"><b>Current Library Collection</b></h1>
    </div>

    <div class="w3">
<br>
        <br>
        <br>
        <br>

        <table class="w3-ul w3-light-grey w3-center">
            <tr class="w3-red w3-xlarge w3-padding-32" >
                <th>ISBN Code</th>
                <th>Book Title</th>
                <th>Language</th>
                <th>No Of Copies Current</th>
                <th>Category Name</th>
                <th>Publication Year</th>
            </tr>
<?php
    while($rows=mysqli_fetch_assoc($result1))
    {
        ?>
            <tr class="w3-padding-16">
                <td><?php echo $rows['ISBN_Code']?></td>
                <td><?php echo $rows['Book_Title']?></td>
                <td><?php echo $rows['Language']?></td>
                <td><?php echo $rows['No_Copies_Current']?></td>
                <td><?php echo $rows['Category_Name']?></td>
                <td><?php echo $rows['Publication_year']?></td>
            </tr>
<?php } ?>
        </table>


    </div>

    <!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">
    Powered by <a class="w3-hover-opacity" href="https://www.w3schools.com/w3css/default.asp" target="_blank"
                  title="W3.CSS">w3.css</a></p></div>

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
