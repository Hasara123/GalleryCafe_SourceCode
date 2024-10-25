<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | The Gallery Café</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            background-image: url('/Customerside/image/reserve.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .reservation-section {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .reservation-section h1 {
            font-family: cursive;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .reservation-section p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .reservation-section p:first-of-type {
            font-weight: bold;
            color: #333;
        }
        .reservation-section p:last-of-type {
            font-style: italic;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="reservation-section">
        <h1>Reservation</h1>
        <p>We are delighted to welcome you to The Gallery Café, where exquisite dining meets a unique ambiance. To ensure we provide you with the best experience, please use the reservation form below to book your table. Kindly note that we accept reservations up to 90 days in advance.</p>
        <p>If you have any special requests, dietary restrictions, or are celebrating a special occasion, please let us know in advance. This allows us to prepare accordingly and offer you a personalized experience.</p>
        <p>Some of our popular dishes, such as our Signature Gallery Platter, require a 24-hour notice to ensure freshness and availability. Additionally, our daily specials are limited, so we recommend pre-ordering to avoid disappointment.</p>
        <p>Please be aware that availability of certain menu items may vary depending on daily market supplies.</p>
        <p>We look forward to making your visit memorable!</p>

        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo '<a href="./customerSide/CustomerReservation/availability.php" class="btn">Reserve</a>';
        } else {
            echo '<a href="./customerSide/customerLogin/login.php" class="btn">Log In to Reserve</a>';
        }
        ?>
    </div>
</body>
</html>
