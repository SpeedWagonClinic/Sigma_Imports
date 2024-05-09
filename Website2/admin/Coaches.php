<?php session_start(); ?>
<?php require_once '../Functions/connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Coaches</title>
   <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url(../Assets/Images/applo.jpeg);
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.button-style {
          display: inline-block;
          width: auto;
          background-color: #ffffff;
          color: #080710;
          padding: 15px 20px;
          font-size: 18px;
          font-weight: 600;
          border-radius: 5px;
          cursor: pointer;
          margin-top: 20px;
          text-decoration: none; /* Remove underline from links */
      }
.appointment-form-container {
    max-width: 600px;
    background-color: #c1d0d1;
    padding: 50px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%);
}
.appointment-form-container *{
    font-family: 'Poppins',sans-serif;
    color: #141414;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}


.appointment-form-container h2, h3 {
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

.button-style {
    background-color: #4c61af;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 100px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; /* Remove underline from links */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
.button-style1 {
    background-color: #4c61af;
    color: #fff;
    padding: 10px 20px;
    width: 150px; /* Set a specific width */
    margin-left: auto; /* Center the button */
    margin-right: auto;
    border: none;
    border-radius: 100px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; /* Remove underline from links */
    display: block;
    margin-top: 50px;
    align-items: center;
    justify-content: center;

    display: flex;
    justify-content: center;
    align-items: center;
    
  
}

.button-style:hover {
    background-color: #0fa4df;
}
.button-style1:hover {
    background-color: #0fa4df;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}


    </style>
</head>
<body>
    

    <div class="appointment-form-container">
    <h3>Changing Coaches</h3>

    <?php if (!empty($_SESSION["login"])): ?>

<br>


<?php
$sql = $pdo->prepare("SELECT * FROM Coaches");
$sql->execute();

while ($res = $sql->fetch(PDO::FETCH_OBJ)) {
    ?>

    <form action="/Website2/admin/Coaches/Coaches.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="CoachID" value="<?php echo $res->CoachID; ?>">
        <input type="text" name="Name" id="dynamic-input" value="<?php echo $res->Name ?>">
        <input type="text" name="Description" id="dynamic-input" value="<?php echo $res->Description ?>">
        <input type="file" name="pic" accept="image/*">
        
        <button type="submit" class="button-style1">Save Changes</button>
    </form>

    <?php
}
?>
<a href="/Website2/index.html" class="button-style">Go to Sigma Imports</a>
<a href="/Website2/admin.php" class="button-style">Admin Menu</a>
<a href="/Website2/logout.php" class="button-style1">Log out</a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CoachID = $_POST["CoachID"] ?? '';
    $Name = $_POST["Name"] ?? '';
    $Description = $_POST["Description"] ?? '';

    if (!empty($CoachID) && !empty($Name) && !empty($Description)) {
        $target_directory = __DIR__ . '/Assets/Images/';
        $db_path = "/Website2/Assets/Images/" . basename($_FILES["pic"]["name"]); // A path to save data in the database

        if (!empty($_FILES['pic']['name'])) {
            $target_file = $target_directory . basename($_FILES["pic"]["name"]);

            echo "Попытка загрузить файл: " . $target_file . "<br>";
            
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                echo "Файл успешно загружен.<br>";

                // Updating data in the database
                $row = "UPDATE Coaches SET Name = :Name, Description = :Description, pic = :pic WHERE CoachID = :CoachID";
                $query = $pdo->prepare($row);
                $query->execute(["Name" => $Name, "Description" => $Description, "pic" => $db_path, "CoachID" => $CoachID]);
            } else {
                echo "Ошибка при загрузке файла.<br>";
            }
        } else {
            // If a file wasn't uploaded - update the text only
            $row = "UPDATE Coaches SET Name = :Name, Description = :Description WHERE CoachID = :CoachID";
            $query = $pdo->prepare($row);
            $query->execute(["Name" => $Name, "Description" => $Description, "CoachID" => $CoachID]);
        }
    } else {
        echo "All fields are required.";
    }
    // Redirection
    echo '<meta HTTP-EQUIV="Refresh" Content="0; URL=/Website2/admin/Coaches.php">';
}
?>


    <?php else: ?>
        <h2>Go away!</h2>
        <a href="/Website2/login.php" class="button-style">Return to Login</a>
    <?php endif ?>
    </div>
    
</php>
<script src="app.js"></script>

</body>
</html>
