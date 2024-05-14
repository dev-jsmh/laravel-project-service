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
}
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */
