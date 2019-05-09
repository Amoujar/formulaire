<?php
session_start();

        $bdd=new PDO('mysql:host=localhost;dbname=form_db','root','');
        if (isset($_POST['btn'])){
            $mail=$_POST['email'];
            $mpass=$_POST['conpassword'];


            if (!empty($mail) && !empty($mpass))
            {
            $requser=$bdd->prepare("SELECT * FROM members WHERE email=? AND password=?   ");
            $requser->execute(array($mail,$mpass,));
            $userex=$requser->rowCount();
            if ($userex == 1){
                $userinfo=$requser->fetch();
                $_SESSION['id']=$userinfo['id'];
                $_SESSION['name']=$userinfo['name'];
                $_SESSION['mail'] =$userinfo['email'];
                $_SESSION['age'] =$userinfo['AGE'];
                $_SESSION['photo']=$userinfo['photo'];


                header("Location: home.php?id=".$_SESSION['id']);
            }

            } else if(empty($mail) || empty($mpass))
            {
                $erreur = "tout les champs doivent etre complite" ;
            }
        }







?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <style>

        .text-center1{
            background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
</head>
<body class="text-center1">
<h1></h1>
<div class="image">
    <a  href="http://localhost/form/regiter/inscrip.php">
<img  style="position: absolute;left: 80%;top: 5%;border: 1px solid black;width: 70px;height: 30px" src="img/ic1.jpg">
    </a>
</div>
<form class="form-signin" action="" method="POST">
    <P></P>

    <h1 class="h3 mb-3 font-weight-normal">Je me connecte </h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" >
    <label for="inputPassword" class="sr-only">Mots de passe</label>
    <input type="password" name="conpassword" id="inputPassword" class="form-control" placeholder="Password" >

    <button type="submit" name="btn" >Valider</button>

   <?php
   if(isset($erreur))
   {

       echo "<p style='text-align: center;'><span style='font-size: large;background-color: #721c24; font-family: georgia,palatino; color:beige;'> $erreur</span></p> </br>";
   }

   ?>
    <p class="mt-5 mb-3 text-muted">&copy;Said AMOUJAR 2017-2019</p>
</form>
</body>
</html>
