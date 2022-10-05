<?php
if ($_SESSION['authenticate'] != 'go-' . $_SESSION['user']) {
	header('Location: ' . app_path());
	exit();
}