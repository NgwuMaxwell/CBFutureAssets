<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //Updating Profile Route
    public function updateprofile(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'address' => $request->address,
                'state' => $request->state,
                'zipcode' =>  $request->zipcode,
            ]);

            return redirect()->back()
            ->with('success', 'Action Sucessful! Profile Information Updated Sucessfully!.');
        
    }

    //update account and contact info
    public function updateacct(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'bank_name' => $request['bank_name'],
                'account_name' => $request['account_name'],
                'account_number' => $request['account_no'],
                'swift_code' => $request['swiftcode'],
                'btc_address' => $request['btc_address'],
                'eth_address' => $request['eth_address'],
                'ltc_address' => $request['ltc_address'],
                'usdt_address' => $request['usdt_address'],
            ]);
        return response()->json(['status' => 200, 'success' => 'Withdrawal Info updated Sucessfully']);
    }

    //Update Password
    public function updatepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('message', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password updated successfully');
    }

    // Update email preference logic
    public function updateemail(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->sendotpemail = $request->otpsend;
        $user->sendroiemail = $request->roiemail;
        $user->sendinvplanemail = $request->invplanemail;
        $user->save();
        return response()->json(['status' => 200, 'success' => 'Email Preference updated']);
    }




     //Updating Profile Route
     public function updateprofileimage(Request $request){
        
        
        $this->validate($request, [
            'profileimage' => 'mimes:jpg,jpeg,png|max:4000|image',
        ]);
        
        
        
        $settings = Settings::where('id', '=', '1')->first();
        $strtxt = $this->RandomStringGenerator(6);
        
        if($request->hasfile('profileimage')){

            $document1 = $request->file('profileimage');
            $filename1 = $document1->getClientOriginalName();
            $parts = explode(".", $filename1);  // Split filename into parts
            $ext = array_pop($parts);            // Get the last part (the extension)
            $whitelist = array('jpeg','jpg','png');
  
            if (in_array($ext, $whitelist)) {
  
                  $cardname = $strtxt . $filename1 . time();
                  // save to storage/app/uploads as the new $filename
                  $path = $document1->storeAs('public/photos', $cardname);
              
  
            } else {
              return redirect()->back()
              ->with('message', 'Unaccepted ID Card Image Uploaded, try renaming the image file');
            }
          
        //update user
        User::where('id',Auth::user()->id)
        ->update([
            'profile_photo_path' => $cardname,
           
        ]);
      }
        return redirect()->back()
            ->with('success', 'Action Sucessful! Profile Photo Updated Sucessfully!.');
        
        
        
        
    
    }

// for front end content management
function RandomStringGenerator($n) 
{ 
    $generated_string = ""; 
    $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
    $len = strlen($domain); 
    for ($i = 0; $i < $n; $i++) 
    { 
        $index = rand(0, $len - 1); 
        $generated_string = $generated_string . $domain[$index]; 
    } 
    // Return the random generated string 
    return $generated_string; 
} 

}