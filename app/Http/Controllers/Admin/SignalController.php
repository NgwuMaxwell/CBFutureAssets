<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\NewSignalNotification;
use Illuminate\Http\Request;
use App\Models\Signal;
use App\Models\User;
use App\Mail\NewSignalMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;



class SignalController extends Controller
{
    public function index()
    {
        $title = "Client Signals";
        $signals = Signal::latest()->paginate(10);
        return view('admin.signals.index', compact('signals', 'title'));
    }

    public function create()
    {
        $title = "Create Signals";
        return view('admin.signals.create' , compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'entry_price' => 'required|numeric',
            'take_profit' => 'required|numeric',
            'stop_loss' => 'required|numeric',
            'leverage' => 'required|integer|min:1',
        ]);

        $signal = Signal::create([
            'name' => $request->name,
            'entry_price' => $request->entry_price,
            'take_profit' => $request->take_profit,
            'stop_loss' => $request->stop_loss,
            'leverage' => $request->leverage,
            'status' =>  $request->status,
        ]);

        $subscribedUsers = User::whereHas('signalSubscriptions', function ($query) {
            $query->where('expires_at', '>', now());
        })->get();

        $subscribedUsers = User::whereHas('signalSubscriptions')->get();

        $subject = "New Trading Signal Alert";

        foreach ($subscribedUsers as $user) {
            Mail::to($user->email)->send(new NewSignalMail($signal,$user, $subject));
        }


        return redirect()->route('signal.index')->with('success', 'Signal created successfully.');
    }

    public function edit(Signal $signal)
    {

        $signal = Signal::find($signal->id);
        // Pass the signal plan to the view
        $title = 'Edit Client Signals';
        return view('admin.signals.edit', compact('signal','title'));
    }
    public function update(Request $request, Signal $signal)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'entry_price' => 'required|numeric',
            'take_profit' => 'required|numeric',
            'stop_loss' => 'required|numeric',
            'leverage' => 'required|integer',
        ]);


        Signal::where('id',$request->id)->update([
            'name' => $request->name,
            'entry_price' => $request->entry_price,
            'take_profit' => $request->take_profit,
            'stop_loss' => $request->stop_loss,
            'leverage' => $request->leverage,
            "status" =>  $request->status,
        ]);

        return redirect()->route('signal.index')->with('success', 'Signal updated successfully.');
    }


    public function destroy(Signal $signal)
    {
        try {
            // Delete the signal plan
            $signal->delete();

            // Redirect back with a success message
            return redirect()->route('signal.index')->with('success', 'Signal plan deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., database errors)
            return redirect()->route('signal.index')->with('error', 'Failed to delete signal plan.');
        }
    }
}
