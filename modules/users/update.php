<?php
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

function UpdateUserDB($conex, $user, $email, $permissions)
{
	$date = date('Y-m-d H:i:s');

	if ($email == '') {
		echo $sql_update = "UPDATE users SET email = null, permissions = '" . $permissions . "', updated_at = '" . $date . "' WHERE user_id = '" . $user . "'";
	} else {
		echo $sql_update = "UPDATE users SET email = '" . $email . "', permissions = '" . $permissions . "', updated_at = '" . $date . "' WHERE user_id = '" . $user . "'";
	}

	if (mysqli_query($conex, $sql_update)) {
		Info('Usuario actualizado.');
	} else {
		Error('Error al actualizar.');
	}
	header('Location: /modules/users');
	exit();
}

if (!empty($_SESSION['user_id'][0]) && !empty($_POST['txtusertype'] == 'admin' || $_POST['txtusertype'] == 'editor')) {
	$sql = "SELECT user_id FROM users WHERE email = '" . $_POST['txtemailupdate'] . "' AND user_id != '" . $_SESSION['user_id'][0] . "' LIMIT 1";

	if ($result = $conexion->query($sql)) {
		if ($row = mysqli_fetch_array($result)) {
			Error('Este correo electrónico ya está en uso.');
			header('Location: /modules/users');
			exit();
		} else {
			UpdateUserDB($conexion, $_SESSION['user_id'][0], $_POST['txtemailupdate'], $_POST['txtusertype']);
		}
	}
} else {
	header('Location: /');
	exit();
}