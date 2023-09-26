<?php

namespace App\Controllers;
use App\Models\MainModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function test()
    {
        $main = new MainModel();
    
        // Fetch all categories
        $categoryModel = new CategoryModel(); // Replace with your actual model name
        $categories = $categoryModel->findAll();
    
        $categoryId = $this->request->getGet('categoryFilter');
    
        // Fetch students based on the selected category
        $data['sk'] = $main->findAll();
    
        // If a category is selected, filter the students by category name
        if (!empty($categoryId)) {
            $selectedCategory = $categoryModel->find($categoryId);
            if ($selectedCategory) {
                $data['sk'] = $main->where('category', $selectedCategory['name'])->findAll();
            }
        }
    
        $data['categories'] = $categories;
    
        return view('Main', $data);
    }
    
    public function create()
    {
        // Fetch categories from your database or data source
        $categoryModel = new CategoryModel(); // Replace with your actual model name
        $data['categories'] = $categoryModel->findAll();
    
        return view('create', $data);
    }
    
    
    
    public function save()
    {
        // Load the default database connection
        $db = \Config\Database::connect();
        
        // Get POST data
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'), 
            'category' => $this->request->getPost('category'),// Use the correct form field name
            'description' => $this->request->getPost('description'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
        ];
        
        // Insert data into the database
        $builder = $db->table('students'); // Replace 'students' with your actual table name
        $builder->insert($data);
        
        // Redirect back to the create form or another page
        return redirect()->to('/test');
    }
    
    public function update($id)
{
    // Fetch the product details from the database
    $productModel = new MainModel();
    $product = $productModel->find($id);

    // Fetch all categories from the database
    $categoryModel = new CategoryModel(); // Replace with your actual model name
    $categories = $categoryModel->findAll();

    // Pass the product and categories to the view
    return view('update', ['user' => $product, 'categories' => $categories]);
}

    public function saveUpdate()
    {
        $db = \Config\Database::connect();
    
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'), 
            'category' => $this->request->getPost('category'),// Set the category_id
            'description' => $this->request->getPost('description'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
        ];
        
        $id = $this->request->getPost('id'); // Get the user's ID
    
        // Update data in the database
        $builder = $db->table('students');
        $builder->where('id', $id); // Use the user's ID to identify the record to update
        $builder->update($data);
    
        // Redirect back to the list of users or another page
        return redirect()->to('/test');
    }

    public function delete($id)
    {
        // Load the default database connection
        $db = \Config\Database::connect();

        // Attempt to delete the record from the "students" table
        $builder = $db->table('students');

        // Check if the record with the given ID exists
        $record = $builder->where('id', $id)->get()->getRow();

        if (!$record) {
            // Record not found, handle the error (e.g., show a message or redirect)
            return redirect()->to('/test')->with('error', 'Record not found');
        }

        // Delete the record
        $builder->where('id', $id)->delete();

        // Redirect back to the list of records or another page
        return redirect()->to('/test')->with('success', 'Record deleted successfully');
    }

    // Add a new method to display the "Add Category" form
    public function addCategory()
    {
        // Load the view for adding a category (you need to create this view)
        return view('add-category');
    }

    // Add a new method to handle the category submission
    public function saveCategory()
    {
        // Load the default database connection
        $db = \Config\Database::connect();
    
        // Get POST data for the new category
        $categoryName = $this->request->getPost('name');
    
        // Insert the new category into the "categories" table
        $categoryData = ['name' => $categoryName];
        $builder = $db->table('categories'); // Replace 'categories' with your actual table name
        $builder->insert($categoryData);
    
        // Redirect back to the "/test" page when successful
        return redirect()->to('/test')->with('success', 'Category added successfully');
    }
    

    // Implement methods to get data from your data source (e.g., database)
    // You need to create these methods in your controller or a separate model.
}
