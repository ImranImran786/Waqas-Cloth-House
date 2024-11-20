<?php

    session_start(); // Start the session

    $db_host = 'localhost';
    $db_user = 'username'; // replace with your database username
    $db_pass = 'password'; // replace with your database password
    $db_name = 'waqas_cloth_house'; // your database name

    // Create connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Redirect function
    function redirect($url, $message) {
        echo "<script>alert('$message'); window.location.href='$url';</script>";
        exit();
    }

    // Validate function
    function validate($data) {
        $data = trim($data); // Removes spaces
        $data = stripslashes($data); // Removes backslashes
        $data = htmlspecialchars($data); // Converts special characters to HTML entities
        return $data;
    }

    // Check if login button is clicked
    if(isset($_POST['loginbtn'])) {
        $usernameinput = validate($_POST['username']);
        $passwordinput = validate($_POST['password']);

        $email = filter_var($usernameinput, FILTER_SANITIZE_EMAIL);
        $password = filter_var($passwordinput, FILTER_SANITIZE_STRING);

        // Proceed if email and password are not empty
        if($email != '' && $password !='') {
            // Query to fetch user details
            $query = "SELECT * FROM adminlogin WHERE username='$email' AND password='$password' LIMIT 1";
            $result = mysqli_query($conn, $query);

            if($result) {
                // Check if a user record exists
                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                 
                    // Check if the user is an admin
                    if(isset($row['ROLE']) && strtolower($row['ROLE']) === 'admin') {
                        // Check if the account is banned
                        if(isset($row['Is_Ban']) && $row['Is_Ban'] == 1) {
                            redirect('login.php', 'Your account has been banned. Please contact Admin');
                        }

                        // Set session for logged-in user
                        $_SESSION['auth'] = true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUser'] = [
                            'name' => $row['name'],
                            'email' => $row['email']
                        ];

                        redirect('admin_dashboard.html', 'Logged In Successfully');
                    }

                    if(isset($row['ROLE']) && strtolower($row['ROLE']) === 'manager') {
                        // Check if the account is banned
                        if(isset($row['Is_Ban']) && $row['Is_Ban'] == 1) {
                            redirect('login.php', 'Your account has been banned. Please contact Admin');
                        }

                        // Set session for logged-in user
                        $_SESSION['auth'] = true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUser'] = [
                            'name' => $row['name'],
                            'email' => $row['email']
                        ];

                        redirect('manager_dashboard.html', 'Logged In Successfully');
                    } 

                    if(isset($row['ROLE']) && strtolower($row['ROLE']) === 'staff') {
                        // Check if the account is banned
                        if(isset($row['Is_Ban']) && $row['Is_Ban'] == 1) {
                            redirect('login.php', 'Your account has been banned. Please contact Admin');
                        }

                        // Set session for logged-in user
                        $_SESSION['auth'] = true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUser'] = [
                            'name' => $row['name'],
                            'email' => $row['email']
                        ];

                        redirect('staff_dashboard.html', 'Logged In Successfully');
                    } 

                } else {
                    redirect('login.php', 'Invalid Email and Password');
                }
            } else {
                redirect('login.php', 'Something went wrong');
            }
        } else {
            redirect('login.php', 'All fields are mandatory');
        }
    }
?>
