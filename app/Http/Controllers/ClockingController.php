<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure this line is present


class ClockingController extends Controller
{
    


       public function index()
    {
        $user = Auth::user();
        $clockings = $user->clockings()->latest()->get();
        return view('user.clocking', compact('clockings'));
    }

     public function clockIn()
    {
        $user = Auth::user();
        $clocking = Clocking::create([
            'user_id' => $user->id,
            'clock_in' => now(),
        ]);

        return redirect()->back()->with('success', 'Clocked in successfully.');
    }


      public function clockOut()
    {
        $user = Auth::user();
        $lastClocking = $user->clockings()->latest()->first();

        if ($lastClocking && !$lastClocking->clock_out) {
            $lastClocking->update([
                'clock_out' => now(),
            ]);
            return redirect()->back()->with('success', 'Clocked out successfully.');
        }

        return redirect()->back()->with('error', 'You are not currently clocked in.');
    }



}