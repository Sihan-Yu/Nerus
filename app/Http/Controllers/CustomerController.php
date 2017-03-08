<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $customers = Customer::all;
        return view('customers.index',['customers'=>$customers]);
    }

    public function show($customerId)
    {
        $customer = Customer::find($customerId);
        return view('customers.profile', ['customer' => $customer]);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('customers.create',['customers' => $customers]);
    }

    public function store(CustomerCreateRequest $request)
    {
        $customerName = $request->only(
            'cn_name',
            'en_name'
        );

        $isCustomer = Customer::where('cn_name', '=', $customerName['cn_name'])->count();

        if (!$isCustomer)
        {
            Customer::create($customerName);
        }
        return redirect((route('customers.store')));
    }

}
