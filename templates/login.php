<?php
use App\classes\services\Authenticator;

if (Authenticator::isLogged()):
?>
    <p>Vous êtes connecté en tant que : <?= $_SESSION['logged_as'] ?></p>
    <a href="./logout" title="Déconnexion">Me déconnecter</a>
<?php ;
else:
?>

    <div class="login-box">
        <form name="formLogin" method="post" action="./login">
            <div class="form-box">
                <input type="text" name="username" id="username" required/>
                <label for="username">Pseudo</label>
            </div>
            <div class="form-box">
                <input type="password" name="password" id="password" required/>
                <label for="password">Mot de passe</label>
            </div>
             <?php
            if (Authenticator::error()){
            ?>
                <div>
                    <p class="error-message"><?= $_SESSION['login_failed'] ?></p>
                </div>

        <?php
        };
        ?>
            <div class="button-login">
                <input id="login-submit" type="submit" value="Se connecter"/>
            
       
                <div id="register">
                    <p>Nouveau sur Bigoud'Kart ? <a href="./register" title="Création d'un compte">Créer un compte</a></p>
                </div>
            </div>
        </form>
        
        <?php
        endif;
        ?>
    </div>
