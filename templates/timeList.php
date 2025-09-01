<form class="time-box" name="formTime" method="POST" action="/addChrono">
    <select name="track" required>
        <option value="" disabled selected>Circuits</option>
        <?php foreach ($track as $tracks): ?>
        <option value="<?= $tracks['id']?>"> <?= $tracks['name']?> </option>
    <?php endforeach; ?>
    </select>
    <input type="text" name="time"  placeholder="Temps au format mm:ss:mls"  required/>
    <input id=time-submit type="submit" value="Ajouter"/>
</form>

<table class="table-time">
    <thead class="tbl-head">
        <tr>
            <th>
                Circuits
            </th>
            <th>
                Temps
            </th>
        </tr>
    </thead>
<?php
foreach($result as $results):
?>
    <tbody>
        <tr>
            <td><?= $results['name']; ?></td>
            <td><?= $results['time']; ?></td>
        </tr>
    </tbody>
<?php
endforeach;
?>
</table>