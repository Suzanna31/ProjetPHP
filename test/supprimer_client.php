<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supprimer un client</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier un client</h1>
    <form action="" method="post">

        <label for="id_client_a_supprimer">ID du client à supprimer:</label>
        <input type="number" name="id_client_a_supprimer" required><br><br>

        <input type="submit" name="supprimer" value="Supprimer"><br><br>
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
    if (isset($_POST['supprimer'])) {
        // Récupérer l'ID du client à supprimer
        $id_client_a_supprimer = $_POST['id_client_a_supprimer'];
    
        // Requête SQL DELETE
        $sql = "DELETE FROM clients WHERE id = $id_client_a_supprimer";
    
        // Exécution de la requête
        if ($conn->query($sql) === TRUE) {
            echo "Suppression réussie";
        } else {
            echo "Erreur lors de la suppression : " . $conn->error;
        }
    }
    
    // Fermer la connexion
    $conn->close();
    ?>
</body>
</html>
