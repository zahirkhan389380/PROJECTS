<?php
$hotel = $_POST['hotel'];
$food = $_POST['food'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'donation');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO form (hotel, food, phone, address, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $hotel, $food, $phone, $address, $email);

    if ($stmt->execute()) {
        echo "Form submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <h1>LADAKH FOOD DONATION WEBSITE</h1>
            <ul>
                <li><a href="../list/index.html">Food List</a></li>
                <li><a href="../compline/index.html">Complain</a></li>
                <li><a href="../front pages/pr.html">Home</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <form id="donationForm">
            <h2>DONATE FOOD</h2>
            <a href="../images/list/index.html">LIST OF FOOD ITEMS</a><br><br>
            <label for="hotel">Hotel Name</label><br>
            <input type="text" name="hotel" id="hotel" placeholder="Enter the hotel name" required><br>
            <label for="food">Food Description</label><br>
            <input type="text" name="food" id="food" placeholder="Enter the food description" required><br>
            <label for="phone"><b>Phone</b></label><br>
            <input type="tel" name="phone" id="phone" placeholder="Phone number" required><br><br>
            <label for="address">Address</label><br>
            <textarea name="address" id="address" placeholder="Address" rows="4" cols="50" required></textarea><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="Enter the email" required><br><br>
            <button type="submit">SUBMIT</button><br>
         </form>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>About US</h3>
                <p>Our mission is to facilitate the donation of food items to those in need, helping to reduce food waste and hunger.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Donate Food. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
