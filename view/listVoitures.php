<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <form action="?action=rechercher" method="post" id="formRecherche">
        <input type="text" name="marque" placeholder="Rechercher par marque" />
        <input type="submit" name="ok" value="ok" />
    </form>
    <a href="?action=create">Ajouter une voiture</a>
    
    <h2>Liste des voitures</h2>
    <?php if ($tab_voitures): ?>
    <table>
        <tr>
            <th>Immatriculation</th>
            <th>Marque</th>
            <th>Kilométrage</th>
        </tr>
        <?php foreach ($tab_voitures as $voiture): ?>
        <tr>
            <td><?= $voiture->getImmatriculation() ?></td>
            <td><?= $voiture->getMarque() ?></td>
            <td><?= $voiture->getKilometrage() ?></td>
            <td> <a href="?action=delete&Immatriculation=<?= $voiture->getImmatriculation() ?>">supprimer une voiture</a></td>
            <td> <a href="?action=update&Immatriculation=<?= $voiture->getImmatriculation() ?>">modifier une voiture</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</body>
</html>