<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bigoud'Kart</title>
</head>
<body>
    <div>
        <?php
        if ($template === "login"){
            require './templates/login.php';
        }
        
        if ($template === "register"){
            require './templates/register.php';    
        }
        
        if ($template === "chrono"){
            require './templates/chrono.php';    
        }
        
        if ($template === "newGroup"){
            require './templates/newGroup.php';    
        }
        ?>
    </div>
</body>
</html>