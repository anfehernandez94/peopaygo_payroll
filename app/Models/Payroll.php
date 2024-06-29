<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = ['timesheet_id', 'employee_id', 'hour_worked'];

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
