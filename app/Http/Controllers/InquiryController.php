<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $inquiry = Inquiry::create([
                'property_id' => $request->property_id,
                'name' => strip_tags($request->name),
                'email' => $request->email,
                'phone' => strip_tags($request->phone),
                'message' => strip_tags($request->message),
                'status' => 'new'
            ]);

            if ($inquiry) {
                return back()->with('success', 'Your inquiry has been submitted successfully! We will contact you soon.');
            } else {
                return back()->with('error', 'Failed to save inquiry. Please try again.');
            }
        } catch (\Exception $e) {
            \Log::error('Inquiry submission error: ' . $e->getMessage());
            return back()->with('error', 'There was an error submitting your inquiry. Please try again.');
        }
    }
}