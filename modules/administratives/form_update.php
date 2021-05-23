<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$_SESSION['user_id'] = array();
$_SESSION['administrative_name'] = array();
$_SESSION['administrative_surnames'] = array();

$sql = "SELECT * FROM administratives WHERE user = '" . $_POST['txtuserid'] . "'";

if ($result = $conexion->query($sql)) {
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'][0] = $row['user'];
		$_SESSION['administrative_name'][0] = $row['name'];
		$_SESSION['administrative_surnames'][0] = $row['surnames'];
		$_SESSION['administrative_curp'][0] = $row['curp'];
		$_SESSION['administrative_rfc'][0] = $row['rfc'];
		$_SESSION['administrative_address'][0] = $row['address'];
		$_SESSION['administrative_phone'][0] = $row['phone'];
		$_SESSION['administrative_level_studies'][0] = $row['level_studies'];
		$_SESSION['administrative_employment'][0] = $row['employment'];
		$_SESSION['administrative_observations'][0] = $row['observations'];
	}
}

echo '
<div class="form-data">
	<div class="head">
		<h1 class="titulo">Actualizar</h1>
    </div>
    <div class="body">
        <form name="form-update-administratives" action="update.php" method="POST">
			<div class="wrap">
				<div class="first">
					<label for="txtuserid" class="label">Usuario</label>
					<input id="txtuserid" style="display: none;" type="text" name="txtuserid" value="' . $_SESSION['user_id'][0] . '"/>
					<input class="text" type="text" name="txt" value="' . $_SESSION['user_id'][0] . '" disabled/>
					<label for="txtusername" class="label">Nombre</label>
					<input id="txtusername" class="text" type="text" name="txtname" value="' . $_SESSION['administrative_name'][0] . '" autofocus maxlength="25" required/>
					<label for="txtusersurnames" class="label">Apellidos</label>
					<input id="txtusersurnames" class="text" type="text" name="txtsurnames" value="' . $_SESSION['administrative_surnames'][0] . '" maxlength="50" required/>
					<label for="txtusercurp" class="label">CURP</label>
					<input id="txtusercurp" class="text" type="text" name="txtcurp" value="' . $_SESSION['administrative_curp'][0] . '" maxlength="18" onkeyup="this.value = this.value.toUpperCase()" required/>
					<label for="txtuserrfc" class="label">RFC</label>
					<input id="txtuserrfc" class="text" type="text" name="txtrfc" value="' . $_SESSION['administrative_rfc'][0] . '" maxlength="13" onkeyup="this.value = this.value.toUpperCase()" required/>
				</div>
				<div class="last">
					<label for="txtuserphone" class="label">Telefono</label>
					<input id="txtuserphone" class="text" type="number" name="txtphone" value="' . $_SESSION['administrative_phone'][0] . '" min="0" max="9999999999" maxlength="10" required/>
					<label for="txtuseraddress" class="label">Domicilio</label>
					<input id="txtuseraddress" class="text" type="text" name="txtaddress" value="' . $_SESSION['administrative_address'][0] . '" maxlength="100" required/>
					<label for="selectlevelstudies" class="label">Nivel de estudios</label>
					<select id="selectlevelstudies" class="select" name="selectlevelstudies">
				';
if ($_SESSION['administrative_level_studies'][0] == 'Licenciatura') {
	echo
	'
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['administrative_level_studies'][0] == 'Ingenieria') {
	echo
	'
							<option value="Ingenieria">Ingenieria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Maestria">Maestria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['administrative_level_studies'][0] == 'Maestria') {
	echo
	'
							<option value="Maestria">Maestria</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Doctorado">Doctorado</option>
						';
} elseif ($_SESSION['administrative_level_studies'][0] == 'Doctorado') {
	echo
	'
							<option value="Doctorado">Doctorado</option>
							<option value="Licenciatura">Licenciatura</option>
							<option value="Ingenieria">Ingenieria</option>
							<option value="Maestria">Maestria</option>
						';
}
echo '
					</select>
					<label for="txtuseremployment" class="label">Cargo</label>
					<input id="txtuseremployment" class="text" type="text" name="txtemployment" value="' . $_SESSION['administrative_employment'][0] . '" maxlength="100" required/>
					<label for="txtuserobservation" class="label">Observación</label>
					<input id="txtuserobservation" class="text" type="text" name="txtobservation" value="' . $_SESSION['administrative_observations'][0] . '" maxlength="200"/>
				</div>
			</div>
			<button id="btnSave" class="btn icon" type="submit">save</button>
        </form>
    </div>
</div>
';
echo '<div class="content-aside">';
include_once "../sections/options-disabled.php";
echo '</div>';