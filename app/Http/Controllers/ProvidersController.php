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
use Illuminate\Support\Facades\Route;

class ProvidersController extends Controller
{
    /**
     * This play a list of all the providers from the data base 
     */

    public function index()
    {

        // Gets all the providers that exists in the data base
        $providers = Provider::all();
        // validates if the array is empty or not 
        // i do this by counting the number of element inside the array
        // if the number is equal to cero, it means the array is empty

        return view('providers.index', compact('providers'));
    }
    // view for add information about new providers 
    public function create()
    {

        return view('providers.create');
    }

    public function show($id)
    {
        $provider = Provider::find($id);
        return view('providers.details', compact('provider'));
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
        // redirects user to the index of providers if the orperation is performed successfully
        return redirect()->to('/providers');
    }
    // =================================== destroy ===================================
    public function destroy($id)
    {
        // find the provider and store in a variable
        $desiredProvider = Provider::find($id);
        // create sql query to delete row by id
        $sql = "delete from providers where id=?";
        // delete the provider get from data base
        DB::delete($sql, [$id]);
        // redirect user to index view 
      return redirect()->to('/providers');
    }
}
