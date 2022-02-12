<?php

namespace App\Http\Controllers;

use App\Constants\Loan as LoanConstants;
use App\Models\Institution;
use App\Models\Loan;
use App\Models\Patron;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getLoans(Request $request)
    {
        $query = Loan::select('loans.*')
            ->join('patrons', 'loans.patron_id', '=', 'patrons.id')
            ->join('institutions', 'loans.institution_id', '=', 'institutions.id')
            ->orderBy($request->filled('sort') ? $request->input('sort') : 'requested_at');

        if (!$request->filled('status') || $request->input('status') == 'active') {
            $query->whereIn('status', LoanConstants::ACTIVE_STATUSES);
        } else {
            $query->where('status', $request->input('status'));
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
                ->orWhere('patrons.email', 'like', '%' . $request->input('search') . '%')
                ->orWhere('institutions.email', 'like', '%' . $request->input('search') . '%')
                ->orWhere('institutions.name', 'like', '%' . $request->input('search') . '%');
        }

        return $query->paginate(20)->withQueryString();
    }

    public function index(Request $request)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request));
    }

    public function patron(Request $request, Patron $patron)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request))
            ->with('patron', $patron);
    }

    public function loan(Request $request, Loan $loan)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request))
            ->with('loanDetail', $loan);
    }

    public function institution(Request $request, Institution $institution)
    {
        return view('home')
            ->with('loans' , $this->getLoans($request))
            ->with('institution', $institution);
    }
}
