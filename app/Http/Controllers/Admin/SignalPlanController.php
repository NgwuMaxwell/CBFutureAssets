<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SignalPlan;

class SignalPlanController extends Controller
{
    // Show all signal plans
    public function index()
    {

        $title = "All SIgnal Plans";
        $plans = SignalPlan::latest()->paginate(10);
        return view('admin.signals.plans.index', compact('plans','title'));
    }

    // Show form to create a new signal plan
    public function create()
    {

        $title = "Create Signal Plans";
        return view('admin.signals.plans.create' , compact('title'));
    }

    // Store new signal plan
    public function store(Request $request)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features'=>'required|string',
            'duration' => 'required|integer|min:1',
        ]);

        SignalPlan::create($request->all());

        return redirect()->route('signal-plans.index')->with('success', 'Signal plan created successfully.');
    }

    // Show form to edit a signal plan
    public function edit(SignalPlan $signalPlan)
    {
        $title = "Edit Signals Plan";
        return view('admin.signals.plans.edit', compact('signalPlan','title'));
    }

    // Update signal plan
    public function update(Request $request, SignalPlan $signalPlan)
    {
          
      
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features'=> 'required|string',
            'duration' => 'required|integer|min:1',
        ]);

        $signalPlan->update($request->all());

        return redirect()->route('signal-plans.index')->with('success', 'Signal plan updated successfully.');
    }

    // Delete signal plan
    public function destroy(SignalPlan $signalPlan)
    {
        $signalPlan->delete();
        return redirect()->route('signal-plans.index')->with('success', 'Signal plan deleted successfully.');
    }
}
