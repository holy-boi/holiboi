<?php
// Database connection settings
$host = 'dpg-cn09cjv109ks73beuhk0-a.oregon-postgres.render.com';
$port = '5432';
$dbname = 'dams_1wu7';
$username = 'dams_1wu7_user';
$password = 'TVeT9eyf6hbeTZPQFkWKDY2C9tTGRbrE';

// Establish database connection
$dbconn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password");

// Query to select all users
$query = "SELECT * FROM users";
$stmt = $dbconn->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display users
if ($users) {
    echo "<h1>Users</h1>";
    echo "<ul>";
    foreach ($users as $user) {
        echo "<li>{$user['username']}</li>";
    }
    echo "</ul>";
} else {
    echo "No users found";
}
?>