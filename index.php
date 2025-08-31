<?php
require_once __DIR__ . '/app/config/config.php';

require_once __DIR__ . '/controllers/MahasiswaController.php';

$controller = new MahasiswaController($conn);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST);
        break;
    default:
        $controller->index();
        break;
}
