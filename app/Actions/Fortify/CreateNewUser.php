<?php

namespace App\Actions\Fortify;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\Settings;
use App\Models\Agent;
use App\Models\CryptoAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $settings = Settings::where('id', '1')->first();
        $request = request();
        if ($settings->captcha == "true") {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'unique:users,username'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'g-recaptcha-response' => 'required|captcha',
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();
        } else {
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'unique:users,username'],
                'gender' => ['required','string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

                'captcha' => ['required', function ($attribute, $value, $fail) use ($input) {
                if ($value !== $input['captcha_confirmation']) {
                      $fail('The CAPTCHA code does not match.');
                             }
                 }],

                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();
        }

        // Extract referral code from URL parameter or form input
        $referralCode = $request->input('ref') ?? $input['ref_by'] ?? null;
        $ref_by_id = null;

        if ($referralCode) {
            // Parse format: "210-new1" -> extract "210"
            $refId = explode('-', $referralCode)[0];
            $referrer = User::find($refId);
            
            if ($referrer) {
                $ref_by_id = $referrer->id;
            }
        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'username' => $input['username'],
            'country' => $input['country'],
            'gender' => $input['gender'],
            'ref_by' => $ref_by_id,
            'status' => 'active',
            'account' => json_encode($input['account']),
            'password' => Hash::make($input['password']),
        ]);

        $cryptoaccnt = new CryptoAccount();
        $cryptoaccnt->user_id = $user->id;
        $cryptoaccnt->save();
        $request->session()->forget('ref_by');
        Mail::to($user->email)->send(new WelcomeEmail($user));

        return $user;
    }
}
