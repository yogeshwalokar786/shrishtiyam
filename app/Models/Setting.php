<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    /**
     * In-memory cache of settings for the current request.
     */
    protected static ?Collection $cachedSettings = null;

    /**
     * Default fallback configuration values tailored specifically to CircuFlow.
     */
    public static array $defaultSettings = [
        // Branding & Identity
        'site_name' => 'SHRISTIYAM',
        'company_legal_name' => 'SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED',
        'company_cin' => 'U74900ME2026PTC473633',
        'site_tagline' => '',
        'site_logo' => '',
        'site_favicon' => '',

        // Corporate Contact & Specialized Desks
        'contact_email' => 'admin@shristiyam.com',
        'contact_phone' => '7020784898 / 9112327953',
        'contact_address' => 'PL.NO.151, RAMDASPETH, NEAR TULI IMPERIAL HOTEL, Nagpur- 440010, Maharashtra',
        'business_hours' => 'Monday - Friday: 9:00 AM - 6:00 PM',
        'epr_desk_email' => 'admin@shristiyam.com',
        'polymer_sales_email' => 'admin@shristiyam.com',

        // Statutory & Accreditations
        'pro_badge' => 'Statutory Registered PRO',
        'certifications' => 'ISO 14001:2015, ISO 9001:2015, Ocean-Safe Certified',

        // System & Localization
        'timezone' => 'Asia/Kolkata',
        'date_format' => 'd M Y',

        // Social Media Channels
        'social_linkedin' => 'https://linkedin.com/company/shristiyam',
        'social_twitter' => 'https://twitter.com/shristiyam',
        'social_facebook' => 'https://facebook.com/shristiyam',
        'social_youtube' => 'https://youtube.com',

        // SEO & Legal
        'meta_title' => 'SHRISTIYAM | Next-Gen Circular Economy & Compliance Solutions',
        'meta_description' => 'SHRISTIYAM COMPLIANCE SOLUTIONS delivers statutory EPR compliance, recycling frameworks, and traceable environmental solutions.',
        'copyright_text' => '© 2026 SHRISTIYAM COMPLIANCE SOLUTIONS PRIVATE LIMITED. All rights reserved.',
    ];

    /**
     * Retrieve a setting value by key with optional fallback.
     */
    public static function get(string $key, $default = null)
    {
        if (self::$cachedSettings === null) {
            self::loadCache();
        }

        if (self::$cachedSettings !== null && self::$cachedSettings->has($key)) {
            $val = self::$cachedSettings->get($key);
            return $val !== null ? $val : ($default ?? self::$defaultSettings[$key] ?? null);
        }

        return $default ?? self::$defaultSettings[$key] ?? null;
    }

    /**
     * Persist or update a single setting.
     */
    public static function set(string $key, $value, string $group = 'general', string $type = 'text'): self
    {
        $setting = self::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'group' => $group,
                'type' => $type,
            ]
        );

        if (self::$cachedSettings !== null) {
            self::$cachedSettings->put($key, $value);
        }

        return $setting;
    }

    /**
     * Bulk save key-value pairs with automatic grouping.
     */
    public static function setMany(array $data): void
    {
        $groups = [
            'site_name' => 'branding',
            'company_legal_name' => 'branding',
            'company_cin' => 'regulatory',
            'site_tagline' => 'branding',
            'site_logo' => 'branding',
            'site_favicon' => 'branding',

            'contact_email' => 'contact',
            'contact_phone' => 'contact',
            'contact_address' => 'contact',
            'business_hours' => 'contact',
            'epr_desk_email' => 'contact',
            'polymer_sales_email' => 'contact',

            'pro_badge' => 'regulatory',
            'certifications' => 'regulatory',

            'timezone' => 'localization',
            'date_format' => 'localization',

            'social_linkedin' => 'social',
            'social_twitter' => 'social',
            'social_facebook' => 'social',
            'social_youtube' => 'social',

            'meta_title' => 'seo',
            'meta_description' => 'seo',
            'copyright_text' => 'seo',
        ];

        foreach ($data as $key => $value) {
            $group = $groups[$key] ?? 'general';
            $type = in_array($key, ['contact_address', 'meta_description', 'copyright_text', 'certifications']) ? 'textarea' : 'text';

            self::set($key, $value, $group, $type);
        }

        self::clearCache();
    }

    /**
     * Populate cache from database.
     */
    public static function loadCache(): void
    {
        try {
            if (Schema::hasTable('settings')) {
                self::$cachedSettings = self::query()->pluck('value', 'key');
            } else {
                self::$cachedSettings = collect();
            }
        } catch (\Throwable $e) {
            self::$cachedSettings = collect();
        }
    }

    /**
     * Flush memory cache.
     */
    public static function clearCache(): void
    {
        self::$cachedSettings = null;
    }
}
