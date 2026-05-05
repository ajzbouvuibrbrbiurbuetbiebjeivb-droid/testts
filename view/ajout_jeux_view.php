<div id="contenu">
    <h1>Ajouter un nouveau jeu</h1>
    <form action="/jeux/valider_ajout" method="post">

        <div>
            <label for="jeu_nom">Nom du jeu :</label>
            <input type="text" name="jeu_nom" id="jeu_nom" required>
        </div>
        <div>
            <label for="jeu_editeur">Éditeur :</label>
            <input type="text" name="jeu_editeur" id="jeu_editeur">
        </div>
        <div>
            <label for="jeu_duree_partie">Durée d'une partie (min) :</label>
            <input type="number" name="jeu_duree_partie" id="jeu_duree_partie">
        </div>
        <div>
            <label for="jeu_nb_joueurs_mini">Nombre de joueurs minimum :</label>
            <input type="number" name="jeu_nb_joueurs_mini" id="jeu_nb_joueurs_mini">
        </div>
        <div>
            <label for="jeu_nb_joueurs_maxi">Nombre de joueurs maximum :</label>
            <input type="number" name="jeu_nb_joueurs_maxi" id="jeu_nb_joueurs_maxi">
        </div>
        <div>
            <label for="jeu_photo1">Photo 1 (chemin) :</label>
            <input type="text" name="jeu_photo1" id="jeu_photo1" placeholder="img/jeux/nom_image.jpg">
        </div>
        <div>
            <label for="jeu_photo2">Photo 2 (chemin) :</label>
            <input type="text" name="jeu_photo2" id="jeu_photo2">
        </div>
        <div>
            <label for="jeu_photo3">Photo 3 (chemin) :</label>
            <input type="text" name="jeu_photo3" id="jeu_photo3">
        </div>
        <div>
            <label for="jeu_prix_unit">Prix unitaire :</label>
            <input type="number" step="0.01" name="jeu_prix_unit" id="jeu_prix_unit">
        </div>
        <div>
            <label for="jeu_qte_stock">Quantité en stock :</label>
            <input type="number" name="jeu_qte_stock" id="jeu_qte_stock">
        </div>
        <div style="margin-top: 20px;">
            <input type="submit" value="Ajouter le jeu">
        </div>
    </form>
</div>