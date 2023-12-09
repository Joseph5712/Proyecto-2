<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Categories</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="<?= site_url('/category/create')?>">New</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    foreach ($categories as $category) { ?>
                            <tr>
                                <td>
                                    <?php echo $category['name'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-secondary"
                                        href="<?php echo site_url(['category','edit',$category['id']]);?>">Edit</a>
                                    <a class="btn btn-danger"
                                        href="<?php echo site_url(['category','delete',$category['id']]);?>">Delete</a>
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