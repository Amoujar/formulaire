<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=form_db','root','');

if (isset($_GET['id']) AND $_GET['id'] > 0){
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM members where id =?');
    $requser -> execute(array($getid));
    $userinfo = $requser->fetch();
}


?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<body>
<style>
    @media (max-width: 700px){
        .table thead {
            display: none;
        }
        .table tr{
            display: block;
            margin-bottom: 40px;

        }
        .table td {
            display: block;
            text-align: right;
            border: 1px solid black;
        }
        .table td:before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
        }
    }

</style>


<!-- Navigation -->
<nav class="w3-bar w3-black">
    <a href="#home" class="w3-button w3-bar-item">News</a>
    <a href="#band" class="w3-button w3-bar-item">Jobs</a>
    <a href="#tour" class="w3-button w3-bar-item">Bio</a>
    <a href="#contact" class="w3-button w3-bar-item">Contact</a>
</nav>

<!-- Slide Show -->
<section style="position: absolute;top: 50%;left: 40%;">
    <img class="mySlides" src="img/nat.jpg" style="width:200px ">
    <img class="mySlides" src="img/nat1.jpg" style="width:250px ;height: 200px ">
    <img class="mySlides" src="img/nat2.jpg" style="width:200px ">
</section>
<table class=”events-table” >
    <thead>
    <tr>
        <th class=”event-date”>Nome</th>
        <th class=”event-time”>Email</th>
        <th class=”event-description”>Age</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td data-label=”Date”> <?php echo $userinfo['name']?></td>
        <td data-label=”Horaire”><?php echo $userinfo['email']?></td>
        <td data-label=”Evènement”><?php echo $userinfo['AGE']?></td>
    </tr>
    </tbody>
</table>


</body>
</html>
