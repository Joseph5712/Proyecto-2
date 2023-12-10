<nav>
    <ul>
        <?php if (session('role_id') == 1): ?>
            <!-- Otros enlaces específicos para administradores -->
            <li><span class="nav-text">Administrador: <?= session('first_name') ?></span></li>
            <li><a class="nav-link" href="<?php echo site_url('/salir') ?>">Salir <span class="sr-only">(current)</span></a></li>
        <?php elseif (session('role_id') == 2): ?>
            <!-- Otros enlaces específicos para usuarios con role_id 2 -->
            <li><span class="nav-text">Usuario: <?= session('first_name') ?></span></li>
            <li><a class="nav-link" href="<?php echo site_url('/salir') ?>">Salir <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-link" href="<?php echo site_url('/user/form_news_sources') ?>">Añadir New Source <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-link" href="<?php echo site_url('/user/news_sources') ?>">Show News Sources <span class="sr-only">(current)</span></a></li>
            <?php endif; ?>
    </ul>
</nav>
