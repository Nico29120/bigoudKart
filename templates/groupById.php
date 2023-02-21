<h3><?= $groupList['groupName'] ?></h3>

<div class="add-member">
    <p>Ajouter un membre</p>
    <form name="formSearchUser" method='post'>
        <input type="text" name="search" placeholder="Nom d'utilisateur" required/>
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <?php if(isset($_POST['search'])):
        foreach($result as $results){ ?>
    <ul>
        <li> <?= $results['username']?> => <?= $results['mail']?>
            <a href="/bigoudkart/mygroup/<?= $groupList['id'] ?>/invite/<?= $results['id'] ?>" title="Invitation du membre dans le groupe"><button id="newmember">Ajouter au groupe</button></a>
        </li>
    </ul>
    
    <?php
        };
    endif; ?>
    </div>
<div>
    <table class="group-time">
        <thead>
            <tr>
                <th>
                    Bigoud'Kart
                </th>
                <?php foreach ($usersGroupList as $players): ?>
                    <th>
                        <?= $players['username'] ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody class="content">
            <?php for ($i=1;$i<count($array_groupTime);$i++):
            $k = $i%2;
            $class="";
            if($k==0){ $class='odd'; } else { $class='even'; }
            ?>
            <tr class="<?=$class?>">
                <td><?=$array_groupTime[$i]['name']; ?></td>
                
                <?php foreach($array_groupTime[$i]['players'] as $playerTime){?>
                
                <td><?=$playerTime['time']?></td>
                <?php }; ?>
            </tr>
        
            <?php
                 
            endfor; ?>
        
        </tbody>
    </table>
</div>

