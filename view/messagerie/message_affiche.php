<div id="contenu">
    <h2>Objet : <?= htmlspecialchars($message['sujet']) ?></h2>
    <h3>Expéditeur : <?= htmlspecialchars($message['expediteur']) ?></h3>
    <h3>Destinataire : <?= htmlspecialchars($message['destinataire']) ?></h3>
    <br>
    <p><strong>Statut :</strong> <?= htmlspecialchars($message['statut']) ?></p>
    <p><strong>Date d'envoi :</strong> <?= htmlspecialchars($message['date_envoi']) ?></p>
    
    <div style="background-color: #f9f9f9; border: 1px solid #ccc; padding: 15px; margin: 20px 0;">
        <p><?= nl2br(htmlspecialchars($message['message'])) ?></p>
    </div>
    
    <a href="/messagerie">Retour à la liste des messages</a>
</div>