<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Banque de Sang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fce4ec;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f06292;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        nav {
            background-color: #ec407a;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ffebee;
        }

        main {
            text-align: center;
            margin-top: 60px;
        }

        h2 {
            color: #880e4f;
            font-size: 24px;
        }

        p {
            color: #ad1457;
            font-size: 18px;
        }

        footer {
            margin-top: 60px;
            text-align: center;
            padding: 20px;
            background-color: #f8bbd0;
            color: #880e4f;
        }
    </style>
</head>
<body>
    <header>Banque de Sang - Accueil</header>
    
    <nav>
        <a href="ajout_utilisateur.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
        <a href="ajout_poche.php">Ajouter une Poche</a>
        <a href="supp_poche.php">Supprimer une poche</a>
        <a href="#">À propos</a>
    </nav>

    <main>
        <h2>Bienvenue sur la plateforme de gestion des dons de sang</h2>
        <p>Veuillez vous connecter ou ajouter une nouvelle poche de sang si vous êtes déjà connecté.</p>
    </main>

    <footer>
        &copy; <?php echo date('Y'); ?> Banque de Sang. Tous droits réservés.
    </footer>
</body>
</html>
