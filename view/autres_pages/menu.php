<header>
    <?php
    // On vérifie si la session n'est pas déjà active avant de la démarrer
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <img src="/view/img/wr213_logo.png" alt="logo" id="logo" />
    <nav>
        <a href="/">Accueil</a>
        <a href="/jeux">Jeux</a>
        <a href="/clients">Client</a>
        <a href="/contact">Contact</a>
        <?php if (isset($_SESSION['client_email'])) : ?>
            <a href="/messagerie">Messagerie</a>
            <a href="/messagerie/nouveau_message">Nouveau message</a>
        <?php endif; ?>
    </nav>
</header>