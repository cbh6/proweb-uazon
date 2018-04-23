<?php

namespace App\Helpers;

use App\User;
use Firebase\JWT\JWT;

class JwtAuth
{
    public $key;

    public function __construct()
    {
        $this->key = 'uaz17-18key';
    }

    public function signup($email, $password, $getIdentity = null)
    {
        $user = User::where(
            array(
                'email' => $email,
                'password' => $password,
            ))->first();

        $signup = false;
        if (is_object($user)) {
            $signup = true;
        }

        if ($signup) {
            // Generate and return token
            $token = array(
                'sub' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'iat' => time(),
                'exp' => time() + (7 * 24 * 60 * 60),
            );

            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));

            // Return token if user is doing login
            if (is_null($getIdentity)) {
                return $jwt;
                // Return decoded token if user has logged and is navigating
            } else {
                return $decoded;
            }
        } else {
            // Return error
            return array('status' => 'error', 'message' => 'Credenciales invalidas');
        }
    }

    public function checkToken($jwt, $getIdentity = false)
    {
        $auth = false;

        try {
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        } catch (\UnexpectedValueException $e) {
            $auth = false;
        } catch (\DomainException $e) {
            $auth = false;
        }

        if (isset($decoded) && is_object($decoded) && isset($decoded->sub)) {
            $auth = true;
        } else {
            $auth = false;
        }

        if ($getIdentity) {
            return $decoded;
        }

        return $auth;
    }
}
