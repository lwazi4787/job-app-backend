<?php

namespace App\Http\Controllers;
use App\Models\stuff;
use Illuminate\Http\Request;

class stuffController extends Controller
{
    public function addStuff(Request $req)
    {
    	$data = [
    		'Name' => $req->name,
    		'Last_Name' => $req->last,
    		'Phone_Number' => $req->phone,
    		'Email' => $req->email
    	];

    	stuff::create($data);
    }

    public function showStuff()
    {
    	return stuff::all();
    }
}
