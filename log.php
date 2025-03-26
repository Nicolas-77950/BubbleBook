<?php 
require_once "Header/header.php";
require_once "Log/logAjax.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$logs = getLog($user_id);
?>

<div class="container mx-auto px-4 py-10 pb-20 mb-20">
    <div class="bg-white rounded-lg shadow-md p-6 mb-20">
        <h1 class="text-xl font-semibold text-gray-800 mb-10">Historique des rendez-vous</h1>
        
        <?php if (empty($logs)): ?>
            <div class="text-center py-10">
                <i class="fas fa-calendar-check text-gray-300 text-5xl mb-3"></i>
                <h1 class="text-gray-500">Aucun rendez-vous passés</h1>
                <a href="research.php" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Prendre un rendez-vous
                </a>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($logs as $log): ?>
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition duration-200">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="mb-3 md:mb-0">
                                <h3 class="font-medium text-gray-800"><?php echo htmlspecialchars($log['service_name']); ?></h3>
                                <p class="text-sm text-gray-600">Avec <?php echo htmlspecialchars($log['groomer_name']); ?></p>
                            </div>
                            <div class="mb-3 md:mb-0">
                                <p class="text-gray-700">
                                    <i class="far fa-calendar-alt text-blue-500 mr-1"></i>
                                    <?php echo date('d/m/Y', strtotime($log['reservation_date'])); ?>
                                </p>
                                <p class="text-gray-700">
                                    <i class="far fa-clock text-blue-500 mr-1"></i>
                                    <?php echo date('H:i', strtotime($log['reservation_date'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php 
require_once "Footer/footer.php";
?>