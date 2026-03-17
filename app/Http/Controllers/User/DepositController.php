<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Deposit;
use App\Models\Wdmethod;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositStatus;
use App\Traits\TemplateTrait;

class DepositController extends Controller
{
    use TemplateTrait;

    public function getmethod($id)
    {
        $methodname =  Wdmethod::where('id', $id)->first();
        return response()->json($methodname->name);
    }

    //Return payment page
    public function newdeposit(Request $request)
    {
        $settings = Settings::where('id', '1')->first();
        $methodname =  Wdmethod::where('name', $request->payment_method)->first();

        if ($methodname->name == "Credit Card" and $settings->credit_card_provider == "Stripe") {
            $secretkey = $settings->s_s_k;
            $zero = '00';
            $amt = $request->amount . $zero;

            \Stripe\Stripe::setApiKey($secretkey);
            $paymentIntent  = \Stripe\PaymentIntent::create([
                'amount' => $amt,
                'currency' => strtolower($settings->s_currency),
                'payment_method_types' => ['card'],
                'description' => 'Funding My Investment Account',
                'shipping' => [
                    'name' => Auth::user()->name,
                    'address' => [
                        'line1' => 'No Address',
                        'postal_code' => '000000',
                        'city' => 'No City',
                        'state' => 'CA',
                        'country' => 'US',
                    ],
                ],
                'metadata' => ['integration_check' => 'accept_a_payment'],
            ]);

            //return $client_secret;
            $client_secret = $paymentIntent->client_secret;
        }
        $client_secret = "";


        //store payment info in session
        $request->session()->put('amount', $request['amount']);
        $request->session()->put('payment_mode', $methodname->name);
        $request->session()->put('intent', $client_secret);

        return redirect()->route('payment');
    }

    //payment route
    public function payment(Request $request)
    {
        $methodname =  Wdmethod::firstWhere('name', $request->session()->get('payment_mode'));
        return view("user.payment")
            ->with(array(
                'amount' => $request->session()->get('amount'),
                'payment_mode' => $methodname,
                'intent' => $request->session()->get('intent'),
                'title' => 'Make Payment',
            ));
    }

    public function savestripepayment(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        //get settings
        $settings = Settings::where('id', '=', '1')->first();
        $earnings = $settings->referral_commission * $request->amount / 100;


        //save and confirm the deposit
        $dp = new Deposit();
        $dp->amount = $request->amount;
        $dp->payment_mode = "Stripe";
        $dp->status = 'Processed';
        $dp->proof = "Credit Card";
        $dp->plan = 0;
        $dp->user = $user->id;
        $dp->save();

        if ($settings->deposit_bonus != NULL and $settings->deposit_bonus > 0) {
            $bonus = $request->amount * $settings->deposit_bonus / 100;
            //create history
            Tp_Transaction::create([
                'user' => $user->id,
                'plan' => "Deposit Bonus for $settings->currency $request->amount deposited",
                'amount' => $bonus,
                'type' => "Bonus",
            ]);
        } else {
            $bonus = 0;
        }

        //add funds to user's account
        User::where('id', $user->id)
            ->update([
                'account_bal' => $user->account_bal + $request->amount + $bonus,
                'bonus' => $user->bonus + $bonus,
                'cstatus' => 'Customer',
            ]);

        if (!empty($user->ref_by)) {

            $agent = User::where('id', $user->ref_by)->first();
            User::where('id', $user->ref_by)
                ->update([
                    'account_bal' => $agent->account_bal + $earnings,
                    'ref_bonus' => $agent->ref_bonus + $earnings,
                ]);

            //credit commission to ancestors
            $users = User::all();
            $this->getAncestors($users, $request->amount, $user->id);

            Tp_Transaction::create([
                'user' => $user->ref_by,
                'plan' => "Credit",
                'amount' => $earnings,
                'type' => "Ref_bonus",
            ]);
        }

        //Send confirmation email to user regarding his deposit and it's successful.
        Mail::to($user->email)->send(new DepositStatus($dp, $user, 'Successful Deposit', false));

        // delete the session variables
        $request->session()->forget('payment_mode');
        $request->session()->forget('amount');
        $request->session()->forget('intent');

        return response()->json(['success' => 'Payment Completed, redirecting']);
    }

    //Save deposit requests
    public function savedeposit(Request $request)
    {
        // Debug: Log the request data
        \Log::info('Deposit request data:', [
            'paymethd_method' => $request->paymethd_method,
            'amount' => $request->amount,
            'has_file' => $request->hasFile('proof'),
            'file_name' => $request->file('proof') ? $request->file('proof')->getClientOriginalName() : null
        ]);

        // Get the payment method to check minimum amount
        $paymentMethod = Wdmethod::where('name', $request->paymethd_method)->first();
        
        // Debug: Log payment method lookup
        \Log::info('Payment method lookup:', [
            'requested_method' => $request->paymethd_method,
            'found_method' => $paymentMethod ? $paymentMethod->name : null,
            'minimum_amount' => $paymentMethod ? $paymentMethod->minimum : null
        ]);
        
        // Set minimum amount based on payment method, default to 100 if not set
        $minAmount = $paymentMethod ? $paymentMethod->minimum : 100;

        $request->validate([
            'proof' => 'nullable|file|mimes:pdf,doc,jpeg,jpg,png|max:2048', // Max 2MB file size
            'amount' => 'required|numeric|min:' . $minAmount,
            'paymethd_method' => 'required|string',
        ]);

        $settings = Settings::where('id', '=', '1')->first();
        $path = null;

        if ($request->hasfile('proof')) {
            $file = $request->file('proof');

            $mimeType = $file->getMimeType();
            $allowedExtensions = ['pdf', 'doc', 'jpeg', 'jpg', 'png'];

    // ✅ Allowed MIME types
    $allowedMimeTypes = [
        'application/pdf',
        'application/msword',
        'image/jpeg',
        'image/png'
    ];
    $extension = strtolower($file->getClientOriginalExtension()); // Get actual file extension
    $mimeType = $file->getMimeType(); // Get actual MIME type

    // ❌ Check if the file has an invalid extension
    if (!in_array($extension, $allowedExtensions)) {
        return redirect()->back()->with('message', 'Unaccepted file type uploaded.');
    }

    if (!in_array($mimeType, $allowedMimeTypes)) {
        return redirect()->back()->with('message', 'Invalid file type uploaded.');
    }
            $extension = $file->extension();
            $whitelist = array('pdf', 'doc', 'jpeg', 'jpg', 'png');

            if (in_array($extension, $whitelist)) {
                $path = $file->store('uploads', 'public');
            } else {
                return redirect()->back()
                    ->with('message', 'Unaccepted Image Uploaded');
            }
        }

        $dp = new Deposit();
        $dp->amount = $request['amount'];
        $dp->payment_mode = $request['paymethd_method'];
        $dp->status = 'Pending';
        $dp->proof = $path;
        $dp->user = Auth::user()->id;
        $dp->save();

        //get user
        $user = User::where('id', Auth::user()->id)->first();

        //Send Email to admin regarding this deposit
        \Log::info('Skipping email sending for deposit ID: ' . $dp->id . ' (temporarily disabled)');
        // try {
        //     Mail::to($settings->contact_email)->send(new DepositStatus($dp, $user, 'Successful Deposit', true));
        //     \Log::info('Admin email sent successfully for deposit ID: ' . $dp->id);
        // } catch (\Exception $e) {
        //     \Log::error('Failed to send admin email for deposit ID: ' . $dp->id . '. Error: ' . $e->getMessage());
        // }

        //Send confirmation email to user regarding his deposit and it's successful.to get a response back from admin
        \Log::info('Skipping user email for deposit ID: ' . $dp->id . ' (temporarily disabled)');
        // try {
        //     Mail::to($user->email)->send(new DepositStatus($dp, $user, 'Successful Deposit', false));
        //     \Log::info('User email sent successfully for deposit ID: ' . $dp->id);
        // } catch (\Exception $e) {
        //     \Log::error('Failed to send user email for deposit ID: ' . $dp->id . '. Error: ' . $e->getMessage());
        // }

        // Kill the session variables
        $request->session()->forget('payment_mode');
        $request->session()->forget('amount');

        \Log::info('Redirecting to deposits page with success message');
        \Log::info('Session data before redirect: ' . json_encode(session()->all()));
        return redirect()->route('deposits')
            ->with('success', 'Account Fund Successful! Please wait for system to validate this transaction.');
    }

    //Get uplines
    function getAncestors($array, $deposit_amount, $parent = 0, $level = 0)
    {
        $referedMembers = '';
        $parent = User::where('id', $parent)->first();

        foreach ($array as $entry) {
            if ($entry->id == $parent->ref_by) {
                //get settings
                $settings = Settings::where('id', '=', '1')->first();

                if ($level == 1) {
                    $earnings = $settings->referral_commission1 * $deposit_amount / 100;
                    //add earnings to ancestor balance
                    User::where('id', $entry->id)
                        ->update([
                            'account_bal' => $entry->account_bal + $earnings,
                            'ref_bonus' => $entry->ref_bonus + $earnings,
                        ]);

                    //create history
                    Tp_Transaction::create([
                        'user' => $entry->id,
                        'plan' => "Credit",
                        'amount' => $earnings,
                        'type' => "Ref_bonus",
                    ]);
                } elseif ($level == 2) {
                    $earnings = $settings->referral_commission2 * $deposit_amount / 100;
                    //add earnings to ancestor balance
                    User::where('id', $entry->id)
                        ->update([
                            'account_bal' => $entry->account_bal + $earnings,
                            'ref_bonus' => $entry->ref_bonus + $earnings,
                        ]);

                    //create history
                    Tp_Transaction::create([
                        'user' => $entry->id,
                        'plan' => "Credit",
                        'amount' => $earnings,
                        'type' => "Ref_bonus",
                    ]);
                } elseif ($level == 3) {
                    $earnings = $settings->referral_commission3 * $deposit_amount / 100;
                    //add earnings to ancestor balance
                    User::where('id', $entry->id)
                        ->update([
                            'account_bal' => $entry->account_bal + $earnings,
                            'ref_bonus' => $entry->ref_bonus + $earnings,
                        ]);

                    //create history
                    Tp_Transaction::create([
                        'user' => $entry->id,
                        'plan' => "Credit",
                        'amount' => $earnings,
                        'type' => "Ref_bonus",
                    ]);
                } elseif ($level == 4) {
                    $earnings = $settings->referral_commission4 * $deposit_amount / 100;
                    //add earnings to ancestor balance
                    User::where('id', $entry->id)
                        ->update([
                            'account_bal' => $entry->account_bal + $earnings,
                            'ref_bonus' => $entry->ref_bonus + $earnings,
                        ]);

                    //create history
                    Tp_Transaction::create([
                        'user' => $entry->id,
                        'plan' => "Credit",
                        'amount' => $earnings,
                        'type' => "Ref_bonus",
                    ]);
                } elseif ($level == 5) {
                    $earnings = $settings->referral_commission5 * $deposit_amount / 100;
                    //add earnings to ancestor balance
                    User::where('id', $entry->id)
                        ->update([
                            'account_bal' => $entry->account_bal + $earnings,
                            'ref_bonus' => $entry->ref_bonus + $earnings,
                        ]);

                    //create history
                    Tp_Transaction::create([
                        'user' => $entry->id,
                        'plan' => "Credit",
                        'amount' => $earnings,
                        'type' => "Ref_bonus",
                    ]);
                }

                if ($level == 6) {
                    break;
                }

                //$referedMembers .= '- ' . $entry->name . '- Level: '. $level. '- Commission: '.$earnings.'<br/>';
                $referedMembers .= $this->getAncestors($array, $deposit_amount, $entry->id, $level + 1);
            }
        }
        return $referedMembers;
    }
}
