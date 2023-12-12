<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section>
    <h2>Añadir Fuente de Noticias</h2>
    <form action="<?= site_url('user/save'); ?>" method="POST" class="form" role="form">
        <input type="hidden" class="form-control" name="id" value="<?= isset($newsSource) ? $newsSource['id'] : '' ?>">
        
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre de la Fuente" value="<?= isset($newsSource) ? $newsSource['name'] : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="url">URL:</label>
            <input type="text" class="form-control" name="url" placeholder="URL de la Fuente" value="<?= isset($newsSource) ? $newsSource['url'] : '' ?>" required>
        </div>

        <div class="form-group">
            <label for="category_id">Seleccionar categoría:</label>
            <select name="category_id" class="form-control" required>
                <option value="">Seleccionar Categoría</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id']; ?>">
                        <?= $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?= site_url('/user'); ?>" class="btn btn-secondary">Atrás</a>
        </div>
    </form>
    
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
