<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'customer_id',
        'name',
        'pay_type',
        'pay_rate',
    ];
}
