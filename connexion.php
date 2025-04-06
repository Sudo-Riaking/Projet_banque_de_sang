<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #fce4ec; /* rose très clair */
        color: #880e4f; /* vieux rose foncé */
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #f8bbd0; /* vieux rose doux */
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
        background-color: #e91e63; /* rouge rosé */
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
    <header>Page de connexion</header>
    <fieldset>
    <form method="POST" action=connexion.php >
        Login: <input type="text" name="login" /><br/>
        Mot de passe: <input type="password" name="pwd" /><br/>
        Role: <input type="text" name="role" /><br/>
        <input type="submit" value="Se connecter" />
    </form>
    <?php
        session_start();
        $conn = new mysqli("localhost", "root", "", "banque_of_blood");
        if ($conn->connect_error) {
            die("Erreur de connexion : " . $conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST['login'] ?? '';
            $mot_de_passe = $_POST['pwd'] ?? '';
            $role = $_POST['role'] ?? '';
        $sql = "SELECT * FROM utilisateur WHERE email = '$login' AND password = '$mot_de_passe'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Création de la session
            $_SESSION['login'] = $user['email'] ?? '';
            $_SESSION['role'] = $user['role'] ?? '';
            if ($user['email'] ?? '' == $login and $user['role'] == $role){
                header("Location: ajout_poche.php");
            }
            else {
                echo "Identifiants incorrects.";
        }
        }
    }
        $conn->close();
?>
    </fieldset>
</body>
</html>