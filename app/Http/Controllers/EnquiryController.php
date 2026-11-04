<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of client enquiries and consultation requests.
     */
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        $search = $request->query('search');

        $query = Enquiry::latest();

        if ($status !== 'all' && in_array($status, ['new', 'in_progress', 'resolved', 'archived'])) {
            $query->where('status', $status);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $enquiries = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => Enquiry::count(),
            'new' => Enquiry::where('status', 'new')->count(),
            'in_progress' => Enquiry::where('status', 'in_progress')->count(),
            'resolved' => Enquiry::where('status', 'resolved')->count(),
        ];

        return view('admin.enquiries.index', compact('enquiries', 'stats', 'status', 'search'));
    }

    /**
     * Display specific inquiry details via JSON for view modal.
     */
    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json($enquiry);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    /**
     * Update inquiry status and admin notes.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,resolved,archived',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update($validated);

        return redirect()->back()
            ->with('success', "Enquiry #{$enquiry->id} status updated to " . ucfirst(str_replace('_', ' ', $validated['status'])) . ".");
    }

    /**
     * Remove an inquiry from database.
     */
    public function destroy($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        $clientName = $enquiry->name;
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', "Enquiry from '{$clientName}' has been deleted.");
    }
}
