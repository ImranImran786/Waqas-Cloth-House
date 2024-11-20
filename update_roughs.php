<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>786</title>
    <style>
	#btnform {
      width: 12%;
      /* width: 135px; */
      height: 65px;
      margin-top: 10px;
      justify-content: center;
      border-radius: 10px;
      background-color: white;
      border: 2px solid blue;
      opacity: 0.8;
      font-weight: 1000;
      font-size: 11px;
    }
    #btnform:hover {
      color: black;
    }
    #main_btn {
      margin-left: 9%;
    }


    @media (min-width: 1024px) and (max-width: 1240px) {
  #btnform {
      font-size: 8px;
  }
  #main_btn {
    margin-left: 7%;
  }
}



    @media (min-width: 1440px) and (max-width: 1728px) {
  #btnform {
      font-size: 13px;
  }
  #main_btn {
    margin-left: 7%;
  }
}

    @media (min-width: 1550px) and (max-width: 1728px) {
  #btnform {
      font-size: 15px;
  }
  #main_btn {
    margin-left: 7%;
  }
}

    @media (min-width: 1728px) and (max-width: 1920px) {
  #btnform {
      font-size: 17px;
  }
  #main_btn {
    margin-left: 7%;
  }
}

 @media (min-width: 1920px) and (max-width: 2560px) {
  #btnform {
      font-size: 19px;
  }
  #main_btn {
    margin-left: 7%;
  }
}



    #back {
      margin-top: 1%;
      margin-left: 2%;
      width: 80px;
      height: 30px;
      color: black;
      font-size: 15px;
      border: 2px solid blue;
      text-decoration: none;
    }
    #back:hover {
      color: white;
      background-color: rgb(75, 12, 247);
      border-color: black;
    }




    #search{
        margin-top: 0.5%;
        margin-left: 40%;
        width: 18%;
        height: 35px;
        font-size: 20px;
        border: 3px solid black;
        border-radius: 10px;
    }
    #search:hover{
      border: 3px solid blue;
    }
    .container {
      overflow-x: auto;
      /* overflow-y: auto; */
      max-height: 350px;
      overflow-y: auto;
    }
    .table {
      width: 100%; /* Full width table */
      font-size: 25px;
      line-height: 1.7
    }
    .table th,
    .table td {
      white-space: nowrap; /* Prevent line breaks in table cells */
      
    }
    .table td .btn:hover {
      background-color: black;
      opacity: 0.7;
      color: white;
    }
    .form-control {
      width: 200px;
      height: 30px;
      font-size: 15px;
    }
    .form-control:hover {
        font-size: 20px;
      border: 2px solid blue;
    }
    .btn {
      height: 30px;
      border-radius: 10px;
      background-color: white;
      border: 4px solid blue;
      opacity: 0.8;
      font-size: 20px;
      margin-right: 20px;
    }
    </style>
    <script>
        function confirmDelete(order_id) {
            if (confirm("Are you sure you want to delete this order?")) {
                document.getElementById('delete-form-' + order_id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 530px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <div id="main_btn">
    <div>
                <a href="update_cust.php"><button type="button"  id="btnform">update Customer</button></a>
                <a href="update_empl.php"><button type="button" id="btnform">update Employee</button></a>
                <a href="update_stocks.php"><button type="button" id="btnform">update Stock</button></a>
                <a href="update_suppliers.php"><button type="button"  id="btnform">update Supplier</button></a>
                <a href="update_documents.php"><button type="button" id="btnform">update Documents</button></a>
                <a href="update_purchases.php"><button type="button" id="btnform">update Purchases</button></a>
                <a href="update_sale.php"><button type="button" id="btnform">update Sales</button></a>
                <a href="update_roughs.php"><button type="button" style="border: 4px solid red;" id="btnform">update rough</button></a>
            </div>
    </div>
    
    
        <form method="POST" action="">
            <input id='search' type="text" name="search" placeholder="Search by item name">
            <input type="submit" value="Search">
        </form>
    <section id="first_section">
    <div class="container">
        
        <?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "waqas_cloth_house";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if (isset($_POST['delete'])) {
            $employee_id = $_POST['employee_id']; // Correct variable name here
        
            $conn->begin_transaction();
        
            // Fetching the employee data
            $sql = "SELECT * FROM add_employee WHERE employee_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                // Deleting the employee
                $sql = "DELETE FROM add_employee WHERE employee_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $employee_id);
        
                if ($stmt->execute()) {
                    echo "Employee deleted successfully.";
                    // Resetting the auto-increment
                    $sql = "SET @count = 0";
                    $conn->query($sql);
                    $sql = "UPDATE add_employee SET employee_id = @count:= @count + 1";
                    $conn->query($sql);
                    $sql = "ALTER TABLE add_employee AUTO_INCREMENT = 1";
                    $conn->query($sql);
                    $conn->commit();
                } else {
                    echo "Error deleting employee: " . $conn->error;
                    $conn->rollback();
                }
            } else {
                echo "Employee not found.";
                $conn->rollback();
            }
        
            $stmt->close();
        }
          







        // update the data 
        if (isset($_POST['update'])) {
            $employee_id = $_POST['employee_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $emergency_phone_no = $_POST['emergency_phone_no'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $gender = $_POST['gender'];
            $date_of_birth = $_POST['date_of_birth'];
            $cnic_no = $_POST['cnic_no'];
            $date_of_joining = $_POST['date_of_joining'];
            $terminating_date = $_POST['terminating_date'];

            // Handling file uploads
            $upload_picture = $_FILES['upload_picture']['tmp_name'];
            $upload_cnic_picture_front = $_FILES['upload_cnic_picture_front']['tmp_name'];
            $upload_cnic_picture_back = $_FILES['upload_cnic_picture_back']['tmp_name'];

            $sql = "UPDATE add_employee SET 
                    First_Name = ?, 
                    Last_Name = ?, 
                    Address = ?, 
                    Phone_Number = ?, 
                    Emergency_Phone_no = ?, 
                    Email = ?, 
                    Status = ?, 
                    Gender = ?, 
                    Date_of_Birth = ?, 
                    CNIC_no = ?, 
                    Date_of_joining = ?, 
                    Terminating_Date = ?, 
                    Upload_Picture = ?, 
                    Upload_CNIC_Picture_Front = ?, 
                    Upload_CNIC_Picture_Back = ? 
                    WHERE employee_id = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bind_param("sssssssssssssssi", 
                              $first_name, 
                              $last_name, 
                              $address, 
                              $phone_number, 
                              $emergency_phone_no, 
                              $email, 
                              $status, 
                              $gender, 
                              $date_of_birth, 
                              $cnic_no, 
                              $date_of_joining, 
                              $terminating_date, 
                              $upload_picture, 
                              $upload_cnic_picture_front, 
                              $upload_cnic_picture_back, 
                              $employee_id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>
                        Employee updated successfully.
                      </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        Error updating employee: " . $conn->error . "
                      </div>";
            }
            $stmt->close();
        }

        // search function 
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = "%" . $_POST['search'] . "%";
            $sql = "SELECT * FROM add_employee WHERE First_Name LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $search);
        } else {
            $sql = "SELECT * FROM add_employee";
            $stmt = $conn->prepare($sql);
        }


        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <tr>
                        <th>Employee ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Emergency Phone no</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>CNIC no</th>
                            <th>Date of Joining</th>
                            <th>Terminating Date</th>
                            <th>Upload Picture</th>
                            <th>Upload CNIC Picture Front</th>
                            <th>Upload CNIC Picture Back</th>
                            <th>Actions</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["employee_id"]."</td>
		
		<form id='update-form-".$row["employee_id"]."' method='POST' enctype='multipart/form-data'>

                           <td><input type='text' class='form-control' name='first_name' value='".$row["First_Name"]."'></td>
                            <td><input type='text' class='form-control' name='last_name' value='".$row["Last_Name"]."'></td>
                            <td><input type='text' class='form-control' name='address' value='".$row["Address"]."'></td>
                            <td><input type='text' class='form-control' name='phone_number' value='".$row["Phone_Number"]."'></td>
                            <td><input type='text' class='form-control' name='emergency_phone_no' value='".$row["Emergency_Phone_no"]."'></td>
                            <td><input type='email' class='form-control' name='email' value='".$row["Email"]."'></td>
                            <td>
                                <select class='form-control' name='status'>
                                    <option value='active' ".($row["Status"] == "active" ? "selected" : "").">Active</option>
                                    <option value='inactive' ".($row["Status"] == "inactive" ? "selected" : "").">Inactive</option>
                                </select>
                            </td>
                            <td>
                                <select class='form-control' name='gender'>
                                    <option value='male' ".($row["Gender"] == "male" ? "selected" : "").">Male</option>
                                    <option value='female' ".($row["Gender"] == "female" ? "selected" : "").">Female</option>
                                    <option value='other' ".($row["Gender"] == "other" ? "selected" : "").">Other</option>
                                </select>
                            </td>
                            <td><input type='date' class='form-control' name='date_of_birth' value='".$row["Date_of_Birth"]."'></td>
                            <td><input type='text' class='form-control' name='cnic_no' value='".$row["CNIC_no"]."'></td>
                            <td><input type='date' class='form-control' name='date_of_joining' value='".$row["Date_of_joining"]."'></td>
                            <td><input type='date' class='form-control' name='terminating_date' value='".$row["Terminating_Date"]."'></td>
                            <td><input type='file' class='form-control' name='upload_picture'></td>
                            <td><input type='file' class='form-control' name='upload_cnic_picture_front'></td>
                            <td><input type='file' class='form-control' name='upload_cnic_picture_back'></td>
                            <td>
                                <input type='hidden' name='employee_id' value='".$row["employee_id"]."'>
                                <button type='submit' name='update' class='btn btn-primary btn-sm'>Update</button>
                                <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                            </td>
                        </form>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found.";
        }

        $stmt->close();
        ?>
    </div>
</section>
    <button id="back"><a href="admin_dashboard.html">Back</a></button>
</div>
</body>
</html>
