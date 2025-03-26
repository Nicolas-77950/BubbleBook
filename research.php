<?php
// Include the header
require_once 'Header/header.php';
require_once 'Database.php';

$conn = Database::getConnection(); //connexion to database

if ($conn === null) {
    die("Impossible de se connecter à la base de données.");
}

//retrieving search parameters sent via URL
$mot_cle = isset($_GET['mot_cle']) ? $_GET['mot_cle'] : '';
$ville = isset($_GET['ville']) ? $_GET['ville'] : '';
$animal = isset($_GET['animal']) ? $_GET['animal'] : '';


$sql = "SELECT DISTINCT g.* FROM Groomer g
        LEFT JOIN Groomer_Species gs ON g.groomer_id = gs.groomer_id
        WHERE 1=1";
$params = array(); //array to store the parameters of the query

//filter by keyword
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
    $stmt = $conn->prepare($sql); //Prepare the SQL query
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de requête : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher un toiletteur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="container mx-auto max-w-5xl bg-white rounded-lg shadow-md p-4 sm:p-6">
        <h1 class="text-xl sm:text-2xl font-bold mb-6 text-center">Rechercher un toiletteur</h1>

        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="mot_cle" class="block text-sm font-medium text-gray-700">Mot clé</label>
                    <input type="text" name="mot_cle" id="mot_cle" placeholder="Nom, adresse..." value="<?php echo htmlspecialchars($mot_cle); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm p-2">
                </div>
                <div>
                    <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                    <input type="text" name="ville" id="ville" placeholder="Ville..." value="<?php echo htmlspecialchars($ville); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm p-2">
                </div>
                <div>
                    <label for="animal" class="block text-sm font-medium text-gray-700">Animal</label>
                    <input type="text" name="animal" id="animal" placeholder="Chien, chat..." value="<?php echo htmlspecialchars($animal); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm p-2">
                </div>
            </div>
            <button type="submit" class="w-full bg-pink-500 text-white py-2 px-4 rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition duration-300 ease-in-out transform hover:- salle hover:-translate-y-1">Rechercher</button>
        </form>

        <?php
        if (!empty($results)) {
            echo '<div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">';
            // Browse every groomer found
            foreach ($results as $row) {
                // Create a clickable map to tarif.php with the groomer's ID
                echo '<a href="tarif.php?groomer_id=' . $row['groomer_id'] . '" class="block bg-white rounded-lg shadow-md p-4 hover:bg-gray-100 transition duration-300">';
                echo '<h2 class="text-lg font-semibold mb-2">' . htmlspecialchars($row['groomer_name']) . ' (#' . $row['groomer_id'] . ')</h2>';
                echo '<p class="text-sm"><strong>Adresse:</strong> ' . htmlspecialchars($row['address']) . '</p>';
                echo '<p class="text-sm"><strong>Ville:</strong> ' . htmlspecialchars($row['city']) . '</p>';
                echo '<p class="text-sm"><strong>Département:</strong> ' . htmlspecialchars($row['department']) . '</p>';
                echo '<p class="text-sm"><strong>Vérifié:</strong> ' . ($row['is_verified'] ? '<i class="fas fa-check-circle text-green-500"></i>' : '<i class="fas fa-minus-circle text-red-500"></i>') . '</p>';
                echo '</a>';
            }
            echo '</div>';
        } else {
            echo '<p class="text-center mt-6 text-gray-600">Aucun toiletteur trouvé.</p>';
        }
        ?>
    </div>
</body>
<?php
// Include the footer
  require_once "Footer/footer.php";
?>
</html>