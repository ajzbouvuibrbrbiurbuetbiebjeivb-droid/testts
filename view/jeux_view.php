<div id="contenu">
    <h1>Jeux</h1>
    <p>Voici la liste des jeux disponibles sur le site :</p>
    <table>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Editeur</th>
            <th>Photo1</th>
            <th>Photo2</th>
        </tr>
        <?php
        $titre=(isset($titre)) ? $titre : "";
        echo "<H2>".$titre."</H2>";
        foreach ($jeux as $jeu) {
            echo '<tr>';
            echo '<td>' . $jeu['jeu_code'] . '</td>';
            echo '<td>' . $jeu['jeu_nom'] . '</td>';
            echo '<td>' . $jeu['jeu_editeur'] . '</td>';
            echo '<td><img width="100px" height="100px" src="/view/' . $jeu['jeu_photo1'] . '"></td>';
            echo '<td><img width="100px" height="100px" src="/view/' . $jeu['jeu_photo2'] . '"></td>';
            echo '</tr>';
        }
        ?>
<div class="remarque"></div>
</div>