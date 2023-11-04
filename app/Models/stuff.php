<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stuff extends Model
{
    use HasFactory;

     protected $fillable = [
        'Name',
        'Last_Name',
        'Phone_Number',
        'Email'
    ];
}
