<!DOCTYPE html>
<html>
<head>
<title>Afficher une table MariaDB</title>
</head>
<body>

<h1>Mon logo</h1>
<img src="bankto.png" alt="Logo de mon site">

<?php
$ssl_cert = 'Microsoft RSA Root Certificate Authority 2017.crt';
// Paramètres de connexion
$host = '20.119.16.42';
$username = 'wazo';
$password = '18022000Dragau&';
$database = 'bankto';

// Connecter à la base de données MariaDB
$db = new mysqli($host, $username, $password, $database);

// Vérifier la connexion
if ($db->connect_error) {
    die('Erreur de connexion (' . $db->connect_errno . ') ' . $db->connect_error);
}

// Sélectionner les données de la table
$query = "SELECT nom, prenom, adresse FROM votre_table";
$result = $db->query($query);

// Vérifier le résultat de la requête
if (!$result) {
    die('Erreur dans la requête (' . $db->errno . ') ' . $db->error);
}

// Afficher les données dans un tableau HTML
echo "<table>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Adresse</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['adresse']) . "</td>";
    echo "</tr>";
}
echo "</table>";

// Fermer la connexion à la base de données
$db->close();
?>

</body>
</html>
