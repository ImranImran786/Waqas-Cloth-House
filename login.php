<?php
    $pagetitle = "Login"
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<style>
    #backdiv{
        width: 55%;
        float: left;
        height: 60px;
        /* border: 5px solid black; */
    }
    #backdiv #back {
      width: 50%;
      height: 45px;
      color: black;
      background-color: white;
      margin-top: 3px;
      margin-left: 65%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
    }
    #backdiv #back:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }

    
    #backbtns{
        width: 50%;
        float: left;
        height: 60px;
        /* border: 5px solid black; */
    }
    #backbtns #btn {
      width: 45%;
      height: 50px;
      color: black;
      background-color: white;
      margin-top: 5px;
      margin-left: 10%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
    }
    #backbtns #btn:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }
</style>
<body>
    <div class="py-5" id="form-image" style="background-image: url('images/1.jpg'); height: 552px; background-repeat: no-repeat; background-size: cover; margin: 8px;">
    <div id="main_btn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form action="login_code.php" method="POST">
                                <div class="mb-3">
                                    <label for="username">username</label>
                                    <input type="text" name="username" class="form-control" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="loginbtn" class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                        </div> 
                            <div id="backdiv">
                                <button id="back"><a href="index.php">Back</a></button>
                            </div>
                            <h2 style="text-align:center; font-size:15px;">
                                <a href="forgetadminlogin.php">Forgot Your Password?</a>
                            </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>