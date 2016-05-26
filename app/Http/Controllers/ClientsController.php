<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use App\Clients;

class ClientsController extends Controller {

    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function indexList(Request $request) {

        try {
            $obj_clients = Clients::all();
            $statusCode = 200;            
            $response=$obj_clients;
            
        } catch (Exception $ex) {
            $response = ["error" => "System error"];
            $statusCode = 404;
        } finally {
            return Response()->json($response, $statusCode);
        }
    }

    public function getClientsList(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                        'rut' => 'required',
            ]);

            if ($validator->fails()) {
                $response = ['error' => 'Validation Error'];
                $statusCode = 400;
            } else {

                $rut = $request['rut'];

                $obj_client = new Clients();
                $listData = $obj_client->getListRutCliets($rut);
                $statusCode = 200;
                $response = $listData;
            }
        } catch (Exception $ex) {
            $response = ["error" => "System error"];
            $statusCode = 404;
        } finally {
            return Response()->json($response, $statusCode);
        }
    }

    public function insertClients(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                        'rut' => 'required',
                        'name' => 'required',
                        'lastName' => 'required',
                        'phone' => 'required',
                        'mobile' => 'required',
                        'address' => 'required'
            ]);


            if ($validator->fails()) {

                $response = ['error' => 'Validation Error'];
                $statusCode = 400;
            } else {


                $obj_clients = new Clients();

                $rut = $request['rut'];
                $name = $request['name'];
                $lastName = $request['lastName'];
                $phone = $request['phone'];
                $mobile = $request['mobile'];
                $address = $request['address'];

                $obj_clients->rut = $rut;
                $obj_clients->name = $name;
                $obj_clients->lastName = $lastName;
                $obj_clients->phone = $phone;
                $obj_clients->mobile = $mobile;
                $obj_clients->address = $address;
                $obj_clients->save();

                $statusCode = 200;
                $response = 'Saved data successfully';
            }
        } catch (Exception $ex) {
            $response = ["error" => "System error"];
            $statusCode = 404;
        } finally {
            return Response()->json($response, $statusCode);
        }
    }

    public function update(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                        'id' => 'required'
            ]);

            if ($validator->fails()) {
                $response = ['error' => 'Validation Error'];
                $statusCode = 400;
            } else {

                $id = $request['id'];
                $rut = $request['rut'];
                $name = $request['name'];
                $lastName = $request['lastName'];
                $phone = $request['phone'];
                $mobile = $request['mobile'];
                $address = $request['address'];

                $obj_clients = Clients::find($id);
                $obj_clients->rut = $rut;
                $obj_clients->name = $name;
                $obj_clients->lastName = $lastName;
                $obj_clients->phone = $phone;
                $obj_clients->mobile = $mobile;
                $obj_clients->address = $address;
                $obj_clients->save();
                $statusCode = 200;
                $response = 'updated data successfully';
            }
        } catch (Exception $ex) {
            $response = ["error" => "System error"];
            $statusCode = 404;
        } finally {
            return Response()->json($response, $statusCode);
        }
    }

}
