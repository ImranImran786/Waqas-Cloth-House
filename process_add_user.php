<?php 
require 'dbcon.php';
require 'users-edit.php';
session_start(); // Ensure session is started for status messages

// Function to validate and sanitize input data


// Function to redirect with a status message
function redirect($url, $status){
    $_SESSION['status'] = $status;
    header("Location: $url"); 
    exit(0);
}

if (isset($_POST['saveUser'])) {
    // Validate input fields
    $name = validate($_POST['name']);
    $fathername = validate($_POST['fathername']);
    $cnic = validate($_POST['cnic']);
    $email = validate($_POST['email']);
    $emailpassword = validate($_POST['emailpassword']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    
    // Handle is-ban checkbox (default to 0 if not set)
    $is_ban = isset($_POST['is-ban']) ? 1 : 0;

    // Ensure all required fields are filled
    if ($name != '' && $fathername != '' && $cnic != '' && $email != '' && $emailpassword != '' && $username != '' && $password != '') {

        // Hash the password before storing it
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Use prepared statements to avoid SQL injection
        $query = "INSERT INTO adminlogin (name, fathername, CNIC, email, emailpassword, username, password, ROLE, Is_Ban) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Bind parameters (s = string, i = integer)
        mysqli_stmt_bind_param($stmt, "ssisssssi", $name, $fathername, $cnic, $email, $emailpassword, $username, $password, $role, $is_ban);

        // Execute the query and check the result
        if (mysqli_stmt_execute($stmt)) {
            redirect('users-create.php', 'User/Admin Added Successfully');
        } else {
            redirect('users-create.php', 'Something went wrong');
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}







// update code  start -------------------------
if (isset($_POST['updateUser'])) {
    // Validate input fields
    $name = validate($_POST['name']);
    $fathername = validate($_POST['fathername']);
    $cnic = validate($_POST['cnic']);
    $email = validate($_POST['email']);
    $emailpassword = validate($_POST['emailpassword']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    

    $userId = validate($_POST['userId']);
    $user = getById('users', $userId);
    if($user['status'] != 200){
        redirect('users-edit.php?id='.$userId, 'No Such id found');
    }




    // Handle is-ban checkbox (default to 0 if not set)
    $is_ban = isset($_POST['is-ban']) ? 1 : 0;

    // Ensure all required fields are filled
    if ($name != '' && $fathername != '' && $cnic != '' && $email != '' && $emailpassword != '' && $username != '' && $password != '') {

        // Hash the password before storing it
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Use prepared statements to avoid SQL injection
        $query = "UPDATE adminlogin SET name='$name', fathername='$fathername', CNIC='$cnic', email='$email', emailpassword='$emailpassword', username='$username', password='$password', ROLE='$role', Is_Ban='$is_ban' where id='$userId' ";

        $stmt = mysqli_prepare($conn, $query);


        // Execute the query and check the result
        if (mysqli_stmt_execute($stmt)) {
            redirect('users-create.php', 'User/Admin Updated Successfully');
        } else {
            redirect('users-create.php', 'Something went wrong');
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        redirect('users-create.php', 'Please fill all the input fields');
    }
}
?>
