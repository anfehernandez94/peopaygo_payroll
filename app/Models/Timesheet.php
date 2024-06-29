<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'customer_id',
        'pay_period_init',
        'pay_period_end',
        'check',
        'status',
        'note'
    ];
}