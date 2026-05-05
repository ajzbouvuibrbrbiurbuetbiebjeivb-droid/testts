<div id="contenu">
    <h1>Jeu ajouté avec succès !</h1>
    <p>Le jeu a bien été ajouté.</p>

    <?php if (!empty($dernier_jeu)) : ?>
    <h2>Informations du jeu ajouté</h2>
    <table>
        <tr>
            <th>Nom</th>
            <td><?php echo htmlspecialchars($dernier_jeu['jeu_nom']); ?></td>
        </tr>
        <tr>
            <th>Éditeur</th>
            <td><?php echo htmlspecialchars($dernier_jeu['jeu_editeur']); ?></td>
        </tr>
        <tr>
            <th>Durée d'une partie</th>
            <td><?php echo htmlspecialchars($dernier_jeu['jeu_duree_partie']); ?> min</td>
        </tr>
        <tr>
            <th>Joueurs</th>
            <td><?php echo htmlspecialchars($dernier_jeu['jeu_nb_joueurs_mini']); ?> à <?php echo htmlspecialchars($dernier_jeu['jeu_nb_joueurs_maxi']); ?></td>
        </tr>
        <tr>
            <th>Prix unitaire</th>
            <td><?php echo htmlspecialchars($dernier_jeu['jeu_prix_unit']); ?> €</td>
        </tr>
        <tr>
            <th>Quantité en stock</th>
            <td><?php echo htmlspecialchars($dernier_jeu['jeu_qte_stock']); ?></td>
        </tr>
    </table>
    <?php endif; ?>

    <p><a href="/jeux/index">Retour à la liste des jeux</a></p>
</div>
