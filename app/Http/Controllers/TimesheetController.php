<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;
use Ramsey\Uuid\Type\Time;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timesheets = Timesheet::all();
        return view('timesheet.index', ['timesheets' => $timesheets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('timesheet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'pay_period_init' => 'required|date',
            'pay_period_end' => 'required|date|after:pay_period_init',
            'check' => 'required|date|after_or_equal:pay_period_end',
            'status' => 'required|in:pending,approved,rejected',
            'note' => 'nullable|string',
        ]);

        Timesheet::create($request->all());

        return redirect()->route('timesheet.index')->with('success', 'Timesheet created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view("timesheet.show", ['timesheet' => $timesheet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view("timesheet.edit", ['timesheet' => $timesheet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'pay_period_init' => 'required|date',
            'pay_period_end' => 'required|date|after:pay_period_init',
            'check' => 'required|date|after_or_equal:pay_period_end',
            'status' => 'required|in:pending,approved,rejected',
            'note' => 'nullable|string',
        ]);

        $timesheet = Timesheet::findOrFail($id);

        $timesheet->update($request->all());

        return redirect()->route('timesheet.index')->with('success', 'Timesheet updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);

        $timesheet->delete();

        return redirect()->route('timesheet.index')->with('success', 'Timesheet deleted');
    }
}
