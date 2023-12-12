<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Categories</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        main {
            margin-top: 50px;
        }
        .btn-container {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Categories</h1>
                </div>
            </div>
            <div class="row btn-container">
                <div class="col-12">
                    <a class="btn btn-primary" href="<?= site_url('/category/create')?>">New Category</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td><?php echo $category['name'] ?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="<?= site_url(['category', 'edit', $category['id']]); ?>">Edit</a>
                                        <a class="btn btn-danger" href="<?= site_url(['category', 'delete', $category['id']]); ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
