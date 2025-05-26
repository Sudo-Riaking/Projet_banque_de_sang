<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'ajout de poche de sang</title>
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

    fieldset {
        width: 400px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border: 2px solid #f06292;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(136, 14, 79, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    select {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #f48fb1;
        border-radius: 5px;
        background-color: #fce4ec;
    }

    input[type="submit"] {
        background-color: #e91e63;
        color: white;
        border: none;
        padding: 12px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #ad1457;
    }

    select {
        background-color: #f8bbd0;
    }

    .message {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
        font-weight: bold;
        color: #d81b60;
    }
</style>

</head>
<body>
<header>Page d'ajout de poche de sang</header>
<nav>
        <a href="ajout_utilisateur.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
        <a href="supp_poche.php">Supprimer une poche</a>
    </nav>
<?php
    session_start();
    echo "Bienvenue, " . $_SESSION['login'];
?>
    <fieldset>
    <form method="POST" action=ajout_poche.php >
        Type de sang <select name="type"><option value= "A">A</option> 
        <option value= "B">B</option><option value= "AB">AB</option><option value= "O">O</option></select><br/>
        Rhesus <select name="rhesus"><option value= "+">Positif</option> 
        <option value= "-">Negatif</option>
        </select><br/>
        Quantité <input type="text" name="quantite" /><br/>
        Date de collection <input type="date" name="collect" /><br/>
        Date d'expirattion <input type="date" name="expire" /><br/>
        Prenom du donneur <input type="text" name="prenom" /><br/>
        Nom du donneur<input type="text" name="nom" /><br/>
        Age du donneur <input type="text" name="age" /><br/>
        <input type="submit" name="submit" value="Enregistrer" />
    </form>
    <?php
        $servername = "localhost";
        $dbname = "banque_of_blood";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $rhesus = mysqli_real_escape_string($conn, $_POST['rhesus']);
            $quantite = mysqli_real_escape_string($conn, $_POST['quantite']);
            $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
            $nom = mysqli_real_escape_string($conn, $_POST['nom']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $collect = mysqli_real_escape_string($conn, $_POST['collect']);
            $expire = mysqli_real_escape_string($conn, $_POST['expire']);

            $login = $_SESSION['login'];
            $req = "SELECT id FROM utilisateur WHERE email = '$login'";
            $res = $conn->query($req);

            if ($res && $res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $id_utilisateur = $row['id'];
                $sql = "INSERT INTO blood (
                            type_sang, rhesus, quantite,
                            donneur_nom, donneur_prenom, donneur_age,
                            date_collection, date_expiration, id_utilisateur
                        ) VALUES (
                            '$type', '$rhesus', '$quantite',
                            '$nom', '$prenom', $age,
                            '$collect', '$expire', $id_utilisateur
                        )";

                if ($conn->query($sql) === TRUE) {
                    echo "La donation a été ajoutée avec succès!";
                } else {
                    echo "Erreur lors de l'insertion : " . $conn->error;
                }
                
            } else {
                echo "Utilisateur non trouvé.";
            }
}
        $conn->close();
?>

</body>
</html>