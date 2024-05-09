<?php 
include '/Applications/XAMPP/htdocs/Website2/Functions/connect.php';

// Set secure cookie parameters before starting the session
$cookieParams = session_get_cookie_params();
session_set_cookie_params([
    'lifetime' => $cookieParams["lifetime"],
    'path' => '/',
    'domain' => $cookieParams["domain"],
    'secure' => true,  // Set to true to ensure cookies use HTTPS
    'httponly' => true,  // Prevent JavaScript access to session cookies
    'samesite' => 'Strict'  // Avoid CSRF risks
]);
session_start();

// Security headers
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
header('Content-Security-Policy: default-src \'self\';');

ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error/log/file');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['Name']);
    $surname = htmlspecialchars($_POST['Surname']);
    $Email = htmlspecialchars($_POST['Email']);
    $phoneNum = htmlspecialchars($_POST['PhoneNum']);
    $date = htmlspecialchars($_POST['date']);

    $query = "INSERT INTO Customers (Name, Surname, Email, PhoneNum, date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);

    try {
        $stmt->execute([$name, $surname, $Email, $phoneNum, $date]);

        // Prepare and send an email
        $subject = "Booking Confirmation";
        $message = "Hello " . $name . ",\n\nThank you for booking a lesson with us on " . $date . ". We look forward to seeing you!";
        $headers = "From: yourname@example.com";

        if (mail($Email, $subject, $message, $headers)) {
            echo "Thank you for booking a lesson! Check your email for confirmation.";
        } else {
            echo "Sorry, there was an error in sending your confirmation email. Please contact support.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Redirect to home page after form submission
echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/Website2/index.html">';
?>
