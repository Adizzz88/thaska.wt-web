<?php
// Database connection details
$host = 'localhost';  // Replace with your database host
$user = 'root';       // Replace with your database username
$pass = '';           // Replace with your database password
$dbname = 'hotel';    // Database name
$port = 3307; // port number

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);

    // Insert data into the contact_us table
    $sql = "INSERT INTO contact_us (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        $feedback = "Message sent successfully!";
    } else {
        $feedback = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url("./footer.jpg");
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h1 {
    color: #4A90E2;
    margin-bottom: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s;
}

input:focus {
    border-color: #4A90E2;
    outline: none;
}

button {
    padding: 10px 15px;
    background-color: #4A90E2;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #357ABD;
}

    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Hotel</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="rooms.html">Rooms & Rates</a></li>
                <li><a href="dining.html">Dining</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Contact Us</h1>
        <!-- Display feedback message if set -->
        <?php if (!empty($feedback)) { ?>
        <div class="alert alert-success">
            <?php echo $feedback; ?>
        </div>
        <?php } ?>
        <form action="#" method="post" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Submit</button>
        </form>
    </div>
    <footer class="footer">
        <p>Email: adityapatil88492002@gmail.com</p>
        <p>Mobile: 7666856931</p>
    </footer>
</body>
</html>

