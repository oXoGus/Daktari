<html>
    <head>
        <title>Nouveau Traitement</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Infos générales</h1>
        <div class="info">
            <form type="get" action="traitement_ajouter.php">
            Produit : <input type="text" name="produit"><br>
            Dilution : <input type="text" name="dilution"><br>
            Dose : <input type="text" name="dose"><br>
            Durée du traitement : <input type="text" name="duree"><br>
            Fréquence : <input type="text" name="frequence"><br>
            Quand : <input type="text" name="quand"><br>
            <input type="reset" value="Réinitialiser">
            <input type="submit" value="Sauvegarder">
            </form>
        </div>
    </body>
</html>