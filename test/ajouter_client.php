<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un client</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Ajouter un client</h1>
    <form action="" method="post">

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

        <input type="submit" value="Ajouter"><br><br>
        <a href="index.php">Accueil</a>

    </form>
</body>
</html>

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
// Vous êtes maintenant connecté à la base de données.

// Vous pouvez exécuter des requêtes et interagir avec la base de données ici.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $numero_telephone = $_POST["numero_telephone"];
    $email = $_POST["email"];
    $sexe = $_POST["sexe"];
    $statut = $_POST["statut"];

     // Insérez les données dans la table des clients
     $query = "INSERT INTO clients (nom, adresse, numero_telephone, email, sexe, statut) VALUES ('$nom', '$adresse', '$numero_telephone', '$email', '$sexe', '$statut')";
     $result = mysqli_query($conn, $query);


     if ($result) {
        echo "Le client a été ajouté avec succès.";
    } else {
        echo "Une erreur est survenue lors de l'ajout du client.";
    }

}
// Fermer la connexion lorsque vous avez terminé avec la base de données.
$conn->close();
?>

