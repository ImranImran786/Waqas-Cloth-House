<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    <style>
	/* #btnform {
      width: 12%;
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
        margin-top: 30px
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
        function confirmDelete(supplier_id) {
            if (confirm("Are you sure you want to delete this supplier?")) {
                document.getElementById('delete-form-' + supplier_id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 510px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <!-- <div id="main_btn">
    <div>
                <a href="update_cust.php"><button type="button"  id="btnform">update Customer</button></a>
                <a href="update_empl.php"><button type="button" id="btnform">update Employee</button></a>
                <a href="update_stocks.php"><button type="button" id="btnform">update Stock</button></a>
                <a href="update_suppliers.php"><button type="button" style="border: 4px solid red;" id="btnform">update Supplier</button></a>
                <a href="update_documents.php"><button type="button" id="btnform">update Documents</button></a>
                <a href="update_purchases.php"><button type="button" id="btnform">update Purchases</button></a>
                <a href="update_sale.php"><button type="button" id="btnform">update Sales</button></a>
                <a href="update_roughs.php"><button type="button" id="btnform">update rough</button></a>
            </div>
    </div> -->
    
    <form method="POST" action="">
        <input id='search' type="text" name="search" placeholder="Search by Delivery Boy Name">
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
            
            // Delete supplier
            // if (isset($_POST['delete'])) {
            //     $supplier_id = $_POST['supplier_id'];
        
            //     $conn->begin_transaction();
        
            //     // Deleting the supplier
            //     $sql = "DELETE FROM add_supplier WHERE supplier_id = ?";
            //     $stmt = $conn->prepare($sql);
            //     $stmt->bind_param("i", $supplier_id);
        
            //     if ($stmt->execute()) {
            //         echo "Supplier deleted successfully.";
            //         $conn->commit();
            //     } else {
            //         echo "Error deleting supplier: " . $conn->error;
            //         $conn->rollback();
            //     }
        
            //     $stmt->close();
            // }





            if (isset($_POST['delete'])) {
              $supplier_id = $_POST['supplier_id']; // Correct variable name here
          
              $conn->begin_transaction();
          
              // Fetching the employee data
              $sql = "SELECT * FROM add_supplier WHERE supplier_id = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("i", $supplier_id);
              $stmt->execute();
              $result = $stmt->get_result();
          
              if ($result->num_rows > 0) {
                  // Deleting the employee
                  $sql = "DELETE FROM add_supplier WHERE supplier_id = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("i", $supplier_id);
          
                  if ($stmt->execute()) {
                      echo "Employee deleted successfully.";
                      // Resetting the auto-increment
                      $sql = "SET @count = 0";
                      $conn->query($sql);
                      $sql = "UPDATE add_supplier SET supplier_id = @count:= @count + 1";
                      $conn->query($sql);
                      $sql = "ALTER TABLE add_supplier AUTO_INCREMENT = 1";
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










            
            // Update supplier data
            if (isset($_POST['update'])) {
                $supplier_id = $_POST['supplier_id'];
                $delivery_boy_name = $_POST['delivery_boy_name'];
                $customer_address = $_POST['customer_address'];
                $bill_id = $_POST['bill_id'];
                $ship_id = $_POST['ship_id'];
                $shipping_cost = $_POST['shipping_cost'];
                $date_of_shipment = $_POST['date_of_shipment'];
                $mode_of_travel = $_POST['mode_of_travel'];
        
                $sql = "UPDATE add_supplier SET 
                        Delivery_Boy_Name = ?, 
                        Customer_Address = ?, 
                        Bill_ID = ?, 
                        Ship_ID = ?, 
                        Shipping_Cost = ?, 
                        Date_of_Shipment = ?, 
                        Mode_of_Travel = ? 
                        WHERE supplier_id = ?";
                $stmt = $conn->prepare($sql);
                
                $stmt->bind_param("sssssssi", 
                                  $delivery_boy_name, 
                                  $customer_address, 
                                  $bill_id, 
                                  $ship_id, 
                                  $shipping_cost, 
                                  $date_of_shipment, 
                                  $mode_of_travel, 
                                  $supplier_id);
        
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success' role='alert'>
                            Supplier updated successfully.
                          </div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Error updating supplier: " . $conn->error . "
                          </div>";
                }
                $stmt->close();
            }
            
            // Search functionality
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $search = "%" . $_POST['search'] . "%";
                $sql = "SELECT * FROM add_supplier WHERE Delivery_Boy_Name LIKE ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $search);
            } else {
                $sql = "SELECT * FROM add_supplier";
                $stmt = $conn->prepare($sql);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <tr>
                            <th>Supplier ID</th>
                            <th>Delivery Boy Name</th>
                            <th>Customer Address</th>
                            <th>Bill ID</th>
                            <th>Ship ID</th>
                            <th>Shipping Cost</th>
                            <th>Date of Shipment</th>
                            <th>Mode of Travel</th>
                            <th>Actions</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["supplier_id"]."</td>
                            <form id='update-form-".$row["supplier_id"]."' method='POST'>
                                <td><input type='text' class='form-control' name='delivery_boy_name' value='".$row["Delivery_Boy_Name"]."'></td>
                                <td><input type='text' class='form-control' name='customer_address' value='".$row["Customer_Address"]."'></td>
                                <td><input type='text' class='form-control' name='bill_id' value='".$row["Bill_ID"]."'></td>
                                <td><input type='text' class='form-control' name='ship_id' value='".$row["Ship_ID"]."'></td>
                                <td><input type='text' class='form-control' name='shipping_cost' value='".$row["Shipping_Cost"]."'></td>
                                <td><input type='date' class='form-control' name='date_of_shipment' value='".$row["Date_of_Shipment"]."'></td>
                                <td><input type='text' class='form-control' name='mode_of_travel' value='".$row["Mode_of_Travel"]."'></td>
                                <td>
                                    <input type='hidden' name='supplier_id' value='".$row["supplier_id"]."'>
                                    <button type='submit' name='update' class='btn btn-primary btn-sm'>Update</button>
                                    <button type='submit' name='delete' class='btn btn-danger btn-sm' onclick='confirmDelete(".$row["supplier_id"]."); return false;'>Delete</button>
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
    <!-- <button id="back"><a href="admin_dashboard.html">Back</a></button> -->
</div>
</body>
</html>
