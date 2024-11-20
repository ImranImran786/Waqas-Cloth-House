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
    /* .btn {
      height: 30px;
      border-radius: 10px;
      background-color: white;
      border: 4px solid blue;
      opacity: 0.8;
      font-size: 20px;
      margin-right: 20px;
    } */
    </style>
    <script>
        function confirmDelete(colour_id) {
        if (confirm("Are you sure you want to delete this colour stock?")) {
            // If user confirms, submit the form
            var form = document.querySelector('#update-form-' + colour_id);
            var deleteButton = form.querySelector('button[name="delete"]');
            deleteButton.setAttribute("name", "delete");
            form.submit();
            return true; // Proceed with deletion
        }
        return false; // Prevent deletion if cancelled
    }
    </script>
</head>
<body>
<div id="form-image" style="background-image: url('images/1.jpg'); height: 510px; background-repeat: no-repeat; background-size: cover; margin: 2px;">
    <form method="POST" action="">
        <input id="search" type="text" name="search" placeholder="Search by product name">
        <input type="submit" value="Search">
    </form>
    
    <section id="first_section">
        <div class="container">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "waqas_cloth_house";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Delete functionality
            if (isset($_POST['delete'])) {
                $colour_id = $_POST['colour_id'];

                $conn->begin_transaction();

                $sql = "SELECT * FROM product_colour WHERE colour_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $colour_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM product_colour WHERE colour_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $colour_id);

                    if ($stmt->execute()) {
                        echo "Colour stock deleted successfully.";
                        $conn->commit();
                    } else {
                        echo "Error deleting colour stock: " . $conn->error;
                        $conn->rollback();
                    }
                } else {
                    echo "Colour stock not found.";
                    $conn->rollback();
                }

                $stmt->close();
            }

            // Update functionality
            if (isset($_POST['update'])) {
                $colour_id = $_POST['colour_id'];
                $product_name = $_POST['product_name'];
                $colour_name = $_POST['colour_name'];
                $quantity = $_POST['colour_quantity'];
                $meter = $_POST['colour_in_meter'];

                $sql = "UPDATE product_colour SET 
                    product_name = ?, 
                    colour_name = ?, 
                    colour_quantity = ?, 
                    colour_in_meter = ? 
                    WHERE colour_id = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssisi", 
                    $product_name, 
                    $colour_name, 
                    $quantity, 
                    $meter, 
                    $colour_id);

                if ($stmt->execute()) {
                    echo "Colour stock item updated successfully.";
                } else {
                    echo "Error updating colour stock item: " . $conn->error;
                }

                $stmt->close();
            }

            // Search functionality
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $search = "%" . $_POST['search'] . "%";
                $sql = "SELECT * FROM product_colour WHERE product_name LIKE ? OR colour_id LIKE ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $search, $search);
            } else {
                $sql = "SELECT * FROM product_colour";
                $stmt = $conn->prepare($sql);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table class='table'>
                        <tr>
                            <th>Colour ID</th>
                            <th>Product Name</th>
                            <th>Colour Name</th>
                            <th>Colour Quantity</th>
                            <th>Colour In Meter</th>
                            <th>Actions</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["colour_id"] . "</td>
                            <td><input type='text' class='form-control' name='product_name' form='update-form-" . $row["colour_id"] . "' value='" . $row["product_name"] . "'></td>
                            <td><input type='text' class='form-control' name='colour_name' form='update-form-" . $row["colour_id"] . "' value='" . $row["colour_name"] . "'></td>
                            <td><input type='text' class='form-control' name='colour_quantity' form='update-form-" . $row["colour_id"] . "' value='" . $row["colour_quantity"] . "'></td>
                            <td><input type='text' class='form-control' name='colour_in_meter' form='update-form-" . $row["colour_id"] . "' value='" . $row["colour_in_meter"] . "'></td>
                            <td>
                                <form id='update-form-" . $row["colour_id"] . "' method='POST'>
                                    <input type='hidden' name='colour_id' value='" . $row["colour_id"] . "'>
                                    <button type='submit' name='update' class='btn btn-primary btn-sm'>Update</button>
                                    <button type='button' onclick='return confirmDelete(" . $row["colour_id"] . ");' class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                            </td>
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
</div>


</body>
</html>
