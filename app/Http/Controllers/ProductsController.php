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
      // =================================== returns the form view to create new products ===================================
      public function create()
      {
         
          // return the view and the corresponding product 
          return view('products.create');
      }
     // =================================== get a specific product by its id  ===================================
     public function show($id)
     {
         // look for the desired product using its id number
         // and method "find" from product model
         $desiredProduct = Product::find($id);
         
         // return the view and the corresponding product 
         return view('products.details', compact('desiredProduct'));
     }
     //  ================================== store new product info to data base =================================
     public function store(Request $request)
     {
         // use static method make to validate there is all necesary data for creating a new product
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'model' => 'required',
             'description' => 'required'
         ]);
         // if validation fails then return a error message, an array of errors and the 400 status code
         if ($validator->fails()) {
             $data = [
                 'message' => "some required data have not been submit",
                 // print errors from get as a result from the validator 
                 'error' => $validator->errors(),
                 'status' => 400
             ];
             // return view with error message 
             return view('products.errors', compact('data'));
         }
 
 
         // create and array with data of the new product from request made for the front-end or client software
         $newProduct = new Product ([
             'name' => $request->name,
             'model' => $request->phone,
             'description' => $request->address
         ]);
 
         // create my own sql query to insert new rows on the products table 
         $sql = 'insert into `providers` (`name`, `model`, `description`) values (?,?,?)';
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
             "data" => $newProduct,
             "status" => 200
         ];
         
         return view('/products');
       
     }
}
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */