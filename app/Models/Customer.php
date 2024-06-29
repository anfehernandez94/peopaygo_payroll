<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
