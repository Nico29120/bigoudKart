<?php
 if (Authenticator::isLogged()):
?>
    logged as <?= $_SESSION['logged_as'] ?>
    <a href="./logout">Me déconnecter</a>
<?php ;
else:
?>

    <form method="post" action="./login">
        <input type="text" placeholder="Utilisateur" name="username"/>
        <input type="password" placeholder="Mot de passe" name="password"/>
        <input type="submit" value="Se connecter"/>
<?php
    if (Authenticator::error()){
?>
        <span style="color:red"> <?= $_SESSION['message'] ?> </span> 
        <!--a modifier en css-->
<?php
};
?>
        </form>
<p>Nouveau sur Bigoud'Kart ? <a href="./register">Créer un compte</a></p>
<?php
endif;
?>
