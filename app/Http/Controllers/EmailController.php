<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'description' => 'required|string',
        ]);

        // Extract the validated data
        $myemail = $validatedData['email'];
        $subject = $validatedData['subject'];
        $description = $validatedData['description'];

        // Send the email
        Mail::to('raoua.mth@gmail.com')->send(new NotificationEmail($description, $subject, $myemail));

        return response()->json(['message' => 'Email sent successfully!']);
    }
}
