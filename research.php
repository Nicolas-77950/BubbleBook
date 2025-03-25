<?php
require_once 'Database.php';

$conn = Database::getConnection();

if ($conn === null) {
    die("Impossible de se connecter à la base de données.");
}

$mot_cle = isset($_GET['mot_cle']) ? $_GET['mot_cle'] : '';
$ville = isset($_GET['ville']) ? $_GET['ville'] : '';
$animal = isset($_GET['animal']) ? $_GET['animal'] : '';

$sql = "SELECT DISTINCT g.* FROM Groomer g 
        LEFT JOIN Groomer_Species gs ON g.groomer_id = gs.groomer_id 
        WHERE 1=1";
$params = array();

if (!empty($mot_cle)) {
    $sql .= " AND (g.groomer_name LIKE :mot_cle OR g.address LIKE :mot_cle OR g.city LIKE :mot_cle OR g.department LIKE :mot_cle OR gs.species LIKE :mot_cle)";
    $params[':mot_cle'] = "%$mot_cle%";
}

if (!empty($ville)) {
    $sql .= " AND g.city LIKE :ville";
    $params[':ville'] = "%$ville%";
}

if (!empty($animal)) {
    $sql .= " AND gs.species LIKE :animal";
    $params[':animal'] = "%$animal%";
}

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de requête : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher un toiletteur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Rechercher un toiletteur</h1>
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="space-y-4">
            <div>
                <label for="mot_cle" class="block text-sm font-medium text-gray-700">Mot clé (nom, adresse, ville, département, animal)...</label>
                <input type="text" name="mot_cle" id="mot_cle" placeholder="Mot clé..." value="<?php echo htmlspecialchars($mot_cle); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                <input type="text" name="ville" id="ville" placeholder="Ville..." value="<?php echo htmlspecialchars($ville); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="animal" class="block text-sm font-medium text-gray-700">Type d'animal</label>
                <input type="text" name="animal" id="animal" placeholder="Ex: chien, chat" value="<?php echo htmlspecialchars($animal); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:-translate-y-1">Rechercher</button>
        </form>

        <?php
        if (!empty($results)) {
            echo '<div class="mt-8">';
            foreach ($results as $row) {
                echo '<a href="tarif.php?groomer_id=' . $row['groomer_id'] . '" class="block bg-white rounded-lg shadow-md p-6 mb-4 hover:bg-gray-100 transition duration-300">';
                echo '<h2 class="text-xl font-semibold mb-2">' . htmlspecialchars($row['groomer_name']) . ' (#' . $row['groomer_id'] . ')</h2>';
                echo '<p><strong>SIRET:</strong> ' . htmlspecialchars($row['siret_number']) . '</p>';
                echo '<p><strong>Adresse:</strong> ' . htmlspecialchars($row['address']) . '</p>';
                echo '<p><strong>Ville:</strong> ' . htmlspecialchars($row['city']) . '</p>';
                echo '<p><strong>Département:</strong> ' . htmlspecialchars($row['department']) . '</p>';
                echo '<p><strong>Vérifié:</strong> ' . ($row['is_verified'] ? 'Oui' : 'Non') . '</p>';
                echo '</a>';
            }
            echo '</div>';
        } else {
            echo '<p class="text-center mt-8">Aucun toiletteur trouvé.</p>';
        }
        ?>
    </div>
</body>
</html>