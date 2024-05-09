<?php
// Enable error reporting for debugging (should be disabled in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection parameters should be secured and not hard-coded
$servername = "localhost"; // Ideally should be loaded from a configuration file or environment variable
$username = "root"; // Use a specific user instead of 'root'
$password = ""; // Strong password for database access
$dbname = "Website";

// Establish a new PDO connection
$dbh = 'mysql:host='.$servername.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dbh, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CoachID = $_POST["CoachID"] ?? '';
    $Name = $_POST["Name"] ?? '';
    $Description = $_POST["Description"] ?? '';

    // Ensure all mandatory fields are filled out
    if (!empty($CoachID) && !empty($Name) && !empty($Description)) {
        
        // Define the target directory for uploaded images
        $target_directory = $_SERVER['DOCUMENT_ROOT'] . '/Website2/Assets/Images/';
        $web_path = '/Website2/Assets/Images/' . basename($_FILES["pic"]["name"]); 

        // Check if a file has been uploaded without errors
        if (!empty($_FILES['pic']['name']) && $_FILES['pic']['error'] == 0) {
            $target_file = $target_directory . basename($_FILES["pic"]["name"]);
            echo "Attempting to save file to: " . $target_file . "<br>";

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                echo "File successfully uploaded.<br>";
                
                // Update the database entry for the coach with the new image
                $row = "UPDATE Coaches SET Name = :Name, Description = :Description, pic = :pic WHERE CoachID = :CoachID";
                $query = $pdo->prepare($row);
                $query->execute(["Name" => $Name, "Description" => $Description, "pic" => $web_path, "CoachID" => $CoachID]);
            } else {
                echo "Error uploading file.<br>";
            }
        } else {
            // Update the database entry for the coach without changing the image
            $row = "UPDATE Coaches SET Name = :Name, Description = :Description WHERE CoachID = :CoachID";
            $query = $pdo->prepare($row);
            $query->execute(["Name" => $Name, "Description" => $Description, "CoachID" => $CoachID]);
        }
    } else {
        echo "All fields are required.";
    }
    // Redirect after handling the form submission
    echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/Website2/admin/Coaches.php">';
}
?>
