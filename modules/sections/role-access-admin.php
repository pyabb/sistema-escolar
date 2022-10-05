<?php
if ($_SESSION['permissions'] != 'admin') {
    header('Location: ' . app_path());
    exit();
}