<?php
include_once __DIR__ . '/../../bootstrap/index.php';
include_once '../security.php';
include_once '../conexion.php';
include_once '../notif_info_msgbox.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

$_POST['txtuserid'] = trim($_POST['txtuserid']);

if (empty($_POST['txtuserid'])) {
	header('Location: ' . app_path());
	exit();
}
if ($_POST['txtuserid'] == '') {
	Error('Ingrese un ID correcto.');
	header('Location: ' . app_path('modules/students'));
	exit();
}

$sql = "SELECT * FROM students WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		Error('Este ID ya está en uso. Elige otro.');
		header('Location: ' . app_path('modules/students'));
		exit();
	} else {
		$date = date('Y-m-d H:i:s');

		$sql_insert_user = "INSERT INTO users(user, pass, permissions, image, created_at) VALUES('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtuserid']) . "', 'student', 'user.png','" . $date . "')";

		if (mysqli_query($conexion, $sql_insert_user)) {
			$sql_insert_teacher = "INSERT INTO students(user, name, surnames, curp, rfc, gender, date_of_birth, phone, address, career, documentation, admission_date, created_at) VALUES('" . trim($_POST['txtuserid']) . "', '" . trim($_POST['txtname']) . "', '" . trim($_POST['txtsurnames']) . "', '" . trim($_POST['txtcurp']) . "', '" . trim($_POST['txtrfc']) . "', '" . trim($_POST['selectGender']) . "', '" . trim($_POST['dateofbirth']) . "', '" . trim($_POST['txtphone']) . "', '" . trim($_POST['txtaddress']) . "', '" . trim($_POST['selectCareer']) . "', '" . trim($_POST['selectDocumentation']) . "', '" . trim($_POST['dateadmission']) . "', '" . $date . "')";

			if (mysqli_query($conexion, $sql_insert_teacher)) {
				Info('Alumno agregado.');
			} else {
				$sql_delete_users = "DELETE FROM users WHERE user = '" . trim($_POST['txtuserid']) . "'";

				if (mysqli_query($conexion, $sql_delete_users)) {
					Error('Error al guardar.');
				}
			}
		} else {
			Error('Error al guardar.');
		}
		header('Location: ' . app_path('modules/students'));
		exit();
	}
}