<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Admin Panel</title>
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image: url(Assets/Images/applo.jpeg);
    background-repeat: no-repeat;
   
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
          text-decoration: none; 
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
    color: #ffffff;
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
    text-decoration: none; 
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
.button-style1 {
    background-color: #4c61af;
    color: #fff;
    padding: 10px 20px;
    width: 150px; 
    margin-left: auto; 
    margin-right: auto;
    border: none;
    border-radius: 100px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none; 
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

    </style>
</head>
<body>
    
    <div class="appointment-form-container">
        <?php session_start(); ?>
        <?php if(!empty($_SESSION["login"])): ?>

            <h3>Hi, Admin! <br>It's Sigma Imports</h3>
            
            <a href="/Website2/admin/Coaches.php" class="button-style">Coaches</a>
            <a href="/Website2/admin/Cars.php" class="button-style">Cars</a>
            <a href="/Website2/CustomersTab/index.php" class="button-style">Customers</a>
            <a href="index.html" class="button-style">Go to Sigma Imports</a>
            <a href="logout.php" class="button-style1">Log out</a>
       
       
        <?php else: ?>
            <h2>Go away!</h2>
            <a href="login.php" class="button-style">Return to Login</a>
        <?php endif ?>
    </div>
 
</body>
</html>
