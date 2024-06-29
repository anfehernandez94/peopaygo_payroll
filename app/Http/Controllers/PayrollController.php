<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = Payroll::all();
        return view('payroll.index', ['payrolls' => $payrolls]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payroll.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'timesheet_id' => 'required|exists:timesheets,id',
            'employee_id' => 'required|exists:employees,id',
            'hour_worked' => 'nullable|numeric|min:0',
        ]);

        // Create a new payroll record with the validated data
        Payroll::create($request->all());

        // Redirect back with a success message
        return redirect()->route('payroll.index')->with('success', 'Payroll created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payroll = Payroll::find($id);
        return view("payroll.index", ['payroll' => $payroll]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payroll = Payroll::findOrFail($id);
        return view("payroll.edit", ['payroll' => $payroll]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'timesheet_id' => 'required|exists:timesheets,id',
            'employee_id' => 'required|exists:employees,id',
            'hour_worked' => 'nullable|numeric|min:0',
        ]);

        $payroll = Payroll::findOrFail($id);

        $payroll->update($request->all());

        // Redirect back with a success message
        return redirect()->route('payroll.index')->with('success', 'Payroll created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payroll = Payroll::findOrFail($id);

        $payroll->delete();

        return redirect()->route('payroll.index')->with('success', 'Payroll deleted');
    }
}
