
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajouter un animal</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
        <h1>Ajouter un animal</h1>
        <form type="GET" action="animal_ajouter.php">
            <h2>Responsable</h2>
            <div class="resp">
                <select name="resp">
                    <option value="">--Choisissez un Responsable--</option>
                </select>
                <div>
                    <a>Nouveau Responsable</a>
                </div>
            </div>
            <h2>Descriptif</h2>
            <div class="Descriptif">
                Nom : <input type="text" name="nom"><br>
                Espece : <select name="'espece">
                    <option value="">--Selectionnez une espèce--</option>
                </select><br>
                Race : <select name="race">
                    <option value="">--Selectionnez une race--</option>
                    <option value="a">a</option>
                </select><br>
                Genre : <br>
                <input type="radio" value="F" name="genre">
                F
                <input type="radio" value="M" name="genre">
                M
                <br>
                Taille : <input type="text" name="taille">
                <br>
                Castré : <br>
                <input type="radio" value="O" name="genre">
                Oui
                <input type="radio" value="N" name="genre">
                Non
                <br>
                Poids : <input type="text" name="poids">
            </div>
            <h2>Vaccins</h2>
            <div class="vaccin">
            <div>
                <a>Ajouter un Vaccin pour cet animal</a>
            </div>
            <select name="Vaccin">
                <option value="">--Nom du Vaccin--</option>
            </select>
            <div>
            <a>Nouveau Vaccin</a>
            </div>
            </div>
            <br>
            <div class="btnEnd">
            <input type="reset" value="Reinitialiser">
            <a><input type="submit" value="Sauvegarder" id="save"></a>
            </div>
        </form>
        </div>
    </body>
</html>