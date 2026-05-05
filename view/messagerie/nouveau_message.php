<div id="contenu">
    <h1>Nouveau message</h1>
    
    <form method="post" action="/messagerie/envoyer_message" style="display:flex; flex-direction:column; max-width: 400px;">
        <label for="destinataire">Destinataire :</label>
        <select name="destinataire" id="destinataire" required>
            <option value="">Sélectionnez un destinataire</option>
            <?php foreach ($clients as $utilisateur): ?>
                <!-- On empêche de s'envoyer un message à soi-même -->
                <?php if ($utilisateur['client_email'] !== $_SESSION['client_email']): ?>
                    <option value="<?= htmlspecialchars($utilisateur['client_email']) ?>">
                        <?= htmlspecialchars($utilisateur['client_nom']) ?> <?= htmlspecialchars($utilisateur['client_prenom']) ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="sujet">Sujet :</label>
        <input type="text" name="sujet" id="sujet" required>
        <br>

        <label for="message">Message :</label>
        <textarea name="message" id="message" rows="6" required></textarea>
        <br>

        <input type="submit" value="Envoyer">
    </form>
</div>