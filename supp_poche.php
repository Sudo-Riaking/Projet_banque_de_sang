<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de suppression de poche de sang</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #fce4ec;
        color: #880e4f;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #f8bbd0;
        color: #880e4f;
        padding: 20px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .message {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
        color: #d81b60;
    }
    h2 {
        color: #880e4f;
        text-align: center;
        margin-top: 40px;
    }

    .table-blood {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: 'Segoe UI', sans-serif;
    }

    .table-blood th, .table-blood td {
        border: 1px solid #ec407a;
        padding: 10px;
        text-align: center;
    }

    .table-blood th {
        background-color: #f8bbd0;
        color: #880e4f;
    }

    .table-blood tr:nth-child(even) {
        background-color: #fce4ec;
    }

    .table-blood tr:hover {
        background-color: #f48fb1;
        color: white;
    }
</style>
</head>
<body>
<header>Page de suppression de poche de sang</header>
<nav>
        <a href="ajout_utilisateur.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
        <a href="ajout_poche.php">Ajouter une Poche</a>
    </nav>
</body>
</html>
<?php
session_start();
// Connexion à la base de données d'abord
$conn = mysqli_connect("localhost", "root", "", "banque_of_blood");

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

// Si un ID est passé en paramètre GET pour suppression
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sécurisation

    // Requête de suppression
    $sql = "DELETE FROM blood WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color: green;'>Poche supprimée avec succès !</p>";
    } else {
        echo "<p style='color: red;'>Erreur lors de la suppression : " . mysqli_error($conn) . "</p>";
    }
}

// Récupération des poches pour affichage
$result = mysqli_query($conn, "SELECT * FROM blood");

echo "<h2>Liste des poches de sang disponibles</h2>";
echo "<table border='1' cellpadding='10' class='table-blood'>
<tr>
    <th>ID</th>
    <th>Groupe sanguin</th>
    <th>Rhesus</th>
    <th>Quantité (ml)</th>
    <th>Date d'ajout</th>
    <th>Date d'expiration</th>
    <th>Ajoutée par l'utilisateur</th>
    <th>Action</th>
</tr>";

// Affichage des poches
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['type_sang']."</td>
        <td>".$row['rhesus']."</td>
        <td>".$row['quantite']."</td>
        <td>".$row['date_ajout']."</td>
        <td>".$row['date_expiration']."</td>
        <td>".$row['id_utilisateur']."</td>
        <td><a href='supp_poche.php?id=".$row['id']."' onclick=\"return confirm('Supprimer cette poche ?');\">Supprimer</a></td>
    </tr>";
}

echo "</table>";

// Fermeture de la connexion
$conn->close();
?>