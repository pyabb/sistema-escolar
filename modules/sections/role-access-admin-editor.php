<?php
if ($_SESSION['permissions'] == 'admin' || $_SESSION['permissions'] == 'editor') {
} else {
    header('Location: ' . app_path());
    exit();
}