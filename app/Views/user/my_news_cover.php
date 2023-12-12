<!-- app/Views/news_list.php -->

<style>
    .news-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-around;
        list-style: none;
        padding: 0;
    }

    .news-item {
        width: calc(33.33% - 20px);
        box-sizing: border-box;
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    .news-item img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    /* Estilos para el formulario de búsqueda */
    form {
        margin-bottom: 20px;
        text-align: center;
    }

</style>

<!-- Formulario de búsqueda -->
<form action="<?= site_url('user/search'); ?>" method="post">
    <label for="search">Buscar:</label>
    <input type="text" name="search" id="search" placeholder="keyword...">
    <button type="submit">Search</button>
    <button href="<?= site_url('/user'); ?>">All</button>
</form>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Lista de noticias -->
<?php if (!empty($newsList)) : ?>
    <ul class="news-container">
        <?php foreach ($newsList as $newsItem) : ?>
            <li class="news-item">
                <!-- Enlace al detalle de la noticia -->
                <a href="<?= $newsItem['perman_link']; ?>" target="_blank">
                    <h2><?= ($newsItem['title']); ?></h2>
                    <img src="<?= ($newsItem['img_url']); ?>" alt="News Image">
                </a>
                <p><?= ($newsItem['short_description']); ?></p>
                <?php
                // Buscar el nombre de la categoría correspondiente al ID
                $categoryName = 'Unknown Category';
                foreach ($categories as $category) {
                    if ($category['id'] == $newsItem['category_id']) {
                        $categoryName = $category['name'];
                        break;
                    }
                }
                ?>

                <p><strong>Categoría:</strong> <?= ($categoryName); ?></p>
                <p><strong>Fecha:</strong> <?= ($newsItem['date']); ?></p>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                
                <!-- Puedes agregar más detalles según tus necesidades -->
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No hay noticias disponibles.</p>
<?php endif; ?>


