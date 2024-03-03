<?php
// Database connection settings
$host = 'dpg-cn09cjv109ks73beuhk0-a.oregon-postgres.render.com';
$port = '5432';
$dbname = 'dams_1wu7';
$username = 'dams_1wu7_user';
$password = 'TVeT9eyf6hbeTZPQFkWKDY2C9tTGRbrE';

// Establish database connection
$dbconn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password");

// Function to authenticate user
function authenticateUser($username, $password, $dbconn) {
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $dbconn->prepare($query);
    $stmt->execute(array(':username' => $username, ':password' => $password));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate user
    $user = authenticateUser($username, $password, $dbconn);

    if ($user) {
        // User authenticated, redirect to dashboard or home page
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with error message
        header("Location: login.html?error=invalid_credentials");
        exit();
    }
}
?>