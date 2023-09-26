    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
        
            .delete-link {
                color: white;
                background-color: red;
                padding: 5px 10px;
                border-radius: 3px;
                text-decoration: none;
            }

          
            .update-link {
                color: white;
                background-color: green;
                padding: 5px 10px;
                border-radius: 3px;
                text-decoration: none;
                margin-left: 5px;
            }
            
        </style>
        <title>LABORATORY 1</title>
    </head>
    <body>
      
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Tuazon Crud</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
        
            <h2 class="mb-4" style="text-align: center;">Product Information</h2>

          
            <a href="<?= base_url('create') ?>" class="btn btn-primary mb-3">Add Product</a>
            <a href="<?= base_url('add-category') ?>" class="btn btn-success mb-3">Add Category</a>

       
<div class="mb-3 d-flex justify-content-between align-items-center">
 
    <form method="get" class="d-inline-block">
        <label for="categoryFilter" class="form-label">Filter by Category:</label>
        <select class="form-select" id="categoryFilter" name="categoryFilter">
            <option value="">All Categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category_id'] ?>" <?= (isset($categoryFilter) && $category['category_id'] == $categoryFilter) ? 'selected' : '' ?>><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary" id="applyFilter">Apply Filter</button>
    </form>

   
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#categoryModal">Show Categories</button>
</div>

            <table class="table table-bordered table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Quantity</th>    
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sk as $rider): ?>
                        <tr>
                            <td><?= $rider['name'] ?></td>
                            <td><?= $rider['description'] ?></td>
                            <td><?= $rider['category'] ?></td>
                            <td><?= $rider['quantity'] ?></td>
                            <td><?= $rider['price'] ?></td>
                            <td class="action-td">
                                <a href="/update/<?= $rider['id'] ?>" class="update-link">Update</a>
                                <a href="/delete/<?= $rider['id'] ?>" class="delete-link">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

     
        <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li><?= $category['name'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

     
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

       
        <script>
            document.getElementById('applyFilter').addEventListener('click', function() {
                const categoryFilter = document.getElementById('categoryFilter').value;
                const tableRows = document.querySelectorAll('tbody tr');

                tableRows.forEach(function(row) {
                    const categoryCell = row.querySelector('td:nth-child(3)');

                    if (categoryFilter === '' || categoryFilter === categoryValue) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    </body>
    </html>
