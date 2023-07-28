<!DOCTYPE html>
<html>
<head>
<title>Gestion de client - Accueil </title>
<link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
    <h1>Bienvenu sur l'application simple et efficace de Suzanna</h1>
    </header>

        <main>
        <section class="description">

        La gestion de la relation client est un processus qui consiste à établir et à maintenir des relations avec les clients. C'est une partie importante de toute entreprise, car elle peut aider à améliorer la satisfaction client, à augmenter les ventes et à fidéliser les clients.<br><br>

Il existe de nombreuses façons différentes d'appliquer la gestion de la relation client. Certaines entreprises utilisent des logiciels CRM, tandis que d'autres utilisent des méthodes plus manuelles. Il n'y a pas de bonne ou de mauvaise façon d'appliquer la gestion de la relation client, l'important est de trouver une méthode qui fonctionne pour votre entreprise.<br><br>

Voici quelques-uns des avantages de la gestion de la relation client :<br>

<li>Amélioration de la satisfaction client : En suivant les interactions avec vos clients, vous pouvez identifier les domaines dans lesquels vous pouvez améliorer leur expérience. Cela peut entraîner une augmentation de la satisfaction client, qui peut conduire à des ventes et à des revenus plus élevés.</li>
<li>Augmentation des ventes : En connaissant mieux vos clients, vous pouvez leur proposer des produits et services plus adaptés à leurs besoins. Cela peut entraîner une augmentation des ventes et des revenus.</li>
<li>Fidélisation des clients : En fournissant un excellent service client, vous pouvez fidéliser vos clients. Cela signifie qu'ils sont plus susceptibles de continuer à faire des affaires avec vous et de vous recommander à leurs amis et à leur famille.</li>
Si vous souhaitez améliorer votre entreprise, la gestion de la relation client est un excellent moyen de commencer. En suivant les interactions avec vos clients et en leur fournissant un excellent service, vous pouvez améliorer leur satisfaction, augmenter vos ventes et fidéliser vos clients.        </section>

<h1>Rapports sur les clients </h1>
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
    // Requête SQL pour récupérer les données de la table "clients"
    $sql = "SELECT * FROM clients";

    // Exécution de la requête et récupération des résultats
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Afficher le tableau HTML avec les données
        echo '<table>';
        echo '<tr><th>ID</th><th>Nom</th><th>Adresse</th><th>Téléphone</th><th>Email</th><th>Sexe</th><th>Statut</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['adresse'] . '</td>';
            echo '<td>' . $row['numero_telephone'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['sexe'] . '</td>';
            echo '<td>' . $row['statut'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucun client trouvé.';
    }

    // Fermer la connexion
    $conn->close();
    ?>

        <section class="tache">
        <h2>Tâches</h2>
        <ul>
       <li> <a href="ajouter_client.php">Créer un nouveau client</a> </li>
       <li> <a href="modifier_client.php">Modifier les informations d'un client</a> </li>
       <li> <a href="supprimer_client.php">Supprimer un client de la liste</a> </li>
       <li> <a href="filtrer_client.php">Filtrer </a> </li>
       <li> <a href="trier_client.php">Trier </a> </li>
       <li> <a href="exporter_csv.php">Exporter la liste au format CSV</a> </li>
       <li> <a href="gestion_autorisation.php">Gérer les droits d'accès</a> </li>

        </ul>
        </section>
        </main>

    <footer>
    Email : suzannapoaty1@gmail.com<br>
    Tel : 78 425 28 96/ 76 348 51 18
    </footer>
</body>
</html>
