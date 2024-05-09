<?php
require_once '../Functions/connect.php';

// Set secure session cookie parameters before starting the session
$cookieParams = session_get_cookie_params();
session_set_cookie_params([
    'lifetime' => $cookieParams["lifetime"],
    'path' => '/',
    'domain' => $cookieParams["domain"],
    'secure' => true,  // Ensure cookies are sent over HTTPS
    'httponly' => true,  // Prevent JavaScript access to session cookies
    'samesite' => 'Strict'  // Mitigate the risk of CSRF attacks
]);

session_start();

// Set HTTP security headers
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
header('Content-Security-Policy: default-src \'self\';');  // Restrict all sources to the same origin

// Configure error handling
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error/log/file');  // Ensure the error log path is secure and writable

// Handle POST request from login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Prepare and execute database query to check user credentials
    $sql = $pdo->prepare("SELECT UserID, login, password FROM User WHERE login = :login");
    $sql->execute(['login' => $login]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    // Verify password and set session if correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = $user["login"];
        session_regenerate_id();  // Regenerate session ID to prevent session fixation attacks
        header('Location: /Website2/admin.php');  // Redirect to admin panel on success
        exit;
    } else {
        // Redirect to login page with error message on failure
        header('Location: /Website2/login.php?error=invalid_credentials');
        exit;
    }
}
?>
