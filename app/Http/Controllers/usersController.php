<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    public function register(Request $req)
    {
    		$data = [
    			'name' => $req->name,
    			'email' => $req->email,
    			'password' => $req->password,
    		];

    	$user = User::create($data);

    	$token = $user->createToken('myapptoken')->plainTextToken;

    	$response = [

    		'user' => $data,
    		'token' => $token,
    	];


    	return response($response, 201);
    }


    public function login(Request $req)
    {
            $data = [
                'email' => $req->email,
                'password' => $req->password,
            ];

        $user = User::where(['email' => $req->email, 'password' => $req->password])->first();

        //return response(['$user' => $user], 201);

        if(!$user)
        {
            return ['message' => 'bad creds'];
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [

            'user' => $user,
            'token' => $token,
        ];


        return response($response, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [

            'message' => 'Loggoed out'

        ];
    }
}
