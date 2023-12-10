<section>
    <h2>Añadir Fuente de Noticias</h2>
    <form action="<?= site_url('user/save'); ?>" method="POST" class="form-inline" role="form">
        <input type="hidden" class="form-control" name="id" value="<?= isset($newsSource) ? $newsSource['id'] : '' ?>">
        
        <div class="form-group">
            <label class="sr-only" for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Source Name" value="<?= isset($newsSource) ? $newsSource['name'] : '' ?>">
        </div>

        <div class="form-group">
            <label class="sr-only" for="url">URL</label>
            <input type="text" class="form-control" name="url" placeholder="Source URL" value="<?= isset($newsSource) ? $newsSource['url'] : '' ?>">
        </div>

        <div class="form-group">
            <label for="category_id">Select category:</label>
                <select name="category_id" class="form-control">
                    <option value="">Select Career</option>
        <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['id']; ?>">
                    <?php echo $category['name']; ?>
                    </option>
        <?php } ?>
                </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
        <a href="<?= site_url('user'); ?>"><button type="button" class="btn btn-primary">Atrás</button></a>
    </form>
</section>
