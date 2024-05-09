<?php require_once './Functions/connect.php'; ?>
<?php
//CoachID 1
$sql1 = $pdo->prepare("SELECT * FROM Coaches WHERE CoachID = :CoachID");
$sql1->execute(['CoachID' => 1]);
$res1 = $sql1->fetch(PDO::FETCH_ASSOC);

//CoachID 2
$sql2 = $pdo->prepare("SELECT * FROM Coaches WHERE CoachID = :CoachID");
$sql2->execute(['CoachID' => 2]);
$res2 = $sql2->fetch(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches</title>
    <link rel = "stylesheet" href="Assets/css/style.css" />
    <script src="https://kit.fontawesome.com/c24752484b.js" crossorigin="anonymous"></script>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/authors/author-2/assets/css/author-2.css">
<body>
    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.html" id="navbar__logo"> Sigma Imports</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="index.html" class="navbar__links">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="Coaches.php" class="navbar__links">Coaches</a>
                </li>
                <li class="navbar__item">
                    <a href="Cars.php" class="navbar__links">Cars</a>
                </li>
                <li class="navbar__btn">
                            <a href="appointment1.html" class="button">Book a Lesson</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Main text bootstrap -->
    <section class="bsb-author-2 py-3 bg-light">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 col-xxl-7">
              <div class="card border-light-subtle p-4">
                <div class="row gy-3 align-items-center">
                  <div class="col-md-4">
                    <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                      <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy" src="<?php echo $res1["pic"]; ?>" alt="pic">
                    </a>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h3 class="card-title mb-2">
                        <a class="card-link link-dark text-decoration-none" href="#!"><?php echo $res1["Name"]?></a>
                      </h3>
                      <p class="card-text mb-3"><?php echo $res1["Description"]?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            </section>
            <section class="bsb-author-2 py-3 bg-light">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8 col-xxl-7">
                      <div class="card border-light-subtle p-4">
                        <div class="row gy-3 align-items-center">
                          <div class="col-md-4">
                            <a href="#!" class="bsb-hover-image d-block rounded overflow-hidden">
                              <img class="img-fluid author-avatar bsb-scale bsb-hover-scale-up" loading="lazy" src="<?php echo $res2["pic"]?>" alt="pic">
                            </a>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title mb-2">
                                <a class="card-link link-dark text-decoration-none" href="#!"><?php echo $res2["Name"]?></a>
                              </h3>
                              <p class="card-text mb-3"><?php echo $res2["Description"]?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
     <!-- Footer section -->
     <div class="footer__container">
        <div class="footer__links">
            <div class="footer__link--wrapper">
                <div class="footer__lin--items">
                    <a href="AboutUs.html">About us</a>
                    <a href="index.html">How it works</a>
                    <a href="index.html">Our Team</a>
                    <a href="index.html">Find Us</a>
                    <a href="index.html">Careers</a>
                    <a href="index.html">Become a Partner</a>
                    <a href="index.html">Terms and Services</a>
                </div>                                               
            </div>
        </div>
        <div class="social__media">
            <div class="social__media--wrap">
                <p class="website__right">© Sigma Imports 2024. All rights reserved</p>
                <div class="social__icons">
                    <a href="https://www.facebook.com" class="social__icons--link"
                    target = "_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com" class="social__icons--link"
                    target = "_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com" class="social__icons--link"
                    target = "_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.twitter.com" class="social__icons--link"
                    target = "_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.youtube.com" class="social__icons--link"
                    target = "_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>

 
</body>
</html>

