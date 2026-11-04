<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminFormLayoutTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Alexander Vance',
            'email' => 'admin@admin.com',
            'phone' => '+1 (555) 234-5678',
            'job_title' => 'Administrator',
            'bio' => 'Senior administrator managing website operations and access.',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Test admin CSS contains full-width textarea and proper icon padding rules.
     */
    public function test_admin_css_has_proper_icon_padding_and_textarea_full_width(): void
    {
        $cssPath = public_path('css/admin.css');
        $this->assertFileExists($cssPath);

        $css = file_get_contents($cssPath);

        // Check textarea universal full-width styles
        $this->assertStringContainsString('width: 100% !important;', $css);
        $this->assertStringContainsString('textarea,', $css);
        $this->assertStringContainsString('box-sizing: border-box !important;', $css);

        // Check input-icon-group padding
        $this->assertStringContainsString('padding-left: 44px !important;', $css);
        $this->assertStringContainsString('.input-icon-group input', $css);
        $this->assertStringContainsString('.input-icon-group textarea', $css);
    }

    /**
     * Test admin profile page renders proper classes and elements.
     */
    public function test_admin_profile_inputs_and_textarea_have_proper_classes(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.profile'));
        $response->assertStatus(200);

        // Check inputs have form-control
        $response->assertSee('id="name"', false);
        $response->assertSee('id="email"', false);
        $response->assertSee('id="phone"', false);
        $response->assertSee('id="job_title"', false);
        $response->assertSee('id="bio"', false);

        // Check textarea has form-control
        $response->assertSee('<textarea', false);
        $response->assertSee('class="form-control"', false);
        $response->assertSee('class="input-icon-left textarea-icon"', false);
    }

    /**
     * Test admin settings page textareas and icon inputs have proper classes.
     */
    public function test_admin_settings_textareas_have_form_control(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.settings.index'));
        $response->assertStatus(200);

        // Check contact_address and meta_description textareas
        $response->assertSee('id="contact_address"', false);
        $response->assertSee('id="meta_description"', false);
        $response->assertSee('id="contact_phone"', false);
        $response->assertSee('id="contact_email"', false);
    }

    /**
     * Test change password page inputs have proper classes.
     */
    public function test_admin_change_password_inputs_have_form_control(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.change-password'));
        $response->assertStatus(200);

        $response->assertSee('id="current_password"', false);
        $response->assertSee('id="password"', false);
        $response->assertSee('id="password_confirmation"', false);
        $response->assertSee('class="password-toggle-btn"', false);
    }
}
