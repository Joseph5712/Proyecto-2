<nav>
    <ul>
        <?php if (session('role_id') == 1): ?>
            <!-- Elementos específicos para administradores -->
            <li><a href="<?= site_url('admin/dashboard') ?>">Admin Dashboard</a></li>
            <!-- Otros enlaces específicos para administradores -->
        <?php elseif (session('role_id') == 2): ?>
            <!-- Elementos específicos para usuarios con role_id 2 -->
            <li><a href="<?= site_url('user/dashboard') ?>">User Dashboard</a></li>
            <!-- Otros enlaces específicos para usuarios con role_id 2 -->
        <?php endif; ?>
    </ul>
</nav>

