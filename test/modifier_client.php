<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier un client</h1>
    <form action="" method="post">

        <label for="id_client_a_modifier">ID du client à modifier:</label>
        <input type="number" name="id_client_a_modifier" required><br><br>

        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br><br>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" required><br><br>

        <label for="numero_telephone">Téléphone:</label>
        <input type="text" name="numero_telephone" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="sexe">Sexe:</label>
        <select name="sexe">
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select><br><br>

        <label for="statut">Statut:</label>
        <select name="statut">
            <option value="actif">Actif</option>
            <option value="inactif">Inactif</option>
        </select><br><br>
        <input type="submit" name="modifier" value="Modifier"><br><br>
        <a href="index.php">Accueil</a>

    </form>

    <?php
// Informations de connexion à la base de données
$host = 'localhost'; // Adresse de la base de données MySQL
$user = 'root'; // Remplacez par le nom d'utilisateur MySQL
$password = ''; // Remplacez par le mot de passe de l'utilisateur MySQL
$database = 'clients'; // Nom de la base de données MySQL

    // Connexion à la base de données
    $conn = new mysqli($host, $user, $password, $database);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die('Erreur : ' . $conn->connect_error);
    }

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['modifier'])) {
        // Récupérer les nouvelles informations saisies dans le formulaire
        $id_client_a_modifier = $_POST["id_client_a_modifier"];
        $nouveau_nom = $_POST["nom"];
        $nouvelle_adresse = $_POST["adresse"];
        $nouveau_telephone = $_POST["numero_telephone"];
        $nouvel_email = $_POST["email"];
        $nouveau_sexe = $_POST["sexe"];
        $nouveau_statut = $_POST["statut"];

        // Requête SQL UPDATE
        $sql = "UPDATE clients 
                SET nom = '$nouveau_nom', 
                    adresse = '$nouvelle_adresse', 
                    numero_telephone = '$nouveau_telephone', 
                    email = '$nouvel_email', 
                    sexe = '$nouveau_sexe', 
                    statut = '$nouveau_statut' 
                WHERE id = $id_client_a_modifier";

        // Exécution de la requête
        if ($conn->query($sql) === TRUE) {
            echo "Mise à jour réussie";
        } else {
            echo "Erreur lors de la mise à jour : " . $conn->error;
        }
    }

    // Fermer la connexion
    $conn->close();
    ?>
</body>
</html>
