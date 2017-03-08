<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerContactController extends Controller
{
    //

    public function index()
    {
        $customerContacts = CustomerContact::all;
        return view('customers.contacts.index',['customerscontacts'=>$customerContacts]);
    }

    public function show($customerContactId)
    {
        $customerContact = CustomerContact::find($customerContactId);
        return view('customers.contracts.profile', ['customercontact' => $customerContact]);
    }

    public function create()
    {
        $customerContacts = CustomerContact::all();
        return view('customers.contacts.create',['customercontacts' => $customerContacts]);
    }

    public function store(CustomerContactCreateRequest $request)
    {
        $customerContactInfo = $request->only(
            'cn_name',
            'en_name',
            'position',
            'tel',
            'mob',
            'fax',
            'email'
        );

        $isCustomerContact = CustomerContact::where('cn_name', '=', $customerContactInfo['cn_name'])->count();

        if (!$isCustomerContact)
        {
            CustomerContact::create($customerContactInfo);
        }
        return redirect((route('customers.contacts.store')));
    }
}
