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
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this order?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 530px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <div id="main_btn">
        <div>
            <a href="update_cust.php"><button type="button" id="btnform">update Customer</button></a>
            <a href="update_empl.php"><button type="button" style="border: 4px solid red;" id="btnform">update Employee</button></a>
            <a href="update_stocks.php"><button type="button" id="btnform">update Stock</button></a>
            <a href="update_suppliers.php"><button type="button" id="btnform">update Supplier</button></a>
            <a href="update_documents.php"><button type="button" id="btnform">update Documents</button></a>
            <a href="update_purchases.php"><button type="button" id="btnform">update Purchases</button></a>
            <a href="update_sale.php"><button type="button" id="btnform">update Sales</button></a>
            <a href="update_roughs.php"><button type="button" id="btnform">update rough</button></a>
        </div>
    </div>
    
<form method="POST" action="">
        <input id='search' type="text" name="search" placeholder="Search by item name">
        <input type="submit" value="Search">
    </form>
    <section id="second_section">
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
            
            // Handle Delete
            if (isset($_POST['delete'])) {
                $id = $_POST['id']; // Make sure this is the correct key

                $conn->begin_transaction();

                // Fetching the employee data
                $sql = "SELECT * FROM employee_salary_history WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Deleting the employee
                    $sql = "DELETE FROM employee_salary_history WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);

                    if ($stmt->execute()) {

                        echo "Employee deleted successfully.";
                        // Resetting the auto-increment
                        $sql = "SET @count = 0";
                        $conn->query($sql);
                        $sql = "UPDATE employee_salary_history SET id = @count:= @count + 1";
                        $conn->query($sql);
                        $sql = "ALTER TABLE employee_salary_history AUTO_INCREMENT = 1";
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

            // Handle Update
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $Employee_Name = $_POST['Employee_Name'];
                $Last_Name = $_POST['Last_Name'];
                $Salary = $_POST['Salary'];
                $Advanced_Salary = $_POST['Advanced_Salary'];
                $Advanced_Salary_Date = $_POST['Advanced_Salary_Date'];
                $Ramaining_Salary = $_POST['Ramaining_Salary'];
                $Ramaining_Salary_Date = $_POST['Ramaining_Salary_Date'];
                $Description = $_POST['Description'];
                
                $sql = "UPDATE employee_salary_history SET 
                        Employee_Name = ?, 
                        Last_Name = ?, 
                        Salary = ?, 
                        Advanced_Salary = ?, 
                        Advanced_Salary_Date = ?, 
                        Ramaining_Salary = ?, 
                        Ramaining_Salary_Date = ?, 
                        Description = ? 
                        WHERE id = ?";
                $stmt = $conn->prepare($sql);
                
                $stmt->bind_param("ssssssssi", 
                                  $Employee_Name, 
                                  $Last_Name, 
                                  $Salary, 
                                  $Advanced_Salary, 
                                  $Advanced_Salary_Date, 
                                  $Ramaining_Salary, 
                                  $Ramaining_Salary_Date, 
                                  $Description,
                                  $id);

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

            // Search Function
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $search = "%" . $_POST['search'] . "%";
                $sql = "SELECT * FROM employee_salary_history WHERE Employee_Name LIKE ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $search);
            } else {
                $sql = "SELECT * FROM employee_salary_history";
                $stmt = $conn->prepare($sql);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <tr>
                              <th>ID</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Salary</th>
                              <th>Advanced Salary</th>
                              <th>Advanced Salary Date</th>
                              <th>Ramaining Salary</th>
                              <th>Ramaining Salary Date</th>
                              <th>Description</th>
                              <th>Actions</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <form id='update-form-".$row["id"]."' method='POST' enctype='multipart/form-data'>
                               <td><input type='text' class='form-control' name='Employee_Name' value='".$row["Employee_Name"]."'></td>
                                <td><input type='text' class='form-control' name='Last_Name' value='".$row["Last_Name"]."'></td>
                                <td><input type='text' class='form-control' name='Salary' value='".$row["Salary"]."'></td>
                                <td><input type='text' class='form-control' name='Advanced_Salary' value='".$row["Advanced_Salary"]."'></td>
                                <td><input type='date' class='form-control' name='Advanced_Salary_Date' value='".$row["Advanced_Salary_Date"]."'></td>
                                <td><input type='text' class='form-control' name='Ramaining_Salary' value='".$row["Ramaining_Salary"]."'></td>
                                <td><input type='date' class='form-control' name='Ramaining_Salary_Date' value='".$row["Ramaining_Salary_Date"]."'></td>
                                <td><input type='text' class='form-control' name='Description' value='".$row["Description"]."'></td>
                                <td>
                                    <input type='hidden' name='id' value='".$row["id"]."'>
                                    <button type='submit' name='update' class='btn btn-primary btn-sm'>Update</button>
                                    <button type='submit' onclick='confirmDelete(".$row["id"].")' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                                </td>
                            </form>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No results found.";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </section>


    <button id="back"><a href="admin_dashboard.html">Back</a></button>
    <a href="update_empl.php"><button type="button" id="btnform">Employee data</button></a>
</div>
</body>
</html>
