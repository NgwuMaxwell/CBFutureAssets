<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TradeClosedNotification;

class UsersController extends Controller
{

  public function verifyemail()
  {
    return view('auth.verify-email', [
      'title' => 'Verify Your email address',
    ]);
  }
  public function addusername(Request $request)
  {
    Validator::make($request->all(), [
      'username' => ['required', 'unique:users,username'],
    ])->validate();

    User::where('id', Auth::user()->id)->update([
      'username' => $request['username'],
    ]);
    return redirect()->route('dashboard');
  }

  //send contact message to admin email
  public function sendcontact(Request $request)
  {

    $settings = Settings::where('id', '1')->first();

    $message = "$request->message";
    $subject = "Inquiry from $request->name with email $request->email";


    Mail::to($settings->contact_email)->send(new NewNotification($message, $subject, 'Admin'));

    return redirect()->back()
      ->with('success', ' Your message was sent successfully!');
  }



  public function otherpayment(Request $request)
  {

    $settings = Settings::where('id', '1')->first();

    $message = "$request->message";
    $subject = "Payment Method Request from $request->name with email $request->email for $request->mode and Amount $settings->currency$request->amount";


    Mail::to($settings->contact_email)->send(new NewNotification($message, $subject, 'Admin'));

    return redirect()->back()
      ->with('success', ' Your Payment request submitted Sucessfully!');
  }


  //Get downlines level
  public function getdownlines($array, $parent = 0, $level = 0)
  {
    $referedMembers = '';
    foreach ($array as $entry) {
      if ($entry->ref_by == $parent) {

        if ($level == 0) {
          $levelQuote = "Direct referral";
        } else {
          $levelQuote = "Indirect referral level $level";
        }

        $referedMembers .= "
                  <tr>
                  <td> $entry->name $entry->l_name </td>
                  <td> $levelQuote </td>" .
          '<td>' . $this->getUserParent($entry->id) . '</td>' .
          '<td>' . $this->getUserStatus($entry->id) . '</td>
                  <td>' . $this->getUserRegDate($entry->id) . '</td>
                  </tr>';

        $referedMembers .= $this->getdownlines($array, $entry->id, $level + 1);
      }

      if ($level == 6) {
        break;
      }
    }
    return $referedMembers;
  }

  //Get user Parent
  function getUserParent($id)
  {
    $user = User::where('id', $id)->first();
    $parent = User::where('id', $user->ref_by)->first();
    if ($parent) {
      return "$parent->name $parent->l_name";
    } else {
      return "null";
    }
  }

  //Get user status
  function getUserStatus($id)
  {
    $user = User::where('id', $id)->first();

    return $user->status;
  }

  //Get User Registration Date
  function getUserRegDate($id)
  {
    $user = User::where('id', $id)->first();

    return $user->created_at;
  }
}
