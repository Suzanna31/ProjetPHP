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
// Récupérez la liste des utilisateurs depuis la base de données
$query = "SELECT * FROM utilisateurs";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gérer les droits d'accès des utilisateurs</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Gérer les droits d'accès des utilisateurs</h1>
    <table>
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Niveau d'autorisation</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['nom_utilisateur']; ?></td>
                <td><?= $row['niveau_autorisation']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="ajouter_utilisateur.php">Ajouter un nouvel utilisateur</a><br><br>
    <a href="index.php">Accueil</a>


</body>
</html>

<?php
// Fermez la connexion
mysqli_close($conn);
?>
