<?php

date_default_timezone_set(env('TIME_ZONE'));

$conexion = mysqli_connect(env('DB_HOST'), env('DB_USER'), env('DB_PASS'), env('DB_NAME'));

if (mysqli_connect_errno()) {
	printf("Falló la conexión: %s\n", mysqli_connect_error());
	exit();
}

mysqli_set_charset($conexion, 'utf8');