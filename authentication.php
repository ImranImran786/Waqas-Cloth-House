<?php


    require 'config/function.php';



    if(isset($_SESSION['auth']))
    {
        if(isset($_SESSION['loggedInUserRole']))
        {
            $role = Validate($_SESSION['loggedInUserRole']);
            $email = Validate($_SESSION['loggedInUser']['email']);

            $query = "SELECT * FROM adminlogin WHERE username='$email' AND ROLE='$role' LIMIT 1";
            $result = mysqli_query($conn, $query);
            if($result){

                if(mysqli_num_rows($result) == 0){
                    logoutSession();
                    redirect('../login.php', 'Access Denied')
                }
                else{
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if($row['role' != 'amdin'])
                    {

                        if(isset($row['Is_Ban']) && $row['Is_Ban'] == 1) {
                            redirect('../login.php', 'Your account has been banned. Please contact Admin');
                        }
                        
                        logoutSession();
                        redirect('../login.php', 'Access Denied')
                    }
                }

            }else{
                logoutSession();
                redirect('../login.php', 'Something Went Wrong!')
            }
        }
    }
    else{
        redirect('../login.php', 'Login to continue...')
    }
?>