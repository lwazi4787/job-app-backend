<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Last_Name',
        'Phone_Number',
        'Email',
        'Address'
    ];
}
