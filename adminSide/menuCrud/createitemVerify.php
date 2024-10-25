<?php
session_start();
require_once "../config.php";

// Check if 'id' is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $menu_id = $_GET['id'];
} else {
    header("Location: ../panel/menu-panel.php");
    exit(); // Make sure to exit after redirect
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User-provided input
    $provided_account_id = $_POST['admin_id']; 
    $provided_password = $_POST['password']; 

    // Replace this with your actual admin credentials check
    // Example: $admin_account_id = '99999'; $admin_password_hash = password_hash('your_password', PASSWORD_DEFAULT);
    $valid_account_id = '99999';
    $valid_password_hash = '$2y$10$your_password_hash'; // Replace with actual hashed password

    // Perform authentication
    if ($provided_account_id === $valid_account_id && password_verify($provided_password, $valid_password_hash)) {
        // Admin authentication successful
        $_SESSION['is_admin'] = true; // Set session variable
        header("Location: ../menuCrud/createItem.php?id=" . urlencode($menu_id));
        exit(); // Ensure no further code is executed
    } else {
        echo '<script>alert("Incorrect ID or Password!")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/verifyAdmin.css" rel="stylesheet" />
</head>
<body>
    <div class="login-container">
        <div class="login_wrapper">
            <div class="wrapper">
                <h2 style="text-align: center;">Admin Login</h2>
                <h5>Admin Credentials needed to Edit Item</h5>
                <form class="mt-2" action="" method="post">
                    <div class="form-group">
                        <label>Admin Id</label>
                        <input type="number" name="admin_id" class="form-control" placeholder="Enter Admin ID" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Admin Password" required>
                    </div>

                    <button class="btn btn-light" type="submit" name="submit" value="submit">Login</button>
                    <a class="btn btn-danger" href="../panel/menu-panel.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
