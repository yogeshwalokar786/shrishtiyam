<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Show the Edit Admin Profile form.
     */
    public function showProfile()
    {
        $currentUser = Auth::user();
        return view('admin.profile', compact('currentUser'));
    }

    /**
     * Update the authenticated admin's profile details.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:50'],
            'job_title' => ['nullable', 'string', 'max:100'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.profile')
            ->with('success', 'Profile details updated successfully!');
    }
    /**
     * Display the main Admin Dashboard.
     */
    public function dashboard()
    {
        $currentUser = Auth::user();

        $metrics = [
            'total_users' => User::count(),
            'media_count' => \App\Models\Media::count(),
            'messages_count' => \App\Models\Enquiry::count(),
            'new_messages_count' => \App\Models\Enquiry::where('status', 'new')->count(),
            'policies_count' => \App\Models\Policy::count(),
            'testimonials_count' => \App\Models\Testimonial::count(),
        ];

        $recentEnquiries = \App\Models\Enquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact('currentUser', 'metrics', 'recentEnquiries'));
    }

    /**
     * Show the Change Password form.
     */
    public function showChangePassword()
    {
        $currentUser = Auth::user();
        return view('admin.change-password', compact('currentUser'));
    }

    /**
     * Update the authenticated user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'different:current_password'],
        ], [
            'password.different' => 'The new password must be different from your current password.',
            'password.min' => 'The new password must be at least 8 characters long.',
            'password.confirmed' => 'The new password confirmation does not match.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'The provided current password does not match our records.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.change-password')
            ->with('success', 'Your password has been changed successfully!');
    }
}
