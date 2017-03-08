<?php

namespace App\Http\Controllers\Users;

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
        $user = User::find(Auth::user()->id);
        $trails = $user->audits()->with('user')->get();

        // todo: pagination

        return view('users.audit', ['trails' => $trails]);
    }

    // todo: Add ability to see all trails by users once roles are created

}
