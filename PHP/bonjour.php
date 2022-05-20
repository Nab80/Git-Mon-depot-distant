
 <?php foreach ($tableau as $artist): ?>

<?php var_dump($artist); // Le var_dump() est écrit à titre informatif ?>
<tr>
    <td><?= $artist->artist_id ?></td>
    <td><?= $artist->artist_name ?></td>
</tr>

<?php endforeach; ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Liste</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
    </table>
</body>
</html>