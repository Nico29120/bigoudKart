<?php
foreach($notif as $notification) ?>

<ul class="notification">
    <li><?=$notification['username']?> vous invite à rejoindre son groupe : <?= $notification['groupName'] ?>
        <a href="notificationAccept/<?=$notification['id']?>" title="Accepter l'invitation"><button id="notification-accept">Accepter</button></a>
        <a href="notificationDecline/<?=$notification['id']?>" title="Décliner l'invitation"><button id="notification-decline">Rejeter</button></a>
    </li>
</ul>