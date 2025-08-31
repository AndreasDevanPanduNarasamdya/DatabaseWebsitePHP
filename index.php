<?php
require_once __DIR__ . '/app/Config/Config.php';

require_once __DIR__ . '/app/Controllers/MahasiswaController.php';

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
