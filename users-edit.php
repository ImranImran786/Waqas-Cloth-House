<?php

require 'dbcon.php';


function checkParamsId($paramType){
    if(isset($_GET[$paramType]))
    {
        if($_GET[$paramType] != null){
            return $_GET[$paramType];
        }
        else{
            return 'no id found';
        }
    }
    else{
        return 'No id given';
    }
}





function alertMessage(){
    if(isset($_SESSION['status']))
    {
        echo '<div class="alert alert-success">
            <h6>'.$_SESSION['status'].'</h6>
        </div>';
        unset($_SESSION['status']);
    }
}





// function validate($inputData){
//     global $conn;
//     return mysqli_real_escape_string($conn, trim($inputData));
// }

function validate($inputData){
    global $conn;
     $validatedData = mysqli_real_escape_string($conn, trim($inputData));
     return trim($validatedData);
}


function getById($tableName , $id ){
    global $conn;

    $table = validate ($tableName);
    $id = validate($id);

    $query = "SELECT * from adminlogin where id = '$id' Limit 1";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'Fected data',
                'data' => $row
            ];
            return $response;
        }
        else{
            $response = [
                'status' => 404,
                'message' => 'No data Record'
            ];
            return $response;
        }
    }   
    else{
        $response = [
            'status' => 500,
            'message' => 'something Went Wrong'
        ];
        return $response;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Update User
                        <a href="users.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                        <?= alertMessage(); ?>

                    <form action="process_add_user.php" method='POST'>

                        <?php
                            $paramsResult = checkParamsId('id');
                            if(!is_numeric($paramsResult)){
                                echo '<h5>'.$paramsResult.'</h5>';
                                return false;
                            }

                            $user = getById('users' , checkParamsId('id'));
                            if($user['status'] == 200)
                            {
                                ?>

                                
                                <input type="hidden" name="userId" value="<?= $user['data']['id'] ;?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $user['data']['name'] ;?>" required class="form-control">
                                        </div>
                                    </div>
                                <div class="col-md-3">
                                      <div class="mb-3">
                                        <label for="fathername">Father Name</label>
                                        <input type="text" name="fathername" value="<?= $user['data']['fathername'] ;?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="cnic">CNIC</label>
                                        <input type="number" name="cnic" value="<?= $user['data']['CNIC'] ;?>" required class="form-control">
                                    </div>
                                </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?= $user['data']['email'] ;?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="emailpassword">Email Password</label>
                                    <input type="text" name="emailpassword" value="<?= $user['data']['emailpassword'] ;?>" required class="form-control">
                                </div>  
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?= $user['data']['username'] ;?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?= $user['data']['password'] ;?>" required class="form-control">
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">Select Role</label>
                                        <select name="role" required class="form-select">
                                            <option value="">Select Role</option>
                                            <option value="Admin" <?= $user['data']['ROLE'] == 'Admin' ? 'selected' : '' ;?>>Admin</option>
                                            <option value="manager" <?= $user['data']['ROLE'] == 'manager' ? 'selected' : '' ;?>>manager</option>
                                            <option value="staff" <?= $user['data']['ROLE'] == 'staff' ? 'selected' : '' ;?>>staff</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="">IS Ban</label>
                                    <br/>
                                    <input type="checkbox" name="is-ban" <?= $user['data']['Is_Ban'] == true ? 'checked' : '' ;?> style="width:30px; height:30px;"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                                <?php
                            }
                            else
                            {
                                echo '<h5>'.$user['message'].'</h5>';
                            }
                        ?>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>