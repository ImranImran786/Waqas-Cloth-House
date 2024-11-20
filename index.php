<?php
session_start();
	// include("functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Document</title>

  <style>

    #btnform {
      width: 190px;
      height: 60px;
      margin-top: 10px;
      justify-content: center;
      border-radius: 10px;
      background-color:white;
      border: 2px solid blue;
      /* opacity: 0.6; */
      font-weight:1000;
      box-shadow: 5px 5px 5px blue;
    }

    #btnform:hover {
      color: black;
      border: 2px solid black;
      box-shadow: 5px 5px 5px black;
    }

    #main_btn{
        margin-left: 47%;
        padding-top: 15%;
    }

  </style>

</head>

<body>

    <!-- BOOK NOW Form start -->
    <div id="form-image" style="background-image: url('images/1.jpg'); height: 552px; background-repeat: no-repeat; background-size: cover; margin: 8px;">
 
        <div id="main_btn">
            <div>
                <button type="button" id="btnform"><a href="login.php">Admin</a></button>
                <!-- <button type="button" id="btnform"><a href="Admin.html">Admin</a></button> -->
            </div>
            <div>
                <button type="button" id="btnform"><a href="login.php">Manager</a></button>
            </div>
            <div>
                <button type="button" id="btnform"><a href="login.php">Staff</a></button>
            </div>
            <div>
                <button type="button" id="btnform"><a href="Qrcode.php">QR Code</a></button>
            </div>
        </div>
  

</body>

</html>
