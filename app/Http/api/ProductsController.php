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

class ProductsController extends Controller
{
    // controller to performe data base operations on product's table

     public function getAll()
     {
 
         // Gets all the providers that exists in the data base
        $products = Product::all();
         // validates if the array is empty or not 
         // i do this by counting the number of element inside the array
         // if the number is equal to cero, it means the array is empty
         if (count($products) ===  0) {
             // if condition is true return the empty array and a message
             return response()->json([
                 "message" => "There are no products registered",
                 "data" => $products,
                 "status" => 200,
             ], 200);
         };
 
         // if there is any exception present catches it  and returns a json message
         return response()->json([
 
             "message" => "Products retrived successfullly !",
             "data" => $products,
             "status" => 200,
         ], 200);
     }
     // =================================== get a specific product by its id  ===================================
     public function getById($id)
     {
         // look for the desired product using its id number
         // and method "find" from product model
         $desiredProduct = Product::find($id);
         // validates if the selected product does not exists on data base
         if (!$desiredProduct) {
             // store some messages in an array along side product info
             $data = [
                 'message' => "Product " . $id . " doesn't exists. So Not found.",
                 "status" => 404
             ];
             // return the $data array  and status code 
             return response()->json($data, 404);
         }
         // === if product exist 
         // store some success message in the array along side product info
         $data = [
             'message' => "Product " . $id . " selected successfully",
             "data" => $desiredProduct,
             "status" => 201
         ];
         // return the $data array  and status code when operation is success
         return response()->json($data, 201);
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
             // return the message as json formatt 
             return response()->json($data, 400);
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
             // error message for the user
             return response()->json($data, 400);
         }
         //  if any of the previous conditions are not meet, store the new product info
         // and return the result to the client
         $data = [
             "message" => "prduct created succefully",
             "data" => $newProduct,
             "status" => 200
         ];
         return response()->json($data, 200);
     }
     // =================================== update ===================================
     public function update(Request $request, $id)
     {
 
 
         // find the provider and store in a variable
         $desiredProduct = Product::find($id);
 
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'model' => 'required',
             'description' => 'required'
         ]);
 
         // check if validator fails
         if ($validator->fails()) {
             // if true, create an array with some data 
             $data = [
                 'message' => 'Some fields are missing',
                 'error' => $validator->errors(),
                 'status' => 400
             ];
             // return the response as json format and error code status 400 
             return response()->json($data, 400);
         }
 
         // validates if product exists or not
         if (!$desiredProduct){
             $data = [
                 'message' => 'Not found. It seems that the product N°: ' . $id . ' does not exists',
                 'status' => 404
             ];
             return response()->json($data, 404);
         };
 
         $sql = 'update products set name=?, model=?, description=? where id=?';
         $updated = DB::update($sql, [$request->name, $request->model, $request->description, $id]);
 
         if (!$updated) {
             $data = [
                 'message' => 'Not possible to update product info',
                 'status' => 400
             ];
             // return Bad Request error code to user
             return response()->json($data, 400);
         };
 
         // ========= if any of the condition above are true then execute code below =========
 
         // here i just use the product class model to create a new object so i can 
         // show it to the user when the code is successfully executed
         $updatedProduct = [
             $request->name,
             $request->phone,
             $request->address
         ];
         // store some relevant information for user in this array 
         $data = [
             'message' => 'product N°: ' . $id . ' was successfully updated !',
             'data' => $updatedProduct,
             'status' => 200
         ];
         return response()->json($data, 200);
     }
     // =================================== destroy ===================================
     public function destroy($id)
     {
 
         // find the produc and store in a variable
         $desiredProduct = Product::find($id);
         // validates if desired product exists or not
         if (!$desiredProduct) {
             $data = [
                 'message' => 'Not found. It seems that the selected product does not exists or have been deleted before',
                 'status' => 404
             ];
             return response()->json($data, 404);
         };
 
         // create sql query to delete row by id
         $sql = "delete from products where id=?";
         // delete the product get from data base
         $deleteOperation = DB::delete($sql, [$id]);
         //  check if the operation was sucessfully made
         if (!$deleteOperation) {
             $data = [
                 'message' => 'Not possible to delete product ' . $id,
                 'status' => 400
             ]; // return json with error message
             return response()->json($data, 400);
         };
         // return a message inside a JSON and the status 
         $data = [
             'message' => 'product ' . $id . ' deleted successfully',
             'status' => 200
         ];
 
         return response()->json($data, 200);
     }



}
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */