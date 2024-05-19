<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front-end.pages.contact-us');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        try {
            // Create and save the contact record
            Contact::create($request->validated());

            // Check if the request is an AJAX request
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Thank you for your message. We will get back to you soon.']);
            }

            // Redirect back with a success message for non-AJAX requests
            return back()->with('success', 'Thank you for your message. We will get back to you soon.');
        } catch (Exception $e) {
            // Log the error for debugging purposes
            Log::error('Contact form submission error: ' . $e->getMessage());

            // Check if the request is an AJAX request
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'An error occurred while submitting your message. Please try again later.']);
            }

            // Redirect back with an error message for non-AJAX requests
            return back()->withErrors(['error' => 'An error occurred while submitting your message. Please try again later.']);
        }
    }
}
