<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>News Sources</h1>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news_sources as $newsSource) { ?>
                                <tr>
                                    <td><?php echo $newsSource['name'] ?></td>
                                    <td>
                                        <?php
                                        // Accede a los datos de la categoría usando el modelo de categoría
                                        $categoryModel = model('App\Models\CategoryModel');
                                        $category = $categoryModel->find($newsSource['category_id']);

                                        // Muestra el nombre de la categoría
                                        echo $category['name'];
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary"
                                            href="<?php echo site_url(['user', 'edit', $newsSource['id']]); ?>">Edit</a>
                                        <a class="btn btn-danger"
                                            href="<?php echo site_url(['user', 'delete', $newsSource['id']]); ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
