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
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $authorizationLevel = $_POST['authorization_level'];
    $action = $_POST['action'];

    // Utiliser une requête préparée pour insérer les données de manière sécurisée
    $query = "INSERT INTO utilisateurs (nom_utilisateur, niveau_autorisation, action) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sis", $username, $authorizationLevel, $action);

    if ($stmt->execute()) {
        // Rediriger vers la page principale après l'ajout réussi
        header("Location: index.php");
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur : " . $stmt->error;
    }       
}

// Fermez la connexion
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un nouvel utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un nouvel utilisateur</h1>
    <form method="post" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" required>
        <br><br>
        <label for="authorization_level">Niveau d'autorisation :</label>
        <input type="number" name="authorization_level" required>
        <br><br>
        <label for="action">Action :</label>
        <input type="text" name="action" required>
        <br><br>
        <input type="submit" value="Ajouter">
    </form>
    <br>
    <a href="gestion_autorisation.php">Retour à la liste des utilisateurs</a><br><br>


</body>
</html>
