<?php
// Enable error reporting for debugging (should be disabled in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection parameters should be secured and not hard-coded
$servername = "localhost";
$username = "root";  // Replace 'root' with a less privileged user
$password = "";      // Strong password should be used here
$dbname = "Website";

// Establish a new PDO connection
$dbh = 'mysql:host='.$servername.';dbname='.$dbname.';charset=utf8';
$pdo = new PDO($dbh, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CarID = $_POST["CarID"] ?? '';
    $Name = $_POST["Name"] ?? '';
    $Description = $_POST["Description"] ?? '';

    // Ensure all mandatory fields are filled out
    if (!empty($CarID) && !empty($Name) && !empty($Description)) {
        
        // Define the target directory for uploaded images
        $target_directory = $_SERVER['DOCUMENT_ROOT'] . '/Website2/Assets/Images/';
        $web_path = '/Website2/Assets/Images/' . basename($_FILES["pic"]["name"]); 

        // Check if a file has been uploaded without errors
        if (!empty($_FILES['pic']['name']) && $_FILES['pic']['error'] == 0) {
            $target_file = $target_directory . basename($_FILES["pic"]["name"]);
            echo "Attempting to save file to: " . $target_file . "<br>";

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                echo "Uploaded Successfully.<br>";
                
                // Update the database entry for the car with the new image
                $row = "UPDATE Cars SET Name = :Name, Description = :Description, pic = :pic WHERE CarID = :CarID";
                $query = $pdo->prepare($row);
                $query->execute(["Name" => $Name, "Description" => $Description, "pic" => $web_path, "CarID" => $CarID]);
            } else {
                echo "Error in uploading file.<br>";
            }
        } else {
            // Update the database entry for the car without changing the image
            $row = "UPDATE Cars SET Name = :Name, Description = :Description WHERE CarID = :CarID";
            $query = $pdo->prepare($row);
            $query->execute(["Name" => $Name, "Description" => $Description, "CarID" => $CarID]);
        }
    } else {
        echo "All fields are required.";
    }
    // Redirect after handling the form submission
    echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/Website2/admin/Cars.php">';
}
?>
