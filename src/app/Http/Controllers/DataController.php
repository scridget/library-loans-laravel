<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Loan;
use App\Models\Resource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('data', [
            'institutions' => Institution::withCount(['resources', 'users', 'loans', 'comments'])->get(),
            'loans' => Loan::withCount('comments')->get(),
            'resources' => Resource::withCount(['loans', 'comments'])->get(),
            'users' => User::withCount(['householdMembers', 'institutions', 'loans', 'loanAssignments', 'comments'])->get(),
        ]);
    }
}
