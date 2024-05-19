<?php

/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;

class ProductsController extends Controller
{
    // controller to performe data base operations on product's table

    public function index()
    {

        // Gets all the providers that exists in the data base
        $products = Product::all();

        // if there is any exception present catches it  and returns a json message
        return view('products.index', compact('products'));
    }
    // =================================== returns the form view to create new products ==============================
    public function create()
    {

        // return the view and the corresponding product 
        return view('products.create');
    }
    // ==================== get a specific product by its id and show a view with its details =========================
    public function show($id)
    {
        // look for the desired product using its id number
        // and method "find" from product model
        $desiredProduct = Product::find($id);
        // return the view and the corresponding product 
        return view('products.details', compact('desiredProduct'));
    }
    //  ================================== store new product info to data base =======================================
    public function store(Request $request)
    {

        // create my own sql query to insert new rows on the products table 
        $sql = 'INSERT INTO `products` (`name`, `model`, `description`) VALUES (?,?,?)';
        // execute sql query to insert the new products on data base 
        $insertOperation = DB::insert($sql, [$request->name, $request->model, $request->description]);

        // validates if the insert operation was not successfully executed 
        if (!$insertOperation) {
            $data = [
                "message" => 'error when creating the new product. No data send from client.',
                'status' => 400
            ];
            // return view with error message 
            return view('products.errors', compact('data'));
        }
        //  if any of the previous conditions are not meet, store the new product info
        // and return the result to the client
        $data = [
            "message" => "prduct created succefully",
            "status" => 200
        ];

        // redirects user to the index of products if the orperation is performed successfully
        return redirect()->to('/products');
    }
    // =================================== destroy ===================================
    public function destroy($id)
    {
        // create sql query to delete row by id
        $sql = "delete from products where id=?";
        // delete the provider get from data base
        DB::delete($sql, [$id]);
        // redirect user to index view 
        return redirect()->to('/products');
    }
    // ------------ new added methods --------------
    // =================================== edit view ===================================
    // Method that returns a view with a form to edit product information
    public function edit($id)
    {
        // look for the product in data base
        $desiredProduct = Product::find($id);
        // form to edit provider 
        return view('products.edit', compact('desiredProduct'));
    }

    public function update($id, Request $modProduct)
    {
        // extract the value of each field from the request and store them in their won variable
        $name = $modProduct->name;
        $model = $modProduct->model;
        $description = $modProduct->description;
        // create the query to update the selected product
        $sql = "update `products` set `name` = ?, `model` = ?,  `description` = ? where id = ?";

        $updateOperation = DB::update($sql, [$name, $model, $description, $id]);
        // validate if operation is successfully made
        if ($updateOperation) {
            // if this is true 
            return redirect()->to("/products");
        } else {
            // otherwise return error message
            return "error al realizar la operation update sobre el producto seleccionado";
        }
    }
}
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */
