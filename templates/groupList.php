<div class="group-list">
    <ul>
    <?php foreach($groupList as $groups):
    ?>
    
        <li><a href="mygroup/<?= $groups->id ?>" title="Page du groupe"> <?= $groups->groupName ?> </a></li>
    
    <?php endforeach;
    ?>
    
    </ul>
</div>
<a href="/bigoudkart/newgroup" title="Création d'un nouveau groupe"><button id ="newgroup-submit">Nouveau Groupe</button></a>