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

if(isset($_POST['Student_Id'])){


    $Student_Id=$_POST['Student_Id'];

    $sql1="select * from Student_details where Student_Id='$Student_Id'";
    $result1=mysqli_query($con,$sql1);
    $rows1=mysqli_fetch_assoc($result1);


    $sql2="select Book_Title from Book_Details , Borrower_Details where ((Borrower_Id='$Student_Id') AND (Book_Details.ISBN_Code = Borrower_Details.ISBN_Code ) )";
    $result2=mysqli_query($con,$sql2);
    $rows2=mysqli_fetch_assoc($result2);


}
?>

<!DOCTYPE html>
<html lang="en">
<title>Student Record</title>
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
        <a class="w3-bar-item w3-button w3-hover-white" href="AdminLogin.html" onclick="w3_close()">Administrator Home</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Student_Reg.php" onclick="w3_close()">New Student Registration</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Entry.php" onclick="w3_close()">New Book Entry</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Student_Record.php" onclick="w3_close()">Student Record</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Record.php" onclick="w3_close()">Book Record</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Issue.php" onclick="w3_close()">Book Issue</a>
        <a class="w3-bar-item w3-button w3-hover-white" href="Book_Deposit.php" onclick="w3_close()">Book Deposit</a>
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
        <h1 class="w3-jumbo"><b>Student Record</b></h1>
    </div>

    <div class="w3-container" id="Forum" style="margin-top:75px">


        <form action="Student_Record.php" METHOD="post">
            <div class="w3-section">
                <label>Student ID</label>
                <input class="w3-input w3-border" type="text" name="Student_Id" required>
            </div>
            <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Submit</button>
        </form>
        <br>
        <br>
        <br>
        <div class="w3">
            <ul class="w3-ul w3-light-grey w3-center">
                <li class="w3-red w3-xlarge w3-padding-32">Student Details </li>
                <li class="w3-padding-16">Student ID :- <?php echo $rows1['Student_Id'] ?> </li>
                <li class="w3-padding-16">Student Name:- <?php echo $rows1['Student_Name'] ?></li>
                <li class="w3-padding-16">Date of Birth:- <?php echo $rows1['Date_Of_Birth'] ?></li>
                <li class="w3-padding-16">Department :- <?php echo $rows1['Department'] ?></li>
                <li class="w3-padding-16">Contact_Number :- <?php echo $rows1['contact_Number'] ?></li>
                <li class="w3-padding-16">Book Issued  :- <?php echo $rows2['Book_Title'] ?></li>
            </ul>
        </div>
    </div>






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
