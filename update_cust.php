<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <style>
	/* #btnform {
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
    } */


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



    /* #back {
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
    } */




    #search{
        margin-top: 30px;
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
      background-color: rgb(197, 194, 194);
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
        function confirmDelete(customer_id) {
            if (confirm("Are you sure you want to delete this customer?")) {
                document.getElementById('delete-form-' + customer_id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 510px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <!-- <div id="main_btn">
        <div>
            <a href="update_customr.php"><button type="button" style="border: 4px solid red;" id="btnform">Update Customer</button></a>
            <a href="update_empl.php"><button type="button" id="btnform">Update Employee</button></a>
            <a href="update_stocks.php"><button type="button" id="btnform">Update Stock</button></a>
            <a href="update_suppliers.php"><button type="button" id="btnform">Update Supplier</button></a>
            <a href="update_documents.php"><button type="button" id="btnform">Update Documents</button></a>
            <a href="update_purchases.php"><button type="button" id="btnform">Update Purchases</button></a>
            <a href="update_sale.php"><button type="button" id="btnform">Update Sales</button></a>
            <a href="update_roughs.php"><button type="button" id="btnform">Update Rough</button></a>
        </div>
    </div> -->
    
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
              $customer_id = $_POST['customer_id']; 
          
              // Start a transaction
              $conn->begin_transaction();
          
              try {
                  // Delete related orders first
                  $sql = "DELETE FROM orders WHERE customer_id = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("i", $customer_id);
                  $stmt->execute();
                  $stmt->close();
          
                  // Now delete the customer
                  $sqll = "DELETE FROM add_customer WHERE customer_id = ?";
                  $stmt = $conn->prepare($sqll);
                  $stmt->bind_param("i", $customer_id);
                  $stmt->execute();
                  $stmt->close();

                  // Reset auto increment values for add_customer
                  $sqll = "ALTER TABLE add_customer AUTO_INCREMENT = 1";
                  $conn->query($sqll);
          
                  // Reset auto increment values for orders
                  $sqll = "ALTER TABLE orders AUTO_INCREMENT = 1";
                  $conn->query($sqll);
          
                  // Commit the transaction
                  $conn->commit();
                  echo "Customer and related orders deleted successfully.";
              } catch (Exception $e) {
                  // Rollback the transaction if any error occurs
                  $conn->rollback();
                  echo "Error deleting customer: " . $e->getMessage();
              }
          }
          



            
            if (isset($_POST['update'])) {
                if (isset($_POST['update_cust'])) {
                    $customer_id = $_POST['customer_id'];
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $serving_employee = $_POST['serving_employee'];
                    $bank = $_POST['bank'];
                    $transaction_id = $_POST['transaction_id'];

                    $sql = "UPDATE add_customer SET 
                        first_name=?, 
                        last_name=?, 
                        address=?, 
                        city=?, 
                        phone=?, 
                        email=?, 
                        serving_employee=?, 
                        bank=?, 
                        transaction_id=? 
                        WHERE customer_id=?";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssssssssi", 
                        $first_name, 
                        $last_name, 
                        $address, 
                        $city, 
                        $phone, 
                        $email, 
                        $serving_employee, 
                        $bank, 
                        $transaction_id, 
                        $customer_id);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success mt-3'>Customer updated successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error updating customer: " . $stmt->error . "</div>";
                    }
                    $stmt->close();
                }
            }

            // search function 
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $search = "%" . $_POST['search'] . "%";
                $sql = "SELECT * FROM add_customer WHERE first_name LIKE ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $search);
            } else {
                $sql = "SELECT * FROM add_customer";
                $stmt = $conn->prepare($sql);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Serving Employee</th>
                            <th>Bank</th>
                            <th>Transaction ID</th>
                            <th>Actions</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["customer_id"]."</td>
                            <form id='update-form-".$row["customer_id"]."' method='POST' enctype='multipart/form-data'>
                                <td><input type='text' class='form-control' name='first_name' value='{$row['first_name']}'></td>
                                <td><input type='text' class='form-control' name='last_name' value='{$row['last_name']}'></td>
                                <td><input type='text' class='form-control' name='address' value='{$row['address']}'></td>
                                <td><input type='text' class='form-control' name='city' value='{$row['city']}'></td>
                                <td><input type='text' class='form-control' name='phone' value='{$row['phone']}'></td>
                                <td><input type='text' class='form-control' name='email' value='{$row['email']}'></td>
                                <td><input type='text' class='form-control' name='serving_employee' value='{$row['serving_employee']}'></td>
                                <td><input type='text' class='form-control' name='bank' value='{$row['bank']}'></td>
                                <td><input type='text' class='form-control' name='transaction_id' value='{$row['transaction_id']}'></td>
                                <td>
                                    <input type='hidden' name='customer_id' value='".$row["customer_id"]."'>
                                    <button type='submit' name='update' class='btn btn-primary btn-sm'>Update</button>
                                    <button type='submit' name='delete' class='btn btn-danger btn-sm' onclick='confirmDelete(".$row["customer_id"].")'>Delete</button>
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
    <!-- <button id="back"><a href="admin_dashboard.html">Back</a></button> -->
</div>
</body>
</html>
