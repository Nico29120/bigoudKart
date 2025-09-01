<?php
    use App\classes\services\Authenticator;
    use App\classes\services\Notificator;
?>            
<div class="logo">
    <a href="" title="Page d'accueil"><img src="/public/img/logo.png" width="100" alt="logo bigoud'kart"/></a>
    <p>BIGOUD'KART</p>
</div>
<nav>
    <ul class="nav-list" id="navList">
        <?php
        if (Authenticator::isLogged()): ?>
        
        <li class="list-item"><a href="/150cc" title="Page records">Mes records</a></li>
        <li class="list-item"><a href="/mygroup" title="Page mes groupes">Mes groupes</a></li>
        <?php if (Notificator::isNotified()){ ?>
            <li class="list-item"><a href="/notification" title="Page notification">Notification</a></li>
        <?php };
        ?>
        <li class="list-item"><a href="/logout" title="Déconnexion">Déconnexion</a></li>
        <?php
        else: ?>
        <li class="list-item"><a href="/login" title="Connexion">Connexion</a></li>
        <?php endif; ?>
    </ul>
    <div class="menu" id="menu-button">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
    </div>
    
</nav>
