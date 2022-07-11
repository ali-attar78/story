<?php
include "dataBase.php";
session_start();
$number = $_GET["x"];





$porsesh=$db->query("SELECT * FROM questions WHERE directionId=$number");
$porsesh=$porsesh->fetch_assoc();

$answers=$db->query("SELECT * FROM answers WHERE directionId=$number");




?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="story site">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Ali Attar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Story</title>

</head>


<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="30" height="30" alt="">
                داستان بازی

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">صفحه اصلی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">پیوست</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ارتباط با ما
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="جست و جو" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="card mt-5" >
        <img class="card-img-top" src="img/once.jpg" alt="Card image cap" style="height: 350px">
        <div class="card-body">
            <h4 class="card-title">
                <?php if($number==0){
                    echo "صفحه اول";
                }elseif (count($_SESSION['arrayX'])==1){
                    echo "صفحه دوم";
                }elseif (count($_SESSION['arrayX'])==2){
                    echo "صفحه صفحه سوم";
                }
                ?>

            </h4>
            <p class="card-text mt-3">
                <?php echo $porsesh["text"];   ?>
            </p>

            <form  method="post" action="process.php"   style="text-align: right">

                <?php foreach ($answers as $answer):?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="<?php echo $answer["id"]; ?>" name="myAnswer" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?php echo $answer["text"]  ?>
                    </label>
                </div>
                <?php endforeach;?>


                <div class="mt-3" style="text-align: center">
                    <input type="submit" class="btn btn-dark"  value="ادامه داستان">
                </div>



            </form>







        </div>
    </div>





</div>










<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
</body>








</html>
