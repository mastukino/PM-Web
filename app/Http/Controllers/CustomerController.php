<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with(['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->code = $request->code;
        $customer->email = $request->email;
        $customer->contact_person = $request->contact_person;
        $customer->fax = $request->fax;
        $customer->tel = $request->tel;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->back()->withSuccess('Customer created sucessfully');

    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit')->with(['customer' => $customer]);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer =Customer::find($id);
        $customer->name = $request->name;
        $customer->code = $request->code;
        $customer->email = $request->email;
        $customer->contact_person = $request->contact_person;
        $customer->fax = $request->fax;
        $customer->tel = $request->tel;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->back()->withSuccess('Customer updated sucessfully');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->back()->withSuccess('Customer deleted sucessfully');
    }
}
