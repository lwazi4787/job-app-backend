<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'Task_Name',
        'Customer',
        'Status',
        'Task_number',
        'Assigned_to',
        'Assigned_by'
    ];
}
