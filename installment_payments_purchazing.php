<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Management</title>
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
        function confirmDelete(installment_purchases_id) {
            if (confirm("Are you sure you want to delete this purchase?")) {
                document.getElementById('delete-form-' + installment_purchases_id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 530px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <div id="main_btn">
        <div>
            <!-- Your existing buttons here -->
            <a href="update_cust.php"><button type="button"  id="btnform">Update Customer</button></a>
            <a href="update_empl.php"><button type="button" id="btnform">Update Employee</button></a>
            <a href="update_stocks.php"><button type="button" id="btnform">Update Stock</button></a>
            <a href="update_suppliers.php"><button type="button" id="btnform">Update Supplier</button></a>
            <a href="update_documents.php"><button type="button" id="btnform">Update Documents</button></a>
            <a href="update_purchases.php"><button type="button" style="border: 4px solid red;" id="btnform">Update Purchases</button></a>
            <a href="update_sale.php"><button type="button" id="btnform">Update Sales</button></a>
            <a href="update_roughs.php"><button type="button" id="btnform">Update Rough</button></a>
        </div>
    </div>
    
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
        
        // Delete functionality
        if (isset($_POST['delete'])) {
            $installment_purchases_id = $_POST['installment_purchases_id']; // Correct variable name here
        
            $conn->begin_transaction();
        
            // Fetching the purchase data
            $sql = "SELECT * FROM installment_payments_purchases WHERE installment_purchases_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $installment_purchases_id);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                // Deleting the purchase
                $sql = "DELETE FROM installment_payments_purchases WHERE installment_purchases_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $installment_purchases_id);
        
                if ($stmt->execute()) {
                    echo "Purchase deleted successfully.";
                    // Resetting the auto-increment
                    $sql = "SET @count = 0";
                    $conn->query($sql);
                    $sql = "UPDATE installment_payments_purchases SET installment_purchases_id = @count:= @count + 1";
                    $conn->query($sql);
                    $sql = "ALTER TABLE installment_payments_purchases AUTO_INCREMENT = 1";
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
        
        // Update functionality
        if (isset($_POST['update'])) {
            $installment_purchases_id = $_POST['installment_purchases_id'];
            $In_Party_Name = isset($_POST['In_Party_Name']) ? $_POST['In_Party_Name'] : '';
            $Bill_No = isset($_POST['Bill_No']) ? $_POST['Bill_No'] : '';
            $Payment_Date = isset($_POST['Payment_Date']) ? $_POST['Payment_Date'] : '';
            $Receiving_Person = isset($_POST['Receiving_Person']) ? $_POST['Receiving_Person'] : '';
            $Payment = isset($_POST['Payment']) ? $_POST['Payment'] : '';
            $Bank_Name = isset($_POST['Bank_Name']) ? $_POST['Bank_Name'] : '';
            $Check_no = isset($_POST['Check_no']) ? $_POST['Check_no'] : '';
            $Check_Date = isset($_POST['Check_Date']) ? $_POST['Check_Date'] : '';
            $pay_party_payment = isset($_POST['pay_party_payment']) ? $_POST['pay_party_payment'] : 0;
            $Raining_Payment = isset($_POST['Raining_Payment']) ? $_POST['Raining_Payment'] : 0;

            $sql = "UPDATE installment_payments_purchases SET 
                    In_Party_Name = ?, 
                    Bill_no = ?, 
                    Payment_Date = ?, 
                    Receiving_Person = ?, 
                    Payment = ?, 
                    Bank_Name = ?, 
                    Check_no = ?, 
                    Check_Date = ?, 
                    pay_party_payment = ?, 
                    Raining_Payment = ? 
                    WHERE installment_purchases_id = ?";
            $stmt = $conn->prepare($sql);
            
            $stmt->bind_param("sssssssddii", 
                              $In_Party_Name, 
                              $Bill_No, 
                              $Payment_Date, 
                              $Receiving_Person, 
                              $Payment, 
                              $Bank_Name, 
                              $Check_no, 
                              $Check_Date, 
                              $pay_party_payment, 
                              $Raining_Payment, 
                              $installment_purchases_id);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success' role='alert'>Purchase updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error updating purchase: " . $conn->error . "</div>";
            }
            $stmt->close();
        }

        // Search functionality
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = "%" . $_POST['search'] . "%";
            $sql = "SELECT * FROM installment_payments_purchases WHERE In_Party_Name LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $search);
        } else {
            $sql = "SELECT * FROM installment_payments_purchases";
            $stmt = $conn->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <tr>
                        <th>Installment Purchase ID</th>
                        <th>Party Name</th>
                        <th>Bill No</th>
                        <th>Payment Date</th>
                        <th>Receiving Person</th>
                        <th>Payment</th>
                        <th>Bank Name</th>
                        <th>Check No</th>
                        <th>Check Date</th>
                        <th>Pay Party Payment</th>
                        <th>Remaining Payment</th>
                        <th>Actions</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["installment_purchases_id"]."</td>
                        <form id='update-form-".$row["installment_purchases_id"]."' method='POST' enctype='multipart/form-data'>
                            <td><input type='text' class='form-control' name='In_Party_Name' value='".$row["In_Party_Name"]."'></td>
                            <td><input type='text' class='form-control' name='Bill_No' value='".$row["Bill_no"]."'></td>
                            <td><input type='date' class='form-control' name='Payment_Date' value='".$row["Payment_Date"]."'></td>
                            <td><input type='text' class='form-control' name='Receiving_Person' value='".$row["Receiving_Person"]."'></td>
                            <td><input type='text' class='form-control' name='Payment' value='".$row["Payment"]."'></td>
                            <td><input type='text' class='form-control' name='Bank_Name' value='".$row["Bank_Name"]."'></td>
                            <td><input type='text' class='form-control' name='Check_no' value='".$row["Check_no"]."'></td>
                            <td><input type='date' class='form-control' name='Check_Date' value='".$row["Check_Date"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='pay_party_payment' value='".$row["pay_party_payment"]."'></td>
                            <td><input type='number' step='0.01' class='form-control' name='Raining_Payment' value='".$row["Raining_Payment"]."'></td>
                            <td>
                                <input type='hidden' name='installment_purchases_id' value='".$row["installment_purchases_id"]."'>
                                <input type='submit' name='update' value='Update' class='btn btn-primary'>
                            </td>
                        </form>
                        <td>
                            <form id='delete-form-".$row["installment_purchases_id"]."' method='POST'>
                                <input type='hidden' name='installment_purchases_id' value='".$row["installment_purchases_id"]."'>
                                <input type='submit' name='delete' value='Delete' class='btn btn-danger' onclick='return confirm(\"Are you sure?\");'>
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


        
    <button id="back"><a href="admin_dashboard.html">Back</a></button>
    <a href="update_purchases.php"><button type="button" id="btnform">Party Purchases</button></a>
</div>
</body>
</html>
