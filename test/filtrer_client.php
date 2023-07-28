<?php
// Initialisez les valeurs de filtrage
$nom = $adresse = $numero_telephone = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les valeurs du formulaire
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $numero_telephone = $_POST["numero_telephone"];
}
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
// Requête pour filtrer les clients
$query = "SELECT * FROM clients WHERE nom LIKE '%$nom%' AND adresse LIKE '%$adresse%' AND numero_telephone LIKE '%$numero_telephone%'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Filtrer les clients</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Filtrer les clients</h1>
    <form action="" method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" value="<?= $nom; ?>"><br>
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" value="<?= $adresse; ?>"><br>
        <label for="numero_telephone">Téléphone:</label>
        <input type="text" name="numero_telephone" value="<?= $numero_telephone; ?>"><br>
        <input type="submit" value="Filtrer"><br><br>
        <a href="index.php">Accueil</a>

    </form>
    <br>
    <table>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Sexe</th>
            <th>Statut</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['nom']; ?></td>
                <td><?= $row['adresse']; ?></td>
                <td><?= $row['numero_telephone']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['sexe']; ?></td>
                <td><?= $row['statut']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Fermez la connexion
mysqli_close($conn);
?>
