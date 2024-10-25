<?php
session_start(); // Ensure session is started

// Include config file
require_once "../config.php";

// Initialize variables for form validation and item data
$item_id = $item_name = $item_type = $item_category = $item_price = $item_description = "";
$item_id_err = "";

// Check if item_id is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $item_id = $_GET['id'];

    // Retrieve item details based on item_id
    $sql = "SELECT * FROM Menu WHERE item_id = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_item_id);
        $param_item_id = $item_id;
        
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $item_name = $row['item_name'];
                $item_type = $row['item_type'];
                $item_category = $row['item_category'];
                $item_price = $row['item_price'];
                $item_description = $row['item_description'];
            } else {
                echo "Item not found.";
                exit();
            }
        } else {
            echo "Error retrieving item details.";
            exit();
        }
    }
}

// Process form submission when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $item_name = trim($_POST["item_name"]);
    $item_type = trim($_POST["item_type"]);
    $item_category = trim($_POST["item_category"]);
    $item_price = floatval($_POST["item_price"]); // Convert to float
    $item_description = trim($_POST["item_description"]);

    // Check if fields are valid
    if (empty($item_name) || empty($item_type) || empty($item_category) || $item_price <= 0 || empty($item_description)) {
        $item_id_err = "Please fill all fields correctly.";
    } else {
        // Update the item in the database
        $update_sql = "UPDATE Menu SET item_name=?, item_type=?, item_category=?, item_price=?, item_description=? WHERE item_id=?";
        if ($stmt = mysqli_prepare($link, $update_sql)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $item_name, $item_type, $item_category, $item_price, $item_description, $item_id);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['update_success'] = true;
                header("Location: ../panel/menu-panel.php"); // Redirect to the menu panel
                exit();
            } else {
                echo "Error updating item.";
            }
        } else {
            echo "Error preparing statement.";
        }
    }
}
?>

<!-- Create your HTML form for updating the item details -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <title>Update Item</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: black;
            color: white;
        }

        .login-container {
            padding: 50px; /* Adjust the padding as needed */
            border-radius: 10px; /* Add rounded corners */
            margin: 100px auto; /* Center the container horizontally */
            max-width: 500px; /* Set a maximum width for the container */
        }
    </style>
    <script>
        window.onload = function() {
            <?php if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === true) { ?>
                alert('Item updated successfully!');
                <?php unset($_SESSION['update_success']); // Clear the session variable ?>
            <?php } ?>
        };
    </script>
</head>
<body>
    <div class="login-container">
        <div class="login_wrapper">
            <div class="wrapper">
                <h2 style="text-align: center;">Update Item</h2>
                <h5>Admin Credentials needed to Edit Item</h5>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="item_name" class="form-label">Item Name:</label>
                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Spaghetti" value="<?php echo htmlspecialchars($item_name); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item_type" class="form-label">Item Type:</label>
                        <input type="text" name="item_type" id="item_type" class="form-control" placeholder="Beer, Cocktail, etc.." value="<?php echo htmlspecialchars($item_type); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item_category" class="form-label">Item Category:</label>
                        <input type="text" name="item_category" id="item_category" class="form-control" placeholder="Sri Lankan/ Italian/ Chinese" value="<?php echo htmlspecialchars($item_category); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item_price" class="form-label">Item Price:</label>
                        <input type="number" min="0.01" step="0.01" name="item_price" id="item_price" placeholder="Enter Item Price" class="form-control" value="<?php echo htmlspecialchars($item_price); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item_description" class="form-label">Item Description:</label>
                        <textarea name="item_description" id="item_description" placeholder="The dish...." required class="form-control"><?php echo htmlspecialchars($item_description); ?></textarea>
                    </div>
                    <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($item_id); ?>">
                    <button class="btn btn-light" type="submit" name="submit" value="submit">Update</button>
                    <a class="btn btn-danger" href="../panel/menu-panel.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
