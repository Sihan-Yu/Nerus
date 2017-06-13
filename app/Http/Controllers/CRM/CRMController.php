<?php

namespace App\Http\Controllers\CRM;

use App\Countries;
use App\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CRMController extends Controller
{

    public function index()
    {
        $customers = Customers::all();
        return view('customers.index')->with(['customers' => $customers, 'old' => null]);
    }

    public function view($id)
    {

        $data = Customers::find($id);
        return view('customers.view')->with(['data' => $data]);
    }

    public function companyCreate()
    {
        $countries = Countries::all();
        return view('customers.create')->with('countries', $countries);
    }

    /**
     * Simple search function for companies
     *
     * @todo Make sure this is safe, it's supposed to be used internally, but still
     * @param Request $request
     * @return View
     */
    public function search(Request $request)
    {
        $term = $request->get('company_search');
        $results = Customers::where('name_en', 'LIKE', "%$term%")->orWhere('name_cn', 'LIKE', "%$term%")->get();
        return view('customers.index')->with(['customers' => $results, 'old' => $term]);
    }

}
