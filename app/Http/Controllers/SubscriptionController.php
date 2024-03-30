<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Subscriber;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{

    public function subscribe(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // If validation fails, return back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Subscriber::create([
            'email' => $request->email,
        ]);

        // // Generate a confirmation token
        // $confirmationToken = Str::random(32);

        // // Create a new subscriber
        // $subscriber = Subscriber::create([
        //     'email' => $request->email,
        //     'confirmation_token' => $confirmationToken,
        // ]);

        // // Send confirmation email
        // Mail::to($subscriber->email)->send(new ConfirmationEmail($confirmationToken));

        return view('subscribe.success');
    }

    // public function confirm($token)
    // {
    //     // Find subscriber by confirmation token
    //     $subscriber = Subscriber::where('confirmation_token', $token)->first();

    //     // If subscriber not found, return error
    //     if (!$subscriber) {
    //         return view('confirm', ['success' => false]);
    //     }

    //     // Confirm subscriber
    //     $subscriber->update([
    //         'confirmed_at' => now(),
    //         'confirmation_token' => null,
    //     ]);

    //     return view('confirm', ['success' => true]);
    // }
}
