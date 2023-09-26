<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
       
        <h2 class="mb-4 text-center">Add Category</h2>

       
        <a href="<?= base_url('test') ?>" class="btn btn-primary mb-3">Back</a>

    
        <form action="<?= base_url('save-category') ?>" method="post">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <button type="submit" class="btn btn-success">Save Category</button>
        </form>
    </div>

 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
