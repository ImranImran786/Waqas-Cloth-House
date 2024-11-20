<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Management</title>
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
        function confirmDelete(purchase_id) {
            if (confirm("Are you sure you want to delete this purchase?")) {
                document.getElementById('delete-form-' + purchase_id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 510px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <!-- <div id="main_btn">
        <div>
            <a href="update_cust.php"><button type="button"  id="btnform">Update Customer</button></a>
            <a href="update_empl.php"><button type="button" id="btnform">Update Employee</button></a>
            <a href="update_stocks.php"><button type="button" id="btnform">Update Stock</button></a>
            <a href="update_suppliers.php"><button type="button" id="btnform">Update Supplier</button></a>
            <a href="update_documents.php"><button type="button" id="btnform">Update Documents</button></a>
            <a href="update_purchases.php"><button type="button" style="border: 4px solid red;" id="btnform">Update Purchases</button></a>
            <a href="update_sale.php"><button type="button" id="btnform">Update Sales</button></a>
            <a href="update_roughs.php"><button type="button" id="btnform">Update Rough</button></a>
        </div>
    </div> -->
    
    <form method="POST" action="">
        <input id='search' type="text" name="search" placeholder="Search by Party Name">
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
            $purchase_id = $_POST['purchase_id']; // Correct variable name here
        
            $conn->begin_transaction();
        
            // Fetching the purchase data
            $sql = "SELECT * FROM add_purchases WHERE Purchases_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $purchase_id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                // Deleting the purchase
                $sql = "DELETE FROM add_purchases WHERE Purchases_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $purchase_id);
        
                if ($stmt->execute()) {
                    echo "Purchase deleted successfully.";
                    // Resetting the auto-increment
                    $sql = "SET @count = 0";
                    $conn->query($sql);
                    $sql = "UPDATE add_purchases SET Purchases_id = @count:= @count + 1";
                    $conn->query($sql);
                    $sql = "ALTER TABLE add_purchases AUTO_INCREMENT = 1";
                    $conn->query($sql);
                    $conn->commit();
                } else {
                    echo "Error deleting purchase: " . $conn->error;
                    $conn->rollback();
                }
            } else {
                echo "Purchase not found.";
                $conn->rollback();
            }
        
            $stmt->close();
        }
        
        // update the data 
        if (isset($_POST['update'])) {
            $purchase_id = $_POST['purchase_id'];
            $party_name = $_POST['party_name'];
            $purchase_date = $_POST['purchase_date'];
            $receiving_date = $_POST['receiving_date'];
            $contact = $_POST['contact'];
            $total_bill = $_POST['total_bill'];
            $paid_bill = $_POST['paid_bill'];
            $pending_dues = $_POST['pending_dues'];
            $previous_total_bill = $_POST['previous_total_bill'];
            $total_remaining_bill = $_POST['total_remaining_bill'];
            $payment = $_POST['payment'];
            $bill_no = $_POST['bill_no'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $image = $_FILES['image']['name']; // Handle file upload separately

            // Handle file upload
            $upload_dir = 'uploads/';
            if (!empty($_FILES['image']['name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $_FILES['image']['name']);
            }

            $sql = "UPDATE add_purchases SET 
                    Party_Name = ?, 
                    Purchase_Date = ?, 
                    Receiving_Date = ?, 
                    Contact = ?, 
                    Total_Bill = ?, 
                    Paid_Bill = ?, 
                    Pending_Dues = ?, 
                    Previous_Total_Bill = ?, 
                    Total_Remaining_Bill = ?, 
                    Payment = ?, 
                    Bill_no = ?, 
                    Address = ?, 
                    City = ?, 
                    Image = ? 
                    WHERE Purchases_id = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bind_param("ssssddddddddssi", 
                              $party_name, 
                              $purchase_date, 
                              $receiving_date, 
                              $contact, 
                              $total_bill, 
                              $paid_bill, 
                              $pending_dues, 
                              $previous_total_bill, 
                              $total_remaining_bill, 
                              $payment, 
                              $bill_no, 
                              $address, 
                              $city, 
                              $image, 
                              $purchase_id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>
                        Purchase updated successfully.
                      </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        Error updating purchase: " . $conn->error . "
                      </div>";
            }
            $stmt->close();
        }

        // search function 
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = "%" . $_POST['search'] . "%";
            $sql = "SELECT * FROM add_purchases WHERE Party_Name LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $search);
        } else {
            $sql = "SELECT * FROM add_purchases";
            $stmt = $conn->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <tr>
                        <th>Purchase ID</th>
                        <th>Party Name</th>
                        <th>Purchase Date</th>
                        <th>Receiving Date</th>
                        <th>Contact</th>
                        <th>Total Bill</th>
                        <th>Paid Bill</th>
                        <th>Pending Dues</th>
                        <th>Previous Total Bill</th>
                        <th>Total Remaining Bill</th>
                        <th>Payment</th>
                        <th>Bill No</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["Purchases_id"]."</td>
		
		<form id='update-form-".$row["Purchases_id"]."' method='POST' enctype='multipart/form-data'>

                           <td><input type='text' class='form-control' name='party_name' value='".$row["Party_Name"]."'></td>
                            <td><input type='date' class='form-control' name='purchase_date' value='".$row["Purchase_Date"]."'></td>
                            <td><input type='date' class='form-control' name='receiving_date' value='".$row["Receiving_Date"]."'></td>
                            <td><input type='text' class='form-control' name='contact' value='".$row["Contact"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='total_bill' value='".$row["Total_Bill"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='paid_bill' value='".$row["Paid_Bill"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='pending_dues' value='".$row["Pending_Dues"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='previous_total_bill' value='".$row["Previous_Total_Bill"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='total_remaining_bill' value='".$row["Total_Remaining_Bill"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='payment' value='".$row["Payment"]."'></td>
                            <td><input type='text' class='form-control' name='bill_no' value='".$row["Bill_no"]."'></td>
                            <td><input type='text' class='form-control' name='address' value='".$row["Address"]."'></td>
                            <td><input type='text' class='form-control' name='city' value='".$row["City"]."'></td>
                            <td><input type='file' class='form-control' name='image'></td>
                            <td>
                                <input type='hidden' name='purchase_id' value='".$row["Purchases_id"]."'>
                                <input type='submit' name='update' value='Update' class='btn btn-primary'>
                            </td>
                        </form>
                        <td>
                            <form id='delete-form-".$row["Purchases_id"]."' method='POST'>
                                <input type='hidden' name='purchase_id' value='".$row["Purchases_id"]."'>
                                <input type='submit' name='delete' value='Delete' class='btn btn-danger' onclick='confirmDelete(".$row["Purchases_id"].")'>
                            </form>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
    </section>
        
    <!-- <button id="back"><a href="admin_dashboard.html">Back</a></button> -->
    <a href="installment_payments_purchazing.php"><button type="button" id="btnform">installment_payments_purchazing</button></a>
</div>
</body>
</html>
