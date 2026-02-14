<?php

namespace App\Http\Controllers;
use App\Mail\LoanRequestMail;
use App\Mail\LoanRejectedMail;
use App\Mail\LoanApprovedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Loan;
use App\Models\User;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function create()
{
    $settings = Settings::where('id', '=', '1')->first();
    $title = 'Apply for Loan';
    return view('user.loans.apply' ,compact('title','settings'));
}

public function store(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:100',
        'credit_facility' => 'required|string',
        'duration' => 'required|integer|min:1',
        'monthly_income' => 'required',
        'purpose' => 'required|string',
    ]);
    $user = User::where('id', Auth::user()->id)->first();
    $loan = Loan::create([
        'user_id' => auth()->id(),
        'amount' => $request->amount,
        'credit_facility' => $request->credit_facility,
        'duration' => $request->duration,
        'monthly_income' => $request->monthly_income,
        'purpose' => $request->purpose,
        'status' => 'pending'
    ]);

    // Send email notification
    Mail::to(auth()->user()->email)->send(new LoanRequestMail($loan ,$user, 'Loan Request Submitted'));

    return redirect()->route('loans.my')->with('success', 'Loan request submitted.');
}

public function myLoans()
{
    $settings = Settings::where('id', '=', '1')->first();
    $title = "All my Loans Application";
    $loans = Loan::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    return view('user.loans.my_loans', compact('loans','settings','title'));
}



public function index()
{

    $title = 'Manage Loans Appplication';
    $settings = Settings::where('id', '=', '1')->first();
    $loans = Loan::with('user')->where('status', 'pending')->get();
    return view('admin.loans.index', compact('loans','settings','title'));
}

public function approve(Loan $loan)
{
    $loan->update(['status' => 'approved']);
     $user = User::find($loan->user_id);
    // Credit user account
    $user = $loan->user;
    $user->account_bal += $loan->amount;
    $user->save();
  
    $subject = "Loan Application Approve";
    Mail::to($user->email)->send(new LoanApprovedMail($loan,$user,$subject));
    return back()->with('success', 'Loan approved and credited.');
}

public function reject(Loan $loan)
{
    $loan->update(['status' => 'rejected']);
    $user = User::where('id', Auth::user()->id)->first();
    $subject = "Loan Application Rejected";
    Mail::to($loan->user->email)->send(new LoanRejectedMail($loan,$user,$subject));

    return back()->with('message', 'Loan application rejected.');
}


}
