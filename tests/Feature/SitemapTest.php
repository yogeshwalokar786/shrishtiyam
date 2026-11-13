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

        $this->admin = User::create([
            'name' => 'Alexander Vance',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }

    protected function tearDown(): void
    {
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

    public function test_admin_sitemap_page_is_removed(): void
    {
        // Admin sitemap routes are removed, should return 404
        $response = $this->actingAs($this->admin)->get('/admin/sitemap');
        $response->assertStatus(404);
    }
}
