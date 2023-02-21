<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Bigoud'Kart</title>
    
    <!--balises opengraph-->
    <meta property="og:title" content="Bigoud'Kart"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.bigoudkart.com/"/>
    <meta charset="UTF-8">
    <meta property="og:description" content="Site orienté autour du jeux vidéo Mario Kart 8 Deluxe, permettant d'enregistrer ses temps records pour chaque circuit et de les comparer avec d'autres utilisateurs" />
    <meta property="og:image" content="/bigoudkart/public/img/MK_Nico.png"/>
    
    <!--favicon du site-->
    <link rel="icon" type="image/png" href="/bigoudkart/public/img/MK_Nico.png"/>
    
    <!--lien vers le css-->
    <link rel="stylesheet" href="/bigoudkart/public/css/style.css" type="text/css"/>
    
    <!--lien utiliser font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <!--chargement des google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    
    
</head>
<body>
    <header>
    <?php
    require ('./templates/navbar.php');
    ?>
    </header>
    <main>
    <?php
    // page d'accueil
       if ($template === "home"){
           require './templates/home.php';
       }
    //   formulaire de connexion
       if ($template === "login"){
           require './templates/login.php';
       }
    //   formulaire création de compte
       if ($template === "register"){
           require './templates/register.php';    
       }
    //   page des records perso
       if ($template === "time"){
           require './templates/timeList.php';    
       }
    //   page de listing des différents groupes
       if ($template === "groupList"){
           require './templates/groupList.php';    
       }
    //   formulaire nouveau groupe
       if ($template === "newGroup"){
           require './templates/newGroup.php';
       }
    //   page de groupe
       if ($template === "groupById"){
           require './templates/groupById.php';
       }
    //   page de notification
       if ($template === "notif"){
           require './templates/notif.php';    
       }
              
       ?>
    </main>
    
    <script type="module" src="/bigoudkart/public/script/navbarModal.js"></script>
    
</body>
</html>