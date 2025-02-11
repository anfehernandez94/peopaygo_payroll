<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Timesheet;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customers,email|min:5|max:191',
            'password' => 'required|min:8|max:191',
            'business_name' => 'required|string|max:191',
        ]);

        $customer = new Customer;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->business_name = $request->business_name;
        $customer->save();

        return redirect()->route("customer.index")->with("success", "Customer created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view("customer.show", ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view("customer.edit", ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|min:8|max:191',
            'business_name' => 'required|string|max:191',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->password = $request->password;
        $customer->business_name = $request->business_name;
        $customer->save();

        return redirect()->route("customer.index")->with("success", "Customer updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted');
    }

    public function showTimesheets($id)
    {
        // Find the customer by ID with their timesheets eager loaded
        $customer = Customer::with('timesheets')->findOrFail($id);

        // Pass customer and their timesheets to the view
        return view('customer.timesheets', compact('customer'));
    }

    public function showEmployees($id)
    {
        // Find the customer by ID with their timesheets eager loaded
        $customer = Customer::with('employees')->findOrFail($id);

        // Pass customer and their timesheets to the view
        return view('customer.employees', compact('customer'));
    }

    public function showPayrolls($id, $timesheetId)
    {
        $customer = Customer::with('employees')->findOrFail($id);
        $employees = $customer->employees;
        $timesheets = Timesheet::findOrFail($id);

        return view('payroll.index', compact('timesheets', 'employees'));

    }
}
