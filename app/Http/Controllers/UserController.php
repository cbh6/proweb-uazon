<?php

namespace App\Http\Controllers;

use App\Helpers\JwtAuth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
