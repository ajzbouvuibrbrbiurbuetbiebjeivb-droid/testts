<div id="contenu">
    <h1>Messagerie</h1>

    <!-- Affichage des messages flash (Validation ou Erreur) -->
    <?php if (isset($_SESSION['message_flash'])): ?>
        <p style="color: green; font-weight: bold;"><?= $_SESSION['message_flash'] ?></p>
        <?php unset($_SESSION['message_flash']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['message_erreur'])): ?>
        <p style="color: red; font-weight: bold;"><?= $_SESSION['message_erreur'] ?></p>
        <?php unset($_SESSION['message_erreur']); ?>
    <?php endif; ?>

    <h2>Messages reçus</h2>
    <table>
        <tr>
            <th>Expéditeur</th>
            <th>Sujet</th>
            <th>Date d'envoi</th>
            <th>Statut</th>
            <th>Action</th>
        </tr>
        <?php foreach ($messagesR as $message): ?>
            <tr>
                <td><?= htmlspecialchars($message['expediteur']) ?></td>
                <td><?= htmlspecialchars($message['sujet']) ?></td>
                <td><?= htmlspecialchars($message['date_envoi']) ?></td>
                <td><?= htmlspecialchars($message['statut']) ?></td>
                <td>
                    <a href="/messagerie/afficher_message?id=<?= $message['id'] ?>">Afficher</a> | 
                    <a href="/messagerie/supprimer_message?id=<?= $message['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br><br>

    <h2>Messages envoyés</h2>
    <table>
        <tr>
            <th>Destinataire</th>
            <th>Sujet</th>
            <th>Date d'envoi</th>
            <th>Statut</th>
            <th>Action</th>
        </tr>
        <?php foreach ($messagesE as $message): ?>
            <tr>
                <td><?= htmlspecialchars($message['destinataire']) ?></td>
                <td><?= htmlspecialchars($message['sujet']) ?></td>
                <td><?= htmlspecialchars($message['date_envoi']) ?></td>
                <td><?= htmlspecialchars($message['statut']) ?></td>
                <td>
                    <a href="/messagerie/afficher_message?id=<?= $message['id'] ?>">Afficher</a> | 
                    <a href="/messagerie/supprimer_message?id=<?= $message['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>