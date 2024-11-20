<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>786</title>
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
      font-size: 20px;
      line-height: 1.7;
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
      width: 100px;
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
        function confirmDelete(stock_id) {
            if (confirm("Are you sure you want to delete this order?")) {
                document.getElementById('delete-form-' + stock_id).submit();
            }
        }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 510px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <!-- <div id="main_btn">
        <div>
            <a href="update_cust.php"><button type="button" id="btnform">update Customer</button></a>
            <a href="update_empl.php"><button type="button" id="btnform">update Employee</button></a>
            <a href="update_stocks.php"><button type="button" style="border: 4px solid red;" id="btnform">update Stock</button></a>
            <a href="update_suppliers.php"><button type="button" id="btnform">update Supplier</button></a>
            <a href="update_documents.php"><button type="button" id="btnform">update Documents</button></a>
            <a href="update_purchases.php"><button type="button" id="btnform">update Purchases</button></a>
            <a href="update_sale.php"><button type="button" id="btnform">update Sales</button></a>
            <a href="update_roughs.php"><button type="button" id="btnform">update rough</button></a>
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
                $stock_id = $_POST['stock_id'];
                
                $conn->begin_transaction();
                
                $sql = "SELECT * FROM add_stock WHERE stock_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $stock_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM add_stock WHERE stock_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $stock_id);
                    
                    if ($stmt->execute()) {
                        echo "Stock deleted successfully.";
                        // $sql = "SET @count = 0";
                        // $conn->query($sql);
                        // $sql = "UPDATE add_stock SET stock_id = @count:= @count + 1";
                        // $conn->query($sql);
                        // $sql = "ALTER TABLE add_stock AUTO_INCREMENT = 1";
                        // $conn->query($sql);
                        // $conn->commit();
                    } else {
                        echo "Error deleting Stock: " . $conn->error;
                        $conn->rollback();
                    }
                } else {
                    echo "Stock not found.";
                    $conn->rollback();
                }
                
                $stmt->close();
            }
            
            if (isset($_POST['update'])) {
                $stock_id = $_POST['stock_id'];
                $product_name = $_POST['Product_Name_Male'];
                $box = $_POST['Box'];
                $meter = $_POST['Meter'];
                $retail_price = $_POST['Retail_Price'];
                $purchase_price = $_POST['Purchase_Price'];
                $quantity = $_POST['Quantity'];
                $gender = $_POST['Gender'];
                $warehouse_id = $_POST['Warehouse_ID'];
                $place = $_POST['Place'];
                $season = $_POST['Season'];
                $brand = $_POST['Brand'];
                $out_of_stock = $_POST['Out_of_stock'];
                $size = $_POST['Size'];
                $category = $_POST['Category'];
                $damage_piece = $_POST['Damage_Piece'];
                $description = $_POST['Description'];
                
                $sql = "UPDATE add_stock SET 
    Product_Name_Male = ?, 
    Box = ?, 
    Meter = ?, 
    Retail_Price = ?, 
    Purchase_Price = ?, 
    Quantity = ?, 
    Gender = ?, 
    Warehouse_ID = ?, 
    Place = ?, 
    Season = ?, 
    Brand = ?, 
    Out_of_stock = ?, 
    Size = ?, 
    Category = ?, 
    Damage_Piece = ?, 
    Description = ?
    WHERE stock_id = ?";

                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssddsissssssissii", 
    $product_name, 
    $box, 
    $meter, 
    $retail_price, 
    $purchase_price, 
    $quantity, 
    $gender, 
    $warehouse_id, 
    $place, 
    $season, 
    $brand, 
    $out_of_stock, 
    $size, 
    $category, 
    $damage_piece, 
    $description, 
    $stock_id);

                
                if ($stmt->execute()) {
                    echo "Stock item updated successfully.";
                } else {
                    echo "Error updating stock item: " . $conn->error;
                }
                $stmt->close();
            }
            
            if (isset($_POST['search']) && !empty($_POST['search'])) {
              $search = "%" . $_POST['search'] . "%";
              $sql = "SELECT * FROM add_stock WHERE Product_Name_Male LIKE ? OR stock_id LIKE ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("ss", $search, $search);
            } else {
                $sql = "SELECT * FROM add_stock";
                $stmt = $conn->prepare($sql);
            }
            
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <tr>
                            <th>Stock ID</th>
                            <th>Product Name</th>
                            <th>Box</th>
                            <th>Meter</th>
                            <th>Retail Price</th>
                            <th>Purchase Price</th>
                            <th>Quantity</th>
                            <th>Gender</th>
                            <th>Warehouse ID</th>
                            <th>Place</th>
                            <th>Season</th>
                            <th>Brand</th>
                            <th>Out of Stock</th>
                            <th>Size</th>
                            <th>Category</th>
                            <th>Damage Piece</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["stock_id"]."</td>
                            <form id='update-form-".$row["stock_id"]."' method='POST'>
                            <td><input type='text' class='form-control' name='Product_Name_Male' value='".$row["Product_Name_Male"]."'></td>
                            <td><input type='text' class='form-control' name='Box' value='".$row["Box"]."'></td>
                            <td><input type='text' class='form-control' name='Meter' value='".$row["Meter"]."'></td>
                            <td><input type='text' class='form-control' name='Retail_Price' value='".$row["Retail_Price"]."'></td>
                            <td><input type='text' class='form-control' name='Purchase_Price' value='".$row["Purchase_Price"]."'></td>
                            <td><input type='text' class='form-control' name='Quantity' value='".$row["Quantity"]."'></td>
                            <td><input type='text' class='form-control' name='Gender' value='".$row["Gender"]."'></td>
                            <td><input type='text' class='form-control' name='Warehouse_ID' value='".$row["Warehouse_ID"]."'></td>
                            <td><input type='text' class='form-control' name='Place' value='".$row["Place"]."'></td>
                            <td><input type='text' class='form-control' name='Season' value='".$row["Season"]."'></td>
                            <td><input type='text' class='form-control' name='Brand' value='".$row["Brand"]."'></td>
                            <td><input type='text' class='form-control' name='Out_of_stock' value='".$row["Out_of_stock"]."'></td>
                            <td><input type='text' class='form-control' name='Size' value='".$row["Size"]."'></td>
                            <td><input type='text' class='form-control' name='Category' value='".$row["Category"]."'></td>
                            <td><input type='text' class='form-control' name='Damage_Piece' value='".$row["Damage_Piece"]."'></td>
                            <td><input type='text' class='form-control' name='Description' value='".$row["Description"]."'></td>
                            <td>
                                <input type='hidden' name='stock_id' value='".$row["stock_id"]."'>
                                <button type='submit' name='update' class='btn btn-primary btn-sm'>Update</button>
                                <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                            </td>
                            </form>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
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
