
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Update</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Update Product</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="<?= base_url('test') ?>" class="btn btn-primary mb-3">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="/update/save" method="post">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?= $user['description'] ?>" required>
                    </div>
                    <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['name'] ?>" <?= ($category['name'] == $user['category']) ? 'selected' : '' ?>>
                <?= $category['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $user['quantity'] ?>" required step="1">
                    </div>
                    <div class="form-group">
                         <label for="price">Price</label>
                         <input type="number" class="form-control" id="price" name="price" value="<?= $user['price'] ?>" required step="0.01">
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
