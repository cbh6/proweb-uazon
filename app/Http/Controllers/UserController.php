<?php

namespace App\Http\Controllers;

use App\Helpers\JwtAuth;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return UserResource::collection($usuarios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            $data = array(
                'status' => 'error',
                'message' => 'User with id ' . $id . ' does not exist',
                'code' => 404,
            );
            return response()->json($data, 404);
        }

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieve post data
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        $validator = $this->validator($params_array);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Update user
        $user = User::find($id);

        if ($libro) {
            $user->name = $params->isbn;
            $user->email = $params->precio;
            $user->role = $params->titulo;

            if (isset($params->cp)) {
                $user->cp = $params->cp;
            }

            if (isset($params->address)) {
                $user->address = $params->address;
            }

            $user->save();
            $data = array(
                'user' => $user,
                'status' => 'success',
                'message' => 'User actualizado correctamente',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'El user con id ' . $id . ' no existe',
                'code' => 404,
            );
            return response()->json($data, 404);
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            $data = array(
                'user' => $user,
                'status' => 'success',
                'message' => 'User with id ' . $id . ' deleted successfuly',
                'code' => 200,
            );
            return response()->json($data);
        } else {
            $data = array(
                'status' => 'error',
                'message' => 'User with id ' . $id . ' does not exist',
                'code' => 404,
            );
            return response()->json($data, 404);
        }
    }

    /**
     *
     */
    private function validator($data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
    }

    public function register(Request $request)
    {
        // Obtain post request
        $json = $request->input('json', null);
        $params = json_decode($json);
        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $cp = (!is_null($json) && isset($params->cp)) ? $params->cp : null;
        $address = (!is_null($json) && isset($params->address)) ? $params->address : null;
        $role = 'ROLE_USER';

        if (!is_null($email) && !is_null($name) && !is_null($password)) {

            // Create user
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->cp = $cp;
            $user->address = $address;
            $user->role = $role;

            $pwd = hash('sha256', $password);
            $user->password = $pwd;

            // Check duplicated user
            $isset_user = User::where('email', '=', $email)->first();

            if (count($isset_user) == 0) {
                // Save user
                $user->save();

                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El usuario con email ' . $email . ' ha sido registrado satisfactoriamente',
                );
            } else {
                // Dont save user because already exists
                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'El usuario con email ' . $email . ' ya existe',
                );
            }
        } else {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'User not created',
            );
        }

        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        $jwtAuth = new JwtAuth();

        // Receive POST
        $json = $request->input('json', null);
        $params = json_decode($json);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;
        $getIdentity = (!is_null($json) && isset($params->getIdentity)) ? $params->getIdentity : null;

        // Cypher pass
        $pwd = hash('sha256', $password);

        if (!is_null($email) && !is_null($password) && ($getIdentity == null || $getIdentity == 'false')) {
            $signup = $jwtAuth->signup($email, $pwd);
        } else if (!is_null($getIdentity)) {
            $signup = $jwtAuth->signup($email, $pwd, $getIdentity);
        } else {
            $signup = array(
                'status' => 'error',
                'message' => 'Falta alguno de los campos',
            );
        }

        return response()->json($signup, 200);
    }
}
