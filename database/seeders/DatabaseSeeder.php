<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update default Super Admin
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Alexander Vance',
                'email' => 'admin@admin.com',
                'phone' => '+1 (555) 234-5678',
                'job_title' => 'Administrator',
                'bio' => 'Senior administrator managing website operations and access.',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Create some sample team / staff users for rich dashboard presentation
        $sampleUsers = [
            [
                'name' => 'Sarah Connor',
                'email' => 'sarah.c@company.io',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Marcus Chen',
                'email' => 'marcus.chen@company.io',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Elena Rostova',
                'email' => 'elena.r@company.io',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'David Kim',
                'email' => 'david.kim@company.io',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($sampleUsers as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'email_verified_at' => now(),
                ]
            );
        }

        // 3. Seed initial default policies
        $defaultPolicies = [
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'meta_description' => 'Our privacy policy explains how we collect, use, and protect your information.',
                'is_published' => true,
                'sort_order' => 1,
                'content' => "<h2>1. Introduction</h2>
<p>Welcome to our website. We respect your privacy and are committed to protecting your personal data. This privacy policy informs you how we look after your personal data when you visit our website and tells you about your privacy rights and how the law protects you.</p>

<h2>2. Information We Collect</h2>
<p>We may collect, use, store, and transfer different kinds of personal data about you, including:</p>
<ul>
    <li><strong>Identity Data:</strong> First name, last name, and organization title.</li>
    <li><strong>Contact Data:</strong> Email address, phone number, and mailing address.</li>
    <li><strong>Technical Data:</strong> Internet protocol (IP) address, browser type and version, time zone setting, and operating system.</li>
    <li><strong>Usage Data:</strong> Information about how you use our website, products, and services.</li>
</ul>

<h2>3. How We Use Your Information</h2>
<p>We will only use your personal data when the law allows us to. Most commonly, we will use your personal data to:</p>
<ul>
    <li>Provide quotes, procurement information, and customer support.</li>
    <li>Process contact inquiries, consultation bookings, and service requests.</li>
    <li>Improve our website, communications, and customer relationships.</li>
    <li>Comply with statutory and regulatory obligations.</li>
</ul>

<h2>4. Data Security</h2>
<p>We have put in place appropriate security measures to prevent your personal data from being accidentally lost, used, altered, or accessed in an unauthorized way.</p>

<h2>5. Contact Us</h2>
<p>If you have any questions about this privacy policy or our data privacy practices, please contact us via our website contact page.</p>",
            ],
            [
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'meta_description' => 'Our terms of service outline the rules and regulations for using our website and services.',
                'is_published' => true,
                'sort_order' => 2,
                'content' => "<h2>1. Agreement to Terms</h2>
<p>By accessing or using our website, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, you may not access our website or services.</p>

<h2>2. Intellectual Property Rights</h2>
<p>Unless otherwise stated, all intellectual property rights for all material on this website are owned by CircuFlow and its licensors. All intellectual property rights are reserved.</p>

<h2>3. User Responsibilities</h2>
<p>When using our website and submitting contact forms, you agree:</p>
<ul>
    <li>To provide accurate, current, and complete information.</li>
    <li>Not to use the website for any unlawful purpose or prohibited activity.</li>
    <li>Not to attempt unauthorized access to any portion or feature of the website.</li>
</ul>

<h2>4. Limitation of Liability</h2>
<p>In no event shall CircuFlow, nor its directors, employees, or agents, be liable for any indirect, consequential, or special liability arising out of or in any way related to your use of this website.</p>

<h2>5. Governing Law</h2>
<p>These Terms shall be governed and construed in accordance with applicable statutory laws, without regard to its conflict of law provisions.</p>",
            ],
            [
                'title' => 'Cookie Policy',
                'slug' => 'cookie-policy',
                'meta_description' => 'Learn how our website uses cookies and tracking technologies to ensure the best browsing experience.',
                'is_published' => true,
                'sort_order' => 3,
                'content' => "<h2>1. What Are Cookies</h2>
<p>Cookies are small text files that are placed on your computer or mobile device by websites that you visit. They are widely used to make websites work more efficiently and provide analytical information.</p>

<h2>2. How We Use Cookies</h2>
<p>We use cookies for a variety of reasons, including:</p>
<ul>
    <li><strong>Essential Cookies:</strong> Required for the operation of our website, including session authentication and security.</li>
    <li><strong>Analytical / Performance Cookies:</strong> Allow us to recognize and count the number of visitors and see how visitors move around our site.</li>
    <li><strong>Functionality Cookies:</strong> Used to recognize you when you return to our website to remember your preferences.</li>
</ul>

<h2>3. Managing Cookies</h2>
<p>Most web browsers allow you to control cookies through their browser settings. You can choose to block or delete cookies at any time.</p>",
            ],
        ];

        foreach ($defaultPolicies as $policy) {
            \App\Models\Policy::updateOrCreate(
                ['slug' => $policy['slug']],
                $policy
            );
        }

        // 4. Seed dynamic blog categories and initial posts
        $this->call(BlogSeeder::class);

        // 5. Seed initial media assets library
        $this->call(MediaSeeder::class);

        // 6. Seed client testimonials
        $this->call(TestimonialSeeder::class);

        // 7. Seed client logos
        $this->call(ClientLogoSeeder::class);
    }
}
