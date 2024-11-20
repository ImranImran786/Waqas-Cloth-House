<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>View Purchases</title>

  <style>
    #btnform {
      width: 150px;
      height: 65px;
      margin-top: 10px;
      justify-content: center;
      border-radius: 10px;
      background-color: white;
      border: 2px solid blue;
      opacity: 0.6;
      font-weight: 1000;
    }

    #btnform:hover {
      color: black;
    }

    #main_btn {
      margin-left: 9%;
    }

    #main_btn .View_Purchases {
      border: 4px solid red;
    }

    #backdiv{
      float: left;
      width: 15%;
    }

    #backdiv #back {
      
      width: 70%;
      height: 50px;
      color: black;
      background-color: white;
      margin-top: 320px;
      margin-left: 10%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
    }
    #backdiv #back:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }




    #searchForm input[type="text"] {
      display: inline-block;
      margin: 20px 35%;
      padding: 10px;
      font-size: 16px;
      width: 300px;
      border: 2px solid black;
      border-radius: 7px;
      box-shadow: 5px 5px 7px black;
    }
    #searchForm input[type="text"]:hover {
      border-color: blue;
      box-shadow: 5px 5px 7px blue;
    }

    .container {
        float: right;
        border-collapse: collapse;
        margin-right: 4%;
        width: 80%;
        height: 350px; 
        overflow-y: auto;
        background-color: aqua;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin: 0 auto;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: blue;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #68b3e6;
    }




    @media (min-width: 1728px) and (max-width: 1920px) {
    .container { 
    width: 80%;
    margin-right: 10%;
    overflow-x: auto;
    overflow-y: auto;
  }
  #form-image{
    width: 100%;
  }

  #backdiv #back {
      width: 70%;
      height: 50px;
      color: black;
      background-color: white;
      margin-top: 300px;
      margin-left: 10%;
    }
}
  </style>

  <script>
    function submitForm() {
      const searchValue = document.getElementById('search_phone').value;

      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'V_purchase.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        if (this.status === 200) {
          document.getElementById('results').innerHTML = this.responseText;
        }
      };

      xhr.send('search_phone=' + encodeURIComponent(searchValue));
    }

    // function loadAllData() {
    //   const xhr = new XMLHttpRequest();
    //   xhr.open('POST', 'V_purchase.php', true);
    //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    //   xhr.onload = function() {
    //     if (this.status === 200) {
    //       document.getElementById('results').innerHTML = this.responseText;
    //     }
    //   };

    //   xhr.send();
    // }
  </script>

</head>

<!-- <body onload="loadAllData()"> -->
<body>

  <div id="form-image" style="background-image: url('images/1.jpg'); height: 542px; background-repeat: no-repeat; background-size: cover; margin: 8px;">
    <!-- <div id="main_btn">
      <div>
        <button type="button" id="btnform"><a href="View_Customer.html">View_Customer</a></button>
        <button type="button" id="btnform"><a href="View_Employee.html">View_Employee</a></button>
        <button type="button" id="btnform"><a href="View_Stock.html">View_Stock</a></button>
        <button type="button" id="btnform"><a href="View_Supplier.html">View_Supplier</a></button>
        <button class="View_Purchases" type="button" id="btnform"><a href="V_purchase.php">View_Purchases</a></button>
        <button type="button" id="btnform"><a href="V_sale.php">View_Sales</a></button>
      </div>
    </div> -->


    <form id="searchForm" onsubmit="event.preventDefault(); submitForm();">
        <!-- <label for="search_phone">Search by Contact:</label> -->
        <input type="text" id="search_phone" name="search_phone" placeholder="Phone number" onkeyup="submitForm()">
      </form>

    <div id="backdiv">
        <button id="back"><a href="admin_dashboard.html">Back</a></button>
    </div>

    <div class="container">

      <div id="results">
        <!-- Results will be displayed here -->
        <?php
        // Database connection settings
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

        // Initialize the SQL query for add_purchases
        $sql = "SELECT * FROM add_purchases";

        // Check if search input is set
        if (isset($_POST['search_phone']) && !empty($_POST['search_phone'])) {
            $search_phone = $conn->real_escape_string($_POST['search_phone']);
            $sql .= " WHERE Contact LIKE '%$search_phone%'";
        }

        // Execute the query
        $result = $conn->query($sql);
        $output = "";
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Party Name</th><th>Purchase Date</th><th>Receiving Date</th><th>Contact</th><th>Total Bill</th><th>Paid Bill</th><th>Pending Dues</th><th>Previous Total Bill</th><th>Total Remaining Bill</th><th>Payment</th><th>Bill No</th><th>Address</th><th>City</th><th>Image</th></tr>";
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                      <td>" . htmlspecialchars($row["Party_Name"]) . "</td>
                      <td>" . htmlspecialchars($row["Purchase_Date"]) . "</td>
                      <td>" . htmlspecialchars($row["Receiving_Date"]) . "</td>
                      <td>" . htmlspecialchars($row["Contact"]) . "</td>
                      <td>" . htmlspecialchars($row["Total_Bill"]) . "</td>
                      <td>" . htmlspecialchars($row["Paid_Bill"]) . "</td>
                      <td>" . htmlspecialchars($row["Pending_Dues"]) . "</td>
                      <td>" . htmlspecialchars($row["Previous_Total_Bill"]) . "</td>
                      <td>" . htmlspecialchars($row["Total_Remaining_Bill"]) . "</td>
                      <td>" . htmlspecialchars($row["Payment"]) . "</td>
                      <td>" . htmlspecialchars($row["Bill_no"]) . "</td>
                      <td>" . htmlspecialchars($row["Address"]) . "</td>
                      <td>" . htmlspecialchars($row["City"]) . "</td>
                      <td><img src='" . htmlspecialchars($row["Image"]) . "' alt='Image' style='width:100px; height:auto;'></td>
                      </tr>";

                // Fetch and display related data from installment_payments_purchases
                $party_name = $row['Party_Name'];
                $query = "SELECT i.*
                          FROM installment_payments_purchases i 
                          WHERE i.In_Party_Name LIKE '%$party_name%'";

                $installment_result = $conn->query($query);

                if ($installment_result->num_rows > 0) {
                    echo "<tr><td colspan='14'><table>";
                    echo "<tr><th>In Party Name</th><th>Bill no</th><th>Payment Date</th><th>Receiving Person</th><th>Payment</th><th>Bank Name</th><th>Check no</th><th>Check Date</th><th>Remaining Payment</th><th>Image</th></tr>";

                    // Output data of each row from installment_payments_purchases
                    while ($installment_row = $installment_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($installment_row["In_Party_Name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Bill_no"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Payment_Date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Receiving_Person"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Payment"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Bank_Name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Check_no"]) . "</td>";
                        echo "<td>" . htmlspecialchars($installment_row["Check_Date"]) . "</td>";
                        echo "<td>" . (isset($installment_row["Remaining_Payment"]) ? htmlspecialchars($installment_row["Remaining_Payment"]) : 'N/A') . "</td>";
                        echo "<td>" . (isset($installment_row["Image"]) ? "<img src='" . htmlspecialchars($installment_row["Image"]) . "' alt='Image' style='width:100px; height:auto;'>" : 'N/A') . "</td>";
                        echo "</tr>";
                    }

                    echo "</table></td></tr>";
                }
            }
            echo "</table>";
        } else {
            $output = "0 results";
        }
        echo $output;

        // Close connection
        $conn->close();
        ?>
      </div>
    </div>
  </div>

</body>

</html>
