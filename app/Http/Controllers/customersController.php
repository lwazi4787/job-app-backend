<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;

class customersController extends Controller
{
    public function addCustomer(Request $req)
    {
    	$data = [
    		'Name' => $req->name,
    		'Last_Name' => $req->last,
    		'Phone_Number' => $req->phone,
    		'Email' => $req->email,
    		'Address' => $req->address
    	];

    	customers::create($data);
    }

    public function getAllClients()
    {
    	return customers::all();
    }


}
