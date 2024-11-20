<?php

    require 'function.php';


    $paraResult = checkParamsId('id');
    if(is_numeric($paraResult)){
        $userId = validate($paraResult);
        
        $user = getById('users', $userId);
        if($user['status'] == 200){
            $userDeleteRes = deleteQuery('adminlogin', $userId);
            if($userDeleteRes){
                redirect('users.php', 'User Deleted Successfully');
            }
            else{
                redirect('users.php', 'Something Went Wrong');
            }
        }
        else{
            redirect('users.php', $user['message']);
        }
    }
    else{
        redirect('users.php', $paraResult);
    }

?>