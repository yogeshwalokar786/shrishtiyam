<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        if (File::exists(storage_path('app/sitemap_entries.json'))) {
            File::delete(storage_path('app/sitemap_entries.json'));
        }

        $this->admin = User::create([
            'name' => 'Alexander Vance',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }

    protected function tearDown(): void
    {
        if (File::exists(storage_path('app/sitemap_entries.json'))) {
            File::delete(storage_path('app/sitemap_entries.json'));
        }

        parent::tearDown();
    }

    public function test_public_sitemap_xml_is_accessible_and_valid(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=utf-8');
        $response->assertSee('<urlset', false);
        $response->assertSee('<loc>', false);
        $response->assertSee('<priority>', false);
    }

    public function test_guest_cannot_access_sitemap_admin_panel(): void
    {
        $response = $this->get('/admin/sitemap');
        $response->assertRedirect('/login');
    }

    public function test_admin_can_view_sitemap_generator_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/sitemap');
        $response->assertStatus(200);
        $response->assertSee('Sitemap');
        $response->assertSee('Indexed Pages');
        $response->assertSee('Add Page');
        $response->assertSee('Regenerate Sitemap');
    }

    public function test_admin_can_regenerate_sitemap(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/sitemap/generate');
        $response->assertRedirect('/admin/sitemap');
        $response->assertSessionHas('success');

        $this->assertTrue(File::exists(public_path('sitemap.xml')));
        $content = File::get(public_path('sitemap.xml'));
        $this->assertStringContainsString('<urlset', $content);
    }

    public function test_admin_can_add_custom_url_to_sitemap(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/sitemap/add', [
            'url' => '/investor-relations/q3-results',
            'title' => 'Q3 Financial Earnings Report',
            'priority' => '0.8',
            'changefreq' => 'monthly',
        ]);

        $response->assertRedirect('/admin/sitemap');
        $response->assertSessionHas('success');

        // Verify public sitemap includes the new URL
        $sitemapContent = File::get(public_path('sitemap.xml'));
        $this->assertStringContainsString('investor-relations/q3-results', $sitemapContent);
    }

    public function test_admin_can_download_sitemap_xml(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/sitemap/download');
        $response->assertStatus(200);
        $response->assertHeader('content-disposition');
    }
}
