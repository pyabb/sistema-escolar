<?php
include_once __DIR__ . '/../../bootstrap/index.php';
include_once '../security.php';
include_once $_SESSION['raiz'] . '/modules/conexion.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

unset($_SESSION['temp_select_teachers']);

if (isset($_POST['txtselectteachers'])) {
    $_SESSION['temp_select_teachers'] = $_POST['txtselectteachers'];
} else {
    header('Location: ' . app_path());
    exit();
}