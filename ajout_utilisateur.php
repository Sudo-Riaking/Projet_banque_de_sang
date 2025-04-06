<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'ajout d'utilisateur</title>
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
<header>Page d'inscription</header>

    <fieldset>
    <form method="POST" action=ajout_utilisateur.php >
        Login: <input type="text" name="login" /><br/>
        Mot de passe: <input type="password" name="pwd" /><br/>
        Role: <select name="role"><option value= "admin">Administrateur</option> 
        <option value= "gestionnaire">Gestionnaire</option>
        </select><br/>
        Nom: <input type="text" name="nom" /><br/>
        Prenom: <input type="text" name="prenom" /><br/>
        <input type="submit" value="S'inscrire" />
    </form>
    <?php
     $servername= "localhost";
     $dbname= "banque_of_blood";
     $username= "root";
     $password= "";
     $conn= new mysqli($servername, $username, $password, $dbname);
     if ($conn ->connect_error) {
        die("La connexion a echoué: ".$conn ->connect_error);
     }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST['login'];
            $password = $_POST['pwd'];
            $role = $_POST['role'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            // Protéger contre les injections SQL
            $login = mysqli_real_escape_string($conn, $login);
            $role = mysqli_real_escape_string($conn, $role);
            $sql_check = "SELECT * FROM utilisateur WHERE email = '$login'";
            $result_check = $conn->query($sql_check);
            
            if ($result_check->num_rows > 0) {
                echo "Ce login est déjà utilisé, veuillez en choisir un autre.";
            } else {
                // Insérer l'utilisateur dans la base de données
                $sql = "INSERT INTO utilisateur (email, password, role, nom, prenom) VALUES ('$login', '$password', '$role', '$nom', '$prenom')";
        
                if ($conn->query($sql) === TRUE) {
                    echo "Utilisateur inscrit avec succès! Vous pouvez maintenant vous connecter.";
                    header("Location: connexion.php");
                } else {
                    echo "Erreur : " . $sql . "<br>" . $conn->error;
                }
            }
        }
        
        // Fermer la connexion
        $conn->close();
        ?>
</body>
</html>