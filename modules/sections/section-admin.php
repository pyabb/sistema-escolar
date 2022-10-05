<?php
include_once 'security.php';

require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin.php');

$name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['image'] . '';

if (file_exists($name_image_user)) {
} else {
    $sql = "SELECT image FROM users WHERE user = '" . $_SESSION['user'] . "'";

    if ($result = $conexion->query($sql)) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['image'] = $row['image'];
        }

        $name_image_user = $_SESSION['raiz'] . '/images/users/' . $_SESSION['image'] . '';

        if (file_exists($name_image_user)) {
        } else {
            $_SESSION['image'] = 'user.png';
        }
    }
}

$url_actual = $_SERVER["REQUEST_URI"];

if (strpos($url_actual, 'modules')) {
    $input = $url_actual;
    preg_match('~modules/(.*?)/~', $input, $output);
    $output[1];
} elseif (strpos($url_actual, 'attendance')) {
    $input = $url_actual;
    preg_match('~/(.*?)/~', $input, $output);
    $output[1];
} elseif (strpos($url_actual, 'user')) {
    $input = $url_actual;
    preg_match('~/(.*?)/~', $input, $output);
    $output[1];
} else {
    $output[1] = 'home';
}
?>
<div class="nav-home">
    <span class="name_system">Control de Asistencias</span>
    <div class="user">
        <img class="image_user" src="<?php echo images('users/') . $_SESSION['image']; ?>" />
        <span class="name_user">
            <?php print $_SESSION['name'] . ' ' . $_SESSION['surnames']; ?>
        </span>
        <span class="logout_user">
            <a class="icon" href="#">expand_more</a>
            <ul>
                <li>
                    <a class="<?php if ($output[1] == 'user') {
                                    echo 'active-logout';
                                } ?>" style="border-bottom: 3px solid #6272a4;" href="<?php echo app_path('user'); ?>"><span class="icon">settings</span>Configuración</a>
                </li>
                <li>
                    <a href="<?php echo app_path('modules/logout'); ?>"><span class="icon">logout</span>Cerrar sesión</a>
                </li>
            </ul>
        </span>
    </div>
    <ul>
        <li><a class="<?php if ($output[1] == 'home') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('home'); ?>"><span class="icon">dashboard</span>Dashboard</a>
        </li>
        <li><a class="<?php if ($output[1] == 'school_periods') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/school_periods'); ?>"><span class="icon">date_range</span>Periodo Escolar</a>
        </li>
        <li><a class="<?php if ($output[1] == 'users') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/users'); ?>"><span class="icon">manage_accounts</span>Usuarios</a>
        </li>
        <li><a class="<?php if ($output[1] == 'administratives') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/administratives'); ?>"><span class="icon">supervised_user_circle</span>Administrativos</a>
        </li>
        <li><a class="<?php if ($output[1] == 'teachers') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/teachers'); ?>"><span class="icon">connect_without_contact</span>Docentes</a>
        </li>
        <li><a class="<?php if ($output[1] == 'students') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/students'); ?>"><span class="icon">recent_actors</span>Alumnos</a>
        </li>
        <li><a class="<?php if ($output[1] == 'careers') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/careers'); ?>"><span class="icon">school</span>Carreras</a>
        </li>
        <li><a class="<?php if ($output[1] == 'subjects') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/subjects'); ?>"><span class="icon">library_books</span>Asignaturas</a>
        </li>
        <li><a class="<?php if ($output[1] == 'groups') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/groups'); ?>"><span class="icon">groups</span>Grupos</a>
        </li>
        <li><a class="<?php if ($output[1] == 'attendance') {
                            echo 'active';
                        } ?>" href="<?php echo app_path('modules/attendance'); ?>"><span class="icon">fact_check</span>Asistencias</a>
        </li>
    </ul>
</div>
<div class="menu-mobile">
    <header>
        <span class="activator icon" id="activator">menu</span>
        <nav>
            <ul>
                <li>
                    <a class="<?php if ($output[1] == 'home') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('home'); ?>"><span class="icon">dashboard</span><span class="text">Dashboard</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'school_periods') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/school_periods'); ?>"><span class="icon">date_range</span><span class="text">Perido Escolar</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'users') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/users'); ?>"><span class="icon">manage_accounts</span><span class="text">Usuarios</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'administratives') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/administratives'); ?>"><span class="icon">supervised_user_circle</span><span class="text">Administrativos</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'teachers') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/teachers'); ?>"><span class="icon">connect_without_contact</span><span class="text">Docentes</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'students') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/students'); ?>"><span class="icon">recent_actors</span><span class="text">Alumnos</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'careers') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/careers'); ?>"><span class="icon">school</span><span class="text">Carreras</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'subjects') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/subjects'); ?>"><span class="icon">library_books</span><span class="text">Asignaturas</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'groups') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/groups'); ?>"><span class="icon">groups</span><span class="text">Grupos</span></a>
                </li>
                <li>
                    <a class="<?php if ($output[1] == 'attendance') {
                                    echo 'active-menu';
                                } ?>" href="<?php echo app_path('modules/attendance'); ?>"><span class="icon">fact_check</span><span class="text">Asistencias</span></a>
                </li>
            </ul>
        </nav>
    </header>
    <span class="name_system">Control de Asistencias</span>
</div>
<div class="user-mobile">
    <header>
        <img class="activator-user" id="activator-user" src="<?php echo images('users/') . $_SESSION['image']; ?>">
        <nav>
            <ul>
                <li class="first-item">
                    <a class="<?php if ($output[1] == 'user') {
                                    echo 'active-user';
                                } ?>" href="<?php echo app_path('user'); ?>"><span class="icon">settings</span><span class="text">Configuración</span></a>
                </li>
                <li>
                    <a href="<?php echo app_path('modules/logout'); ?>"><span class="icon">logout</span><span class="text">Cerrar sesión</span></a>
                </li>
            </ul>
        </nav>
    </header>
</div>
<script src="<?php echo js('external/gsap.min.js'); ?>"></script>
<script src="<?php echo js('controls/menumobile.js'); ?>"></script>