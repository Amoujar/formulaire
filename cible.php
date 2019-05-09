<?php
           //connexion à la base de donnés//

                $objetpdo= new PDO("mysql:host=localhost;dbname=form_db","root","");



           //préparation de la requete//

                $pdoStat=$objetpdo->prepare('INSERT INTO members (name,email,password,age,photo) VALUES (:name,:email,:password,:age,:photo)');


//                die();
            // on lie chaque marqueure à une valeur//
                $pdoStat->bindParam(':name',$_POST['name'],PDO::PARAM_STR);
                $pdoStat->bindParam(':email',$_POST['email'],PDO::PARAM_STR);
                $pdoStat->bindParam(':password',$_POST['password'],PDO::PARAM_STR);
                $pdoStat->bindParam(':age',$_POST['age'],PDO::PARAM_STR);
                $pdoStat->bindParam(':photo',$_POST['photo'],PDO::PARAM_STR);

             //Execution de la requete//
           $insertisok= $pdoStat->execute();


           if ($insertisok){
               $message='Vous avez été ajouté avec succes';
           }else{
               $message='un probleme c\est produit';
           }


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Insertion des contacts :</h1>
<P style="background-color: red"> <?php echo $message ?></P>
<img width="140" src="https://previews.123rf.com/images/yayayoy/yayayoy1604/yayayoy160400006/55080524-montrant-%C3%A9motic%C3%B4nes-signe-ok.jpg">
<button onclick="window.location.href = 'http://localhost/form/regiter/inscrip.php#';">Accuiel</button>

</body>
</html>
