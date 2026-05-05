<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <style>
        h1 {
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 40px;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 12px 8px;
            border-bottom: 2px solid #000;
        }

        td {
            padding: 12px 8px;
            border-bottom: 1px solid #e0e0e0;
        }

    </style>
</head>
<body>

<div id="contenu">

    <h1>Tableau des Clients</h1>

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Genre</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>CP</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Téléphone</th>
                <th>Date Naiss.</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($clients)): ?>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= htmlspecialchars($client['client_code']) ?></td>
                        <td><?= htmlspecialchars($client['client_genre']) ?></td>
                        <td><?= htmlspecialchars($client['client_prenom']) ?></td>
                        <td style="font-weight:bold;"><?= htmlspecialchars($client['client_nom']) ?></td>
                        <td><?= htmlspecialchars($client['client_adr']) ?></td>
                        <td><?= htmlspecialchars($client['client_cp']) ?></td>
                        <td><?= htmlspecialchars($client['client_ville']) ?></td>
                        <td><?= htmlspecialchars($client['client_pays']) ?></td>
                        <td style="white-space: nowrap;"><?= htmlspecialchars($client['client_tel']) ?></td>
                        <td><?= htmlspecialchars($client['client_date_naiss']) ?></td>
                        <td><?= htmlspecialchars($client['client_email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" class="no-data">Aucune donnée disponible.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div id="contenu">

</body>
</html>