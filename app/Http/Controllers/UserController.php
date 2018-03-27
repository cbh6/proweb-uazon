<?php

namespace App\Http\Controllers;

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
                    'message' => 'User registered successfuly',
                );
            } else {
                // Dont save user because already exists
                $data = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'User already exist, cannot register',
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
        echo "login";die();
    }
}
