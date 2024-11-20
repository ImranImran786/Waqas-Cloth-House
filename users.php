<?php
// Include the database connection file
require 'dbcon.php'; // or whatever file contains the $conn variable

// Function to display alert messages
function alertmassage(){
    if(isset($_SESSION['status'])){
        echo '<div class="alert alert-success">
            <h4>'.$_SESSION['status'].'</h4>
        </div>';
        unset($_SESSION['status']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    User List
                    <a href="admin_dashboard.html" class="btn btn-primary float-start">Back</a>
                    <a href="users-create.php" class="btn btn-primary float-end">Add Users</a>
                </h4>
            </div>
            <div class="card-body">

            <?= alertmassage(); ?>

                <table class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>CNIC</th>
                            <th>Email</th>
                            <th>Email Password</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Is Ban</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Fetch users from the adminlogin table
                            $query = "SELECT * FROM adminlogin";
                            $result = $conn->query($query);

                            if ($result && $result->num_rows > 0) {
                                foreach ($result as $usersItem) {
                                    ?>
                                    <tr>
                                        <td><?= $usersItem['id']; ?></td>
                                        <td><?= $usersItem['name']; ?></td>
                                        <td><?= $usersItem['fathername']; ?></td>
                                        <td><?= $usersItem['CNIC']; ?></td>
                                        <td><?= $usersItem['email']; ?></td>
                                        <td><?= $usersItem['emailpassword']; ?></td>
                                        <td><?= $usersItem['username']; ?></td>
                                        <td><?= $usersItem['password']; ?></td>
                                        <td><?= $usersItem['ROLE']; ?></td>
                                        <td><?= $usersItem['Is_Ban'] == 1 ?'Banned' : 'Active' ; ?></td>
                                        <td><?= $usersItem['Created_at']; ?></td>
                                        <td>
                                            <a href="users-edit.php?id=<?= $usersItem['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                                            <a href="users-delete.php?id=<?= $usersItem['id']; ?>" class="btn btn-danger btn-sm mx-2"
                                            onclick="return confirm('Are you Sure you want to Delete Data?')"
                                            >Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="11">No Result Found</td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
