<?php
header('Content-Type: text/html; charset=UTF-8');
include_once __DIR__ . '/bootstrap/index.php';
if (include_once 'modules/security.php') {
    $_SESSION['raiz'] = dirname(__FILE__);
}
include_once 'modules/conexion.php';
include_once 'modules/notif_info_unset.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <meta name="robots" content="noindex">
    <meta name="google" content="notranslate">
    <link rel="icon" type="image/png" href="<?php echo images('icon.png'); ?>" />
    <title>Sistema Escolar</title>
    <meta name="description" content="Sistema Escolar, gestión de asistencias." />
    <link rel="stylesheet" href="<?php echo css('style.css'); ?>" media="screen, projection" type="text/css" />
    <script src="<?php echo js('external/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo js('external/prefixfree.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
</head>

<body>
    <div class="loader"></div>
    <header class="header">
        <?php
        include_once "modules/sections/section-info-title.php";
        ?>
    </header>
    <aside class="aside">
        <?php
        if (!empty($_SESSION['section-admin']) == 'go-' . $_SESSION['user']) {
            include_once 'modules/sections/section-admin.php';
        } elseif (!empty($_SESSION['section-editor']) == 'go-' . $_SESSION['user']) {
            include_once 'modules/sections/section-editor.php';
        }
        ?>
    </aside>
</body>
<script src="<?php echo js('controls/buttons.js'); ?>" type="text/javascript"></script>

</html>