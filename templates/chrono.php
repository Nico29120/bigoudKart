<form method="POST" action="/bigoudkart/addChrono">
    <select name="track">
        <option value="">Circuits</option>
        <?php foreach ($track as $tracks): ?>
        <option value="<?= $tracks['id']?>"> <?= $tracks['name']?> </option>
    <?php endforeach; ?>
    </select>
    <input type="text" name="chrono"  placeholder="Temps au format mm:ss:mls"/>
    <input type="submit" value="Ajouter"/>
</form>

<table class="tableChrono">
<?php
foreach($result as $results):
?>
    <tr>
        <td><?= $results['name']; ?></td>
        <td><?= $results['times']; ?></td>
    </tr>
<?php
endforeach;
?>
</table>