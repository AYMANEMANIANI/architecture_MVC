<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle voiture</title>
</head>

<body>
    <fieldset>
        <legend>Nouvelle voiture</legend>
        <form action="?action=ajouter" method="post">
            Immatriculation <br>
            <input type="text" name="immatriculation"><br>
            Marque <br> <input type="text" name="marque"><br>
            Kilométrage <br> <input type="text" name="kilometrage"><br>
            <input type="submit" name="ajouter" value="Enregister" />
        </form>
    </fieldset>
</body>

</html>
