<?php
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

$searchDate = '';
$search_month = '';
$ordersData = [];
$profitData = [];
$employeeData = [];
$employeeRemainingData = [];
$supplierData = [];
$returnProductData = [];
$installmentPaymentsData = [];

$ordersTotal = 0;
$employeeAdvancedTotal = 0;
$employeeRemainingTotal = 0;
$supplierTotal = 0;
$returnProductTotal = 0;
$installmentPaymentsTotal = 0;
$profitpercustomer = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchDate = $_POST['search_date'];
    $search_month = $_POST['search_month'];

    // Fetch data from orders table
    if (!empty($searchDate)) {
      // Fetch data for a specific date
      $ordersQuery = "SELECT Purchase_date, total_bill FROM orders WHERE Purchase_date = '$searchDate'  AND total_bill > 0";
  } elseif (!empty($search_month)) {
      // Fetch data for a specific month
      $ordersQuery = "SELECT Purchase_date, total_bill FROM orders WHERE DATE_FORMAT(Purchase_date, '%Y-%m') = '$search_month'  AND total_bill > 0";
  }

  $ordersResult = $conn->query($ordersQuery);
  if ($ordersResult->num_rows > 0) {
      while ($row = $ordersResult->fetch_assoc()) {
          $ordersData[] = $row;
          $ordersTotal += $row['total_bill'];
      }
  }


   
// Fetch data from orders table for profit per customer
if (!empty($searchDate)) {
  // Fetch data for a specific date
  $profitQuery = "SELECT Purchase_date, profit_per_customer FROM orders WHERE Purchase_date = '$searchDate' AND profit_per_customer > 0";
} elseif (!empty($search_month)) {
  // Fetch data for a specific month
  $profitQuery = "SELECT Purchase_date, profit_per_customer FROM orders WHERE DATE_FORMAT(Purchase_date, '%Y-%m') = '$search_month' AND profit_per_customer > 0";
}
$profitResult = $conn->query($profitQuery);
if ($profitResult->num_rows > 0) {
    while ($row = $profitResult->fetch_assoc()) {
        if (isset($row['profit_per_customer'])) { // Check if key exists
            $profitData[] = $row;
            $profitpercustomer += $row['profit_per_customer'];
        }
    }
}



  

    // Fetch data from add_employee table for advanced salary
    if (!empty($searchDate)) {
      // Fetch data for a specific date
      $employeeQuery = "SELECT Advanced_Salary_Date, Advanced_Salary FROM employee_salary_history WHERE Advanced_Salary_Date = '$searchDate' AND Advanced_Salary > 0";
  } elseif (!empty($search_month)) {
      // Fetch data for a specific month
      $employeeQuery = "SELECT Advanced_Salary_Date, Advanced_Salary FROM employee_salary_history WHERE DATE_FORMAT(Advanced_Salary_Date, '%Y-%m') = '$search_month' AND Advanced_Salary > 0";
  }
    $employeeResult = $conn->query($employeeQuery);
    if ($employeeResult->num_rows > 0) {
        while ($row = $employeeResult->fetch_assoc()) {
            $employeeData[] = $row;
            $employeeAdvancedTotal += $row['Advanced_Salary'];
        }
    }



    if (!empty($searchDate)) {
      // Fetch data for a specific date
      $employeeRemainingQuery = "SELECT Ramaining_Salary_Date, Ramaining_Salary FROM employee_salary_history WHERE Ramaining_Salary_Date = '$searchDate' AND Ramaining_Salary > 0";
  } elseif (!empty($search_month)) {
      // Fetch data for a specific month
      $employeeRemainingQuery = "SELECT Ramaining_Salary_Date, Ramaining_Salary FROM employee_salary_history WHERE DATE_FORMAT(Ramaining_Salary_Date, '%Y-%m') = '$search_month' AND Ramaining_Salary > 0";
  }
    // Fetch data from add_employee table for remaining salary
    $employeeRemainingResult = $conn->query($employeeRemainingQuery);
    if ($employeeRemainingResult->num_rows > 0) {
        while ($row = $employeeRemainingResult->fetch_assoc()) {
            $employeeRemainingData[] = $row;
            $employeeRemainingTotal += $row['Ramaining_Salary'];
        }
    }




    if (!empty($searchDate)) {
      // Fetch data for a specific date
      $supplierQuery = "SELECT Date_of_Shipment, Shipping_Cost FROM add_supplier WHERE Date_of_Shipment = '$searchDate' AND Shipping_Cost > 0";
  } elseif (!empty($search_month)) {
      // Fetch data for a specific month
      $supplierQuery = "SELECT Date_of_Shipment, Shipping_Cost FROM add_supplier WHERE  DATE_FORMAT(Date_of_Shipment, '%Y-%m') = '$search_month' AND Shipping_Cost > 0";
  }
    // Fetch data from add_supplier table
    $supplierResult = $conn->query($supplierQuery);
    if ($supplierResult->num_rows > 0) {
        while ($row = $supplierResult->fetch_assoc()) {
            $supplierData[] = $row;
            $supplierTotal += $row['Shipping_Cost'];
        }
    }




    if (!empty($searchDate)) {
      // Fetch data for a specific date
      $returnProductQuery = "SELECT Return_Date, Refund_Amount FROM return_product WHERE Return_Date = '$searchDate' AND Refund_Amount > 0";
  } elseif (!empty($search_month)) {
      // Fetch data for a specific month
      $returnProductQuery = "SELECT Return_Date, Refund_Amount FROM return_product WHERE DATE_FORMAT(Return_Date, '%Y-%m') = '$search_month' AND Refund_Amount > 0";
  }
    // Fetch data from return_product table
    $returnProductResult = $conn->query($returnProductQuery);
    if ($returnProductResult->num_rows > 0) {
        while ($row = $returnProductResult->fetch_assoc()) {
            $returnProductData[] = $row;
            $returnProductTotal += $row['Refund_Amount'];
        }
    }





    if (!empty($searchDate)) {
      // Fetch data for a specific date
      $installmentPaymentsQuery = "SELECT Payment_Date, pay_party_payment FROM installment_payments_purchases WHERE Payment_Date = '$searchDate' AND pay_party_payment > 0";
  } elseif (!empty($search_month)) {
      // Fetch data for a specific month
      $installmentPaymentsQuery = "SELECT Payment_Date, pay_party_payment FROM installment_payments_purchases WHERE DATE_FORMAT(Payment_Date, '%Y-%m') = '$search_month' AND pay_party_payment > 0";
  }
    // Fetch data from installment_payments_purchases table
    $installmentPaymentsResult = $conn->query($installmentPaymentsQuery);
    if ($installmentPaymentsResult->num_rows > 0) {
        while ($row = $installmentPaymentsResult->fetch_assoc()) {
            $installmentPaymentsData[] = $row;
            $installmentPaymentsTotal += $row['pay_party_payment'];
        }
    }
}

$totalSum = $employeeAdvancedTotal + $employeeRemainingTotal + $supplierTotal + $returnProductTotal + $installmentPaymentsTotal;
$remainingBalance = $ordersTotal - $totalSum;
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>View Sales</title>

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

    #main_btn .View_Sales {
      border: 4px solid red;
    }

    #back {
      margin-top: 460px;
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

    .container { 
      max-width: 900px; 
      margin-top: 50px; 
    }
    .table-container {
       margin-top: 30px; 
    }
    .table th, .table td { 
      text-align: center; 
    }
    .table th { 
      text-align: center; 
      background-color: blue;
      color: white;
    }
    .result-table { 
      margin-top: 20px; 
    }

    .highlight {
      font-weight: bold;
      color: red;
    }
  </style>
</head>

<body>
  <!-- BOOK NOW Form start -->
  <div id="form-image" style="background-image: url('images/1.jpg'); height: 605px; background-repeat: no-repeat; background-size: cover; margin: 8px;">
    <!-- <h1>Admin Dashboard</h1> -->
    <div id="main_btn">
      <div>
        <button type="button" id="btnform"><a href="View_Customer.html">View_Customer</a></button>
        <button type="button" id="btnform"><a href="View_Employee.html">View_Employee</a></button>
        <button type="button" id="btnform"><a href="View_Stock.html">View_Stock</a></button>
        <button type="button" id="btnform"><a href="View_Supplier.html">View_Supplier</a></button>
        <button type="button" id="btnform"><a href="View_Documents.html">View_Documents</a></button>
        <button type="button" id="btnform"><a href="View_Purchases.html">View_Purchases</a></button>
        <button class="View_Sales" type="button" id="btnform"><a href="View_Sales.html">View_Sales</a></button>
        <button type="button" id="btnform"><a href="View_page.html">View_page</a></button>
      </div>
    </div>

    <button id="back"><a href="admin_dashboard.html">Back</a></button>


    <div class="container">

    <h2 class="text-center">Calculate Balance</h2>
    <form method="POST" action="">
        <div class="form-group">
          <label for="search_date">Search by Date</label>
          <input type="date" class="form-control" id="search_date" name="search_date" value="<?php echo $searchDate; ?>">
        </div>
        <div class="form-group">
          <label for="search_month">Search by Month (YYYY-MM)</label>
          <input type="month" class="form-control" id="search_month" name="search_month" value="<?php echo $searchMonth; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>



    <!-- Results -->
    <div class="container mt-5">
        <?php if (!empty($ordersData)) : ?>
          <h2>Orders</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Purchase Date</th>
                <th>Total Bill</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ordersData as $row) : ?>
                <tr>
                  <td><?php echo htmlspecialchars($row['Purchase_date']); ?></td>
                  <td class="highlight"><?php echo htmlspecialchars($row['total_bill']); ?></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td><strong>Total</strong></td>
                <td class="highlight"><strong><?php echo $ordersTotal; ?></strong></td>
              </tr>
            </tbody>
          </table>
        <?php endif; ?>

       <!-- Results -->
    <div class="container mt-5">
      <?php if (!empty($profitData)) : ?>
        <h2>Earning profit</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Purchase Date</th>
              <th>To earn according to Purchazing</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($profitData as $row) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['Purchase_date']); ?></td>
                <td class="highlight"><?php echo htmlspecialchars($row['profit_per_customer']); ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong></td>
              <td class="highlight"><strong><?php echo $profitpercustomer; ?></strong></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>

      <h2 class="highlight">Expanses</h2>

      <?php if (!empty($employeeData)) : ?>
        <h2>Employee Advanced Salaries</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Advanced Salary Date</th>
              <th>Advanced Salary</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($employeeData as $row) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['Advanced_Salary_Date']); ?></td>
                <td class="highlight"><?php echo htmlspecialchars($row['Advanced_Salary']); ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong></td>
              <td class="highlight"><strong><?php echo $employeeAdvancedTotal; ?></strong></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>

      <?php if (!empty($employeeRemainingData)) : ?>
        <h2>Employee Remaining Salaries</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Remaining Salary Date</th>
              <th>Remaining Salary</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($employeeRemainingData as $row) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['Ramaining_Salary_Date']); ?></td>
                <td class="highlight"><?php echo htmlspecialchars($row['Ramaining_Salary']); ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong></td>
              <td class="highlight"><strong><?php echo $employeeRemainingTotal; ?></strong></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>

      <?php if (!empty($supplierData)) : ?>
        <h2>Suppliers</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Date of Shipment</th>
              <th>Shipping Cost</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($supplierData as $row) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['Date_of_Shipment']); ?></td>
                <td class="highlight"><?php echo htmlspecialchars($row['Shipping_Cost']); ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong></td>
              <td class="highlight"><strong><?php echo $supplierTotal; ?></strong></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>

      <?php if (!empty($returnProductData)) : ?>
        <h2>Return Products</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Return Date</th>
              <th>Refund Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($returnProductData as $row) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['Return_Date']); ?></td>
                <td class="highlight"><?php echo htmlspecialchars($row['Refund_Amount']); ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong></td>
              <td class="highlight"><strong><?php echo $returnProductTotal; ?></strong></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>

      <?php if (!empty($installmentPaymentsData)) : ?>
        <h2>Installment Payments</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Payment Date</th>
              <th>Party Payment</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($installmentPaymentsData as $row) : ?>
              <tr>
                <td><?php echo htmlspecialchars($row['Payment_Date']); ?></td>
                <td class="highlight"><?php echo htmlspecialchars($row['pay_party_payment']); ?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><strong>Total</strong></td>
              <td class="highlight"><strong><?php echo $installmentPaymentsTotal; ?></strong></td>
            </tr>
          </tbody>
        </table>
      <?php endif; ?>



      <div class="result-table">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Total Sales</th>
                        <th>Total Expenses</th>
                        <th>Total profit after expanse</th>
                        <th>Total Bachat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $ordersTotal; ?></td>
                        <td><?php echo $totalSum; ?></td>
                        <td><?php echo  $remainingBalance?></td>
                        <td><?php echo $profitpercustomer; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>





      <h2 class="highlight">Date    : <?php echo $searchDate; ?></h2>
      <br>
      <h2 class="highlight">Total Sale    : <?php echo $ordersTotal; ?></h2>
      <h2 class="highlight">Total Expanse : <?php echo $totalSum; ?></h2>
      <h2 class="highlight">Total profit after expanse : <?php echo $ordersTotal - $totalSum; ?></h2>   
      <h2 class="highlight">Total Bachat : <?php echo $profitpercustomer; ?></h2>
    </div>
  </div>
  </div>
</body>

</html>
