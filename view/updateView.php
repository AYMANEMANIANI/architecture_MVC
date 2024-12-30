<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une voiture</title>
</head>

<body>
    <fieldset>
        <legend>Modifier une voiture</legend>
        <form action="?action=update&Immatriculation=<?= $voiture['immatriculation'] ?>" method="post">
            Immatriculation <br>
            <input type="text" name="immatriculation" value="<?= htmlspecialchars($voiture['immatriculation']) ?>"><br>
            Marque <br> 
            <input type="text" name="marque" value="<?= htmlspecialchars($voiture['marque']) ?>"><br>
            Kilométrage <br> 
            <input type="text" name="kilometrage" value="<?= htmlspecialchars($voiture['kilometrage']) ?>"><br>
            <input type="submit" value="Mettre à jour">
        </form>
    </fieldset>
</body>

</html>
