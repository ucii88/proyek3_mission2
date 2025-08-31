<?php
require_once __DIR__ . '/controllers/MahasiswaController.php';

$controller = new MahasiswaController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'detail':
        $controller->detail();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'reset':
        $controller->reset();
        break;
    default:
        $controller->index();
        break;
}
?>