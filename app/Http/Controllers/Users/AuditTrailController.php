<?php

namespace App\Http\Controllers\Users;

use App\Audit;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{

    /**
     * Returns view and info for the user's Audit Trail, note: the user should only be able to see their own Audit Trail
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $trails = Audit::where('user_id', Auth::user()->getAuthIdentifier())->orderBy('created_at', 'DESC')->get();

        return view('users.audit', ['trails' => $trails]);

    }

    // todo: Add ability to see all trails by users once roles are created

}
