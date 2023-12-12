<!-- app/Views/navbar.php -->

<nav class="navbar-container">
    <ul>
        <?php if (session('role_id') == 1): ?>
            <!-- Otros enlaces específicos para administradores -->
            <li><span class="nav-text">Administrador: <?= session('first_name') ?></span></li>
            <li><a class="nav-link" href="<?php echo site_url('/salir') ?>">Salir</a></li>
        <?php elseif (session('role_id') == 2): ?>
            <!-- Otros enlaces específicos para usuarios con role_id 2 -->
            <li><span class="nav-text">Usuario: <?= session('first_name') ?></span></li>
            <li><a class="nav-link" href="<?php echo site_url('/user/form_news_sources') ?>">Añadir New Source</a></li>
            <li><a class="nav-link" href="<?php echo site_url('/user/news_sources') ?>">Show News Sources</a></li>
            <li><a class="nav-link" href="<?php echo site_url('/salir') ?>">Salir</a></li>
        <?php endif; ?>
    </ul>
</nav>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }
    .navbar-container {
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    .navbar-container ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-container li {
        margin-right: 15px;
    }

    .nav-text {
        font-weight: bold;
    }

    .nav-link {
        color: #fff;
        text-decoration: none;
        padding: 5px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .nav-link:hover {
        background-color: #555;
    }
</style>
