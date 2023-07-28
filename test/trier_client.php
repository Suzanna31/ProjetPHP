<?php
// Initialisez les valeurs de tri
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'nom';
$ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'asc';

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
// Requête pour trier les clients
$query = "SELECT * FROM clients ORDER BY $tri $ordre";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trier les clients</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Trier les clients</h1>
    <p>Trier par:
        <a href="?tri=nom&ordre=<?= $ordre === 'asc' ? 'desc' : 'asc'; ?>">Nom</a> |
        <a href="?tri=adresse&ordre=<?= $ordre === 'asc' ? 'desc' : 'asc'; ?>">Adresse</a> |
        <a href="?tri=numero_telephone&ordre=<?= $ordre === 'asc' ? 'desc' : 'asc'; ?>">Téléphone</a> |
        <a href="?tri=statut&ordre=<?= $ordre === 'asc' ? 'desc' : 'asc'; ?>">Statut</a>
    </p>
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
    <a href="index.php">Accueil</a>

</body>
</html>

<?php
// Fermez la connexion
mysqli_close($conn);
?>
