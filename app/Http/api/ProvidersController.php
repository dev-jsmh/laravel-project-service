<?php

/**
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\DB;

class ProvidersController extends Controller
{
    /**
     * This play a list of all the providers from the data base 
     */

    public function index(){
        return view('providers.index');
    }

    public function getAll()
    {

        // Gets all the providers that exists in the data base
        $providers = Provider::all();
        // validates if the array is empty or not 
        // i do this by counting the number of element inside the array
        // if the number is equal to cero, it means the array is empty
        if (count($providers) ===  0) {
            // if condition is true return the empty array and a message
            return response()->json([
                "message" => "There are no providers yet",
                "data" => $providers,
                "status" => 200,
            ], 200);
        };

        // if there is any exception present catches it  and returns a json message
        return response()->json([

            "message" => "Providers retrived successfullly !",
            "data" => $providers,
            "status" => 200,
        ], 200);
    }
    // =================================== get a specific provider by its id  ===================================
    public function getById($id)
    {
        // look for the desired provider using its id number
        // and method "find" from provider model
        $desiredProvider = Provider::find($id);
        // validates if the selected provider does not exists on data base
        if (!$desiredProvider) {
            // store some messages in an array along side provider info
            $data = [
                'message' => "Provider " . $id . " doesn't exists. Not found.",
                "status" => 404
            ];
            // return the $data array  and status code 
            return response()->json($data, 404);
        }
        // === if providers exist 
        // store some success message in the array along side provider info
        $data = [
            'message' => "Provider " . $id . " selected successfully",
            "data" => $desiredProvider,
            "status" => 201
        ];
        // return the $data array  and status code when operation is success
        return response()->json($data, 201);
    }
    //  ================================== store new provider info to data base =================================
    public function store(Request $request)
    {
        // use static method make to validate there is all necesary data for creating a new provider
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
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


        // create and array with data of the new provider from request made from the front-end or client software
        $newProvider = new Provider([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        // create my own sql query to insert new rows on the providers table 
        $sql = 'insert into `providers` (`name`, `phone`, `address`) values (?,?,?)';
        // execute sql query to insert the new provider on data base 
        $operationSuccess = DB::insert($sql, [$request->name, $request->phone, $request->address]);

        // validates if the insert operation was not successfully executed 
        if (!$operationSuccess) {
            $data = [
                "message" => 'error when creating the new provider. NO data send from client.',
                'status' => 400
            ];
            // error message for the user
            return response()->json($data, 400);
        }
        //  if any of the previous conditions are not meet, store the new provider info
        // and return the result to the client
        $data = [
            "message" => "provider created succefully",
            "data" => $newProvider,
            "status" => 200
        ];
        return response()->json($data, 200);
    }
    // =================================== update ===================================
    public function update(Request $request, $id)
    {


        // find the provider and store in a variable
        $desiredProvider = Provider::find($id);

        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
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

        // validates if provider exists or not
        if (!$desiredProvider) {
            $data = [
                'message' => 'Not found. It seems that the provider N°: ' . $id . ' does not exists',
                'status' => 404
            ];
            return response()->json($data, 404);
        };


        $sql = 'update providers set name=?, phone=?, address=? where id=?';
        $updated = DB::update($sql, [$request->name, $request->phone, $request->address, $id]);

        if (!$updated) {
            $data = [
                'message' => 'Not possible to update provider info',
                'status' => 400
            ];
            // return Bad Request error code to user
            return response()->json($data, 400);
        };

        // ========= if any of the condition above are true then execute code below =========

        // here i just use the provider class model to create a new object so i can 
        // show it to the user when the code is successfully executed
        $updatedProvider = [
            $request->name,
            $request->phone,
            $request->address
        ];
        // store some relevant information for user in this array 
        $data = [
            'message' => 'provider N°: ' . $id . ' was successfully updated !',
            'data' => $updatedProvider,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    // =================================== destroy ===================================
    public function destroy($id)
    {

        // find the provider and store in a variable
        $desiredProvider = Provider::find($id);
        // validates if provider exists or not
        if (!$desiredProvider) {
            $data = [
                'message' => 'Not found. It seems that the selected provider does not exists or have been deleted before',
                'status' => 404
            ];
            return response()->json($data, 404);
        };

        // create sql query to delete row by id
        $sql = "delete from providers where id=?";
        // delete the provider get from data base
        $deleteOperation = DB::delete($sql, [$id]);
        //  check if the operation was sucessfully made
        if (!$deleteOperation) {
            $data = [
                'message' => 'Not possible to delete provider ' . $id,
                'status' => 400
            ]; // return json with error message
            return response()->json($data, 400);
        };
        // return a message inside a JSON and the status 
        $data = [
            'message' => 'provider ' . $id . ' deleted successfully',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
