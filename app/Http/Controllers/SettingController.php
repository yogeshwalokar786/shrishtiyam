<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the General Settings page.
     */
    public function index(): View
    {
        $keys = array_keys(Setting::$defaultSettings);
        $settings = [];

        foreach ($keys as $key) {
            $settings[$key] = Setting::get($key);
        }

        $timezones = [
            'UTC' => 'UTC (Coordinated Universal Time)',
            'Asia/Kolkata' => 'Asia/Kolkata (IST +5:30)',
            'America/New_York' => 'America/New_York (EST/EDT)',
            'America/Chicago' => 'America/Chicago (CST/CDT)',
            'America/Los_Angeles' => 'America/Los_Angeles (PST/PDT)',
            'Europe/London' => 'Europe/London (GMT/BST)',
            'Europe/Paris' => 'Europe/Paris (CET/CEST)',
            'Asia/Dubai' => 'Asia/Dubai (GST +4:00)',
            'Asia/Singapore' => 'Asia/Singapore (SGT +8:00)',
            'Asia/Tokyo' => 'Asia/Tokyo (JST +9:00)',
            'Australia/Sydney' => 'Australia/Sydney (AEST +10:00)',
        ];

        $dateFormats = [
            'd M Y' => date('d M Y') . ' (e.g. 26 Sept 2026)',
            'Y-m-d' => date('Y-m-d') . ' (e.g. 2026-09-26)',
            'm/d/Y' => date('m/d/Y') . ' (e.g. 09/26/2026)',
            'd/m/Y' => date('d/m/Y') . ' (e.g. 26/09/2026)',
            'M j, Y' => date('M j, Y') . ' (e.g. Sep 26, 2026)',
            'F j, Y' => date('F j, Y') . ' (e.g. September 26, 2026)',
        ];

        return view('admin.settings.index', compact('settings', 'timezones', 'dateFormats'));
    }

    /**
     * Save updated settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            // Branding & Identity
            'site_name' => 'required|string|max:100',
            'company_legal_name' => 'nullable|string|max:200',
            'company_cin' => 'nullable|string|max:50',
            'site_tagline' => 'nullable|string|max:255',
            'site_logo' => 'nullable|string|max:255',
            'site_logo_file' => 'nullable|file|mimes:png,jpg,jpeg,svg,webp|max:5120',
            'site_favicon' => 'nullable|string|max:255',
            'site_favicon_file' => 'nullable|file|mimes:ico,png,svg,webp|max:2048',
            'remove_site_logo' => 'nullable',
            'remove_site_favicon' => 'nullable',

            // Corporate Contact & Specialized Desks
            'contact_email' => 'nullable|email|max:120',
            'contact_phone' => 'nullable|string|max:100',
            'contact_address' => 'nullable|string|max:500',
            'business_hours' => 'nullable|string|max:150',
            'epr_desk_email' => 'nullable|email|max:120',
            'polymer_sales_email' => 'nullable|email|max:120',

            // Statutory & Regulatory
            'pro_badge' => 'nullable|string|max:100',
            'certifications' => 'nullable|string|max:255',

            // System & Localization
            'timezone' => 'nullable|string|max:60',
            'date_format' => 'nullable|string|max:30',

            // Social Media
            'social_linkedin' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',

            // SEO & Legal
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'copyright_text' => 'nullable|string|max:255',
        ]);

        // Process Site Logo File Upload
        if ($request->hasFile('site_logo_file')) {
            $logoFile = $request->file('site_logo_file');
            $originalName = $logoFile->getClientOriginalName();
            $extension = strtolower($logoFile->getClientOriginalExtension());
            $filename = 'logo_' . time() . '_' . Str::random(6) . '.' . $extension;
            $path = $logoFile->storeAs('media', $filename, 'public');

            // Register in common Media library
            Media::create([
                'user_id' => Auth::id(),
                'filename' => $filename,
                'original_name' => $originalName,
                'mime_type' => $logoFile->getMimeType() ?? ('image/' . $extension),
                'file_type' => 'image',
                'file_size' => $logoFile->getSize(),
                'path' => $path,
            ]);

            $validated['site_logo'] = Storage::url($path);
        } elseif ($request->boolean('remove_site_logo')) {
            $validated['site_logo'] = '';
        }

        // Process Favicon File Upload
        if ($request->hasFile('site_favicon_file')) {
            $favFile = $request->file('site_favicon_file');
            $originalName = $favFile->getClientOriginalName();
            $extension = strtolower($favFile->getClientOriginalExtension());
            $filename = 'favicon_' . time() . '_' . Str::random(6) . '.' . $extension;
            $path = $favFile->storeAs('media', $filename, 'public');

            // Register in common Media library
            Media::create([
                'user_id' => Auth::id(),
                'filename' => $filename,
                'original_name' => $originalName,
                'mime_type' => $favFile->getMimeType() ?? ('image/' . $extension),
                'file_type' => 'image',
                'file_size' => $favFile->getSize(),
                'path' => $path,
            ]);

            $validated['site_favicon'] = Storage::url($path);
        } elseif ($request->boolean('remove_site_favicon')) {
            $validated['site_favicon'] = '';
        }

        // Clean up temporary upload control keys before saving
        unset(
            $validated['site_logo_file'],
            $validated['site_favicon_file'],
            $validated['remove_site_logo'],
            $validated['remove_site_favicon']
        );

        Setting::setMany($validated);

        return redirect()->route('admin.settings.index')->with('success', 'General settings updated successfully.');
    }
}
