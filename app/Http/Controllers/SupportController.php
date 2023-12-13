<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data, including file uploads
        $request->validate([
            'theme' => 'required|string',
            'sprt-message' => 'required|string',
        ]);

        dd($request->all());

        // Process the form data and file uploads here
        // You can access form data using $request->input('theme') and $request->input('sprt-message')
        // Handle file uploads using $request->file('file.*')

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
