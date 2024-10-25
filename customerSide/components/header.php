<?php
require_once '../config.php';

$sqlSriLankan = "SELECT * FROM Menu WHERE item_category = 'Sri Lankan' ORDER BY item_type;";
$resultSriLankan = mysqli_query($link, $sqlSriLankan);
$sriLankanDishes = mysqli_fetch_all($resultSriLankan, MYSQLI_ASSOC);

// Query for Italian dishes
$sqlItalian = "SELECT * FROM Menu WHERE item_category = 'Italian' ORDER BY item_type;";
$resultItalian = mysqli_query($link, $sqlItalian);
$italianDishes = mysqli_fetch_all($resultItalian, MYSQLI_ASSOC);

// Query for Chinese dishes
$sqlChinese = "SELECT * FROM Menu WHERE item_category = 'Chinese' ORDER BY item_type;";
$resultChinese = mysqli_query($link, $sqlChinese);
$chineseDishes = mysqli_fetch_all($resultChinese, MYSQLI_ASSOC);

// Check if the user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '<div class="user-profile">';
    echo 'Welcome, ' . $_SESSION["member_name"] . '!';
    echo '<a href="../customerProfile/profile.php">Profile</a>';
    echo '</div>';
    
}

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Home</title>
</head>

<body>
    <!-- Header -->

    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a class="nav-link" href="../home/home.php#hero">
                    <img src="../image/gallery-cafe-logo.png" alt="Gallery Cafe" style="height: 50px;">
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <div class="navbar-container">

                        <div class="navbar">
                            <ul>
<?php
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
                                <li><a href="<?= strpos($current_url, "localhost/customerSide/home/home.php") !== false ? "#hero" : "/customerSide/home/home.php" ?>" data-after="Home">Home</a></li>
<?php
if (strpos($current_url, "localhost/customerSide/home/home.php") !== false) {
?>
                                <li><a href="#projects" data-after="Projects">Menu</a></li>
                                <li><a href="#contact" data-after="Contact">Contact</a></li>
<?php
} else {
?>
                                <li><a href="../CustomerReservation/reservePage.php"
                                        data-after="Service">Reservation</a></li>
                            
<?php
}
?>




                                <div class="dropdown">
                                    <button class="dropbtn">ACCOUNT <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-content">

<?php

// Get the member_id from the query parameters
$account_id = $_SESSION['account_id'] ?? null; // Change this to the way you obtain the member ID

// Create a query to retrieve the member's information
//$query = "SELECT member_name, points FROM memberships WHERE account_id = $account_id";

// Execute the query
//$result = mysqli_query($link, $query);

// Check if the user is logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $account_id != null) {
    $query = "SELECT member_name, points FROM memberships WHERE account_id = $account_id";

// Execute the query
$result = mysqli_query($link, $query);
    // If logged in, show "Logout" link
    // Check if the query was successful
    if ($result) {
        // Fetch the member's information
        $row = mysqli_fetch_assoc($result);
        
        if ($row) {
            $member_name = $row['member_name'];
            $points = $row['points'];
            
            // Calculate VIP status
            $vip_status = ($points >= 1000) ? 'VIP' : 'Regular';
            
            // Define the VIP tooltip text
            $vip_tooltip = ($vip_status === 'Regular') ? ($points < 1000 ? (1000 - $points) . ' points to VIP ' : 'You are eligible for VIP') : '';
            
            // Output the member's information
            echo "<p class='logout-link' style='font-size:1.3em; margin-left:15px; padding:5px; color:white; '>$member_name</p>";
            echo "<p class='logout-link' style='font-size:1.3em; margin-left:15px;padding:5px;color:white; '>$points Points </p>";
            echo "<p class='logout-link' style='font-size:1.3em; margin-left:15px;padding:5px; color:white; '>$vip_status";
            
            // Add the tooltip only for Regular status
            if ($vip_status === 'Regular') {
                echo " <span class='tooltip'>$vip_tooltip</span>";
            }
            
            echo "</p>";
        } else {
            echo "Member not found.";
        }
    } else {
        echo "Error: " . mysqli_error($link);
    }

    echo '<a class="logout-link" style="color: white; font-size:1.3em;" href="../customerLogin/logout.php">Logout</a>';
} else {
    // If not logged in, show "Login" link
    echo '<a class="signin-link" style="color: white; font-size:15px;" href="../customerLogin/register.php">Sign Up </a> ';
    echo '<a class="login-link" style="color: white; font-size:15px; " href="../customerLogin/login.php">Log In</a>';
}

// Close the database connection
mysqli_close($link);
?>


                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->