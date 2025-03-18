<?php
// Connexion à la base de données
$host = 'bubblebook-project-db-1';
$dbname = 'bubble';
$username = 'root'; // À modifier selon votre configuration
$password = 'mariadb'; // À modifier selon votre configuration

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $groomer_id = 1;
        $service_name = $_POST['service_name'];
        $duration = $_POST['duration'];
        $price_ht = $_POST['price_ht'];
        $vat = $_POST['vat'];
        
        // Préparer et exécuter la requête d'insertion
        $stmt = $pdo->prepare("
            INSERT INTO Service (groomer_id, service_name, duration, price_ht, vat)
            VALUES (:groomer_id, :service_name, :duration, :price_ht, :vat)
        ");
        
        $stmt->execute([
            'groomer_id' => $groomer_id,
            'service_name' => $service_name,
            'duration' => $duration,
            'price_ht' => $price_ht,
            'vat' => $vat
        ]);
        
        // Redirection vers la page tarif.php avec le groomer_id
        header("Location: tarif.php?groomer_id=" . $groomer_id);
        exit;
    }
    
    // Récupérer le groomer_id depuis l'URL
    $groomer_id = isset($_GET['groomer_id']) ? $_GET['groomer_id'] : null;
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

require_once 'Header/header.php';
?>

    <div class="w-full max-w-md m-4 p-6 bg-white rounded-lg shadow-md p-10 m-auto mt-10 mb-10">
        <h1 class="text-2xl font-bold text-center mb-6">Ajouter un nouveau service</h1>
        
        <form method="POST" action="addService.php" class="space-y-4">
            <!-- Champ caché pour le groomer_id -->
            <input type="hidden" name="groomer_id" value="<?php echo htmlspecialchars($groomer_id); ?>">
            
            <!-- Nom du service -->
            <div>
                <label for="service_name" class="block text-sm font-medium text-gray-700">Nom du service</label>
                <input type="text" id="service_name" name="service_name" required 
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            
            <!-- Durée -->
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Durée (en minutes)</label>
                <input type="number" id="duration" name="duration" required min="1"
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            
            <!-- Prix HT -->
            <div>
                <label for="price_ht" class="block text-sm font-medium text-gray-700">Prix HT (€)</label>
                <input type="number" id="price_ht" name="price_ht" required step="0.01" min="0"
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            
            <!-- TVA -->
            <div>
                <label for="vat" class="block text-sm font-medium text-gray-700">TVA (%)</label>
                <input type="number" id="vat" name="vat" required step="0.01" min="0"
                       class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            
            <!-- Boutons -->
            <div class="flex justify-between">
                <button type="submit" 
                        class="w-1/2 mr-2 p-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Ajouter
                </button>
                <a href="tarif.php?groomer_id=<?php echo htmlspecialchars($groomer_id); ?>" 
                   class="w-1/2 ml-2 p-2 bg-gray-500 text-white text-center rounded hover:bg-gray-600">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</body>
<?php
    require_once 'Footer/footer.php';
?>