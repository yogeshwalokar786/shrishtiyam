<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');

        $this->admin = User::create([
            'name' => 'Alexander Vance',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }

    public function test_guest_cannot_access_settings_page(): void
    {
        $response = $this->get(route('admin.settings.index'));
        $response->assertRedirect('/login');

        $putResponse = $this->put(route('admin.settings.update'), [
            'site_name' => 'Hacked Site',
        ]);
        $putResponse->assertRedirect('/login');
    }

    public function test_admin_can_view_general_settings_page(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.settings.index'));

        $response->assertStatus(200);
        $response->assertSeeText('General Settings');
        $response->assertSeeText('Branding & Logo', false);
        $response->assertSeeText('Contact & Desks', false);
        $response->assertSeeText('Regulatory & PRO', false);
        $response->assertSeeText('Localization');
        $response->assertSeeText('Social Media');
        $response->assertSeeText('SEO & Legal', false);
        $response->assertSeeText('Primary Website Logo');
        $response->assertSeeText('Website Browser Favicon');
        $response->assertSeeText('EPR Statutory Compliance Desk');
        $response->assertSeeText('Save Settings');

        // Confirm absence of retail currency symbol and work started date in the settings page
        $response->assertDontSeeText('Currency Symbol');
        $response->assertDontSeeText('Project Work Started Date');
    }

    public function test_admin_can_update_general_settings(): void
    {
        $response = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'site_name' => 'CircuFlow Global',
            'site_tagline' => 'Next-Gen Circular Solutions',
            'contact_email' => 'contact@circuflow-global.com',
            'contact_phone' => '+1 (800) 999-7777',
            'contact_address' => 'Eco-Industrial Corridor, Innovation District, Campus B',
            'business_hours' => 'Mon-Sat 8am-7pm',
            'epr_desk_email' => 'compliance@circuflow-global.com',
            'polymer_sales_email' => 'sales@circuflow-global.com',
            'pro_badge' => 'Statutory Registered PRO',
            'certifications' => 'ISO 14001:2015, ISO 9001:2015',
            'timezone' => 'Asia/Kolkata',
            'date_format' => 'd M Y',
            'social_linkedin' => 'https://linkedin.com/company/circuflow-global',
            'meta_title' => 'CircuFlow Global Platform',
            'meta_description' => 'Global sustainable circularity and PCR polymers.',
            'copyright_text' => '© 2026 CircuFlow Global Inc.',
        ]);

        $response->assertRedirect(route('admin.settings.index'));
        $response->assertSessionHas('success', 'General settings updated successfully.');

        // Test helper values
        $this->assertEquals('CircuFlow Global', setting('site_name'));
        $this->assertEquals('contact@circuflow-global.com', setting('contact_email'));
        $this->assertEquals('compliance@circuflow-global.com', setting('epr_desk_email'));
        $this->assertEquals('sales@circuflow-global.com', setting('polymer_sales_email'));
        $this->assertEquals('+1 (800) 999-7777', setting('contact_phone'));

        // Check that updated values show on contact page and header
        $contactResponse = $this->get(route('contact'));
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('contact@circuflow-global.com');
        $contactResponse->assertSee('+1 (800) 999-7777');
    }

    public function test_admin_can_upload_and_remove_logo_and_favicon(): void
    {
        $logoFile = UploadedFile::fake()->image('custom_logo.png', 200, 50);
        $favFile = UploadedFile::fake()->create('custom_fav.png', 10, 'image/png');

        $response = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'site_name' => 'CircuFlow',
            'site_logo_file' => $logoFile,
            'site_favicon_file' => $favFile,
        ]);

        $response->assertRedirect(route('admin.settings.index'));
        $this->assertNotEmpty(setting('site_logo'));
        $this->assertNotEmpty(setting('site_favicon'));

        // Test removing logo and favicon
        $removeResponse = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'site_name' => 'CircuFlow',
            'remove_site_logo' => '1',
            'remove_site_favicon' => '1',
        ]);

        $removeResponse->assertRedirect(route('admin.settings.index'));
        $this->assertEmpty(setting('site_logo'));
        $this->assertEmpty(setting('site_favicon'));
    }

    public function test_validation_fails_when_site_name_is_empty(): void
    {
        $response = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'site_name' => '',
        ]);

        $response->assertSessionHasErrors(['site_name']);
    }

    public function test_validation_fails_on_invalid_email_or_url(): void
    {
        $response = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'site_name' => 'CircuFlow',
            'contact_email' => 'not-an-email',
            'social_linkedin' => 'invalid-url',
        ]);

        $response->assertSessionHasErrors(['contact_email', 'social_linkedin']);
    }

    public function test_setting_helper_returns_default_when_not_found(): void
    {
        $this->assertEquals('default_value', setting('non_existent_key', 'default_value'));
    }

    public function test_settings_page_renders_media_picker_modal_and_trigger_buttons(): void
    {
        $response = $this->actingAs($this->admin)->get(route('admin.settings.index'));

        $response->assertStatus(200);
        $response->assertSee('id="mediaPickerModal"', false);
        $response->assertSee('chooseLogoFromMedia', false);
        $response->assertSee('chooseFaviconFromMedia', false);
        $response->assertSee('Choose Logo from Media Manager');
        $response->assertSee('Choose Favicon from Media Manager');
        $response->assertSee('Upload from PC');
    }

    public function test_admin_can_set_logo_and_favicon_from_media_manager_url(): void
    {
        $response = $this->actingAs($this->admin)->put(route('admin.settings.update'), [
            'site_name' => 'CircuFlow',
            'site_logo' => 'https://example.com/storage/media/brand_logo.png',
            'site_favicon' => 'https://example.com/storage/media/favicon.ico',
        ]);

        $response->assertRedirect(route('admin.settings.index'));
        $this->assertEquals('https://example.com/storage/media/brand_logo.png', setting('site_logo'));
        $this->assertEquals('https://example.com/storage/media/favicon.ico', setting('site_favicon'));

        $viewResponse = $this->actingAs($this->admin)->get(route('admin.settings.index'));
        $viewResponse->assertStatus(200);
        $viewResponse->assertSee('https://example.com/storage/media/brand_logo.png');
        $viewResponse->assertSee('https://example.com/storage/media/favicon.ico');
    }
}
