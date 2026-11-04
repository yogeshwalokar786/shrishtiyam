<?php

namespace App\Http\Controllers;

use App\Models\ClientLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ClientLogoController extends Controller
{
    /**
     * Display a listing of client logos.
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search', ''));
        $status = $request->get('status', 'all');

        $query = ClientLogo::query();

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('website_url', 'like', "%{$search}%");
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $logos = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(15)
            ->withQueryString();

        $stats = [
            'total' => ClientLogo::count(),
            'active' => ClientLogo::where('is_active', true)->count(),
            'inactive' => ClientLogo::where('is_active', false)->count(),
        ];

        return view('admin.client-logos.index', compact('logos', 'stats', 'search', 'status'));
    }

    /**
     * Show the form for creating a new client logo.
     */
    public function create()
    {
        $nextOrder = (ClientLogo::max('sort_order') ?? 0) + 1;

        return view('admin.client-logos.create', compact('nextOrder'));
    }

    /**
     * Store a newly created client logo in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'logo_path' => ['nullable', 'string', 'max:500'],
            'logo_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ]);

        $logoPath = $validated['logo_path'] ?? null;

        // Handle uploaded logo file
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $uploadDir = public_path('uploads/logos');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $logoPath = '/uploads/logos/' . $fileName;
        }

        if (empty($logoPath)) {
            return back()->withInput()->withErrors(['logo_file' => 'Please provide a logo image by uploading a file or choosing from Media Manager.']);
        }

        $clientLogo = ClientLogo::create([
            'name' => $validated['name'],
            'logo_path' => $logoPath,
            'website_url' => $validated['website_url'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.client-logos.index')
            ->with('success', "Client logo '{$clientLogo->name}' added successfully.");
    }

    /**
     * Show the form for editing the specified client logo.
     */
    public function edit(ClientLogo $clientLogo)
    {
        return view('admin.client-logos.edit', compact('clientLogo'));
    }

    /**
     * Update the specified client logo in storage.
     */
    public function update(Request $request, ClientLogo $clientLogo)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
            'logo_path' => ['nullable', 'string', 'max:500'],
            'logo_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ]);

        $logoPath = $clientLogo->logo_path;

        if ($request->filled('logo_path')) {
            $logoPath = $request->input('logo_path');
        }

        // Handle uploaded logo file
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $uploadDir = public_path('uploads/logos');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $fileName);
            $logoPath = '/uploads/logos/' . $fileName;
        }

        $clientLogo->update([
            'name' => $validated['name'],
            'logo_path' => $logoPath,
            'website_url' => $validated['website_url'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.client-logos.index')
            ->with('success', "Client logo '{$clientLogo->name}' updated successfully.");
    }

    /**
     * Remove the specified client logo from storage.
     */
    public function destroy(ClientLogo $clientLogo)
    {
        $name = $clientLogo->name;
        $clientLogo->delete();

        return redirect()->route('admin.client-logos.index')
            ->with('success', "Client logo '{$name}' deleted successfully.");
    }

    /**
     * Toggle the active status of a client logo.
     */
    public function toggleStatus(ClientLogo $clientLogo)
    {
        $clientLogo->is_active = !$clientLogo->is_active;
        $clientLogo->save();

        $statusText = $clientLogo->is_active ? 'activated' : 'deactivated';
        return redirect()->back()
            ->with('success', "Client logo '{$clientLogo->name}' {$statusText}.");
    }
}
