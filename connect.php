<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['number'];
    $password = $_POST['password'];
<?php
$servername = "localhost";
$username = "root1";
$password = "123456";
$dbname = "sample";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (name, email, number, password) VALUES (?, ?, ?, ?)");
        // Bind parameters
        $stmt->bind_param("ssis", $name, $email, $age, $password);

        // Execute the statement
        $execval = $stmt->execute();

        if ($execval === false) {
            // Error occurred during execution
            echo "Error: " . $stmt->error;
        } else {
            // Successful registration
            echo "Registration successful...";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>