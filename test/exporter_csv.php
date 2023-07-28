<?php
// Informations de connexion à la base de données
$host = 'localhost'; // Adresse de la base de données MySQL
$user = 'root'; // Remplacez par le nom d'utilisateur MySQL
$password = ''; // Remplacez par le mot de passe de l'utilisateur MySQL
$database = 'clients'; // Nom de la base de données MySQL


// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $database);

// Récupérez la liste des clients depuis la base de données
$query = "SELECT * FROM clients";
$result = mysqli_query($conn, $query);


// Entête du fichier CSV
$csv_output = "Nom,Adresse,numero_telephone,Email,Sexe,Statut\n";

// Lignes de données
while ($row = mysqli_fetch_assoc($result)) {
    $csv_output .= "{$row['nom']},{$row['adresse']},{$row['numero_telephone']},{$row['email']},{$row['sexe']},{$row['statut']}\n";
}

// Entête HTTP pour le téléchargement du fichier CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="liste_clients.csv"');

// Affichage du contenu CSV
echo $csv_output;

// Fermez la connexion
mysqli_close($conn);
?>
