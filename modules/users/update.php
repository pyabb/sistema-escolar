<?php
include_once '../security.php';
include_once '../conexion.php';


require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

if (empty($_POST['txtuseridUpdate'])) {
	header('Location: /');
	exit();
}

$sql_update = "UPDATE users SET email = '" . $_POST['txtemailUpdate'] . "', permissions = '" . $_POST['txtusertype'] . "' WHERE user = '" . $_POST['txtuseridUpdate'] . "'";

if (mysqli_query($conexion, $sql_update)) {
	$_SESSION['msgbox_error'] = 0;
	$_SESSION['msgbox_info'] = 1;
	$_SESSION['text_msgbox_info'] = 'Usuario actualizado';

	if ($nombre_img != "") {
		if ($_POST['txtuseridUpdate'] == $_SESSION['user']) {
			$_SESSION['image'] = $nombre_img;
			setcookie('image', $nombre_img, time() + 365 * 24 * 60 * 60, "/");
		}
	}
} else {
	$_SESSION['msgbox_info'] = 0;
	$_SESSION['msgbox_error'] = 1;
	$_SESSION['text_msgbox_error'] = 'Error al actualizar';
}

header('Location: /modules/users');