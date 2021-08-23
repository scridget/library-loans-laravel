<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Loan;
use App\Models\Patron;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
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

    private function getLoans(Request $request)
    {
        $query = Loan::join('patrons', 'loans.patron_id', '=', 'patrons.id')
            ->join('institutions', 'loans.institution_id', '=', 'institutions.id')
            ->orderBy($request->filled('sort') ? $request->input('sort') : 'requested_at');

        if ($request->filled('status')) {
            $query->whereIn('status', $request->input('status') === 'active' ? [1,2] : [$request->input('status')]);
        }
        
        if ($request->filled('requested_at')) {
            $query->where('requested_at', '>=', Carbon::parse($request->input('requested_at'))->startOfMonth())
                ->where('requested_at', '<=', Carbon::parse($request->input('requested_at'))->endOfMonth());
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%')
                ->orWhere('nre_id', $request->input('search'))
                ->orWhere('external_barcode', $request->input('search'))
                ->orWhere('internal_barcode', $request->input('search'))
                ->orWhere('patrons.name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('institutions.name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->paginate(20)->withQueryString();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Patron $patron
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function patron(Request $request, Patron $patron)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request))
            ->with('patron', $patron);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Loan $loan
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function loan(Request $request, Loan $loan)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request))
            ->with('loanDetail', $loan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Institution $institution
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function institution(Request $request, Institution $institution)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request))
            ->with('institution', $institution);
    }
}
